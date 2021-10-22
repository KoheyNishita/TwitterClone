<?php
// エラー表示あり
ini_set('display_errors', 1);
// 日本時間で表示
date_default_timezone_set('Asia/Tokyo');
// URLとディレクトリ設定
define('HOME_URL', '/TwitterClone/'); // http://localhost/TwitterClone/ とフルで書いてもOK

///////////////////////////////////
// ツイート一覧
///////////////////////////////////
$view_tweets = [
    [
        'user_id' => 1,
        'user_name' => 'taro',
        'user_nickname' => '太郎',
        'user_image_name' => 'sample-person.jpg',
        'tweet_body' => 'プログラミング中！',
        'tweet_image_name' => null, // 画像投稿なし = null
        'tweet_created_at' => '2021-03-15 14:00:00', // 本来は投稿からどれだけ経ったかを表示するが、変換処理を後で行う
        'like_id' => null, // いいねがない場合はnull、ある場合は1になる
        'like_count' => 0
    ],

    [
        'user_id' => 2,
        'user_name' => 'yoshihito_wayama',
        'user_nickname' => 'JIRO',
        'user_image_name' => null, // 画像の指定がない（=指定が 'null' ）場合はデフォルト画像になる
        'tweet_body' => 'コワーキングスペースをオープンしました！',
        'tweet_image_name' => 'sample-post.jpg',
        'tweet_created_at' => '2021-03-15 14:12:00',
        'like_id' => 1, // data-（データハイフン）という関数を使い data-like-id と書くことで、like-idが取得できる
        'like_count' => 1
    ]
];

// htmlファイルでの「data-」関数は、プログラマーが自由に使っていいもの
// Webサイト上には表示されないので、ここに適当な数字などを代入できる
// data-like-idにすると、like-idに何かしらのデータが代入できるようになる

////////////////////////
// 便利な関数
////////////////////////

/**
 * 画像ファイル名から画像のURLを生成する
 *
 * @param string $name 画像ファイル名
 * @param string $type user | tweet
 * @return string
 */
function buildImagePath(string $name = null, string $type) // 第一引数にはnullを許容 → 画像投稿のないツイートも許容
{
    if ($type === 'user' && !isset($name)) {
        return HOME_URL . 'Views/img/icon-default-user.svg';
    }

    return HOME_URL . 'Views/img_uploaded/' . $type . '/' . htmlspecialchars($name);
}

/**
 * 指定した日時からどれだけ経過したかを取得する関数
 * 
 * @param string $datetime 日時 ...paramは引数
 * @return string ...returnは戻り値の情報
 */
function convertToDayTimeAgo(string $datetime)
{
    $unix = strtotime($datetime); // unixは1970年1月1日から数えた日時
    $now = time();
    $diff_sec = $now - $unix;

    if($diff_sec < 60) {
        $time = $diff_sec;
        $unit = '秒前';
    } elseif ($diff_sec < 3600) { // 3600秒 = 1時間。1時間以内の投稿の場合は「○○分前」と表示する
        $time = $diff_sec / 60;
        $unit = '分前';
    } elseif ($diff_sec < 86400) { // 86400秒 = 24時間（1日）。1日以内の投稿は「○○時間前」にする
        $time = $diff_sec / 3600;
        $unit ='時間前';
    } elseif ($diff_sec < 2764800) { // 2764800秒 = 32日。32日（大体1か月）未満なら「○○」日前にする
        $time = $diff_sec / 86400;
        $unit = '日前';
    } else {

        if (date('Y') !== date('Y', $unix)) {
            $time = date('Y年n月j日', $unix);
        } else {
            $time = date('n月j日', $unix);
        }
        return $time;
}

return (int)$time . $unit;
}
// (int)は型キャストといい、型を変換する。intの場合は、intで変換できないものは0になり、小数点がある場合は切り捨て

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo HOME_URL; ?>Views/img/logo-twitterblue.svg">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo HOME_URL; ?>Views/css/style.css">
        <!-- 複数のCSSファイルを読み込んだ際に干渉すると、後のものが優先される -->
    <!-- JS jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous" defer></script>
    <!-- JavaScript Bundle with Popper  これは上のJS jQueryに依存しているのでその下に書く-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous" defer></script>
    <!-- いいね！ボタンのJS -->
    <script src="<?php echo HOME_URL; ?>Views/js/likes.js" defer></script>
    <!-- JSのファイルにdefer属性を指定すると、JSの読み込みを遅らせる→HTML全体の読み込みが優先され、ページが早く読み込まれる -->
    <!-- 通常読み込まれるScriptが、deferありのScriptに依存しているとエラーが起こる場合アリ -->

    <title>ホーム画面 / Twitterクローン</title>
    <meta name="desctiption" content="ホーム画面です">
</head>

<body class="home">
    <div class="container">
        <div class="side">
            <div class="side-inner">
                <ul class="nav flex-column"> <!-- navから始まるのはbootstrapのクラス -->
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src="<?php echo HOME_URL; ?>Views/img/logo-twitterblue.svg" alt="サイトロゴ" class="icon"></a></li>
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src="<?php echo HOME_URL; ?>Views/img/icon-home.svg" alt="ホーム"></a></li>
                    <li class="nav-item"><a href="search.php" class="nav-link"><img src="<?php echo HOME_URL; ?>Views/img/icon-search.svg" alt="検索の虫メガネ"></a></li>
                    <li class="nav-item"><a href="notification.php" class="nav-link"><img src="<?php echo HOME_URL; ?>Views/img/icon-notification.svg" alt="通知のベル"></a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link"><img src="<?php echo HOME_URL; ?>Views/img/icon-profile.svg" alt="プロフの人物"></a></li>
                    <li class="nav-item"><a href="post.php" class="nav-link"><img src="<?php echo HOME_URL; ?>Views/img/icon-post-tweet-twitterblue.svg" alt="青い羽" class="post_tweet"></a></li>
                    <li class="nav-item my-icon"><img src="<?php echo HOME_URL; ?>Views/img_uploaded/user/sample-person.jpg" alt="自分のアイコン" class="js-popover" 
                data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-html="true" 
                data-bs-content="<a href='profile.php'>プロフィール</a><br><a href='sign-out.php'>ログアウト</a>"
                ></li>
                <!-- containerにbodyを指定することで親要素のスタイルの影響を受けにくくなる -->
                <!-- toggleにはpopover -->
                <!-- placementはrightで、対象（ユーザーアイコン）の右側に表示 -->
                <!-- html="true"で、これ以下のコードをHTMLに変換する -->
                </ul>
            </div>
        </div>
        <div class="main">
            <div class="main-header">
                <h1>ホーム</h1>
            </div>

            <!-- つぶやき投稿エリア -->
                <div class="tweet-post">
                    <div class="my-icon">
                        <img src="<?php echo HOME_URL; ?>Views/img_uploaded/user/sample-person.jpg" alt="アイコン">
                    </div>
                    <div class="input-area">
                        <form action="post.php" method="post" enctype="multipart/form-data"> <!-- 47行目のinput typeがファイルの場合にenctypeが必要 -->
                            <textarea name="body" placeholder="いまどうしてる？" maxlength="140"></textarea>
                            <div class="bottom-area">
                                <div class="mb-0"> <!-- mb-0はbootstrapのクラス。margin-bottomになる -->
                                    <input type="file" name="image" class="form-control form-control-sm"> <!-- sm=small -->
                                    <button class="btn" type="submit">つぶやく</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <!-- 仕切りエリア -->
            <div class="ditch"></div>

            <!-- つぶやき一覧エリア -->
            <?php if (empty($view_tweets)) : ?> <!-- この行はデータがない場合。emptyは指定した変数が空だった場合にtrueを返す -->
                <p class="p-3">投稿がありません</p> <!-- クラスのp-3はpaddingという意味、全方向に位置レベルの余白を開ける -->
            <?php else: ?> <!-- この行（78-94）はデータがある場合 -->
                <div class="tweet-list">
                    <?php foreach($view_tweets as $view_tweet) : ?>
                        <div class="tweet">
                            <div class="user">
                                <a href="profile.php?user_id=<?php echo htmlspecialchars($view_tweet['user_id']); ?>">
                                    <img src="<?php echo buildImagePath($view_tweet['user_image_name'], 'user'); ?>" alt="アイコン">
                                </a>
                            </div>
                            <div class="content">
                                <div class="name">
                                    <a href="profile.php?user_id=<?php echo htmlspecialchars($view_tweet['user_id']); ?>">
                                        <span class="nickname"><?php echo htmlspecialchars($view_tweet['user_nickname']); ?></span>
                                        <span class="user-name">@<?php echo htmlspecialchars($view_tweet['user_name']); ?> ・ <?php echo convertToDayTimeAgo($view_tweet['tweet_created_at']); ?></span>
                                    </a>
                                </div>
                                <p><?php echo $view_tweet['tweet_body']; ?></p>

                                <?php if (isset($view_tweet['tweet_image_name'])): ?>
                                    <img src="<?php echo buildImagePath($view_tweet['tweet_image_name'], 'tweet'); ?>" alt="" class="post-image">
                                <?php endif; ?>

                                <div class="icon-list">
                                    <div class="like js-like" data-like-id="<?php echo htmlspecialchars($view_tweet['like_id']); ?>">
                                        <?php
                                        if (isset($view_tweet['like_id'])) {
                                            echo '<img src="' . HOME_URL . 'Views/img/icon-heart-twitterblue.svg" alt="">'; // いいね！あり
                                        } else {
                                            echo '<img src="' . HOME_URL . 'Views/img/icon-heart.svg" alt="">'; // いいね！なし
                                        }
                                        ?>
                                    </div>
                                    <div class="like-count js-like-count"><?php echo htmlspecialchars($view_tweet['like_count']); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- JSをインラインで書く場合は極力＜/body＞の閉じタグの上に書く -->
    <script>
        document.addEventListener ('DOMContentLoaded', function(){
            $('.js-popover').popover();
        }, false);
    </script>
</body>
</html>
<?php
// エラー表示あり
ini_set('display_errors', 1);
// 日本時間で表示
date_default_timezone_set('Asia/Tokyo');
// URLとディレクトリ設定
define('HOME_URL', 'http://localhost/TwitterClone/');

///////////////////////////////////
// ツイート一覧
///////////////////////////////////
$view_tweets = [
    [
        'user_id' => 1,
        'user_name' => 'taro',
        'user_nickname' => 'たろうですぜ',
        'user_image_name' => 'sample-person.jpg',
        'tweet_body' => 'プログラミング中ですぜ！',
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
        'like_id' => 1,
        'like_count' => 1
    ]
];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo HOME_URL; ?>Views/img/logo-twitterblue.svg">
        <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo HOME_URL; ?>Views/css/style.css">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- 複数のCSSファイルを読み込んだ際に干渉すると、後のものが優先される -->
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
                <li class="nav-item"><a href="post.php" class="nav-link"><img src="<?php echo HOME_URL; ?>Views/img/icon-post-tweet-twitterblue.svg" alt="つぶやく青い羽" class="post-tweet"></a></li>
                <li class="nav-item my-icon"><img src="<?php echo HOME_URL; ?>Views/img_uploaded/user/sample-person.jpg" alt="自分のアイコン"></a></li>
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
                                <a href="profile.php?user_id=<?php echo $view_tweet['user_id']; ?>">
                                <img src="<?php echo HOME_URL; ?>Views/img_uploaded/user/<?php echo $view_tweet['user_image_name']; ?>" alt="アイコン">
                                </a>
                            </div>
                            <div class="content">
                                <div class="name">
                                    <a href="profile.php?user_id=<?php echo $view_tweet['user_id']; ?>">
                                        <span class="nickname"><?php echo $view_tweet['user_nickname']; ?></span>
                                        <span class="user-name">@<?php echo $view_tweet['user_name']; ?> ・ <?php echo $view_tweet['tweet_created_at']; ?></span>
                                    </a>
                                </div>
                                <p><?php echo $view_tweet['tweet_body']; ?></p>

                                <?php if (isset($view_tweet['tweet_image_name'])): ?>
                                    <img src="<?php echo HOME_URL; ?>Views/img_uploaded/tweet/<?php echo $view_tweet['tweet_image_name']; ?>" alt="" class="post-image">
                                <?php endif; ?>

                                <div class="icon-list">
                                    <div class="like">
                                        <?php
                                        if (isset($view_tweet['like_id'])) {
                                            echo '<img src="' . HOME_URL . 'Views/img/icon-heart-twitterblue.svg" alt="">'; // いいね！あり
                                        } else {
                                            echo '<img src="' . HOME_URL . 'Views/img/icon-heart.svg" alt="">'; // いいね！なし
                                        }
                                        ?>
                                    </div>
                                    <div class="like-count"><?php echo $view_tweet['like_count']; ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
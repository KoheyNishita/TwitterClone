<?php
// 設定関連を読み込む
include_once('../config.php'); // includeという関数で他のPHPファイルを読み込む。include_onceなら一度だけ読み込む
// 便利な関数を読み込む
include_once('../util.php');

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

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../Views/common/head.php'); ?>
    <title>ホーム画面 / Twitterクローン</title>
    <meta name="desctiption" content="ホーム画面です">
</head>

<body class="home">
    <div class="container">
        <?php include_once('../Views/common/side.php'); ?>
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
                    <?php foreach ($view_tweets as $view_tweet) : ?>
                        <?php include('../Views/common/tweet.php'); ?>
                        <!-- foreach内でinclude_onceすると、最初の1回しか読み込まれないので_onceは外す -->
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- JSをインラインで書く場合は極力＜/body＞の閉じタグの上に書く -->
    <?php include_once('../Views/common/foot.php'); ?>
</body>
</html>
<?php
// 設定関連を読み込む
include_once('../config.php'); // includeという関数で他のPHPファイルを読み込む。include_onceなら一度だけ読み込む
// 便利な関数を読み込む
include_once('../util.php');

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../Views/common/head.php'); ?>
    <title>つぶやく画面 / Twitterクローン</title>
    <meta name="desctiption" content="つぶやく画面です">
</head>

<body class="home">
    <div class="container">
        <?php include_once('../Views/common/side.php'); ?>
        <div class="main">
            <div class="main-header">
                <h1>つぶやく</h1>
            </div>

            <!-- つぶやき投稿エリア -->
                <div class="tweet-post">
                    <div class="my-icon">
                        <img src="<?php echo HOME_URL; ?>Views/img_uploaded/user/sample-person.jpg" alt="アイコン">
                    </div>
                    <div class="input-area">
                        <form action="post.php" method="post" enctype="multipart/form-data">
                            <textarea name="body" placeholder="いまどうしてる？" maxlength="140"></textarea>
                            <div class="bottom-area">
                                <div class="mb-0">
                                    <input type="file" name="image" class="form-control form-control-sm">
                                    <button class="btn" type="submit">つぶやく</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <!-- 仕切りエリア -->
            <div class="ditch"></div>

        </div>
    </div>
    <!-- JSをインラインで書く場合は極力＜/body＞の閉じタグの上に書く -->
    <?php include_once('../Views/common/foot.php'); ?>
</body>
</html>
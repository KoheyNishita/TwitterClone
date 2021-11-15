<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include_once('../Views/common/head.php'); ?>
    <title>プロフィール画面 / Twitterクローン</title>
    <meta name="desctiption" content="プロフィール画面">
</head>

<body class="home profile text-center">
    <div class="container">
        <?php include_once('../Views/common/side.php'); ?>
        <div class="main">
            <div class="main-header">
                <h1><?php echo $view_requested_user['nickname']; ?></h1>
            </div>

            <!-- プロフィールエリア -->
            <div class="profile-area">
                <div class="top">
                    <div class="user"><img src="<?php echo buildImagePath($view_requested_user['image_name'], 'user'); ?>" alt=""></div>

                    <?php if ($view_user['id'] !== $view_requested_user['id']) : ?>
                        <!-- 相手のページ -->
                        <?php if (isset($view_requested_user['follow_id'])) : ?>
                            <button class="btn btn-sm js-follow" data-followed-user-id="<?php echo $view_requested_user['id']; ?>" data-follow-id="<?php $view_requested_user['follow_id']; ?>">フォローを外す</button>
                        <?php else: ?>
                            <button class="btn btn-sm btn-reverse js-follow" data-followed-user-id="<?php echo $view_requested_user['id']; ?>">フォローする</button>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- 自分のページ -->
                        <button class="btn btn-reverse btn-sm" data-bs-toggle="modal" data-bs-target="#js-modal">プロフィール編集</button>
                        <div class="modal fade" id="js-modal" tabindex="-1" aria-hidden="true"> <!-- modal fadeはbootstrapのクラス。モーダル（小窓）をフェードインで表示する -->
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="profile.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title">プロフィールを編集</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="user">
                                            <img src="<?php echo buildImagePath($view_user['image_name'], 'user'); ?>" alt="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="mb-1">プロフィール画像</label>
                                            <input type="file" class="form-control form-control-sm" name="image">
                                        </div>

                                        <input type="text" class="form-control mb-4" name="nickname" value="<?php echo htmlspecialchars($view_user['nickname']); ?>" placeholder="ニックネーム" maxlength="50" required>
                                        <input type="text" class="form-control mb-4" name="name" value="<?php echo htmlspecialchars($view_user['name']); ?>" placeholder="ユーザー名" maxlength="50" required>
                                        <input type="email" class="form-control mb-4" name="email" value="<?php echo htmlspecialchars($view_user['email']); ?>" placeholder="メールアドレス" maxlength="254" required>
                                        <input type="password" class="form-control mb-4" name="password" value="" placeholder="パスワードを変更する場合ご入力ください" minlength="4" maxlength="128">
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-reverse" data-bs-dismiss="modal">キャンセル</button>
                                        <button class="btn" type="submit">保存する</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
                <div class="name"><?php echo htmlspecialchars($view_requested_user['nickname']); ?></div>
                <div class="text-muted">@<?php echo htmlspecialchars($view_requested_user['name']); ?></div>

                <div class="follow-follower">
                    <div class="follow_count"><?php echo htmlspecialchars($view_requested_user['follow_user_count']); ?></div>
                    <div class="follow_text">フォロー中</div>
                    <div class="follow_count"><?php echo htmlspecialchars($view_requested_user['followed_user_count']); ?></div>
                    <div class="follow_text">フォロワー</div>
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
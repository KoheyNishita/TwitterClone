<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../Views/img/logo-twitterblue.svg">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../Views/css/style.css">    
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
                <li class="nav-item"><a href="home.php" class="nav-link"><img src="../Views/img/logo-twitterblue.svg" alt="サイトロゴ" class="icon"></a></li>
                <li class="nav-item"><a href="home.php" class="nav-link"><img src="../Views/img/icon-home.svg" alt="ホーム"></a></li>
                <li class="nav-item"><a href="search.php" class="nav-link"><img src="../Views/img/icon-search.svg" alt="検索の虫メガネ"></a></li>
                <li class="nav-item"><a href="notification.php" class="nav-link"><img src="../Views/img/icon-notification.svg" alt="通知のベル"></a></li>
                <li class="nav-item"><a href="profile.php" class="nav-link"><img src="../Views/img/icon-profile.svg" alt="プロフの人物"></a></li>
                <li class="nav-item"><a href="post.php" class="nav-link"><img src="../Views/img/icon-post-tweet-twitterblue.svg" alt="つぶやく青い羽" class="post-tweet"></a></li>
                <li class="nav-item my-icon"><img src="../Views/img_uploaded/user/sample-person.jpg" alt="自分のアイコン"></a></li>
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
                    <img src="../Views/img_uploaded/user/sample-person.jpg" alt="アイコン画像">
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
            <div class="tweet-list">

                <div class="tweet">
                    <div class="user">
                        <a href="profile.php?user_id=1">
                        <img src="../Views/img_uploaded/user/sample-person.jpg" alt="アイコン">
                        </a>
                    </div>
                    <div class="content">
                        <div class="name">
                            <a href="profile.php?user_id=1">
                                <span class="nickname">たろうですぜ</span>
                                <span class="user-name">@taro ・23日前</span>
                            </a>
                        </div>
                        <p>プログラミング中ですぜ！</p>
                        <div class="icon-list">
                            <div class="like">
                                <img src="../Views/img/icon-heart.svg" alt="">
                            </div>
                            <div class="like-count">0</div>
                        </div>
                    </div>
                </div>

                <div class="tweet">
                    <div class="user">
                        <a href="profile.php?user_id=2"></a>
                        <img src="../Views/img/icon-default-user.svg" alt="アイコン">
                    </div>
                    <div class="content">
                        <div class="name">
                            <a href="profile.php?user_id=2">
                                <span class="nickname">JIRO</span>
                                <span class="user-name">@yoshihito_wayama ・23日前</span>
                            </a>
                        </div>
                        <p>コワーキングスペースをオープンしました！</p>
                        <img src="../Views/img_uploaded/tweet/sample-post.jpg" class="post-image" alt="">
                        <div class="icon-list">
                            <div class="like">
                                <img src="../Views/img/icon-heart-twitterblue.svg" alt="">
                            </div>
                            <div class="like-count">1</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
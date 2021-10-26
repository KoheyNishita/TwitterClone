<div class="side">
    <div class="side-inner">
        <ul class="nav flex-column"> <!-- navから始まるのはbootstrapのクラス -->
            <li class="nav-item"><a href="home.php" class="nav-link"><img src="<?php echo HOME_URL; ?>Views/img/logo-twitterblue.svg" alt="サイトロゴ" class="icon"></a></li>
            <li class="nav-item"><a href="home.php" class="nav-link"><img src="<?php echo HOME_URL; ?>Views/img/icon-home.svg" alt="ホーム"></a></li>
            <li class="nav-item"><a href="search.php" class="nav-link"><img src="<?php echo HOME_URL; ?>Views/img/icon-search.svg" alt="検索の虫メガネ"></a></li>
            <li class="nav-item"><a href="notification.php" class="nav-link"><img src="<?php echo HOME_URL; ?>Views/img/icon-notification.svg" alt="通知のベル"></a></li>
            <li class="nav-item"><a href="profile.php" class="nav-link"><img src="<?php echo HOME_URL; ?>Views/img/icon-profile.svg" alt="プロフの人物"></a></li>
            <li class="nav-item"><a href="post.php" class="nav-link"><img src="<?php echo HOME_URL; ?>Views/img/icon-post-tweet-twitterblue.svg" alt="青い羽" class="post_tweet"></a></li>
            <li class="nav-item my-icon"><img src="<?php echo HOME_URL; ?>Views/img_uploaded/user/sample-person.jpg" alt="自分のアイコン" class="js-popover" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-html="true" data-bs-content="<a href='profile.php'>プロフィール</a><br><a href='sign-out.php'>ログアウト</a>"></li>
            <!-- containerにbodyを指定することで親要素のスタイルの影響を受けにくくなる -->
            <!-- toggleにはpopover -->
            <!-- placementはrightで、対象（ユーザーアイコン）の右側に表示 -->
            <!-- html="true"で、これ以下のコードをHTMLに変換する -->
        </ul>
    </div>
</div>
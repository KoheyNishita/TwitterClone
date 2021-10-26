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

<!--                         
htmlファイルでの「data-」関数は、プログラマーが自由に使っていいもの
Webサイト上には表示されないので、ここに適当な数字などを代入できる
data-like-idにすると、like-idに何かしらのデータが代入できるようになる -->
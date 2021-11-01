<?php
/////////////////////////////////////////
// ホームコントローラー
/////////////////////////////////////////

// 設定関連を読み込む
include_once '../config.php';
// 便利な関数を読み込む
include_once '../util.php';

// ログインチェック
$user = getUserSession();
if(!$user) {
    // ログインしていない
    header('Location: ' . HOME_URL . 'Controllers/sign-in.php');
    exit;
}

// 表示用の関数
$view_user = $user;
// ツイート一覧
// 仮のデータです TODO:モデルから取得
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

// 画面表示
include_once '../Views/home.php';
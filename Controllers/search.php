<?php
/////////////////////////////////////////
// サーチコントローラー
/////////////////////////////////////////

// 設定関連を読み込む
include_once '../config.php';
// 便利な関数を読み込む
include_once '../util.php';

// ツイートデータ操作モデルを読み込む
include_once '../Models/tweets.php';
// フォローデータ操作モデルを読み込む ※ホーム画面と同様のつぶやきを取得
include_once '../Models/follows.php';

// ログインチェック
$user = getUserSession();
if(!$user) {
    // ログインしていない
    header('Location: ' . HOME_URL . 'Controllers/sign-in.php');
    exit;
}

// 検索キーワードを取得
$keyword = null;

if (isset($_GET['keyword'])) {
    // 検索している場合 -> 検索結果の一覧のみ表示
    $keyword = $_GET['keyword'];

    // ツイート一覧
    $view_tweets = findTweets($user, $keyword);
} else {
    // 検索していない場合 -> ホーム画面と同じ投稿一覧を取得
    // 自分がフォローしているユーザーID一覧を取得
    $following_user_ids = findFollowingUserIds($user['id']);
    // 自分のツイートも表示するため自分のIDも追加
    $following_user_ids[] = $user['id'];

    // ツイート一覧
    $view_tweets = findTweets($user, null, $following_user_ids);
}

// 表示用の変数
$view_user = $user;
$view_keyword = $keyword;


// 画面表示
include_once '../Views/search.php';
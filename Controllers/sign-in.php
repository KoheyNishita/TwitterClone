<?php
/////////////////////////////////////////
// サインインコントローラー
/////////////////////////////////////////

// 設定関連を読み込む
include_once '../config.php';
// 便利な関数を読み込む
include_once '../util.php';

// ユーザーモデルを読み込み
include_once '../Models/users.php';

// ログイン結果
$try_login_result = null;

// メールアドレスとパスワードが入力されている場合
if (isset($_POST['email']) && isset($_POST['password'])) {
    // ログインチェック実行
    $user = findUserAndCheckPassword($_POST['email'], $_POST['password']);

    // ログイン成功の場合
    if ($user) {
        // ユーザー情報をセッションに保存
        saveUserSession($user);

        // ホーム画面に遷移
        header('Location: ' . HOME_URL . 'Controllers/home.php');
        exit;

    } else {
        // ログイン結果を失敗にする
        $try_login_result = false;
    }
}

// 表示用の変数 ※include_onceで読み込んだ変数が多いほど把握が難しくなるので、Viewsで使う変数にのみ先頭を "$view" にするルール
$view_try_login_result = $try_login_result;

// 画面表示
include_once '../Views/sign-in.php';
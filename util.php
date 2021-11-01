<?php
////////////////////////
// 便利な関数
////////////////////////

/**
 * 画像ファイル名から画像のURLを生成する
 *
 * @param string $name 画像ファイル名
 * @param string $type user | tweet
 * @return string
 */
function buildImagePath(string $name = null, string $type) // 第一引数にはnullを許容 → 画像投稿のないツイートも許容
{
    if ($type === 'user' && !isset($name)) {
        return HOME_URL . 'Views/img/icon-default-user.svg';
    }

    return HOME_URL . 'Views/img_uploaded/' . $type . '/' . htmlspecialchars($name);
}

/**
 * 指定した日時からどれだけ経過したかを取得する関数
 * 
 * @param string $datetime 日時 ...paramは引数
 * @return string ...returnは戻り値の情報
 */
function convertToDayTimeAgo(string $datetime)
{
    $unix = strtotime($datetime); // unixは1970年1月1日から数えた日時
    $now = time();
    $diff_sec = $now - $unix;

    if($diff_sec < 60) {
        $time = $diff_sec;
        $unit = '秒前';
    } elseif ($diff_sec < 3600) { // 3600秒 = 1時間。1時間以内の投稿の場合は「○○分前」と表示する
        $time = $diff_sec / 60;
        $unit = '分前';
    } elseif ($diff_sec < 86400) { // 86400秒 = 24時間（1日）。1日以内の投稿は「○○時間前」にする
        $time = $diff_sec / 3600;
        $unit ='時間前';
    } elseif ($diff_sec < 2764800) { // 2764800秒 = 32日。32日（大体1か月）未満なら「○○」日前にする
        $time = $diff_sec / 86400;
        $unit = '日前';
    } else {

        if (date('Y') !== date('Y', $unix)) {
            $time = date('Y年n月j日', $unix);
        } else {
            $time = date('n月j日', $unix);
        }
        return $time;
}

return (int)$time . $unit;
}
// (int)は型キャストといい、型を変換する。intの場合は、intで変換できないものは0になり、小数点がある場合は切り捨て

/***
 * ユーザー情報をセッションに保存
 * 
 * @param array $user
 * @return void
 */
function saveUserSession(array $user)
{
    // セッションを開始していない場合
    if(session_status() === PHP_SESSION_NONE) {
        // セッション開始
        session_start();
    }

    $_SESSION['USER'] = $user;
}

/**
 * ユーザー情報をセッションから削除
 * 
 * @return void
 */
function deleteUserSession()
{
    // セッションを開始していない場合
    if (session_Status() === PHP_SESSION_NONE) {
        // セッション開始
        session_start();
    }

    // セッションのユーザー情報を削除
    unset($_SESSION['USER']);
}

/**
 * セッションのユーザー情報を取得
 * 
 * @return array|false
 */
function getUserSession()
{
    // セッションを開始していない場合
    if(session_status() === PHP_SESSION_NONE) {
        // セッション開始
        session_start();
    }

    if (!isset($_SESSION['USER'])) {
        // セッションにユーザー情報がない場合
        return false;
    }

    $user = $_SESSION['USER'];

    // 画像のファイル名からファイルのURLを取得
    if (!isset($user['image_name'])) {
        $user['image_name'] = null;
    }
    $user['image_path'] = buildImagePath($user['image_name'], 'user');
    
    return $user;
}
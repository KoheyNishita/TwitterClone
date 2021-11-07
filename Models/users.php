<?php
///////////////////////////////////////
// ユーザーデータを処理
///////////////////////////////////////

error_reporting(E_ALL);
ini_set('display_errors', '1');
// var_dump($変数); ←困ったらこれ使う

/**
 * ユーザーを作成
 * 
 *  @param array $data
 *  @return bool
 */
function createUser(array $data)
{
    // DB接続
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // 接続エラーがある場合->処理停止
    if ($mysqli->connect_errno) {
        echo 'MySQLの接続に失敗しました。：' . $mysqli->connect_error . "\n";
        exit;
    }
    $mysqli->set_charset("utf8mb4");

    // 新規登録のSQLクエリ作成 下記の?はプレースホルダといい、後で値を挿入できる
    $query = 'INSERT INTO users (email, name, nickname, password) VALUES (?, ?, ?, ?)';

    // プリペアードステートメントに作成したクエリを登録
    $statement = $mysqli->prepare($query);

    // パスワードをハッシュ値に変換
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    // クエリのプレースホルダ（?の部分）にカラム値を紐付け（24行目のやつ）
    // ssssはストリングが4つ。なぜ "s" なのかはストリング型で処理されるから。1つ目のsが第一引数, 2つ目は第二引数...
    // VALUES (?, ?, ?, ?) に直接 $data['email'] とかデータ入れればいい？ → NO
    //  → $data['email']などのデータ内にSQLが入っていると、そのSQLが意図せず実行されエラーの原因になるから
    $statement->bind_param('ssss', $data['email'], $data['name'], $data['nickname'], $data['password']);

    // クエリ実行。executeメソッドの戻り値はBool型
    $response = $statement->execute();

    // 実行に失敗した場合->エラー表示
    if ($response === false) {
        echo 'エラーメッセージ：' . $mysqli->error . "\n";
    }

    // DB接続を解放
    $statement->close();
    $mysqli->close();

    return $response;
}

/**
 * ユーザー情報取得：ログインチェック
 * 
 * @param string $email
 * @param string $password
 * @return array|false
 */
function findUserAndCheckPassword(string $email, string $password)
{
    // DB接続
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // 接続エラーがある場合->処理停止
    if ($mysqli->connect_errno) {
        echo 'MySQLの接続に失敗しました。：' . $mysqli->connect_error . "\n";
        exit;
    }

    // 入力値をエスケープ
    $email = $mysqli->real_escape_string($email);

    // SQLクエリを作成
    //   外部からのリクエストは何が入ってくるか分からないので、必ずエスケープしたものをクオート' やダブルクオート " で囲む
    $query = 'SELECT * FROM users WHERE email = "' . $email . '"';

    // クエリ実行
    $result = $mysqli->query($query);

    // クエリ実行に失敗->return
    if(!$result) {
        // MySQL処理中にエラー発生
        echo 'エラーメッセージ：' . $mysqli->error . "\n";
        $mysqli->close();
        return false;
    }

    // ユーザー情報を取得 fetch_array関数はレコードを1件取得する
    $user = $result->fetch_array(MYSQLI_ASSOC);

    // ユーザーが存在しない場合->return
    if (!$user) {
        $mysqli->close();
        return false;
    }

    // パスワードチェック、不一致の場合->return
    if(!password_verify($password, $user['password'])) {
        $mysqli->close();
        return false;
    }

    // DB接続を解放
    $mysqli->close();

    return $user;
}
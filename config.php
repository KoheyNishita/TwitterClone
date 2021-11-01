<?php
// エラー表示あり
ini_set('display_errors', 1);

// 日本時間で表示
date_default_timezone_set('Asia/Tokyo');

// URLとディレクトリ設定
define('HOME_URL', '/TwitterClone/'); // http://localhost/TwitterClone/ とフルで書いてもOK

// データベースの接続情報
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'twitter_clone');
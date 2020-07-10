<?php
//必ずsession_startは最初に記述
session_start();

// セッション変数を解除
$_SESSION = array();

// セッションcookieを削除
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// セッションを破棄
session_destroy();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.php">トップ画面に戻る</a>
    
</body>
</html>

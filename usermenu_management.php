<!--停止中-->

<!-- 
<?php ini_set( 'display_errors', 1 ); ?>
<?php
//セッション開始
session_start();

//db接続
require "funcs.php";
$pdo = db_con();

//user情報取得
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE kanri_flg=0 AND life_flg=0");
$status = $stmt->execute();
if($status==false){
    sql_error($stmt);
}

$view="";
while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //.=で変数をつなぐことができる
    $view .= "<p>"."<a href=menu_suggest.php?user_id=".$result['user_id'].">"."ユーザ名:".$result['user_name']." 住所:".$result['user_address']."</a>"."</p>";
}

?>


<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ユーザ管理</title>
</head>
    <body>
        <?=$view?>

    </body>
</html> -->
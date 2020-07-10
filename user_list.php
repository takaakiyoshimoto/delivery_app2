<?php ini_set( 'display_errors', 1 ); ?>
<?php
require "funcs.php";
$pdo = db_con();
session_start();

$stmt = $pdo->prepare("SELECT * FROM user_table");
$status = $stmt->execute();
//SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}
$view="";
while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //.=で変数をつなぐことができる
    $view.="<p>"."ユーザ名:".$result['user_name']." 住所:".$result['user_address']."</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?=$view?>
</body>
</html>
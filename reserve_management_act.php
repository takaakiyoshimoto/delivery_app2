<?php ini_set( 'display_errors', 1 ); ?>
<?php
  
//db接続
require "funcs.php";
$pdo = db_con();

$recive_id = $_GET["id"];


//データの挿入
$stmt = $pdo->prepare("INSERT INTO recivedata_table(recivedata_id) VALUES (2) where recivedata_id=$recive_id");
$status = $stmt->execute();
header("Location: reserve_management.php");
?>
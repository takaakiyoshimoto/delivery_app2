<?php
$kcal = $_GET["kcal"];
$menu_id = $_GET["menu_id"];

//db接続
require "funcs.php";
$pdo = db_con();

//insert
$stmt = $pdo->prepare("Insert INTO nutrition_table (nutrition_id,menu_id,kcal) VALUES (Null,:a1,:a2)");
$stmt->bindValue(':a1',$menu_id, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2',$kcal, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
if($status==false){
    sql_error($stmt);
}
header("Location: cook_regist.php");

?>
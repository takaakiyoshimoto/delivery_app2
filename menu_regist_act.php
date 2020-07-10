
<?php
$recivedata_id = $_GET["recivedata_id"];
$menu_title=$_GET["menu_title"];

require "funcs.php";
$pdo = db_con();

session_start();

$stmt = $pdo->prepare("INSERT INTO menu_table(menu_id,recivedata_id,menu_title) VALUES (Null,:a1,:a2)");
$stmt->bindValue(':a1',$recivedata_id, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2',$menu_title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}
//menu_registに戻す
$location="Location: menu_regist.php?recivedata_id=".$recivedata_id;
header($location);

?>
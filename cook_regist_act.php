<?php ini_set( 'display_errors', 1 ); ?>
<?php
//フォームからデータを受け取る
$date = $_GET["date"];


session_start();

//DB接続します
require "funcs.php";
$pdo = db_con();


//既存のnameかぶっていないかを確認========================================================
//データ取得

$shop_id = (int) $_SESSION["shop_id"];

//search
$stmt = $pdo->prepare("SELECT recivedata_id FROM recivedata_table WHERE shop_id=$shop_id AND data=$date");
$status = $stmt->execute();
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);
}

//空か判別
$recivedata_id="";
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $recivedata_id=value['recivedata_id'];
}

if($recivedata_id==""){
    //insert
    $stmt = $pdo->prepare("INSERT INTO recivedata_table(recivedata_id,data,shop_id,status) VALUES (Null,:a1,:a2,1)");
    $stmt->bindValue(':a1',$date, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':a2',$shop_id, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();
    if($status==false) {
        //execute（SQL実行時にエラーがある場合）
        sql_error($stmt);
    }

}else{
    //あったら挿入しない
}









header("Location: cook_regist.php");
?>
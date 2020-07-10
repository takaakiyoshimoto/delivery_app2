<?php
ini_set( 'display_errors', 1 );

//最初にSESSIONを開始！！
session_start();

//POST値
$lid=$_POST["lid"];
$lpw=$_POST["lpw"];


//DB接続します
require "funcs.php";
$pdo = db_con();


//データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE lid=:lid");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
//$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //* Hash化する場合はコメントする
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//該当レコードがあればSESSIONに値を代入
//* if(password_verify($lpw, $val["lpw"])){
if(password_verify($lpw,$val["lpw"])){
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["user_name"] = $val['user_name'];
  header("Location: index.php");
}else{
  //Login失敗時(Logout経由)
  header("Location: login.php");
}

exit();



<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

// DB接続文
function db_con(){

  try {
    //Password:MAMP='root',XAMPP=''
    return new PDO('mysql:dbname=delivery_db;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }

}



// ログインチェック処理
function loginCheck($status){
  if (!isset($_SESSION["chk_ssid"])) {
    return 3;
  }elseif($_SESSION["chk_ssid"] != session_id()){
    if(isset($_COOKIE[session_name()])) {
      return 1;
    }
  }
  else{
    $_SESSION["chk_ssid"] = session_id();
    return 2;
  }
}

//SQLエラー
function sql_error($stmt){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}

//リダイレクト
function redirect($file_name){
  header("Location: ".$file_name);
  exit();
}

//test
function test($comment){
  echo "<p>".$comment.":".gettype($comment)."</p>";
}

// //来週の月曜日を取得
// function get_beginning_week_date($ymd) {
//   $w = date("w",strtotime($ymd));
//   $beginning_week_date =
//       date('Y-m-d', strtotime("-{$w} day", strtotime($ymd)));
//   return $beginning_week_date;
// }

?>
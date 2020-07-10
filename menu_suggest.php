<!--停止中-->

<!-- <?php ini_set( 'display_errors', 1 ); ?>
<?php

//userid取得
$user_id = $_GET["user_id"];

//db接続
require "funcs.php";
$pdo = db_con();

//order情報取得
$stmt = $pdo->prepare("SELECT * FROM order_table WHERE user_id=:user_id");
$stmt->bindValue(':user_id',$user_id, PDO::PARAM_STR);
$status = $stmt->execute();
if($status==false){
    sql_error($stmt);
}

//メニュidを一度配列に入れる。
$array=array();
while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //.=で変数をつなぐことができる
    array_push($array,$result['menu_id']);
}

//配列の数だけ検索する
$count=count($array);
echo "<p>".$count."</p>";

//結合したデータから日にち順に引き出す
//select * from menu_table inner join recivedata_table on menu_table.recivedata_id = recivedata_table.recivedata_id

// for($i=0;$i<$count;++){
//     //menu_tableでmenu_idが一致するものを取得する。
//     $stmt = $pdo->prepare("SELECT * FROM menu_table WHERE menu_id=:menu_id");
//     $stmt->bindValue(':menu_id',$array[$i], PDO::PARAM_STR);
//     $status = $stmt->execute();
//     if($status==false){
//         sql_error($stmt);
//     }
// }

// //来週一週間を取得
// $next_week=get_beginning_week_date();
// echo "<p>".$next_week."</p>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>献立作成</title>
</head>
<body>
<?=$view?>
<form action="cook_regist_act.php" method="post">
    <fieldset>
        <label>予約日：<input type="date" name="date"></label><br>
        <label><input type="submit" value="送信" id="send"></label>
    </fieldset>
</form>

</body>
</html> -->
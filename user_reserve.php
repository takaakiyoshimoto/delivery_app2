<?php ini_set( 'display_errors', 1 ); ?>
<?php


require "funcs.php";
$pdo = db_con();

session_start();

//データ取得SQL作成
//
$view="";
if (isset($_GET["date"])){
    $data = $_GET["date"];
    $stmt = $pdo->prepare("SELECT * FROM menu_table inner join recivedata_table on menu_table.recivedata_id = recivedata_table.recivedata_id inner join shop_table on recivedata_table.shop_id = shop_table.shop_id Where data=:data");
    $stmt->bindValue(':data', $data, PDO::PARAM_STR);
    //$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //* Hash化する場合はコメントする
    $status = $stmt->execute();

    //SQL実行時にエラーがある場合STOP
    if($status==false){
        sql_error($stmt);
    }
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        //.=で変数をつなぐことができる
        $view .= "<p>".$result['data']." ショップ名:".$result['shop_name']." メニュータイトル:".$result['menu_title']."</p>";
    }
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
    <form action="user_reserve.php" method="get">
        <fieldset>
            <legend>メニュー確認</legend>
            <label>日にち: <input type="date" name="date" id="date"></label><br>
            <input type="submit" value="送信" id="send">
        </fieldset>
    </form>

</body>
</html>
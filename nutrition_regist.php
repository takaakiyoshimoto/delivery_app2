<?php
//menu_id取得
$menu_id = $_GET["menu_id"];

//db接続
require "funcs.php";
$pdo = db_con();

//menu情報取得
$stmt = $pdo->prepare("SELECT menu_title FROM menu_table WHERE menu_id=:menu_id");
$stmt->bindValue(':menu_id',$menu_id, PDO::PARAM_STR);
$status = $stmt->execute();
if($status==false){
    sql_error($stmt);
}
$result = $stmt->fetch(PDO::FETCH_ASSOC);
//.=で変数をつなぐことができる
$view .= $result['menu_title'].' '."<input type='number' name='kcal' value='2' min='0'>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action="nutrition_regist_process.php" method="get">
<?=$view?>
<input type="hidden" value=<?=$menu_id?> name="menu_id">kcal
<input type="submit" value="送信" id="send">

</form>

    
</body>
</html>
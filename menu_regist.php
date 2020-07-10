<?php ini_set( 'display_errors', 1 ); ?>
<?php
$recivedata_id = $_GET["recivedata_id"];
$data=$_GET["data"];
require "funcs.php";
$pdo = db_con();
session_start();

$stmt = $pdo->prepare("SELECT nutrition_id,menu_title,menu_table.menu_id FROM menu_table LEFT OUTER JOIN nutrition_table ON menu_table.menu_id = nutrition_table.menu_id where recivedata_id=$recivedata_id");
$stmt->bindValue(':recivedata_id', $recivedata_id, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}
$view="<h3>".$data."</h3>";
$view.="<h4>登録済みメニュー</h4>";
$view.="<table class='table'>";
$view.="<thead class='thead-lignt'>";
$view.="<tr><th>ステータス</th><th>日にち</th><th>メニュー</th></tr>";
$view.="</thead>";
// $view.="<table class='table'>";
// $view.="<thead class='thead-lignt'><tr><th>Name</th><th>Age</th></tr></thead>";
// $view.="<tr><td>Yamada</td><td>16</td></tr>";
// $view.="<tr><td>Suzuki</td><td>26</td></tr>";
// $view.="<tr><td>Tanaka</td><td>36</td></tr>";
// $view.="</table>";


while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //.=で変数をつなぐことができる
    if(is_null($result['nutrition_id'])){
        $nutri = "<a href=nutrition_regist.php?menu_id=".$result['menu_id'].">登録</a>";
    }else{
        $nutri = "登録済み";
    }
    $view .= "<tr><td>"."承認"."</td><td>".$result['menu_title']."</td>"."<td>".$nutri."</td>"."</tr>";
}
$view.= "</table>";

$hidden = "<input type='hidden' name='recivedata_id' value=".$recivedata_id.">";
$hidden .= "<input type='hidden' name='data' value=".$recivedata_id.">";
?>

<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>メニュー登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
    <body>
        <?=$view?>
        <br><br>
        <form action="menu_regist_act.php" method="get">
        <fieldset>
            <legend>新規メニュー登録</legend>
            <label>メニュー名: <input type="text" name="menu_title" id="name"></label><br>
            <?=$hidden?>
            <input type="submit" value="追加" id="send">
        </fieldset>
        </form>
    </body>
</html>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>


<?php ini_set( 'display_errors', 1 ); ?>
<?php
  
//db接続
require "funcs.php";
$pdo = db_con();

//データの内部結合
$stmt = $pdo->prepare("SELECT recivedata_table.recivedata_id,data,menu_title,shop_name,status FROM recivedata_table inner join menu_table on menu_table.recivedata_id = recivedata_table.recivedata_id inner join shop_table on recivedata_table.shop_id = shop_table.shop_id ORDER BY recivedata_table.recivedata_id");
//$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //* Hash化する場合はコメントする
$status = $stmt->execute();

$view="";
$recive_id=0;
while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //最初にrecive_idに値を入れる
    if($result['status']==1){
        if($recive_id==0){
            $recive_id=$result['recivedata_id'];
            $view .= "<div class='border border-primary' style='padding:10px;'>";
        }
        //recive_idが変わった場合
        if($recive_id!=$result['recivedata_id']){
            $view .="<a href='reserve_management_act.php?id=".$recive_id."'>承認</a>";
            $view .="</div>";
            $recive_id=$result['recivedata_id'];
            $view .= "<div class='border border-primary' style='padding:10px;'>";
        }
        $view .= "<p>".$result['recivedata_id']." ".$result['data']." ".$result['menu_title']." ".$result['shop_name']."</p>";
    }
}
$view .="<a href='reserve_management_act.php?id=".$recive_id."'>承認</a>";
$view .="</div>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?=$view?>
</body>
</html>
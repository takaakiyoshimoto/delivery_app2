<?php ini_set( 'display_errors', 1 ); ?>
<?php
require "funcs.php";
$pdo = db_con();

session_start();
$shop_id=$_SESSION["shop_id"];

$stmt = $pdo->prepare("SELECT * FROM recivedata_table WHERE shop_id=:shop_id");
$stmt->bindValue(':shop_id', $shop_id, PDO::PARAM_STR);
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

$view="";
while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //.=で変数をつなぐことができる
    if($result['status']==1){
        $view .= "<p>"."<a href=menu_regist.php?recivedata_id=".$result['recivedata_id'].">"."申請中:".$result['data']."</a>"."</p>";
    }elseif($result['status']==2){
        $view .= "<p>"."承認:".$result['data']."</p>";
    }elseif($result['status']==3){
        $view .= "<p>"."却下:".$result['data']."</p>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約表</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- <?=$view?> -->

<!-- セレクトボックス -->
<form class="form-horizontal">
<div class="form-group">
    <label for="number" class="control-label col-xs-2">確認データ</label>
    <div class="col-xs-3">
      <select class="form-control" id="select" name="number">
        <option value="0" selected="selected"></option>
        <option value="1">申請中</option>
        <option value="2">履歴</option>
        <option value="3">承認済み</option>
      </select>
    </div>
</div>
</form>
<div id="free"></div>

<!-- jqueryを読み込ませる -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
    //登録ボタンをクリック
    $("#select").change(function() {
        //Ajax送信開始
        $.ajax({
            type: "POST",
            url: "cook_regist_ajax.php",

            dataType:"html",
            data : {"number" : $("#select").val()},
              
            success: function(data) {
            console.log("通信成功?");
            console.log(data);
            $('#free').html(data);
            },
            // 通信が失敗した時
            error: function(){
            console.log("通信失敗");
            //console.log(data);
            console.log($("#select").val());
            }



        });
    });
</script>






<form action="cook_regist_act.php" method="get">
    <fieldset>
        <label>新規申請：<input type="date" name="date"></label><br>
        <label><input type="submit" value="送信" id="send"></label>
    </fieldset>
</form>

</body>
</html>
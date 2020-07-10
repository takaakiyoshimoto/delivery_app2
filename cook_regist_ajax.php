<?php ini_set( 'display_errors', 1 ); ?>
<?php
//1. POSTデータ取得
$number = $_POST["number"];

// //2. DB接続します(エラー処理追加)
require "funcs.php";
$pdo = db_con();

session_start();
$shop_id=$_SESSION["shop_id"];

// //３．データ登録SQL作成
$stmt = $pdo->prepare("Select * from recivedata_table Where shop_id=:shop_id");
$stmt->bindValue(':shop_id', $shop_id, PDO::PARAM_STR);
$status = $stmt->execute();

$productList=array();
// <table class="table">
//   <thead class="thead-lignt">
//     <tr><th>ステータス</th><th>日にち</th><th>メニュー</th></tr>
//   </thead>
//     <tr><td>Yamada</td><td>16</td></tr>
//     <tr><td>Suzuki</td><td>26</td></tr>
//     <tr><td>Tanaka</td><td>36</td></tr>
// </table>

$view="";
$today=date('Y-m-d');

//テーブル題名作成
if($number!=0){
  $view.="<table class='table'>";
  $view.="<thead class='thead-lignt'>";
  $view.="<tr><th>ステータス</th><th>日にち</th><th>メニュー</th></tr>";
  $view.="</thead>";
}




if($number==0){
}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    if($number==1){
      if($result['status']==1){
        if(strtotime($today)<=strtotime($result['data'])){
          $view .= "<tr><td>"."申請中"."</td><td>".$result['data']."</td>";
          $view .= "<td>"."<a href=menu_regist.php?recivedata_id=".$result['recivedata_id']."&data=".$result['data'].">リンク</td>"."</tr>";
        }
      }
    }elseif($number==2){
      if($result['status']==1){
      $st="申請中";
      }elseif($result['status']==2){
        $st="承認済み";
      }elseif($result['status']==3){
        $st="却下";
      }elseif($result['status']==0){
        $st="キャンセル";
      }
      $view .= "<tr><td>".$st."</td><td>".$result['data']."</td>";
      $view .= "<td>"."<a href=menu_regist.php?recivedata_id=".$result['recivedata_id']."&data=".$result['data'].">リンク</td>"."</tr>";

    }elseif($number==3){
      if($result['status']==2){
        $view .= "<tr><td>"."承認済み"."</td><td>".$result['data']."</td>";
        $view .= "<td>"."<a href=menu_regist.php?recivedata_id=".$result['recivedata_id']."&data=".$result['data'].">リンク</td>"."</tr>";
      }
    }
  }
}

//テーブルを閉じる
if($number!=0){
  $view .= "</table>";
}



//echo json_encode($productList);
echo $view;

//４．データ登録処理後
if($status==false){
  echo "false";
}else{
  //echo "true";
}
?>
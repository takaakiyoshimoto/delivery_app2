<?php
//フォームからデータを受け取る
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$address= $_POST["address"];

//DB接続します
require "funcs.php";
$pdo = db_con();


//既存のnameかぶっていないかを確認========================================================
//データ取得

$stmt = $pdo->prepare("select * From shop_table WHERE lid=:lid");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);
}

//抽出データを取得
$val = $stmt->fetch(); 

//lidが既に存在している場合エラーを返す。
if($val["lid"] != ""){
    //user作成失敗
    exit("同一のshopidが存在しています。他のidで作成してください。");
}
//========================================================================================

//新規のuseridならDBに値を登録

//パスワードのハッシュ化を行う
$hashpass = password_hash($lpw,PASSWORD_DEFAULT);

//prepareで文字列として準備
$stmt = $pdo->prepare("INSERT INTO shop_table(shop_id,shop_name,lid,lpw,shop_address)VALUES(NULL,:a1,:a2,:a3,:a4)");
//bind変数に入れることで無効かしている(script等を埋め込まれないため):a1,:a2,:a3)");
//↓文字列型としてエスケープするという意味
$stmt->bindValue(':a1',$name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2',$lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $hashpass, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $address, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//データ登録処理後
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);
}

?>

<!--htmlデータ書き込み -->
<html>
    <head>
        <meta charset="utf-8">
        <title>File書き込み</title>
    </head>
    <body>
        <p>作成完了しました。</p>
        <ul>
          <li><a href="index.php">戻る</a></li>
        </ul>
    </body>
</html>
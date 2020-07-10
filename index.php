<?php ini_set( 'display_errors', 1 ); ?>
<?php

session_start();

require "funcs.php";

$status=0;

if (isset($_SESSION["kanri_flg"])){
    $kanri_flg = $_SESSION["kanri_flg"];
}

//式
if (!isset($_SESSION["chk_ssid"])) {
    $status = 0;
  }elseif($_SESSION["chk_ssid"] != session_id()){
    $status = 1;
  }
  else{
    $_SESSION["chk_ssid"] = session_id();
    $status = 2;
}
//ユーザかショップかを判別する
if($status==2){
    if (isset($_SESSION["user_name"])){
        $status = 3;
        if ($kanri_flg==1){
            $status = 5;
        }
    }elseif(isset($_SESSION["shop_name"])){
        $status = 4;
    }
}

//sessionが2なら(ログイン前)login.phpに移動
if($status==2 or $status==0){
 header("Location: login.php");
}
echo $status;

//statusの値でviewを変更する
if($status==3){
    $view ="<h3>ようこそ「".$_SESSION['user_name']."」さん</h3>";
    $view .="<p><a href='user_reserve.php'>献立確認</a></p>";
    $view .= "<p><a href='logout.php'>ログアウト</a></p>";
}elseif($status==4){
    $view ="<h3>ようこそ「".$_SESSION['shop_name']."」さん</h3>";
    $view .="<p><a href='cook_regist.php'>対応可能日登録</a></p>";
    $view .= "<p><a href='logout.php'>ログアウト</a></p>";
}elseif($status==5){
    $view ="<h3>ようこそ「".$_SESSION['user_name']."」さん</h3>";
    $view .="<p><a href='user_list.php'>ユーザ一覧</a></p>";
    $view .="<p><a href='shop_list.php'>ショップ一覧</a></p>";
    $view .="<p><a href='reserve_management.php'>予約管理</a></p>";
    $view .= "<p><a href='logout.php'>ログアウト</a></p>";

}
else{
    $view = "<p><a href='create_user.php'>ユーザー作成</a></p>";
    $view .= "<p><a href='login.php'>ユーザーログイン</a></p>";
    $view .= "<p><a href='create_shop.php'>ショップ開設</a></p>";
    $view .= "<p><a href='loginshop.php'>ショップログイン</a>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
<!-- ヘッダーは下記を参照したhttps://rico-notes.com/programming/html/header-design/ -->
    <h1>献立</h1>
    <nav class="pc-nav">
        <ul>
            <!-- <li><a href="#">ABOUT</a></li>
            <li><a href="#">SERVICE</a></li> -->
            <li><a href="index.php">Top</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <style>
        * {
        box-sizing: border-box;
        }
        body {
        margin: 0;
        padding: 0;
        font-family: "Hiragino Kaku Gothic Pro", "ヒラギノ角ゴ Pro W3", メイリオ, Meiryo, "ＭＳ Ｐゴシック", "Helvetica Neue", Helvetica, Arial, sans-serif;
        background-color: #e6e6e6;
        }
        header {
        padding: 30px 4% 10px;
        position: fixed;
        top: 0;
        width: 100%;
        background-color: #fff;
        display: flex;
        align-items: center;
        }
        header h1 {
        margin: 0; padding: 0;
        font-size: 20px;
        }
        /* h1 a {	
        text-decoration: none;
        color: #4b4b4b;
        } */
        header nav {
        margin: 0 0 0 auto;
        }
        nav ul {
        list-style: none;
        margin: 0;
        display: flex;
        }
        li {
        margin: 0 0 0 15px;
        font-size: 14px;
        }
    </style>
</header>
<body>

    <?=$view?>
    
</body>

</html>
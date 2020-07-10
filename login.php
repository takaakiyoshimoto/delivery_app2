<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ユーザーログイン</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<body class="text-center">

<h2>ユーザーログインフォーム</h2>
<!-- <form action="login_act.php" method="post">
  <fieldset>
      <legend>登録</legend>
      <label>ログインID: <input type="text" name="lid" id="lid"></label><br>
      <label>ログインパスワード: <input type="text" name="lpw" id="pass"></label><br>
      <input type="submit" value="送信" id="send">
  </fieldset>
</form> -->

<form class="form-signin" action="login_act.php" method="post">
  <h1>Please sign in</h1>
  <input type="id" name="lid" class="form-control" placeholder="Login ID" required="" autofocus="">
  <input type="password" name="lpw" class="form-control" placeholder="Password" required="">
  <br>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>
<a href="create_user.php" class="btn btn-success">はじめて</a>
<a href="loginshop.php" class="btn btn-info">ショップとしてログイン</a>

<style>
.form-signin {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
}
form {
    display: block;
    margin-top: 0em;
}
.text-center {
    text-align: center!important;
}
body{
  background-color: #E6E6E6
    
}

</style>


</body>
</html>
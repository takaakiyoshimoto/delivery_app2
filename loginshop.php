<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ショップログイン</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<body>

<h2>ショップログインフォーム</h2>
<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->

<form action="loginshop_act.php" method="post">
  <fieldset>
      <legend>登録</legend>
      <label>ログインID: <input type="text" name="lid" id="lid"></label><br>
      <label>ログインパスワード: <input type="text" name="lpw" id="pass"></label><br>
      <input type="submit" value="送信" id="send">
  </fieldset>
</form>


</body>
</html>
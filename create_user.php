<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新規ユーザー作成</title>
</head>
    <body>
        <form action="create_user_process.php" method="post">
        <fieldset>
            <legend>登録</legend>
            <label>お名前: <input type="text" name="name" id="name"></label><br>
            <label>住所:<input type="text" name="address" id="address"></label><br>
            <label>ログインID: <input type="text" name="lid" id="lid"></label><br>
            <label>ログインパスワード: <input type="text" name="lpw" id="pass"></label><br>
            <input type="submit" value="送信" id="send">
        </fieldset>
        </form>
    </body>
</html>
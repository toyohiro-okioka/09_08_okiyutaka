<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
</head>

<body>
  <form action="login_act.php" method="POST">
    <!-- <form> -->
    <fieldset>
      <legend>ログイン画面</legend>
      <div>
        <!-- username: <input type="text"> -->
        username: <input type="text" name="username">
      </div>
      <div>
        <!-- password: <input type="text"> -->
        password: <input type="text" name="password">
      </div>
      <div>
        <button>ログイン</button>
      </div>
      <a href="register.php">新規登録画面へ</a>
    </fieldset>
  </form>

</body>

</html>
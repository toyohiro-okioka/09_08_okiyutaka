<?php

session_start(); // セッションの開始
include('functions.php'); // 関数ファイル読み込み
check_session_id(); // idチェック関数の実行

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー登録画面</title>
</head>

<body>
  <form action="user_create.php" method="POST">
    <fieldset>
      <legend>ユーザー登録画面</legend>
      <a href="user_read.php">ユーザー一覧画面</a>
      <a href="menu.php">メニュー画面</a>
      <a href="logout.php">ログアウト</a>
      <div>
        username: <input type="text" name="username">
      </div>
      <div>
        password: <input type="text" name="password">
      </div>
      <div>
        admin: <input type="checkbox" name="admin" value="1">
      </div>
      <div>
        delete: <input type="checkbox" name="delete" value="1">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>
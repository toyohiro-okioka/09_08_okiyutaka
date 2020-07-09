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
  <title>todo登録画面</title>
</head>

<body>
  <form action="todo_create.php" method="POST">
    <fieldset>
      <legend>todo登録画面</legend>
      <a href="todo_read.php">todo一覧画面</a>
      <a href="menu.php">メニュー画面</a>
      <a href="logout.php">ログアウト</a>
      <div>
        todo: <input type="text" name="todo">
      </div>
      <div>
        deadline: <input type="date" name="deadline">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>
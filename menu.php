<?php

// var_dump($_POST);
// exit();

session_start();
include("functions.php");
check_session_id(); // idチェック関数の実行
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>メニュー画面</title>
</head>

<body>
  <fieldset>
    <legend>メニュー画面</legend>
    <a href="todo_read.php">todo一覧画面</a>

    <?php
    if ($_SESSION['is_admin'] == 1) {
    ?>
      <a href="user_read.php">ユーザー一覧画面</a>
    <?php
    } 
    ?>

    <a href="logout.php">ログアウト</a>
  </fieldset>
</body>

</html>
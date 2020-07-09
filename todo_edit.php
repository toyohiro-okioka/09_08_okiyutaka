<?php

// var_dump($_GET);
// exit();

session_start(); // セッションの開始
include("functions.php");
check_session_id(); // idチェック関数の実行

// idの受け取り
$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

// データ取得SQL作成
$sql = '';
$sql = 'SELECT * FROM todo_table WHERE id=:id';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は指定の11レコードを取得
  // fetch()関数でSQLで取得したレコードを取得できる
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
  // var_dump($record);
  // exit();
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>todo編集画面</title>
</head>

<body>
  <form action="todo_update.php" method="POST">
    <fieldset>
      <legend>todo編集画面</legend>
      <a href="todo_read.php">todo一覧画面</a>
      <div>
        <!-- todo: <input type="text" name="todo"> -->
        todo:<input type="text" name="todo" value="<?= $record["todo"] ?>">
      </div>
      <div>
        <!-- deadline: <input type="date" name="deadline"> -->
        deadline:<input type="date" name="deadline" value="<?= $record["deadline"] ?>">
      </div>

      <!-- hidden -->
      <input type="hidden" name="id" value="<?= $record['id'] ?>">

      <div>
        <button>submit</button>
      </div>

    </fieldset>
  </form>

</body>

</html>
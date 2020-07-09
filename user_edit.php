<?php

// var_dump($_GET);
// exit();

session_start(); // セッションの開始
include("functions.php");
check_session_id(); // idチェック関数の実行

$id = $_GET["id"];

$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM users_table WHERE id=:id';

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
}

if ($record["is_admin"] == "1") {
  $is_admin_checked = "checked";
} else {
  $is_admin_checked = "";
}

if ($record["is_deleted"] == "1") {
  $is_deleted_checked = "checked";
} else {
  $is_deleted_checked = "";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー編集画面</title>
</head>

<body>
  <form action="user_update.php" method="POST">
    <fieldset>
      <legend>ユーザー編集画面</legend>
      <a href="user_read.php">ユーザー一覧画面</a>
      <div>
        <!-- username: <input type="text" name="username"> -->
        username:<input type="text" name="username" value="<?= $record["username"] ?>">
      </div>
      <div>
        <!-- password: <input type="text" name="deadline"> -->
        password:<input type="text" name="password" value="<?= $record["password"] ?>">
      </div>

      <div>
        <!-- admin: <input type="checkbox" name="admin"> -->
        admin:<input type="checkbox" name="admin" value="1" <?= $is_admin_checked ?>>

      </div>
      <div>
        <!-- delete: <input type="checkbox" name="delete"> -->
        delete:<input type="checkbox" name="delete" value="1" <?= $is_deleted_checked ?>>
      </div>
      <div>
        <button>submit</button>
      </div>
      <input type="hidden" name="id" value="<?= $record["id"] ?>">
    </fieldset>
  </form>

</body>

</html>
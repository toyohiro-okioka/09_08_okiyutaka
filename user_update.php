<?php

// var_dump($_POST);
// exit();

session_start();
include("functions.php");
check_session_id(); // idチェック関数の実行

// 送信データ受け取り
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$admin = $_POST['admin'];
$delete = $_POST['delete'];

// DB接続
$pdo = connect_to_db();

// UPDATE文を作成&実行
$sql = "";
$sql = "UPDATE users_table SET username=:username, 	password=:password,is_admin=:admin,is_deleted=:delete,
updated_at=sysdate() WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':admin', $admin, PDO::PARAM_STR);
$stmt->bindValue(':delete', $delete, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は一覧ページファイルに移動し，一覧ページの処理を実行する
  header("Location:user_read.php");
  exit();
}

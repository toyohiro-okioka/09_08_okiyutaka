<?php

session_start();
include("functions.php");
check_session_id(); // idチェック関数の実行

$username = $_SESSION['username'];

// 送信データ受け取り
$id = $_POST['id'];
$todo = $_POST['todo'];
$deadline = $_POST['deadline'];

// DB接続
$pdo = connect_to_db();

// UPDATE文を作成&実行
$sql = "";
$sql = "UPDATE todo_table SET todo=:todo, deadline=:deadline,
updated_at=sysdate(), username=:username WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は一覧ページファイルに移動し，一覧ページの処理を実行する
  header("Location:todo_read.php");
  exit();
}

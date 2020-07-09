<?php
// var_dump($_POST);
// exit();

session_start(); // セッションの開始
include('functions.php'); // 関数ファイル読み込み
$pdo = connect_to_db(); // DB接続

// データ受け取り
$username = $_POST['username']; // データ受け取り→変数に入れる
$password = $_POST['password'];

// データ取得SQL作成&実行
$sql = '';

// SQL実行時にエラーがある場合はエラーを表示して終了
$sql = 'SELECT * FROM users_table
WHERE username=:username
AND password=:password';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

// うまくいったらデータ（1レコード）を取得
$val = $stmt->fetch(PDO::FETCH_ASSOC);

// ユーザ情報が取得できない場合はメッセージを表示
if (!$val) {
  echo "<p>ログイン情報に誤りがあります．</p>";
  echo '<a href="login.php">login</a>';
  exit();
} else {
  // ログインできたら情報をsession領域に保存して一覧ページへ移動
  $_SESSION = array(); // セッション変数を空にする
  $_SESSION["session_id"] = session_id();
  $_SESSION["is_admin"] = $val["is_admin"];
  $_SESSION["username"] = $val["username"];
  $_SESSION["is_admin"] = $val["is_admin"];
  header("Location:menu.php"); // 一覧ページへ移動
  exit();
}

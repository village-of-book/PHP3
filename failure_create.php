<?php
//DB接続
// var_dump($_POST);
// exit();
include('failure_functions.php');
$pdo = connect_to_db();

// failure_create.php
$title = $_POST['title'];
$text_failure = $_POST['text_failure'];
$text_success = $_POST['text_success'];
$key_word01 = $_POST['key_word01'];

// SQL作成&実行
$sql = 'INSERT INTO memo(id, title, text_failure, text_success, created_at, updated_at, key_word01) VALUES (NULL, :title, :text_failure, :text_success, now(), now(), :key_word01)';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':text_failure', $text_failure, PDO::PARAM_STR);
$stmt->bindValue(':text_success', $text_success, PDO::PARAM_STR);
$stmt->bindValue(':key_word01', $key_word01, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// SQL実行の処理
header('Location:failure_input.php');
exit();
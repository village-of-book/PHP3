<?php
include('failure_functions.php');
// 入力項目のチェック
if (
    !isset($_POST['title']) || $_POST['title'] === '' ||
    !isset($_POST['text_failure']) || $_POST['text_failure'] === '' ||
    !isset($_POST['text_success']) || $_POST['text_success'] === '' ||
    !isset($_POST['id']) || $_POST['id'] === ''
  ) {
    exit('paramError');
  }
  
  $title = $_POST['title'];
  $text_failure = $_POST['text_failure'];
  $text_success = $_POST['text_success'];
  $id = $_POST['id'];  

// DB接続
$pdo = connect_to_db();


// SQL実行
$sql = 'UPDATE memo SET title=:title, text_failure=:text_failure, text_success=:text_success, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':text_failure', $text_failure, PDO::PARAM_STR);
$stmt->bindValue(':text_success', $text_success, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:failure_input.php");
exit();


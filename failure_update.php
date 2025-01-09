<?php
session_start();
include("functions.php");
check_session_id();
// <?php
// include('failure_functions.php');

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
  $key_word01 = $_POST['key_word01'];
  $key_word02 = $_POST['key_word02'];
  $key_word03 = $_POST['key_word03'];
  $key_word04 = $_POST['key_word04'];
  $key_word05 = $_POST['key_word05'];
  
// DB接続
$pdo = connect_to_db();


// SQL実行
$sql = 'UPDATE memo SET title=:title, text_failure=:text_failure, text_success=:text_success, updated_at=now() , key_word01=:key_word01 , key_word02=:key_word02 , key_word03=:key_word03 , key_word04=:key_word04 , key_word05=:key_word05 WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':text_failure', $text_failure, PDO::PARAM_STR);
$stmt->bindValue(':text_success', $text_success, PDO::PARAM_STR);
$stmt->bindValue(':key_word01', $key_word01, PDO::PARAM_STR);
$stmt->bindValue(':key_word02', $key_word02, PDO::PARAM_STR);
$stmt->bindValue(':key_word03', $key_word03, PDO::PARAM_STR);
$stmt->bindValue(':key_word04', $key_word04, PDO::PARAM_STR);
$stmt->bindValue(':key_word05', $key_word05, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:failure_input.php");
exit();
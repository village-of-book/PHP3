<?php
include("failure_functions.php");
// id受け取り
// var_dump($_GET)
$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM memo WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型 過去の成功のもと（編集画面）</title>
</head>

<body>
  <form action="failure_update.php" method="POST">
    <fieldset>
    <input type="hidden" name="id" value="<?= $record['id'] ?>">
      <legend>DB連携型 過去の成功のもと（編集画面）</legend>
      <a href="failure_input.php">入力画面</a>
      <div>
        タイトル: <input type="text" name="title" value="<?= $record['title'] ?>">
      </div>

        <div>
        ✖︎失敗内容: <input type="textarea" name="text_failure" size="40" value="<?= $record['text_failure'] ?>">
        </div>

        <div>
        ⚪︎成功内容: <input type="textarea" name="text_success" size="40" value="<?= $record['text_success'] ?>">
        </div>

      <div>
        <button>上書き</button>
      </div>
    </fieldset>
  </form>

</body>

</html>
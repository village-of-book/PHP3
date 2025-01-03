<?php
include("failure_functions.php");
// id受け取り
// var_dump($_GET)
// $id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM key_word WHERE id=1';
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
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
  <form action="keyword_update.php" method="POST">
    <fieldset>
    <input type="hidden" name="id" value="<?= $record['id'] ?>">
      <legend>DB連携型 過去の成功のもと（編集画面）</legend>
      <a href="failure_input.php">入力画面</a>

        <div>
        キーワード01: <input type="textarea" name="key_word01" size="40" value="<?= $record['key_word01'] ?>">
        </div>

        <div>
        キーワード02: <input type="textarea" name="key_word02" size="40" value="<?= $record['key_word02'] ?>">
        </div>

        <div>
        キーワード03: <input type="textarea" name="key_word03" size="40" value="<?= $record['key_word03'] ?>">
        </div>

        <div>
        キーワード04: <input type="textarea" name="key_word04" size="40" value="<?= $record['key_word04'] ?>">
        </div>

        <div>
        キーワード05: <input type="textarea" name="key_word05" size="40" value="<?= $record['key_word05'] ?>">
        </div>

      <div>
        <button>上書き</button>
      </div>
    </fieldset>
  </form>

</body>

</html>
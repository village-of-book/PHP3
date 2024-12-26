<?php
include('failure_functions.php');
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM memo ORDER BY id DESC';

$stmt = $pdo->prepare($sql);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["title"]}</td>
      <td>{$record["text_failure"]}</td>
      <td>{$record["text_success"]}</td>
            <td>
        <a href='failure_edit.php?id={$record["id"]}'>編集</a>
      </td>
      <td>
        <a href='failure_delete.php?id={$record["id"]}'>削除</a>
      </td>

    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型 失敗アプリ（入力画面）</title>
</head>

<body>
  <form action="failure_create.php" method="POST">
    <fieldset>
      <legend>DB連携型 失敗アプリ（入力画面）</legend>
      <a href="failure_read.php">検索画面へ</a>
      <div>
        タイトル: <input type="text" name="title" required>
      </div>

        <div>
        ✖︎失敗内容: <input type="textarea" name="text_failure" size="40">
        </div>

        <div>
        ⚪︎成功内容: <input type="textarea" name="text_success" size="40">
        </div>

      <div>
        <button>入力</button>
      </div>
    </fieldset>
  </form>

  <fieldset>
    <legend>DB連携型 失敗アプリ（過去データ画面）</legend>
    <!-- <a href="failure_input.php">入力画面</a> -->
    <table>
      <thead>
        <tr>
          <th>タイトル</th>
          <th>失敗</th>
          <th>成功</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>

</body>

</html>
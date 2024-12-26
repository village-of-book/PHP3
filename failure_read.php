<?php
// 検索フォームの値を定義
$read_title = $_POST['read_title'];
echo($read_title);

//DB接続
include('failure_functions.php');
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM `memo` WHERE title LIKE "%' . $_POST["read_title"] . '%"';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
// $stmt->bindValue(':read_title', $read_title, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
// var_dump($result);
// exit();
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["title"]}</td>
      <td>{$record["text_failure"]}</td>
      <td>{$record["text_success"]}</td>
    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型 失敗アプリ（一覧画面）</title>
</head>

<body>
  <form action="failure_read.php" method="POST">
      <fieldset>
        <legend>DB連携型 失敗アプリ（検索キーワード画面）</legend>
        <div>
          タイトル: <input type="text" name="read_title">
        </div>

          <div>
          ✖︎失敗内容: <input type="textarea" name="read_text_failure" size="40">
          </div>

          <div>
          ⚪︎成功内容: <input type="textarea" name="read_text_success" size="40">
          </div>

        <div>
          <button>検索</button>
        </div>
      </fieldset>
    </form>

  <fieldset>
    <legend>DB連携型 失敗アプリ（検索結果画面）</legend>
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
        <!-- ここに<tr><td>タイトル</td><td>失敗</td><td>成功</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>
<?php
session_start();
include("functions.php");
check_session_id();

//DB接続
$pdo = connect_to_db();
// 検索フォームの値を定義
// $read_title = $_POST['read_title'];
// $read_key_word01 = $_POST['read_key_word01'];
// echo($read_key_word01);


// SQL作成&実行
$sql = 'SELECT * FROM `memo` WHERE `key_word01` LIKE "%' . $_POST["read_key_word01"] . '%"';

// SQL作成&実行テスト
// $sql = 
// "SELECT * FROM `memo` 
// WHERE `key_word01` LIKE '. $read_key_word01 .'
// AND WHERE `key_word02` LIKE '. $read_key_word02 .'
// ";
// $sql = 'SELECT * FROM `memo` WHERE title LIKE "%' . $_POST["read_title"] . '%"';

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
      <td>{$record["key_word01"]}</td>
      <td>{$record["key_word02"]}</td>
      <td>{$record["key_word03"]}</td>
      <td>{$record["key_word04"]}</td>
      <td>{$record["key_word05"]}</td>

    </tr>
  ";
}

// キーワード取得SQL
$sql_key_word = 'SELECT * FROM key_word';

$stmt_key_word = $pdo->prepare($sql_key_word);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status_key_word = $stmt_key_word->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result_key_word = $stmt_key_word->fetchAll(PDO::FETCH_ASSOC);

$output_key_word01 = "";
foreach ($result_key_word as $record) {
  $output_key_word01 .= "
    <tr>
      <td>{$record["key_word01"]}</td>
    </tr>
  ";
}

$output_key_word02 = "";
foreach ($result_key_word as $record) {
  $output_key_word02 .= "
    <tr>
      <td>{$record["key_word02"]}</td>
    </tr>
  ";
}

$output_key_word03 = "";
foreach ($result_key_word as $record) {
  $output_key_word03 .= "
    <tr>
      <td>{$record["key_word03"]}</td>
    </tr>
  ";
}

$output_key_word04 = "";
foreach ($result_key_word as $record) {
  $output_key_word04 .= "
    <tr>
      <td>{$record["key_word04"]}</td>
    </tr>
  ";
}

$output_key_word05 = "";
foreach ($result_key_word as $record) {
  $output_key_word05 .= "
    <tr>
      <td>{$record["key_word05"]}</td>
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
        <a href="failure_read.php">検索画面へ</a>
        <a href="user_logout.php">logout</a>
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
          <input type="checkbox" name="read_key_word01">:キーワード01: <?= $output_key_word01 ?>
          </div>

          <div>
          <input type="checkbox" name="read_key_word01">:キーワード02: <?= $output_key_word02 ?>
          </div>

          <div>
          <input type="checkbox" name="read_key_word01">:キーワード03: <?= $output_key_word03 ?>
          </div>

          <div>
          <input type="checkbox" name="read_key_word01">:キーワード04: <?= $output_key_word04 ?>
          </div>

          <div>
          <input type="checkbox" name="read_key_word01">:キーワード05: <?= $output_key_word05 ?>
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
          <th>kw01</th>
          <th>kw02</th>
          <th>kw03</th>
          <th>kw04</th>
          <th>kw05</th>
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
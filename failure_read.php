<?php
session_start();
include("functions.php");
check_session_id();

//DB接続
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
      <td>{$record["key_word01"]}</td>
      <td>{$record["key_word02"]}</td>
      <td>{$record["key_word03"]}</td>
      <td>{$record["key_word04"]}</td>
      <td>{$record["key_word05"]}</td>
      <td>
        <a href='failure_edit.php?id={$record["id"]}'>編集</a>
      </td>
      <td>
        <a href='failure_delete.php?id={$record["id"]}'>削除</a>
      </td>

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

// memoのidカウントSQL
$sql_memo_count = 'SELECT COUNT(id) AS id_count FROM memo';

$stmt_memo_count = $pdo->prepare($sql_memo_count);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status_memo_count = $stmt_memo_count->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result_memo_count = $stmt_memo_count->fetch(PDO::FETCH_ASSOC);
$memo_count = "";
$list = [];
array_push($list, $result_memo_count);
// foreach ($result_memo_count as $record) {
//   $memo_count .= "
//     <tr>
//       <td>{$record["id_count"]}</td>
//     </tr>
//   ";
// }

// echo($result_memo_count);
// echo '<pre>';
// var_dump($list);
// echo '<pre>';
// exit();

// foreach ($result_memo_count as $record) {
//   $memo_count .= "
//     <tr>
//       <td>{$record["id_count"]}</td>
//     </tr>
//   ";
// }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型 失敗アプリ（一覧画面）</title>
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  console.log("hello");
</script>
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
    <legend>DB連携型 失敗アプリ（一覧画面）</legend>
    <!-- <a href="failure_input.php">入力画面</a> -->
     <thead>これまで積み重ねてきた成功のもと<?= json_encode($list)?>個</thead>
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
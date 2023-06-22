<?php
// 各種項目設定
$dbn ='mysql:dbname=game_generator;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// SQL作成&実行
$sql = 'SELECT * FROM resource_table ORDER BY updated_at ASC';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump( $result );
// echo '</pre>';
// exit();

$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
        <td>{$record["updated_at"]}</td>
        <td>{$record["category"]}</td>
        <td>{$record["name"]}</td>
        <td>{$record["age"]}</td>
        <td>{$record["description"]}</td>
    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB一覧画面</title>
</head>

<body>
  <fieldset>
    <legend>DB一覧画面</legend>
    <a href="index.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>update_time</th>
          <th>category</th>
          <th>name</th>
          <th>age</th>
          <th>description</th>
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


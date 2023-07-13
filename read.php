<?php
session_start();
include("functions.php");
check_session_id();

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM resource_table WHERE deleted_at IS NULL ORDER BY created_at ASC';
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
        <td>{$record["description"]}</td>";
      if($_SESSION['is_admin'] === 1) {
        $output .= "
          <td>
            <a href='edit.php?id={$record["id"]}'>edit</a>
          </td>
          <td>
            <a href='delete.php?id={$record["id"]}'>delete</a>
          </td>";
      }
  $output .= "
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
    <legend>DB一覧画面 <?= $_SESSION['username'] ?>さん</legend>
    <a href="input.php">入力画面</a>
    <a href="logout.php">logout</a>
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
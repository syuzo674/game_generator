<?php
include("function.php");

$id = $_GET["id"];

// DB接続
$pdo = connect_to_db();

// SQL実行
// $sql = 'DELETE FROM resource_table WHERE id=:id';
$sql = 'UPDATE resource_table SET deleted_at=now() WHERE id=:id';

// バインド変数を設定
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:read.php');
exit();

?>
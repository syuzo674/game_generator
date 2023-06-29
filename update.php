<?php
include("function.php");

// POSTデータ確認
if (
    !isset($_POST["name"]) || $_POST["name"] === "" ||
    !isset($_POST["age"]) || $_POST["age"] === "" ||
    !isset($_POST["description"]) || $_POST["description"] === "" || 
    !isset($_POST["category"]) || $_POST["category"] === "" ||
    !isset($_POST["id"]) || $_POST["id"] === ""

) {
    exit("データが足りません");
}

// POSTを受け取り
$name = $_POST['name'];
$age = $_POST['age'];
$description = $_POST['description'];
$category = $_POST['category'];
$id = $_POST['id'];

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'UPDATE resource_table SET name=:name, age=:age, description=:description, category=:category, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:read.php');
exit();


?>
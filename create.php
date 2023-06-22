<?php
// まずはデータが取得された確認
//var_dump($_POST);
//exit();

// POSTデータ確認
if (
    //入力データが足りないパターンの処理
    !isset($_POST["name"]) || $_POST["name"] === "" ||
    !isset($_POST["age"]) || $_POST["age"] === "" ||
    !isset($_POST["description"]) || $_POST["description"] === "" || 
    !isset($_POST["category"]) || $_POST["category"] === ""

    ){
    exit("データが足りません");
}

// POSTを受け取り
$name = $_POST['name'];
$age = $_POST['age'];
$description = $_POST['description'];
$category = $_POST['category'];

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
$sql = 'INSERT INTO resource_table (id, name, age, description, category, created_at, updated_at) VALUES (NULL, :name, :age, :description, :category, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// SQL実行の処理
header('Location:index.php');
exit();


?>
<?php
session_start();
include("functions.php");
check_session_id();

// id受け取り
// var_dump($_GET);
// exit();

$id = $_GET["id"];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM resource_table WHERE id=:id';

// バインド変数を設定
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集画面</title>
</head>

<body>
  <form action="update.php" method="POST">
    <fieldset>
      <legend>編集画面</legend>
      <a href="read.php">一覧画面</a>
      <div>
        name:<br> <input type="text" name="name" value="<?= $result['name'] ?>">
      </div>
      <div>
        age:<br> <input type="text" name="age" value="<?= $result['age'] ?>">
      </div>
      <div>
        description:<br> <textarea name="description" cols="50" rows="5" ><?= $result['description'] ?></textarea>
      </div>
      <div>
        category: <br>
          <select name="category" >
            <option value="">選択してください</option>
            <option value="new_member"<?php if ($result['category'] === 'new_member') echo 'selected'; ?>>新メンバー</option>
            <option value="Existing_member" <?php if ($result['category'] === 'Existing_member') echo 'selected'; ?>>既存メンバー</option>
          </select>
      </div>
      <input type="hidden" name="id" value="<?= $result['id'] ?>">
      <div>
        <button>submit</button>
      </div>
      <input type="hidden" name="id" value="<?= $result["id"] ?>">
    </fieldset>
  </form>

</body>

</html>
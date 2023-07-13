<?php
session_start();
include('functions.php');
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB入力画面</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <form action="create.php" method="POST">
    <fieldset>
      <legend>DB入力画面</legend>
      <a href="read.php">一覧画面</a>
      <div>
        name:<br> <input type="text" name="name">
      </div>
      <div>
        age:<br> <input type="text" name="age">
      </div>
      <div>
        description:<br> <textarea name="description" cols="50" rows="5"></textarea>
      </div>
      <div>
        category: <br>
          <select name="category">
            <option value="">選択してください</option>
            <option value="new_member">新メンバー</option>
            <option value="Existing_member">既存メンバー</option>
          </select>
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>
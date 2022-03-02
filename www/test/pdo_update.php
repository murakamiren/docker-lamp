<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bulma.min.css" />
    <title>my first php</title>
</head>

<body>
    <?php
    require_once("../assets/php/dbInfo.php");

    if (!$user_name && !$age && !$hobby) {
        try {
            //PDO update
            $dbh = new PDO(dsn, user, ps);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $userId = $_POST['id'];
            $user_name = $_POST['name'];
            $age = $_POST['age'];
            $hobby = $_POST['hobby'];
            $isActive = $_POST['active'];

            //sql update文
            $sql = "UPDATE tbl_user SET user_name = :user_name, age = :age, hobby = :hobby, isActive = :isActive WHERE id = :id";
            $prepareUpdate = $dbh->prepare($sql);
            $editData = array(':id' => $userId, ':user_name' => $user_name, ':age' => $age, ':hobby' => $hobby, 'isActive' => $isActive);
            $prepareUpdate->execute($editData);

            echo "<p>データ更新しましたー</p>";
        } catch (PDOException $e) {
            exit("cant update data" . $e->getMessage());
        } finally {
            $dbh = null;
        }
    }

    ?>
    <a href="myfirstphp.php">データ一覧に戻る</a>
</body>
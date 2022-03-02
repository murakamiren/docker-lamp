<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bulma.min.css" />
    <title>Document</title>
</head>
<style>
    .active_user {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 10px;
        margin-left: 20px;
        font-size: 20px;
    }
</style>

<body>
    <h1>アクティブユーザー一覧</h1>
    <a href="myfirstphp.php">戻る</a>
    <?php
    require_once("../assets/php/dbInfo.php");

    try {
        //PDO データ取得
        $dbh = new PDO(dsn, user, ps);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM tbl_user WHERE isActive = :id";
        $prepareFetch = $dbh->prepare($sql);
        $prepareFetch->bindValue(":id", true, PDO::PARAM_BOOL);
        $prepareFetch->execute();

        $res = $prepareFetch->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $data) {
            echo "<div class='active_user'>";
            echo "<p>id: ${data['id']}</p>";
            echo "<p>名前は${data['user_name']}</p>";
            echo "<p>年齢は${data['age']}歳</p>";
            echo "<p>趣味は${data['hobby']}</p>";
            echo "<button><a href='edit.php?id=${data['id']}&name=${data['user_name']}&age=${data['age']}&hobby=${data['hobby']}&active=${data['isActive']}'>編集する</a></button>";
            echo "</div>";
        }
    } catch (PDOException $e) {
        exit("cant fetch data" . $e->getMessage());
    } finally {
        $dbh = null;
    }
    ?>
</body>

</html>
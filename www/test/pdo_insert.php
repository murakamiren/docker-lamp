<!DOCTYPE html>
<html lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="このページの説明文">
    <title>insert</title>
    <link rel="stylesheet" href="/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<body>

    <?php
    //php PDOでのデータベース接続からデータの追加(insert)

    require_once("../assets/php/dbInfo.php");

    try {
        //new PDOでインスタンス化し,db接続
        $dbh = new PDO(dsn, user, ps);
        //エラーが発生した時にPDOExceptionの例外を投げてくれる
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //form.phpからpostされたデータをここで取得
        $user_name = $_POST['name'];
        $age = $_POST['age'];
        $hobby = $_POST['hobby'];

        //dbにデータを追加するsql文をここで定義しておく
        $sql = "INSERT INTO tbl_user (user_name, age, hobby) VALUES (:user_name, :age, :hobby)";
        //データ追加準備
        $prepareInsert = $dbh->prepare($sql);
        //form.phpから取得したデータを定義したsql文に従って連想配列で定義
        $params = array(':user_name' => $user_name, ':age' => $age, ':hobby' => $hobby);
        //上で定義したデータの追加を実行する
        $prepareInsert->execute($params);

        echo "<p>データ登録しましたよ</p>";
    } catch (PDOException $e) {
        //dbに接続できなかった、データを登録できなかった場合はスローされここでエラーログを吐く
        exit("cant load database" . $e->getMessage());
    } finally {
        //処理が終了したらdbとの接続を切る
        $dbh = null;
    }
    ?>

    <a href="myfirstphp.php">データ一覧に戻る</a>

</body>
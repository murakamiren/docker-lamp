<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bulma.min.css" />
    <title>my first php</title>
</head>
<style>
    .data {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 20px;
        margin-left: 20px;
        font-size: 20px;
    }
</style>

<body>
    <div>
        <h1 class="title">its works!</h1>
        <div>
            <a href="form.php">データ登録</a>
        </div>
        <div>
            <a href="only_active_users.php">アクティブユーザーだけ取得</a>
        </div>
        <?php
        //mysqli(手続き型)でのデータベース接続とデータ取り出し
        //mysqliはphp5.5以降で非推奨、7.0で削除となったmysql_系のメソッドの代替
        //mysqliはpdoよりも「多くのことができる」
        //具体例: 非同期処理、複数クエリ発行などの最新のmysql固有固有の機能
        //普段使いはpdoの方が良さそう(汎用的で一般的な処理であればmysqliを使う理由がないため)

        //db接続に必要な情報
        $host = "database";
        $username = "docker";
        $ps = "docker";
        $dbname = "test_data";
        // $port = 4000;

        //mysqli_connectの引数に上で定義した情報を入れ、db接続
        $db = mysqli_connect($host, $username, $ps, $dbname);
        //文字化け対策のcharset指定
        mysqli_set_charset($db, "utf8");

        //dbに接続できなかった場合はここで処理が終了する
        if (!$db) {
            die("接続無理でした");
        };

        //これが出力されれば接続成功
        echo "<p>接続しました</p>";

        //sql文の定義
        $result = mysqli_query($db, "SELECT * FROM tbl_user");

        //上で定義したsql文をmysqli_fetch_arrayの第一引数にし、データを取り出す
        //受け取るデータは連想配列になっているのでwhile文で展開し、echoでhtmlとして出力
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            // var_dump($row);
            echo "<div class='data'>";
            echo "<p>id: ${row['id']}</p>";
            echo "<p>名前は${row['user_name']}</p>";
            echo "<p>年齢は${row['age']}歳</p>";
            echo "<p>趣味は${row['hobby']}</p>";
            if ($row['isActive']) {
                echo "<p>アクティブユーザーです</p>";
            }
            echo "<button><a href='edit.php?id=${row['id']}&name=${row['user_name']}&age=${row['age']}&hobby=${row['hobby']}&active=${row['isActive']}'>編集する</a></button>";
            echo "</div>";

            $user = $row["user_name"];
            // foreach($row as $data) {
            //     echo $data['hobby'];
            //     echo "<p>${data}</p>";
            // };
        };

        mysqli_close($db);
        ?>


    </div>
</body>

</html>
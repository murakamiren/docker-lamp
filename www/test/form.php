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
    <h1>データ登録</h1>
    <form action="pdo_insert.php" method="post">
            <div>
                <label>name:</label>
                <input type="text" name="name" require>
            </div>
            <div>
                <label>age:</label>
                <input type="number" name="age" require>
            </div>
            <div>
                <label>hobby:</label>
                <input type="text" name="hobby" require>
            </div>
            <button type="submit" value="登録">登録</button>
    </form>
</body>
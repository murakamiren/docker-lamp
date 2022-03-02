<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    .id-data {
        visibility: visible;
    }
</style>

<body>
    <h1>データ編集</h1>
    <form action="pdo_update.php" method="post">
        <div class="id-data">
            <label>id:</label>
            <span><?= $_GET['id'] ?></span>
            <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
        </div>
        <div>
            <label>name:</label>
            <input type=" text" name="name" value="<?= $_GET['name'] ?>" require>
        </div>
        <div>
            <label>age:</label>
            <input type="number" name="age" value="<?= $_GET['age'] ?>" require>
        </div>
        <div>
            <label>hobby:</label>
            <input type="text" name="hobby" value="<?= $_GET['hobby'] ?>" require>
        </div>
        <div>
            <label>アクティブですか？:</label>
            <input type="radio" name="active" value=1 <?= $_GET['active'] ? 'checked' : '' ?> />はい
            <input type="radio" name="active" value=0 <?= $_GET['active'] ? '' : 'checked' ?> />いいえ
        </div>
        <button type="submit" value="登録">変更する</button>
    </form>
</body>

</html>
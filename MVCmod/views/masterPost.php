<?php
require_once './controllers/masterPostController.php';
$test = new masterPostC();
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>三點半 管理</title>
    <link rel="stylesheet" href="CSS/masterPortStyle.css">
</head>
<body>

    <nav>
        <div id="box">
            <h4>管理員: <?= $master["userName"] ?></h4>
            <a href="./master">商品列表</a>
            <a href="./masterMember">會員列表</a>
            <a href="./masterOrder">訂單管理</a>
            <a href="#">報表統計</a>
            <div></div>
        </div>
    </nav>

    <form action="" method="post" id="chooseTime">
        <input type="submit" value="一天內" name="oneD">
        <input type="submit" value="七天內" name="senD">
        <input type="submit" value="一個月內" name="oneM">

        <div id="date">
            <input type="date" name="date1" id="date1">
            ~
            <input type="date" name="date2" id="date2" value="<?= $nowTime ?>">
            <input type="submit" value="送出" name="choose">
        </div>
    </form>

    <table>
        <tr>
            <th>商品名稱</th>
            <th>販售量</th>
            <th>現在庫存量</th>
            <th>定價</th>
            <th>單項營收</th>
        </tr>

        <?= $test->chooseDay() ?>
    </table>

    <div id="image">
        <?= $test->image() ?>
    </div>

</body>
</html>
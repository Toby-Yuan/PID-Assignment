<?php

require_once("connect.php");
session_start();

if(!isset($_SESSION["uid"])){
    header("location: index.php");
    exit();
}else{
    $uid = $_SESSION["uid"];
    $search = <<<searchIt
    select userName FROM member WHERE id = $uid;
    searchIt;
    $result = mysqli_query($link, $search);
    $row = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>三點半</title>

    <link rel="stylesheet" href="./CSS/memberStyle.css">

</head>
<body>

    <!-- 導覽列 -->
    <nav>
        <div id="box">

            <!--  本頁面各連結 -->
            <div id="link">
                <a href="#">三點半</a>
                <a href="#about">關於我們</a>
                <a href="product.php">熱門商品</a>
                <a href="#contact">聯絡我們</a>
            </div>
            <div></div>
            <div id="member">
                <a href="member.php">會員中心</a>
                &nbsp;
                <a href="buyBus.php">購物車</a>
                <a href="index.php?logout=1">登出</a>
            </div>

        </div>
    </nav>

    <!-- 輪轉圖 -->
    <div id="banner"></div>

    <!-- 關於會員 -->
    <div id="memberOnly">
        <h1>Hello <?= $row["userName"] ?> !!!</h1>
        <div id="change">
            <a href="">修改資料</a>
        </div>
    </div>

    <!-- 歷史紀錄 -->
    <h5>購買紀錄</h5>
    <div id="line"></div>
    <div class="history">
        <h3>日期: <span>2020-08-17</span></h3>
        <p>
            <span>女巫們的宴會</span> x <span>1</span> <br>
            <span>梵谷的星空</span> x <span>2</span>
        </p>
        <h3>Total: <span>540</span></h3>
    </div>

    <!-- 聯絡我們 -->
    <footer>
        <div id="contact">
            <div id="logo">
                <h2>三點半</h2>
            </div>
            <div id="content">
                <p>
                    地址: 台中市西屯區逢甲路20巷<br>
                    聯絡電話: (04)4536782
                </p>
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    </script>
</body>
</html>
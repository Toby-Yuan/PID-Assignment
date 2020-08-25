<?php

session_start();
require_once("connect.php");

if(!isset($_GET["productId"])){
    header("location: product.php");
    exit();
}else{
    $productId = $_GET["productId"];

    $search = "SELECT * FROM `product` WHERE id = $productId";
    $result = mysqli_query($link, $search);
    $row = mysqli_fetch_assoc($result);
}

if(!isset($_SESSION["productNeed"])){
    $_SESSION["productNeed"] = array();
}

if(isset($_POST["submit"])){
    // $_SESSION["productNeed"] = array();
    $arrayNeed[$productId] = $_POST["need"];
    array_push($_SESSION["productNeed"], $arrayNeed);
};

?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>三點半</title>

    <link rel="stylesheet" href="./CSS/oneProductStyle.css">

</head>
<body>

    <!-- 導覽列 -->
    <nav>
        <div id="box">

            <!--  本頁面各連結 -->
            <div id="link">
                <a href="index.php">三點半</a>
                <a href="index.php">關於我們</a>
                <a href="index.php">熱門商品</a>
                <a href="index.php">聯絡我們</a>
            </div>
            <div></div>
            <div id="member">
                <?php if(isset($_SESSION["uid"])) { ?>
                    <a href="member.php">會員中心</a>
                    &nbsp;
                    <a href="buyBus.php">購物車</a>
                    <a href="index.php?logout=1">登出</a>
                <?php } else { ?>
                    <a id="loginOpen">登入</a>
                <?php } ?>
            </div>

        </div>
    </nav>

    <!-- 輪轉圖 -->
    <div id="banner"></div>

    <!-- 產品介紹 -->
    <div id="product">
        <div id="image" style="background-image: url(CSS/product<?= $row["id"] ?>.jpg)"></div>
        <form action="" method="post">
            <h1><?= $row["productName"] ?></h1>
            <h2>定價: <?= $row["price"] ?></h2>

            <div id="select">
                <div class="btn" id="cut">-</div>
                <input type="text" id="need" name="need" value="0">
                <div class="btn" id="sub">+</div>
            </div>

            <input type="submit" value="送出" name="submit">
        </form>
    </div>

    <!-- 測試 -->
    <div id="test">
        <p>here</p>
        <?php var_dump($_SESSION["productNeed"]); ?>
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
        $(document).ready(function (){
            var need = $("#need").val();
            $("#sub").on("click",function (){
                need++;
                $("#need").val(need);
            });

            $("#cut").on("click", function (){
                if(need > 0){
                    need--;
                    $("#need").val(need);
                }
            });
        });
    </script>
</body>
</html>
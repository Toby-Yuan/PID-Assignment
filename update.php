<?php

session_start();
require_once("connect.php");

if(!isset($_SESSION["uid"])){
    header("location: index.php");
    exit();
}else{
    $id = $_SESSION["uid"];
    $searchMember = "SELECT * FROM member WHERE id = $id";
    $result = mysqli_query($link, $searchMember);
    $row = mysqli_fetch_assoc($result);

    $userName = $row["userName"];
    $userPassword = $row["userPassword"];
    $truthName = $row["truthName"];
    $email = $row["email"];
    $phone = $row["phone"];
    $userAddress = $row["userAddress"];
}

if(isset($_POST["submit"])){
    if(isset($_POST["check"])){
        $id = $_SESSION["uid"];
        $userName = $_POST["newName"];
        $userPassword = $_POST["newPassword"];
        $truthName = $_POST["truthName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $userAddress = $_POST["address"];

        $update = <<<updateSql
        UPDATE member SET userName = '$userName', userPassword = '$userPassword', truthName = '$truthName',
        email = '$email', phone = '$phone', userAddress = '$userAddress'
        WHERE id = $id;
        updateSql;
        mysqli_query($link, $update);
        header("location: member.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>三點半</title>

    <link rel="stylesheet" href="./CSS/updateStyle.css">

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
                <a id="loginOpen">登入</a>
            </div>

        </div>
    </nav>

    <!-- 輪轉圖 -->
    <div id="banner"></div>

    <!-- 創建表格 -->
    <div id="formTitle">註冊會員</div>
    <form action="" method="post">
        <label for="newName">帳號</label>
        <input type="text" name="newName" id="newName" placeholder="請輸入8~15位的英文和數字" pattern="\w{8,15}" required value="<?= $userName ?>">
        <label for="newPassword">密碼</label>
        <input type="password" name="newPassword" id="newPassword" placeholder="請輸入8~15位的英文和數字" pattern="\w{8,15}" required value="<?= $userPassword ?>">
        <label for="truthName">本名</label>
        <input type="text" name="truthName" id="truthName" required value="<?= $truthName ?>">
        <label for="phone">電話</label>
        <input type="text" name="phone" id="phone" placeholder="範例: 0912345678" pattern="\d{10}" required value="<?= $phone ?>">
        <label for="email">電子信箱</label>
        <input type="text" name="email" id="email" pattern="\w+([.-]\w+)*@\w+([.]\w+)+" required value="<?= $email ?>">
        <label for="address">地址</label>
        <input type="text" name="address" id="address" required value="<?= $userAddress ?>">
        
        <input type="checkbox" name="check" id="check" value="1">
        <label for="check">我同意本平台的使用者規範</label>

        <div id="btnGroup">
            <input type="submit" value="確認" class="button" name="submit">
            <input type="reset" value="重設" class="button">
        </div>
    </form>

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
<?php

session_start();
require_once("connect.php");

if(!isset($_SESSION["mid"])){
    header("location: index.php");
    exit();
}else{
    $mid = $_SESSION["mid"];
    $searchSession = "SELECT userName, grade FROM webMaster WHERE id = $mid";
    $result = mysqli_query($link, $searchSession);
    $master = mysqli_fetch_assoc($result);
}

$searchPro = "SELECT * FROM product";
$resultPro = mysqli_query($link, $searchPro);

if(isset($_POST["new"])){
    $newProduct = $_POST["newProduct"];
    $newPrice = $_POST["newPrice"];
    $create = "INSERT INTO product (productName, price) VALUES ('$newProduct', $newPrice)";
    mysqli_query($link, $create);
    header("location: master.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>三點半 管理</title>
    <link rel="stylesheet" href="CSS/masterStyle.css">
</head>
<body>
    <nav>
        <div id="box">
            <h4>管理員: <?= $master["userName"] ?></h4>
            <a href="">商品列表</a>
            <a href="">會員列表</a>
            <a href="">訂單管理</a>
            <div></div>
        </div>
    </nav>

    <form action="" method="post" id="allProduct">
        <table>
            <tr>
                <td colspan="5" id="tableName">商品列表</td>
            </tr>
            <tr>
                <th>編號</th>
                <th>照片</th>
                <th>品名</th>
                <th>定價</th>
                <th>修改／刪除</th>
            </tr>

            <?php   
                while($product = mysqli_fetch_assoc($resultPro)) { 
                    $productId = $product["id"];
            ?>

                <tr>
                    <td><?= $product["id"] ?> <input type="text" name="<?= "id".$product["id"] ?>" value="<?= $product["id"] ?>" class="id"></td>
                    <td class="imgIn"><div class="imgBg" style="background-image: url(CSS/product<?= $product["id"] ?>.jpg)"></div></td>
                    <td><input type="text" name="<?= "product".$product["id"] ?>" value="<?= $product["productName"] ?>"></td>
                    <td><input type="text" name="<?= "price".$product["id"] ?>" value="<?= $product["price"] ?>"></td>
                    <td style="width: 200px">
                        <input type="submit" value="修改" name="<?php $update = "update".$product["id"]; echo $update; ?>">
                        <input type="submit" value="刪除" name="<?= "delete".$product["id"] ?>">
                    </td>
                </tr>

            <?php 
                if(isset($_POST["$update"])){
                    $productName = $_POST["product$productId"];
                    $price = $_POST["price$productId"];
                    $updateIt = <<<updateit
                    UPDATE product SET productName = '$productName', price = $price
                    WHERE id = $productId
                    updateit;
                    mysqli_query($link, $updateIt);
                }

                } 
            ?>

            <!-- <tr>
                <td>1 <input type="text" name="id" value="1" class="id"></td>
                <td class="imgIn"><div class="imgBg" style="background-image: url(CSS/product1.jpg)"></div></td>
                <td><input type="text" name="product" value="田園風光"></td>
                <td><input type="text" name="price" value="220"></td>
                <td style="width: 200px">
                    <input type="button" value="修改">
                    <input type="button" value="刪除">
                </td>
            </tr> -->
        </table>
    </form>

    <form action="" method="post">
        <table>
            <tr>
                <td colspan="3" id="tableName">新增商品</td>
            </tr>
            <tr>
                <th>品名</th>
                <th>定價</th>
                <th>確認</th>
            </tr>

            <tr>
                <td><input type="text" name="newProduct"></td>
                <td><input type="text" name="newPrice"></td>
                <td style="width: 200px">
                    <input type="submit" value="新增" name="new">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>
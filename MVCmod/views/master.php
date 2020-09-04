<?php
require_once './controllers/masterController.php';
$test = new masterC();
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
            <a href="#">商品列表</a>
            <a href="masterMember.php">會員列表</a>
            <a href="masterOrder.php">訂單管理</a>
            <a href="masterPost.php">報表統計</a>
            <div></div>
        </div>
    </nav>

    <form action="" method="post" id="allProduct">
        <table>
            <tr>
                <td colspan="6" id="tableName">商品列表</td>
            </tr>
            <tr>
                <th>編號</th>
                <th>照片</th>
                <th>品名</th>
                <th>定價</th>
                <th>庫存</th>
                <th>修改／刪除</th>
            </tr>

            <?php   
                while($product = mysqli_fetch_assoc($resultPro)) { 
                    $productId = $product["id"];
            ?>

                <tr>
                    <td><?= $product["id"] ?> <input type="text" name="<?= "id".$product["id"] ?>" value="<?= $product["id"] ?>" class="id"></td>
                    <td class="imgIn"><div class="imgBg" style="background-image: url(data:image/jpg;charset:utf8;base64,<?= base64_encode($product["productImg"]); ?>)"></div></td>
                    <td><input type="text" name="<?= "product".$product["id"] ?>" value="<?= $product["productName"] ?>"></td>
                    <td><input type="text" name="<?= "price".$product["id"] ?>" value="<?= $product["price"] ?>"></td>
                    <td><input type="text" name="<?= "stock".$product["id"] ?>" value="<?= $product["inStock"] ?>"></td>
                    <td style="width: 200px">
                        <input type="submit" value="修改" name="<?php $update = "update".$product["id"]; echo $update; ?>">
                        <input type="submit" value="刪除" name="<?php $delete = "delete".$product["id"]; echo $delete; ?>">
                    </td>
                </tr>

            <?php 
                if(isset($_POST["$update"])){
                    $productName = $_POST["product$productId"];
                    $price = $_POST["price$productId"];
                    $stock = $_POST["stock$productId"];
                    $time = date("Y-m-d H:i:s");
                    $updateIt = <<<updateit
                    UPDATE product SET productName = '$productName', price = $price, inStock = $stock
                    WHERE id = $productId
                    updateit;
                    $insertSql = "INSERT INTO oldProduct (productId, productName, price, changeTime) VALUES ($productId, '$productName', $price, '$time')";
                    mysqli_query($link, $updateIt);
                    mysqli_query($link, $insertSql);
                    header("location: master.php");
                }

                if(isset($_POST["$delete"])){
                    $deleteIt = "DELETE FROM product WHERE id = $productId";
                    if($master["grade"] < 3){
                        mysqli_query($link, $deleteIt);
                        header("location: master.php");
                    }
                }

                } 
            ?>
        </table>
    </form>

    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td colspan="5" id="tableName">新增商品</td>
            </tr>
            <tr>
                <th>品名</th>
                <th>定價</th>
                <th>庫存</th>
                <th>圖片</th>
                <th>確認</th>
            </tr>

            <tr>
                <td><input type="text" name="newProduct"></td>
                <td><input type="text" name="newPrice"></td>
                <td><input type="text" name="newStock"></td>
                <td><input type="file" name="image"></td>
                <td style="width: 200px">
                    <input type="submit" value="新增" name="new">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>
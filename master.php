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
            <h4>管理員: Dent0204</h4>
            <a href="">商品列表</a>
            <a href="">會員列表</a>
            <a href="">訂單管理</a>
            <div></div>
        </div>
    </nav>

    <form action="" method="post" id="allProduct">
        <table>
            <tr>
                <td colspan="4" id="tableName">商品列表</td>
            </tr>
            <tr>
                <th>編號</th>
                <th>品名</th>
                <th>定價</th>
                <th>修改／刪除</th>
            </tr>

            <tr>
                <td>1 <input type="text" name="id" id="id" value="1"></td>
                <td><input type="text" name="product" value="田園風光"></td>
                <td><input type="text" name="price" value="220"></td>
                <td style="width: 200px">
                    <input type="button" value="修改">
                    <input type="button" value="刪除">
                </td>
            </tr>
        </table>
    </form>

    <form action="" method="post" id="allProduct">
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
                    <input type="button" value="新增">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>
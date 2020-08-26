<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>三點半 管理</title>
    <link rel="stylesheet" href="CSS/masterOrderStyle.css">
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

    <form action="" method="post" id="allOrder">
        <table>
            <tr>
                <td colspan="6" id="tableName">訂單列表</td>
            </tr>
            <tr>
                <th>編號</th>
                <th>送達日期</th>
                <th>訂購人</th>
                <th>內容</th>
                <th>狀態</th>
                <th>送達</th>
            </tr>

            <tr>
                <td>1 <input type="text" name="id" id="id" value="1"></td>
                <td>2020-08-27</td>
                <td>Dent0204</td>
                <td>...</td>
                <td>未配送</td>
                <td style="width: 200px">
                    <input type="button" value="送出">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>
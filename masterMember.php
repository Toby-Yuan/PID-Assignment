<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>三點半 管理</title>
    <link rel="stylesheet" href="CSS/masterMemberStyle.css">
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
                <td colspan="5" id="tableName">會員列表</td>
            </tr>
            <tr>
                <th>編號</th>
                <th>會員帳號</th>
                <th>電子信箱</th>
                <th>聯絡電話</th>
                <th>黑名單</th>
            </tr>

            <tr>
                <td>1 <input type="text" name="id" id="id" value="1"></td>
                <td>Dent0204</td>
                <td>abc@mail.com</td>
                <td>0912345678</td>
                <td style="width: 200px">
                    <input type="button" value="設立">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>
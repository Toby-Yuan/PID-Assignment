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
                <a href="">登入</a>
            </div>

        </div>
    </nav>

    <!-- 輪轉圖 -->
    <div id="banner"></div>

    <!-- 產品介紹 -->
    <div id="product">
        <div id="image" style="background-image: url(CSS/product1.jpg)"></div>
        <form action="" method="post">
            <h1>田園風光</h1>
            <h2>定價: <span>220</span></h2>

            <div id="select">
                <div class="btn" id="cut">-</div>
                <input type="text" id="need" name="need" value="0">
                <div class="btn" id="sub">+</div>
            </div>

            <input type="submit" value="送出">
        </form>
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
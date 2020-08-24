<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>三點半</title>

    <link rel="stylesheet" href="./CSS/productStyle.css">

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

    <!-- 產品 -->
    <form method="POST" action="">
        <div id="product">
            <div>
                <div class="image" style="background-image: url(CSS/product1.jpg)"></div>
                <p>田園風采</p>
                <div class="number">
                    <input type="button" class="cut" id="cut1" value="-">
                    <div class="need" id="need1">0</div>
                    <input type="button" class="add" id="add1" value="+">
                </div>
            </div>
            <div>
                <div class="image" style="background-image: url(CSS/product2.jpg)"></div>
                <p>女巫們的宴會</p>
                <div class="number">
                    <input type="button" class="cut" id="cut2" value="-">
                    <div class="need" id="need2">0</div>
                    <input type="button" class="add" id="add2" value="+">
                </div>
            </div>
            <div>
                <div class="image" style="background-image: url(CSS/product3.jpg)"></div>
                <p>少女的酸甜</p>
                <div class="number">
                    <input type="button" class="cut" id="cut3" value="-">
                    <div class="need" id="need3">0</div>
                    <input type="button" class="add" id="add3" value="+">
                </div>
            </div>
            <div>
                <div class="image" style="background-image: url(CSS/product4.jpg)"></div>
                <p>梵谷的星空</p>
                <div class="number">
                    <input type="button" class="cut" id="cut4" value="-">
                    <div class="need" id="need4">0</div>
                    <input type="button" class="add" id="add4" value="+">
                </div>
            </div>
        </div>

        <input type="submit" value="購買" id="submit">
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
        var need1 = $("#need1").text();
        $("#add1").on("click", function (){
            need1++;
            $("#need1").text(need1);
        });

        $("#cut1").on("click", function (){
            if(need1 > 0){
                need1--;
                $("#need1").text(need1);
            };
        });

        var need2 = $("#need2").text();
        $("#add2").on("click", function (){
            need2++;
            $("#need2").text(need2);
        });

        $("#cut2").on("click", function (){
            if(need2 > 0){
                need2--;
                $("#need2").text(need2);
            };
        });

        var need3 = $("#need3").text();
        $("#add3").on("click", function (){
            need3++;
            $("#need3").text(need3);
        });

        $("#cut3").on("click", function (){
            if(need3 > 0){
                need3--;
                $("#need3").text(need3);
            };
        });

        var need4 = $("#need4").text();
        $("#add4").on("click", function (){
            need4++;
            $("#need4").text(need4);
        });

        $("#cut4").on("click", function (){
            if(need4 > 0){
                need4--;
                $("#need4").text(need4);
            };
        });
    </script>
</body>
</html>
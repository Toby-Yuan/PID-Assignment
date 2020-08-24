<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>三點半</title>

    <link rel="stylesheet" href="./CSS/buyBusStyle.css">

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

    <!-- 購物車 -->
    <form action="" method="post" id="buyBus">
        <div class="detail" id="detail1">
            <div class="image" style="background-image: url(CSS/product3.jpg)"></div>
            <div class="text">
                <h1>少女的酸甜</h1>
                <p>
                    定價: <span id="price1">200</span> <br>
                    數量: <span id="need1" class="need">1</span>
                </p>
            </div>
            <div class="btnGroup">
                <a class="btn" id="add1">+</a>
                <a class="btn" id="cut1">-</a>
                <a class="btn" id="del1">x</a>
            </div>
        </div>

        <div class="detail" id="detail2">
            <div class="image" style="background-image: url(CSS/product2.jpg)"></div>
            <div class="text">
                <h1>女巫們的宴會</h1>
                <p>
                    定價: <span id="price2">220</span> <br>
                    數量: <span id="need2" class="need">3</span>
                </p>
            </div>
            <div class="btnGroup">
                <a class="btn" id="add2">+</a>
                <a class="btn" id="cut2">-</a>
                <a class="btn" id="del2">x</a>
            </div>
        </div>

        <div id="line"> </div>

        <div id="totalPrice">
            <h1>總額: <span id="getTotal">0</span></h1>
        </div>

        <div id="subGroup">
            <input type="submit" value="確認訂單" id="submit" name="submit">
            <input type="submit" value="取消訂單" id="cancel" name="cancel">
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
        $(document).ready(function(){
            function totalPrice (number, price){
                var total = number * price;
                console.log(total);
                return total;
            }

            var need1 = $("#need1").text();
            var price1 = $("#price1").text();
            var total1 = totalPrice(need1, price1);
            $("#add1").on("click", function (){
                need1++;
                $("#need1").text(need1);
                total1 = totalPrice(need1, price1);
                totalA = total1 + total2;
                $("#getTotal").text(totalA);
            });

            $("#cut1").on("click", function (){
                if(need1 > 1){
                    need1--;
                    $("#need1").text(need1);
                    total1 = totalPrice(need1, price1);
                    totalA = total1 + total2;
                    $("#getTotal").text(totalA);
                };
            });

            $("#del1").on("click",function (){
                $("#detail1").hide();
                need1 = 0;
                total1 = totalPrice(need1, price1);
                totalA = total1 + total2;
                $("#getTotal").text(totalA);
            });

            var need2 = $("#need2").text();
            var price2 = $("#price2").text();
            var total2 = totalPrice(need2, price2);
            $("#add2").on("click", function (){
                need2++;
                $("#need2").text(need2);
                total2 = totalPrice(need2, price2);
                totalA = total1 + total2;
                $("#getTotal").text(totalA);
            });

            $("#cut2").on("click", function (){
                if(need2 > 1){
                    need2--;
                    $("#need2").text(need2);
                    total2 = totalPrice(need2, price2);
                    totalA = total1 + total2;
                    $("#getTotal").text(totalA);
                };
            });

            $("#del2").on("click",function (){
                $("#detail2").hide();
                need2 = 0;
                total2 = totalPrice(need2, price2);
                totalA = total1 + total2;
                $("#getTotal").text(totalA);
            });

            var totalA = total1 + total2;
            $("#getTotal").text(totalA);
        });
    </script>
</body>
</html>
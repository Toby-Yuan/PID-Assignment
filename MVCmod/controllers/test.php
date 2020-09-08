<?php

require_once './models/test.php';

class masterPostC {
    public $result;

    public function __construct(){
        $this->result = new masterPostM();
    }

    public function detail(){
        if(isset($_POST["oneD"])){
            return $this->show(1);
        }
        if(isset($_POST["senD"])){
            return $this->show(7);
        }
        if(isset($_POST["oneM"])){
            return $this->show(30);
        }

        if(isset($_POST["choose"])){
            $date1 = $_POST["date1"];
            $date2 = $_POST["date2"];
            if($date1 < $date2){
                $bigDate = $date2;
                $smlDate = $date1;
            }else{
                $bigDate = $date1;
                $smlDate = $date2;
            }

            return $this->showChoose($smlDate, $bigDate);
        }
    }

    public function chooseDayForImg(){
        if(isset($_POST["oneD"])){
            return $this->image(1);
        }

        if(isset($_POST["senD"])){
            return $this->image(7);
        }

        if(isset($_POST["oneM"])){
            return $this->image(30);
        }

        if(isset($_POST["choose"])){
            $date1 = $_POST["date1"];
            $date2 = $_POST["date2"];
            if($date1 < $date2){
                $bigDate = $date2;
                $smlDate = $date1;
            }else{
                $bigDate = $date1;
                $smlDate = $date2;
            }

            return $this->imageChoose($smlDate, $bigDate);
        }
    }

    public function show($day){
        $product = $this->result->product();
        $need = [];
        $oneIncome = [];
        $list = "";
        foreach($product as $key=>$value){
            $pid = $value[0];
            $need[$pid] = 0;
            $oneIncome[$pid] = 0;
        }

        $detail = $this->result->detail($day);
        foreach($detail as $key=>$value){
            $orderDetial = $this->result->orderDetail($value[0]);

            foreach($orderDetial as $key2=>$value2){
                $pid = $value2[0];
                $need[$pid] += $value2[1];
                $oneIncome[$pid] += ($value2[1] * $value2[2]);
            }
        }

        $oldProduct = $this->result->oldProduct();
        foreach($oldProduct as $key=>$value){
            $needIt = 0;
            $income = 0;
            $productName = $value[0];
            $productSame = $this->result->sameName($productName);

            foreach($productSame as $key2=>$value2){
                $pid = $value2[0];
                $productNow = $this->result->productNow($pid);
                
                if(isset($productNow[0]['price'])){
                    $price = $productNow[0]['price'];
                }else{
                    $price = "已下架";
                }

                if(isset($productNow[0]['inStock'])){
                    $stock = $productNow[0]['inStock'];
                }else{
                    $stock = "已下架";
                }

                $needIt += $need[$pid];
                $income += $oneIncome[$pid];
            }

            $one = <<<only
            <tr>
            <td>$productName</td>
            <td>$needIt</td>
            <td>$stock</td>
            <td>$price</td>
            <td>$income</td>
            </tr>
            only;
            $list .= $one;
        }

        $total = array_sum($oneIncome);

        $list .= "<tr><td colspan='5'>總營收: $total</tr>";

        return $list;
    }

    public function showChoose($smlDate, $bigDate){
        $product = $this->result->product();
        $need = [];
        $oneIncome = [];
        $list = "";
        foreach($product as $key=>$value){
            $pid = $value[0];
            $need[$pid] = 0;
            $oneIncome[$pid] = 0;
        }

        $detail = $this->result->detailChoose($smlDate, $bigDate);
        foreach($detail as $key=>$value){
            $orderDetial = $this->result->orderDetail($value[0]);

            foreach($orderDetial as $key2=>$value2){
                $pid = $value2[0];
                $need[$pid] += $value2[1];
                $oneIncome[$pid] += ($value2[1] * $value2[2]);
            }
        }

        $oldProduct = $this->result->oldProduct();
        foreach($oldProduct as $key=>$value){
            $needIt = 0;
            $income = 0;
            $productName = $value[0];
            $productSame = $this->result->sameName($productName);

            foreach($productSame as $key2=>$value2){
                $pid = $value2[0];
                $productNow = $this->result->productNow($pid);
                
                if(isset($productNow[0]['price'])){
                    $price = $productNow[0]['price'];
                }else{
                    $price = "已下架";
                }

                if(isset($productNow[0]['inStock'])){
                    $stock = $productNow[0]['inStock'];
                }else{
                    $stock = "已下架";
                }

                $needIt += $need[$pid];
                $income += $oneIncome[$pid];
            }

            $one = <<<only
            <tr>
            <td>$productName</td>
            <td>$needIt</td>
            <td>$stock</td>
            <td>$price</td>
            <td>$income</td>
            </tr>
            only;
            $list .= $one;
        }

        $total = array_sum($oneIncome);

        $list .= "<tr><td colspan='5'>總營收: $total</tr>";

        return $list;
    }

    public function image($day){
        $product = $this->result->product();
        $need = [];
        $name = [];
        $demand = [];

        foreach($product as $key=>$value){
            $pid = $value[0];
            $need[$pid] = 0;
        }

        $detail = $this->result->detail($day);
        foreach($detail as $key=>$value){
            $orderDetial = $this->result->orderDetail($value[0]);

            foreach($orderDetial as $key2=>$value2){
                $pid = $value2[0];
                $need[$pid] += $value2[1];
            }
        }

        $oldProduct = $this->result->oldProduct();
        foreach($oldProduct as $key=>$value){
            $needIt = 0;
            $productName = $value[0];
            $productSame = $this->result->sameName($productName);

            foreach($productSame as $key2=>$value2){
                $pid = $value2[0];
                $needIt += $need[$pid];
            }

            $name[] = $productName;
            $demand[] = $needIt;
        }

        $name = json_encode($name);
        $demand = json_encode($demand);

        $image = <<<detail
        <canvas id="myChart"  width="200" height="100"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',

                // The data for our dataset
                data: {
                    labels: $name,
                    datasets: [{
                        label: '$day 天銷售量',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: $demand
                    }]
                },

                // Configuration options go here
                options: {}
            });
        </script>
        detail;
        return $image;
    }

    public function imageChoose($smlDate, $bigDate){
        $product = $this->result->product();
        $need = [];
        $name = [];
        $demand = [];

        foreach($product as $key=>$value){
            $pid = $value[0];
            $need[$pid] = 0;
        }

        $detail = $this->result->detailChoose($smlDate, $bigDate);
        foreach($detail as $key=>$value){
            $orderDetial = $this->result->orderDetail($value[0]);

            foreach($orderDetial as $key2=>$value2){
                $pid = $value2[0];
                $need[$pid] += $value2[1];
            }
        }

        $oldProduct = $this->result->oldProduct();
        foreach($oldProduct as $key=>$value){
            $needIt = 0;
            $productName = $value[0];
            $productSame = $this->result->sameName($productName);

            foreach($productSame as $key2=>$value2){
                $pid = $value2[0];
                $needIt += $need[$pid];
            }

            $name[] = $productName;
            $demand[] = $needIt;
        }

        $name = json_encode($name);
        $demand = json_encode($demand);

        $image = <<<detail
        <canvas id="myChart"  width="200" height="100"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',

                // The data for our dataset
                data: {
                    labels: $name,
                    datasets: [{
                        label: '$day 天銷售量',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: $demand
                    }]
                },

                // Configuration options go here
                options: {}
            });
        </script>
        detail;
        return $image;
    }
}

?>
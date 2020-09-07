<?php

require_once './models/masterPostModel.php';

class masterPostC {
    public $result;

    public function __construct(){
        $this->result = new masterPostM();
    }

    public function chooseDay(){
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

    public function show($val){
        $income = 0;
        $product = $this->result->product();
        $list = "";

        foreach($product as $key=>$value){
            $sallDemand = $this->result->demand($val, $value[0], $value[2]);

            $one = <<<only
            <tr>
            <td>$value[1]</td>
            <td>$sallDemand[0]</td>
            <td>$value[4]</td>
            <td>$value[2]</td>
            <td>$sallDemand[1]</td>
            </tr>
            only;

            $income += $sallDemand[1];
            $list .= $one;
        }
        $list .= "<tr><td colspan='5'>總營收: $income</td></tr>";
        return $list;
    }

    public function showChoose($day1, $day2){
        $income = 0;
        $product = $this->result->product();
        $list = "";

        foreach($product as $key=>$value){
            $sallDemand = $this->result->demandDay($day1, $day2, $value[0], $value[2]);

            $one = <<<only
            <tr>
            <td>$value[1]</td>
            <td>$sallDemand[0]</td>
            <td>$value[4]</td>
            <td>$value[2]</td>
            <td>$sallDemand[1]</td>
            </tr>
            only;

            $income += $sallDemand[1];
            $list .= $one;
        }
        $list .= "<tr><td colspan='5'>總營收: $income</td></tr>";
        return $list;
    }

    public function image($var){
        $product = $this->result->product();
        foreach($product as $key=>$value){
            $need = $this->result->needIt($value[0], $var);
            $name[] = $value[1];
            $array[] = $need;
        }

        $name = json_encode($name);
        $array = json_encode($array);
        

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
                        label: '$var 天銷售量',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: $array
                    }]
                },

                // Configuration options go here
                options: {}
            });
        </script>
        detail;
        return $image;
    }

    public function imageChoose($day1, $day2){
        $product = $this->result->product();
        foreach($product as $key=>$value){
            $need = $this->result->needItDay($value[0], $day1, $day2);
            $name[] = $value[1];
            $array[] = $need;
        }

        $name = json_encode($name);
        $array = json_encode($array);
        

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
                        label: '$day1 ~ $day2',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: $array
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
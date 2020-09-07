<?php

require_once './models/database.php';
session_start();

class masterPostM extends database{

    public $member;

    public function __construct(){
        if(!isset($_SESSION['mid'])){
            header("location: ./hello");
            exit();
        }

        $mid = $_SESSION["mid"];
        $search = self::query("SELECT userName, grade FROM webMaster WHERE id = $mid");
        $this->member = $search;
    }

    public function product(){
        $search = self::query("SELECT * FROM product;");
        return $search;
    }

    public function demand($day, $pid, $price){
        $oneIncome = 0;
        $sall = <<<sallserach
        SELECT SUM(demand) demand FROM product p
        JOIN orderDetail od ON od.productId = p.id
        JOIN memberOrder mo ON od.orderId = mo.id
        WHERE DATEDIFF(NOW(), orderTime) < $day AND p.id = $pid
        sallserach;
        $search = self::query($sall);
        if(isset($search[0]['demand'])){
            $sallDemand = $search[0]['demand'];
        }else{
            $sallDemand = 0;
        }
        $oneIncome = $sallDemand*$price;

        $array = [$sallDemand, $oneIncome];
        return $array;
    }

    public function demandDay($day1, $day2, $pid, $price){
        $oneIncome = 0;
        $sall = <<<sallserach
        SELECT SUM(demand) demand FROM product p
        JOIN orderDetail od ON od.productId = p.id
        JOIN memberOrder mo ON od.orderId = mo.id
        WHERE orderTime <= '$day2' AND orderTime >= '$day1' AND p.id = $pid
        sallserach;
        $search = self::query($sall);
        if(isset($search[0]['demand'])){
            $sallDemand = $search[0]['demand'];
        }else{
            $sallDemand = 0;
        }
        $oneIncome = $sallDemand*$price;

        $array = [$sallDemand, $oneIncome];
        return $array;
    }

    public function needIt($pid, $day){
        $sall = <<<sallserach
        SELECT SUM(demand) demand FROM product p
        JOIN orderDetail od ON od.productId = p.id
        JOIN memberOrder mo ON od.orderId = mo.id
        WHERE DATEDIFF(NOW(), orderTime) < $day AND p.id = $pid
        sallserach;
        $sallNeed = self::query($sall);
        return $sallNeed[0]['demand'];
    }

    public function needItDay($pid, $day1, $day2){
        $sall = <<<sallserach
        SELECT SUM(demand) demand FROM product p
        JOIN orderDetail od ON od.productId = p.id
        JOIN memberOrder mo ON od.orderId = mo.id
        WHERE orderTime <= '$day2' AND orderTime >= '$day1' AND p.id = $pid
        sallserach;
        $sallNeed = self::query($sall);
        return $sallNeed[0]['demand'];
        
    }

}

?>
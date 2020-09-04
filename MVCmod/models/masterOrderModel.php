<?php

require_once './models/database.php';
session_start();

class masterOrderM extends database{

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

    public function orderList(){
        $searchOrder = <<<searchorder
        SELECT mo.id, orderDate, orderTime, delivery, userName  FROM memberOrder mo 
        JOIN member m ON m.id = mo.memberId
        ORDER BY orderDate DESC;
        searchorder;
        $result = self::query($searchOrder);
        return $result;
    }

    public function detailGet($value){
        $searchOD = <<<searchod
        SELECT productName, demand
        FROM orderDetail od
        JOIN (SELECT productName, productId FROM oldProduct GROUP BY productId, productName) p ON p.productId = od.productId
        WHERE orderId = $value;
        searchod;
        $search = self::query($searchOD);
        return $search;
    }

    public function updateOrder($value){
        $update = self::query("UPDATE memberOrder SET delivery = 1 WHERE id = $value");
        header("location: ./masterOrder");
    }

}

?>
<?php

require_once './models/database.php';
session_start();

class masterPostM extends database{

    public $member;

    public function __construct(){
    }

    public function product(){
        $search = self::query("SELECT productId FROM oldProduct GROUP BY productId");
        return $search;
    }

    public function detail($day){
        $search = self::query("SELECT * FROM memberOrder WHERE DATEDIFF(NOW(), orderTime) < $day");
        return $search;
    }

    public function detailChoose($smlDate, $bigDate){
        $search = self::query("SELECT * FROM memberOrder WHERE orderTime <= '$bigDate' AND orderTime >= '$smlDate'");
        return $search;
    }

    public function orderDetail($oid){
        $search = <<<searchIt
        SELECT od.productId, demand,
        (SELECT price FROM oldProduct WHERE productId = (SELECT od.productId) AND changeTime = (SELECT ops.changeTime)) price
        FROM memberOrder mo
        JOIN orderDetail od ON od.orderId = mo.id
        JOIN (SELECT op.productId, max(changeTime) changeTime FROM oldProduct op
            JOIN orderDetail od ON od.productId = op.productId
            JOIN memberOrder mo ON mo.id = od.orderId
            WHERE mo.id = $oid AND changeTime < orderTime
            GROUP BY op.productId) ops ON ops.productId = od.productId
        WHERE mo.id = $oid
        searchIt;
        $searchIt = self::query($search);

        return $searchIt;
    }

    public function oldProduct(){
        $search = self::query("SELECT productName FROM oldProduct GROUP BY productName");
        return $search;
    }

    public function sameName($pnm){
        $search = self::query("SELECT productId FROM oldProduct WHERE productName = '$pnm'");
        return $search;
    }

    public function productNow($pid){
        $search = self::query("SELECT price, inStock FROM product WHERE id = $pid");
        return $search;
    }
}

?>
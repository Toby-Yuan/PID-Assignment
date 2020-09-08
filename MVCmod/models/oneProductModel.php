<?php

require_once './models/database.php';
session_start();

class oneProductM extends database{

    public function __construct(){
        if(!isset($_SESSION["productNeed"])){
            $_SESSION["productNeed"] = array();
        }

        if(!isset($_GET["productId"])){
            header("location: ./product");
            exit();
        }
    }

    // 抓取指定商品資料
    public function showPro(){
        $productId = $_GET["productId"];
        $search = self::query("SELECT * FROM `product` WHERE id = $productId");
        return $search;
    }

    // 加入至購物車
    public function add(){
        if(isset($_POST["submit"])){
            $productId = $_GET["productId"];
            $arrayNeed[$productId] = $_POST["need"];
            array_push($_SESSION["productNeed"], $arrayNeed);
        }
    }

}

?>
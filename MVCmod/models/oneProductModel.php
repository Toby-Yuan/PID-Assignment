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

    public function showPro(){
        $productId = $_GET["productId"];
        $search = self::query("SELECT * FROM `product` WHERE id = $productId");
        return $search;
    }

    public function add(){
        $productId = $_GET["productId"];
        $arrayNeed[$productId] = $_POST["need"];
        array_push($_SESSION["productNeed"], $arrayNeed);
    }

}

?>
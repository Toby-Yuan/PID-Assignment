<?php

require_once './models/database.php';
session_start();

class masterM extends database{

    public function __construct(){
        if(!isset($_SESSION['mid'])){
            header("location: ./hello");
            exit();
        }
    }

}

?>
<?php

require_once './models/database.php';

class productM extends database{

    public function searchPro(){
        $search = self::query("SELECT id, productImg, productName FROM `product`");
        return $search;
    }

}

?>
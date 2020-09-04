<?php

require_once './models/database.php';

class helloM extends database{

    public function searchTop(){
        $searchList = <<<searchlist
        SELECT p.id, productImg, productName,
        (SELECT SUM(demand) FROM orderDetail WHERE productId = (SELECT p.id)) demand 
        FROM product p
        ORDER BY demand DESC LIMIT 3
        searchlist;

        $search = self::query($searchList);
        return $search;
    }

}

?>
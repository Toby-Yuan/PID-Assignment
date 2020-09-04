<?php

require_once './models/masterModel.php';

class masterC {
    public $result;

    public function __construct(){
        $this->result = new masterM();
    }

}

?>
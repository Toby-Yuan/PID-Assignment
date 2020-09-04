<?php

require_once './models/helloModel.php';

class helloC {
    public $result;

    public function __construct(){
        $this->result = new helloM();
    }

    public function showTop(){
        $list = $this->result->searchTop();
        $show = "";
        foreach($list as $key=>$value){
            $image = $value[1];
            $image = base64_encode($image);
            $name = $value[2];
            $topShow = <<<topshow
            <div class="products" style="background-image: url(data:image/jpg;charset:utf8;base64,$image)">
                <div class="name">$name</div>
            </div>
            topshow;

            $show .= $topShow;
        }

        return $show;
    }
}

?>


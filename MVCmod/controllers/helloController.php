<?php

require_once './models/helloModel.php';
session_start();

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

    // 登入系統
    public function login(){
        if($this->result->memberLogin() != ""){
            $_SESSION['uid'] = $this->result->memberLogin();

            $memberShow = <<<membershow
            <div id="moreA">
                <a href="./member">會員中心</a>
                &nbsp;
                <a href="./buyBus">購物車</a>
                <a href="./hello?logout=1">登出</a>
            </div>
            membershow;
            return $memberShow;
        }else{
            return "<a id='loginOpen'>登入</a>";
        }
    }
}

?>


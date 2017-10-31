<?php
namespace Admin\Controller;
class UtilityController extends BaseController {
    public function emoji(){
        $callback = $_GET['callback'];
        $this->assign("callback",$callback);
        $this->display();
    }
    
    public function icon(){
        $callback = $_GET['callback'];
        $this->assign("callback",$callback);
        $this->display();
    }
}
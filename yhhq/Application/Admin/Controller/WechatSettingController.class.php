<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */

namespace Admin\Controller;

class WechatSettingController extends BaseController {

    public function index() {
        
        $this->display();
    }


    public function info() {
       header('location:'.IP_ROOT.'/xgmd/web/index.php?c=home&a=welcome&do=platform&'); 
    }
    
    public function setting() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=account&a=post&uniacid=40');
    }
    
}
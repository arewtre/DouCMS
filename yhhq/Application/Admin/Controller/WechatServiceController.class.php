<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */

namespace Admin\Controller;

class WechatServiceController extends BaseController {

    public function index() {
        
        $this->display();
    }


    public function menu() {
       header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=menu&'); 
    }
    

    public function specialMsg() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=special&do=message&');
    }
    
    public function qrcode() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=qr&');
    }
    
    public function replay() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=reply&m=custom');
    }
    
    public function url2qr() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=url2qr&');
    }
    
    public function payment() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=profile&a=payment&');
    }
    
    public function notify() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=profile&a=notify&');
    }
}
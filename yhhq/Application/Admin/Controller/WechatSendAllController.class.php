<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */

namespace Admin\Controller;

class WechatSendAllController extends BaseController {

    public function index() {
        
        $this->display();
    }
    
    public function mass() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=material&a=mass');
    }
    
    public function manager() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=material&a=display');
    }    
    
}
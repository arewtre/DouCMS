<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */

namespace Admin\Controller;

class WechatStatController extends BaseController {

    public function index() {
        
        $this->display();
    }
    
    public function history() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=stat&do=history&');
    }
    
    public function rule() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=stat&do=rule&');
    }
    
    public function keyword() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=stat&do=keyword&');
    }
    
    public function setting() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=stat&do=setting&');
    }
    
}
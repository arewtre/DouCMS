<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */

namespace Admin\Controller;

class WechatFansController extends BaseController {

    public function index() {
        
        $this->display();
    }
    
    public function fangroup() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=mc&a=fangroup&');
    }
    
    public function fans() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=mc&a=fans&');
    }    
    
}
<?php
/**
 * @since   2017-07-08
 * @author  九月一十八 
 */

namespace Admin\Controller;

class WechatReplayController extends BaseController {

    public function index() {
        
        $this->display();
    }


    public function basic() {
       header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=reply&m=basic'); 
    }
    
    public function news() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=reply&m=news');
    }
    
    public function audio() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=reply&m=voice');
    }
    
    public function video() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=reply&m=video');
    }
    
    public function images() {
        header('location:'.IP_ROOT.'/xgmd/web/index.php?c=platform&a=reply&m=images');
    }
}
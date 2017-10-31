<?php
/**
 * @since   2017-07-08
 * @author  九月一十八
 */
 
namespace Admin\Controller;
use Think\Controller;
class UsersController extends BaseController {
    public function index(){
        $this->display();
    }
    
    public function checkList(){
    	$this->display();
    }
}
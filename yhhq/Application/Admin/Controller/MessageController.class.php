<?php
/**
 * @since   2017-07-08
 * @author  九月一十八
 */
 
namespace Admin\Controller;
use Admin\ORG\Auth;

class MessageController extends BaseController {
    public function index() {
        $list = M("api_message")->select();
        $list['msgReply'] = json_decode($list['msgReply']);
        $this->assign('list', $list);
        $this->display();
    }
}
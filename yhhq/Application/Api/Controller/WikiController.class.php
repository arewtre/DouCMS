<?php
/**
 * 文档自动生成
 * @since   2017/03/01 创建
 * @author  zhaoxiang <zhaoxiang051405@gmail.com>
 */

namespace Api\Controller;


use Api\ORG\DataType;
use Api\ORG\ReturnCode;
use Think\Controller;

class WikiController extends Controller {

    public function apiList(){
        $listData = M('List')->select();
        $this->assign('list', $listData);
        $this->display();
    }

    public function apiField(){
        $hash = I('get.hash');
        if( empty($hash) ){
            $this->redirect('apiList');
        }else{
            $request = M('Fields')->where(array('hash' => $hash, 'type' => 0))->select();
            $response = M('Fields')->where(array('hash' => $hash, 'type' => 1))->select();
            $apiInfo = M('List')->where(array('hash' => $hash))->find();
            $this->assign('apiInfo', $apiInfo);
            $dataType = array(
                DataType::TYPE_INTEGER => 'Integer',
                DataType::TYPE_STRING => 'String',
                DataType::TYPE_BOOLEAN => 'Boolean',
                DataType::TYPE_ENUM => 'Enum',
                DataType::TYPE_FLOAT => 'Float',
                DataType::TYPE_FILE => 'File',
                DataType::TYPE_ARRAY => 'Array',
                DataType::TYPE_OBJECT => 'Object',
                DataType::TYPE_MOBILE => 'Mobile'
            );
            $this->assign('dataType', $dataType);
            $this->assign('request', $request);
            $this->assign('response', $response);
            $this->display();
        }
    }

    public function errorCode(){
        $codeArr = ReturnCode::getConstants();
        $errorInfo = array(
            ReturnCode::SUCCESS => '请求成功',
            ReturnCode::INVALID => '非法操作',
            ReturnCode::DB_SAVE_ERROR => '数据存储失败',
            ReturnCode::DB_READ_ERROR => '数据读取失败',
            ReturnCode::CACHE_SAVE_ERROR => '缓存存储失败',
            ReturnCode::CACHE_READ_ERROR => '缓存读取失败',
            ReturnCode::FILE_SAVE_ERROR => '文件读取失败',
            ReturnCode::LOGIN_ERROR => '登录失败',
            ReturnCode::NOT_EXISTS => '不存在',
            ReturnCode::JSON_PARSE_FAIL => 'JSON数据格式错误',
            ReturnCode::TYPE_ERROR => '类型错误',
            ReturnCode::NUMBER_MATCH_ERROR => '数字匹配失败',
            ReturnCode::EMPTY_PARAMS => '丢失必要数据',
            ReturnCode::DATA_EXISTS => '数据已经存在',
            ReturnCode::AUTH_ERROR => '权限认证失败',
            ReturnCode::OTHER_LOGIN => '别的终端登录',
            ReturnCode::VERSION_INVALID => 'API版本非法',
            ReturnCode::PARAM_INVALID => '数据类型非法',
            ReturnCode::ACCESS_TOKEN_TIMEOUT => '身份令牌过期',
            ReturnCode::SESSION_TIMEOUT => 'SESSION过期',
            ReturnCode::UNKNOWN => '未知错误',
            ReturnCode::EXCEPTION => '系统异常',
            ReturnCode::CURL_ERROR => 'CURL操作异常'
        );
        $this->assign('errorInfo', $errorInfo);
        $this->assign('codeArr', $codeArr);
        $this->display();
    }

    public function calculation(){
        $this->display();
    }

}
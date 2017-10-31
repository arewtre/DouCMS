<?php
/**
 *
 * @since   2017/03/07 创建
 * @author  zhaoxiang <zhaoxiang051405@gmail.com>
 */

namespace Admin\Model;


use Think\Model;

class BaseModel extends Model {
    Protected $autoCheckFields = false;

    public function open( $where ){
        return $this->where( $where )->save( array('status' => 1) );
    }

    public function close( $where ){
        return $this->where( $where )->save( array('status' => 0) );
    }
    
   
}
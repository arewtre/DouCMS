<?php
/**
 * @since   2017-07-10
 * @author  九月一十八 <2505451091@qq.com>
 */

namespace Admin\Model;


class LinStoreAuthModel extends BaseModel {

    public function open( $where ){
        return $this->where( $where )->save( array('status' => 1) );
    }

    public function close( $where ){
        return $this->where( $where )->save( array('status' => 0) );
    }

}
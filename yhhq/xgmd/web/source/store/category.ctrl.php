<?php
checklogin();
load()->func('tpl');
$action = 'category';
$title = '商家类别';
$operation = !empty($_GPC['do']) ? $_GPC['do'] : 'display';
if ($operation == 'display') {
    if (!empty($_GPC['displayorder'])) {
        //echo"<pre>";print_r($_GPC);die;
        foreach ($_GPC['displayorder'] as $k => $v) {
            pdo_update('scategory', array(
                'sort_order' => $v
            ), array(
                'cate_id' => $k
            ));
        }
        message('分类排序更新成功！', url('store/category', array(
            'do' => 'display',"type"=>$_GPC['type']
        )), 'success');
    }
 
    $children = array();
    $category = pdo_fetchall("SELECT * FROM ims_scategory WHERE parent_id='{$_GPC['type']}'  ORDER BY sort_order DESC");
//     foreach ($category as $index => $row) {
//         if (! empty($row['parent_id'])) {
//             $children[$row['parent_id']][] = $row;
//             unset($category[$index]);
//         }
//     }


} elseif ($operation == 'post') {
    $parentid = intval($_GPC['parentid']);
    $id = intval($_GPC['id']);
    if (! empty($id)) {
        $item = pdo_fetch("SELECT * FROM " . "ims_scategory" . " WHERE cate_id = '$id'");
    } else {
        $item = array(
            'displayorder' => 0
        );
    }
    
    if (checksubmit('submit')) {
        //echo"<pre>";print_r($_GPC);die;
        if (empty($_GPC['catename'])) {
            message('抱歉，请输入分类名称！');
        }        
        $data = array(
            'cate_name' => $_GPC['catename'],
            'sort_order' => intval($_GPC['displayorder']),
        );
        
        if (! empty($id)) {
            unset($data['parentid']);
            pdo_update('scategory', $data, array(
                'cate_id' => $id
            ));
        } else {
           // if($_GPC['aa']=="shop"){
                $data['parent_id']=$_GPC['type'];
            //}else{
                //$data['parent_id']=2;
            //}
            pdo_insert('scategory', $data);
            $id = pdo_insertid();
        }
        message('更新分类成功！', url('store/category', array(
            'do' => 'display',"type"=>$_GPC['type']
        )), 'success');
    }
} elseif ($operation == 'delete') {
    $id = intval($_GPC['id']);
    $item = pdo_fetch("SELECT cate_id, parent_id FROM " . "ims_scategory" . " WHERE cate_id = '$id'");
    $item2 = pdo_fetch("SELECT cate_id, parent_id FROM " . "ims_scategory" . " WHERE parent_id = '$id'");
    $item3 = pdo_fetch("SELECT* FROM " . "ims_store" . " WHERE cate_id = '$id'");
    if (empty($item)) {
        message('抱歉，分类不存在或是已经被删除！', url('store/category', array( 'do' => 'display',"type"=>1)), 'error');
    }
    if (empty(!$item2)) {
        message('抱歉，此分类下存在子分类不允许删除！', url('store/category', array( 'do' => 'display',"type"=>1)), 'error');
    }
    if (empty(!$item3)) {
        message('抱歉，此分类下关联有商户不允许删除！', url('store/category', array( 'do' => 'display',"type"=>1)), 'error');
    }
//     if (empty($item)) {
//         message('抱歉，分类不存在或是已经被删除！', url('store/category', array(
//             'do' => 'display','type'=>$_GPC['type']
//         )), 'error');
//     }
    pdo_delete('scategory', array(
        'cate_id' => $id,
        'parent_id' => $id
    ), 'OR');
    message('分类删除成功！', url('store/category', array(
        'do' => 'display','type'=>$_GPC['type']
    )), 'success');
}
template('store/category');

function set_tabbar($action, $storeid = 0)
{
    $actions_titles = array(
        'list' => '商家管理',
        // 'feedback' => '留言管理',
        'category' => '分类管理',
        'area' => '区域管理',
        'floor' => '楼层管理',
        'slide' => '广告管理',
        'news' => '优惠资讯',
        // 'template' => '模版管理',
        'setting' => '系统设置'
    );
    
    $html = '<ul class="nav nav-tabs">';
    foreach ($actions_titles as $key => $value) {
        if ($storeid == 0) {
            $url = url('store/'.$key, array(
                'do' => 'display'
            ));
        } else {
            $url = url('store/'.$key, array(
                'do' => 'display',
                'storeid' => $storeid
            ));
        }
        
        $html .= '<li class="' . ($key == $action ? 'active' : '') . '"><a href="' . $url . '">' . $value . '</a></li>';
    }
    $html .= '</ul>';
    return $html;
}

function insert_default_category($name, $logo, $parent_name = '', $isfirst = 0)
{
    global $_GPC, $_W;
    checklogin();
    $path = './resource/businesscenter/template/themes/images/';
    $path = $path . 'icon_' . $logo . '.png';
    
    $category_parent = pdo_fetch("SELECT * FROM " . "ims_scategory" . " WHERE cate_name = :cate_name  AND parentid=0", array(
        ':cate_name' => $parent_name,
        //':weid' => $_W['uniacid']
    ));
    
    $parentid = intval($category_parent['id']);
    
    $data = array(
       // 'weid' => $_W['uniacid'],
        'cate_name' => $name,
        'logo' => $path,
        'displayorder' => 0,
       // 'isfirst' => $isfirst,
        'parent_id' => $parentid
    );
    
    $category = pdo_fetch("SELECT * FROM " . "ls_businesscenter_category" . " WHERE name = :name AND weid=:weid", array(
        ':name' => $name,
        ':weid' => $_W['uniacid']
    ));
    
    if (empty($category)) {
        pdo_insert("businesscenter_category", $data);
    }
    return pdo_insertid();
}
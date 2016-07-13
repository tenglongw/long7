<?php
/**
 * 店铺导航
 *
 *
 *
 ***/


defined('InWrzcNet') or exit('Access Invalid!');
class store_specialControl extends BaseSellerControl {
    public function __construct() {
        parent::__construct();
        Language::read('member_store_index');
    }

    public function special_listOp() {
        $model_store_special = Model('store_special');
        $special_list = $model_store_special->getStoreSpecialList(array('sp_store_id' => $_SESSION['store_id']));
		Tpl::output('special_list', $special_list);
		self::profile_menu('store_special');
		Tpl::showpage('store_special.list');
    }

    public function special_addOp() {
        $this->profile_menu('special_add');
        Tpl::showpage('store_special.form');
    }

    public function special_editOp() {
        $ssp_id = intval($_GET['ssp_id']);
        if($ssp_id <= 0) {
           showMessage(L('wrong_argument'), urlShop('store_special', 'special_list'), '', 'error');
        }
        $model_store_special = Model('store_special');
        $sp_info = $model_store_special->getStoreSpecialInfo(array('ssp_id' => $ssp_id));
        if(empty($sp_info) || intval($sp_info['sp_store_id']) !== intval($_SESSION['store_id'])) {
           showMessage(L('wrong_argument'), urlShop('store_special', 'special_list'), '', 'error');
        }
        Tpl::output('sp_info', $sp_info);
        $this->profile_menu('special_edit');
        Tpl::showpage('store_special.form');
    }

    public function special_saveOp() {
        $sp_info = array(
            'sp_title' => $_POST['sp_title'],
            'sp_content' => $_POST['sp_content'],
            'sp_sort' => empty($_POST['sp_sort'])?255:$_POST['sp_sort'],
            'sp_if_show' => $_POST['sp_if_show'],
            'sp_url' => $_POST['sp_url'],
            'sp_new_open' => $_POST['sp_new_open'],
            'sp_store_id' => $_SESSION['store_id'],
            'sn_add_time' => time()
        );
        $model_store_special = Model('store_special');
        if(!empty($_POST['ssp_id']) && intval($_POST['ssp_id']) > 0) {
            $this->recordSellerLog('编辑店铺专题，专题编号'.$_POST['ssp_id']);
            $condition = array('ssp_id' => $_POST['ssp_id']);
            $result = $model_store_special->editStoreSpecial($sp_info, $condition);
        } else {
            $result = $model_store_special->addStoreSpecial($sp_info);
            $this->recordSellerLog('新增店铺专题，专题编号'.$result);
        }
       showDialog(L('nc_common_op_succ'), urlShop('store_special', 'special_list'), 'succ');
    }

    public function special_delOp() {
        $ssp_id = intval($_POST['ssp_id']);
        if($ssp_id > 0) {
            $condition = array(
                'ssp_id' => $ssp_id,
                'sp_store_id' => $_SESSION['store_id']
            );
            $model_store_special = Model('store_special');
            $model_store_special->delStoreSpecial($condition);
            $this->recordSellerLog('删除店铺专题，专题编号'.$ssp_id);
            showDialog(L('nc_common_op_succ'), urlShop('store_special', 'special_list'), 'succ');
        } else {
            showDialog(L('nc_common_op_fail'), urlShop('store_special', 'special_list'), 'error');
        }
    }

    /**
     * 用户中心右边，小导航
     *
     * @param string 	$menu_key	当前导航的menu_key
     * @return
     */
    private function profile_menu($menu_key = '') {
        $menu_array = array();
        $menu_array[] = array(
            'menu_key' => 'store_special',
            'menu_name' => '专题列表',
            'menu_url' => urlShop('store_special', 'special_list')
        );
        if($menu_key == 'special_add') {
            $menu_array[] = array(
                'menu_key' => 'special_add',
                'menu_name' => '添加专题',
                'menu_url' => urlShop('store_special', 'special_add')
            );
        }
        if($menu_key == 'special_edit') {
            $menu_array[] = array(
                'menu_key' => 'special_edit',
                'menu_name' => '编辑专题',
                'menu_url' => urlShop('store_special', 'special_edit')
            );
        }
        Tpl::output('member_menu', $menu_array);
        Tpl::output('menu_key', $menu_key);
    }

}


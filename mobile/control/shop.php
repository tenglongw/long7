<?php
/**
 * 所有店铺首页  wygk.cn
 */

//use WrzcNet\Tpl;

defined('InWrzcNet') or exit('Access Invalid!');


class shopControl extends mobileHomeControl {

    public function __construct(){
        parent::__construct();
    }

    /*
     * 首页显示
     */
    public function indexOp(){


        $this->_get_Own_Store_List();

    }


    private  function  _get_Own_Store_List(){
		
		$model_store = Model('store');
        //查询条件
        $condition = array();
        if(!empty($_GET['sc_id']) && intval($_GET['sc_id']) > 0) {
            $condition['sc_id'] = $_GET['sc_id'];
        } elseif (!empty($_GET['keyword'])) {
            //$condition['store_name'] = array('like', '%' . $_GET['keyword'] . '%');
        }
        $current_page = intval($_POST['curpage']);
        //所需字段
        $fields = "*";
        //排序方式
        $order = $this->_store_list_order($_GET['key'], $_GET['order']);
        $page_count = $model_store->gettotalpage();
        //计算记录偏移量
        if($current_page == 1){
	        $store_list = $model_store->where($condition)->order($order)->page($this->page)->select();
        }else{
	        $offset = $this->page*($current_page - 1);
        	$limit = $offset.','.$current_page*$this->page;
        	$store_list = $model_store->where($condition)->order($order)->limit($limit)->select();
        }
        $own_store_list = $store_list;
        $simply_store_list = array();
        foreach ($own_store_list as $key => $value) {

            $simply_store_list[$key]['store_id'] = $own_store_list[$key]['store_id'];
            if (empty ($own_store_list[$key]['store_avatar'])) {
            	$simply_store_list[$key]['store_avatar_url'] = UPLOAD_SITE_URL.DS.ATTACH_COMMON.DS.C('default_store_avatar');
            } else {
            	$simply_store_list[$key]['store_avatar_url'] = UPLOAD_SITE_URL.DS.ATTACH_STORE.DS.$own_store_list[$key]['store_avatar'];
            }
            $simply_store_list[$key]['store_name'] = $own_store_list[$key]['store_name'];
            $simply_store_list[$key]['store_address'] = $own_store_list[$key]['store_address'];
            $simply_store_list[$key]['store_area_info'] = $own_store_list[$key]['area_info'];
            $simply_store_list[$key]['store_x'] = $own_store_list[$key]['store_x'];
            $simply_store_list[$key]['store_y'] = $own_store_list[$key]['store_y'];

        }
		
		 output_data(array('store_list' => $simply_store_list), mobile_page($page_count));
       
    }
	
	
	
	
	
	
	
	
	
	 /**
     * 商品列表排序方式
     */
    private function _store_list_order($key, $order) {
        $result = 'store_id desc';
        if (!empty($key)) {

            $sequence = 'desc';
            if($order == 1) {
                $sequence = 'asc';
            }

            switch ($key) {
                //销量
                case '1' :
                    $result = 'store_id' . ' ' . $sequence;
                    break;
                //浏览量
                case '2' :
                    $result = 'store_name' . ' ' . $sequence;
                    break;
                //价格
                case '3' :
                    $result = 'store_name' . ' ' . $sequence;
                    break;
            }
        }
        return $result;
    }

	
	
	
	
	
	
	
	
	
}
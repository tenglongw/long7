<?php
/**
 * 摇号
 *
 *
 *
 *
 * by wygk.cn 创智凌云B2B2C多用户商城系统
 */


defined('InWrzcNet') or exit('Access Invalid!');

class member_lotnumberControl extends mobileMemberControl {

	public function __construct(){
		parent::__construct();
	}

    /**
     * 摇号列表
     */
    public function lotnumber_listOp() {
		$model_lotnumber = Model('lotnumber');
		$model = Model();
		$condition	= array();
		$condition ['field'] = 'DISTINCT lotnumber.lotnumber_id,lotnumber.lotnumber_name,lotnumber.lotnumber_image,lotnumber.lotnumber_price,lotnumber.store_id';
        $condition['limit'] = '300';
        $condition['state'] = '1';
        $condition['join_type'] = $_POST['join_type'];//'left join'
		if('join' == $_POST['join_type']){
			$condition['field'] = $condition ['field'].','.'(case member_lotnumber.state when "0" then "已报名" when "1" then "已中奖" when "2" then "已购买" end) state_text';
		}
        $lotnumber_list = $model_lotnumber->getJoinList($condition, $this->page);
        //$page_count = $model_lotnumber->getLotnumberCount();
		foreach ($lotnumber_list as $key=>$val){
			$val['lotnumber_image_url'] = lthumb($val['lotnumber_image'], 'small');
			$result[] = $val;
		}
        output_data(array('lotnumber_list' => $result));
    }

    /**
     * 摇号详细信息
     */
    public function lotnumber_infoOp() {
		$lotnumber_id = intval($_POST['lotnumber_id']);
		$store_id = intval($_POST['store_id']);
		$lotnumber_model = Model('lotnumber');
		$store_model = Model('store');
		$lotnumber_info = $lotnumber_model->getLotnumberInfo(array('lotnumber_id'=>$lotnumber_id));
		if (empty ($lotnumber_info['store_avatar'])) {
			$lotnumber_info['store_avatar_url'] = UPLOAD_SITE_URL . '/' . ATTACH_COMMON . DS . $output ['setting_config'] ['default_store_avatar'];
		} else {
			$lotnumber_info['store_avatar_url'] = UPLOAD_SITE_URL . '/' . ATTACH_STORE . '/' . $lotnumber_info['store_avatar'];
		}
		$store_info = $store_model->getStoreInfoByID($store_id);
		$result['store_name'] = $lotnumber_info['store_name'];
		$result['area_info'] = $store_info['area_info'];
		$result['store_avatar_url'] = $lotnumber_info['store_avatar_url'];
		$result['lotnumber_id'] = $lotnumber_info['lotnumber_id'];
		$result['apply_count'] = $lotnumber_info['apply_count'];
		$result['state_text'] = $lotnumber_info['button_text'];
		 output_data(array('lotnumber_info' => $result));
    }

    /**
     * 摇号详细信息
     */
    public function lotnumber_submitOp() {
    	$model = Model();
		$authentication_model = Model('authentication');
		$lotnumber_model = Model('lotnumber');
		$lotnumber_id = intval($_POST['lotnumber_id']);
		$lotnumber_model = Model('lotnumber');
		$authentication_info = $authentication_model->getAuthenticationInfo(array('member_id'=>$_POST['member_id'],'atct_state'=>'1'));
		$insert['member_id'] = $this->member_info['member_id'];
        $insert['member_name'] = $this->member_info['member_name'];
		$insert['member_phone'] = $authentication_info['atct_phone'];
		$insert['lotnumber_id'] = $lotnumber_id;
		$insert['add_time'] = time();
		$ml = $model->table('member_lotnumber')->where(array('member_id'=>$_POST['member_id'],'lotnumber_id'=>$lotnumber_id))->find();
		if(!empty($ml)){
			$return['status'] = 1;
			$return['message'] = "已经报名，不允许重复报名";
			echo json_encode($return);exit;
		}
		//检查报名数量
		$lotnumber_info = $lotnumber_model->getLotnumberInfo(array('lotnumber_id'=>$lotnumber_id));
		if($lotnumber_info['apply_count']>=$lotnumber_info['apply_quantity']){
			$return['status'] = 1;
			$return['message'] = "报名人数已满";
			echo json_encode($return);exit;
		}
		$result = $model->table('member_lotnumber')->insert($insert);
		//更新报名数量
		if($result){
			$lotnumber_model->editGroupbuy(array('apply_count'=>array('exp', 'apply_count+1')), array('lotnumber_id'=>$lotnumber_id));
			$return['status'] = 0;
			$return['message'] = "提交成功";
		}else{
			$return['status'] = 1;
			$return['message'] = "提交失败";
		}
		echo json_encode($return);exit;
    }

}

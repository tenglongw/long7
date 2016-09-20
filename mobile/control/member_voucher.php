<?php
/**
 * 我的代金券
 *
 *
 *
 *
 * by wygk.cn 创智凌云B2B2C多用户商城系统
 */


defined('InWrzcNet') or exit('Access Invalid!');

class member_voucherControl extends mobileMemberControl {

	public function __construct() {
		parent::__construct();
	}

    /**
     * 地址列表
     */
    public function voucher_listOp() {
		$model_voucher = Model('voucher');
        $voucher_list = $model_voucher->getMemberVoucherList($this->member_info['member_id'], $_POST['voucher_state'], $this->page);
        $page_count = $model_voucher->gettotalpage();
		foreach ($voucher_list as $key=>$val){
			$voucher_list[$key]['voucher_start_date'] = date('Y-m-d', $val['voucher_start_date']);
			$voucher_list[$key]['voucher_end_date'] = date('Y-m-d', $val['voucher_end_date']);
		}
        output_data(array('voucher_list' => $voucher_list), mobile_page($page_count));
    }
    
    /**
     * 领取优惠券
     */
    public function coupon_code_getOp() {
    	$model_voucher = Model('voucher');
    	$coupon_code_name = $_POST['coupon_code_name'];//优惠券名称
    	//根据名字查询优惠券
    	//查询模板信息
    	$param = array();
    	$param['voucher_t_title'] = $coupon_code_name;
    	$t_info = $model_voucher->table('voucher_template')->where($param)->find();
    	if(empty($t_info)){
    		//output_error('优惠码错误');
    		$return['status'] = 1;
    		$return['message'] = "优惠码错误";
    		echo json_encode($return);exit;
    	}
    	//判断该优惠券是否已经领取
    	$voucherCount = $model_voucher->getVoucherCount(array('voucher_owner_id'=>$this->member_info['member_id'],'voucher_t_id'=>$t_info['voucher_t_id']));
    	//若未领取则进行领取
    	if($voucherCount == 0){
    		$data = $model_voucher->exchangeVoucher($t_info,$this->member_info['member_id'],$this->member_info['member_name']);
    		$return['status'] = 0;
    		$return['message'] = "领取成功";
    		//output_data($data);
    	}else{
    		$return['status'] = 1;
    		$return['message'] = "该优惠码已经领取了";
	    	//output_error('优惠码已经领取');
    	}
    	echo json_encode($return);exit;
    }
}

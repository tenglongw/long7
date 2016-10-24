<?php
/**
 * 购买
 *
 *
 *
 *
 * by wygk.cn 创智凌云B2B2C多用户商城系统
 */


defined('InWrzcNet') or exit('Access Invalid!');

class member_buyControl extends mobileMemberControl {

	public function __construct() {
		parent::__construct();
	}

    /**
     * 购物车、直接购买第一步:选择收获地址和配置方式
     */
    public function buy_step1Op() {
        $cart_id = explode(',', $_POST['cart_id']);

        $logic_buy = logic('buy');

        //得到购买数据
        $result = $logic_buy->buyStep1($cart_id, $_POST['ifcart'], $this->member_info['member_id'], $this->member_info['store_id']);
        if(!$result['state']) {
            output_error($result['msg']);
        } else {
            $result = $result['data'];
        }
        //整理数据
        $store_cart_list = array();
        foreach ($result['store_cart_list'] as $key => $value) {
            /* $store_cart_list[$key]['goods_list'] = $value;
            $store_cart_list[$key]['store_goods_total'] = $result['store_goods_total'][$key];
            if(!empty($result['store_premiums_list'][$key])) {
                $result['store_premiums_list'][$key][0]['premiums'] = true;
                $result['store_premiums_list'][$key][0]['goods_total'] = 0.00;
                $store_cart_list[$key]['goods_list'][] = $result['store_premiums_list'][$key][0];
            }
            $store_cart_list[$key]['store_mansong_rule_list'] = $result['store_mansong_rule_list'][$key];*/
          /*   if(!empty($result['cancel_calc_sid_list'][$key])) {
                $store_cart_list[$key]['freight'] = '0';
                $store_cart_list[$key]['freight_message'] = $result['cancel_calc_sid_list'][$key]['desc'];
            } else {
                $store_cart_list[$key]['freight'] = '1';
            }
            $store_cart_list[$key]['store_name'] = $value[0]['store_name'];  */
        	foreach ($value as $gkey=>$gvalue){
	        	$store_cart_list[] = $gvalue;
        	}
        }
        foreach ($store_cart_list as $key => $value) {
        	if(empty($value['goods_spec'])){
        		$store_cart_list[$key]['is_goods_spec'] = 0;
        	}else{
        		$store_cart_list[$key]['is_goods_spec'] = 1;
        		$specKeyArray = array_keys(unserialize($value['goods_spec']));
        		$specValueArray = array_values(unserialize($value['goods_spec']));
        		$spec = $this->instanceSpece($specKeyArray,$specValueArray);
        		$store_cart_list[$key]['goods_spec'] = $spec;
        	}
        }
        $buy_list = array();
        $buy_list['store_voucher_list'] = $result['store_voucher_list'];
        $buy_list['goods_list'] = $store_cart_list;
        $buy_list['goods_count'] = count($store_cart_list);
        $buy_list['freight_hash'] = $result['freight_list'];
        if(empty($result['address_info'])){
	        $buy_list['address_flag'] = 'false';
        }else{
        	$buy_list['address_flag'] = 'true';
	        $buy_list['address_info'] = $result['address_info'];
        }
//         $buy_list['ifshow_offpay'] = $result['ifshow_offpay'];
//         $buy_list['vat_hash'] = $result['vat_hash'];
//         $buy_list['inv_info'] = $result['inv_info'];
        //$buy_list['available_predeposit'] = $result['available_predeposit'];
        //$buy_list['available_rc_balance'] = $result['available_rc_balance'];
        $data = $logic_buy->changeAddr($result['freight_list'], $result['address_info']['city_id'], $result['address_info']['area_id'], $this->member_info['member_id']);
        //echo json_encode($data);exit;
        if($data['state']=='success'){
        	foreach ($data['content'] as $store_id=>$val){
        		if(!empty($val)){
        			$freight +=$val;
        		}
        	}
        }
        if(empty($freight)){
        	$freight = 0;
        }
        $buy_list['freight'] = $freight;
        output_data($buy_list);
    }
    
    public function instanceSpece($specKeyArray,$specValueArray){
    	$model_spec = Model('spec');
    	$array = array();
    	foreach ($specKeyArray as $key=>$value){
    		$where['sp_value_id'] = $value;
    		//查询sp_id
    		$sp_value = $model_spec->specValueOne($where);
    		//查询spec
    		$spec = $model_spec->getSpecInfo($sp_value['sp_id']);
    		if(strcasecmp( $spec['sp_name'],"颜色")>=0){
    			$array['color'] = $specValueArray[$key];
    		}else{
    			$array['size'] = $specValueArray[$key];
    		}
    	}
    	return $array;
    }

    /**
     * 购物车、直接购买第二步:保存订单入库，产生订单号，开始选择支付方式
     *
     */
    public function buy_step2Op() {
        $param = array();
        $param['ifcart'] = $_POST['ifcart'];
        $param['cart_id'] = explode(',', $_POST['cart_id']);
        $param['address_id'] = $_POST['address_id'];
        //$param['vat_hash'] = $_POST['vat_hash'];//是否开增值税发票
        //$param['offpay_hash'] = $_POST['offpay_hash'];//是否支持货到付款
        //$param['offpay_hash_batch'] = $_POST['offpay_hash_batch'];// 是否支持货到付款 具体到各个店铺
        $param['pay_name'] = $_POST['pay_name'];// //付款方式:在线支付/货到付款(online/offline)
        //$param['invoice_id'] = $_POST['invoice_id'];//验证发票信息

        //处理代金券
        $voucher = array();
        $post_voucher = explode(',', $_POST['voucher']);
        if(!empty($post_voucher)) {
            foreach ($post_voucher as $value) {
                list($voucher_t_id, $store_id, $voucher_price) = explode('|', $value);
                $voucher[$store_id] = $value;
            }
        }
        $param['voucher'] = $voucher;//代金券

        //手机端暂时不做支付留言，页面内容太多了
        //$param['pay_message'] = json_decode($_POST['pay_message']);
        //$param['pd_pay'] = $_POST['pd_pay'];//使用预存款支付
        //$param['rcb_pay'] = $_POST['rcb_pay'];//使用充值卡支付
        $param['password'] = $_POST['password'];
        //$param['fcode'] = $_POST['fcode'];//F码
        $param['order_from'] = 2;
        $logic_buy = logic('buy');

        $result = $logic_buy->buyStep2($param, $this->member_info['member_id'], $this->member_info['member_name'], $this->member_info['member_email']);
        if(!$result['state']) {
            output_error($result['msg']);
        }
        output_data(array('pay_sn' => $result['data']['pay_sn'],'goods_list'=>$result['data']['goods_list']));
    }

    /**
     * 验证密码
     */
    public function check_passwordOp() {
        if(empty($_POST['password'])) {
            output_error('参数错误');
        }

        $model_member = Model('member');

        $member_info = $model_member->getMemberInfoByID($this->member_info['member_id']);
        if($member_info['member_paypwd'] == md5($_POST['password'])) {
            output_data('1');
        } else {
            output_error('密码错误');
        }
    }

    /**
     * 更换收货地址
     */
    public function change_addressOp() {
        $logic_buy = Logic('buy');
        $freight = '0';
        $data = $logic_buy->changeAddr($_POST['freight_hash'], $_POST['city_id'], $_POST['area_id'], $this->member_info['member_id']);
        if(!empty($data) && $data['state'] == 'success' ) {
        	foreach ($data['content'] as $store_id=>$val){
        		if(!empty($val)){
        			$freight +=$val;
        		}
        	}
            output_data(array('freight'=>$freight));
        } else {
            output_error('地址修改失败');
        }
    }


}


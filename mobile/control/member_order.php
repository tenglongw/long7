<?php
/**
 * 我的订单
 *
 *
 *
 *
 * @copyright  Copyright (c) 2007-2015 WrzcNet Inc. (http://www.wrzc.net)
 * @license    http://www.wrzc.net
 * @link       http://www.wrzc.net
 * @since      File available since Release v1.1
 */

use WrzcNet\Tpl;

defined('InWrzcNet') or exit('Access Invalid!');

class member_orderControl extends mobileMemberControl {

	public function __construct(){
		parent::__construct();
	}

    /**
     * 订单列表
     */
    public function order_listOp() {
		$model_order = Model('order');

        $condition = array();
        $condition['buyer_id'] = $this->member_info['member_id'];

        $page_count = $model_order->gettotalpage();
        $current_page = intval($_POST['curpage']);
        //计算记录偏移量
        if($current_page == 1){
        	$order_list_array = $model_order->getNormalOrderList($condition, $this->page, '*', 'order_id desc','', array('order_goods'));
        }else{
        	$offset = $this->page*($current_page - 1);
        	$limit = $offset.','.$current_page*$this->page;
        	//echo $limit;exit;
        	$order_list_array = $model_order->getNormalOrderList($condition, null, '*', 'order_id desc',$limit, array('order_goods'));
        }
        $order_group_list = array();
        $order_pay_sn_array = array();
        foreach ($order_list_array as $value) {
            //显示取消订单
            $value['if_cancel'] = $model_order->getOrderOperateState('buyer_cancel',$value);
            //显示收货
            $value['if_receive'] = $model_order->getOrderOperateState('receive',$value);
            //显示锁定中
            $value['if_lock'] = $model_order->getOrderOperateState('lock',$value);
            //显示物流跟踪
            $value['if_deliver'] = $model_order->getOrderOperateState('deliver',$value);
            $temp = $model_order->getShippingName(array('order_id'=>$value['order_id']));
			$value['shipping_name'] = $temp['e_name'];
            //商品图
            foreach ($value['extend_order_goods'] as $k => $goods_info) {
                $value['extend_order_goods'][$k]['goods_image_url'] = cthumb($goods_info['goods_image'], 240, $value['store_id']);
            }

            $order_group_list[$value['pay_sn']]['order_list'][] = $value;

            //如果有在线支付且未付款的订单则显示合并付款链接
            if ($value['order_state'] == ORDER_STATE_NEW) {
                $order_group_list[$value['pay_sn']]['pay_amount'] += $value['order_amount'] - $value['rcb_amount'] - $value['pd_amount'];
            }
            $order_group_list[$value['pay_sn']]['add_time'] = date('Y-m-d H:i',$value['add_time']);
            //记录一下pay_sn，后面需要查询支付单表
            $order_pay_sn_array[] = $value['pay_sn'];
        }

        $new_order_group_list = array();
        foreach ($order_group_list as $key => $value) {
            $value['pay_sn'] = strval($key);
            foreach ($value['order_list'] as $okey => $oval){
            	$new_order_group_list[] = $oval;
            }
        }


        $array_data = array('order_list' => $new_order_group_list);
        /* if(isset($_GET['getpayment'])&&$_GET['getpayment']=="true"){
            $model_mb_payment = Model('mb_payment');

            $payment_list = $model_mb_payment->getMbPaymentOpenList();
//print_r($payment_list);
            $payment_array = array();
            if(!empty($payment_list)) {
                foreach ($payment_list as $value) {
                    $payment_array[] = array('payment_code' => $value['payment_code'],'payment_name' =>$value['payment_name']);
                }
            }
            $array_data['payment_list'] = $payment_array;
        } */


        //output_data(array('order_group_list' => $array_data), mobile_page($page_count));
        output_data($array_data, mobile_page($page_count));
    }

    /**
     * 取消订单
     */
    public function order_cancelOp() {
        $model_order = Model('order');
        $logic_order = Logic('order');
        $order_id = intval($_POST['order_id']);

        $condition = array();
        $condition['order_id'] = $order_id;
        $condition['buyer_id'] = $this->member_info['member_id'];
        $order_info	= $model_order->getOrderInfo($condition);
        $if_allow = $model_order->getOrderOperateState('buyer_cancel',$order_info);
        if (!$if_allow) {
            //output_error('无权操作');
        	$return['status'] = 1;
        	$return['message'] = '无权操作';
        	echo json_encode($return);exit;
        }

        $result = $logic_order->changeOrderStateCancel($order_info,'buyer', $this->member_info['member_name'], '其它原因');
        if(!$result['state']) {
            //output_error($result['msg']);
        	$return['status'] = 1;
        	$return['message'] = $result['msg'];
        } else {
            //output_data('1');
        	$return['status'] = 0;
        	$return['message'] = '取消订单成功';
        }
        echo json_encode($return);exit;
    }
    /**
     * 支付完成，修改订单状态
     */
    public function order_payOp() {
    	$model_order = Model('order');
    	$logic_order = Logic('order');
    	$order_id = $_POST['order_id'];
    	$pay_sn = $_POST['pay_sn'];
    	$condition = array();
    	$condition['order_id'] = $order_id;
    	$condition['buyer_id'] = $this->member_info['member_id'];
    	if(empty($order_id)){
	    	$order_list	= $model_order->getOrderList(array('pay_sn'=>$pay_sn,'order_state'=>ORDER_STATE_NEW));
	    	$post['payment_code'] = $order_list[0]['payment_code'];
	    	$if_allow = $model_order->getOrderOperateState('system_receive_pay',$order_list[0]);
	    	if (!$if_allow) {
	    		//output_error('无权操作');
	    		$return['status'] = 1;
	    		$return['message'] = '无权操作';
	    		echo json_encode($return);exit;
	    	}
	    	$result = $logic_order->changeOrderReceivePay($order_list,'buyer', $this->member_info['member_name'], $post);
    	}else{
	    	$order_info	= $model_order->getOrderInfo($condition);
	    	$post['payment_code'] = $order_info['payment_code'];
	    	$if_allow = $model_order->getOrderOperateState('system_receive_pay',$order_info);
	    	if (!$if_allow) {
	    		//output_error('无权操作');
	    		$return['status'] = 1;
	    		$return['message'] = '无权操作';
	    		echo json_encode($return);exit;
	    	}
	    	$result = $logic_order->changeOrderReceivePay_ordersn($order_info,'buyer', $this->member_info['member_name'], $post);
    	}
    	if(!$result['state']) {
    		//output_error($result['msg']);
    		$return['status'] = 1;
    		$return['message'] = $result['msg'];
    	} else {
    		$return['status'] = 0;
    		$return['message'] = '修改成功';
    		//output_data('1');
    	}
    	echo json_encode($return);exit;
    }

    /**
     * 订单确认收货
     */
    public function order_receiveOp() {
        $model_order = Model('order');
        $logic_order = Logic('order');
        $order_id = intval($_POST['order_id']);
        
        $condition = array();
        $condition['order_id'] = $order_id;
        $condition['buyer_id'] = $this->member_info['member_id'];
        $order_info	= $model_order->getOrderInfo($condition);
        $if_allow = $model_order->getOrderOperateState('receive',$order_info);
        if (!$if_allow) {
            output_error('无权操作');
        }

        $result = $logic_order->changeOrderStateReceive($order_info,'buyer', $this->member_info['member_name']);
        if(!$result['state']) {
            output_error($result['msg']);
        } else {
            output_data('1');
        }
    }

    /**
     * 物流跟踪
     */
    public function search_deliverOp(){
        $order_id	= intval($_POST['order_id']);
        if ($order_id <= 0) {
            output_error('订单不存在');
        }

        $model_order	= Model('order');
        $condition['order_id'] = $order_id;
        $condition['buyer_id'] = $this->member_info['member_id'];
        $order_info = $model_order->getOrderInfo($condition,array('order_common','order_goods'));
        if (empty($order_info) || !in_array($order_info['order_state'],array(ORDER_STATE_SEND,ORDER_STATE_SUCCESS))) {
            output_error('订单不存在');
        }

        $express = rkcache('express',true);
        $e_code = $express[$order_info['extend_order_common']['shipping_express_id']]['e_code'];
        $e_name = $express[$order_info['extend_order_common']['shipping_express_id']]['e_name'];

        $deliver_info = $this->_get_express($e_code, $order_info['shipping_code']);
        output_data(array('express_name' => $e_name, 'shipping_code' => $order_info['shipping_code'], 'deliver_info' => $deliver_info));
    }

    /**
     * 从第三方取快递信息
     *
     */
    public function _get_express($e_code, $shipping_code){

        $url = 'http://www.kuaidi100.com/query?type='.$e_code.'&postid='.$shipping_code.'&id=1&valicode=&temp='.random(4).'&sessionid=&tmp='.random(4);
        import('function.ftp');
        $content = dfsockopen($url);
        $content = json_decode($content,true);

        if ($content['status'] != 200) { 
            output_error('物流信息查询失败');
        }
        $content['data'] = array_reverse($content['data']);
        $output = array();
        if (is_array($content['data'])){
            foreach ($content['data'] as $k=>$v) {
                if ($v['time'] == '') continue;
                $output[]= $v['time'].'&nbsp;&nbsp;'.$v['context'];
            }
        }
        if (empty($output)) exit(json_encode(false));
        if (strtoupper(CHARSET) == 'GBK'){
            $output = Language::getUTF8($output);//网站GBK使用编码时,转换为UTF-8,防止json输出汉字问题
        }

        return $output;
    }

}

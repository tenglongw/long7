<?php
/**
 * 我的购物车
 *
 *
 *
 *
 * by wygk.cn 创智凌云B2B2C多用户商城系统
 */


defined('InWrzcNet') or exit('Access Invalid!');

class member_cartControl extends mobileMemberControl {

	public function __construct() {
		parent::__construct();
	}

    /**
     * 购物车列表
     */
    public function cart_listOp() {
        $model_cart = Model('cart');

        $condition = array('buyer_id' =>$_POST['member_id']);
        $cart_list	= $model_cart->listCart('db', $condition);
        $sum = 0;
        foreach ($cart_list as $key => $value) {
            $cart_list[$key]['goods_image_url'] = cthumb($value['goods_image'], $value['store_id']);
            $cart_list[$key]['goods_sum'] = ncPriceFormat($value['goods_price'] * $value['goods_num']);
            if(empty($value['goods_spec'])){
            	$cart_list[$key]['is_goods_spec'] = 0;
            }else{
            	$cart_list[$key]['is_goods_spec'] = 1;
            	$specKeyArray = array_keys(unserialize($value['goods_spec']));
            	$specValueArray = array_values(unserialize($value['goods_spec']));
            	$spec = $this->instanceSpece($specKeyArray,$specValueArray);
	            $cart_list[$key]['goods_spec'] = $spec;
            }
            $sum += $cart_list[$key]['goods_sum'];
        }

        output_data(array('cart_list' => $cart_list, 'sum' => ncPriceFormat($sum)));
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
    
    public function instanceSpece_key($specKeyArray,$specValueArray){
    	$model_spec = Model('spec');
    	$array = array();
    	foreach ($specKeyArray as $key=>$value){
    		$where['sp_value_id'] = $value;
    		//查询sp_id
    		$sp_value = $model_spec->specValueOne($where);
    		//查询spec
    		$spec = $model_spec->getSpecInfo($sp_value['sp_id']);
    		if(strcasecmp( $spec['sp_name'],"颜色")>=0){
    			$array['color'] = $specKeyArray[$key];
    			$array['color_value'] = $specValueArray[$key];
    		}else{
    			$array['size'] = $specKeyArray[$key];
    			$array['size_value'] = $specValueArray[$key];
    		}
    	}
    	return $array;
    }
    
    /**
     * 购物车添加
     */
    public function cart_addOp() {
        $goods_id = intval($_POST['goods_id']);
        $quantity = intval($_POST['quantity']);
        if($goods_id <= 0 || $quantity <= 0) {
            output_error('参数错误');
        }

        $model_goods = Model('goods');
        $model_cart	= Model('cart');
        $logic_buy_1 = Logic('buy_1');

        $goods_info = $model_goods->getGoodsOnlineInfoAndPromotionById($goods_id);

        //验证是否可以购买
		if(empty($goods_info)) {
            //output_error('商品已下架或不存在');
			$return['status'] = 1;
			$return['message'] = '商品已下架或不存在';
			echo json_encode($return);exit;
		}

		//抢购
		//$logic_buy_1->getGroupbuyInfo($goods_info);
		
		//限时折扣
		//$logic_buy_1->getXianshiInfo($goods_info,$quantity);
		/* echo json_encode($this->member_info);exit;
        if ($goods_info['store_id'] == $this->member_info['store_id']) {
            output_error('不能购买自己发布的商品');
		} */
		if(intval($goods_info['goods_storage']) < 1 || intval($goods_info['goods_storage']) < $quantity) {
            //output_error('库存不足');
			$return['status'] = 1;
			$return['message'] = '库存不足';
			echo json_encode($return);exit;
		}

        $param = array();
        $param['buyer_id']	= $_POST['member_id'];
        $param['store_id']	= $goods_info['store_id'];
        $param['goods_id']	= $goods_info['goods_id'];
        $param['goods_name'] = $goods_info['goods_name'];
        $param['goods_price'] = $goods_info['goods_price'];
        $param['goods_image'] = $goods_info['goods_image'];
        $param['goods_jingle'] = $goods_info['goods_jingle'];
        $param['store_name'] = $goods_info['store_name'];
        $param['goods_spec'] = $goods_info['goods_spec'];
        $check_cart	= $model_cart->checkCart(array('goods_id'=>$goods_info['goods_id'],'buyer_id'=>$_POST['member_id']));
        if (!empty($check_cart)){
        	if(intval($goods_info['goods_storage']) < 1 || intval($goods_info['goods_storage']) < (intval($check_cart['goods_num'])+$quantity)) {
        		//output_error('库存不足');
        		$return['status'] = 1;
        		$return['message'] = '库存不足';
        		echo json_encode($return);exit;
        	}
        	//修改购物车数量
        	$this->where(array('goods_id'=>$goods_info['goods_id'],'buyer_id'=>$_POST['member_id']))->update(array('goods_num'=>array('exp', 'goods_num+'.$quantity)));
        }
		//echo json_encode($param);exit;
        $result = $model_cart->addCart($param, 'db', $quantity);
        if($result) {
        	$return['status'] = 0;
        	$return['message'] = '添加成功';
           // output_data('1');
        } else {
        	$return['status'] = 1;
        	$return['message'] = '添加失败';
            //output_error('收藏失败');
        }
        echo json_encode($return);exit;
    }

    /**
     * 购物车删除
     */
    public function cart_delOp() {
        $model_cart = Model('cart');
        $condition = array();
        $condition['buyer_id'] = $_POST['member_id'];
        $condition['cart_id'] = array('in',$_POST['cart_id']);
        $model_cart->delCart('db', $condition);
		$result['status']=0;
		$result['message'] = '删除成功';
       echo json_encode($result);exit;
    }
    
    /**
     * 购物车编辑
     */
    public function cart_goods_detailOp() {
    	$cart_id = intval($_POST['cart_id']);
    
    	$model_cart = Model('cart');
    	$model_goods = Model('goods');
    
    	if(empty($cart_id)) {
			$return['status'] = 1;
			$return['message'] = '参数错误';
			echo json_encode($return);exit;
		}
		//购物车信息
		$cart_info = $model_cart->getCartInfo(array('cart_id'=>$cart_id, 'buyer_id' => $_POST['member_id']));
		//商品信息
    	 $goods_id = intval($cart_info['goods_id']);
        // 商品详细信息
        $model_goods = Model('goods');
        $goods_detail = $model_goods->getGoodsDetail($goods_id);
        if (empty($goods_detail)) {
            output_error('商品不存在');
        }
        //商品详细信息处理
        $goods_detail = $this->_goods_detail_extend($goods_detail);
        $cart_info['spec_list'] = $goods_detail['spec_list'];
        $cart_info['spec_name'] = $goods_detail['goods_info']['spec_name'];
        $cart_info['spec_value'] = $goods_detail['goods_info']['spec_value'];
        $cart_info['goods_image'] =  cthumb($cart_info['goods_image'], $cart_info['store_id']);
        $cart_info['goods_storage'] = $goods_detail['goods_info']['goods_storage'];
        	if(empty($goods_detail['goods_info']['goods_spec'])){
        		$cart_info['is_goods_spec'] = 0;
        	}else{
        		$cart_info['is_goods_spec'] = 1;
        		$specKeyArray = array_keys(($goods_detail['goods_info']['goods_spec']));
        		$specValueArray = array_values(($goods_detail['goods_info']['goods_spec']));
        		$spec = $this->instanceSpece_key($specKeyArray,$specValueArray);
        		$cart_info['goods_spec'] = $spec;
        	}
        output_data($cart_info);
    }
    
    /**
     * 更新购物车商品信息
     */
    public function cart_editOp() {
    	$cart_id = intval(abs($_POST['cart_id']));
    	$quantity = intval(abs($_POST['quantity']));
    	if(empty($cart_id) || empty($quantity)) {
    		//             output_error('参数错误');
    		$return['status'] = 1;
    		$return['message'] = '参数错误';
    		echo json_encode($return);exit;
    	}
    
    	$model_cart = Model('cart');
    
    	$cart_info = $model_cart->getCartInfo(array('cart_id'=>$cart_id, 'buyer_id' => $_POST['member_id']));
    
    	//检查是否为本人购物车
    	if($cart_info['buyer_id'] != $_POST['member_id']) {
    		//             output_error('参数错误');
    		$return['status'] = 1;
    		$return['message'] = '参数错误';
    		echo json_encode($return);exit;
    	}
    
    	//检查库存是否充足
    	if(!$this->_check_goods_storage($cart_info, $quantity, $_POST['member_id'])) {
    		//             output_error('库存不足');
    		$return['status'] = 1;
    		$return['message'] = '库存不足';
    		echo json_encode($return);exit;
    	}
    
    	$model_goods = Model('goods');
    	$goods_info = $model_goods->getGoodsOnlineInfoAndPromotionById($_POST['goods_id']);
    	//验证是否可以购买
    	if(empty($goods_info)) {
    		//output_error('商品已下架或不存在');
    		$return['status'] = 1;
    		$return['message'] = '商品已下架或不存在';
    		echo json_encode($return);exit;
    	}
    	if(intval($goods_info['goods_storage']) < 1 || intval($goods_info['goods_storage']) < $quantity) {
    		//output_error('库存不足');
    		$return['status'] = 1;
    		$return['message'] = '库存不足';
    		echo json_encode($return);exit;
    	}
    	
    	$param = array();
    	$param['buyer_id']	= $_POST['member_id'];
    	$param['store_id']	= $goods_info['store_id'];
    	$param['goods_id']	= $goods_info['goods_id'];
    	$param['goods_name'] = $goods_info['goods_name'];
    	$param['goods_price'] = $goods_info['goods_price'];
    	$param['goods_image'] = $goods_info['goods_image'];
    	$param['goods_jingle'] = $goods_info['goods_jingle'];
    	$param['store_name'] = $goods_info['store_name'];
    	$param['goods_spec'] = $goods_info['goods_spec'];
    	$param['goods_num'] = $quantity;
    	$update = $model_cart->editCart($param, array('cart_id'=>$cart_id));
    	if ($update) {
    		$return = array();
    		$return['quantity'] = $quantity;
    		$return['goods_price'] = ncPriceFormat($cart_info['goods_price']);
    		$return['total_price'] = ncPriceFormat($cart_info['goods_price'] * $quantity);
    		//output_data($return);
    		$return['status'] = 0;
    		$return['message'] = '修改成功';
    		echo json_encode($return);exit;
    	} else {
    		//output_error('修改失败');
    		$return['status'] = 1;
    		$return['message'] = '修改失败';
    		echo json_encode($return);exit;
    
    	}
    }

    /**
     * 更新购物车购买数量
     */
    public function cart_edit_quantityOp() {
		$cart_id = intval(abs($_POST['cart_id']));
		$quantity = intval(abs($_POST['quantity']));
		if(empty($cart_id) || empty($quantity)) {
//             output_error('参数错误');
			$return['status'] = 1;
			$return['message'] = '参数错误';
			echo json_encode($return);exit;
		}

		$model_cart = Model('cart');

        $cart_info = $model_cart->getCartInfo(array('cart_id'=>$cart_id, 'buyer_id' => $_POST['member_id']));

        //检查是否为本人购物车
        if($cart_info['buyer_id'] != $_POST['member_id']) {
//             output_error('参数错误');
        	$return['status'] = 1;
        	$return['message'] = '参数错误';
        	echo json_encode($return);exit;
        }

        //检查库存是否充足
        if(!$this->_check_goods_storage($cart_info, $quantity, $_POST['member_id'])) {
//             output_error('库存不足');
            $return['status'] = 1;
            $return['message'] = '库存不足';
            echo json_encode($return);exit;
        }

		$data = array();
        $data['goods_num'] = $quantity;
        $update = $model_cart->editCart($data, array('cart_id'=>$cart_id));
		if ($update) {
		    $return = array();
            $return['goods_num'] = $quantity;
			$return['goods_price'] = ncPriceFormat($cart_info['goods_price']);
			$return['total_price'] = ncPriceFormat($cart_info['goods_price'] * $quantity);
            //output_data($return);
			$return['status'] = 0;
			$return['message'] = '修改成功';
			echo json_encode($return);exit;
		} else {
            //output_error('修改失败');
			$return['status'] = 1;
			$return['message'] = '修改失败';
			echo json_encode($return);exit;
            
		}
    }

    /**
     * 检查库存是否充足
     */
    private function _check_goods_storage($cart_info, $quantity, $member_id) {
		$model_goods= Model('goods');
        $model_bl = Model('p_bundling');
        $logic_buy_1 = Logic('buy_1');

		if ($cart_info['bl_id'] == '0') {
            //普通商品
		    $goods_info	= $model_goods->getGoodsOnlineInfoAndPromotionById($cart_info['goods_id']);

		    //抢购
		    $logic_buy_1->getGroupbuyInfo($goods_info);

		    //限时折扣
		    $logic_buy_1->getXianshiInfo($goods_info,$quantity);
 
		    $quantity = $goods_info['goods_num'];
		    if(intval($goods_info['goods_storage']) < $quantity) {
                return false;
		    }
		} else {
		    //优惠套装商品
		    $bl_goods_list = $model_bl->getBundlingGoodsList(array('bl_id' => $cart_info['bl_id']));
		    $goods_id_array = array();
		    foreach ($bl_goods_list as $goods) {
		        $goods_id_array[] = $goods['goods_id'];
		    }
		    $bl_goods_list = $model_goods->getGoodsOnlineListAndPromotionByIdArray($goods_id_array);

		    //如果有商品库存不足，更新购买数量到目前最大库存
		    foreach ($bl_goods_list as $goods_info) {
		        if (intval($goods_info['goods_storage']) < $quantity) {
                    return false;
		        }
		    }
		}
        return true;
    }
    
    /**
     * 商品详细信息处理
     */
    private function _goods_detail_extend($goods_detail) {
    	//整理商品规格
    	unset($goods_detail['spec_list']);
    	$goods_detail['spec_list'] = $goods_detail['spec_list_mobile'];
    	unset($goods_detail['spec_list_mobile']);
    
    	//整理商品图片
    	unset($goods_detail['goods_image']);
    	$goods_detail['goods_image'] = implode(',', $goods_detail['goods_image_mobile']);
    	unset($goods_detail['goods_image_mobile']);
    
    	//商品链接
    	$goods_detail['goods_info']['goods_url'] = urlShop('goods', 'index', array('goods_id' => $goods_detail['goods_info']['goods_id']));
    
    	//整理数据
    	unset($goods_detail['goods_info']['goods_commonid']);
    	unset($goods_detail['goods_info']['gc_id']);
    	unset($goods_detail['goods_info']['gc_name']);
    	unset($goods_detail['goods_info']['store_name']);
    	unset($goods_detail['goods_info']['brand_id']);
    	unset($goods_detail['goods_info']['brand_name']);
    	unset($goods_detail['goods_info']['type_id']);
    	unset($goods_detail['goods_info']['goods_image']);
    	unset($goods_detail['goods_info']['goods_body']);
    	unset($goods_detail['goods_info']['goods_state']);
    	unset($goods_detail['goods_info']['goods_stateremark']);
    	unset($goods_detail['goods_info']['goods_verify']);
    	unset($goods_detail['goods_info']['goods_verifyremark']);
    	unset($goods_detail['goods_info']['goods_lock']);
    	unset($goods_detail['goods_info']['goods_addtime']);
    	unset($goods_detail['goods_info']['goods_edittime']);
    	unset($goods_detail['goods_info']['goods_selltime']);
    	unset($goods_detail['goods_info']['goods_show']);
    	unset($goods_detail['goods_info']['goods_commend']);
    	unset($goods_detail['goods_info']['explain']);
    	unset($goods_detail['goods_info']['cart']);
    	unset($goods_detail['goods_info']['buynow_text']);
    	unset($goods_detail['groupbuy_info']);
    	unset($goods_detail['xianshi_info']);
    
    	return $goods_detail;
    }

}

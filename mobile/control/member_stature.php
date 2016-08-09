<?php
/**
 * 我的身材
 *
 *
 *
 *
 * by wygk.cn 创智凌云B2B2C多用户商城系统
 */


defined('InWrzcNet') or exit('Access Invalid!');

class member_statureControl extends mobileMemberControl {

	public function __construct() {
		parent::__construct();
	}

    /**
     * 添加身材
     */
    public function stature_addOp() {
        $model_stature = Model('stature');

        $param = array();
        $param['shoe_size'] = $_POST['shoe_size'];
        $param['clothing_size'] = $_POST['clothing_size'];
        $param['addtime'] = time();
        $param['member_id'] = $this->member_info['member_id'];
        $param['member_name'] = $this->member_info['member_name'];
       // echo json_encode($param);exit;
        $where = array();
        $where['member_id'] = $this->member_info['member_id'];
        $stature = $model_stature->getStatureByMember($where);
        if($stature){
        	$stature['shoe_size'] = $_POST['shoe_size'];
        	$stature['clothing_size'] = $_POST['clothing_size'];
        	$stature['addtime'] = time();
        	$result = $model_stature->editStature($stature,array('stature_id'=>$stature['stature_id']));
        }else{
	        $result = $model_stature->add($param);
        }

        if($result) {
            $return['status'] = 0;
			$return['message'] = '保存成功';
			echo json_encode($return);exit;
        } else {
            $return['status'] = 1;
			$return['message'] = '保存失败';
			echo json_encode($return);exit;
        }
    }
    
    /**
     * 查询身材
     */
    public function stature_getOp() {
    	$model_stature = Model('stature');
    
    	$param = array();
    	$param['member_id'] = $this->member_info['member_id'];
    	$result = $model_stature->getStatureByMember($param);
    
    	if($result) {
    		$result['member_image'] = getMemberAvatarForID($this->member_info['member_id']);
    		$return['status'] = 0;
    		$return['stature'] = $result;
    		echo json_encode($return);exit;
    	} else {
    		$return['status'] = 1;
    		$return['message'] = '不存在';
    		echo json_encode($return);exit;
    	}
    }
    
    /**
     * 修改身材
     */
    public function stature_editOp() {
    	$model_stature = Model('stature');
    
    	$where = array();
    	$where['stature_id'] = $_POST['stature_id'];
    	
    	$update= array();
    	$update['shoe_size'] = $_POST['shoe_size'];
    	$update['clothing_size'] = $_POST['clothing_size'];
    	// echo json_encode($param);exit;
    	$result = $model_stature->editStature($update,$where);
    	if($result) {
    		$return['status'] = 0;
    		$return['message'] = '修改成功';
    		echo json_encode($return);exit;
    	} else {
    		$return['status'] = 1;
    		$return['message'] = '修改失败';
    		echo json_encode($return);exit;
    	}
    }
}

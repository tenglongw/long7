<?php
/**
 * 物流自提服务站管理
 *
 *
 *
 ***/

defined('InWrzcNet') or exit('Access Invalid!');
class authenticationControl extends mobileHomeControl{
    public function __construct() {
        parent::__construct();
    }
    /**
     * 查询用户是否认证
     */
    public function indexOp() {
    	$model = Model('authentication');
    	$where ['member_id'] = $_POST ['member_id']; // 真实姓名
    	$atct = $model->getAuthenticationInfo($where);
    	if(empty($atct)){
    		$result['isExist'] = "false";
    	}else{
    		$result['isExist'] = "true";
    		$result['atct'] = $atct;
    	}
    	echo json_encode($result);exit;
    }
    /**
     * 提交认证
     */
    public function save_atctOp() {
    	$model = Model('authentication');
		$insert = array ();
		$insert ['member_id'] = $_POST ['member_id']; // 真实姓名
		$insert ['atct_name'] = $_POST ['atct_name']; // 真实姓名
		$insert ['atct_idcard'] = $_POST ['atct_idcard']; // 身份证号
		$insert ['atct_phone'] = $_POST ['atct_phone']; // 身份证号
		for($i = 0; $i < $_POST ['fileCount']; $i ++) {
			$data ['origin_file_name'] = $_FILES ["uploadFile" . $i] ["name"];
			// 验证已上传附件数量 最大10个
			$upload = new UploadFile ();
			$upload->set ('default_dir', ATTACH_IDCARD.'/'.$_POST ['member_id'] );
			$result = $upload->upfile ( "uploadFile" . $i ); // 暂时的名字
			if ($result) {
				if ($i == 0) {
					$insert ['atct_idcard_image_front'] = $_POST ['member_id'].'/'.$upload->file_name;
				} else {
					$insert ['atct_idcard_image_back'] =  $_POST ['member_id'].'/'.$upload->file_name;
				}
				$return ['status'] = 0;
				$return ['msg'] = 'success';
			}else{
				$return ['status'] = 1;
				$return ['msg'] = 'error';
			}
		}
		$insert['atct_addtime'] = time();
		$model->addAuthentication($insert);
		echo json_encode ($return);exit;
	}
}

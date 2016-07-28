<?php
/**
 * 我的商城
 *
 *
 *
 *
 * by wygk.cn 创智凌云B2B2C多用户商城系统
 */

//use WrzcNet\Tpl;

defined('InWrzcNet') or exit('Access Invalid!');

class member_indexControl extends mobileMemberControl {

	public function __construct(){
		parent::__construct();
	}

    /**
     * 我的商城
     */
	public function indexOp() {
		$model = Model();
        $member_info = array();
        $member_info['user_name'] = $this->member_info['member_name'];
        $member_info['avator'] = getMemberAvatarForID($this->member_info['member_id']);//头像
        //$member_info['point'] = $this->member_info['member_points'];
        //$member_info['predepoit'] = $this->member_info['available_predeposit'];
		//v3-b11 显示充值卡
		//$member_info['available_rc_balance'] = $this->member_info['available_rc_balance'];
		//粉丝数
		$fan_count = $model->table('sns_friend')->where(array('friend_tomid'=>$this->member_info['member_id']))->count();
		$member_info['fan_count'] = $fan_count;
		//关注数
		$attention_count = $model->table('sns_friend')->where(array('friend_frommid'=>$this->member_info['member_id']))->count();
		$member_info['attention_count'] = $attention_count;
        output_data(array('member_info' => $member_info));
	}
	
	//上传头像
	public function uploadOp() {
		//import('function.thumb');
		Language::read('member_home_member,cut');
		$lang	= Language::getLangContent();
		$member_id = $_POST['member_id'];
	
		//上传图片
		$upload = new UploadFile();
		$ext = strtolower(pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION));
		$upload->set('file_name',"avatar_$member_id.$ext");
		$upload->set('default_dir',ATTACH_AVATAR);
		if (!empty($_FILES['pic']['tmp_name'])){
			$result = $upload->upfile('pic');
			$return['status'] = 0;
			$return['message'] = '上传成功';
			$return['default_dir'] = getMemberAvatarForID($this->member_info['member_id']);
			if (!$result){
				$return['status'] = 1;
				$return['message'] = '上传失败';
			}
		}else{
			showMessage('上传失败，请尝试更换图片格式或小图片','','html','error');
			$return['status'] = 1;
			$return['message'] = '上传失败，请尝试更换图片格式或小图片';
		}
		echo json_encode($return);exit;
	}
	/**
	 * 我的资料【用户中心】
	 *
	 * @param
	 * @return
	 */
	public function memberOp() {
	
		Language::read('member_home_member');
		$lang	= Language::getLangContent();
	
		$model_member	= Model('member');
	
		$member_array	= array();
		$member_array['member_name']	= $_POST['member_name'];
		$member_array['member_avatar']	= $_POST['member_avatar'];
		$update = $model_member->editMember(array('member_id'=>$_POST['member_id']),$member_array);
		if($update){
			$result['status'] = 0;
			$result['message'] = '更新成功';
		}else{
			$result['status'] = 1;
			$result['message'] = '更新失败';
		}
		echo json_encode($result);
	}
}

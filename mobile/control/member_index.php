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
	 * 获取新动态列表
	 */
	public function new_listOp(){
		$model = Model();
		// 话题列表
		$where = array();
		$where['circle_id']	= 1;
		$where['member_id']	= $_POST['member_id'];
		$where['theme_newcount'] = array('gt','0');
		$field = '*';
		$theme_list = $model->table('circle_theme')->where($where)->field($field)->order('is_stick desc,lastspeak_time desc')->select();
		if(!empty($theme_list)){
			foreach($theme_list as $key=>$val){
				$themeid_array[$key] = $theme_list[$key]['theme_id'];
			}
		}
		//附件列表
		$affix_list = $model->table('circle_affix')->where(array('affix_type'=>1,'theme_id'=>array('in', $themeid_array)))->select();
		//回复列表
		$reply_list = $model->table('circle_threply')->where(array('theme_id'=>array('in', $themeid_array)))->order('reply_id desc')->select();
		if(!empty($reply_list)){
			foreach($reply_list as $key=>$val){
				if(empty($val['member_avatar'])){
					$reply_list[$key]['member_avatar'] = getMemberAvatarForID($val['member_id']);
				}else{
					$reply_list[$key]['member_avatar'] = $val['member_avatar'];
				}
				$reply_list[$key]['reply_addtime'] = date('Y-m-d H:i', $val['reply_addtime']);
				$reply_list[$key]['reply_content'] = removeUBBTag($val['reply_content']);
			}
		}
		//点赞列表
		$like_list = $model->table('circle_like')->where(array('theme_id'=>array('in', $themeid_array)))->select();
		$result = array();
		foreach ($theme_list as $key=>$val){
			//附件
			foreach ($affix_list as $akey=>$aval){
				//foreach ($aval as $avkey=>$avval){
				if($val['theme_id']== $aval['theme_id']){
					$affix['affix_id'] = $aval['affix_id'];
					$affix['affix_filename'] = themeImageUrl($partpath.'/'.$aval['affix_filename']);
					$affix['affix_filethumb'] = themeImageUrl($partpath.'/'.$aval['affix_filethumb']);
					$theme_list[$key]['affix_list'][] = $affix;
				}
					
				//}
			}
		}
		
		foreach ($theme_list as $key=>$val){
			if(!empty($val['affix_list'])){
				$theme['theme_affix'] = $val['affix_list'][0]['affix_filethumb'];
			}else{
				$theme['theme_affix'] = '';
			}
			$theme['theme_content'] = $val['theme_content'];
			//回复
			foreach ($reply_list as $rkey=>$rval){
				if($val['theme_id']== $rval['theme_id']){
					$reply['type'] = 'reply';
					$reply['reply_content'] = $rval['reply_content'];
					$reply['member_avatar'] = getMemberAvatarForID($rval['member_id']);
					$reply['member_name'] = $rval['member_name'];
					$reply['add_time'] = date(' H:i',$rval['reply_addtime']);
					$reply['theme'] = $theme;
					$result[] = $reply;
				}
			}
			//点赞
			foreach ($like_list as $lkey=>$lval){
				if($val['theme_id'] == $lval['theme_id']){
					$like['type'] = 'like';
					$like['member_avatar'] = getMemberAvatarForID($lval['member_id']);
					$like['member_name'] = $lval['member_name'];
					$like['member_id'] = $lval['member_id'];
					$like['add_time'] = date(' H:i',$val['theme_addtime']);
					$like['theme'] = $theme;
					$result[] = $like;
				}
			}
		}
		//Model()->table('circle_theme')->update(array('member_id'=>$_POST['member_id'], 'theme_newcount'=>'0'));
		Model()->table('circle_theme')->where(array('member_id'=>$_POST['member_id']))->update(array('theme_newcount'=>'0'));
		output_data(array('theme_list' => $result));
	}
	
    /**
     * 获取新数量
     */
	public function new_countOp() {
		$model = Model();
		// 话题列表
		$where = array();
		$where['circle_id']	= 1;
		$where['member_id']	= $_POST['member_id'];
		$where['theme_newcount'] = array('gt','0');
		$field = 'theme_id,theme_newcount';
		$theme_list = $model->table('circle_theme')->where($where)->field($field)->order('is_stick desc,lastspeak_time desc')->select();
        output_data(array('theme_list' => $theme_list));
	}
	/**
	 * 更新数量
	 */
	public function update_countOp() {
		$theme_id = $_POST['theme_id'];
		$theme_newcount = intval($_POST['theme_newcount']);
		Model()->table('circle_theme')->update(array('theme_id'=>$theme_id, 'theme_newcount'=>array('exp', 'theme_newcount-'.$theme_newcount)));
		//output_data(array('theme_list' => $theme_list));
		$result['status'] = 0;
		$result['message'] = '更新成功';
		echo json_encode($result);exit;
	}
	
	/**
	 *更新数量
	 */
	public function indexOp() {
		$model = Model();
		$member_info = array();
		$member_info['user_name'] = $this->member_info['member_name'];
		if(empty($this->member_info['member_avatar'])){
			$member_info['avator'] = getMemberAvatarForID($this->member_info['member_id']);//头像
		}else{
			$member_info['avator'] = $this->member_info['member_avatar'];
		}
		$member_info['background'] = getMemberBackgroundForID($this->member_info['member_id']);//头像
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
	
	//上传头像
	public function backgroundOp() {
		//import('function.thumb');
		Language::read('member_home_member,cut');
		$lang	= Language::getLangContent();
		$member_id = $_POST['member_id'];
	
		//上传图片
		$upload = new UploadFile();
		$ext = strtolower(pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION));
		$upload->set('file_name',"background_$member_id.$ext");
		$upload->set('default_dir',ATTACH_AVATAR);
		if (!empty($_FILES['pic']['tmp_name'])){
			$result = $upload->upfile('pic');
			$return['status'] = 0;
			$return['message'] = '上传成功';
			$return['default_dir'] = getMemberBackgroundForID($this->member_info['member_id']);
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
	
		$member_id = $_POST['member_id'];
		//删除图片
		//unlinkMemberAvatarForID($member_id);
		if (!empty($_FILES['pic']['tmp_name'])){
			$data['msg']				= 'error';
			$data['origin_file_name']	= $_FILES["uploadFile".$i]["name"];
			//上传图片
			$upload = new UploadFile();
			$ext = strtolower(pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION));
			$upload->set('file_name',"avatar_$member_id".".jpg");
			$upload->set('default_dir',ATTACH_AVATAR);
			$result = $upload->upfile('pic');
			if ($result){
// 				$data['msg'] = 'succeed';
// 				$data['default_dir'] = getMemberAvatarForID($this->member_info['member_id'],$ext);
				$return['status'] = '0';
				$return['message'] = '上传头像成功';
			}else{
				$return['status'] = '1';
				$return['message'] = '上传头像失败';
			}
// 			$return['upload_pic'] = $data;
		}
		if(!empty($_POST['member_name'])){
			$model_member	= Model('member');
			$model = Model();
			$member_array	= array();
			$member_array['member_name']	= $_POST['member_name'];
			$member_array['member_avatar']	= $_POST['member_avatar'];
			$update = $model_member->editMember(array('member_id'=>$member_id),$member_array);
			//修改社区名字
			$model->table('circle_theme')->where(array('member_id'=>$member_id))->update(array('member_name'=>$_POST['member_name']));
			//修改点赞名字
			$model->table('circle_like')->where(array('member_id'=>$member_id))->update(array('member_name'=>$_POST['member_name']));
			//回复名字
			$model->table('circle_threply')->where(array('member_id'=>$member_id))->update(array('member_name'=>$_POST['member_name']));
			//转发名字
			$model->table('circle_theme')->where(array('forward_member_id'=>$member_id))->update(array('forward_member_name'=>$_POST['member_name']));
			if($update){
				$return['status'] = 0;
				$return['message'] = '更新成功';
			}else{
				$return['status'] = 1;
				$return['message'] = '更新失败';
			}
// 			$return['update_name'] = $data1;
		}
		echo json_encode($return);
	}
	
	
}

<?php
/**
 * 合作伙伴管理
 *
 *
 *
 *
 */



defined('InWrzcNet') or exit('Access Invalid!');
class mb_welcomeControl extends SystemControl{
	public function __construct(){
		parent::__construct();
		Language::read('mobile');
	}
	/**
	 *
	 */
	public function mb_welcome_listOp(){
		$lang	= Language::getLangContent();
		$model_link = Model('mb_welcome');
		$link_list = $model_link->getLinkList(array());
		/**
		 * 整理图片链接
		 */
		if (is_array($link_list)){
			foreach ($link_list as $k => $v){
				if (!empty($v['w_image'])){
					$link_list[$k]['w_image'] = UPLOAD_SITE_URL.'/'.ATTACH_MOBILE.'/welcome'.'/'.$v['w_image'];
				}
			}
		}

		/**
		 * 商品分类
		 */
// 		$goods_class = Model('goods_class')->getGoodsClassForCacheModel();
// 		Tpl::output('goods_class',$goods_class);

		Tpl::output('link_list',$link_list);
		Tpl::showpage('mb_welcome.list');
	}

	/**
	 * 删除
	 */
	public function mb_welcome_delOp(){
		$lang	= Language::getLangContent();
		if (intval($_GET['w_id']) > 0){
			$model_link = Model('mb_welcome');

			/**
			 * 删除图片
			 */
			$tmp = $model_link->getOneLink(intval($_GET['w_id']));
			if (!empty($tmp['w_image'])){
				@unlink(BASE_ROOT_PATH.DS.DIR_UPLOAD.DS.ATTACH_MOBILE.'/welcome/'.$tmp['w_image']);
				@unlink(BASE_ROOT_PATH.DS.DIR_UPLOAD.DS.ATTACH_MOBILE.'/welcome/'.$tmp['w_thumb_image']);
			}
			$model_link->del($tmp['w_id']);
			showMessage($lang['link_index_del_succ'],'index.php?act=mb_welcome&op=mb_welcome_list');
		}else {
			showMessage($lang['link_index_choose_del'],'index.php?act=mb_welcome&op=mb_welcome_list');
		}
	}

	/**
	 * 添加
	 */
	public function mb_welcome_addOp(){

		$lang	= Language::getLangContent();
		$model_link = Model('mb_welcome');

		if ($_POST['form_submit'] == 'ok'){

			/**
			 * 上传图片
			 */
			if ($_FILES['link_pic']['name'] != ''){
				$upload = new UploadFile();
				$upload->set('default_dir',ATTACH_MOBILE.'/welcome');
				$upload->set('thumb_width',	480);
				$upload->set('thumb_height', 800);
				$upload->set('thumb_ext', '_480x800');
				$result = $upload->upfile('link_pic');
				if ($result){
					$_POST['link_pic'] = $upload->file_name;
					$_POST['link_pic_thumb'] = $upload->thumb_image;
				}else {
					showMessage($upload->error);
				}
			}

			$insert_array = array();
			$insert_array['w_name'] = trim($_POST['link_name']);
			$insert_array['w_image'] = trim($_POST['link_pic']);
			$insert_array['w_thumb_image'] = trim($_POST['link_pic_thumb']);
			$insert_array['w_sort'] = intval($_POST['link_sort']);
			$insert_array['w_type'] = intval($_POST['link_type']);
			$insert_array['w_url'] = $_POST['link_url'];
			$insert_array['w_time'] = time();
			$result = $model_link->add($insert_array);
			if ($result){
				$url = array(
					array(
						'url'=>'index.php?act=mb_welcome&op=mb_welcome_add',
						'msg'=>$lang['link_add_again'],
					),
					array(
						'url'=>'index.php?act=mb_welcome&op=mb_welcome_list',
						'msg'=>$lang['link_add_back_to_list'],
					)
				);
				showMessage($lang['link_add_succ'],$url);
			}else {
				showMessage($lang['link_add_fail']);
			}
		}

		Tpl::showpage('mb_welcome.add');
	}

	/**
	 * 编辑
	 */
	public function mb_welcome_editOp(){
		$lang	= Language::getLangContent();
		$model_link = Model('mb_welcome');
		if ($_POST['form_submit'] == 'ok'){

			/**
			 * 上传图片
			 */
			if ($_FILES['link_pic']['name'] != ''){
				$upload = new UploadFile();
				$upload->set('default_dir',ATTACH_MOBILE.'/welcome');
				$upload->set('thumb_width',	480);
				$upload->set('thumb_height', 800);
				$upload->set('thumb_ext', '_480x800');
				$result = $upload->upfile('link_pic');
				if ($result){
					$_POST['link_pic'] = $upload->file_name;
					$_POST['link_pic_thumb'] = $upload->thumb_image;
				}else {
					showMessage($upload->error);
				}
			}
			$link_array = $model_link->getOneLink(intval($_POST['w_id']));
			$update_array = array();
			$update_array['w_id'] = intval($_POST['w_id']);
			$update_array['w_name'] = trim($_POST['link_name']);
			if(!empty($_POST['link_pic'])){
				$update_array['w_image'] = trim($_POST['link_pic']);
				$update_array['w_thumb_image'] = trim($_POST['link_pic_thumb']);
			}
			$update_array['w_sort'] = intval($_POST['link_sort']);
			$update_array['w_type'] = intval($_POST['link_type']);
			$update_array['w_url'] = $_POST['link_url'];
			$result = $model_link->update($update_array);
			if ($result){
				/**
				 * 删除图片
				 */
				if (!empty($_POST['link_pic']) && !empty($link_array['link_pic'])){
					@unlink(BASE_ROOT_PATH.DS.DIR_UPLOAD.DS.ATTACH_MOBILE.'/welcome/'.$link_array['link_pic']);
				}
				$url = array(
					array(
						'url'=>'index.php?act=mb_welcome&op=mb_welcome_edit&s_id='.intval($_POST['w_id']),
						'msg'=>$lang['link_edit_again']
					),
					array(
						'url'=>'index.php?act=mb_welcome&op=mb_welcome_list',
						'msg'=>$lang['link_add_back_to_list'],
					)
				);
				showMessage($lang['link_edit_succ'],$url);
			}else {
				showMessage($lang['link_edit_fail']);
			}
		}

		$link_array = $model_link->getOneLink(intval($_GET['w_id']));
		if (empty($link_array)){
			showMessage($lang['wrong_argument']);
		}
		Tpl::output('link_array',$link_array);
		Tpl::showpage('mb_welcome.edit');
	}
	/**
	 * ajax操作
	 */
	public function ajaxOp(){
		switch ($_GET['branch']){
			/**
			 * 合作伙伴 排序
			 */
			case 'link_sort':
				$model_link = Model('link');
				$update_array = array();
				$update_array['link_id'] = intval($_GET['id']);
				$update_array[$_GET['column']] = trim($_GET['value']);
				$result = $model_link->update($update_array);
				echo 'true';exit;
				break;
		}
	}
}

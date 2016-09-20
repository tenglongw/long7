<?php
/**
 * 合作伙伴管理
 *
 *
 *
 *
 */



defined('InWrzcNet') or exit('Access Invalid!');
class mb_sellControl extends SystemControl{
	public function __construct(){
		parent::__construct();
		Language::read('mobile');
	}
	/**
	 *
	 */
	public function mb_sell_listOp(){
		$lang	= Language::getLangContent();
		$model_link = Model('mb_sell');
		/**
		 * 删除
		 */
		if ($_POST['form_submit'] == 'ok'){
			if (is_array($_POST['del_id']) && !empty($_POST['del_id'])){
				foreach ($_POST['del_id'] as $k => $v){
					/**
					 * 删除图片
					 */
					$v = intval($v);
					$tmp = $model_link->getOneLink($v);
					if (!empty($tmp['gc_thumb'])){
						@unlink(BASE_ROOT_PATH.DS.DIR_UPLOAD.DS.ATTACH_MOBILE.'/sell/'.$tmp['gc_thumb']);
					}
					unset($tmp);
					$model_link->del($v);
				}
				showMessage($lang['link_index_del_succ']);
			}else {
				showMessage($lang['link_index_choose_del']);
			}
		}
		$link_list = $model_link->getLinkList(array());
		/**
		 * 整理图片链接
		 */
		if (is_array($link_list)){
			foreach ($link_list as $k => $v){
				if (!empty($v['s_image'])){
					$link_list[$k]['s_image'] = UPLOAD_SITE_URL.'/'.ATTACH_MOBILE.'/sell'.'/'.$v['s_image'];
				}
			}
		}

		/**
		 * 商品分类
		 */
// 		$goods_class = Model('goods_class')->getGoodsClassForCacheModel();
// 		Tpl::output('goods_class',$goods_class);

		Tpl::output('link_list',$link_list);
		Tpl::showpage('mb_sell.list');
	}

	/**
	 * 删除
	 */
	public function mb_sell_delOp(){
		$lang	= Language::getLangContent();
		if (intval($_GET['s_id']) > 0){
			$model_link = Model('mb_sell');

			/**
			 * 删除图片
			 */
			$tmp = $model_link->getOneLink(intval($_GET['s_id']));
			if (!empty($tmp['gc_thumb'])){
				@unlink(BASE_ROOT_PATH.DS.DIR_UPLOAD.DS.ATTACH_MOBILE.'/sell/'.$tmp['s_image']);
			}
			$model_link->del($tmp['s_id']);
			showMessage($lang['link_index_del_succ'],'index.php?act=mb_sell&op=mb_sell_list');
		}else {
			showMessage($lang['link_index_choose_del'],'index.php?act=mb_sell&op=mb_sell_list');
		}
	}

	/**
	 * 添加
	 */
	public function mb_sell_addOp(){

		$lang	= Language::getLangContent();
		$model_link = Model('mb_sell');

		if ($_POST['form_submit'] == 'ok'){

			/**
			 * 上传图片
			 */
			if ($_FILES['link_pic']['name'] != ''){
				$upload = new UploadFile();
				$upload->set('default_dir',ATTACH_MOBILE.'/sell');

				$result = $upload->upfile('link_pic');
				if ($result){
					$_POST['link_pic'] = $upload->file_name;
				}else {
					showMessage($upload->error);
				}
			}

			$insert_array = array();
			$insert_array['s_name'] = trim($_POST['link_name']);
			$insert_array['s_image'] = trim($_POST['link_pic']);
			$insert_array['s_time'] = strtotime($_POST['link_date']);
			$insert_array['s_operation'] = trim($_POST['operation']);
			$insert_array['s_operation_value'] = trim($_POST['operation_value']);
			$result = $model_link->add($insert_array);
			if ($result){
				$url = array(
					array(
						'url'=>'index.php?act=mb_sell&op=mb_sell_add',
						'msg'=>$lang['link_add_again'],
					),
					array(
						'url'=>'index.php?act=mb_sell&op=mb_sell_list',
						'msg'=>$lang['link_add_back_to_list'],
					)
				);
				showMessage($lang['link_add_succ'],$url);
			}else {
				showMessage($lang['link_add_fail']);
			}
		}

		Tpl::showpage('mb_sell.add');
	}

	/**
	 * 编辑
	 */
	public function mb_sell_editOp(){
		$lang	= Language::getLangContent();
		$model_link = Model('mb_sell');
		if ($_POST['form_submit'] == 'ok'){

			/**
			 * 上传图片
			 */
			if ($_FILES['link_pic']['name'] != ''){
				$upload = new UploadFile();
				$upload->set('default_dir',ATTACH_MOBILE.'/sell');

				$result = $upload->upfile('link_pic');
				if ($result){
					$_POST['link_pic'] = $upload->file_name;
				}else {
					showMessage($upload->error);
				}
			}
			$link_array = $model_link->getOneLink(intval($_POST['s_id']));
			$update_array = array();
			$update_array['s_id'] = intval($_POST['s_id']);
			$update_array['s_name'] = trim($_POST['link_name']);
			if(!empty($_POST['link_pic'])){
				$update_array['s_image'] = trim($_POST['link_pic']);
			}
			$update_array['s_time'] = strtotime($_POST['link_date']);
			$update_array['s_operation'] = trim($_POST['operation']);
			$update_array['s_operation_value'] = trim($_POST['operation_value']);
			$result = $model_link->update($update_array);
			if ($result){
				/**
				 * 删除图片
				 */
				if (!empty($_POST['link_pic']) && !empty($link_array['link_pic'])){
					@unlink(BASE_ROOT_PATH.DS.DIR_UPLOAD.DS.ATTACH_MOBILE.'/sell/'.$link_array['link_pic']);
				}
				$url = array(
					array(
						'url'=>'index.php?act=mb_sell&op=mb_sell_edit&s_id='.intval($_POST['s_id']),
						'msg'=>$lang['link_edit_again']
					),
					array(
						'url'=>'index.php?act=mb_sell&op=mb_sell_list',
						'msg'=>$lang['link_add_back_to_list'],
					)
				);
				showMessage($lang['link_edit_succ'],$url);
			}else {
				showMessage($lang['link_edit_fail']);
			}
		}

		$link_array = $model_link->getOneLink(intval($_GET['s_id']));
		if (empty($link_array)){
			showMessage($lang['wrong_argument']);
		}
		Tpl::output('link_array',$link_array);
		Tpl::showpage('mb_sell.edit');
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

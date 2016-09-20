<?php
/**
 * 代金券管理
 ***/
require_once("../JPush/JPush.php");
defined('InWrzcNet') or exit('Access Invalid!');
class jpushControl extends SystemControl{
    const SECONDS_OF_30DAY = 2592000;
    private $applystate_arr;
    private $quotastate_arr;
    private $templatestate_arr;

	public function __construct(){
		parent::__construct();
	}

    /**
	 * 文章管理
	 */
	public function indexOp(){
		$lang	= Language::getLangContent();
		$model_jpush = Model('jpush');
		/**
		 * 删除
		 */
		if (chksubmit()){
			if (is_array($_POST['del_id']) && !empty($_POST['del_id'])){
				foreach ($_POST['del_id'] as $k => $v){
					$model_jpush->del($v);
				}
				showMessage($lang['article_index_del_succ']);
			}else {
				showMessage($lang['article_index_choose']);
			}
		}
		/**
		 * 检索条件
		 */
		$condition['like_title'] = trim($_GET['search_title']);
		/**
		 * 分页
		 */
		$page	= new Page();
		$page->setEachNum(10);
		$page->setStyle('admin');
		/**
		 * 列表
		 */
		$jpush_list = $model_jpush->getJpushList($condition,$page);
		/**
		 * 整理列表内容
		 */
		if (is_array($jpush_list)){
			/**
			 * 取文章分类
			 */
			foreach ($jpush_list as $k => $v){
				/**
				 * 发布时间
				 */
				$jpush_list[$k]['jpush_create_time'] = date('Y-m-d H:i:s',$v['jpush_create_time']);
				/**
				 * 推送时间
				 */
				$jpush_list[$k]['jpush_make_time'] = date('Y-m-d H:i:s',$v['jpush_make_time']);
			}
		}

		Tpl::output('jpush_list',$jpush_list);
		Tpl::output('page',$page->show());
		Tpl::output('search_title',trim($_GET['search_title']));
		Tpl::showpage('jpush.index');
	}
	
	/**
	 * 添加推送
	 */
	public function jpush_addOp(){
		$lang	= Language::getLangContent();
		$model_jpush = Model('jpush');
		
		$app_key = 'baab624c137bc39fb2e60c14';
		$master_secret = 'e866411ec63c9c3b486a6618';
		/**
		 * 保存
		 */
		if (chksubmit()){
			$client = new JPush($app_key, $master_secret);
			/**
			 * 验证
			 */
			$obj_validate = new Validate();
			$obj_validate->validateparam = array(
					array("input"=>$_POST["jpush_content"], "require"=>"true", "message"=>$lang['article_add_content_null']),
			);
			$error = $obj_validate->validate();
			if ($error != ''){
				showMessage($error);
			}else {
	
				$insert_array = array();
				$insert_array['jpush_content'] = trim($_POST['jpush_content']);
				$insert_array['jpush_type'] = intval($_POST['jpush_type']);
				$insert_array['jpush_operation'] = $_POST['jpush_operation'];
				$insert_array['jpush_operation_value'] = $_POST['jpush_operation_value'];
				if($insert_array['jpush_type']==1){
					$insert_array['jpush_make_time'] = strtotime($_POST['link_date']);
				}else{
					$insert_array['jpush_make_time'] = time();
				}
				$insert_array['jpush_create_time'] = time();
				$result = $model_jpush->add($insert_array);
				if($result){
					$content['type'] = $insert_array['jpush_operation'];
					$content['data'] = $insert_array['jpush_operation_value'];
					$content['content'] = $_POST['jpush_content'];
					$content_str = json_encode($content);
					if($insert_array['jpush_type']==0){
						//立即推送
						$result = $client->push()
						->setPlatform('all')
						->addAllAudience()
						->setNotificationAlert($content['content'])
						->send();
					}else{
						$payload = $client->push()
						->setPlatform("all")
						->addAllAudience()
						->setNotificationAlert($content['content'])
						->build();
						// 创建一个2016-12-22 13:45:00触发的定时任务
						$response = $client->schedule()->createSingleSchedule("每天14点发送的定时任务", $payload, array("time"=>$_POST['link_date']));
						echo json_encode($response);exit;
					}
					$url = array(
							array(
									'url'=>'index.php?act=jpush&op=index',
									'msg'=>"{$lang['article_add_tolist']}",
							)
							);
					showMessage("{$lang['article_add_ok']}");
				}
			}
		}
	
		Tpl::output('PHPSESSID',session_id());
		Tpl::showpage('jpush.add');
	}
}

<?php
/**
 * cms首页
 *
 *
 *
 * by wygk.cn 创智凌云B2B2C多用户商城系统
 */


defined('InWrzcNet') or exit('Access Invalid!');
class indexControl extends mobileHomeControl{

	public function __construct() {
        parent::__construct();
    }

    /**
     * 首页
     */
	public function indexOp() {
        $model_mb_special = Model('mb_special'); 
        $article_model	= Model('article');
        $data = $model_mb_special->getMbSpecialIndex();
        //查询文章列表
        $condition	= array();
        $condition['article_show'] = '1';
        //$condition['home_index'] = 'home_index';
        $condition['field'] = 'article.article_id,article.ac_id,article.article_url,article.article_title,article.article_time,upload.file_name';
        $condition['order'] = 'article_sort asc,article_time desc';
        $condition['limit'] = '300';
        $article_list	= $article_model->getWapJoinList($condition);
        
        //$article_list = $article_model->getArticleList($condition);
        //处理图片地址
        $article_list = $this->article_extend($article_list);
        foreach ($data as $key=>$value){
        	$result['status'] = 200;
        	if($key==0){
        		$result['adv_list'] = $value['adv_list']['item'];
        	}
        }
        $result['article_list'] = $article_list;
        echo json_encode($result);exit;
	}
	
	/**
	 * 文章列表
	 */
	public function article_listOp() {
		if(!empty($_GET['ac_id']) && intval($_GET['ac_id']) > 0) {
			$article_class_model	= Model('article_class');
			$article_model	= Model('article');
			//$condition	= array();
				
			$child_class_list = $article_class_model->getChildClass(intval($_GET['ac_id']));
			$ac_ids	= array();
			if(!empty($child_class_list) && is_array($child_class_list)){
				foreach ($child_class_list as $v){
					$ac_ids[]	= $v['ac_id'];
				}
			}
			$ac_ids	= implode(',',$ac_ids);
			//$condition['ac_ids']	= $ac_ids;
			//$condition['article_show']	= '1';
				
				
			$condition	= array();
			$condition['article_show'] = '1';
			//$condition['home_index'] = 'home_index';
			$condition['field'] = 'article.article_id,article.ac_id,article.article_url,article.article_title,article.article_time,upload.file_name';
			$condition['order'] = 'article_sort asc,article_time desc';
			$condition['limit'] = '300';
			$article_list	= $article_model->getWapJoinList($condition);
				
			//$article_list = $article_model->getArticleList($condition);
			//处理图片地址
			$article_list = $this->article_extend($article_list);
			output_data(array('article_list' => $article_list));
		}
		else {
			output_error('缺少参数:文章类别编号');
		}
	}
	
	private function article_extend($article_list){
		foreach ($article_list as $key => $value) {
			$article_list[$key]['file_name'] = UPLOAD_ARTICLE_SITE_URL.'/'.$article_list[$key]['file_name'];
		}
		return $article_list;
	}
	
	//商城
	public function shopMallOp() {
		$model_mb_special = Model('mb_special');
		$data = $model_mb_special->getMbSpecialShopMall();
		
		foreach ($data as $key=>$value){
			$result['status'] = 200;
			if($key==0){
				$result['adv_list'] = $value['adv_list']['item'];
			}else{
				$temp=$value['home1'];
				$result['special'][] = $temp;
			}
		}
		echo json_encode($result);exit;
		//$this->_output_special($result, $_GET['type']);
	}

    /**
     * 专题
     */
	public function specialOp() {
        $model_mb_special = Model('mb_special'); 
        $data = $model_mb_special->getMbSpecialItemUsableListByID($_GET['special_id']);
        $this->_output_special($data, $_GET['type'], $_GET['special_id']);
	}

    /**
     * 输出专题
     */
    private function _output_special($data, $type = 'json', $special_id = 0) {
        $model_special = Model('mb_special');
        if($_GET['type'] == 'html') {
            $html_path = $model_special->getMbSpecialHtmlPath($special_id);
            if(!is_file($html_path)) {
                ob_start();
                Tpl::output('list', $data);
                Tpl::showpage('mb_special');
                file_put_contents($html_path, ob_get_clean());
            }
            header('Location: ' . $model_special->getMbSpecialHtmlUrl($special_id));
            die;
        } else {
            output_data($data);
        }
    }

    /**
     * android客户端版本号
     */
    public function apk_versionOp() {
		$version = C('mobile_apk_version');
		$url = C('mobile_apk');
        if(empty($version)) {
           $version = '';
        }
        if(empty($url)) {
            $url = '';
        }

        output_data(array('version' => $version, 'url' => $url));
    }
}

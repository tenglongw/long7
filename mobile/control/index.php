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
//         $article_model	= Model('article');
        $data = $model_mb_special->getMbSpecialIndex();
        //查询文章列表
//         $condition	= array();
//         $condition['article_show'] = '1';
//         //$condition['home_index'] = 'home_index';
//         $condition['field'] = 'article.article_id,article.ac_id,article.article_url,article.article_title,article.article_time,upload.file_name';
//         $condition['order'] = 'article_sort asc,article_time desc';
//         $condition['limit'] = '300';
//         $article_list	= $article_model->getWapJoinList($condition);
        
//         //$article_list = $article_model->getArticleList($condition);
//         //处理图片地址
//         $article_list = $this->article_extend($article_list);
        foreach ($data as $key=>$value){
        	$result['status'] = 200;
        	if($key==0){
        		$result['adv_list'] = $value['adv_list']['item'];
        		foreach ($result['adv_list'] as $akey=>$aval){
        			if($aval['type']=='special'){
        				//查询专题页title
        				$special_info = $model_mb_special->getMbSpecialById(intval($aval['data']));
        				$result['adv_list'][$akey]['title'] = $special_info['special_desc'];
        			}
        			$name_array = explode('.', $aval['image']);
        			$size = count($name_array);
        			$result['adv_list'][$akey]['image'] =str_replace('.'.$name_array[$size-1],'_640x350.'.$name_array[$size-1],  $aval['image']);
        		}
        	}
        }
//         foreach ($article_list as $key=>$val){
//         	if($key==0){
//         		$article_one = $val;
//         	}else{
//         		$article_other[] = $val;
//         	}
//         }
        //$result['article_one'] = $article_one;
        //$result['article_list'] = $article_other;
        echo json_encode($result);exit;
	}
	
	/**
	 * 文章列表
	 */
	public function article_listOp() {
		$article_model	= Model('article');
		$condition	= array();
		$condition['article_show'] = '1';
		//$condition['home_index'] = 'home_index';
		$condition['field'] = 'article.article_id,article.ac_id,article.article_url,article.article_title,article.article_time,upload.file_name';
		$condition['order'] = 'article_sort asc,article_time desc';
		$condition['limit'] = '300';
		$article_list	= $article_model->getWapJoinList($condition);
		
		$page_count = $model->table('circle_theme')->where($where)->count();
		$pages=intval($page_count/50);
		if($page_count%50){
			$pages++;
		}
		$current_page = intval($_POST['curpage']);
		//处理图片地址
		$article_list = $this->article_extend($article_list);
		foreach ($article_list as $key=>$val){
			if($key==0){
				$article_one = $val;
			}else{
				$article_other[] = $val;
			}
		}
		$result['article_one'] = $article_one;
		$result['article_list'] = $article_other;
		$page_count = $article_model->gettotalpage();
		output_data(array('article_list' => $article_list),mobile_page($page_count));
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
				foreach ($value['adv_list']['item'] as $akey=>$aval){
					if($aval['type']=='special'){
						//查询专题页title
						$special_info = $model_mb_special->getMbSpecialById(intval($aval['data']));
						$aval['title'] = $special_info['special_desc'];
					}
					$result['adv_list'][] = $aval;
				}
			}else{
				$temp=$value['home1'];
				$result['special'][] = $temp;
			}
		}
		$result['class_list'] = $this->_get_root_class();
		echo json_encode($result);exit;
		//$this->_output_special($result, $_GET['type']);
	}
	
	/**
	 * 返回一级分类列表
	 */
	private function _get_root_class() {
		$model_goods_class = Model('goods_class');
		$model_mb_category = Model('mb_category');
	
		$goods_class_array = Model('goods_class')->getGoodsClassForCacheModel();
		$class_list = $model_goods_class->getGoodsClassListByParentId(0);
		//echo json_encode($class_list);exit;
		$mb_categroy = $model_mb_category->getLinkList(array());
		$mb_categroy = array_under_reset($mb_categroy, 'gc_id');
		foreach ($class_list as $key => $value) {
			if(!empty($mb_categroy[$value['gc_id']])) {
				$class_list[$key]['image'] = UPLOAD_SITE_URL.DS.ATTACH_MOBILE.DS.'category'.DS.$mb_categroy[$value['gc_id']]['gc_thumb'];
			} else {
				$class_list[$key]['image'] = '';
			}
	
			$class_list[$key]['text'] = '';
			$child_class_string = $goods_class_array[$value['gc_id']]['child'];
			$child_class_array = explode(',', $child_class_string);
			foreach ($child_class_array as $child_class) {
				$class_list[$key]['text'] .= $goods_class_array[$child_class]['gc_name'] . '/';
			}
			$class_list[$key]['text'] = rtrim($class_list[$key]['text'], '/');
		}
	
		return $class_list;
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
    public function welcomeOp() {
    	$model_link = Model('mb_welcome');
    	$link_list = $model_link->getLinkList(array('order'=>'w_type,w_sort'));
    	/**
    	 * 整理图片链接
    	 */
    	$welcome_list = array();
    	;
    	if (is_array($link_list)){
    		foreach ($link_list as $k => $v){
    			if (!empty($v['w_image'] )){
    				$v['w_image'] = UPLOAD_SITE_URL.'/'.ATTACH_MOBILE.'/welcome'.'/'.$v['w_image'];
    				$v['w_thumb_image'] = UPLOAD_SITE_URL.'/'.ATTACH_MOBILE.'/welcome'.'/'.$v['w_thumb_image'];
    			}
    			if($v['w_type'] == '0'){
    				$welcome_list[] = $v;
    			}else{
    				$flash = $v;
    			}
    		}
    	}
    	$return['guide_list'] = $welcome_list;
    	$return['welcome'] = $flash;
    	output_data($return);
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

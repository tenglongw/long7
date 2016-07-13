<?php
/**
 * 文章 
 * 创智凌云B2B2C多用户商城系统 - wygk.cn
 * 
 **/

defined('InWrzcNet') or exit('Access Invalid!');
class articleControl extends mobileHomeControl{

	public function __construct() {
        parent::__construct();
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
    
    /**
     * 根据类别编号获取文章类别信息
     */
    private function article_type_name() {
    	if(!empty($_GET['ac_id']) && intval($_GET['ac_id']) > 0) {
			$article_class_model = Model('article_class');
			$article_class = $article_class_model->getOneClass(intval($_GET['ac_id']));
			return ($article_class['ac_name']);
		}
		else {
			return ('缺少参数:文章类别编号');			
		}    	
    }
    
    /**
     * 单篇文章显示
     */
    public function article_showOp() {
		$article_model	= Model('article');

        if(!empty($_GET['article_id']) && intval($_GET['article_id']) > 0) {
			$article	= $article_model->getOneArticle(intval($_GET['article_id']));

			if (empty($article)) {
				output_error('文章不存在');
			}
			else {
				output_data($article);
			}
        } 
        else {
			output_error('缺少参数:文章编号');
        }
    }
}

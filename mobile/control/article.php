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
			$article_model	= Model('article');
			$condition	= array();
			$condition['article_show'] = '1';
			//$condition['home_index'] = 'home_index';
			$condition['field'] = 'article.article_id,article.ac_id,article.article_url,article.article_title,article.article_time,upload.file_name';
			$condition['order'] = 'article_sort asc,article_time desc';
			//$condition['limit'] = '300';
			//总数
			$count = $article_model->getWapJoinCount($condition);
			if(empty($_POST['page'])){
				$pagesize = 50;
			}else{
				$pagesize = $_POST['page'];
			}
			$pages=intval($count/$pagesize);
			if($page_count%$pagesize){
				$pages++;
			}
			$current_page = intval($_POST['curpage']);
			if(isset($_POST['curpage'])){
				$current_page = intval($_POST['curpage']);
			}else{
				$current_page = 1;
			}
			//计算记录偏移量
			$offset = $pagesize*($current_page-1)+1;
			if($current_page == 1){
				$offset = 1;
			}
			$condition['limit'] = $offset.','.$pagesize;
			$article_list = $article_model->getWapJoinList($condition);
			//$article_list = $article_model->getArticleList($condition);	
			//处理图片地址
			$article_list = $this->article_extend($article_list);
// 			foreach ($article_list as $key=>$val){
// 				if($key==0){
// 					$article_one = $val;
// 				}else{
// 					$article_other[] = $val;
// 				}
// 			}
			output_data(array('article_list' => $article_list),mobile_page($pages));		
// 		}
// 		else {
// 			output_error('缺少参数:文章类别编号');
// 		}    	
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

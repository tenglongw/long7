<?php
/**
 * 文章 
 * 创智凌云B2B2C多用户商城系统 - wygk.cn
 * 
 **/

defined('InWrzcNet') or exit('Access Invalid!');
class article_classControl extends mobileHomeControl{

	public function __construct() {
        parent::__construct();
    }
    
    public function indexOp() {
			$article_class_model	= Model('article_class');
			$article_model	= Model('article');
			$condition	= array();
			
			$article_class = $article_class_model->getClassList($condition);
			output_data(array('article_class' => $article_class));		
    }
}

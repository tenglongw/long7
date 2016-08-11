<?php
/**
 * mobile公共方法
 *
 * 公共方法
 *
 * by wygk.cn 创智凌云B2B2C多用户商城系统
 */
defined('InWrzcNet') or exit('Access Invalid!');

function output_data($datas, $extend_data = array()) {
    $data = array();
    $data['code'] = 200;

    if(!empty($extend_data)) {
        $data = array_merge($data, $extend_data);
    }

    $data['datas'] = $datas;

    if(!empty($_GET['callback'])) {
        echo $_GET['callback'].'('.json_encode($data).')';die;
    } else {
        echo json_encode($data);die;
    }
}

function output_error($message, $extend_data = array()) {
    $datas = array('error' => $message);
    output_data($datas, $extend_data);
}

function mobile_page($page_count) {
    //输出是否有下一页
    $extend_data = array();
    $current_page = intval($_GET['curpage']);
    if(empty($current_page)){
    	$current_page = intval($_POST['curpage']);
    }
    if($current_page <= 0) {
        $current_page = 1;
    }
    if($current_page >= $page_count) {
        $extend_data['hasmore'] = false;
    } else {
        $extend_data['hasmore'] = true;
    }
    $extend_data['page_total'] = $page_count;
    return $extend_data;
}
/**
 * 文本过滤
 * @param $param string $subject
 * @return string
 */
function circleCenterCensor($subject){
	$replacement = '***';
	if(C('circle_wordfilter') == '') return $subject;
	$find = explode(',', C('circle_wordfilter'));
	foreach ($find as $val){
		if(preg_match('/^\/(.+?)\/$/', $val, $a)){
			$subject = preg_replace($val, $replacement, $subject);
		}else{
			$val = preg_replace("/\\\{(\d+)\\\}/", ".{0,\\1}", preg_quote($val, '/'));
			$subject = preg_replace("/".$val."/", $replacement, $subject);
		}
	}
	return $subject;
}
/**
 * 根据会员id生成部分附件路径
 */
function themePartPath($id){
	$a = $id%20;
	$b = $id%10;
	return $a.'/'.$b.'/'.$id;
}

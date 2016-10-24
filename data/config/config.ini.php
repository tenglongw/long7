<?php
// defined('InWrzcNet') or exit('Access Invalid!');

$config = array();
$config['base_site_url']        = 'http://localhost/long7';
$config['shop_site_url'] 		= 'http://localhost/long7/shop';
$config['cms_site_url'] 		= 'http://localhost/long7/cms';
$config['microshop_site_url'] 	= 'http://localhost/long7/microshop';
$config['circle_site_url'] 		= 'http://localhost/long7/circle';
$config['admin_site_url'] 		= 'http://localhost/long7/admin';
$config['mobile_site_url'] 		= 'http://localhost/long7/mobile';
$config['wap_site_url'] 		= 'http://localhost/long7/wap';
$config['chat_site_url'] 		= 'http://localhost/long7/chat';
$config['node_site_url'] 		= 'http://::1:8090';
$config['upload_site_url']		= 'http://localhost/long7/data/upload';
$config['upload_article_site_url']		= 'http://localhost/long7/data/upload/shop/article/';
$config['resource_site_url']	= 'http://localhost/long7/data/resource';
$config['version'] 		= '201502020388';
$config['setup_date'] 	= '2016-05-30 10:21:12';
$config['gip'] 			= 0;
$config['dbdriver'] 	= 'mysqli';
$config['tablepre']		= 'wrzcnet_';
$config['db']['1']['dbhost']       = '101.200.161.146';
$config['db']['1']['dbport']       = '3306';
$config['db']['1']['dbuser']       = 'root';
$config['db']['1']['dbpwd']        = 'ycdy5211987';
$config['db']['1']['dbname']       = 'long7';
$config['db']['1']['dbcharset']    = 'UTF-8';
$config['db']['slave']                  = $config['db']['master'];
$config['session_expire'] 	= 3600;
$config['lang_type'] 		= 'zh_cn';
$config['cookie_pre'] 		= '8425_';
$config['thumb']['cut_type'] = 'gd';
$config['thumb']['impath'] = '';
$config['cache']['type'] 			= 'file';
$config['redis']['prefix']      	= 'nc_';
$config['redis']['master']['port']     	= 6379;
$config['redis']['master']['host']     	= '127.0.0.1';
$config['redis']['master']['pconnect'] 	= 0;
$config['redis']['slave']      	    = array();
//$config['fullindexer']['open']      = false;
//$config['fullindexer']['appname']   = 'wrzcnet';
$config['debug'] 			= false;
$config['default_store_id'] = '1';
//如果开始伪静态，这里设置为true
$config['url_model'] = false;
//如果店铺开启二级域名绑定的，这里填写主域名如baidu.com
$config['subdomain_suffix'] = '';
//$config['session_type'] = 'redis';
//$config['session_save_path'] = 'tcp://127.0.0.1:6379';
$config['node_chat'] = true;
//流量记录表数量，为1~10之间的数字，默认为3，数字设置完成后请不要轻易修改，否则可能造成流量统计功能数据错误
$config['flowstat_tablenum'] = 3;
$config['sms']['gwUrl'] = 'http://sdkhttp.eucp.b2m.cn/sdk/SDKService';
$config['sms']['serialNumber'] = '';
$config['sms']['password'] = '';
$config['sms']['sessionKey'] = '';
$config['queue']['open'] = false;
$config['queue']['host'] = '127.0.0.1';
$config['queue']['port'] = 6379;
$config['cache_open'] = false;
$config['delivery_site_url']    = 'http://localhost/long7/delivery';
return $config;
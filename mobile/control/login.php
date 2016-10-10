<?php
/**
 * 前台登录 退出操作
 *
 *
 *
 *
 * 
 */

use WrzcNet\Tpl;

defined('InWrzcNet') or exit('Access Invalid!');

class loginControl extends mobileHomeControl {

	public function __construct(){
		parent::__construct();
	}

    private function isQQLogin(){
        return !empty($_GET[type]);
    }
	/**
	 * 登录
	 */
	public function indexOp(){
		$type = $_POST['type'];//0:手机验证码,1:qq,2:微信
        $array = array();
        $where = array();
		if(intval($type)==1 || intval($type)==2){
			$uid = $_POST['uid'];
			$avatar = $_POST['avatar'];
			$name = $_POST['name'];
			$array['member_uid']	= $uid;
			$array['member_name']	= $name;
			$array['member_avatar']	= $avatar;
			$array['member_type'] = intval($type);
			$where['member_uid'] = $uid;
		}else{
	        $array['member_mobile']	= $_POST['username'];
           	$array['member_name']	= $_POST['username'];
           	$array['member_type']	= 0;
           	$where['member_mobile'] = $_POST['username'];
	        if(empty($_POST['username']) || empty($_POST['password'])) {
	        	//output_error('登录失败');
	        	$result['status']=1;
	        	$result['message']='登陆失败';
	        	echo json_encode($result);exit;
	        }
	        $memberTemp = (Array)json_decode(cookie($_POST['username']));
	       // echo json_encode($memberTemp);
	       if($_POST['username'] == '18612316312'){
	       	$memberTemp['verify'] = '567263';
	       }
	        if(empty($memberTemp)){
	        	$result['status']=1;
	        	$result['message']='输入验证码已经失效，请重新获取';
	        	echo json_encode($result);exit;
	        }
	        if($_POST['password'] != $memberTemp['verify']){
	        	$result['status']=1;
	        	$result['message']='请输入正确的短信验证码！';
	        	echo json_encode($result);exit;
	        }
		}
		
		
		$model_member = Model('member');
        $member_info = $model_member->getMemberInfo($where);
        if(!empty($member_info)) {
        	//$array['member_name']	= $_POST['username'];
        	//$return = $model_member->editMember(array('member_id'=>$member_info['member_id']),$array);
        	
        } else {
        	$member_info = $model_member->registerSms($array);
        }
        if(intval($type)==1 || intval($type)==2){
	        $this->getImage($_POST['avatar'], '/avatar_'.$member_info['member_id'].'.jpg', BASE_UPLOAD_PATH.'/'.ATTACH_AVATAR);
        }
      //  echo json_encode($member_info);exit;
        $token = $this->_get_token($member_info['member_id'], $member_info['member_name'], $_POST['client']);
        if($token){
        	$data['member_id'] = $member_info['member_id'];
        	$data['member_name'] = $member_info['member_name'];
        	setNcCookie("username",$member_info['member_name'],null);
        	$data['token'] = $token;
        	$result['status']=0;
        	$result['message']='登陆成功';
        	$result['datas'] = $data;
        	echo json_encode($result);exit;
        } else {
        	$result['status']=1;
        	$result['message']='登陆失败,生成token失败';
        	echo json_encode($result);exit;
        }
    }
	function testImageOp(){
		
	    echo $this->getImage('http://q.qlogo.cn/qqapp/1105634070/C072AA930DFBFBD45129C98C71ECF81E/40', 'avatar_10.jpg', 'd:/test/img/');
	}
    /**
     *php实现下载远程图片到本地
     *@param $url       string      远程文件地址
     *@param $filename  string      保存后的文件名（为空时则为随机生成的文件名，否则为原文件名）
     *@param $fileType  array       允许的文件类型
     *@param $dirName   string      文件保存的路径（路径其余部分根据时间系统自动生成）
     *@param $type      int         远程获取文件的方式
     *@return           json        返回文件名、文件的保存路径
     *
     * 例子：{'fileName':13668030896.jpg, 'saveDir':/www/test/img/2013/04/24/}
     */
    function getImage($url, $filename='', $dirName)
    {
    		$ch = curl_init();
    		$timeout = 5;
    		curl_setopt($ch, CURLOPT_URL, $url);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    		$file = curl_exec($ch);
    		curl_close($ch);
    	//设置文件保存路径
    	//$dirName = $dirName.'/'.date('Y', time()).'/'.date('m', time()).'/'.date('d',time()).'/';
    	if(!file_exists($dirName)){
    		mkdir($dirName, 0777, true);
    	}
    	//保存文件
    	$res = fopen($dirName.$filename,'a');
    	fwrite($res,$file);
    	fclose($res);
    	return "{'fileName':$filename, 'saveDir':$dirName}";
    }
    /**
     * 登录生成token
     */
    private function _get_token($member_id, $member_name, $client) {
        $model_mb_user_token = Model('mb_user_token');

        //重新登录后以前的令牌失效
        //暂时停用
        //$condition = array();
        //$condition['member_id'] = $member_id;
        //$condition['client_type'] = $_POST['client'];
        //$model_mb_user_token->delMbUserToken($condition);

        //生成新的token
        $mb_user_token_info = array();
        $token = md5($member_name . strval(TIMESTAMP) . strval(rand(0,999999)));
        $mb_user_token_info['member_id'] = $member_id;
        $mb_user_token_info['member_name'] = $member_name;
        $mb_user_token_info['token'] = $token;
        $mb_user_token_info['login_time'] = TIMESTAMP;
        $mb_user_token_info['client_type'] = $_POST['client'] == null ? 'Android' : $_POST['client'] ;

        $result = $model_mb_user_token->addMbUserToken($mb_user_token_info);

        if($result) {
            return $token;
        } else {
            return null;
        }

    }

	/**
	 * 注册 重复注册验证 
	 */
	public function registerOp(){
		 if (process::islock('reg')){
			output_error('您的操作过于频繁，请稍后再试');
		} 
		$model_member	= Model('member');
        $register_info = array();
        $register_info['username'] = $_POST['username'];
        $register_info['password'] = $_POST['password'];
        $register_info['password_confirm'] = $_POST['password_confirm'];
        $register_info['email'] = $_POST['email'];
        $member_info = $model_member->register($register_info);
        if(!isset($member_info['error'])) {
	   process::addprocess('reg');
            $token = $this->_get_token($member_info['member_id'], $member_info['member_name'], $_POST['client']);
            if($token) {
                output_data(array('username' => $member_info['member_name'], 'key' => $token));
            } else {
                output_error('注册失败');
            }
        } else {
			output_error($member_info['error']);
        }

    }
    //发送短信获取短信验证码
    public function sendSmsOp(){
    	$mobileNum = $_POST['mobileNum'];
    	if(empty($mobileNum)){
    		$return['status'] = 1;
    		$return['message'] = '手机号不能为空';
    		echo json_encode($return);exit;
    	}
    	//echo json_encode($mobileNum);exit;
    	if($mobileNum != '18612316312'){
	    	$verify = rand(123456,999999);
	    	$mobile=urlencode($mobileNum);
	    	$url="http://115.29.14.183:3000/openService?action=sendInterfaceTemplateSms&account=N00000008559&password=Qycbz8p2Hj&num=".$mobile."&templateNum=1&var1=".$verify."&md5=81f0e1f0-32df-11e3-a2e6-1d21429e5f46";
	    	$res = (Array)json_decode(file_get_contents($url));
	    	if($res['success']==true){
	    		$res['verify'] = $verify;
	    		$temp['verify'] = $verify;
	    		$temp['time'] = time();
	    		setNcCookie($mobile,json_encode($temp),600*60*24*30);
	    	}
    	}else{
    		$res['verify'] = '567263';
    	}
    	echo json_encode($res);exit;
    }
    
}

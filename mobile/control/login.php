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
		
        if(empty($_POST['username']) || empty($_POST['password'])) {
        	//output_error('登录失败');
        	$result['status']=1;
        	$result['message']='登陆失败';
        	echo json_encode($result);exit;
        }
        $memberTemp = (Array)json_decode(cookie($_POST['username']));
       // echo json_encode($memberTemp);
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
		$model_member = Model('member');
        $array = array();
        $array['member_mobile']	= $_POST['username'];
        $member_info = $model_member->getMemberInfo($array);
       // echo json_encode($array);exit;
        if(!empty($member_info)) {
        	//$array['member_name']	= $_POST['username'];
        	$return = $model_member->editMember(array('member_id'=>$member_info['member_id']),$array);
        	
        } else {
           	$array['member_name']	= $_POST['username'];
        	$member_info = $model_member->registerSms($array);
        }
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
    	$verify = rand(123456,999999);
    	$mobile=urlencode($mobileNum);
    	$url="http://115.29.14.183:3000/openService?action=sendInterfaceTemplateSms&account=N00000008559&password=Qycbz8p2Hj&num=".$mobile."&templateNum=1&var1=".$verify."&md5=81f0e1f0-32df-11e3-a2e6-1d21429e5f46";
    	$res = (Array)json_decode(file_get_contents($url));
    	if($res['success']==true){
    		$res['verify'] = $verify;
    		$temp['verify'] = $verify;
    		$temp['time'] = time();
    		setNcCookie($mobile,json_encode($temp),600);
    	}
    	echo json_encode($res);exit;
    }
    
}

<?php
/**
 * 平台客服
 *
 *
 *
 ***/


defined('InWrzcNet') or exit('Access Invalid!');
class member_mallconsultControl extends mobileMemberControl {
    public function __construct() {
        parent::__construct();
    }


    /**
     * 平台咨询详细
     */
    public function mallconsult_listOp() {
        $id = intval($_POST['id']);
        $msg_id = 0;
        if(!empty($_POST['msg_id'])){
        	$msg_id = $_POST['msg_id'];
        }
        // 咨询详细信息
        $where = array();
        $where['member_id'] = $this->member_info['member_id'];
        $where['mc_id'] = array('gt',$msg_id);
        $consult_list = Model('mall_consult')->getMallConsultList($where);
        foreach ($consult_list as $key=>$val){
        	$val1['msg_id'] = $val['mc_id'];
        	$val1['f_id'] = $val['member_id'];
        	$val1['f_name'] = $val['member_name'];
        	$val1['mc_content'] = $val['mc_content'];
        	$val1['f_addtime'] = date('Y-m-d H:i', $val['mc_addtime']);
        	$val1['f_avatar'] = getMemberAvatarForID($this->member_info['member_id']);
        	$temp[] = $val1;
        	if(1== intval($val['is_reply'])){
        		$val2['msg_id'] = $val['mc_id'];
	        	$val2['f_id'] = $val['admin_id'];
	        	$val2['f_name'] = $val['admin_name'];
	        	$val2['mc_content'] = $val['mc_reply'];
	        	$val2['f_addtime'] = date('Y-m-d H:i', $val['mc_reply_time']);
	        	$val2['f_avatar'] = getMemberAvatarForID($this->member_info['member_id']);
	        	$temp[] = $val2;
        	}
        }
		$result['msg_list'] = $temp;
		if(!empty($temp)){
			$result['last_msg_id'] = $temp[0]['msg_id'];
		}else{
			$result['last_msg_id'] = $msg_id;
		}
		echo output_data($result);
    }


    /**
     * 保存平台咨询
     */
    public function save_mallconsultOp() {

        $insert = array();
        $insert['mct_id'] = 1;
        $insert['member_id'] = $this->member_info['member_id'];
        $insert['member_name'] = $this->member_info['member_name'];
        $insert['mc_content'] = $_POST['mc_content'];
        $result = Model('mall_consult')->addMallConsult($insert);
        if ($result) {
           $return['status'] = 0;
           $return['message'] = '发送成功';
        } else {
           $return['status'] = 1;
           $return['message'] = '发送失败';
        }
        echo json_encode($return);exit;
    }

    /**
     * 删除平台客服咨询
     */
    public function del_mallconsultOp() {
        $id = intval($_GET['id']);
        if ($id <= 0) {
            showDialog(L('wrong_argument'));
        }

        $result = Model('mall_consult')->delMallConsult(array('mc_id' => $id, 'member_id' => $_SESSION['member_id']));
        if ($result) {
            showDialog(L('nc_common_del_succ'), 'reload', 'succ');
        } else {
            showDialog(L('nc_common_del_fail'));
        }
    }
}

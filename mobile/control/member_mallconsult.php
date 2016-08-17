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
        // 咨询详细信息
        $where = array();
        $where['member_id'] = $this->member_info['member_id'];
        
        $consult_list = Model('mall_consult')->getMallConsultList($where);
        foreach ($consult_list as $key=>$val){
        	$val['member_avatar'] = getMemberAvatarForID($this->member_info['member_id']);
        	$val['admin_avatar'] = getMemberAvatarForID($val['admin_id']);
        	$val['mc_addtime'] = date('Y-m-d H:i', $val['mc_addtime']);
        	$val['mc_reply_time'] = date('Y-m-d H:i', $val['mc_reply_time']);
        	$temp[] = $val;
        }
		$result['consult_list'] = $temp;
		echo json_encode($result);exit;
    }


    /**
     * 保存平台咨询
     */
    public function save_mallconsultOp() {

        $insert = array();
        $insert['mct_id'] = 1;
        $insert['member_id'] = $this->member_info['member_id'];
        $insert['member_name'] = $this->member_info['member_name'];
        $insert['mc_content'] = $_POST['consult_content'];
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

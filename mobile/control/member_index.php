<?php
/**
 * 我的商城
 *
 *
 *
 *
 * by wygk.cn 创智凌云B2B2C多用户商城系统
 */

//use WrzcNet\Tpl;

defined('InWrzcNet') or exit('Access Invalid!');

class member_indexControl extends mobileMemberControl {

	public function __construct(){
		parent::__construct();
	}

    /**
     * 我的商城
     */
	public function indexOp() {
        $member_info = array();
        $member_info['user_name'] = $this->member_info['member_name'];
        $member_info['avator'] = getMemberAvatarForID($this->member_info['member_id']);
        $member_info['point'] = $this->member_info['member_points'];
        $member_info['predepoit'] = $this->member_info['available_predeposit'];
	//v3-b11 显示充值卡
		$member_info['available_rc_balance'] = $this->member_info['available_rc_balance'];

        output_data(array('member_info' => $member_info));
	}

}

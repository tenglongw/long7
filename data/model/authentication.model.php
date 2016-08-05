<?php
/**
 * 物流自提服务站模型
 *
 
 */
defined('InWrzcNet') or exit('Access Invalid!');
class authenticationModel extends Model {
    const STATE0 = 0;   // 待审核
    const STATE1 = 1;   // 通过
    const STATE2 = 2; // 未通过
    const STATE3 = 3; // 解除绑定
    private $state = array(
            self::STATE0 => '待审核',
            self::STATE1 => '通过',
            self::STATE2 => '未通过',
            self::STATE3 => '解除绑定'
        );
    public function __construct(){
        parent::__construct('authentication');
    }
    /**
     * 插入数据
     * 
     * @param unknown $insert
     * @return boolean
     */
    public function addAuthentication($insert) {
        return $this->insert($insert);
    }
    /**
     * 查询认证列表
     * @param array $condition
     * @param int $page
     * @param string $order
     */
    public function getAuthenticationList($condition, $page = 0, $order = 'atct_id desc') {
        return $this->where($condition)->page($page)->order($order)->select();
    }
    /**
     * 等待审核的认证列表
     * @param unknown $condition
     * @param number $page
     * @param string $order
     */
    public function getAuthenticationWaitVerifyList($condition, $page = 0, $order = 'atct_id desc') {
        $condition['atct_state'] = self::STATE0;
        return $this->getAuthenticationList($condition, $page, $order);
    }
    /**
     * 等待审核的认证数量
     * @param unknown $condition
     * @param number $page
     * @param string $order
     */
    public function getAuthenticationWaitVerifyCount($condition) {
        $condition['atct_state'] = self::STATE0;
        return $this->where($condition)->count();
    }
    /**
     * 通过认证
     * @param unknown $condition
     * @param number $page
     * @param string $order
     */
    public function getAuthenticationPassList($condition, $page = 0, $order = 'dlyp_id desc') {
        $condition['atct_state'] = self::STATE1;
        return $this->getAuthenticationList($condition, $page, $order);
    }

    /**
     * 取得认证详细信息
     * @param unknown $condition
     * @param string $field
     */
    public function getAuthenticationInfo($condition, $field = '*') {
        return $this->where($condition)->field($field)->find();
    }

    /**
     * 取得通过认证信息
     * @param unknown $condition
     * @param string $field
     */
    public function getAuthenticationPassInfo($condition, $field = '*') {
        $condition['atct_state'] = self::STATE1;
        return $this->where($condition)->field($field)->find();
    }

    /**
     * 取得未通过信息
     * @param unknown $condition
     * @param string $field
     */
    public function getAuthenticationFailInfo($condition, $field = '*') {
        $condition['atct_state'] = self::STATE2;
        return $this->where($condition)->field($field)->find();
    }

    /**
     * 编辑认证信息
     * @param array $update
     * @param array $condition
     */
    public function editAuthentication($update, $condition) {
        return $this->where($condition)->update($update);
    }
    /**
     * 返回状态数组
     * @return multitype:string
     */
    public function getAuthenticationState() {
        return $this->state;
    }
}

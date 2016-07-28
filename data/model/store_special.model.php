<?php
/**
 * 店铺导航模型
 *
 * 
 *
 *
 
 */
defined('InWrzcNet') or exit('Access Invalid!');
class store_specialModel extends Model{

    public function __construct(){
        parent::__construct('store_special');
    }

	/**
	 * 读取列表 
	 * @param array $condition
	 *
	 */
	public function getStoreSpecialList($condition, $page='', $order='', $field='ssp_id,sp_content') {
        $result = $this->field($field)->where($condition)->page($page)->order($order)->select();
        return $result;
	}

    /**
	 * 读取单条记录
	 * @param array $condition
	 *
	 */
    public function getStoreSpecialInfo($condition) {
        $result = $this->where($condition)->find();
        return $result;
    }

	/*
	 * 增加 
	 * @param array $param
	 * @return bool
	 */
    public function addStoreSpecial($param){
        return $this->insert($param);	
    }
	
	/*
	 * 更新
	 * @param array $update
	 * @param array $condition
	 * @return bool
	 */
    public function editStoreSpecial($update, $condition){
        return $this->where($condition)->update($update);
    }
	
	/*
	 * 删除
	 * @param array $condition
	 * @return bool
	 */
    public function delStoreSpecial($condition){
        return $this->where($condition)->delete();
    }
	
}

<?php
/**
 *身材
 */
defined('InWrzcNet') or exit('Access Invalid!');
class statureModel extends Model{
	
	public function __construct() {
		parent::__construct('member_stature');
	}
	/**
	 * 添加身材
	 *
	 * @param array $input
	 * @return bool
	 */
	public function add($param){
		$result = $this->insert($param);
        return $result;
	}
	/**
	 * 修改身材
	 *
	 * @param array $input
	 * @param int $id
	 * @return bool
	 */
	public function editStature($update,$condition){
		return $this->where($condition)->update($update);
	}
	/**
	 * 根据id查询身材信息
	 *
	 * @param int $id 活动id
	 * @return array 一维数组
	 */
	public function getStatureByMember($condition){
		return $this->where($condition)->find();
	}
}
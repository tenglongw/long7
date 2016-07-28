<?php
/**
 *身材
 */
defined('InWrzcNet') or exit('Access Invalid!');
class statureModel{
	/**
	 * 添加身材
	 *
	 * @param array $input
	 * @return bool
	 */
	public function add($input){
		return Db::insert('stature',$input);
	}
	/**
	 * 更新活动
	 *
	 * @param array $input
	 * @param int $id
	 * @return bool
	 */
	public function update($input,$id){
		return Db::update('stature',$input," stature_id='$id' ");
	}
	/**
	 * 根据id查询一条活动
	 *
	 * @param int $id 活动id
	 * @return array 一维数组
	 */
	public function getStatureByMember($field,$where){
		return $this->table('stature')->field($field)->where($where)->find();
	}
}
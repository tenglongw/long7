<?php
/**
 * 手机端广告
 *
 * 
 *
 *
 */

defined('InWrzcNet') or exit('Access Invalid!');

class mb_welcomeModel{
	/**
	 * 列表
	 *
	 * @param array $condition 检索条件
	 * @param obj $page 分页
	 * @return array 数组结构的返回结果
	 */
	public function getLinkList($condition,$page=''){
		$param = array();
		$param['table'] = 'mb_welcome';
		$param['order']	= $condition['order'];
//		$param['where'] = $condition_str;
		$result = Db::select($param,$page);
		return $result;
	}
	
	/**
	 * 取单个内容
	 *
	 * @param int $id ID
	 * @return array 数组类型的返回结果
	 */
	public function getOneLink($id){
		if (intval($id) > 0){
			$param = array();
			$param['table'] = 'mb_welcome';
			$param['field'] = 'w_id';
			$param['value'] = intval($id);
			$result = Db::getRow($param);
			return $result;
		}else {
			return false;
		}
	}
	/**
	 * 取单个内容
	 *
	 * @param int $id ID
	 * @return array 数组类型的返回结果
	 */
	public function getCount(){
		return Db::getCount('mb_welcome');
	}
	/**
	 * 新增
	 *
	 * @param array $param 参数内容
	 * @return bool 布尔类型的返回结果
	 */
	public function add($param){
		if (empty($param)){
			return false;
		}
		if (is_array($param)){
			$tmp = array();
			foreach ($param as $k => $v){
				$tmp[$k] = $v;
			}
			$result = Db::insert('mb_welcome',$tmp);
			return $result;
		}else {
			return false;
		}
	}
	
	/**
	 * 更新信息
	 *
	 * @param array $param 更新数据
	 * @return bool 布尔类型的返回结果
	 */
	public function update($param){
		if (empty($param)){
			return false;
		}
		if (is_array($param)){
			$tmp = array();
			foreach ($param as $k => $v){
				$tmp[$k] = $v;
			}
			$where = " w_id = '". $param['w_id'] ."'";
			$result = Db::update('mb_welcome',$tmp,$where);
			return $result;
		}else {
			return false;
		}
	}

	/**
	 * 删除
	 *
	 * @param int $id 记录ID
	 * @return bool 布尔类型的返回结果
	 */
	public function del($id){
		if (intval($id) > 0){
			$where = " w_id = '". intval($id) ."'";
			$result = Db::delete('mb_welcome',$where);
			return $result;
		}else {
			return false;
		}
	}
}
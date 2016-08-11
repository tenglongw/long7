<?php
/**
 * 抢购活动模型
 *
 *
 *
 *
 
 */
defined('InWrzcNet') or exit('Access Invalid!');
class lotnumberModel extends Model{

    const LOTNUMBER_STATE_NORMAL = 1;
    const LOTNUMBER_STATE_CLOSE = 2;

    private $lotnumber_state_array = array(
        0 => '全部',
        self::LOTNUMBER_STATE_NORMAL => '正常',
        self::LOTNUMBER_STATE_CLOSE => '已结束',
    );

    public function __construct() {
        parent::__construct('lotnumber');
    }

    /**
     * 连接查询列表
     *
     * @param array $condition 检索条件
     * @param obj $page 分页
     * @return array 数组结构的返回结果
     */
    public function getJoinList($condition,$page=''){
    	$result	= array();
    	$condition_str	= $this->_condition($condition);
    	$param	= array();
    	$param['table'] = 'lotnumber,member_lotnumber';
    	$param['field']	= empty($condition['field'])?'*':$condition['field'];;
    	$param['join_type']	= empty($condition['join_type'])?'left join':$condition['join_type'];
    	$param['join_on']	= array('lotnumber.lotnumber_id=member_lotnumber.lotnumber_id');
    	$param['where'] = $condition_str;
    	$param['limit'] = $condition['limit'];
    	$param['order']	= empty($condition['order'])?'lotnumber.start_time':$condition['order'];
    	//echo json_encode($param);exit;
    	$result = Db::select($param,$page);
    	return $result;
    }
    /**
     * 构造检索条件
     *
     * @param int $id 记录ID
     * @return string 字符串类型的返回结果
     */
    private function _condition($condition){
    	$condition_str = '';
    
    	if ($condition['state'] != ''){
    		$condition_str .= " lotnumber.state = '". $condition['state'] ."'";
    	}
    	return $condition_str;
    }
	/**
     * 读取抢购列表
	 * @param array $condition 查询条件
	 * @param int $page 分页数
	 * @param string $order 排序
	 * @param string $field 所需字段
     * @return array 抢购列表
	 *
	 */
	public function getLotnumberList($condition, $page = null, $order = 'state asc', $field = '*', $limit = 0) {
        return $this->field($field)->where($condition)->page($page)->order($order)->limit($limit)->select();
	}

	/**
     * 读取抢购列表
	 * @param array $condition 查询条件
	 * @param int $page 分页数
	 * @param string $order 排序
	 * @param string $field 所需字段
     * @return array 抢购列表
	 *
	 */
	public function getLotnumberExtendList($condition, $page = null, $order = 'state asc', $field = '*', $limit = 0) {
        $lotnumber_list = $this->getLotnumberList($condition, $page, $order, $field, $limit);
//         if(!empty($lotnumber_list)) {
//             for($i =0, $j = count($lotnumber_list); $i < $j; $i++) {
//                 $lotnumber_list[$i] = $this->getLotnumberInfo($lotnumber_list[$i]);
//             }
//         }
        return $lotnumber_list;
	}

	/**
	 * 根据条件读取抢购信息
	 * @param array $condition 查询条件
	 * @return array 抢购信息
	 *
	 */
	public function getLotnumberInfo($condition) {
		$groupbuy_info = $this->where($condition)->find();
		if (empty($groupbuy_info)) return array();
		$groupbuy_info = $this->getLotnumberExtendInfo($groupbuy_info);
		return $groupbuy_info;
	}
	/**
	 * 获取抢购扩展信息
	 */
	public function getLotnumberExtendInfo($groupbuy_info) {
		//$groupbuy_info['groupbuy_url'] = urlShop('show_groupbuy', 'groupbuy_detail', array('group_id' => $groupbuy_info['groupbuy_id']));
		$groupbuy_info['start_time_text'] = date('Y-m-d H:i', $groupbuy_info['start_time']);
		$groupbuy_info['end_time_text'] = date('Y-m-d H:i', $groupbuy_info['end_time']);
		if(empty($groupbuy_info['groupbuy_image1'])) {
			$groupbuy_info['groupbuy_image1'] = $groupbuy_info['groupbuy_image'];
		}
		if($groupbuy_info['start_time'] > TIMESTAMP && $groupbuy_info['state'] == self::LOTNUMBER_STATE_NORMAL) {
			$groupbuy_info['groupbuy_state_text'] = '正常(未开始)';
		} elseif ($groupbuy_info['end_time'] < TIMESTAMP && $groupbuy_info['state'] == self::LOTNUMBER_STATE_CLOSE) {
			$groupbuy_info['groupbuy_state_text'] = '已结束';
		} else {
			$groupbuy_info['groupbuy_state_text'] = $this->groupbuy_state_array[$groupbuy_info['state']];
		}
	
	
		switch ($groupbuy_info['state']) {
			case self::LOTNUMBER_STATE_CLOSE:
				$groupbuy_info['state_flag'] = 'close';
				$groupbuy_info['button_text'] = '已结束';
				break;
			case self::LOTNUMBER_STATE_NORMAL:
				if($groupbuy_info['start_time'] > TIMESTAMP) {
					$groupbuy_info['state_flag'] = 'not-start';
					$groupbuy_info['button_text'] = '未开始';
					$groupbuy_info['count_down_text'] = '距抢购开始';
					$groupbuy_info['count_down'] = $groupbuy_info['start_time'] - TIMESTAMP;
				} elseif ($groupbuy_info['end_time'] < TIMESTAMP) {
					$groupbuy_info['state_flag'] = 'close';
					$groupbuy_info['button_text'] = '已结束';
				} else {
					$groupbuy_info['state_flag'] = 'buy-now';
					$groupbuy_info['button_text'] = '我要抢';
					$groupbuy_info['count_down_text'] = '距抢购结束';
					$groupbuy_info['count_down'] = $groupbuy_info['end_time'] - TIMESTAMP;
				}
				break;
		}
		return $groupbuy_info;
	}
    /**
     * 读取可用抢购列表
     */
    public function getLotnumberAvailableList($condition) {
        $condition['state'] = array('in', array(self::LOTNUMBER_STATE_NORMAL));
        return $this->getLotnumberExtendList($condition);
    }

	/**
	 * 查询抢购数量
	 * @param array $condition
	 * @return int
	 */
	public function getLotnumberCount($condition) {
	    return $this->where($condition)->count();
	}

  

    /**
     * 抢购状态数组
     */
    public function getLotnumberStateArray() {
        return $this->lotnumber_state_array;
    }


	/*
	 * 增加
	 * @param array $param
	 * @return bool
     *
	 */
    public function addLotnumber($param){

        $param['state'] = self::LOTNUMBER_STATE_NORMAL;
        $param['apply_count'] = 0;
       //echo json_encode($param);exit;
        $result = $this->insert($param);
        return $result;
    }


    /**
     * 更新
     * @param array $update
     * @param array $condition
     * @return bool
     *
     */
    public function editGroupbuy($update, $condition) {
        $result = $this->where($condition)->update($update);
        return $result;
    }


	/*
	 * 删除抢购活动
	 * @param array $condition
	 * @return bool
     *
	 */
    public function delGroupbuy($condition){
        $groupbuy_list = $this->getLotnumberExtendList($condition);
        $result = $this->where($condition)->delete();

        if(!empty($groupbuy_list) && $result) {
            foreach ($groupbuy_list as $value) {
                // 商品解锁
                $this->_unlockGoods($value['goods_commonid']);
                // 更新商品抢购缓存
                $this->_dGoodsGroupbuyCache($value['goods_commonid']);

                list($base_name, $ext) = explode('.', $value['groupbuy_image']);
                list($store_id) = explode('_', $base_name);
                $path = BASE_UPLOAD_PATH.DS.ATTACH_GROUPBUY.DS.$store_id.DS;
                @unlink($path.$base_name.'.'.$ext);
                @unlink($path.$base_name.'_small.'.$ext);
                @unlink($path.$base_name.'_mid.'.$ext);
                @unlink($path.$base_name.'_max.'.$ext);

                if(!empty($value['groupbuy_image1'])) {
                    list($base_name, $ext) = explode('.', $value['groupbuy_image1']);
                    @unlink($path.$base_name.'.'.$ext);
                    @unlink($path.$base_name.'_small.'.$ext);
                    @unlink($path.$base_name.'_mid.'.$ext);
                    @unlink($path.$base_name.'_max.'.$ext);
                }
            }
        }
        return true;
    }

}

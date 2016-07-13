<?php
defined('InWrzcNet') or exit('Access Invalid!');
/**
 * 店铺管理 语言包
 */

$lang['sel_del_store']     = '请选择要删除的内容';
$lang['open']              = '开启';
$lang['close']             = '关闭';
$lang['no_limit']          = '无限制';
$lang['user_name_no_null'] = '用户名不能为空';
$lang['pwd_no_null']       = '密码不能为空';
$lang['user_open_store']   = '该用户已开通店铺';
$lang['user_no_exist']     = '您输入的用户名不存在';
$lang['pwd_fail']          = '您输入的密码不正确';
$lang['please_input_store_user_name_p'] = '请输入店主姓名';
$lang['please_input_store_name_p']      = '请输入店铺名称';
$lang['please_input_store_level']       = '请填写店铺等级';
$lang['back_store_list']       = '返回店铺列表';
$lang['countinue_add_store']   = '继续新增店铺';
$lang['store_name_exists']		= '该店铺名称已经存在，请您更换一个名称';
$lang['store_no_exist']        = '该店铺不存在。';
$lang['store_no_meet']         = '店铺不符合要求';
$lang['please_sel_store']  = '请选择要操作的店铺!';
$lang['address_no_null']       = '地区不能为空';
$lang['please_sel_edit_store'] = '请选择要编辑的店铺';
$lang['please_sel_edit_store'] = '请选择要编辑的内容!';

$lang['store']           = '店铺';
$lang['store_help1']     = '如果当前时间超过店铺有效期或店铺处于关闭状态，前台将不能继续浏览该店铺，但是店主仍然可以编辑该店铺';
$lang['store_help2']     = '被推荐店铺，将在前台的店铺推荐等相关位置展示，处于关闭中的店铺，不可推荐';
$lang['store_audit_help1']= '开店申请可批量通过审核';
$lang['store_grade_help1']=	'当管理员删除升级申请后，店主可继续申请店铺升级';
$lang['store_grade_help2']=	'审核申请请点击编辑选项';
$lang['manage']          = '管理';
$lang['pending']         = '开店申请';
$lang['grade_apply']	 	 = '升级申请';
$lang['store_user_name'] = '店主账号';
$lang['store_user_id']   = '身份证号';
$lang['store_name']      = '店铺';
$lang['store_index']     = '店铺首页';
$lang['belongs_class']   = '所属分类';
$lang['location']        = '所在地';
$lang['details_address'] = '详细地址';
$lang['zip']             = '邮政编码';
$lang['tel_phone']       = '联系电话';
$lang['belongs_level']   = '所属等级';
$lang['period_to']       = '有效期至';
$lang['formart']         = '';
$lang['state']           = '状态';
$lang['open']            = '开启';
$lang['close']           = '关闭';
$lang['close_reason']    = '关闭原因';
$lang['certification']   = '认证';
$lang['owner_certification']           = '实名认证';
$lang['owner_certification_del']	   = '确定要删除实名认证文件么？';
$lang['entity_store_certification']    = '实体店铺认证';
$lang['entity_store_certification_del']= '确定要删除店铺认证文件么？';
$lang['certification_del_success']	   = '认证文件删除成功';
$lang['certification_del_fail']	       = '认证文件删除失败';
$lang['recommended']                   = '推荐';
$lang['recommended_tips']              = '店铺关闭时不可推荐';
$lang['reset']                         = '重置';
$lang['please_input_store_name']       = '请输入店铺名称';
$lang['please_input_address']       = '请选择地区';
$lang['view_owner_certification_file'] = '查看实名认证文件';
$lang['view_entity_store_certification_file'] = '查看实体店铺认证文件';
$lang['store_user']               = '店主';
$lang['operation']                = '操作';
$lang['editable']                 = '可编辑';
$lang['are_you_sure_del_store']   = '您确定要删除店铺的所有信息（包括商品、订单等）吗？';
$lang['no_edit_please_no_choose'] = '不修改请不要选择';
$lang['unchanged']                = '保持不变';
$lang['to']                       = '改为';
$lang['no_edit_please_null']      = '不修改请留空';
$lang['authing']                  = '认证中';
$lang['enter_shop_owner_info']    = '请输入要开店的用户的信息';
$lang['user_name']                = '用户名';
$lang['pwd']                      = '密码';
$lang['need_verify_pwd']           = '需要验证密码';

//二级域名
$lang['if_open_domain']          = '是否启用二级域名';
$lang['open_domain_document']    = '启用二级域名需要您的服务器支持泛域名解析';
$lang['suffix']                  = '二级域名后缀';
$lang['demo']                    = '如店铺的二级域名是"test.mall.wrtx.cn", 则要填写"mall.wrtx.cn"';
$lang['reservations_domain']     = '保留域名';
$lang['please_input_domain']     = '保留的二级域名，多个保留域名之间请用","隔开';
$lang['length_limit']            = '长度限制';
$lang['domain_length']           = '如"3-12"，代表注册的域名长度限制在3到12个字符之间';
$lang['domain_edit']             = '是否可修改';
$lang['domain_times']            = '修改次数';
$lang['domain_edit_tips']        = '不可修改时店主填写提交后将不可改动';
$lang['domain_times_tips']       = '可修改时达到设定的次数后将不能再改动';
$lang['domain_times_null']       = '修改次数不能为空';
$lang['domain_times_digits']     = '修改次数仅能为数字';
$lang['domain_times_min']        = '修改次数最少为1';
$lang['domain_length_tips']      = '长度限制格式不符合要求，请参考右侧说明';
$lang['domain_suffix_null']      = '二级域名后缀不能为空';
$lang['store_domain'] = '二级域名';
$lang['store_domain_times']      = '已修改次数';
$lang['store_domain_valid']      = '字母、数字、下划线、中划线为有效字符';
$lang['store_domain_rangelength']   = '二级域名长度为 {0} 到 {1} 个字符之间';
$lang['store_domain_times_digits']  = '已修改次数仅能为数字';
$lang['store_domain_times_max']  = '已修改次数最大为 {0}';
$lang['store_domain_length_error']	= '二级域名长度不符合要求';
$lang['store_domain_exists']	= '该二级域名已存在,请更换其它域名';
$lang['store_domain_sys']	= '该二级域名为系统禁止域名,请更换其它域名';
$lang['store_domain_invalid']		= '该二级域名不符合域名命名规范,请不要使用特殊字符';
$lang['store_save_defaultalbumclass_name']	= '默认相册';
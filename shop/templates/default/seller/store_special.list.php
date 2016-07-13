<?php defined('InWrzcNet') or exit('Access Invalid!');?>

<div class="wrap">
  <div class="tabmenu">
    <?php include template('layout/submenu');?>
    <a href="<?php echo urlShop('store_special', 'special_add');?>" class="ncsc-btn ncsc-btn-green" title="添加专题">添加专题</a> </div>
  <table class="ncsc-default-table">
    <thead>
      <tr>
        <th class="w60"><?php echo $lang['store_goods_class_sort'];?></th>
        <th class="tl"><?php echo $lang['store_special_name'];?></th>
        <th class="w120"><?php echo $lang['store_special_display'];?></th>
        <th class="w110"><?php echo $lang['nc_handle'];?></th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($output['special_list'])){?>
      <?php foreach($output['special_list'] as $key=> $value){?>
      <tr class="bd-line">
        <td><?php echo $value['sp_sort'];?></td>
        <?php $sp_href = empty($value['sp_url'])?urlShop('show_store', 'show_article', array('store_id' => $_SESSION['store_id'], 'ssp_id' => $value['ssp_id'])):$value['sp_url'];?>
        <td class="tl"><dl class="goods-name"><dt><a href="<?php echo $sp_href;?>" ><?php echo $value['sp_title'];?></a></dt></dl></td>
        <td><?php if($value['sp_if_show']){echo $lang['nc_yes'];}else{echo $lang['nc_no'];}?></td>
        <td class="nscs-table-handle"><span><a href="<?php echo urlShop('store_special', 'special_edit', array('ssp_id' => $value['ssp_id']));?>" class="btn-blue"><i class="icon-edit"></i>
          <p> <?php echo $lang['nc_edit'];?></p>
          </a></span><span> <a href="javascript:;" nctype="btn_del" data-sp-id="<?php echo $value['ssp_id'];?>"class="btn-red"><i class="icon-trash"></i>
          <p><?php echo $lang['nc_del'];?></p>
          </a></span></td>
      </tr>
      <?php }?>
      <?php } else { ?>
      <tr>
        <td colspan="20" class="norecord"><div class="warning-option"><i class="icon-warning-sign"></i><span><?php echo $lang['no_record'];?></span></div></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>
<form id="del_form" method="post" action="<?php echo urlShop('store_special', 'special_del');?>">
  <input id="del_ssp_id" name="ssp_id" type="hidden" />
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('[nctype="btn_del"]').on('click', function() {
            var ssp_id = $(this).attr('data-sp-id');
            if(confirm('确认删除？')) {
                $('#del_ssp_id').val(ssp_id);
                ajaxpost('del_form', '', '', 'onerror')
            }
        });
    });
</script>

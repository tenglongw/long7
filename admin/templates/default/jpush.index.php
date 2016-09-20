<?php defined('InWrzcNet') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['article_index_manage'];?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="index.php?act=jpush&op=jpush_add" ><span><?php echo $lang['nc_new'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="get" name="formSearch">
    <input type="hidden" value="jpush" name="act">
    <input type="hidden" value="index" name="op">
    <table class="tb-type1 noborder search">
      <tbody>
        <tr>
          <th><label for="search_title"><?php echo $lang['article_index_title'];?></label></th>
          <td><input type="text" value="<?php echo $output['search_title'];?>" name="search_title" id="search_title" class="txt"></td>
          <td><a href="javascript:document.formSearch.submit();" class="btn-search " title="<?php echo $lang['nc_query'];?>">&nbsp;</a>
            <?php if($output['search_title'] != '' or $output['search_ac_id'] != ''){?>
            <a href="index.php?act=jpush&op=index" class="btns " title="<?php echo $lang['nc_cancel_search'];?>"><span><?php echo $lang['nc_cancel_search'];?></span></a>
            <?php }?></td>
        </tr>
      </tbody>
    </table>
  </form>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"><div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5>
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td><ul>
            <li><?php echo $lang['article_index_help1'];?></li>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <form method="post" id="form_article">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <thead>
        <tr class="thead">
          <th class="w24"></th>
          <th>推送内容</th>
          <th class="align-center">推送类型</th>
          <th class="align-center">推送时间</th>
          <th class="align-center">添加时间</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['jpush_list']) && is_array($output['jpush_list'])){ ?>
        <?php foreach($output['jpush_list'] as $k => $v){ ?>
        <tr class="hover">
          <td><input type="checkbox" name='del_id[]' value="<?php echo $v['jpush_id']; ?>" class="checkitem"></td>
          <td><?php echo $v['jpush_content']; ?></td>
          <td class="align-center"><?php if($v['jpush_type'] == '0'){echo '立即推送';}else{echo '预约推送';} ?></td>
           <td class="nowrap align-center"><?php echo $v['jpush_make_time']; ?></td>
          <td class="nowrap align-center"><?php echo $v['jpush_create_time']; ?></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <?php if(!empty($output['jpush_list']) && is_array($output['jpush_list'])){ ?>
        <tr class="tfoot">
          <td><input type="checkbox" class="checkall" id="checkallBottom"></td>
          <td colspan="16"><label for="checkallBottom"><?php echo $lang['nc_select_all']; ?></label>
            &nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn" onclick="if(confirm('<?php echo $lang['nc_ensure_del'];?>')){$('#form_article').submit();}"><span><?php echo $lang['nc_del'];?></span></a>
            <div class="pagination"> <?php echo $output['page'];?> </div></td>
        </tr>
        <?php } ?>
      </tfoot>
    </table>
  </form>
</div>

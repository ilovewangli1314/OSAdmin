<?php /* Smarty version Smarty-3.1.15, created on 2017-04-20 17:32:39
         compiled from "/Library/WebServer/Documents/OSAdmin/uploads/include/template/panel/sales_enhance.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11645156158f880375d1698-16810165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddfc2188117e7564fb793c698d6c30deff446541' => 
    array (
      0 => '/Library/WebServer/Documents/OSAdmin/uploads/include/template/panel/sales_enhance.tpl',
      1 => 1492680648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11645156158f880375d1698-16810165',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_GET' => 0,
    'sale_infos' => 0,
    'sale_info' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f8803774f990_93700332',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f8803774f990_93700332')) {function content_58f8803774f990_93700332($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 --->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


<!-- <div class="btn-toolbar" style="margin-bottom:2px;">
	<a data-toggle="collapse" data-target="#search"  href="#" title= "检索"><button class="btn btn-primary" style="margin-left:5px"><i class="icon-search"></i></button></a>
</div>
<?php if ($_smarty_tpl->tpl_vars['_GET']->value['search']) {?>
<div id="search" class="collapse in">
<?php } else { ?>
<div id="search" class="collapse out" >
<?php }?>
<form class="form_search"  action="" method="GET" style="margin-bottom:0px">
	<div style="float:left;margin-right:5px">
		<label>查询所有玩家请留空</label>
		<input type="text" name="player_id" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['player_id'];?>
" placeholder="输入玩家ID" >
		<input type="hidden" name="search" value="1" > 
	</div>
	<div class="btn-toolbar" style="padding-top:25px;padding-bottom:0px;margin-bottom:0px">
		<button type="submit" class="btn btn-primary">检索</button>
	</div>
	<div style="clear:both;"></div>
</form> -->
</div>

	<div class="block">
		<a href="#page-stats" class="block-heading" data-toggle="collapse">销售列表</a>
		<div id="page-stats" class="block-body collapse in">
			<table class="table table-striped">
				<thead>
				<tr>
					<th style="width:140px">日期</th>
					<th style="width:100px">活跃用户数</th>
					<th style="width:100px">新增用户数</th>
					<th style="width:120px">次日留存</th>
					<th style="width:100px">付费用户数</th>
					<th style="width:100px">付费率</th>
					<th style="width:140px">新增付费用户数</th>
					<th style="width:140px">新增用户付费率</th>
					<th style="width:80px">付费次数</th>
					<th style="width:140px">付费累计金额</th>
					<th style="width:100px">ARPU</th>
					<th style="width:100px">ARPPU</th>
					<th style="width:50px">操作</th>
				</tr>
				</thead>
				<tbody>
				<?php  $_smarty_tpl->tpl_vars['sale_info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sale_info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sale_infos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sale_info']->key => $_smarty_tpl->tpl_vars['sale_info']->value) {
$_smarty_tpl->tpl_vars['sale_info']->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['sale_info']->value['date'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['sale_info']->value['active_users'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['sale_info']->value['added_users'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['sale_info']->value['next_day_retained'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['sale_info']->value['pay_users'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['sale_info']->value['pay_rate'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['sale_info']->value['added_pay_users'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['sale_info']->value['added_pay_rate'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['sale_info']->value['pay_num'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['sale_info']->value['pay_amount'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['sale_info']->value['arpu'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['sale_info']->value['arppu'];?>
</td>

						<td>
							<a data-toggle="modal" href="sale_detail.php?sale_id=<?php echo $_smarty_tpl->tpl_vars['sale_info']->value['day_time'];?>
" title= "查看" ><i class="icon-eye-open" href="sale_detail.php?sale_id=<?php echo $_smarty_tpl->tpl_vars['sale_info']->value['day_time'];?>
" ></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<!--- START 分页模板 --->

			<?php echo $_smarty_tpl->tpl_vars['page_html']->value;?>


			<!--- END --->
		</div>
	</div>

<!---操作的确认层，相当于javascript:confirm函数--->
<?php echo $_smarty_tpl->tpl_vars['osadmin_action_confirm']->value;?>


<!--- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 --->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>

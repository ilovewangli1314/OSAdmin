<?php /* Smarty version Smarty-3.1.15, created on 2017-04-17 16:05:42
         compiled from "/Library/WebServer/Documents/OSAdmin/uploads/include/template/panel/player_retained.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164087821658f4730587d712-80291863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e48605f58d0d1f164f2e79dfc9951ad24dbde0f5' => 
    array (
      0 => '/Library/WebServer/Documents/OSAdmin/uploads/include/template/panel/player_retained.tpl',
      1 => 1492416333,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164087821658f4730587d712-80291863',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58f47305961f51_60331730',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_GET' => 0,
    'player_retaineds' => 0,
    'player_retained' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f47305961f51_60331730')) {function content_58f47305961f51_60331730($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 --->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


<div class="btn-toolbar" style="margin-bottom:2px;">
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
</form>
</div>
    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">玩家列表</a>
        <div id="page-stats" class="block-body collapse in">
			<table class="table table-striped">
              <thead>
                <tr>
					<th style="width:80px">日期</th>
					<th style="width:150px">1日</th>
					<th style="width:80px">2日</th>
					<th style="width:80px">3日</th>
					<th style="width:80px">4日</th>
					<th style="width:80px">5日</th>
					<th style="width:80px">6日</th>
					<th style="width:80px">7日</th>
                </tr>
              </thead>
              <tbody>							  
                <?php  $_smarty_tpl->tpl_vars['player_retained'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['player_retained']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['player_retaineds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['player_retained']->key => $_smarty_tpl->tpl_vars['player_retained']->value) {
$_smarty_tpl->tpl_vars['player_retained']->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['player_retained']->value['date'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['player_retained']->value['day_1'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['player_retained']->value['day_2'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['player_retained']->value['day_3'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['player_retained']->value['day_4'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['player_retained']->value['day_5'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['player_retained']->value['day_6'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['player_retained']->value['day_7'];?>
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

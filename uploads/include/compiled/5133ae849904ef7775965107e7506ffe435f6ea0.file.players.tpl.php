<?php /* Smarty version Smarty-3.1.15, created on 2017-04-14 14:29:48
         compiled from "/Library/WebServer/Documents/OSAdmin/uploads/include/template/panel/players.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2317113158d8a9e0134207-05336888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5133ae849904ef7775965107e7506ffe435f6ea0' => 
    array (
      0 => '/Library/WebServer/Documents/OSAdmin/uploads/include/template/panel/players.tpl',
      1 => 1492144382,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2317113158d8a9e0134207-05336888',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58d8a9e017b041_70491999',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    '_GET' => 0,
    'player_infos' => 0,
    'player_info' => 0,
    'page_no' => 0,
    'page_html' => 0,
    'osadmin_action_confirm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d8a9e017b041_70491999')) {function content_58d8a9e017b041_70491999($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
					<th style="width:80px">ID</th>
					<th style="width:150px">注册时间</th>
					<th style="width:80px">操作</th>
                </tr>
              </thead>
              <tbody>							  
                <?php  $_smarty_tpl->tpl_vars['player_info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['player_info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['player_infos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['player_info']->key => $_smarty_tpl->tpl_vars['player_info']->value) {
$_smarty_tpl->tpl_vars['player_info']->_loop = true;
?>
					<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['player_info']->value['id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['player_info']->value['time'];?>
</td>
					<td>
					<a href="player_modify.php?player_id=<?php echo $_smarty_tpl->tpl_vars['player_info']->value['id'];?>
" title= "修改" ><i class="icon-pencil"></i></a>
					<a data-toggle="modal" href="#myModal" title= "删除" ><i class="icon-remove" href="players.php?page_no=<?php echo $_smarty_tpl->tpl_vars['page_no']->value;?>
&method=del&player_id=<?php echo $_smarty_tpl->tpl_vars['player_info']->value['id'];?>
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

<?php /* Smarty version Smarty-3.1.15, created on 2017-03-28 16:48:51
         compiled from "/Library/WebServer/Documents/OSAdmin/uploads/include/template/panel/player_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58481000558d900f358f4f8-71201825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53dfdd566f09257346972a9b1e0219122ade8a83' => 
    array (
      0 => '/Library/WebServer/Documents/OSAdmin/uploads/include/template/panel/player_modify.tpl',
      1 => 1490690899,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58481000558d900f358f4f8-71201825',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58d900f35a29f6_11378987',
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'player' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d900f35a29f6_11378987')) {function content_58d900f35a29f6_11378987($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>

<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">请修改账号资料</a></li>
    </ul>	
	
	<div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">

           <form id="tab" method="post" action="" autocomplete="off">
				<label>ID<span class="label label-info">不可修改</span></label>
				<input type="text" name="player_id" value="<?php echo $_smarty_tpl->tpl_vars['player']->value['id'];?>
" class="input-xlarge" readonly="true">
				<label>注册时间<span class="label label-important" >不可修改</span></label>
				<input type="text" name="player_time" value="<?php echo $_smarty_tpl->tpl_vars['player']->value['time'];?>
" class="input-xlarge" readonly="true">
				<label>金币数</label>
				<input type="text" name="player_coins" value="<?php echo $_smarty_tpl->tpl_vars['player']->value['data']['key_user_base_data']['userCoins'];?>
" class="input-xlarge" required="true" >
			<div class="btn-toolbar">
				<button type="submit" class="btn btn-primary"><strong>提交</strong></button>
				<div class="btn-group"></div>
			</div>
			</form>
        </div>
    </div>
</div>	
<!-- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 -->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>

<?php /* Smarty version Smarty-3.1.15, created on 2017-03-23 19:49:44
         compiled from "/Library/WebServer/Documents/OSAdmin/uploads/include/template/panel/user_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200547330758d3b658cf88b3-69864823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4002cd3c988f4f7d0272855ba7294c975b46fee' => 
    array (
      0 => '/Library/WebServer/Documents/OSAdmin/uploads/include/template/panel/user_modify.tpl',
      1 => 1490250718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200547330758d3b658cf88b3-69864823',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'user' => 0,
    'group_options' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58d3b658d1b633_21482222',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d3b658d1b633_21482222')) {function content_58d3b658d1b633_21482222($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/Library/WebServer/Documents/OSAdmin/uploads/include/config/../../include/lib/Smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
				
				<label>登录名 <span class="label label-info">不可修改</span></label>
				<input type="text" name="user_name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
" class="input-xlarge" readonly="true">
				<label>密码 <span class="label label-important" >如不修改请留空</span></label>
				<input type="password" name="password" value="" class="input-xlarge">
				<label>姓名</label>
				<input type="text" name="real_name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['real_name'];?>
" class="input-xlarge" required="true" >
				<label>手机</label>
				<input type="text" name="mobile" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['mobile'];?>
" class="input-xlarge" required pattern="\d{11}">
				<label>邮件</label>
				<input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
"  class="input-xlarge" required="true" >
				<label>描述</label>
				<textarea name="user_desc" rows="3" class="input-xlarge"><?php echo $_smarty_tpl->tpl_vars['user']->value['user_desc'];?>
</textarea>
				<label>账号组</label>
				
				<?php if ($_smarty_tpl->tpl_vars['user']->value['user_id']==1) {?>
				<?php echo smarty_function_html_options(array('name'=>'user_group','id'=>"DropDownTimezone",'class'=>"input-xlarge",'options'=>$_smarty_tpl->tpl_vars['group_options']->value,'disabled'=>"true",'selected'=>$_smarty_tpl->tpl_vars['user']->value['user_group']),$_smarty_tpl);?>

				<?php } else { ?>
				<?php echo smarty_function_html_options(array('name'=>'user_group','id'=>"DropDownTimezone",'class'=>"input-xlarge",'options'=>$_smarty_tpl->tpl_vars['group_options']->value,'selected'=>$_smarty_tpl->tpl_vars['user']->value['user_group']),$_smarty_tpl);?>

				<?php }?>
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

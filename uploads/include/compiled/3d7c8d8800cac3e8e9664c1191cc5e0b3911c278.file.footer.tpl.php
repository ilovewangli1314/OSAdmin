<?php /* Smarty version Smarty-3.1.15, created on 2017-03-23 06:55:45
         compiled from "/Library/WebServer/Documents/OSAdmin/uploads/include/template/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134514569158d371717ec477-23885141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d7c8d8800cac3e8e9664c1191cc5e0b3911c278' => 
    array (
      0 => '/Library/WebServer/Documents/OSAdmin/uploads/include/template/footer.tpl',
      1 => 1490250718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134514569158d371717ec477-23885141',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58d371717efc24_19507423',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d371717efc24_19507423')) {function content_58d371717efc24_19507423($_smarty_tpl) {?>					<footer>
                        <hr>
                        <p class="pull-right">A <a href="http://osadmin.org/" target="_blank">Basic Backstage Management System for China Only.</a> by <a href="http://weibo.com/osadmin" target="_blank">SomewhereYu</a>. 安卓应用【<a href="http://app.herobig.com" target="_blank">短信卫士</a>】</p>
                        <p>&copy; 2013 <a href="http://osadmin.org" target="_blank">OSAdmin</a></p>
                    </footer>
				</div>
			</div>
		</div>
    <script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/bootstrap/js/bootstrap.js"></script>

<!-- 捷径的提示 -->

		<script type="text/javascript">	
			alertDismiss("alert-success", 3);
			alertDismiss("alert-info", 10);

			listenShortCut("icon-plus");
			listenShortCut("icon-minus");

			doSidebar();
		</script>
	</body>
</html>
<?php }} ?>

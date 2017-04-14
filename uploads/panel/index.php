<?php
require('../include/init.inc.php');

echo date('Y-m-d H:i:s', 1492186704);
echo date('Y-m-d H:i:s', 1492128000);

$user_info = UserSession::getSessionInfo();
$menus = MenuUrl::getMenuByIds($user_info['shortcuts']);
Template::assign('menus', $menus);
Template::display('index.tpl');

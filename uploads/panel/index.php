<?php
require('../include/init.inc.php');

print_r(222 . '</br>');

$user_info = UserSession::getSessionInfo();

print_r(333 . '</br>');

$menus = MenuUrl::getMenuByIds($user_info['shortcuts']);

print_r(444 . '</br>');

Template::assign('menus', $menus);
Template::display('index.tpl');

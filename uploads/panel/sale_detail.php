<?php
require('../include/init.inc.php');
$sale_id = '';
extract($_REQUEST, EXTR_IF_EXISTS);

Common::checkParam($sale_id);

//Template::assign('player', $player);
Template::display('panel/sale_detail.tpl');

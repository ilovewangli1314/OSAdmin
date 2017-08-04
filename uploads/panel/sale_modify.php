<?php
require('../include/init.inc.php');
$dayTime = $activeUsers = $addedUsers = $payUsers = $payRate = $payAmount = $arpu = $arppu = '';
extract($_REQUEST, EXTR_IF_EXISTS);

//Common::checkParam($player_id);
//$player = Player::getPlayerById($player_id);
//if (empty($player)) {
//    Common::exitWithError(ErrorMessage::PLAYER_NOT_EXIST, "panel/players.php");
//}

$dailyRecord = [];
if (Common::isPost()) {
    $payRate = number_format($payUsers / $activeUsers, 4) * 100;
    $payRate = $payRate . '%';
    $arpu = number_format($payAmount / $activeUsers, 2);
    $arpu = $arpu . '$';
    $arppu = number_format($payAmount / $payUsers, 2);
    $arppu = $arppu . '$';
    $update_data = array ('activeUsers' => $activeUsers, 'addedUsers' => $addedUsers, 'payUsers' => $payUsers,
                          'payRate' => $payRate, 'payAmount' => $payAmount, 'arpu' => $arpu, 'arppu' => $arppu);
    $end_time = new DateTime($dayTime);
    $result = DailyRecord::update($end_time->getTimestamp(), $update_data);
    if ($result >= 0) {
        $current_user = UserSession::getSessionInfo();
        $ip = Common::getIp();
        $update_data['ip'] = $ip;
        SysLog::addLog(UserSession::getUserName(), 'MODIFY', 'DailyRecord', $user_id, json_encode($update_data));
        Common::exitWithSuccess('更新完成', 'panel/sales.php');
    } else {
        OSAdmin::alert("error");
    }
}

Template::assign('dailyRecord', $dailyRecord);
Template::display('panel/sale_modify.tpl');
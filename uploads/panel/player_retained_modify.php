<?php
require('../include/init.inc.php');
$dayTime = $retained1 = $retained2 = $retained3 = $retained4 = $retained5 = $retained6 = $retained7 = '';
extract($_REQUEST, EXTR_IF_EXISTS);

//Common::checkParam($player_id);
//$player = Player::getPlayerById($player_id);
//if (empty($player)) {
//    Common::exitWithError(ErrorMessage::PLAYER_NOT_EXIST, "panel/players.php");
//}

$dailyRecord = [];
if (Common::isPost()) {
    $update_data = array ('playerRetained' => array('retained1' => $retained1, 'retained2' => $retained2, 'retained3' => $retained3,
                                                    'retained4' => $retained4, 'retained5' => $retained5, 'retained6' => $retained6, 'retained7' => $retained7));
    $end_time = new DateTime($dayTime);
    $result = DailyRecord::update($end_time->getTimestamp(), $update_data);
    if ($result >= 0) {
        $current_user = UserSession::getSessionInfo();
        $ip = Common::getIp();
        $update_data['ip'] = $ip;
        SysLog::addLog(UserSession::getUserName(), 'MODIFY', 'DailyRecord', $user_id, json_encode($update_data));
        Common::exitWithSuccess('更新完成', 'panel/player_retained.php');
    } else {
        OSAdmin::alert("error");
    }
}

Template::assign('dailyRecord', $dailyRecord);
Template::display('panel/player_retained_modify.tpl');
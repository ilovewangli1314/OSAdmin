<?php
require('../include/init.inc.php');
$player_id = $player_time = $player_coins = '';
extract($_REQUEST, EXTR_IF_EXISTS);

Common::checkParam($player_id);
$player = Player::getPlayerById($player_id);
if (empty($player)) {
    Common::exitWithError(ErrorMessage::PLAYER_NOT_EXIST, "panel/players.php");
}
if (Common::isPost()) {
    if ($player_id == "") {
        OSAdmin::alert("error", ErrorMessage::NEED_PARAM);
    } else {
        // 暂时只更新玩家的金币数
        $player_data = ["data.key_user_base_data.userCoins" => $player_coins];
        $result = Player::updatePlayer($player_id, $player_data);
        if ($result >= 0) {
            $current_user = UserSession::getSessionInfo();
            $ip = Common::getIp();
            $update_data['ip'] = $ip;
            SysLog::addLog(UserSession::getUserName(), 'MODIFY', 'User', $user_id, json_encode($update_data));
            Common::exitWithSuccess('更新完成', 'panel/players.php');
        } else {
            OSAdmin::alert("error");
        }
	}
}

Template::assign('player', $player);
Template::display('panel/player_modify.tpl');
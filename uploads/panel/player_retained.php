<?php
require ('../include/init.inc.php');
$method = $player_id = $page_no = $search = '';
extract ( $_REQUEST, EXTR_IF_EXISTS );

if ($method == 'del' && !empty ($player_id)) {
//    $player = Player::getPlayerById($player_id);
    $result = Player::delPlayer($player_id);
    if ($result >= 0) {
        SysLog::addLog(UserSession::getUserName(), 'DELETE', 'Player', $player_id, $player_id);
        Common::exitWithSuccess('已删除', 'panel/players.php');
    } else {
        OSAdmin::alert("error");
    }
}

//START 数据库查询及分页数据
$page_size = 30;
$page_no=$page_no<1?1:$page_no;

if ($search) {
    $row_count = count(Player::searchByID($player_id));
    $total_page = $row_count % $page_size == 0 ? $row_count / $page_size : ceil($row_count / $page_size);
    $total_page = $total_page < 1 ? 1 : $total_page;
    $page_no = $page_no > ($total_page) ? ($total_page) : $page_no;
    $start = ($page_no - 1) * $page_size;
    $player_infos = Player::searchByID($player_id, $start, $page_size);

//    $user_infos = User::search($user_group,$user_name,$start , $page_size);
} else {
    // 得到距离项目开始时的总天数
    $totalDays = DateUtils::dateDifference(null, STAT_BEGIN_TIME);

    $row_count = $totalDays;
    $total_page = $row_count % $page_size == 0 ? $row_count / $page_size : ceil($row_count / $page_size);
    $total_page = $total_page < 1 ? 1 : $total_page;
    $page_no = $page_no > ($total_page) ? ($total_page) : $page_no;
    $start = ($page_no - 1) * $page_size;
    $end = $page_no * $page_size;
    $end = $end > $row_count ? $row_count : $end;

    $player_retaineds = [];
    for ($i = $start; $i < $end; $i++) {
        $player_retained = [];

        $timeRange = DateUtils::getTimeRange(DATE_UNIT_DAY, -($i + 1));
        $begin_timestamp = $timeRange['minTime'];
        $end_timestamp = $timeRange['maxTime'];

        // 日期
        $player_retained['date'] = DateUtils::getDateStr($begin_timestamp, true);
        $conditions = ['registTime' => ['$gte' => $begin_timestamp * 1000, '$lt' => $end_timestamp * 1000]];
        $registPlayerNum = count(Player::search($conditions));

        for ($j = 0; $j <= $i; $j++) {
            $timeRange = DateUtils::getTimeRange(DATE_UNIT_DAY, $j, $begin_timestamp);
            $retainedConditions = array_merge($conditions, ['loginTime' => ['$gte' => $timeRange['minTime'] * 1000]]);
            $retainedPlayerNum = count(Player::search($retainedConditions));

            $player_retained['day_' . ($j + 1)] = number_format(Common::safeDivide($retainedPlayerNum, $registPlayerNum), 4) * 100 . "%";
        }

        array_push($player_retaineds, $player_retained);
    }
}

$page_html = Pagination::showPager("player_retained.php?player_id=$player_id&search=$search", $page_no, $page_size, $row_count);

//追加操作的确认层
$confirm_html = OSAdmin::renderJsConfirm("icon-pause,icon-play,icon-remove");

Template::assign ( 'player_retaineds', $player_retaineds );
Template::assign ( '_GET', $_GET );
Template::assign ( 'page_no', $page_no );
Template::assign ( 'page_html', $page_html );
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::display ( 'panel/player_retained.tpl' );

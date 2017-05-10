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
$page_size = PAGE_SIZE;
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
    $row_count = count(Player::search());
    $total_page = $row_count % $page_size == 0 ? $row_count / $page_size : ceil($row_count / $page_size);
    $total_page = $total_page < 1 ? 1 : $total_page;
    $page_no = $page_no > ($total_page) ? ($total_page) : $page_no;
    $start = ($page_no - 1) * $page_size;
    $player_infos = Player::search(null, $start, $page_size);
}

$page_html = Pagination::showPager("players.php?player_id=$player_id&search=$search", $page_no, $page_size, $row_count);

//追加操作的确认层
$confirm_html = OSAdmin::renderJsConfirm("icon-pause,icon-play,icon-remove");

Template::assign ( 'player_infos', $player_infos );
Template::assign ( '_GET', $_GET );
Template::assign ( 'page_no', $page_no );
Template::assign ( 'page_html', $page_html );
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::display ( 'panel/players.tpl' );

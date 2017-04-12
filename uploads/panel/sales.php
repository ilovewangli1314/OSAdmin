<?php
require ('../include/init.inc.php');
$method = $sale_id = $page_no = $search = '';
extract ( $_REQUEST, EXTR_IF_EXISTS );

DateUtils::getTimeRange(DATE_UNIT_MONTH, 0);

//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;

if ($search) {
    $row_count = count(Player::search($player_id));
    $total_page = $row_count % $page_size == 0 ? $row_count / $page_size : ceil($row_count / $page_size);
    $total_page = $total_page < 1 ? 1 : $total_page;
    $page_no = $page_no > ($total_page) ? ($total_page) : $page_no;
    $start = ($page_no - 1) * $page_size;
    $player_infos = Player::search($player_id, $start, $page_size);

//    $user_infos = User::search($user_group,$user_name,$start , $page_size);
} else {
    // 统计前七天的销售数据
    $days = 7;
    $begin_timestamp = 0;
    $end_time = new DateTime();
    $end_time->setTime(0, 0, 0);
    $end_timestamp = $end_time->getTimestamp();

    $sale_infos = [];
    $sale_info = null;
    $pay_records = null;
    for ($i = 0; $i < $days; $i++) {
        $sale_info = [];

        $begin_timestamp = $end_timestamp - 24 * 60 * 60;
        // 日期
        $sale_info['date'] = Common::getDateStr($begin_timestamp);
//        Common::print_r_n($begin_timestamp);

        $conditions = ['payTime' => ['$gte' => $begin_timestamp, '$lt' => $end_timestamp]];
        $pay_records = PayRecord::search($conditions);

//        // 付费累计金额
//        $sale_info['pay_amount'] = 0;
//        foreach ($pay_records as $value) {
//            $sale_info['pay_amount'] += $value['goodsPrice'] * $value['payNum'];
//        }

        // 新增付费用户数
        $conditions = ['dayTime' => ['$gte' => $begin_timestamp, '$lt' => $end_timestamp]];
        $daily_record = DailyRecord::search($conditions)[0];
        if ($daily_record) {
//            // 根据玩家的设备ID去重获得付费用户数
//            $sale_info['pay_users'] = count(Common::unique_multidim_array($pay_records, 'userDeviceID'));
            // 付费信息的ID
            $sale_info['id'] = $daily_record['id'];
            // 付费累计金额
            $sale_info['pay_amount'] = $daily_record['payAmount'] . '$';
            // 付费用户数
            $sale_info['pay_users'] = $daily_record['payUsers'];
            // 新增付费用户数
            $sale_info['added_pay_users'] = $daily_record['addedPayUsers'];
            // ARPU
            $sale_info['arpu'] = $sale_info['pay_amount'] / $daily_record['activeUsers'] . '$';
            // ARPPU
            $sale_info['arppu'] = $sale_info['pay_amount'] / $daily_record['payUsers'] . '$';
            // 付费率
            $sale_info['pay_rate'] = ($daily_record['payUsers'] / $daily_record['activeUsers']) * 100 . "%";
            // 新增用户付费率
            $sale_info['added_pay_rate'] = ($daily_record['addedPayUsers'] / $daily_record['addedUsers']) * 100 . "%";
        }

        $end_timestamp = $begin_timestamp;

        $sale_infos[$i] = $sale_info;
    }

    $row_count = $days;
    $total_page = $row_count % $page_size == 0 ? $row_count / $page_size : ceil($row_count / $page_size);
    $total_page = $total_page < 1 ? 1 : $total_page;
    $page_no = $page_no > ($total_page) ? ($total_page) : $page_no;
    $start = ($page_no - 1) * $page_size;

//    Common::print_r_n(count($sale_infos));
}

$page_html = Pagination::showPager("sales.php?search=$search", $page_no, $page_size, $row_count);

//追加操作的确认层
$confirm_html = OSAdmin::renderJsConfirm("icon-pause,icon-play,icon-remove");

Template::assign ( 'sale_infos', $sale_infos );
Template::assign ( '_GET', $_GET );
Template::assign ( 'page_no', $page_no );
Template::assign ( 'page_html', $page_html );
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::display ( 'panel/sales.tpl' );

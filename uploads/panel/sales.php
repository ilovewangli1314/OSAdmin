<?php
require ('../include/init.inc.php');
$method = $sale_id = $page_no = $search = '';
extract ( $_REQUEST, EXTR_IF_EXISTS );

DateUtils::getTimeRange(DATE_UNIT_MONTH, 0);

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
    // 统计当天及前七天的销售数据
    $days = 1 + 7;
    $begin_timestamp = 0;
    $end_time = new DateTime();
    $end_time->setTime(0, 0, 0);
    $end_timestamp = $end_time->getTimestamp() + 24 * 60 * 60;

    $sale_infos = [];
    $sale_info = null;
    $purchase_records = null;
    $activeUsers = 0;
    $addedUsers = 0;
    $payUsers = 0;
    $addedPayUsers = 0;
    for ($i = 0; $i < $days; $i++) {
        $sale_info = [];

        $begin_timestamp = $end_timestamp - 24 * 60 * 60;
        // 日期
        $sale_info['date'] = Common::getDateStr($begin_timestamp);
//        Common::print_r_n($begin_timestamp);

//        // 付费累计金额
//        $sale_info['purchase_amount'] = 0;
//        foreach ($purchase_records as $value) {
//            $sale_info['purchase_amount'] += $value['goodsPrice'] * $value['payNum'];
//        }

        // 如果是当天则实时查询玩家列表生成活跃用户和新增用户
        if ($i == 0) {
            $conditions = ['loginTime' => ['$gte' => $begin_timestamp * 1000, '$lt' => $end_timestamp * 1000]];
            $loginPlayers = Player::search($conditions);
            foreach ($loginPlayers as $value) {
                $activeUsers++;

                if (DateUtils::checkIsSameDay($value['loginTime'], $value['registTime'])) {
                    $addedUsers++;
                }
            }

            $conditions = ['purchaseTime' => ['$gte' => $begin_timestamp * 1000, '$lt' => $end_timestamp * 1000]];
            $purchase_records = PurchaseRecord::search($conditions, null, null);
            $purchase_records = Common::unique_multidim_array($purchase_records, 'userDeviceID');
            foreach ($purchase_records as $value) {
                $payUsers++;

                $row_count = count(Player::search());
                $user = Player::search(['deviceID' => $value['userDeviceID']])[0];
                if (DateUtils::checkIsSameDay($user['loginTime'], $user['registTime'])) {
                    $addedPayUsers++;
                }
            }
        } else {
            $activeUsers = 0;
            $addedUsers = 0;
            $payUsers = 0;
            $addedPayUsers = 0;
        }

        $conditions = ['dayTime' => ['$gte' => $begin_timestamp * 1000, '$lt' => $end_timestamp * 1000]];
        $daily_record = DailyRecord::search($conditions)[0];
        if ($daily_record) {
//            // 根据玩家的设备ID去重获得付费用户数
//            $sale_info['pay_users'] = count(Common::unique_multidim_array($pay_records, 'userDeviceID'));
            // 活跃用户数
            $sale_info['active_users'] = $activeUsers;
            // 新增用户数
            $sale_info['added_users'] = $addedUsers;
            // 付费信息的ID
            $sale_info['id'] = $daily_record['id'];
            // 付费累计金额
            $sale_info['pay_amount'] = $daily_record['payAmount'] . '$';
            // 付费用户数
            $sale_info['pay_users'] = $payUsers;
            // 新增付费用户数
            $sale_info['added_pay_users'] = $addedPayUsers;
            // ARPU
            $sale_info['arpu'] = Common::safeDivide($daily_record['payAmount'], $activeUsers) . '$';
            // ARPPU
            $sale_info['arppu'] = Common::safeDivide($daily_record['payAmount'], $payUsers) . '$';
            // 付费率
            $sale_info['pay_rate'] = Common::safeDivide($payUsers, $activeUsers) * 100 . "%";
            // 新增用户付费率
            $sale_info['added_pay_rate'] = Common::safeDivide($addedPayUsers, $addedUsers) * 100 . "%";
        } else {
            // 活跃用户数
            $sale_info['active_users'] = 0;
            // 新增用户数
            $sale_info['added_users'] = 0;
            // 付费信息的ID
            $sale_info['id'] = -1;
            // 付费累计金额
            $sale_info['pay_amount'] = '0$';
            // 付费用户数
            $sale_info['pay_users'] = 0;
            // 新增付费用户数
            $sale_info['added_pay_users'] = 0;
            // ARPU
            $sale_info['arpu'] = '0$';
            // ARPPU
            $sale_info['arppu'] = '0$';
            // 付费率
            $sale_info['pay_rate'] = "0%";
            // 新增用户付费率
            $sale_info['added_pay_rate'] = "0%";
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

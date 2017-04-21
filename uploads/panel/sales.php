<?php
require ('../include/init.inc.php');
$method = $sale_id = $page_no = $search = '';
extract ( $_REQUEST, EXTR_IF_EXISTS );

//DateUtils::getTimeRange(DATE_UNIT_MONTH, 0);

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
    $init_timestamp = strtotime(STAT_BEGIN_TIME);
    $days = 99999;
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
    $nextDayRetained = 0; // 次日留存
//    $day7Retained = 0; // 7日留存
    for ($i = 0; $i < $days; $i++) {
        $payNum = 0; // 付费次数
        $payAmount = 0;

        $sale_info = [];

        $begin_timestamp = $end_timestamp - 24 * 60 * 60;
        // 日期
        $sale_info['date'] = DateUtils::getDateStr($begin_timestamp, true);
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
            $payNum = count($purchase_records);
            foreach ($purchase_records as $value) {
                $payAmount += (explode("$", $value['productPrice'])[1] * $value['purchaseNum']);
            }
            $purchase_records = Common::unique_multidim_array($purchase_records, 'userDeviceID');
            foreach ($purchase_records as $value) {
                $payUsers++;

                $user = Player::search(['deviceID' => $value['userDeviceID']])[0];
                if (DateUtils::checkIsSameDay($user['loginTime'], $user['registTime'])) {
                    $addedPayUsers++;
                }

                // 注意手动释放内存
                unset($user);
            }

            // 实时计算次日留存
            $timeRange = DateUtils::getTimeRange(DATE_UNIT_DAY, -1, null);
//            echo '<br>minTime:<br>' . date("Y-m-d H:i:s", $timeRange['minTime']);
//            echo '<br>maxTime:<br>' . date("Y-m-d H:i:s", $timeRange['maxTime']);
            $conditions = ['registTime' => ['$gte' => $timeRange['minTime'] * 1000, '$lt' => $timeRange['maxTime'] * 1000]];
            $lastPlayers = Player::search($conditions);
            $retainedPlayer = 0;
            foreach ($lastPlayers as $value) {
                if (DateUtils::checkIsSameDay($value['loginTime'], $timeRange['maxTime'])) {
                    $retainedPlayer++;
                }
            }
            $nextDayRetained = number_format(Common::safeDivide($retainedPlayer, count($lastPlayers)), 4) * 100 . "%";
//            // 实时计算总留存
//            $conditions = ['registTime' => ['$lt' => $timeRange['maxTime'] * 1000]];
//            $day7Retained = number_format(Common::safeDivide($activeUsers - $addedUsers, count(Player::search($conditions))), 4) * 100 . "%";
        } else {
            $activeUsers = 0;
            $addedUsers = 0;
            $payUsers = 0;
            $addedPayUsers = 0;
            $nextDayRetained = 0;
            $day7Retained = 0;
        }

//        $conditions = ['dayTime' => ['$gte' => $begin_timestamp * 1000, '$lt' => $end_timestamp * 1000]];
//        $daily_record = DailyRecord::search($conditions)[0];
        $daily_record = [];
        if ($i == 0) {
            // 付费信息的时间
            $daily_record['dayTime'] = $sale_info['day_time'] = $begin_timestamp;
            // 活跃用户数
            $daily_record['activeUsers'] = $sale_info['active_users'] = $activeUsers;
            // 新增用户数
            $daily_record['addedUsers'] = $sale_info['added_users'] = $addedUsers;
            // 次日留存
            $daily_record['nextDayRetained'] = $sale_info['next_day_retained'] = $nextDayRetained;
            // 付费次数
            $daily_record['payNum'] = $sale_info['pay_num'] = $payNum;
            // 付费累计金额
            $daily_record['payAmount'] = number_format($payAmount, 2);
            $sale_info['pay_amount'] = $payAmount . '$';
            // 付费用户数
            $daily_record['payUsers'] = $sale_info['pay_users'] = $payUsers;
            // 新增付费用户数
            $daily_record['addedPayUsers'] = $sale_info['added_pay_users'] = $addedPayUsers;
            // ARPU
            $daily_record['arpu'] = $sale_info['arpu'] = number_format(Common::safeDivide($payAmount, $activeUsers), 2) . '$';
            // ARPPU
            $daily_record['arppu'] = $sale_info['arppu'] = number_format(Common::safeDivide($payAmount, $payUsers), 2) . '$';
            // 付费率
            $daily_record['payRate'] = $sale_info['pay_rate'] = number_format(Common::safeDivide($payUsers, $activeUsers), 4) * 100 . "%";
            // 新增用户付费率
            $daily_record['addedPayRate'] = $sale_info['added_pay_rate'] = number_format(Common::safeDivide($addedPayUsers, $addedUsers), 4) * 100 . "%";

            if (count(DailyRecord::search(['dayTime' => $daily_record['dayTime']])) > 0) {
                DailyRecord::update($daily_record['dayTime'], $daily_record);
            } else {
                DailyRecord::insert($daily_record);
            }
        } else {
            $conditions = ['dayTime' => $begin_timestamp];
            if (count(DailyRecord::search($conditions)) > 0) {
                $daily_record = DailyRecord::search($conditions)[0];
            }

            // 活跃用户数
            $sale_info['active_users'] = $daily_record['activeUsers'];
            // 新增用户数
            $sale_info['added_users'] = $daily_record['addedUsers'];
            // 次日留存
            $sale_info['next_day_retained'] = $daily_record['nextDayRetained'];
//            // 总留存
//            $sale_info['total_retained'] = "0%";
            // 付费信息的时间
            $sale_info['day_time'] = $daily_record['dayTime'];
            // 付费次数
            $sale_info['pay_num'] = $daily_record['payNum'];
            // 付费累计金额
            $sale_info['pay_amount'] = $daily_record['payAmount'] . "$";
            // 付费用户数
            $sale_info['pay_users'] = $daily_record['payUsers'];
            // 新增付费用户数
            $sale_info['added_pay_users'] = $daily_record['addedPayUsers'];
            // ARPU
            $sale_info['arpu'] = $daily_record['arpu'];
            // ARPPU
            $sale_info['arppu'] = $daily_record['arppu'];
            // 付费率
            $sale_info['pay_rate'] = $daily_record['payRate'];
            // 新增用户付费率
            $sale_info['added_pay_rate'] = $daily_record['addedPayRate'];
        }

        $end_timestamp = $begin_timestamp;

        $sale_infos[$i] = $sale_info;

        // 统计到项目上线的时间为止
        if ($begin_timestamp <= $init_timestamp) {
            break;
        }
    }

    $row_count = count($sale_infos);
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

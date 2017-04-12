<?php
if(!defined('ACCESS')) {exit('Access denied.');}

// 日期单位(日，周，月)
define('DATE_UNIT_DAY', 0);
define('DATE_UNIT_WEEK', 1);
define('DATE_UNIT_MONTH', 2);

class DateUtils
{
    public static function test()
    {
        echo date("Ymd", strtotime("now")), "\n";
        echo date("Ymd", strtotime("-1 week Monday")), "\n";
        echo date("Ymd", strtotime("-1 week Sunday")), "\n";
        echo date("Ymd", strtotime("+0 week Monday")), "\n";
        echo date("Ymd", strtotime("+0 week Sunday")), "\n";

        echo "*********第几个月:";
        echo date('n');
        echo "*********本周周几:";
        echo date("w");
        echo "*********本月天数:";
        echo date("t");
        echo "*********本月第几天:";
        echo date("d");
        echo "*********";

        echo '<br>上周起始时间:<br>';
        echo date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), date("d") - date("w") + 1 - 7, date("Y"))), "\n";
        echo date("Y-m-d H:i:s", mktime(23, 59, 59, date("m"), date("d") - date("w") + 7 - 7, date("Y"))), "\n";
        echo '<br>本周起始时间:<br>';
        echo date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), date("d") - date("w") + 1, date("Y"))), "\n";
        echo date("Y-m-d H:i:s", mktime(23, 59, 59, date("m"), date("d") - date("w") + 7, date("Y"))), "\n";

        echo '<br>上月起始时间:<br>';
        echo date("Y-m-d H:i:s", mktime(0, 0, 0, date("m") - 1, 1, date("Y"))), "\n";
        echo date("Y-m-d H:i:s", mktime(23, 59, 59, date("m"), 0, date("Y"))), "\n";
        echo '<br>本月起始时间:<br>';
        echo date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), 1, date("Y"))), "\n";
        echo date("Y-m-d H:i:s", mktime(23, 59, 59, date("m"), date("t"), date("Y"))), "\n";

        $season = ceil((date('n')) / 3);//当月是第几季度
        echo '<br>本季度起始时间:<br>';
        echo date('Y-m-d H:i:s', mktime(0, 0, 0, $season * 3 - 3 + 1, 1, date('Y'))), "\n";
        echo date('Y-m-d H:i:s', mktime(23, 59, 59, $season * 3, date('t', mktime(0, 0, 0, $season * 3, 1, date("Y"))), date('Y'))), "\n";

        $season = ceil((date('n')) / 3) - 1;//上季度是第几季度
        echo '<br>上季度起始时间:<br>';
        echo date('Y-m-d H:i:s', mktime(0, 0, 0, $season * 3 - 3 + 1, 1, date('Y'))), "\n";
        echo date('Y-m-d H:i:s', mktime(23, 59, 59, $season * 3, date('t', mktime(0, 0, 0, $season * 3, 1, date("Y"))), date('Y'))), "\n";
    }

    public static function getTimeRange($dateUnit, $offset)
    {
        $day = date("d");
        $week = date("w");
        $month = date("m");

        $minTime = $maxTime = 0;
        if ($dateUnit == DATE_UNIT_DAY) {
            $minTime = mktime(0, 0, 0, date("m"), date("d") + $offset, date("Y"));
            $maxTime = mktime(0, 0, 0, date("m"), date("d") + $offset + 1, date("Y"));
        } else if ($dateUnit == DATE_UNIT_WEEK) {
            $minTime = mktime(0, 0, 0, date("m"), date("d") - date("w") + 1 + (7 * $offset), date("Y"));
            $maxTime = mktime(0, 0, 0, date("m"), date("d") - date("w") + 7 + 1 + (7 * $offset), date("Y"));
        } else if ($dateUnit == DATE_UNIT_MONTH) {
            $minTime = mktime(0, 0, 0, date("m") + $offset, 1, date("Y"));
            $maxTime = mktime(0, 0, 0, date("m") + 1 + $offset, 1, date("Y"));
        }

        echo '<br>minTime:<br>' . date("Y-m-d H:i:s", $minTime);
        echo '<br>maxTime:<br>' . date("Y-m-d H:i:s", $maxTime);
    }
}

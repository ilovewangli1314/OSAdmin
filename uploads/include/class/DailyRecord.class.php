<?php
if(!defined('ACCESS')) {exit('Access denied.');}

/**
 * 游戏每日记录数据模型类(使用mongodb)
 * Class Player
 */
class DailyRecord extends Base{
	// 表名
    private static $table_name = 'dailyrecords';
	// 查询字段
	private static $columns = array('id', 'dayTime', 'activeUsers', 'addedUsers', 'payUsers', 'addedPayUsers', 'payAmount');

    public static function __instance($database = OSA_DB_ID)
    {
        return Base::__instance(GAME_DB_ID);
    }

	public static function getTableName(){
		return self::$table_name;
	}

    public static function search($where = [], $start = null, $page_size = null)
    {
        $db = self::__instance();
        $list = $db->select(self::getTableName(), self::$columns, $where, $start, $page_size);
        if (!empty($list)) {
//            foreach ($list as &$item) {
//                if ($item['dayTime']) {
//                    $item['dayTimeStr'] = Common::getDateTime($item['dayTime']);
//                }
//            }

            return $list;
        }
        return array();
	}
}

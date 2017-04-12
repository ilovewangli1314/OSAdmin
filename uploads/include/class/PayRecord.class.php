<?php
if(!defined('ACCESS')) {exit('Access denied.');}

/**
 * 游戏内购买记录数据模型类(使用mongodb)
 * Class Player
 */
class PayRecord extends Base{
	// 表名
    private static $table_name = 'payrecords';
	// 查询字段
	private static $columns = array('userID', 'userDeviceID', 'userData', 'goodsID', 'goodsName', 'goodsPrice', 'payNum', 'payTime', 'payReceipt');

    public static function __instance($database = OSA_DB_ID)
    {
        return Base::__instance(GAME_DB_ID);
    }

	public static function getTableName(){
		return self::$table_name;
	}

    public static function getPlayerById($player_id)
    {
        if (!$player_id || !is_numeric($player_id)) {
            return false;
        }
        $db = self::__instance();
        $where = $player_id ? ['id' => (int)$player_id] : [];
        $list = $db->select(self::getTableName(), self::$columns, $where);

        if (!empty($list)) {
            foreach ($list as &$item) {
                // 时间单位需要从微妙转换成秒
                if ($item->time) {
                    $item->time = Common::getDateTime($item->time / 1000);
                }
            }

            return $list[0];
        }
        return null;
    }

//	public static function getAllUsers( $start ='' ,$page_size='' ) {
//		$db=self::__instance();
//		$limit ="";
//		if($page_size){
//			$limit =" limit $start,$page_size ";
//		}
//		$sql = "select * ,coalesce(g.group_name,'已删除') from ".self::getTableName()." u left join ".UserGroup::getTableName()." g on u.user_group = g.group_id order by u.user_id desc $limit";
//
//		$list=$db->query($sql)->fetchAll();
//		if(!empty($list)){
//			foreach($list as &$item){
//
//				$item['login_time']=Common::getDateTime($item['login_time']);
//			}
//		}
//
//		if ($list) {
//			return $list;
//		}
//		return array ();
//	}

    public static function search($where = [], $start = null, $page_size = null)
    {
        $db = self::__instance();
        $list = $db->select(self::getTableName(), self::$columns, $where, $start, $page_size);
        if (!empty($list)) {
//            foreach ($list as &$item) {
//                // 时间单位需要从微妙转换成秒
//                if ($item->time) {
//                    $item->time = Common::getDateTime($item->time / 1000);
//                }
//            }

            return $list;
        }
        return array();
	}

//	public static function delPlayer($player_id)
//    {
//        if (!$player_id || !is_numeric($player_id)) {
//            return false;
//        }
//        $db = self::__instance();
//        $condition = array("id" => (int)$player_id);
//        print_r("delPlayer id:" . $player_id);
//        $result = $db->delete(self::getTableName(), $condition);
//        return $result;
//    }
}

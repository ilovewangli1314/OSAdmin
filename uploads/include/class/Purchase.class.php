<?php
if(!defined('ACCESS')) {exit('Access denied.');}

/**
 * 充值数据模型类(使用mongodb)
 * Class Purchase
 */
class Purchase extends Base{
	// 表名
    private static $table_name = 'purchases';
	// 查询字段
	private static $columns = array('id', 'playerID', 'purchaseID', 'purchaseNum', 'purchaseTime');
	//状态定义
	const ACTIVE = 1;
	const DEACTIVE = 0;

    public static function __instance($database = OSA_DB_ID)
    {
        return Base::__instance(GAME_DB_ID);
    }

	public static function getTableName(){
		return self::$table_name;
	}

//    public static function getPlayerById($player_id)
//    {
//        if (!$player_id || !is_numeric($player_id)) {
//            return false;
//        }
//        $db = self::__instance();
//        $where = $player_id ? ['id' => (int)$player_id] : [];
//        $list = $db->select(self::getTableName(), self::$columns, $where);
//
//        if (!empty($list)) {
//            foreach ($list as &$item) {
//                // 时间单位需要从微妙转换成秒
//                if ($item['loginTime']) {
//                    $item['loginTime'] = $item['loginTime'] / 1000;
//                    $item['loginTimeStr'] = DateUtils::getDateStr($item['loginTime']);
//                }
//
//                if ($item['registTime']) {
//                    $item['registTime'] = $item['registTime'] / 1000;
//                    $item['registTimeStr'] = DateUtils::getDateStr($item['registTime']);
//                }
//                // 旧版本时的玩家登录时间字段名为'time'
//                else if ($item['time']) {
//                    $item['time'] = $item['time'] / 1000;
//                    $item['registTimeStr'] = DateUtils::getDateStr($item['time']);
//                }
//
//                if ($item['data'] && $item['data']['key_iap_data'] && $item['data']['key_iap_data']['paySlots']) {
//                    $item['paySlotsStr'] = implode(',', $item['data']['key_iap_data']['paySlots']);
//                }
//            }
//
//            return $list[0];
//        }
//        return null;
//    }

//	public static function getAllPurchases( $start = null, $page_size = null ) {
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
//				$item['login_time'] = DateUtils::getDateStr($item['login_time']);
//			}
//		}
//
//		if ($list) {
//			return $list;
//		}
//		return array ();
//	}

    public static function search($where = null, $start = null, $page_size = null)
    {
        $db = self::__instance();
        $list = $db->select(self::getTableName(), self::$columns, $where, $start, $page_size);
        if (!empty($list)) {
            return $list;
        }
        return array();
	}

    public static function searchByID($purchase_id = null, $start = null, $page_size = null)
    {
        $where = $purchase_id ? ['id' => (int)$purchase_id] : [];
        return Player::search($where, $start, $page_size);
    }

//    public static function updatePlayer($player_id, $player_data)
//    {
//        if (!$player_data || !is_array($player_data)) {
//            return false;
//        }
//        $db = self::__instance();
//        $condition = array("id" => (int)$player_id);
//
//        $id = $db->update(self::getTableName(), $player_data, $condition);
//        return $id;
//    }

//    public static function delPlayer($player_id)
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

    public static function count($condition = [])
    {
        $db = self::__instance();
        $num = $db->count(self::getTableName(), $condition);
        return $num;
    }
}

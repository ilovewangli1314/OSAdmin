<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Base {
	protected static $table_prefix = OSA_TABLE_PREFIX;
	protected static $db_container = array();
	public static function __instance($database=OSA_DB_ID){
		if( @self::$db_container[$database]  == null ){
		    if ($database == GAME_DB_ID) {
                self::$db_container[$database] = new MeMongoDB( $database );
            } else {
                self::$db_container[$database] = new Medoo( $database );
            }

			return self::$db_container[$database];
		}
		return self::$db_container[$database];
	}
}

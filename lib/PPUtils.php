<?php
class PPUtils {
	
	public static function nvpToMap($str) {
		
		$ret = array();		
		$params = explode("&", $str);
		foreach($params as $p) {
			list($k, $v) = explode("=", $p);
			$ret[$k] = $v;
		}
		return $ret;
	}
	
	/**
	 * Returns true if the array contains a key like $key
	 * @param array $map
	 * @param regex $key
	 */
	public static function array_match_key($map, $key) {
		$key = str_replace("(", "\(", $key);
		$key = str_replace(")", "\)", $key);
		$key = str_replace(".", "\.", $key);
		$pattern = "/$key*/";
		foreach($map as $k => $v) {		
			preg_match($pattern, $k, $matches);
			if(count($matches) > 0)
				return true;
		}
		return false;
	}

}
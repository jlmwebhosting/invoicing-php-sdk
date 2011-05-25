<?php
/**
 * Utility class for transforming PHP objects into
 * appropriate service payload type and vice versa
 */
class PPObjectTransformer {	
	
	public function toString($object) {
		
		if( $object == null ) {
			throw new PPTransformerException("Empty object");
		}
		
		$confManager = PPConfigManager::getInstance();
		switch($confManager->get("service.Binding")) {
			case 'soap':
			case 'xml':
			case 'json':
				return "";
			case 'nvp':
			default:
				return $object->toNVPString();
		}		
	}
	
	public function toObject($str) {
		return null;
	}

	private function _isSystemClass($className) {
		$sysClass = array('string', 'long', 'datetime', 'int');
		foreach($sysClass as $c) {
			if(strcasecmp($c, $className))
				return false;
		}
		return true;
	}



	//TODO: permformance test on reflection based & static marshalling routines
	//TODO: Break down into functions to enhance testability
	
	public function toStringRef($object, $prefix="") {
		$ret = "";
		$reflect = new ReflectionClass($object);
		$props   = $reflect->getProperties();
		foreach($props as $prop) {
			$type = $this->_getType($prop);
			// recurse for nested complex types 
			// TODO: Need better check for nested elems
			if( ($value = $prop->getValue($object)) != null) {
				if(is_array($value) && count($value) > 0) {
					$name = $prop->getName();
					$ret .= $this->_serializeArray($name, $value, $prefix);
				} else if(class_exists($type) && !$this->_isSystemClass($type)) {
					$newPrefix = $prefix . $prop->getName() . ".";
					$ret .= $this->toString($prop->getValue($object), $newPrefix);
				} else {				
					$ret .= "$prefix".$prop->getName() . "=" . $prop->getValue($object) . "&";
				}
			}
		}

		return $ret;
	}
	
	public function toNVPString($object, $prefix="") {
		$ret = "";
		$reflect = new ReflectionClass($object);
		$props   = $reflect->getProperties();
		foreach($props as $prop) {
			$type = $this->_getType($prop);
			// recurse for nested complex types 
			// TODO: Need better check for nested elems
			if( ($value = $prop->getValue($object)) != null) {
				if(is_array($value) && count($value) > 0) {
					$name = $prop->getName();
					$ret .= $this->_serializeArray($name, $value, $prefix);
				} else if(class_exists($type) && !$this->_isSystemClass($type)) {
					$newPrefix = $prefix . $prop->getName() . ".";
					$ret .= $this->toString($prop->getValue($object), $newPrefix);
				} else {				
					$ret .= "$prefix".$prop->getName() . "=" . $prop->getValue($object) . "&";
				}
			}
		}

		return $ret;
	}
	

	private function _serializeArray($name, $array, $prefix) {
		if(count($array) == 0)
			return;

		$ret = "";	
		$className = get_class($array[0]);
		if(class_exists($className) && !$this->_isSystemClass($className)) {
			foreach($array as $idx => $elem) {
				$k = $prefix. "$name($idx)";
				$ret .= $this->toString($elem, "$k.");
			}
		} else {
			foreach($array as $idx => $elem) {
				$k = $prefix. "$name($idx)";
				$ret .= "$k=" . $elem  . "&";
			}
		}
		return $ret;
	}

	private function _getType($reflectionProp) {
		$comment = $reflectionProp->getDocComment();
		$ret = preg_match("/.*@var\s+(.*)/", $comment, $type);
		if($ret)
			return $type[1];
		return NULL;
	}

}
?>

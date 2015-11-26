<?php
abstract class Enum {
	private $value;
	
	/**
	 * @param $value Name or value of the constant to represent
	 */
	public function __construct($value) {
		if(is_a($value, get_called_class ())) {
			$this->value = $value->value;
			return;
		}
		$constants = $this->getConstants ();
		if (is_string ( $value )) {
			if (isset ( $constants [$value] )) {
				$this->value = $constants [$value];
				return;
			} else if(!Enum::containsStringValues($constants)) {
				throw new Exception ( "No constant of name $value in Enum " . get_called_class ());
			}
		}
		if (in_array ( $value, $constants )) {
			$this->value = $value;
		} else {
			throw new Exception ( "No constant of value $value in Enum " . get_called_class () );
		}
	}

	public function getValue() {
		return $this->value;
	}

	static public function getConstants() {
		$reflection = new ReflectionClass(get_called_class());
		return $reflection->getConstants();
	}
	
	static private function containsStringValues($array) {
		foreach($array as $value) {
			if(is_string($value))
				return true;
		}
		return false;
	}

	public function __toString() {
		// must not throw from toString
		try {
			return array_flip($this->getConstants())[$this->value];
			// when the value is not in the constants
		} catch(Exception $e) {
			return "Invalid value ".$this->value;
		}
	}
}
function __call($func, $param) {
    $func_prefix = substr($func, 0, 2);
    $func_const = substr($func, 2);

    if ($func_prefix == "is") {
        $reflection = new ReflectionClass(get_class($this));
        return $this->getValue() === $reflection->getConstant($func_const); //${$this::$func_const};
    }
    
}
?>
<?php
abstract class Enum {
	private $value;
	public function __construct($value) {
		$constants = $this->getConstants ();
		if (is_string ( $value )) {
			if (isset ( $constants [$value] )) {
				$this->value = $constants [$value];
			} else {
				throw new Exception ( "No constant of name $value in Enum " . get_called_class () );
			}
		} else {
			if (in_array ( $value, $constants )) {
				$this->value = $value;
			} else {
				throw new Exception ( "No constant of value $value in Enum " . get_called_class () );
			}
		}
	}

	public function getValue() {
		return $this->value;
	}

	static public function getConstants() {
		$reflection = new ReflectionClass(get_called_class());
		return $reflection->getConstants();
	}

	public function __toString() {
		// must not throw from toString
		try {
			return array_flip(getConstants())[$this->$value];
			// when the value is not in the constants
		} catch(Exception $e) {
			return "Invalid value ".$this->$value;
		}
	}
}
?>
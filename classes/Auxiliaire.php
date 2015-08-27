<?php
class Auxiliaire extends Enum{
	const Avoir = 'avoir';
	const Etre = 'être';
	
	function getInfinitiveString() {
		return $this->getValue();
	}
}
?>
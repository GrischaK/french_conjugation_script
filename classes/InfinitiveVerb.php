<?php
class InfinitiveVerb {
	private $infinitiveVerb;
	public function __construct($infinitiveVerb) {
		$this->infinitiveVerb = $infinitiveVerb;
	}

   public function getInfinitiveVerb($verb) {
	return $this->infinitiveVerb;
   }
}
?>
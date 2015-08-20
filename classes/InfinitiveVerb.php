<?php
class InfinitiveVerb {
	private $infinitiveVerb;
	public function __construct($infinitiveVerb) {
		if($infinitiveVerb instanceof InfinitiveVerb) {
			$this->infinitiveVerb = $infinitiveVerb->getInfinitiveVerb();
		} else {
			assert(is_string($infinitiveVerb));
			$this->infinitiveVerb = $infinitiveVerb;
		}
	}

   public function getInfinitiveVerb() {
	return $this->infinitiveVerb;
   }
}
?>
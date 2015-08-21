<?php
class ConjugatedVerb {
	private $conjugatedVerb;
	public function __construct($conjugatedVerb) {
		if($conjugatedVerb instanceof ConjugatedVerb) {
			$this->conjugatedVerb = $conjugatedVerb->getConjugatedVerb();
		} else {
			assert(is_string($conjugatedVerb));
			$this->conjugatedVerb = $conjugatedVerb;
		}
	}

   public function getConjugatedVerb() {
	return $this->conjugatedVerb;
   }
   
   public function __toString() {
   	return $this->conjugatedVerb;
   }
}
?>
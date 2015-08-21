<?php
class ConjugatedVerb {
	private $verb, $mode, $tense, $person;	
	public function __construct(InfinitiveVerb $infinitiveVerb, Mode $mode, Tense $tense, Person $person) {
		$this->mode = $mode;
		$this->tense = $tense;
		$this->person = $person;
	}
	private $conjugatedVerb;
	public function __construct($conjugatedVerb) {
		if($conjugatedVerb instanceof ConjugatedVerb) {
			$this->conjugatedVerb = $conjugatedVerb->getConjugatedVerb();
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
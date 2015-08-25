<?php
class ConjugatedVerb {
	private $conjugatedVerb, $verb, $mode, $tense, $person;
	public function __construct(InfinitiveVerb $infinitiveVerb, Mode $mode, Tense $tense, Person $person) {
		initialize($conjugatedVerb,  $mode,  $tense,  $person);
	}
	protected function initialize($conjugatedVerb,  $mode,  $tense,  $person){
	
		$this->mode = $mode;
		$this->tense = $tense;
		$this->person = $person;
	}	
	public function __toString() {
		return $this->conjugatedVerb;
	}
}
?>
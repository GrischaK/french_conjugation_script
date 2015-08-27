<?php
class ConjugatedAuxiliaireVerb extends ConjugatedVerb {
	private $conjugatedAuxiliaireVerb, $auxiliaire, $infinitiveVerb, $mode, $tense, $person;
	public function __construct(Mode $mode, Tense $tense, Person $person) {
		initialize($conjugatedVerb,  $mode,  $tense,  $person);
	} 
	public function __toString() {
		return $this->conjugatedAuxiliaireVerb;
	}
}//test 2
?>

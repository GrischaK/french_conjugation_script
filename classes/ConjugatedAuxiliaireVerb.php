<?php
class ConjugatedAuxiliaireVerb extends ConjugatedVerb {
	private $conjugatedAuxiliaireVerb, $verb, $mode, $tense, $person;
	public function __construct(Auxiliaire $auxiliaire, Mode $mode, Tense $tense, Person $person) {
		$this->auxiliaire = $auxiliaire; // ???
		$this->mode = $mode;
		$this->tense = $tense;
		$this->person = $person;
	} 
	public function __toString() {
		return $this->conjugatedAuxiliaireVerb;
	}
}
?>
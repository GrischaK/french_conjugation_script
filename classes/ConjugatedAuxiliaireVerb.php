<?php
class ConjugatedAuxiliaireVerb extends ConjugatedVerb {
	private $conjugatedAuxiliaireVerb, $auxiliaire, $verb, $mode, $tense, $person;
	public function __construct(Auxiliaire $auxiliaire, Mode $mode, Tense $tense, Person $person) {
		$this->auxiliaire = $auxiliaire;
		initialize($conjugatedVerb,  $mode,  $tense,  $person);
	} 
	public function __toString() {
		return $this->conjugatedAuxiliaireVerb;
	}
}
?>

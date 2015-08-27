<?php
class ConjugatedAuxiliaireVerb extends ConjugatedVerb {
	private $conjugatedAuxiliaireVerb, $auxiliaire, $infinitiveVerb, $mood, $tense, $person;
	public function __construct(Mood $mood, Tense $tense, Person $person) {
		$this->initialize($conjugatedVerb,  $mood,  $tense,  $person);
	} 
	public function __toString() {
		return $this->conjugatedAuxiliaireVerb;
	}
}
?>

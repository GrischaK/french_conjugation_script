<?php
class ConjugatedAuxiliaireVerb extends ConjugatedVerb {
	public function __construct(Auxiliaire $auxiliaire, Mood $mood, Tense $tense, Person $person) {
		$this->initialize ( $conjugatedVerb, $mood, $tense, $person );
	}
	public function __toString() {
		return $this->conjugatedAuxiliaireVerb;
	}
}
?>

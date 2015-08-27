<?php
class ConjugatedAuxiliaireVerb extends ConjugatedVerb {
	public function __construct(Auxiliaire $auxiliaire, Person $person, Tense $tense, Mood $mood) {
		$this->initialize ( $conjugatedVerb, $mood, $tense, $person );
	}
	public function __toString() {
		return $this->conjugatedAuxiliaireVerb;
	}
}
?>

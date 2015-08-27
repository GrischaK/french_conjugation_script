<?php
class ConjugatedAuxiliaireVerb extends ConjugatedVerb {
	public function __construct(Auxiliaire $auxiliaire, Person $person, Tense $tense, Mood $mood) {
		$conjugatedVerb = conjugated_auxiliaire($auxiliaire, $person, $tense, $mood);
		$this->initialize ( $conjugatedVerb, $mood, $tense, $person );
	}
}
?>

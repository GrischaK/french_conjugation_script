<?php
class ConjugatedAuxiliaireVerb extends ConjugatedVerb {
	public function __construct(Auxiliaire $auxiliaire, Person $person, Tense $tense, Mood $mood, Voice $voice) {
		$infinitiveVerb = new InfinitiveVerb($auxiliaire->getInfinitiveString());
		$conjugatedVerb = conjugated_auxiliaire($auxiliaire, $person, $tense, $mood, $voice);
		$this->initialize ( $conjugatedVerb, $infinitiveVerb, $mood, $tense, $person );
	}
}
?>
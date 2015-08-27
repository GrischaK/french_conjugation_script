<?php
class ConjugatedVerb {
	private $conjugatedVerb, $infinitiveVerb, $mood, $tense, $person;
	public function __construct(InfinitiveVerb $infinitiveVerb, Mood $mood, Tense $tense, Person $person) {
		$conjugatedVerb = conjugate ( $infinitiveVerb, $person, $tense, $mood );
		initialize ( $conjugatedVerb, $mood, $tense, $person );
	}
	protected function initialize($conjugatedVerb, $mood, $tense, $person) {
		$this->mood = $mood;
		$this->tense = $tense;
		$this->person = $person;
	}
	public function __toString() {
		return $this->conjugatedVerb;
	}
}
?>
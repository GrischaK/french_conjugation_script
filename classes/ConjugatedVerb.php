<?php
class ConjugatedVerb {
	private $conjugatedVerb, $infinitiveVerb, $mood, $tense, $person;
	public function __construct(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood) {
		$conjugatedVerb = conjugate ( $infinitiveVerb, $person, $tense, $mood );
		$this->initialize ( $conjugatedVerb, $mood, $tense, $person );
	}
	protected function initialize($conjugatedVerb, $mood, $tense, $person) {
		$this->mood = $mood;
		$this->tense = $tense;
		$this->person = $person;
		$this->conjugatedVerb = $conjugatedVerb;
	}
	public function __toString() {
		return $this->conjugatedVerb;
	}
}
?>
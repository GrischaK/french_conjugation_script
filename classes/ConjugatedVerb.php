<?php
class ConjugatedVerb {
	private $conjugatedVerb, $infinitiveVerb, $mood, $tense, $person;
	public function __construct(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood) {
		$conjugatedVerb = conjugate ( $infinitiveVerb, $person, $tense, $mood );
		$this->initialize ( $conjugatedVerb, $infinitiveVerb, $mood, $tense, $person );
	}
	protected function initialize($conjugatedVerb, InfinitiveVerb $infinitiveVerb, Mood $mood, Tense $tense, Person $person) {
		$this->mood = $mood;
		$this->tense = $tense;
		$this->person = $person;
		$this->conjugatedVerb = $conjugatedVerb;
		$this->infinitiveVerb = $infinitiveVerb;
	}
	
	public function getInfinitive() {
		return $this->infinitiveVerb;
	}
	
	public function __toString() {
		return $this->conjugatedVerb;
	}
}
?>
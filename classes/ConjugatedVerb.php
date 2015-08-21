<?php
class ConjugatedVerb {
	private $conjugatedVerb, $verb, $mode, $tense, $person;
	public function __construct(InfinitiveVerb $verb, Mode $mode, Tense $tense,Person $person) { 
		$this->mode = $mode;
		$this->tense = $tense;
		$this->person = $person;
	}
}
?>
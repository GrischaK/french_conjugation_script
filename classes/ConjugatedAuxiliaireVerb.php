<?php
class ConjugatedAuxiliaireVerb extends ConjugatedVerb {
	private $conjugatedAuxiliaireVerb, $auxiliaire, $verb, $mode, $tense, $person;
	public function __construct(Auxiliaire $auxiliaire, Mode $mode, Tense $tense, Person $person) {
		initialize($conjugatedVerb, $auxiliaire,  $mode,  $tense,  $person);
	} 
	protected function initialize($conjugatedVerb, $auxiliaire,  $mode,  $tense,  $person){
		$this->auxiliaire = $auxiliaire;
		$this->mode = $mode;
		$this->tense = $tense;
		$this->person = $person;		
	} 	
	public function __toString() {
		return $this->conjugatedAuxiliaireVerb;
	}
}
?>

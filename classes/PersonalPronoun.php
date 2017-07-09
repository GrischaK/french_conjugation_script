<?php
class PersonalPronoun {
	private $personal_pronoun;
	public function __construct($personal_pronoun) {
		if($personal_pronoun instanceof PersonalPronoun) {
			$this->personal_pronoun = $personal_pronoun->getPersonalPronoun();
		} else {
			assert(is_string($personal_pronoun));
			$this->personal_pronoun = $personal_pronoun;
		}
	}

   public function getPersonalPronoun() {
	return $this->personal_pronoun;
   }
   
   public function __toString() {
   	return $this->personal_pronoun;
   }
}
?>
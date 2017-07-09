<?php
class ReflexivePronoun {
	private $reflexive_pronoun;
	public function __construct($reflexive_pronoun) {
		if($reflexive_pronoun instanceof ReflexivePronoun) {
			$this->reflexive_pronoun = $reflexive_pronoun->getReflexivePronoun();
		} else {
			assert(is_string($reflexive_pronoun));
			$this->reflexive_pronoun = $reflexive_pronoun;
		}
	}

   public function getReflexivePronoun() {
	return $this->reflexive_pronoun;
   }
   
   public function __toString() {
   	return $this->reflexive_pronoun;
   }
}
?>
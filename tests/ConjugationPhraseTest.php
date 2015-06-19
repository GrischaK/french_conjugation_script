<?php
require_once 'conjugate.php';

class ConjugatePhraseTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider ConjugatePhraseTestProvider
	 */                                          
	public function ConjugatePhraseTest($expectedResult, $verb, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, conjugation_phrase ( $verb, new Person($person), new Tense($tense), new Mood($mood) ) );
	}						
	public function ConjugatePhraseTestProvider() {
		;
		return array (
				array (
						'Je aime',
						'aimer',	
						'FirstPersonSingular',											
						'Present',
						'Indicatif' 
				),
				array (
						'Je donne',
						'donner',
						'Present',
						'FirstPersonSingular',
						'Indicatif' 
				) 
		);		
	}
}
?>
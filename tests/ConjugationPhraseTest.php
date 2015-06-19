<?php
require_once 'conjugate.php';

class ConjugatePhraseTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider ConjugatePhraseTestProvider
	 */                                          
	public function testConjugatePhrase($expectedResult, $verb, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, conjugation_phrase ( $verb, new Person($person), new Tense($tense), new Mood($mood) ) );
	}						
	public function ConjugatePhraseTestProvider() {
		;
		return array (
				array (
						'je ai aime',
						'aimer',
						'Passe_compose',
						'FirstPersonSingular',
						'Indicatif'
				),				
				array (
						'je aime',
						'aimer',	
						'Present',						
						'FirstPersonSingular',											
						'Indicatif' 
				),			
				array (
						'je donne',
						'donner',
						'Present',
						'FirstPersonSingular',
						'Indicatif' 
				) 
		);		
	}
}
?>
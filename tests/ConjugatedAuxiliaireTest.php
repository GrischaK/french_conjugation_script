<?php
require_once 'conjugate.php';
class ConjugatedAuxiliaireTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider testConjugatedAuxiliaireProvider
	 */                
			     
	public function testConjugatedAuxiliaire($expectedResult, $auxiliaire, $person, $tense, $mood) {
	$this->assertEquals ( $expectedResult, conjugated_auxiliaire ($auxiliaire, new Person ($person), new Tense ($tense), new Mood ($mood)));

	}                                                          
	public function testConjugatedAuxiliaireProvider() {
		return array (
				array (
						'suis',						
						'Etre',
						'Present',
						'FirstPersonSingular',
						'Indicatif'	
				),				
				array (
						'ai',
						'Avoir',
						'Present',
						'FirstPersonSingular',
						'Indicatif'							
				) 
		);
	}
	
	/**
	 * @dataProvider AuxiliaireVerbProvider
	 */
	public function testAuxiliaireVerb($expectedResult, $auxiliaire, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, conjugated_auxiliaire ( $auxiliaire, new Person ( $person ), new Tense ( $tense ), new Mood ( $mood ) ) );
	}
	public function AuxiliaireVerbProvider() {
		return array (
				array (
						"suis",
						Auxiliaire::Etre,
						'Passe_compose',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						"es",
						Auxiliaire::Etre,
						'Passe_compose',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						"est",
						Auxiliaire::Etre,
						'Passe_compose',
						'ThirdPersonSingular',
						'Indicatif'
				),
				array (
						"sommes",
						Auxiliaire::Etre,
						'Passe_compose',
						'FirstPersonPlural',
						'Indicatif'
				),
				array (
						"êtes",
						Auxiliaire::Etre,
						'Passe_compose',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (
						"sont",
						Auxiliaire::Etre,
						'Passe_compose',
						'ThirdPersonPlural',
						'Indicatif'
				),
				array (
						"ai",
						Auxiliaire::Avoir,
						'Passe_compose',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						"as",
						Auxiliaire::Avoir,
						'Passe_compose',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						"a",
						Auxiliaire::Avoir,
						'Passe_compose',
						'ThirdPersonSingular',
						'Indicatif'
				),
				array (
						"avons",
						Auxiliaire::Avoir,
						'Passe_compose',
						'FirstPersonPlural',
						'Indicatif'
				),
				array (
						"avez",
						Auxiliaire::Avoir,
						'Passe_compose',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (
						"ont",
						Auxiliaire::Avoir,
						'Passe_compose',
						'ThirdPersonPlural',
						'Indicatif'
				)
		);
}

}
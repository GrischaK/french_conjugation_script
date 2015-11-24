<?php
require_once '../conjugate.php';

class ConjugatePhraseTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider ConjugatePhraseTestProvider
	 */                                          
	public function testConjugatePhrase($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, (string)conjugation_phrase ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
  
	}						
	public function ConjugatePhraseTestProvider() {
		;
		return array (
				array (
						'j’ai aimé',
						'aimer',
						'Passe_compose',
						'FirstPersonSingular',
						'Indicatif'
				),	
				array (
						'je suis amusé',
						'amuser',
						'Passe_compose',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'ils sont amusés',
						'amuser',
						'Passe_compose',
						'ThirdPersonPlural',
						'Indicatif'
				),
				array (
						'j’aime',
						'aimer',	
						'Present',
						'FirstPersonSingular',
						'Indicatif' 
				),	
				array (
						'j’habilite',
						'habiliter',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'je hérisse',
						'hérisser',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'je finis',
						'finir',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'que j’aime',
						'aimer',
						'Present',
						'FirstPersonSingular',
						'Subjonctif'
				),		
				array ( 
						'aime',
						'aimer',
						'Present',
						'SecondPersonSingular',
						'Imperatif'
				),
				array (
						'aimons',
						'aimer',
						'Present',
						'FirstPersonPlural',
						'Imperatif'
				),
				array (
						'aimez',
						'aimer',
						'Present',
						'SecondPersonPlural',
						'Imperatif'
				),	
				array (
						'aie aimé',
						'aimer',
						'Passe',
						'SecondPersonSingular',
						'Imperatif'
				),
				array ( 
						'ayons aimé',
						'aimer',
						'Passe',
						'FirstPersonPlural',
						'Imperatif'
				),
				array ( 
						'ayez aimé',
						'aimer',
						'Passe',
						'SecondPersonPlural',
						'Imperatif'
				),
				array (
						'je donne',
						'donner',
						'Present',
						'FirstPersonSingular',
						'Indicatif' 
				), 
				array (
						'je vais donner',
						'donner',
						'Futur_compose',
						'FirstPersonSingular',
						'Indicatif'
				)
		);		
	}
}
?>
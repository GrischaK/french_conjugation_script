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
		return [
				[
						'j’ai aimé',
						'aimer',
						'Passe_compose',
						'FirstPersonSingular',
						'Indicatif'
				],	
				[
						'je suis amusé',
						'amuser',
						'Passe_compose',
						'FirstPersonSingular',
						'Indicatif'
				],
				[
						'ils sont amusés',
						'amuser',
						'Passe_compose',
						'ThirdPersonPlural',
						'Indicatif'
				],
				[
						'j’aime',
						'aimer',	
						'Present',
						'FirstPersonSingular',
						'Indicatif' 
				],	
				[
						'j’habilite',
						'habiliter',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				],
				[
						'je hérisse',
						'hérisser',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				],
				[
						'je finis',
						'finir',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				],
				[
						'que j’aime',
						'aimer',
						'Present',
						'FirstPersonSingular',
						'Subjonctif'
				],		
				[ 
						'aime',
						'aimer',
						'Present',
						'SecondPersonSingular',
						'Imperatif'
				],
				[
						'aimons',
						'aimer',
						'Present',
						'FirstPersonPlural',
						'Imperatif'
				],
				[
						'aimez',
						'aimer',
						'Present',
						'SecondPersonPlural',
						'Imperatif'
				],	
				[
						'aie aimé',
						'aimer',
						'Passe',
						'SecondPersonSingular',
						'Imperatif'
				],
				[ 
						'ayons aimé',
						'aimer',
						'Passe',
						'FirstPersonPlural',
						'Imperatif'
				],
				[ 
						'ayez aimé',
						'aimer',
						'Passe',
						'SecondPersonPlural',
						'Imperatif'
				],
				[
						'je donne',
						'donner',
						'Present',
						'FirstPersonSingular',
						'Indicatif' 
				], 
				[
						'je vais donner',
						'donner',
						'Futur_compose',
						'FirstPersonSingular',
						'Indicatif'
				]
		];		
	}
}
?>
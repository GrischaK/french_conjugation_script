<?php
require_once 'conjugate.php';
require_once 'print.php';
class PrintTest extends PHPUnit_Framework_TestCase {


	/**
	 * @dataProvider PrintProvider
	 */
	public function testPrint($expectedResult, $verb, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, print_conjugations_of_verb ( $verb ) );
	}                                                               
	public function PrintProvider() {
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
						'FirstPersonSingular',
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
						'FirstPersonSingular',
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

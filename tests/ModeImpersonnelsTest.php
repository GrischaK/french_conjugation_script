<?php
require_once 'conjugate.php';
class ModeImpersonnelsTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider modeImpersonnelsTestProvider
	 */
	public function testModeImpersonnels($expectedResult, $verb, $auxiliaire, $mode, $tense) {
		$this->assertEquals ( $expectedResult, modes_impersonnels ( $verb, new Auxiliaire ( $auxiliaire ), new Mode ( $mode ), new Tense ( $tense ) ) );
	}
	public function modeImpersonnelsTestProvider() {
		;
		return array (
				array (
						'aimer',
						'aimer',						
						Auxiliaire::Avoir,
						'Infinitif',
						'Present',
				),
				array (
						'avoir aimé',
						'aimer',						
						Auxiliaire::Avoir,
						'Infinitif',
						'Passe',
				),
				array (
						'en aimant',
						'aimer',						
						Auxiliaire::Avoir,
						'Gerondif',
						'Present',
				),
				array (
						'en ayant aimé',
						'aimer',						
						Auxiliaire::Avoir,
						'Gerondif',
						'Passe',
				),
				array (
						'aimant',
						'aimer',						
						Auxiliaire::Avoir,
						'Participe',
						'Present',
				),
				array (
						'aimé',
						'aimer',						
						Auxiliaire::Avoir,
						'Participe',
						'Passe',
				),
				
				array (
						'amuser',
						'amuser',						
						Auxiliaire::Etre,
						'Infinitif',
						'Present',
				),
				array (
						'être amusé',
						'amuser',						
						Auxiliaire::Etre,
						'Infinitif',
						'Passe',
				),
				array (
						'en amusant',
						'amuser',						
						Auxiliaire::Etre,
						'Gerondif',
						'Present',
				),
				array (
						'en étant amusé',
						'amuser',						
						Auxiliaire::Etre,
						'Gerondif',
						'Passe',
				),
				array (
						'amusant',
						'amuser',						
						Auxiliaire::Etre,
						'Participe',
						'Present',
				),
				array (
						'amusé',
						'amuser',						
						Auxiliaire::Etre,
						'Participe',
						'Passe',
				) 
		);
	}
}
?>

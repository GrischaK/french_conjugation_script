<?php
require_once 'conjugate.php';
class ModeImpersonnelsTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider modeImpersonnelsTestProvider
	 */
	public function testModeImpersonnels($expectedResult, $verb, $auxiliaire, $mode, $tense, $mood) {
		$this->assertEquals ( $expectedResult, modes_impersonnels ( $verb, new Auxiliaire ( $auxiliaire ), new Mode ( $mode ), new Tense ( $tense ), new Mood ( $mood ) ) );
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
						'Modes_impersonnels' 
				),
				array (
						'avoir aimé',
						'aimer',						
						Auxiliaire::Avoir,
						'Infinitif',
						'Passe',
						'Modes_impersonnels' 
				),
				array (
						'en aimant',
						'aimer',						
						Auxiliaire::Avoir,
						'Gerondif',
						'Present',
						'Modes_impersonnels' 
				),
				array (
						'en ayant aimé',
						'aimer',						
						Auxiliaire::Avoir,
						'Gerondif',
						'Passe',
						'Modes_impersonnels' 
				),
				array (
						'aimant',
						'aimer',						
						Auxiliaire::Avoir,
						'Participe',
						'Present',
						'Modes_impersonnels' 
				),
				array (
						'aimé',
						'aimer',						
						Auxiliaire::Avoir,
						'Participe',
						'Passe',
						'Modes_impersonnels' 
				),
				
				array (
						'amuser',
						'amuser',						
						Auxiliaire::Etre,
						'Infinitif',
						'Present',
						'Modes_impersonnels' 
				),
				array (
						'être amusé',
						'amuser',						
						Auxiliaire::Etre,
						'Infinitif',
						'Passe',
						'Modes_impersonnels' 
				),
				array (
						'en amusant',
						'amuser',						
						Auxiliaire::Etre,
						'Gerondif',
						'Present',
						'Modes_impersonnels' 
				),
				array (
						'en étant amusé',
						'amuser',						
						Auxiliaire::Etre,
						'Gerondif',
						'Passe',
						'Modes_impersonnels' 
				),
				array (
						'amusant',
						'amuser',						
						Auxiliaire::Etre,
						'Participe',
						'Present',
						'Modes_impersonnels' 
				),
				array (
						'amusé',
						'amuser',						
						Auxiliaire::Etre,
						'Participe',
						'Passe',
						'Modes_impersonnels' 
				) 
		);
	}
}
?>

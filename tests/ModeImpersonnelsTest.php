<?php
require_once 'conjugate.php';

class ModeImpersonnelsTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider modeImpersonnelsTestProvider
	 */
	public function testModeImpersonnels($expectedResult, $verb, $mode, $tense, $mood) {
		$this->assertEquals ( $expectedResult, conjugate ( $verb, new Mode($mode), new Tense($tense), new Mood($mood) ) );
	}						
	public function modeImpersonnelsTestProvider() {
		;
		return array (			
				array (
						'aimer',						
						'aimer',
						'Infinitif',
						'Present',
						'Modes_impersonnels' 
				),	
				array (
						'avoir aimé',						
						'aimer',
						'Infinitif',
						'Passe',
						'Modes_impersonnels' 
				),	
				array (
						'en aimant',
						'aimer',
						'Gerondif',
						'Present',
						'Modes_impersonnels'
				),
				array (
						'en ayant aimé',
						'aimer',
						'Gerondif',
						'Passe',
						'Modes_impersonnels'
				),	
				array (
						'aimant',
						'aimer',
						'Participe',
						'Present',
						'Modes_impersonnels'
				),
				array (
						'aimé',
						'aimer',
						'Participe',
						'Passe',
						'Modes_impersonnels'
				),							
	

				array (
						'amuser',
						'amuser',
						'Infinitif',
						'Present',
						'Modes_impersonnels'
				),
				array (
						'être amusé',
						'amuser',
						'Infinitif',
						'Passe',
						'Modes_impersonnels'
				),
				array (
						'en amusant',
						'amuser',
						'Gerondif',
						'Present',
						'Modes_impersonnels'
				),
				array (
						'en étant amusé',
						'amuser',
						'Gerondif',
						'Passe',
						'Modes_impersonnels'
				),
				array (
						'amusant',
						'amuser',
						'Participe',
						'Present',
						'Modes_impersonnels'
				),
				array (
						'amusé',
						'amuser',
						'Participe',
						'Passe',
						'Modes_impersonnels'
				)				
		);		
	}
}
?>

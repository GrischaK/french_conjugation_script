<?php
require_once '../conjugate.php';
class ModeImpersonnelsTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider modeImpersonnelsTestProvider
	 */
	public function testModeImpersonnels($expectedResult, $infinitiveVerb, $auxiliaire, $mode, $tense, $gender) {
		$this->assertEquals ( $expectedResult, modes_impersonnels ( new InfinitiveVerb( $infinitiveVerb), new Auxiliaire ( $auxiliaire ), new Mode ( $mode ), new Tense ( $tense ), new Gender ( $gender ) ) );
	}
	public function modeImpersonnelsTestProvider() {
		;
		return [
				[
						'aimer',
						'aimer',
						Auxiliaire::Avoir,
						'Infinitif',
						'Present',
						Gender::Masculine,						
				],
				[
						'avoir aimé',
						'aimer',
						Auxiliaire::Avoir,
						'Infinitif',
						'Passe',
						Gender::Masculine,							
				],
				[
						'en aimant',
						'aimer',
						Auxiliaire::Avoir,
						'Gerondif',
						'Present',
						Gender::Masculine,							
				],
				[
						'en ayant aimé',
						'aimer',
						Auxiliaire::Avoir,
						'Gerondif',
						'Passe',
						Gender::Masculine,							
				],
				[
						'aimant',
						'aimer',
						Auxiliaire::Avoir,
						'Participe',
						'Present',
						Gender::Masculine,							
				],
				[
						'aimé',
						'aimer',
						Auxiliaire::Avoir,
						'Participe',
						'Passe',
						Gender::Masculine,							
				],
				
				[
						'amuser',
						'amuser',
						Auxiliaire::Etre,
						'Infinitif',
						'Present',
						Gender::Masculine,							
				],
				[
						'être amusé',
						'amuser',
						Auxiliaire::Etre,
						'Infinitif',
						'Passe',
						Gender::Masculine,							
				],
				[
						'être amusée',
						'amuser',
						Auxiliaire::Etre,
						'Infinitif',
						'Passe',
						Gender::Feminine,							
				],				
				[
						'en amusant',
						'amuser',
						Auxiliaire::Etre,
						'Gerondif',
						'Present',
						Gender::Masculine,							
				],
				[
						'en étant amusé',
						'amuser',
						Auxiliaire::Etre,
						'Gerondif',
						'Passe',
						Gender::Masculine,							
				],
				[
						'en étant amusée',
						'amuser',
						Auxiliaire::Etre,
						'Gerondif',
						'Passe',
						Gender::Feminine,							
				],				
				[
						'amusant',
						'amuser',
						Auxiliaire::Etre,
						'Participe',
						'Present',
						Gender::Masculine,							
				],
				[
						'amusé',
						'amuser',
						Auxiliaire::Etre,
						'Participe',
						'Passe',
						Gender::Masculine,							
				],
				[
						'amusée',
						'amuser',
						Auxiliaire::Etre,
						'Participe',
						'Passe',
						Gender::Feminine,							
				]				
		];
	}
}
?>

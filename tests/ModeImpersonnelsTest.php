<?php
require_once '../conjugate.php';
class ModeImpersonnelsTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider modeImpersonnelsTestProvider
	 */
	public function testModeImpersonnels($expectedResult, $infinitiveVerb, $auxiliaire, $mode, $tense) {
		$this->assertEquals ( $expectedResult, modes_impersonnels ( new InfinitiveVerb( $infinitiveVerb), new Auxiliaire ( $auxiliaire ), new Mode ( $mode ), new Tense ( $tense ) ) );
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
				],
				[
						'avoir aimé',
						'aimer',
						Auxiliaire::Avoir,
						'Infinitif',
						'Passe',
				],
				[
						'en aimant',
						'aimer',
						Auxiliaire::Avoir,
						'Gerondif',
						'Present',
				],
				[
						'en ayant aimé',
						'aimer',
						Auxiliaire::Avoir,
						'Gerondif',
						'Passe',
				],
				[
						'aimant',
						'aimer',
						Auxiliaire::Avoir,
						'Participe',
						'Present',
				],
				[
						'aimé',
						'aimer',
						Auxiliaire::Avoir,
						'Participe',
						'Passe',
				],
				
				[
						'amuser',
						'amuser',
						Auxiliaire::Etre,
						'Infinitif',
						'Present',
				],
				[
						'être amusé',
						'amuser',
						Auxiliaire::Etre,
						'Infinitif',
						'Passe',
				],
				[
						'en amusant',
						'amuser',
						Auxiliaire::Etre,
						'Gerondif',
						'Present',
				],
				[
						'en étant amusé',
						'amuser',
						Auxiliaire::Etre,
						'Gerondif',
						'Passe',
				],
				[
						'amusant',
						'amuser',
						Auxiliaire::Etre,
						'Participe',
						'Present',
				],
				[
						'amusé',
						'amuser',
						Auxiliaire::Etre,
						'Participe',
						'Passe',
				] 
		];
	}
}
?>

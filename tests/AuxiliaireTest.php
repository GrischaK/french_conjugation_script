<?php
require_once '../conjugate.php';
class AuxiliaireTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider regularAuxiliaireProvider
	 */
	public function testAuxiliaire($expectedResult, $infinitiveVerb) {
	$this->assertEquals ( new Auxiliaire($expectedResult), finding_auxiliaire (new InfinitiveVerb($infinitiveVerb)));
	}
	public function regularAuxiliaireProvider() {
		return [
				[
						 'Etre',
						'accourir' 
				] 
		];
	}
	
	/**
	 * @dataProvider AuxiliaireVerbProvider
	 */
	public function testAuxiliaireVerb($expectedResult, $auxiliaire, $tense, $person, $mood, $voice) {
		$this->assertEquals ( $expectedResult, conjugated_auxiliaire ( new Auxiliaire ( $auxiliaire ), new Person ( $person ), new Tense ( $tense ), new Mood ( $mood ), new Voice ( $voice ) ) );
	}
	public function AuxiliaireVerbProvider() {
		return [
				[
						"suis",
						Auxiliaire::Etre,
						'Passe_compose',
						'FirstPersonSingular',
						'Indicatif',
						Voice::Active,							
				],
				[
						"es",
						Auxiliaire::Etre,
						'Passe_compose',
						'SecondPersonSingular',
						'Indicatif',
						Voice::Active,	
				],
				[
						"est",
						Auxiliaire::Etre,
						'Passe_compose',
						'ThirdPersonSingular',
						'Indicatif',
						Voice::Active,						
				],
				[
						"sommes",
						Auxiliaire::Etre,
						'Passe_compose',
						'FirstPersonPlural',
						'Indicatif',
						Voice::Active,
				],
				[
						"êtes",
						Auxiliaire::Etre,
						'Passe_compose',
						'SecondPersonPlural',
						'Indicatif',
						Voice::Active,
				],
				[
						"sont",
						Auxiliaire::Etre,
						'Passe_compose',
						'ThirdPersonPlural',
						'Indicatif',
						Voice::Active,
				],
				[
						"ai",
						Auxiliaire::Avoir,
						'Passe_compose',
						'FirstPersonSingular',
						'Indicatif',
						Voice::Active,
				],
				[
						"as",
						Auxiliaire::Avoir,
						'Passe_compose',
						'SecondPersonSingular',
						'Indicatif',
						Voice::Active,
				],
				[
						"a",
						Auxiliaire::Avoir,
						'Passe_compose',
						'ThirdPersonSingular',
						'Indicatif',
						Voice::Active,
				],
				[
						"avons",
						Auxiliaire::Avoir,
						'Passe_compose',
						'FirstPersonPlural',
						'Indicatif',
						Voice::Active,
				],
				[
						"avez",
						Auxiliaire::Avoir,
						'Passe_compose',
						'SecondPersonPlural',
						'Indicatif',
						Voice::Active,
				],
				[
						"ont",
						Auxiliaire::Avoir,
						'Passe_compose',
						'ThirdPersonPlural',
						'Indicatif',
						Voice::Active,
				]
		];
}

}



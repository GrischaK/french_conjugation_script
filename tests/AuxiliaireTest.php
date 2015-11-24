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
	public function testAuxiliaireVerb($expectedResult, $auxiliaire, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, conjugated_auxiliaire ( new Auxiliaire ( $auxiliaire ), new Person ( $person ), new Tense ( $tense ), new Mood ( $mood ) ) );
	}
	public function AuxiliaireVerbProvider() {
		return [
				[
						"suis",
						Auxiliaire::Etre,
						'Passe_compose',
						'FirstPersonSingular',
						'Indicatif'
				],
				[
						"es",
						Auxiliaire::Etre,
						'Passe_compose',
						'SecondPersonSingular',
						'Indicatif'
				],
				[
						"est",
						Auxiliaire::Etre,
						'Passe_compose',
						'ThirdPersonSingular',
						'Indicatif'
				],
				[
						"sommes",
						Auxiliaire::Etre,
						'Passe_compose',
						'FirstPersonPlural',
						'Indicatif'
				],
				[
						"êtes",
						Auxiliaire::Etre,
						'Passe_compose',
						'SecondPersonPlural',
						'Indicatif'
				],
				[
						"sont",
						Auxiliaire::Etre,
						'Passe_compose',
						'ThirdPersonPlural',
						'Indicatif'
				],
				[
						"ai",
						Auxiliaire::Avoir,
						'Passe_compose',
						'FirstPersonSingular',
						'Indicatif'
				],
				[
						"as",
						Auxiliaire::Avoir,
						'Passe_compose',
						'SecondPersonSingular',
						'Indicatif'
				],
				[
						"a",
						Auxiliaire::Avoir,
						'Passe_compose',
						'ThirdPersonSingular',
						'Indicatif'
				],
				[
						"avons",
						Auxiliaire::Avoir,
						'Passe_compose',
						'FirstPersonPlural',
						'Indicatif'
				],
				[
						"avez",
						Auxiliaire::Avoir,
						'Passe_compose',
						'SecondPersonPlural',
						'Indicatif'
				],
				[
						"ont",
						Auxiliaire::Avoir,
						'Passe_compose',
						'ThirdPersonPlural',
						'Indicatif'
				]
		];
}

}



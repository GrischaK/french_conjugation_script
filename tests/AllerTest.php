<?php
require_once '../conjugate.php';
class AllerTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider AllerTestProvider
	 */
	public function testAller($expectedResult, $person,$tense,$mood) {
		$this->assertEquals ( $expectedResult, aller(new Person($person), new Tense($tense), new Mood($mood)));
	}
	public function AllerTestProvider() {
		return [
				[
						'vais',
						'FirstPersonSingular',
						'Futur_compose',
						'Indicatif',
				],
				[
						'vas',
						'SecondPersonSingular',
						'Futur_compose',
						'Indicatif',
				],
				[
						'va',
						'ThirdPersonSingular',
						'Futur_compose',
						'Indicatif',
				],
				[
						'allons',
						'FirstPersonPlural',
						'Futur_compose',
						'Indicatif',
				],
				[
						'allez',
						'SecondPersonPlural',
						'Futur_compose',
						'Indicatif',
				],
				[
						'vont',
						'ThirdPersonPlural',
						'Futur_compose',
						'Indicatif',
				]
		];
	}
}


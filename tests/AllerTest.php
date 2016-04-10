<?php
require_once '../conjugate.php';
class AllerTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider AllerTestProvider
	 */
	public function testAller($expectedResult, $person,$tense,$mood, $voice) {
		$this->assertEquals ( $expectedResult, aller(new Person($person), new Tense($tense), new Mood($mood), new Voice($voice)));
	}
	public function AllerTestProvider() {
		return [
				[
						'vais',
						'FirstPersonSingular',
						'Futur_compose',
						'Indicatif',
						Voice::Active,						
				],
				[
						'vas',
						'SecondPersonSingular',
						'Futur_compose',
						'Indicatif',
						Voice::Active,						
				],
				[
						'va',
						'ThirdPersonSingular',
						'Futur_compose',
						'Indicatif',
						Voice::Active,						
				],
				[
						'allons',
						'FirstPersonPlural',
						'Futur_compose',
						'Indicatif',
						Voice::Active,						
				],
				[
						'allez',
						'SecondPersonPlural',
						'Futur_compose',
						'Indicatif',
						Voice::Active,						
				],
				[
						'vont',
						'ThirdPersonPlural',
						'Futur_compose',
						'Indicatif',
						Voice::Active,						
				]
		];
	}
}


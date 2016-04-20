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
						Person::FirstPersonSingular,
						Tense::Futur_compose,
						Mood::Indicatif,
						Voice::Active,						
				],
				[
						'vas',
						Person::SecondPersonSingular,
						Tense::Futur_compose,
						Mood::Indicatif,
						Voice::Active,						
				],
				[
						'va',
						Person::ThirdPersonSingular,
						Tense::Futur_compose,
						Mood::Indicatif,
						Voice::Active,						
				],
				[
						'allons',
						Person::FirstPersonPlural,
						Tense::Futur_compose,
						Mood::Indicatif,
						Voice::Active,						
				],
				[
						'allez',
						Person::SecondPersonPlural,
						Tense::Futur_compose,
						Mood::Indicatif,
						Voice::Active,						
				],
				[
						'vont',
						Person::ThirdPersonPlural,
						Tense::Futur_compose,
						Mood::Indicatif,
						Voice::Active,						
				]
		];
	}
}


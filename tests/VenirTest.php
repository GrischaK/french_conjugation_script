<?php
require_once '../conjugate.php';
class VenirTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider VenirTestProvider
	 */
	public function testVenir($expectedResult, $person,$tense,$mood, $voice) {
		$this->assertEquals ( $expectedResult, venir(new Person($person), new Tense($tense), new Mood($mood), new Voice($voice)));
	}
	public function VenirTestProvider() {
		return [
				[
						'viens',
						Person::FirstPersonSingular,
						Tense::Passe_recent,
						Mood::Indicatif,
						Voice::Active,						
				],
				[
						'viens',
						Person::SecondPersonSingular,
						Tense::Passe_recent,
						Mood::Indicatif,
						Voice::Active,						
				],
				[
						'vient',
						Person::ThirdPersonSingular,
						Tense::Passe_recent,
						Mood::Indicatif,
						Voice::Active,						
				],
				[
						'venons',
						Person::FirstPersonPlural,
						Tense::Passe_recent,
						Mood::Indicatif,
						Voice::Active,						
				],
				[
						'venez',
						Person::SecondPersonPlural,
						Tense::Passe_recent,
						Mood::Indicatif,
						Voice::Active,						
				],
				[
						'viennent',
						Person::ThirdPersonPlural,
						Tense::Passe_recent,
						Mood::Indicatif,
						Voice::Active,						
				]
		];
	}
}


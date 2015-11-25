<?php
require_once '../conjugate.php';
class ReflexivePronounTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider ReflexivePronounProvider
	 */
	public function testReflexivePronoun($expectedResult, $person, $mood) {
		$this->assertEquals ( $expectedResult, reflexive_pronoun(new Person($person), new Mood($mood)));
	}
	public function ReflexivePronounProvider() {
		return [
				[
						'me',
						'FirstPersonSingular',
						'Indicatif',
				],
				[
						'te',
						'SecondPersonSingular',
						'Indicatif',
				],
				[
						'se',
						'ThirdPersonSingular',
						'Indicatif',
				],
				[
						'nous',
						'FirstPersonPlural',
						'Indicatif',
				],
				[
						'vous',
						'SecondPersonPlural',
						'Indicatif',
				],
				[
						'se',
						'ThirdPersonPlural',
						'Indicatif',
				]
		];
	}
}
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
		return array (
				array (
						'me',
						'FirstPersonSingular',
						'Indicatif',
				),
				array (
						'te',
						'SecondPersonSingular',
						'Indicatif',
				),
				array (
						'se',
						'ThirdPersonSingular',
						'Indicatif',
				),
				array (
						'nous',
						'FirstPersonPlural',
						'Indicatif',
				),
				array (
						'vous',
						'SecondPersonPlural',
						'Indicatif',
				),
				array (
						'se',
						'ThirdPersonPlural',
						'Indicatif',
				)
		);
	}
}
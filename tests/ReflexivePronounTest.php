<?php
require_once 'conjugate.php';
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
						'je me',
						'FirstPersonSingular',
						'Indicatif',
				),
				array (
						'tu te',
						'SecondPersonSingular',
						'Indicatif',
				),
				array (
						'il se',
						'ThirdPersonSingular',
						'Indicatif',
				),
				array (
						'nous nous',
						'FirstPersonPlural',
						'Indicatif',
				),
				array (
						'vous vous',
						'SecondPersonPlural',
						'Indicatif',
				),
				array (
						'ils se',
						'ThirdPersonPlural',
						'Indicatif',
				),
				array (
						'que je me',
						'FirstPersonSingular',
						'Subjonctif',
				),
				array (
						'que tu te',
						'SecondPersonSingular',
						'Subjonctif',
				),
				array (
						'qu’il se',
						'ThirdPersonSingular',
						'Subjonctif',
				),
				array (
						'que nous nous',
						'FirstPersonPlural',
						'Subjonctif',
				),
				array (
						'que vous vous',
						'SecondPersonPlural',
						'Subjonctif',
				),
				array (
						'qu’ils se',
						'ThirdPersonPlural',
						'Subjonctif',
				)
				
		);
	}
}
<?php
require_once '../conjugate.php';
class MergePronounTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider MergePronounProvider
	 */
	public function testMergePronoun($expectedResult, $person, $mood) {
		$this->assertEquals ( $expectedResult, merge_pronoun(new Person($person), new Mood($mood)));
	}
	public function MergePronounProvider() {
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
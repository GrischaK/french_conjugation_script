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
		return [
				[
						'je me',
						'FirstPersonSingular',
						'Indicatif',
				],
				[
						'tu te',
						'SecondPersonSingular',
						'Indicatif',
				],
				[
						'il se',
						'ThirdPersonSingular',
						'Indicatif',
				],
				[
						'nous nous',
						'FirstPersonPlural',
						'Indicatif',
				],
				[
						'vous vous',
						'SecondPersonPlural',
						'Indicatif',
				],
				[
						'ils se',
						'ThirdPersonPlural',
						'Indicatif',
				],
				[
						'que je me',
						'FirstPersonSingular',
						'Subjonctif',
				],
				[
						'que tu te',
						'SecondPersonSingular',
						'Subjonctif',
				],
				[
						'qu’il se',
						'ThirdPersonSingular',
						'Subjonctif',
				],
				[
						'que nous nous',
						'FirstPersonPlural',
						'Subjonctif',
				],
				[
						'que vous vous',
						'SecondPersonPlural',
						'Subjonctif',
				],
				[
						'qu’ils se',
						'ThirdPersonPlural',
						'Subjonctif',
				]

		];
	}
}
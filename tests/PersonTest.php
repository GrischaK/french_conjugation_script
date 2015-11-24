<?php
require_once '../conjugate.php';
class PersonTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider PersonTestProvider
	 */
	public function testPerson($expectedResult, $person, $mood) {
		$this->assertEquals ( $expectedResult, personal_pronoun(new Person($person), new Mood($mood)));
	}
	public function PersonTestProvider() {
		return [
				[
						'je',
						'FirstPersonSingular',
						'Indicatif',
				],
				[
						'tu',
						'SecondPersonSingular',
						'Indicatif',
				],
				[
						'il',
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
						'ils',
						'ThirdPersonPlural',
						'Indicatif',
				],
				[
						'que je',
						'FirstPersonSingular',
						'Subjonctif',
				],
				[
						'que tu',
						'SecondPersonSingular',
						'Subjonctif',
				],
				[
						'qu’il',
						'ThirdPersonSingular',
						'Subjonctif',
				],
				[
						'que nous',
						'FirstPersonPlural',
						'Subjonctif',
				],
				[
						'que vous',
						'SecondPersonPlural',
						'Subjonctif',
				],
				[
						'qu’ils',
						'ThirdPersonPlural',
						'Subjonctif',
				]
				
		];
	}
}
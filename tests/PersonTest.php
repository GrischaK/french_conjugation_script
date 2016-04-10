<?php
require_once '../conjugate.php';
class PersonTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider PersonTestProvider
	 */
	public function testPerson($expectedResult, $person, $gender, $mood) {
		$this->assertEquals ( $expectedResult, personal_pronoun(new Person($person), new Gender($gender), new Mood($mood)));
	}
	public function PersonTestProvider() {
		return [
				[
						'je',
						'FirstPersonSingular',
						'Masculine',						
						'Indicatif',						
				],
				[
						'tu',
						'SecondPersonSingular',
						'Masculine',
						'Indicatif',
				],
				[
						'il',
						'ThirdPersonSingular',
						'Masculine',
						'Indicatif',
				],
				[
						'elle',
						'ThirdPersonSingular',
						'Feminine',
						'Indicatif',
				],				
				[
						'nous',
						'FirstPersonPlural',
						'Masculine',
						'Indicatif',
				],
				[
						'vous',
						'SecondPersonPlural',
						'Masculine',						
						'Indicatif',
				],
				[
						'ils',
						'ThirdPersonPlural',
						'Masculine',						
						'Indicatif',
				],
				[
						'elles',
						'ThirdPersonPlural',
						'Feminine',
						'Indicatif',
				],					
				[
						'que je',
						'FirstPersonSingular',
						'Masculine',						
						'Subjonctif',
				],
				[
						'que tu',
						'SecondPersonSingular',
						'Masculine',						
						'Subjonctif',
				],
				[
						'qu’il',
						'ThirdPersonSingular',
						'Masculine',						
						'Subjonctif',
				],
				[
						'que nous',
						'FirstPersonPlural',
						'Masculine',						
						'Subjonctif',
				],
				[
						'que vous',
						'SecondPersonPlural',
						'Masculine',						
						'Subjonctif',
				],
				[
						'qu’ils',
						'ThirdPersonPlural',
						'Masculine',						
						'Subjonctif',
				]
				
		];
	}
}
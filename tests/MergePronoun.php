<?php
require_once '../conjugate.php';
class MergePronounTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider MergePronounProvider
	 */
	public function testMergePronoun($expectedResult, $person, $gender, $mood) {
		$this->assertEquals ( $expectedResult, merge_pronoun(new Person($person), new Gender($gender), new Mood($mood)));
	}
	public function MergePronounProvider() {
		return [
				[
						'je me',
						'FirstPersonSingular',
						'Masculine',						
						'Indicatif',
				],
				[
						'tu te',
						'SecondPersonSingular',
						'Masculine',						
						'Indicatif',
				],
				[
						'il se',
						'ThirdPersonSingular',
						'Masculine',						
						'Indicatif',
				],
				[
						'elle se',		
						'ThirdPersonSingular',
						'Feminine',						
						'Indicatif',
				],				
				[
						'nous nous',
						'FirstPersonPlural',						
						'Masculine',
						'Indicatif',
				],
				[
						'vous vous',
						'SecondPersonPlural',
						'Masculine',
						'Indicatif',
				],
				[
						'ils se',
						'ThirdPersonPlural',
						'Masculine',
						'Indicatif',
				],
				[
						'que je me',
						'FirstPersonSingular',
						'Masculine',						
						'Subjonctif',
				],
				[
						'que tu te',
						'SecondPersonSingular',
						'Masculine',						
						'Subjonctif',
				],
				[
						'qu’il se',
						'ThirdPersonSingular',
						'Masculine',						
						'Subjonctif',
				],
				[
						'qu’elle se',
						'ThirdPersonSingular',
						'Feminine',							
						'Subjonctif',
				],				
				[
						'que nous nous',
						'FirstPersonPlural',
						'Masculine',						
						'Subjonctif',
				],
				[
						'que vous vous',
						'SecondPersonPlural',
						'Masculine',						
						'Subjonctif',
				],
				[
						'qu’ils se',
						'ThirdPersonPlural',
						'Masculine',						
						'Subjonctif',
				],
				[
						'qu’elles se',
						'ThirdPersonPlural',
						'Feminine',							
						'Subjonctif',
				]				

		];
	}
}
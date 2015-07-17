<?php
require_once 'conjugate.php';
class PersonTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider PersonTestProvider
	 */
	public function testPerson($expectedResult, $person, $mood) {
		$this->assertEquals ( $expectedResult, personal_pronoun(new Person($person), new Mood($mood)));
	}
	public function PersonTestProvider() {
		return array (
				array (
						'je',
					   'FirstPersonSingular',
						'Indicatif',						
				),
				array (
						'tu',
						'SecondPersonSingular',
						'Indicatif',						
				),
				array (
						'il',
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
						'ils',
						'ThirdPersonPlural',
						'Indicatif',						
				),
				array (
						'que je',
						'FirstPersonSingular',
						'Subjonctif',						
				),
				array (
						'que tu',
						'SecondPersonSingular',
						'Subjonctif',						
				),
				array (
						'qu’il',
						'ThirdPersonSingular',
						'Subjonctif',						
				),
				array (
						'que nous',
						'FirstPersonPlural',
						'Subjonctif',						
				),
				array (
						'que vous',
						'SecondPersonPlural',
						'Subjonctif',						
				),
				array (
						'qu’ils',
						'ThirdPersonPlural',
						'Subjonctif',						
				)																					
				
		);
	}
}
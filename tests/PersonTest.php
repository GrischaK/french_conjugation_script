<?php
require_once 'conjugate.php';
class PersonTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider PersonTestProvider
	 */
	public function testPerson($expectedResult, $person, $mood) {
		$this->assertEquals ( $expectedResult, personal_pronoun(new Person($person)));
	}
	public function PersonTestProvider() {
		return array (
				array (
						'je ',
						'Indicatif',
					    'FirstPersonSingular',
				),
				array (
						'tu ',
						'Indicatif',
						'SecondPersonSingular',
				),
				array (
						'il ',
						'Indicatif',
						'ThirdPersonSingular',
				),
				array (
						'nous ',
						'Indicatif',
						'FirstPersonPlural',
				),
				array (
						'vous ',
						'Indicatif',
						'SecondPersonPlural',						
				),						
				array (
						"qu'ils ",
						'Indicatif',
						'SecondPersonPlural',
				),
				array (
						'que je ',
						'Subjonctif',
						'FirstPersonSingular',
				),
				array (
						'que tu ',
						'Subjonctif',
						'SecondPersonSingular',
				),
				array (
						"qu'il ",
						'Subjonctif',
						'ThirdPersonSingular',
				),
				array (
						'que nous ',
						'Subjonctif',
						'FirstPersonPlural',
				),
				array (
						'que vous ',
						'Subjonctif',
						'SecondPersonPlural',
				),
				array (
						"qu'ils",
						'Subjonctif',
						'ThirdPersonPlural',
				)																					
				
		);
	}
}
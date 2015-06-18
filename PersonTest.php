<?php
require 'conjugate.php';
class PersonTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider PersonTestProvider
	 */
	public function testPerson($expectedResult, $person) {
		$this->assertEquals ( $expectedResult, personal_pronoun(new Person($person)));
	}
	public function PersonTestProvider() {
		return array (
				array (
						'je ',
					    'FirstPersonSingular',
				),
				array (
						'ils ',
						'ThirdPersonPlural',
				)				
		);
	}
}
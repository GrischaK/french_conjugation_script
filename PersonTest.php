<?php
require 'conjugate.php';
class PersonTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider PersonTestProvider
	 */
	public function PersonTest($expectedResult, $person) {
		$this->assertEquals ( $expectedResult, personal_pronoun($person));
	}
	public function PersonTestProvider() {
		return array (
				array (
						'Je ',
					    'FirstPersonSingular',
				)
		);
	}
}
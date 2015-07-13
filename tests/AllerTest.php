<?php
require_once 'conjugate.php';
class AllerTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider AllerTestProvider
	 */
	public function testAller($expectedResult, $person,$tense,$mood) {
		$this->assertEquals ( $expectedResult, aller(new Person($person), new Tense($tense), new Mood($mood)));
	}
	public function AllerTestProvider() {
		return array (
				array (
						'vais ',
						'FirstPersonSingular',
						'Futur_compose',
						'Indicatif',
				),
				array (
						'vas ',
						'SecondPersonSingular',
						'Futur_compose',
						'Indicatif',						
				),
				array (
						'va ',
						'ThirdPersonSingular',
						'Futur_compose',
						'Indicatif',						
				),
				array (
						'allons ',
						'FirstPersonPlural',
						'Futur_compose',
						'Indicatif',						
				),
				array (
						'allez ',
						'SecondPersonPlural',
						'Futur_compose',
						'Indicatif',						
				),
				array (
						'vont ',
						'ThirdPersonPlural',
						'Futur_compose',
						'Indicatif',						
				)
		);
	}
}


<?php
require_once '../conjugate.php';
class CompositeTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider CompsoiteTestProvider
	 */
	public function testComposite($expectedResult, $tense, $mood) {
		$this->assertEquals ( $expectedResult, isComposite(new Mood($mood),new Tense($tense)));
	}
	public function CompsoiteTestProvider() {
		return array (
				array (
						true,
						'Futur_compose',
						'Indicatif',
				),				
				array (
						true,
						'Passe',
						'Imperatif',
				),
				array (
						false,
						'Present',
						'Indicatif',
				),				
				
		);
	}
}

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
		return [
				[
						true,
						'Futur_compose',
						'Indicatif',
				],				
				[
						true,
						'Passe',
						'Imperatif',
				],
				[
						false,
						'Present',
						'Indicatif',
				],				
				
		];
	}
}

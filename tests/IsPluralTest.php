<?php
require_once '../conjugate.php';
class PluralTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider CompsoiteTestProvider
	 */
	public function testPlural($expectedResult, $person) {
		$this->assertEquals ( $expectedResult, isPlural(new Person($person)));
	}
	public function CompsoiteTestProvider() {
		return [   
				[
						false,
						Person::FirstPersonSingular
				],	
				[
						false,
						Person::SecondPersonSingular
				],
				[
						false,
						Person::ThirdPersonSingular
				],			
				[
						true,
						Person::FirstPersonPlural
				],	
				[
						true,
						Person::SecondPersonPlural
				],
				[
						true,
						Person::ThirdPersonPlural
				],					
		];
	}
}

<?php
require_once 'conjugate.php';
class InfinitiveEndingTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider InfinitiveEndingTestProvider
	 */
	public function testInfinitiveEnding($expectedResult, $infinitiveVerb) {
	$this->assertEquals ( new EndingWith($expectedResult), finding_infinitive_ending (new InfinitiveVerb($infinitiveVerb)));
	}
	public function InfinitiveEndingTestProvider() {
		return array (
				array (
						EndingWith::ER,
						'aimer',
				),
				array (
						EndingWith::CER,
						'commencer',
				),
				array (
						EndingWith::GER,
						'manger',
				),
				array (
						EndingWith::YER,
						'payer',
				),				
				array (
						EndingWith::IR,
						'finir',
				),
				array ( 
						EndingWith::ER,
						'aller',
				),
				array ( 
						EndingWith::IR,
						'avoir',
				)			
		);
	}
}

?>

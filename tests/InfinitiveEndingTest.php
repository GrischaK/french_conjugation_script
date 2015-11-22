<?php
require_once '../conjugate.php';
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
						EndingWith::IR,
						'finir',
				),
				array ( 
						EndingWith::OIR,
						'mouvoir',
				)	
				
		);
	}
}

?>

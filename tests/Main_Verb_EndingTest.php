<?php
require_once 'conjugate.php';
class Main_Verb_EndingTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider regularMain_Verb_EndingProvider
	 */
	public function testMain_Verb_Ending($expectedResult, $verb) {
	$this->assertEquals ( new Ending_Regular_Main($expectedResult), finding_main_verb_ending ($verb));
	}
	public function regularMain_Verb_EndingProvider() {
		return array (
				array (
						 'aimer',
						Ending_Regular_Main::ER 
				),
				array (
						'finir',
						Ending_Regular_Main::IR
				)				
		);
	}
}

?>

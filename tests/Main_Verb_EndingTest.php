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
						Ending_Regular_Main::ER,
						'aimer',
				),
				array (
						Ending_Regular_Main::IR,
						'finir',
				),
				array ( // not correct, after adding irregular verbs Ending_Regular_Main::UNREGULAR should be correct
						Ending_Regular_Main::ER,
						'aller',
				),
				array ( // not correct, after adding irregular verbs Ending_Regular_Main::UNREGULAR should be correct
						Ending_Regular_Main::IR,
						'avoir',
				),				
				array (
						Ending_Regular_Main::UNREGULAR,
						'prendre',
				)
		);
	}
}

?>

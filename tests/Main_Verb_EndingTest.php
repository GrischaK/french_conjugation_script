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
						EndingWith::ER,
						'aimer',
				),
				array (
						EndingWith::IR,
						'finir',
				),
				array ( // not correct, after adding irregular verbs Ending_Regular_Main::UNREGULAR should be correct
						EndingWith::ER,
						'aller',
				),
				array ( // not correct, after adding irregular verbs Ending_Regular_Main::UNREGULAR should be correct
						EndingWith::IR,
						'avoir',
				),				
				array (
						EndingWith::UNREGULAR,
						'prendre',
				)
		);
	}
}

?>

<?php
require_once 'conjugate.php';
class InfinitiveEndingTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider InfinitiveEndingTestProvider
	 */
	public function InfinitiveEndingTest($expectedResult, $verb) {
	$this->assertEquals ( new EndingWith($expectedResult), finding_infinitve_ending ($verb));
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
				array ( // not correct, after adding irregular verbs EndingWith::UNREGULAR should be correct
						EndingWith::ER,
						'aller',
				),
				array ( // not correct, after adding irregular verbs EndingWith::UNREGULAR should be correct
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

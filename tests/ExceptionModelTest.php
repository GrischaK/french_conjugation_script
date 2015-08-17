<?php
require_once 'conjugate.php';
class ExceptionModelTest extends PHPUnit_Framework_TestCase {
	
	
	/**
	 * @dataProvider ExceptionModelTestProvider
	 */
	public function testConjugationModelTest($expectedResult, $verb) {
	$this->assertEquals ( new ExceptionModel($expectedResult), finding_exception_model ($verb));
	}
	public function ExceptionModelTestProvider() {
		return array (
				array (
						ExceptionModel::ELER_ELE,
						'aciseler',
				),
				array (
						ExceptionModel::ELER_ELLE,
						'agneler',
				)
		);
	}
}

?>
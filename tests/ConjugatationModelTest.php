<?php
require_once 'conjugate.php';
class ConjugationModelTest extends PHPUnit_Framework_TestCase {
	
	
	/**
	 * @dataProvider ConjugationModelTestProvider
	 */
	public function testConjugationModelTest($expectedResult, $verb) {
	$this->assertEquals ( new ConjugationModel($expectedResult), finding_conjugation_model ($verb));
	}
	public function ConjugationModelTestProvider() {
		return array (
				array (
						ConjugationModel::ELER_ELE,
						'aciseler',
				),
				array (
						ConjugationModel::ELER_ELLE,
						'agneler',
				)
		);
	}
}

?>
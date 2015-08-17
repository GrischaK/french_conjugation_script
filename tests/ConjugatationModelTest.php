<?php
require_once 'conjugate.php';
class ConjugatationModelTest extends PHPUnit_Framework_TestCase {
	
	
	/**
	 * @dataProvider ConjugatationModelTestProvider
	 */
	public function testConjugatationModel($expectedResult, $verb) {
	$this->assertEquals ( new ConjugatationModel($expectedResult), finding_conjugation_model ($verb));
	}
	public function ConjugatationModelTestProvider() {
		return array (
				array (
						ConjugatationModel::Reflexive,
						'aimer',
				),
				array (
						ConjugatationModel::Reflexive,
						'lever',
				),
				array (
						ConjugatationModel::NonReflexive,
						'lire',
				),			
				array (
						ConjugatationModel::OnlyReflexive,
						'abrater',
				),
				array (
						ConjugatationModel::OnlyReflexive,
						'empommer',
				)
		);
	}
}

?>
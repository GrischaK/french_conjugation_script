<?php
require_once '../conjugate.php';
class ConjugationModelTest extends PHPUnit_Framework_TestCase {
	
	
	/**
	 * @dataProvider ConjugationModelTestProvider
	 */
	public function testConjugationModel($expectedResult, $infinitiveVerb) {
	$this->assertEquals ( new ConjugationModel($expectedResult), finding_conjugation_model (new InfinitiveVerb($infinitiveVerb)));
	}
	public function ConjugationModelTestProvider() {
		return array (
				array (
						ConjugationModel::Reflexive,
						'aimer',
				),
				array (
						ConjugationModel::Reflexive,
						'lever',
				),
				array (
						ConjugationModel::NonReflexive,
						'lire',
				),			
				array (
						ConjugationModel::OnlyReflexive,
						'abrater',
				),
				array (
						ConjugationModel::OnlyReflexive,
						'empommer',
				)
		);
	}
}

?>
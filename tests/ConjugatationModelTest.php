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
		return [
				[
						ConjugationModel::Reflexive,
						'aimer',
				],
				[
						ConjugationModel::Reflexive,
						'lever',
				],
				[
						ConjugationModel::NonReflexive,
						'lire',
				],			
				[
						ConjugationModel::OnlyReflexive,
						'abrater',
				],
				[
						ConjugationModel::OnlyReflexive,
						'empommer',
				]
		];
	}
}

?>
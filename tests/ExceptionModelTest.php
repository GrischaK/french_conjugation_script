<?php
require_once '../conjugate.php';
class ExceptionModelTest extends PHPUnit_Framework_TestCase {


	/**
	 * @dataProvider ExceptionModelTestProvider
	 */
	public function testConjugationModelTest($expectedResult, $infinitiveVerb) {
	$this->assertEquals ( new ExceptionModel($expectedResult), finding_exception_model (new InfinitiveVerb($infinitiveVerb)));
	}
	public function ExceptionModelTestProvider() {
		return array (
				array (
						ExceptionModel::Eler_Ele,
						'peler',
				),
				array (
						ExceptionModel::Eter_Ete,
						'acheter',
				),	
				
				array (
						ExceptionModel::Eler_Elle,
						'appeler',
				),
				array (
						ExceptionModel::Eter_Ette,
						'jeter',
				),
				array (
						ExceptionModel::E_Akut_Er,
						'sécher',
				),
				array (
						ExceptionModel::E_Akut_Er,
						'espérer',
				),
				array (
						ExceptionModel::E_Akut_Er,
						'accélérer',
				),	
				array (
						ExceptionModel::E_Er,
						'peser',
				),				
				array (
						ExceptionModel::CER,
						'agacer',
				),
				array (
						ExceptionModel::GER,
						'manger',
				),
				array (
						ExceptionModel::ENVOYER,
						'envoyer',
				),
				array (
						ExceptionModel::DEVOIR,
						'devoir',
				),
				array (
						ExceptionModel::MOUVOIR,
						'mouvoir',
				),
				array (
						ExceptionModel::POUVOIR,
						'pouvoir',
				),
				array (
						ExceptionModel::SAVOIR,
						'savoir',
				),
				array (
						ExceptionModel::COURIR,
						'courir',
				),
				array (
						ExceptionModel::MOURIR,
						'mourir',
				),
				array (
						ExceptionModel::QUERIR,
						'acquérir',
				),
				array (
						ExceptionModel::VETIR,
						'vêtir',
				)
		);
	}
}

?>
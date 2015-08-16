<?php
require_once 'conjugate.php';
class ReflexiveTest extends PHPUnit_Framework_TestCase {
	
	
	/**
	 * @dataProviderReflexiveTestProvider
	 */
	public function testReflexiveTest($expectedResult, $verb) {
	$this->assertEquals ( new ReflexiveModel($expectedResult), finding_reflexive_model ($verb));
	}
	public function ReflexiveTestProvider() {
		return array (
				array (
						RefexiveModel::Reflexive,
						'aimer',
				),
				array (
						RefexiveModel::Reflexive,
						'lever',
				),
				array (
						RefexiveModel::NonReflexive,
						'lire',
				),			
				array (
						RefexiveModel::OnlyReflexive,
						'abrater',
				),
				array (
						RefexiveModel::OnlyReflexive,
						'empommer',
				)				
		);
	}
}

?>
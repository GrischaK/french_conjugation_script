<?php
require_once 'conjugate.php';
class ReflexiveTest extends PHPUnit_Framework_TestCase {
	
	
	/**
	 * @dataProvider ReflexiveTestProvider
	 */
	public function testReflexiveTest($expectedResult, $verb) {
	$this->assertEquals ( new ReflexiveModel($expectedResult), finding_reflexive_model ($verb));
	}
	public function ReflexiveTestProvider() {
		return array (
				array (
						ReflexiveModel::Reflexive,
						'aimer',
				),
				array (
						ReflexiveModel::Reflexive,
						'lever',
				),
				array (
						ReflexiveModel::NonReflexive,
						'lire',
				),			
				array (
						ReflexiveModel::OnlyReflexive,
						'abrater',
				),
				array (
						ReflexiveModel::OnlyReflexive,
						'empommer',
				)
		);
	}
}

?>
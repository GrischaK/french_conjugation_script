<?php
require_once 'conjugate.php';
class UnregularParticipePasseTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider UnregularParticipePasseTestProvider
	 */
	public function testUnregularParticipePasse($expectedResult, $infinitiveVerb) {
	$this->assertEquals ( $expectedResult, finding_participe_passe (new InfinitiveVerb( $infinitiveVerb)));
	}
	public function ParticipePasseTestProvider() {
		return array (
				array (
						'vêtu',
						'vêtir',
				)
		);
	}	
	public function UnregularParticipePasseTest() {
		return array (
				array (
						'vêtu',
						'vêtir',
				)
		);
	}	
}
?>
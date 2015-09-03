<?php
require_once 'conjugate.php';
class ParticipePasseTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider ParticipePasseTestProvider
	 */
	public function testParticipePasse($expectedResult, $infinitiveVerb) {
	$this->assertEquals ( $expectedResult, finding_participe_passe (new InfinitiveVerb( $infinitiveVerb)));
	}
	public function ParticipePasseTestProvider() {
		return array (
				array (
						'aimé',
						'aimer',
				),
				array (
						'fini',
						'finir',
				) 
		);
	}
	
	/**
	 * @dataProvider UnregularParticipePasseTestProvider
	 */
	public function testUnregularParticipePasse($expectedResult, $infinitiveVerb) {
		$this->assertEquals ( $expectedResult, finding_participe_passe (new InfinitiveVerb( $infinitiveVerb)));
	}
	public function UnregularParticipePasseTestProvider() {
		return array (
				array (
						'vêtu',
						'vêtir',
				),
				array (
						'WRONG TESTRESULT',
						'vêtir',
				)
		);
	}	
}
?>
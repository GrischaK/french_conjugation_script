<?php
require_once 'conjugate.php';
class ParticipePasseTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider ParticipePasseTestProvider
	 */
	public function testParticipePasse($expectedResult, $verb) {
	$this->assertEquals ( $expectedResult, finding_participe_passe ($verb));
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
}
?>
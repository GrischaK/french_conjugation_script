<?php
require_once 'conjugate.php';
class ParticipePresentTest extends PHPUnit_Framework_TestCase {


	/**
	 * @dataProvider ParticipePresentTestProvider
	 */
	public function testParticipePresent($expectedResult, $infinitiveVerb) {
		$this->assertEquals ( $expectedResult, finding_participe_present (new InfinitiveVerb( $infinitiveVerb)));
	}
	public function ParticipePresentTestProvider() {
		return array (
				array (
						'aimant',
						'aimer',
				),
				array (
						'finissant',
						'finir',
				)
		);
	}
}
?>
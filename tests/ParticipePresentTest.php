<?php
require_once '../conjugate.php';
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
				),
				//oir
				array (
						'devant',
						'devoir',
				),					
				array (
						'mouvant',
						'mouvoir',
				),	
				array (
						'pouvant',
						'pouvoir',
				),					
				array ( 
						'savant',
						'savoir',
				),	
//
				array (
						'acquérant',
						'acquérir',
				),	
				array (
						'courant',
						'courir',
				),					
				array (
						'mourant',
						'mourir',
				),
				array (
						'vêtant',
						'vêtir',
				),					
		);
	}
	
	/**
	 * @dataProvider UnregularParticipePresentTestProvider
	 */
	public function testUnregularParticipePresent($expectedResult, $infinitiveVerb) {
		$this->assertEquals ( $expectedResult, finding_participe_present (new InfinitiveVerb( $infinitiveVerb)));
	}
	public function UnregularParticipePresentTestProvider() {
		return array (
				array (
						'mangeant',
						'manger',
				),	
				array (
						'agaçant',
						'agacer',
				),				
		);
	}	
}
?>
<?php
require_once '../conjugate.php';
class ParticipePasseTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider ParticipePasseTestProvider
	 */
	public function testParticipePasse($expectedResult, $infinitiveVerb) {
		$this->assertEquals ( $expectedResult, finding_participe_passe ( new InfinitiveVerb ( $infinitiveVerb ) ) );
	}
	public function ParticipePasseTestProvider() {
		return array (
				array (
						'aimé',
						'aimer' 
				),
				array (
						'fini',
						'finir' 
				) 
		);
	}
	
	/**
	 * @dataProvider UnregularParticipePasseTestProvider
	 */
	public function testUnregularParticipePasse($expectedResult, $infinitiveVerb) {
		$this->assertEquals ( $expectedResult, finding_participe_passe ( new InfinitiveVerb ( $infinitiveVerb ) ) );
	}
	public function UnregularParticipePasseTestProvider() {
		return array (
				array (
						'mangé',
						'manger' 
				),
				array (
						'agacé',
						'agacer' 
				),
				array (
						'dû',
						'devoir' 
				),
				array (
						'mû',
						'mouvoir' 
				),
				array (
						'autopromû',
						'autopromouvoir' 
				),
				array (
						'pu',
						'pouvoir' 
				),
				array (
						'redu',
						'redevoir' 
				),
				array (
						'dû',
						'devoir' 
				),
				array (
						'vu',
						'voir' 
				),
				array (
						'pourvu',
						'pourvoir' 
				),
				array (
						'prévu',
						'prévoir' 
				),
				array (
						'valu',
						'valoir' 
				),
				array (
						'fui',
						'fuir' 
				),
				array (
						'tenu',
						'tenir' 
				),
				array (
						'sailli',
						'saillir' 
				),
				array (
						'bouilli',
						'bouillir' 
				),
				array (
						'su',
						'savoir' 
				),
				array (
						'resu',
						'resavoir' 
				),
				array (
						'couvert',
						'couvrir' 
				),
				array (
						'couru',
						'courir' 
				),
				array (
						'mort',
						'mourir' 
				),
				array (
						'remort',
						'remourir' 
				),
				array (
						'acquis',
						'acquérir' 
				),
				array (
						'vêtu',
						'vêtir' 
				) 
		);
	}
}
?>
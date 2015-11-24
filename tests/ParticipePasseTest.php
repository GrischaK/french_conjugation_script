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
		return [
				[
						'aimé',
						'aimer' 
				],
				[
						'fini',
						'finir' 
				] 
		];
	}
	
	/**
	 * @dataProvider UnregularParticipePasseTestProvider
	 */
	public function testUnregularParticipePasse($expectedResult, $infinitiveVerb) {
		$this->assertEquals ( $expectedResult, finding_participe_passe ( new InfinitiveVerb ( $infinitiveVerb ) ) );
	}
	public function UnregularParticipePasseTestProvider() {
		return [
				[
						'mangé',
						'manger' 
				],
				[
						'agacé',
						'agacer' 
				],
				[
						'dû',
						'devoir' 
				],
				[
						'mû',
						'mouvoir' 
				],
				[
						'autopromû',
						'autopromouvoir' 
				],
				[
						'pu',
						'pouvoir' 
				],
				[
						'redu',
						'redevoir' 
				],
				[
						'dû',
						'devoir' 
				],
				[
						'vu',
						'voir' 
				],
				[
						'pourvu',
						'pourvoir' 
				],
				[
						'prévu',
						'prévoir' 
				],
				[
						'valu',
						'valoir' 
				],
				[
						'fui',
						'fuir' 
				],
				[
						'tenu',
						'tenir' 
				],
				[
						'sailli',
						'saillir' 
				],
				[
						'bouilli',
						'bouillir' 
				],
				[
						'su',
						'savoir' 
				],
				[
						'resu',
						'resavoir' 
				],
				[
						'couvert',
						'couvrir' 
				],
				[
						'couru',
						'courir' 
				],
				[
						'mort',
						'mourir' 
				],
				[
						'remort',
						'remourir' 
				],
				[
						'acquis',
						'acquérir' 
				],
				[
						'vêtu',
						'vêtir' 
				] 
		];
	}
}
?>
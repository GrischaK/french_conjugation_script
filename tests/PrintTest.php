<?php
require_once 'conjugate.php';
require_once 'print.php';
class PrintTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider PrintProvider
	 */
	public function testPrint($expectedResult, $verb) {
		$this->expectOutputString ( $expectedResult );
		print_conjugations_of_verb ( $verb );
	}
	public function PrintProvider() {
		return array (
				array (
'
j’aime 
tu aimes 
il aime 
nous aimons 
vous aimez
ils aiment
						
j’aimais
tu aimais
il aimait
nous aimions
vous aimiez
ils aimaient	

j’aimai
tu aimas
il aima
nous aimâmes
vous aimâtes 						
ils aimèrent
						 		
j’aimerai
tu aimeras
il aimera
nous aimerons
vous aimerez
ils aimeront

j’ai aimé
tu as aimé
il a aimé
nous avons aimé
vous avez aimé
ils ont aimé
										
j’avais aimé
tu avais aimé
il avait aimé
nous avions aimé
vous aviez aimé
ils avaient aimé
						
j’eus aimé
tu eus aimé
il eut aimé
nous eûmes aimé
vous eûtes aimé
ils eurent aimé
							       
j’aurai aimé
tu auras aimé
il aura aimé
nous aurons aimé
vous aurez aimé
ils auront aimé
					       
je vais aimer
tu vas aimer
il va aimer
nous allons aimer 
vous allez aimer
ils vont aimer 	
			
que j’aime 
que tu aimes 
qu’il aime 
que nous aimons 
que vous aimez
qu’ils aiment

que j’aimais
que tu aimais
qu’il aimait
que nous aimions
que vous aimiez
qu’ils aimaient	

que j’aie aimé
que tu aies aimé 
qu’il ait aimé 
que nous ayons aimé 
que vous ayez aimé
qu’ils aient aimé

que j’eusse aimé
que tu eusses aimé
qu’il eût aimé
que nous eussions aimé
que vous eussiez aimé
qu’ils eussent aimé	
						
j’aimerais
tu aimerais
il aimerait
nous aimerions
vous aimeriez
ils aimeraient		

j’aurais aimé
tu aurais aimé
il aurait aimé
nous aurions aimé
vous auriez aimé
ils auraient aimé

j’eusse aimé
tu eusses aimé
il eût aimé
nous eussions aimé
vous eussiez aimé
ils eussent aimé
						
aime
aimons
aimez

aie aimé
ayons aimé
ayez aimé
						
aimer
avoir aimé
en aimant
en ayant aimé						
aimant		
aimé				
',

						'aimer' 
				) 
		);
	}
}
?>

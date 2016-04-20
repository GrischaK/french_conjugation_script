<?php
require_once '../conjugate.php';
class StartVowelTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider  StartVowelTestProvider
	 */
	public function testVowel($expectedResult, $verb) {
		$this->assertEquals ( $expectedResult, starts_with_vowel($verb));
	}
	public function StartVowelTestProvider() {
		return [
				[
						true,
						'aimer',					
				],
				[
						true,
						'acheter',				
				],
				[
						true,
						'e-mailer',					
				],
				[
						true,
						'ébercher',				
				],				
				[
						true,
						'embariller',					
				],
				[
						true,
						'ècher',				
				],
				[
						true,
						'illuter',					
				],
				[
						true,
						'îloter',				
				],
				[
						true,
						'obéir',					
				],
				[
						true,
						'obiter',				
				],	
				[
						true,
						'uberifier',					
				],
				[
						true,
						'ultra-condenser',				
				],					
				[
						false,
						'descendre',				
				],
				[
						false,
						'tenir',				
				],					
				[
						false,
						'chercher',				
				],	

		/* start h_apire verbs */		
				[
						true,
						'habiliter',				
				],	
				[
						true,
						'héberger',				
				],	
				[
						true,
						'highlighter',				
				],	
				[
						true,
						'hospitaliser',				
				],	
				[
						true,
						'hôteler',				
				],
				[
						true,
						'huir',				
				],	
				[
						true,
						'hybrider',				
				],					
	/* end h_aspire verbs */
				
				
				[
						false,
						'haïr',				
				],	
				[
						false,
						'halter',				
				],					
				

				[
						true,
						'ypériter',				
				],	
				[
						false,
						'yoler',				
				],				
				
				[
						false,
						'yoler',				
				],					
		];
	}
}


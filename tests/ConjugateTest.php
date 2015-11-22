<?php
require_once '../conjugate.php';

class ConjugateFrenchVerbTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider regularVerbProvider
	 */
	public function testRegularVerb($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
	}						
	public function regularVerbProvider() {
		;
		return array (
				array (
						'aime',
						'aimer',
						'Present',
						'FirstPersonSingular',
						'Indicatif' 
				),
				array (
						'aimes',
						'aimer',
						'Present',
						'SecondPersonSingular',
						'Indicatif' 
				),
				array (
						'aime',
						'aimer',
						'Present',
						'ThirdPersonSingular',
						'Indicatif' 
				),
				array (
						'aimons',
						'aimer',
						'Present',
						'FirstPersonPlural',
						'Indicatif' 
				),
				array (
						'aimez',
						'aimer',
						'Present',
						'SecondPersonPlural',
						'Indicatif' 
				),
				array (
						'aiment',
						'aimer',
						'Present',
						'ThirdPersonPlural',
						'Indicatif' 
				),
				array ( 
						'aime',
						'aimer',
						'Present',
						'FirstPersonSingular',
						'Imperatif'
				),	
				array ( 
						'aimons',
						'aimer',
						'Present',
						'FirstPersonPlural',
						'Imperatif'
				),
				array ( 
						'aimez',
						'aimer',
						'Present',
						'SecondPersonPlural',
						'Imperatif'
				),
				array (
						'donne',
						'donner',
						'Present',
						'FirstPersonSingular',
						'Indicatif' 
				),
				array (
						'donnes',
						'donner',
						'Present',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'donne',
						'donner',
						'Present',
						'ThirdPersonSingular',
						'Indicatif' 
				),
				array (
						'donnons',
						'donner',
						'Present',
						'FirstPersonPlural',
						'Indicatif' 
				),
				array (
						'donnez',
						'donner',
						'Present',
						'SecondPersonPlural',
						'Indicatif' 
				),
				array (
						'donnent',
						'donner',
						'Present',
						'ThirdPersonPlural',
						'Indicatif' 
				) 
		);
	}
// UNREGULAR EXCEPTION MODELS

	/**
	 * @dataProvider Eler_Eler_Provider
	 */
	public function testEler_Eler_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
			$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
	}
	public function Eler_Eler_Provider() {
		return array (
				array (
						'pèle',
						'peler',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'pèles',
						'peler',
						'Present',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'pèle',
						'peler',
						'Present',
						'ThirdPersonSingular',
						'Indicatif'
				),
				array (// regular
						'pelons',
						'peler',
						'Present',
						'FirstPersonPlural',
						'Indicatif'
				),
				array (// regular
						'pelez',
						'peler',
						'Present',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (
						'pèlent',
						'peler',
						'Present',
						'ThirdPersonPlural',
						'Indicatif'
				),
				
				array (
						'pèlerai',
						'peler',
						'Futur',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'pèleras',
						'peler',
						'Futur',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'pèlera',
						'peler',
						'Futur',
						'ThirdPersonSingular',
						'Indicatif'
				),
				
				array (
						'pèlerons',
						'peler',
						'Futur',
						'FirstPersonPlural',
						'Indicatif'
				),
				array (
						'pèlerez',
						'peler',
						'Futur',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (
						'pèleront',
						'peler',
						'Futur',
						'ThirdPersonPlural',
						'Indicatif'
				),
				
				array (
						'pèle',
						'peler',
						'Present',
						'FirstPersonSingular',
						'Subjonctif'
				),
				array (
						'pèles',
						'peler',
						'Present',
						'SecondPersonSingular',
						'Subjonctif'
				),
				array (
						'pèle',
						'peler',
						'Present',
						'ThirdPersonSingular',
						'Subjonctif'
				),
				array (//regular
						'pelions',
						'peler',
						'Present',
						'FirstPersonPlural',
						'Subjonctif'
				),
				array (//regular
						'peliez',
						'peler',
						'Present',
						'SecondPersonPlural',
						'Subjonctif'
				),
				array (
						'pèlent',
						'peler',
						'Present',
						'ThirdPersonPlural',
						'Subjonctif'
				),
				
				array (
						'pèlerais',
						'peler',
						'Present',
						'FirstPersonSingular',
						'Conditionnel'
				),
				array (
						'pèlerais',
						'peler',
						'Present',
						'SecondPersonSingular',
						'Conditionnel'
				),
				array (
						'pèlerait',
						'peler',
						'Present',
						'ThirdPersonSingular',
						'Conditionnel'
				),
				array (
						'pèlerions',
						'peler',
						'Present',
						'FirstPersonPlural',
						'Conditionnel'
				),
				array (
						'pèleriez',
						'peler',
						'Present',
						'SecondPersonPlural',
						'Conditionnel'
				),
				array (
						'pèleraient',
						'peler',
						'Present',
						'ThirdPersonPlural',
						'Conditionnel'
				),
				
				array (
						'pèle',
						'peler',
						'Present',
						'FirstPersonSingular',
						'Imperatif'
				) 
		);
}
				/**
				 * @dataProvider Eter_Eter_Provider
				 */
				public function testEter_Eter_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
					$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
				}
				public function Eter_Eter_Provider() {
					return array (
				array (
						'achète',
						'acheter',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'achètes',
						'acheter',
						'Present',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'achète',
						'acheter',
						'Present',
						'ThirdPersonSingular',
						'Indicatif'
				),
				array (// regular
						'achetons',
						'acheter',
						'Present',
						'FirstPersonPlural',
						'Indicatif'
				),
				array (// regular
						'achetez',
						'acheter',
						'Present',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (
						'achètent',
						'acheter',
						'Present',
						'ThirdPersonPlural',
						'Indicatif'
				),
				
				array (
						'achèterai',
						'acheter',
						'Futur',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'achèteras',
						'acheter',
						'Futur',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'achètera',
						'acheter',
						'Futur',
						'ThirdPersonSingular',
						'Indicatif'
				),
				
				array (
						'achèterons',
						'acheter',
						'Futur',
						'FirstPersonPlural',
						'Indicatif'
				),
				array (
						'achèterez',
						'acheter',
						'Futur',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (
						'achèteront',
						'acheter',
						'Futur',
						'ThirdPersonPlural',
						'Indicatif'
				),
				
				array (
						'achète',
						'acheter',
						'Present',
						'FirstPersonSingular',
						'Subjonctif'
				),
				array (
						'achètes',
						'acheter',
						'Present',
						'SecondPersonSingular',
						'Subjonctif'
				),
				array (
						'achète',
						'acheter',
						'Present',
						'ThirdPersonSingular',
						'Subjonctif'
				),
				array (//regular
						'achetions',
						'acheter',
						'Present',
						'FirstPersonPlural',
						'Subjonctif'
				),
				array (//regular
						'achetiez',
						'acheter',
						'Present',
						'SecondPersonPlural',
						'Subjonctif'
				),
				array (
						'achètent',
						'acheter',
						'Present',
						'ThirdPersonPlural',
						'Subjonctif'
				),
				
				array (
						'achèterais',
						'acheter',
						'Present',
						'FirstPersonSingular',
						'Conditionnel'
				),
				array (
						'achèterais',
						'acheter',
						'Present',
						'SecondPersonSingular',
						'Conditionnel'
				),
				array (
						'achèterait',
						'acheter',
						'Present',
						'ThirdPersonSingular',
						'Conditionnel'
				),
				array (
						'achèterions',
						'acheter',
						'Present',
						'FirstPersonPlural',
						'Conditionnel'
				),
				array (
						'achèteriez',
						'acheter',
						'Present',
						'SecondPersonPlural',
						'Conditionnel'
				),
				array (
						'achèteraient',
						'acheter',
						'Present',
						'ThirdPersonPlural',
						'Conditionnel'
				),
				
				array (
						'achète',
						'acheter',
						'Present',
						'FirstPersonSingular',
						'Imperatif'
				) 
		);
}
				/**
				 * @dataProvider Eler_Elle_Provider
				 */
				public function testEler_Eller_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
					$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
				}
				public function Eler_Elle_Provider() {
					return array (
				array (
						'appelle',
						'appeler',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'appelles',
						'appeler',
						'Present',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'appelle',
						'appeler',
						'Present',
						'ThirdPersonSingular',
						'Indicatif'
				),
				array (// regular
						'appelons',
						'appeler',
						'Present',
						'FirstPersonPlural',
						'Indicatif'
				),
				array (// regular
						'appelez',
						'appeler',
						'Present',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (
						'appellent',
						'appeler',
						'Present',
						'ThirdPersonPlural',
						'Indicatif'
				),
				
				array (
						'appellerai',
						'appeler',
						'Futur',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'appelleras',
						'appeler',
						'Futur',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'appellera',
						'appeler',
						'Futur',
						'ThirdPersonSingular',
						'Indicatif'
				),
				
				array (
						'appellerons',
						'appeler',
						'Futur',
						'FirstPersonPlural',
						'Indicatif'
				),
				array (
						'appellerez',
						'appeler',
						'Futur',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (
						'appelleront',
						'appeler',
						'Futur',
						'ThirdPersonPlural',
						'Indicatif'
				),
				
				array (
						'appelle',
						'appeler',
						'Present',
						'FirstPersonSingular',
						'Subjonctif'
				),
				array (
						'appelles',
						'appeler',
						'Present',
						'SecondPersonSingular',
						'Subjonctif'
				),
				array (
						'appelle',
						'appeler',
						'Present',
						'ThirdPersonSingular',
						'Subjonctif'
				),
				array (//regular
						'appelions',
						'appeler',
						'Present',
						'FirstPersonPlural',
						'Subjonctif'
				),
				array (//regular
						'appeliez',
						'appeler',
						'Present',
						'SecondPersonPlural',
						'Subjonctif'
				),
				array (
						'appellent',
						'appeler',
						'Present',
						'ThirdPersonPlural',
						'Subjonctif'
				),
				
				array (
						'appellerais',
						'appeler',
						'Present',
						'FirstPersonSingular',
						'Conditionnel'
				),
				array (
						'appellerais',
						'appeler',
						'Present',
						'SecondPersonSingular',
						'Conditionnel'
				),
				array (
						'appellerait',
						'appeler',
						'Present',
						'ThirdPersonSingular',
						'Conditionnel'
				),
				array (
						'appellerions',
						'appeler',
						'Present',
						'FirstPersonPlural',
						'Conditionnel'
				),
				array (
						'appelleriez',
						'appeler',
						'Present',
						'SecondPersonPlural',
						'Conditionnel'
				),
				array (
						'appelleraient',
						'appeler',
						'Present',
						'ThirdPersonPlural',
						'Conditionnel'
				),
				
				array (
						'appelle',
						'appeler',
						'Present',
						'FirstPersonSingular',
						'Imperatif'
				) 
		);
}
				/**
				 * @dataProvider Eter_Ette_Provider
				 */
				public function testEter_Ette_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
					$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
				}
				public function Eter_Ette_Provider() {
					return array (
				array (
						'jette',
						'jeter',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				),	
				array (
						'jettes',
						'jeter',
						'Present',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'jette',
						'jeter',
						'Present',
						'ThirdPersonSingular',
						'Indicatif'
				),
				array (// regular
						'jetons',
						'jeter',
						'Present',
						'FirstPersonPlural',
						'Indicatif'
				),
				array (// regular
						'jetez',
						'jeter',
						'Present',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (
						'jettent',
						'jeter',
						'Present',
						'ThirdPersonPlural',
						'Indicatif'
				),
				
				array (
						'jetterai',
						'jeter',
						'Futur',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'jetteras',
						'jeter',
						'Futur',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'jettera',
						'jeter',
						'Futur',
						'ThirdPersonSingular',
						'Indicatif'
				),
				
				array (
						'jetterons',
						'jeter',
						'Futur',
						'FirstPersonPlural',
						'Indicatif'
				),
				array (
						'jetterez',
						'jeter',
						'Futur',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (
						'jetteront',
						'jeter',
						'Futur',
						'ThirdPersonPlural',
						'Indicatif'
				),
				
				array (
						'jette',
						'jeter',
						'Present',
						'FirstPersonSingular',
						'Subjonctif'
				),
				array (
						'jettes',
						'jeter',
						'Present',
						'SecondPersonSingular',
						'Subjonctif'
				),
				array (
						'jette',
						'jeter',
						'Present',
						'ThirdPersonSingular',
						'Subjonctif'
				),
				array (//regular
						'jetions',
						'jeter',
						'Present',
						'FirstPersonPlural',
						'Subjonctif'
				),
				array (//regular
						'jetiez',
						'jeter',
						'Present',
						'SecondPersonPlural',
						'Subjonctif'
				),
				array (
						'jettent',
						'jeter',
						'Present',
						'ThirdPersonPlural',
						'Subjonctif'
				),
				
				array (
						'jetterais',
						'jeter',
						'Present',
						'FirstPersonSingular',
						'Conditionnel'
				),
				array (
						'jetterais',
						'jeter',
						'Present',
						'SecondPersonSingular',
						'Conditionnel'
				),
				array (
						'jetterait',
						'jeter',
						'Present',
						'ThirdPersonSingular',
						'Conditionnel'
				),
				array (
						'jetterions',
						'jeter',
						'Present',
						'FirstPersonPlural',
						'Conditionnel'
				),
				array (
						'jetteriez',
						'jeter',
						'Present',
						'SecondPersonPlural',
						'Conditionnel'
				),
				array (
						'jetteraient',
						'jeter',
						'Present',
						'ThirdPersonPlural',
						'Conditionnel'
				),
				
				array (
						'jette',
						'jeter',
						'Present',
						'FirstPersonSingular',
						'Imperatif'
				) 
		);
}

/**
 * @dataProvider CER_Provider
 */
public function testCER_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
	$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
}
public function CER_Provider() {
	return array (
			array (
					'agaçons',
					'agacer',
					'Present',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (//regular
					'agacez',
					'agacer',
					'Present',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'agaçais',
					'agacer',
					'Imparfait',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'agaçais',
					'agacer',
					'Imparfait',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'agaçait',
					'agacer',
					'Imparfait',
					'ThirdPersonSingular',
					'Indicatif'
			),
			array (//regular
					'agacions',
					'agacer',
					'Imparfait',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (//regular
					'agaciez',
					'agacer',
					'Imparfait',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'agaçaient',
					'agacer',
					'Imparfait',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'agaçai',
					'agacer',
					'Passe',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'agaças',
					'agacer',
					'Passe',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'agaça',
					'agacer',
					'Passe',
					'ThirdPersonSingular',
					'Indicatif'
			),
			array (
					'agaçâmes',
					'agacer',
					'Passe',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (
					'agaçâtes',
					'agacer',
					'Passe',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'agacèrent',
					'agacer',
					'Passe',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'agaçasse',
					'agacer',
					'Imparfait',
					'FirstPersonSingular',
					'Subjonctif'
			),
			array (
					'agaçasses',
					'agacer',
					'Imparfait',
					'SecondPersonSingular',
					'Subjonctif'
			),
			array (
					'agaçât',
					'agacer',
					'Imparfait',
					'ThirdPersonSingular',
					'Subjonctif'
			),
			array (
					'agaçassions',
					'agacer',
					'Imparfait',
					'FirstPersonPlural',
					'Subjonctif'
			),
			array (
					'agaçassiez',
					'agacer',
					'Imparfait',
					'SecondPersonPlural',
					'Subjonctif'
			),
			array (
					'agaçassent',
					'agacer',
					'Imparfait',
					'ThirdPersonPlural',
					'Subjonctif'
			),

			array (
					'agaçons',
					'agacer',
					'Present',
					'FirstPersonPlural',
					'Imperatif'
			)
	);
}
/**
 * @dataProvider GER_Provider
 */
public function testGER_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
	$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
}
public function GER_Provider() {
	return array (
			array (
					'mangeons',
					'manger',
					'Present',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (//regular
					'mangez',
					'manger',
					'Present',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'mangeais',
					'manger',
					'Imparfait',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'mangeais',
					'manger',
					'Imparfait',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'mangeait',
					'manger',
					'Imparfait',
					'ThirdPersonSingular',
					'Indicatif'
			),
			array (//regular
					'mangions',
					'manger',
					'Imparfait',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (//regular
					'mangiez',
					'manger',
					'Imparfait',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'mangeaient',
					'manger',
					'Imparfait',
					'ThirdPersonPlural',
					'Indicatif'
			),
			array (
					'mangeai',
					'manger',
					'Passe',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'mangeas',
					'manger',
					'Passe',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'mangea',
					'manger',
					'Passe',
					'ThirdPersonSingular',
					'Indicatif'
			),
			array (
					'mangeâmes',
					'manger',
					'Passe',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (
					'mangeâtes',
					'manger',
					'Passe',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'mangèrent',
					'manger',
					'Passe',
					'ThirdPersonPlural',
					'Indicatif'
			),
			array (
					'mangeasse',
					'manger',
					'Imparfait',
					'FirstPersonSingular',
					'Subjonctif'
			),
			array (
					'mangeasses',
					'manger',
					'Imparfait',
					'SecondPersonSingular',
					'Subjonctif'
			),
			array (
					'mangeât',
					'manger',
					'Imparfait',
					'ThirdPersonSingular',
					'Subjonctif'
			),
			array (
					'mangeassions',
					'manger',
					'Imparfait',
					'FirstPersonPlural',
					'Subjonctif'
			),
			array (
					'mangeassiez',
					'manger',
					'Imparfait',
					'SecondPersonPlural',
					'Subjonctif'
			),
			array (
					'mangeassent',
					'manger',
					'Imparfait',
					'ThirdPersonPlural',
					'Subjonctif'
			),

			array (
					'mangeons',
					'manger',
					'Present',
					'FirstPersonPlural',
					'Imperatif'
			)
	);
}
/**
 * @dataProvider E_Akut_Er_Provider
 */
public function testE_Akut_Er_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
	$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
}
public function E_Akut_Er_Provider() {
	return array (
			array (
					'mangeons',
					'manger',
					'Present',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (
					'agaçons',
					'agacer',
					'Present',
					'FirstPersonPlural',
					'Indicatif'
			),			
			array (
					'redégénère',
					'redégénérer',
					'Present',
					'FirstPersonSingular',
					'Indicatif'
			),			
			array (
					'sèche',
					'sécher',
					'Present',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'espère',
					'espérer',
					'Present',
					'FirstPersonSingular',
					'Indicatif'
			),			
			array (
					'accélère',
					'accélérer',
					'Present',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'accélères',
					'accélérer',
					'Present',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'accélère',
					'accélérer',
					'Present',
					'ThirdPersonSingular',
					'Indicatif'
			),
			array (//regular
					'accélérons',
					'accélérer',
					'Present',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (//regular
					'accélérez',
					'accélérer',
					'Present',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'accélèrent',
					'accélérer',
					'Present',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'accélèrerai',
					'accélérer',
					'Futur',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'accélèreras',
					'accélérer',
					'Futur',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'accélèrera',
					'accélérer',
					'Futur',
					'ThirdPersonSingular',
					'Indicatif'
			),

			array (
					'accélèrerons',
					'accélérer',
					'Futur',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (
					'accélèrerez',
					'accélérer',
					'Futur',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'accélèreront',
					'accélérer',
					'Futur',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'accélère',
					'accélérer',
					'Present',
					'FirstPersonSingular',
					'Subjonctif'
			),
			array (
					'accélères',
					'accélérer',
					'Present',
					'SecondPersonSingular',
					'Subjonctif'
			),
			array (
					'accélère',
					'accélérer',
					'Present',
					'ThirdPersonSingular',
					'Subjonctif'
			),
			array (
					'accélérions',
					'accélérer',
					'Present',
					'FirstPersonPlural',
					'Subjonctif'
			),
			array (
					'accélériez',
					'accélérer',
					'Present',
					'SecondPersonPlural',
					'Subjonctif'
			),
			array (
					'accélèrent',
					'accélérer',
					'Present',
					'ThirdPersonPlural',
					'Subjonctif'
			),

			array (
					'accélèrerais',
					'accélérer',
					'Present',
					'FirstPersonSingular',
					'Conditionnel'
			),
			array (
					'accélèrerais',
					'accélérer',
					'Present',
					'SecondPersonSingular',
					'Conditionnel'
			),
			array (
					'accélèrerait',
					'accélérer',
					'Present',
					'ThirdPersonSingular',
					'Conditionnel'
			),
			array (
					'accélèrerions',
					'accélérer',
					'Present',
					'FirstPersonPlural',
					'Conditionnel'
			),
			array (
					'accélèreriez',
					'accélérer',
					'Present',
					'SecondPersonPlural',
					'Conditionnel'
			),
			array (
					'accélèreraient',
					'accélérer',
					'Present',
					'ThirdPersonPlural',
					'Conditionnel'
			),

			array (
					'accélère',
					'accélérer',
					'Present',
					'FirstPersonSingular',
					'Imperatif'
			)
	);
}
/**
 * @dataProvider E_Er_Provider
 */
public function testE_Er_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
	$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
}
public function E_Er_Provider() {
	return array (

			array (
					'pèse',
					'peser',
					'Present',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'pèses',
					'peser',
					'Present',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'pèse',
					'peser',
					'Present',
					'ThirdPersonSingular',
					'Indicatif'
			),
			array (//regular
					'pesons',
					'peser',
					'Present',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (//regular
					'pesez',
					'peser',
					'Present',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'pèsent',
					'peser',
					'Present',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'pèserai',
					'peser',
					'Futur',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'pèseras',
					'peser',
					'Futur',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'pèsera',
					'peser',
					'Futur',
					'ThirdPersonSingular',
					'Indicatif'
			),

			array (
					'pèserons',
					'peser',
					'Futur',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (
					'pèserez',
					'peser',
					'Futur',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'pèseront',
					'peser',
					'Futur',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'pèse',
					'peser',
					'Present',
					'FirstPersonSingular',
					'Subjonctif'
			),
			array (
					'pèses',
					'peser',
					'Present',
					'SecondPersonSingular',
					'Subjonctif'
			),
			array (
					'pèse',
					'peser',
					'Present',
					'ThirdPersonSingular',
					'Subjonctif'
			),
			array (//regular
					'pesions',
					'peser',
					'Present',
					'FirstPersonPlural',
					'Subjonctif'
			),
			array (//regular
					'pesiez',
					'peser',
					'Present',
					'SecondPersonPlural',
					'Subjonctif'
			),
			array (
					'pèsent',
					'peser',
					'Present',
					'ThirdPersonPlural',
					'Subjonctif'
			),

			array (
					'pèserais',
					'peser',
					'Present',
					'FirstPersonSingular',
					'Conditionnel'
			),
			array (
					'pèserais',
					'peser',
					'Present',
					'SecondPersonSingular',
					'Conditionnel'
			),
			array (
					'pèserait',
					'peser',
					'Present',
					'ThirdPersonSingular',
					'Conditionnel'
			),
			array (
					'pèserions',
					'peser',
					'Present',
					'FirstPersonPlural',
					'Conditionnel'
			),
			array (
					'pèseriez',
					'peser',
					'Present',
					'SecondPersonPlural',
					'Conditionnel'
			),
			array (
					'pèseraient',
					'peser',
					'Present',
					'ThirdPersonPlural',
					'Conditionnel'
			),

			array (
					'pèse',
					'peser',
					'Present',
					'FirstPersonSingular',
					'Imperatif'
			)
	);
}
/**
 * @dataProvider Envoyer_Provider
 */
public function testEnvoyer_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
	$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
}
public function Envoyer_Provider() {
	return array (		
			array (
					'envoie',
					'envoyer',
					'Present',
					'FirstPersonSingular',
					'Indicatif'
			),			
			array (
					'envoies',
					'envoyer',
					'Present',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'envoie',
					'envoyer',
					'Present',
					'ThirdPersonSingular',
					'Indicatif'
			),
			array (//regular
					'envoyons',
					'envoyer',
					'Present',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (//regular
					'envoyez',
					'envoyer',
					'Present',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'envoient',
					'envoyer',
					'Present',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'enverrai',
					'envoyer',
					'Futur',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'enverras',
					'envoyer',
					'Futur',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'enverra',
					'envoyer',
					'Futur',
					'ThirdPersonSingular',
					'Indicatif'
			),

			array (
					'enverrons',
					'envoyer',
					'Futur',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (
					'enverrez',
					'envoyer',
					'Futur',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'enverront',
					'envoyer',
					'Futur',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'envoie',
					'envoyer',
					'Present',
					'FirstPersonSingular',
					'Subjonctif'
			),
			array (
					'envoies',
					'envoyer',
					'Present',
					'SecondPersonSingular',
					'Subjonctif'
			),
			array (
					'envoie',
					'envoyer',
					'Present',
					'ThirdPersonSingular',
					'Subjonctif'
			),
			array (//regular
					'envoyions',
					'envoyer',
					'Present',
					'FirstPersonPlural',
					'Subjonctif'
			),
			array (//regular
					'envoyiez',
					'envoyer',
					'Present',
					'SecondPersonPlural',
					'Subjonctif'
			),
			array (
					'envoient',
					'envoyer',
					'Present',
					'ThirdPersonPlural',
					'Subjonctif'
			),

			array (
					'enverrais',
					'envoyer',
					'Present',
					'FirstPersonSingular',
					'Conditionnel'
			),
			array (
					'enverrais',
					'envoyer',
					'Present',
					'SecondPersonSingular',
					'Conditionnel'
			),
			array (
					'enverrait',
					'envoyer',
					'Present',
					'ThirdPersonSingular',
					'Conditionnel'
			),
			array (
					'enverrions',
					'envoyer',
					'Present',
					'FirstPersonPlural',
					'Conditionnel'
			),
			array (
					'enverriez',
					'envoyer',
					'Present',
					'SecondPersonPlural',
					'Conditionnel'
			),
			array (
					'enverraient',
					'envoyer',
					'Present',
					'ThirdPersonPlural',
					'Conditionnel'
			),

			array (
					'envoie',
					'envoyer',
					'Present',
					'FirstPersonSingular',
					'Imperatif'
			),
			
	);
}
				/**
				 * @dataProvider Devoir_Provider
				 */
				public function testDevoir_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
					$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
				}
				public function Devoir_Provider() {
					return array (
				array (
						'dois',
						'devoir',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'dois',
						'devoir',
						'Present',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'doit',
						'devoir',
						'Present',
						'ThirdPersonSingular',
						'Indicatif'
				),	
				array ( // with word_stem_ending_oir
						'devons',
						'devoir',
						'Present',
						'FirstPersonPlural',
						'Indicatif'
				),
				array ( // with word_stem_ending_oir
						'devez',
						'devoir',
						'Present',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (
						'doivent',
						'devoir',
						'Present',
						'ThirdPersonPlural',
						'Indicatif'
				),
				array (// with word_stem_ending_oir
						'devais',
						'devoir',
						'Imparfait',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (// with word_stem_ending_oir
						'devais',
						'devoir',
						'Imparfait',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (// with word_stem_ending_oir
						'devait',
						'devoir',
						'Imparfait',
						'ThirdPersonSingular',
						'Indicatif'
				),
				array ( // with word_stem_ending_oir
						'devions',
						'devoir',
						'Imparfait',
						'FirstPersonPlural',
						'Indicatif'
				),
				array ( // with word_stem_ending_oir
						'deviez',
						'devoir',
						'Imparfait',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (// with word_stem_ending_oir
						'devaient',
						'devoir',
						'Imparfait',
						'ThirdPersonPlural',
						'Indicatif'
				),
				
				array (
						'dus',
						'devoir',
						'Passe',
						'FirstPersonSingular',
						'Indicatif'
				),				
				array (
						'dus',
						'devoir',
						'Passe',
						'SecondPersonSingular',
						'Indicatif' 
				),
				array (
						'dut',
						'devoir',
						'Passe',
						'ThirdPersonSingular',
						'Indicatif'
				),
				
				array (
						'dûmes',
						'devoir',
						'Passe',
						'FirstPersonPlural',
						'Indicatif' 
				),
				array (
						'dûtes',
						'devoir',
						'Passe',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (
						'durent',
						'devoir',
						'Passe',
						'ThirdPersonPlural',
						'Indicatif'
				),	
				array (
						'durent',
						'devoir',
						'Passe',
						'ThirdPersonPlural',
						'Indicatif'
				),

				array (// with word_stem_ending_oir + changed oir ending
						'devrai',
						'devoir',
						'Futur',
						'FirstPersonSingular',
						'Indicatif'
				),				
				array (// with word_stem_ending_oir + changed oir ending
						'devras',
						'devoir',
						'Futur',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (// with word_stem_ending_oir + changed oir ending
						'devra',
						'devoir',
						'Futur',
						'ThirdPersonSingular',
						'Indicatif'
				),
				
				array (// with word_stem_ending_oir + changed oir ending
						'devrons',
						'devoir',
						'Futur',
						'FirstPersonPlural',
						'Indicatif'
				),
				array (// with word_stem_ending_oir + changed oir ending
						'devrez',
						'devoir',
						'Futur',
						'SecondPersonPlural',
						'Indicatif'
				),
				array (// with word_stem_ending_oir + changed oir ending
						'devront',
						'devoir',
						'Futur',
						'ThirdPersonPlural',
						'Indicatif'
				),

				array (
						'doive',
						'devoir',
						'Present',
						'FirstPersonSingular',
						'Subjonctif'
				),
				array (
						'doives',
						'devoir',
						'Present',
						'SecondPersonSingular',
						'Subjonctif'
				),
				array (
						'doive',
						'devoir',
						'Present',
						'ThirdPersonSingular',
						'Subjonctif'
				),
				array ( // with word_stem_ending_oir
						'devions',
						'devoir',
						'Present',
						'FirstPersonPlural',
						'Subjonctif'
				),
				array ( // with word_stem_ending_oir
						'deviez',
						'devoir',
						'Present',
						'SecondPersonPlural',
						'Subjonctif'
				),
				array (
						'doivent',
						'devoir',
						'Present',
						'ThirdPersonPlural',
						'Subjonctif'
				),
				
				array (// with word_stem_ending_mouvoir + changed oir ending
						'dusse',
						'devoir',
						'Imparfait',
						'FirstPersonSingular',
						'Subjonctif'
				),
				array (// with word_stem_ending_mouvoir + changed oir ending
						'dusses',
						'devoir',
						'Imparfait',
						'SecondPersonSingular',
						'Subjonctif'
				),
				array (// with word_stem_ending_mouvoir + changed oir ending
						'dût',
						'devoir',
						'Imparfait',
						'ThirdPersonSingular',
						'Subjonctif'
				),
				array (// with word_stem_ending_mouvoir + changed oir ending
						'dussions',
						'devoir',
						'Imparfait',
						'FirstPersonPlural',
						'Subjonctif'
				),
				array (// with word_stem_ending_mouvoir + changed oir ending
						'dussiez',
						'devoir',
						'Imparfait',
						'SecondPersonPlural',
						'Subjonctif'
				),				
				array (// with word_stem_ending_mouvoir + changed oir ending
						'dussent',
						'devoir',
						'Imparfait',
						'ThirdPersonPlural',
						'Subjonctif'
				),

				array ( // with word_stem_ending_oir + changed oir ending
						'devrais',
						'devoir',
						'Present',
						'FirstPersonSingular',
						'Conditionnel'
				),
				array ( // with word_stem_ending_oir + changed oir ending
						'devrais',
						'devoir',
						'Present',
						'SecondPersonSingular',
						'Conditionnel'
				),
				array ( // with word_stem_ending_oir + changed oir ending
						'devrait',
						'devoir',
						'Present',
						'ThirdPersonSingular',
						'Conditionnel'
				),
				array ( // with word_stem_ending_oir + changed oir ending
						'devrions',
						'devoir',
						'Present',
						'FirstPersonPlural',
						'Conditionnel'
				),
				array ( // with word_stem_ending_oir + changed oir ending
						'devriez',
						'devoir',
						'Present',
						'SecondPersonPlural',
						'Conditionnel'
				),
				array ( // with word_stem_ending_oir + changed oir ending
						'devraient',
						'devoir',
						'Present',
						'ThirdPersonPlural',
						'Conditionnel'
				),
				
				array (
						'dois',
						'devoir',
						'Present',
						'FirstPersonSingular',
						'Imperatif'
				)
		);
}
/**
 * @dataProvider Mouvoir_Provider
 */
public function testMouvoir_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
	$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
}
public function Mouvoir_Provider() {
	return array (
			array (
					'meus',
					'mouvoir',
					'Present',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'meus',
					'mouvoir',
					'Present',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'meut',
					'mouvoir',
					'Present',
					'ThirdPersonSingular',
					'Indicatif'
			),
			array ( // with word_stem_ending_oir
					'mouvons',
					'mouvoir',
					'Present',
					'FirstPersonPlural',
					'Indicatif'
			),
			array ( // with word_stem_ending_oir
					'mouvez',
					'mouvoir',
					'Present',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'meuvent',
					'mouvoir',
					'Present',
					'ThirdPersonPlural',
					'Indicatif'
			),
			array (// with word_stem_ending_oir
					'mouvais',
					'mouvoir',
					'Imparfait',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (// with word_stem_ending_oir
					'mouvais',
					'mouvoir',
					'Imparfait',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (// with word_stem_ending_oir
					'mouvait',
					'mouvoir',
					'Imparfait',
					'ThirdPersonSingular',
					'Indicatif'
			),
			array ( // with word_stem_ending_oir
					'mouvions',
					'mouvoir',
					'Imparfait',
					'FirstPersonPlural',
					'Indicatif'
			),
			array ( // with word_stem_ending_oir
					'mouviez',
					'mouvoir',
					'Imparfait',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (// with word_stem_ending_oir
					'mouvaient',
					'mouvoir',
					'Imparfait',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'mus',
					'mouvoir',
					'Passe',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'mus',
					'mouvoir',
					'Passe',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'mut',
					'mouvoir',
					'Passe',
					'ThirdPersonSingular',
					'Indicatif'
			),

			array (
					'mûmes',
					'mouvoir',
					'Passe',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (
					'mûtes',
					'mouvoir',
					'Passe',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'murent',
					'mouvoir',
					'Passe',
					'ThirdPersonPlural',
					'Indicatif'
			),
			array (// with word_stem_ending_oir + changed oir ending
					'mouvrai',
					'mouvoir',
					'Futur',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (// with word_stem_ending_oir + changed oir ending
					'mouvras',
					'mouvoir',
					'Futur',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (// with word_stem_ending_oir + changed oir ending
					'mouvra',
					'mouvoir',
					'Futur',
					'ThirdPersonSingular',
					'Indicatif'
			),

			array (// with word_stem_ending_oir + changed oir ending
					'mouvrons',
					'mouvoir',
					'Futur',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (// with word_stem_ending_oir + changed oir ending
					'mouvrez',
					'mouvoir',
					'Futur',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (// with word_stem_ending_oir + changed oir ending
					'mouvront',
					'mouvoir',
					'Futur',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'meuve',
					'mouvoir',
					'Present',
					'FirstPersonSingular',
					'Subjonctif'
			),
			array (
					'meuves',
					'mouvoir',
					'Present',
					'SecondPersonSingular',
					'Subjonctif'
			),
			array (
					'meuve',
					'mouvoir',
					'Present',
					'ThirdPersonSingular',
					'Subjonctif'
			),
			array ( // with word_stem_ending_oir
					'mouvions',
					'mouvoir',
					'Present',
					'FirstPersonPlural',
					'Subjonctif'
			),
			array ( // with word_stem_ending_oir
					'mouviez',
					'mouvoir',
					'Present',
					'SecondPersonPlural',
					'Subjonctif'
			),
			array (
					'meuvent',
					'mouvoir',
					'Present',
					'ThirdPersonPlural',
					'Subjonctif'
			),

			array (// with word_stem_ending_mouvoir + changed oir ending
					'musse',
					'mouvoir',
					'Imparfait',
					'FirstPersonSingular',
					'Subjonctif'
			),
			array (// with word_stem_ending_mouvoir + changed oir ending
					'musses',
					'mouvoir',
					'Imparfait',
					'SecondPersonSingular',
					'Subjonctif'
			),
			array (// with word_stem_ending_mouvoir + changed oir ending
					'mût',
					'mouvoir',
					'Imparfait',
					'ThirdPersonSingular',
					'Subjonctif'
			),
			array (// with word_stem_ending_mouvoir + changed oir ending
					'mussions',
					'mouvoir',
					'Imparfait',
					'FirstPersonPlural',
					'Subjonctif'
			),
			array (// with word_stem_ending_mouvoir + changed oir ending
					'mussiez',
					'mouvoir',
					'Imparfait',
					'SecondPersonPlural',
					'Subjonctif'
			),
			array (// with word_stem_ending_mouvoir + changed oir ending
					'mussent',
					'mouvoir',
					'Imparfait',
					'ThirdPersonPlural',
					'Subjonctif'
			),

			array ( // with word_stem_ending_oir + changed oir ending
					'mouvrais',
					'mouvoir',
					'Present',
					'FirstPersonSingular',
					'Conditionnel'
			),
			array ( // with word_stem_ending_oir + changed oir ending
					'mouvrais',
					'mouvoir',
					'Present',
					'SecondPersonSingular',
					'Conditionnel'
			),
			array ( // with word_stem_ending_oir + changed oir ending
					'mouvrait',
					'mouvoir',
					'Present',
					'ThirdPersonSingular',
					'Conditionnel'
			),
			array ( // with word_stem_ending_oir + changed oir ending
					'mouvrions',
					'mouvoir',
					'Present',
					'FirstPersonPlural',
					'Conditionnel'
			),
			array ( // with word_stem_ending_oir + changed oir ending
					'mouvriez',
					'mouvoir',
					'Present',
					'SecondPersonPlural',
					'Conditionnel'
			),
			array ( // with word_stem_ending_oir + changed oir ending
					'mouvraient',
					'mouvoir',
					'Present',
					'ThirdPersonPlural',
					'Conditionnel'
			),

			array (
					'meus',
					'mouvoir',
					'Present',
					'FirstPersonSingular',
					'Imperatif'
			)
	);
}
/**
 * @dataProvider Pouvoir_Provider
 */
public function testPouvoir_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
	$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
}
public function Pouvoir_Provider() {
	return array (
			array (
					'peux',
					'pouvoir',
					'Present',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'peux',
					'pouvoir',
					'Present',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'peut',
					'pouvoir',
					'Present',
					'ThirdPersonSingular',
					'Indicatif'
			),
			array ( // with word_stem_ending_oir
					'pouvons',
					'pouvoir',
					'Present',
					'FirstPersonPlural',
					'Indicatif'
			),
			array ( // with word_stem_ending_oir
					'pouvez',
					'pouvoir',
					'Present',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'peuvent',
					'pouvoir',
					'Present',
					'ThirdPersonPlural',
					'Indicatif'
			),
			array (// with word_stem_ending_oir
					'pouvais',
					'pouvoir',
					'Imparfait',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (// with word_stem_ending_oir
					'pouvais',
					'pouvoir',
					'Imparfait',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (// with word_stem_ending_oir
					'pouvait',
					'pouvoir',
					'Imparfait',
					'ThirdPersonSingular',
					'Indicatif'
			),
			array ( // with word_stem_ending_oir
					'pouvions',
					'pouvoir',
					'Imparfait',
					'FirstPersonPlural',
					'Indicatif'
			),
			array ( // with word_stem_ending_oir
					'pouviez',
					'pouvoir',
					'Imparfait',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (// with word_stem_ending_oir
					'pouvaient',
					'pouvoir',
					'Imparfait',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'pus',
					'pouvoir',
					'Passe',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'pus',
					'pouvoir',
					'Passe',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'put',
					'pouvoir',
					'Passe',
					'ThirdPersonSingular',
					'Indicatif'
			),

			array (
					'pûmes',
					'pouvoir',
					'Passe',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (
					'pûtes',
					'pouvoir',
					'Passe',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'purent',
					'pouvoir',
					'Passe',
					'ThirdPersonPlural',
					'Indicatif'
			),
			array (// word_stem pour + changed oir ending
					'pourrai',
					'pouvoir',
					'Futur',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (// word_stem pour + changed oir ending
					'pourras',
					'pouvoir',
					'Futur',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (// word_stem pour + changed oir ending
					'pourra',
					'pouvoir',
					'Futur',
					'ThirdPersonSingular',
					'Indicatif'
			),

			array (// word_stem pour + changed oir ending
					'pourrons',
					'pouvoir',
					'Futur',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (// word_stem pour + changed oir ending
					'pourrez',
					'pouvoir',
					'Futur',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (// word_stem pour + changed oir ending
					'pourront',
					'pouvoir',
					'Futur',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'puisse',
					'pouvoir',
					'Present',
					'FirstPersonSingular',
					'Subjonctif'
			),
			array (
					'puisses',
					'pouvoir',
					'Present',
					'SecondPersonSingular',
					'Subjonctif'
			),
			array (
					'puisse',
					'pouvoir',
					'Present',
					'ThirdPersonSingular',
					'Subjonctif'
			),
			array ( 
					'puissions',
					'pouvoir',
					'Present',
					'FirstPersonPlural',
					'Subjonctif'
			),
			array ( 
					'puissiez',
					'pouvoir',
					'Present',
					'SecondPersonPlural',
					'Subjonctif'
			),
			array (
					'puissent',
					'pouvoir',
					'Present',
					'ThirdPersonPlural',
					'Subjonctif'
			),

			array (// with word_stem_ending_mouvoir + changed oir ending
					'pusse',
					'pouvoir',
					'Imparfait',
					'FirstPersonSingular',
					'Subjonctif'
			),
			array (// with word_stem_ending_mouvoir + changed oir ending
					'pusses',
					'pouvoir',
					'Imparfait',
					'SecondPersonSingular',
					'Subjonctif'
			),
			array (// with word_stem_ending_mouvoir + changed oir ending
					'pût',
					'pouvoir',
					'Imparfait',
					'ThirdPersonSingular',
					'Subjonctif'
			),
			array (// word_stem pour + changed oir ending
					'pussions',
					'pouvoir',
					'Imparfait',
					'FirstPersonPlural',
					'Subjonctif'
			),
			array (// word_stem pour + changed oir ending
					'pussiez',
					'pouvoir',
					'Imparfait',
					'SecondPersonPlural',
					'Subjonctif'
			),
			array (// word_stem pour + changed oir ending
					'pussent',
					'pouvoir',
					'Imparfait',
					'ThirdPersonPlural',
					'Subjonctif'
			),

			array (// word_stem pour + changed oir ending
					'pourrais',
					'pouvoir',
					'Present',
					'FirstPersonSingular',
					'Conditionnel'
			),
			array (// word_stem pour + changed oir ending
					'pourrais',
					'pouvoir',
					'Present',
					'SecondPersonSingular',
					'Conditionnel'
			),
			array (// word_stem pour + changed oir ending
					'pourrait',
					'pouvoir',
					'Present',
					'ThirdPersonSingular',
					'Conditionnel'
			),
			array ( // with word_stem_ending_oir + changed oir ending
					'pourrions',
					'pouvoir',
					'Present',
					'FirstPersonPlural',
					'Conditionnel'
			),
			array ( // with word_stem_ending_oir + changed oir ending
					'pourriez',
					'pouvoir',
					'Present',
					'SecondPersonPlural',
					'Conditionnel'
			),
			array ( // with word_stem_ending_oir + changed oir ending
					'pourraient',
					'pouvoir',
					'Present',
					'ThirdPersonPlural',
					'Conditionnel'
			)
	);
}
/**
 * @dataProvider Savoir_Provider
 */
public function testSavoir_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
	$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
}
public function Savoir_Provider() {
	return array (
			array (
					'sais',
					'savoir',
					'Present',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'sais',
					'savoir',
					'Present',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'sait',
					'savoir',
					'Present',
					'ThirdPersonSingular',
					'Indicatif'
			),
			array ( // with word_stem_ending_oir
					'savons',
					'savoir',
					'Present',
					'FirstPersonPlural',
					'Indicatif'
			),
			array ( // with word_stem_ending_oir
					'savez',
					'savoir',
					'Present',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'savent',
					'savoir',
					'Present',
					'ThirdPersonPlural',
					'Indicatif'
			),
			array (// with word_stem_ending_oir
					'savais',
					'savoir',
					'Imparfait',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (// with word_stem_ending_oir
					'savais',
					'savoir',
					'Imparfait',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (// with word_stem_ending_oir
					'savait',
					'savoir',
					'Imparfait',
					'ThirdPersonSingular',
					'Indicatif'
			),
			array ( // with word_stem_ending_oir
					'savions',
					'savoir',
					'Imparfait',
					'FirstPersonPlural',
					'Indicatif'
			),
			array ( // with word_stem_ending_oir
					'saviez',
					'savoir',
					'Imparfait',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (// with word_stem_ending_oir
					'savaient',
					'savoir',
					'Imparfait',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'sus',
					'savoir',
					'Passe',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (
					'sus',
					'savoir',
					'Passe',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (
					'sut',
					'savoir',
					'Passe',
					'ThirdPersonSingular',
					'Indicatif'
			),

			array (
					'sûmes',
					'savoir',
					'Passe',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (
					'sûtes',
					'savoir',
					'Passe',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (
					'surent',
					'savoir',
					'Passe',
					'ThirdPersonPlural',
					'Indicatif'
			),
			array (// word_stem sau + changed oir ending
					'saurai',
					'savoir',
					'Futur',
					'FirstPersonSingular',
					'Indicatif'
			),
			array (// word_stem sau + changed oir ending
					'sauras',
					'savoir',
					'Futur',
					'SecondPersonSingular',
					'Indicatif'
			),
			array (// word_stem sau + changed oir ending
					'saura',
					'savoir',
					'Futur',
					'ThirdPersonSingular',
					'Indicatif'
			),

			array (// word_stem sau + changed oir ending
					'saurons',
					'savoir',
					'Futur',
					'FirstPersonPlural',
					'Indicatif'
			),
			array (// word_stem sau + changed oir ending
					'saurez',
					'savoir',
					'Futur',
					'SecondPersonPlural',
					'Indicatif'
			),
			array (// word_stem sau + changed oir ending
					'sauront',
					'savoir',
					'Futur',
					'ThirdPersonPlural',
					'Indicatif'
			),

			array (
					'sache',
					'savoir',
					'Present',
					'FirstPersonSingular',
					'Subjonctif'
			),
			array (
					'saches',
					'savoir',
					'Present',
					'SecondPersonSingular',
					'Subjonctif'
			),
			array (
					'sache',
					'savoir',
					'Present',
					'ThirdPersonSingular',
					'Subjonctif'
			),
			array ( 
					'sachions',
					'savoir',
					'Present',
					'FirstPersonPlural',
					'Subjonctif'
			),
			array ( 
					'sachiez',
					'savoir',
					'Present',
					'SecondPersonPlural',
					'Subjonctif'
			),
			array (
					'sachent',
					'savoir',
					'Present',
					'ThirdPersonPlural',
					'Subjonctif'
			),

			array (// with word_stem_ending_mouvoir + changed oir ending
					'susse',
					'savoir',
					'Imparfait',
					'FirstPersonSingular',
					'Subjonctif'
			),
			array (// with word_stem_ending_mouvoir + changed oir ending
					'susses',
					'savoir',
					'Imparfait',
					'SecondPersonSingular',
					'Subjonctif'
			),
			array (// with word_stem_ending_mouvoir + changed oir ending
					'sût',
					'savoir',
					'Imparfait',
					'ThirdPersonSingular',
					'Subjonctif'
			),
			array (// with word_stem_ending_mouvoir + changed oir ending
					'sussions',
					'savoir',
					'Imparfait',
					'FirstPersonPlural',
					'Subjonctif'
			),
			array (// with word_stem_ending_mouvoir + changed oir ending
					'sussiez',
					'savoir',
					'Imparfait',
					'SecondPersonPlural',
					'Subjonctif'
			),
			array (// with word_stem_ending_mouvoir + changed oir ending
					'sussent',
					'savoir',
					'Imparfait',
					'ThirdPersonPlural',
					'Subjonctif'
			),

			array ( // word_stem sau + changed oir ending
					'saurais',
					'savoir',
					'Present',
					'FirstPersonSingular',
					'Conditionnel'
			),
			array ( // word_stem sau + changed oir ending
					'saurais',
					'savoir',
					'Present',
					'SecondPersonSingular',
					'Conditionnel'
			),
			array ( // word_stem sau + changed oir ending
					'saurait',
					'savoir',
					'Present',
					'ThirdPersonSingular',
					'Conditionnel'
			),
			array ( // word_stem sau + changed oir ending
					'saurions',
					'savoir',
					'Present',
					'FirstPersonPlural',
					'Conditionnel'
			),
			array ( // word_stem sau + changed oir ending
					'sauriez',
					'savoir',
					'Present',
					'SecondPersonPlural',
					'Conditionnel'
			),
			array ( // word_stem sau + changed oir ending
					'sauraient',
					'savoir',
					'Present',
					'ThirdPersonPlural',
					'Conditionnel'
			),

			array (
					'sache',
					'savoir',
					'Present',
					'FirstPersonSingular',
					'Imperatif'
			),
			array (
					'sachons',
					'savoir',
					'Present',
					'FirstPersonPlural',
					'Imperatif'
			),
			array (
					'sachez',
					'savoir',
					'Present',
					'SecondPersonPlural',
					'Imperatif'
			)			
	);
}
				/**
				 * @dataProvider Vetir_Provider
				 */
				public function testVetir_Provider($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
					$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
				}
				public function Vetir_Provider() {
					return array (
				array (
						'vêts',
						'vêtir',
						'Present',
						'FirstPersonSingular',
						'Indicatif'
				),
				array (
						'vêts',
						'vêtir',
						'Present',
						'SecondPersonSingular',
						'Indicatif'
				),
				array (
						'vêt',
						'vêtir',
						'Present',
						'ThirdPersonSingular',
						'Indicatif'
				),
				array (
						'vêts',
						'vêtir',
						'Present',
						'FirstPersonSingular',
						'Imperatif'
				),
		);
	}	
}
?>

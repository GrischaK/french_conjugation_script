<?php
require_once 'conjugate.php';

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
	
	/**
	 * @dataProvider UnregularVerbProvider
	 */
	public function testUnregularVerb($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
			$this->assertEquals ( $expectedResult, conjugate ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
	}
	public function UnregularVerbProvider() {
		return array (
   // MOUVOIR
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
						'mouvez',
						'mouvoir',
						'Present',
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
				
				array (
						'mus',
						'mouvoir',
						'Passe',
						'FirstPersonSingular',
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
				),
				
				array (
						'musse',
						'mouvoir',
						'Imparfait',
						'FirstPersonSingular',
						'Subjonctif'
				),
				array (
						'musses',
						'mouvoir',
						'Imparfait',
						'SecondPersonSingular',
						'Subjonctif'
				),
				array (
						'mût',
						'mouvoir',
						'Imparfait',
						'ThirdPersonSingular',
						'Subjonctif'
				),
				array (
						'mussions',
						'mouvoir',
						'Imparfait',
						'FirstPersonPlural',
						'Subjonctif'
				),
				array (
						'mussiez',
						'mouvoir',
						'Imparfait',
						'SecondPersonPlural',
						'Subjonctif'
				),
				array (
						'mussent',
						'mouvoir',
						'Imparfait',
						'ThirdPersonPlural',
						'Subjonctif'
				),				
	// VETIR
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

<?php
require 'conjugate.php';

class ConjugateFrenchVerbTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider regularVerbProvider
	 */
	public function testRegularVerb($expectedResult, $verb, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, conjugate ( $verb, $person, $tense, $mood ) );
	}						
	public function regularVerbProvider() {
		;
		return array (
				array (
						"aime",
						"aimer",
						new Tense(Tense::Present),
						Person::FirstPersonSingular,
						Mood::Indicatif 
				),
				array (
						"aimes",
						"aimer",
						new Tense(Tense::Present),
						Person::SecondPersonSingular,
						Mood::Indicatif 
				),
				array (
						"aime",
						"aimer",
						new Tense(Tense::Present),
						Person::ThirdPersonSingular,
						Mood::Indicatif 
				),
				array (
						"aimons",
						"aimer",
						new Tense(Tense::Present),
						Person::FirstPersonPlural,
						Mood::Indicatif 
				),
				array (
						"aimez",
						"aimer",
						new Tense(Tense::Present),
						Person::SecondPersonPlural,
						Mood::Indicatif 
				),
				array (
						"aiment",
						"aimer",
						new Tense(Tense::Present),
						Person::ThirdPersonPlural,
						Mood::Indicatif 
				),
				array (
						"donne",
						"donner",
						new Tense(Tense::Present),
						Person::FirstPersonSingular,
						Mood::Indicatif 
				),
				array (
						"donnes",
						"donner",
						new Tense(Tense::Present),
						Person::SecondPersonSingular,
						Mood::Indicatif 
				),
				array (
						"donne",
						"donner",
						new Tense(Tense::Present),
						Person::ThirdPersonSingular,
						Mood::Indicatif 
				),
				array (
						"donnons",
						"donner",
						new Tense(Tense::Present),
						Person::FirstPersonPlural,
						Mood::Indicatif 
				),
				array (
						"donnez",
						"donner",
						new Tense(Tense::Present),
						Person::SecondPersonPlural,
						Mood::Indicatif 
				),
				array (
						"donnent",
						"donner",
						new Tense(Tense::Present),
						Person::ThirdPersonPlural,
						Mood::Indicatif 
				) 
		);		
	}
}
?>
<?php
require 'conjugate.php';
class ConjugateFrenchVerbTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider regularVerbProvider
	 */
	public function testRegularVerb($expectedResult, $verb, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, conjugate ( $verb, $tense, $person, $mood ) );
	}
	public function regularVerbProvider() {
		return array (
				array (
						"aime",
						"aimer",
						Tense::Present,
						Person::FirstPersonSingular,
						Mood::Indicatif 
				),
				array (
						"aimes",
						"aimer",
						Tense::Present,
						Person::SecondPersonSingular,
						Mood::Indicatif 
				),
				array (
						"aime",
						"aimer",
						Tense::Present,
						Person::ThirdPersonSingular,
						Mood::Indicatif 
				),
				array (
						"aimons",
						"aimer",
						Tense::Present,
						Person::FirstPersonPlural,
						Mood::Indicatif 
				),
				array (
						"aimez",
						"aimer",
						Tense::Present,
						Person::SecondPersonPlural,
						Mood::Indicatif 
				),
				array (
						"aiment",
						"aimer",
						Tense::Present,
						Person::ThirdPersonPlural,
						Mood::Indicatif 
				),
				array (
						"donne",
						"donner",
						Tense::Present,
						Person::FirstPersonSingular,
						Mood::Indicatif 
				),
				array (
						"donnes",
						"donner",
						Tense::Present,
						Person::SecondPersonSingular,
						Mood::Indicatif 
				),
				array (
						"donne",
						"donner",
						Tense::Present,
						Person::ThirdPersonSingular,
						Mood::Indicatif 
				),
				array (
						"donnons",
						"donner",
						Tense::Present,
						Person::FirstPersonPlural,
						Mood::Indicatif 
				),
				array (
						"donnez",
						"donner",
						Tense::Present,
						Person::SecondPersonPlural,
						Mood::Indicatif 
				),
				array (
						"donnent",
						"donner",
						Tense::Present,
						Person::ThirdPersonPlural,
						Mood::Indicatif 
				) 
		);		
	}
}
?>
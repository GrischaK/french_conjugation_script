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
						Mood::Indicative 
				),
				array (
						"aimes",
						"aimer",
						Tense::Present,
						Person::SecondPersonSingular,
						Mood::Indicative 
				),
				array (
						"aime",
						"aimer",
						Tense::Present,
						Person::ThirdPersonSingular,
						Mood::Indicative 
				),
				array (
						"aimons",
						"aimer",
						Tense::Present,
						Person::FirstPersonPlural,
						Mood::Indicative 
				),
				array (
						"aimez",
						"aimer",
						Tense::Present,
						Person::SecondPersonPlural,
						Mood::Indicative 
				),
				array (
						"aiment",
						"aimer",
						Tense::Present,
						Person::ThirdPersonPlural,
						Mood::Indicative 
				) 
		);
return array (
				array (
						"donne",
						"donner",
						Tense::Present,
						Person::FirstPersonSingular,
						Mood::Indicative 
				),
				array (
						"donnes",
						"donner",
						Tense::Present,
						Person::SecondPersonSingular,
						Mood::Indicative 
				),
				array (
						"donne",
						"donner",
						Tense::Present,
						Person::ThirdPersonSingular,
						Mood::Indicative 
				),
				array (
						"donnons",
						"donner",
						Tense::Present,
						Person::FirstPersonPlural,
						Mood::Indicative 
				),
				array (
						"donnez",
						"donner",
						Tense::Present,
						Person::SecondPersonPlural,
						Mood::Indicative 
				),
				array (
						"donnent",
						"donner",
						Tense::Present,
						Person::ThirdPersonPlural,
						Mood::Indicative 
				) 
		);		
	}
}
?>
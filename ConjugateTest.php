<?php
require 'conjugate.php';

class ConjugateFrenchVerbTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider regularVerbProvider
	 */
	public function testRegularVerb($expectedResult, $verb, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, conjugate ( $verb, $person, new Tense($tense), $mood ) );
	}						
	public function regularVerbProvider() {
		;
		return array (
				array (
						"aime",
						"aimer",
						'Present',
						Person::FirstPersonSingular,
						Mood::Indicatif 
				),
				array (
						"aimes",
						"aimer",
						'Present',

						Person::SecondPersonSingular,
						Mood::Indicatif 
				),
				array (
						"aime",
						"aimer",
						'Present',
						Person::ThirdPersonSingular,
						Mood::Indicatif 
				),
				array (
						"aimons",
						"aimer",
						'Present',
						Person::FirstPersonPlural,
						Mood::Indicatif 
				),
				array (
						"aimez",
						"aimer",
						'Present',
						Person::SecondPersonPlural,
						Mood::Indicatif 
				),
				array (
						"aiment",
						"aimer",
						'Present',
						Person::ThirdPersonPlural,
						Mood::Indicatif 
				),
				array (
						"donne",
						"donner",
						'Present',
						Person::FirstPersonSingular,
						Mood::Indicatif 
				),
				array (
						"donnes",
						"donner",
						'Present',
						Person::SecondPersonSingular,
						Mood::Indicatif 
				),
				array (
						"donne",
						"donner",
						'Present',
						Person::ThirdPersonSingular,
						Mood::Indicatif 
				),
				array (
						"donnons",
						"donner",
						'Present',
						Person::FirstPersonPlural,
						Mood::Indicatif 
				),
				array (
						"donnez",
						"donner",
						'Present',
						Person::SecondPersonPlural,
						Mood::Indicatif 
				),
				array (
						"donnent",
						"donner",
						'Present',
						Person::ThirdPersonPlural,
						Mood::Indicatif 
				) 
		);		
	}
}
?>

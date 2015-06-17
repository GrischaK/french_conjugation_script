<?php
require 'conjugate.php';
class AuxiliaireTest extends PHPUnit_Framework_TestCase {
	

	/**
	 * @dataProvider regularAuxiliaireProvider
	 */
	public function testAuxiliaire($expectedResult, $verb) {
		$this->assertEquals ( $expectedResult, finding_auxiliaire($verb) );
	}
	public function regularAuxiliaireProvider() {
		return array (
				array (
						Auxiliaire::Etre,
						"accourir" 
				) 
		);
	}
	
	/**
	 * @dataProvider AuxiliaireVerbProvider
	 */
	public function testAuxiliaireVerb($expectedResult, $auxiliaire, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, conjugated_auxiliaire ( $auxiliaire, $person, $tense, $mood ) );
	}
	public function AuxiliaireVerbProvider() {
		return array (
				array (
						"suis",
						Auxiliaire::Etre,
						Tense::Passe_compose,
						Person::FirstPersonSingular,
						Mood::Indicatif
				),
				array (
						"es",
						Auxiliaire::Etre,
						Tense::Passe_compose,
						Person::SecondPersonSingular,
						Mood::Indicatif
				),
				array (
						"est",
						Auxiliaire::Etre,
						Tense::Passe_compose,
						Person::ThirdPersonSingular,
						Mood::Indicatif
				),
				array (
						"sommes",
						Auxiliaire::Etre,
						Tense::Passe_compose,
						Person::FirstPersonPlural,
						Mood::Indicatif
				),
				array (
						"êtes",
						Auxiliaire::Etre,
						Tense::Passe_compose,
						Person::SecondPersonPlural,
						Mood::Indicatif
				),
				array (
						"sont",
						Auxiliaire::Etre,
						Tense::Passe_compose,
						Person::ThirdPersonPlural,
						Mood::Indicatif
				),
				array (
						"ai",
						Auxiliaire::Avoir,
						Tense::Passe_compose,
						Person::FirstPersonSingular,
						Mood::Indicatif
				),
				array (
						"as",
						Auxiliaire::Avoir,
						Tense::Passe_compose,
						Person::SecondPersonSingular,
						Mood::Indicatif
				),
				array (
						"a",
						Auxiliaire::Avoir,
						Tense::Passe_compose,
						Person::ThirdPersonSingular,
						Mood::Indicatif
				),
				array (
						"avons",
						Auxiliaire::Avoir,
						Tense::Passe_compose,
						Person::FirstPersonPlural,
						Mood::Indicatif
				),
				array (
						"avez",
						Auxiliaire::Avoir,
						Tense::Passe_compose,
						Person::SecondPersonPlural,
						Mood::Indicatif
				),
				array (
						"ont",
						Auxiliaire::Avoir,
						Tense::Passe_compose,
						Person::ThirdPersonPlural,
						Mood::Indicatif
				)
		);
}

}



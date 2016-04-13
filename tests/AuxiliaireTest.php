<?php
require_once '../conjugate.php';
class AuxiliaireTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider regularAuxiliaireProvider
	 */
	public function testAuxiliaire($expectedResult, $infinitiveVerb) {
		$this->assertEquals ( new Auxiliaire ( $expectedResult ), finding_auxiliaire ( new InfinitiveVerb ( $infinitiveVerb ) ) );
	}
	public function regularAuxiliaireProvider() {
		return [ 
				[ 
						'Etre',
						'accourir' 
				] 
		];
	}
	
	/**
	 * @dataProvider AuxiliaireVerbProvider
	 */
	public function testAuxiliaireVerb($expectedResult, $auxiliaire, $tense, $person, $mood, $voice, $sentencetype) {
		$this->assertEquals ( $expectedResult, conjugated_auxiliaire ( new Auxiliaire ( $auxiliaire ), new Person ( $person ), new Tense ( $tense ), new Mood ( $mood ), new Voice ( $voice ), new SentenceType ( $sentencetype ) ) );
	}
	public function AuxiliaireVerbProvider() {
		return [ 
				[ 
						"suis",
						Auxiliaire::Etre,
						Tense::Passe_compose,
						Person::FirstPersonSingular,
						Mood::Indicatif,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						"es",
						Auxiliaire::Etre,
						Tense::Passe_compose,
						Person::SecondPersonSingular,
						Mood::Indicatif,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						"est",
						Auxiliaire::Etre,
						Tense::Passe_compose,
						Person::ThirdPersonSingular,
						Mood::Indicatif,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						"sommes",
						Auxiliaire::Etre,
						Tense::Passe_compose,
						Person::FirstPersonPlural,
						Mood::Indicatif,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						"êtes",
						Auxiliaire::Etre,
						Tense::Passe_compose,
						Person::SecondPersonPlural,
						Mood::Indicatif,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						"sont",
						Auxiliaire::Etre,
						Tense::Passe_compose,
						Person::ThirdPersonPlural,
						Mood::Indicatif,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						"ai",
						Auxiliaire::Avoir,
						Tense::Passe_compose,
						Person::FirstPersonSingular,
						Mood::Indicatif,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						"as",
						Auxiliaire::Avoir,
						Tense::Passe_compose,
						Person::SecondPersonSingular,
						Mood::Indicatif,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						"a",
						Auxiliaire::Avoir,
						Tense::Passe_compose,
						Person::ThirdPersonSingular,
						Mood::Indicatif,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						"avons",
						Auxiliaire::Avoir,
						Tense::Passe_compose,
						Person::FirstPersonPlural,
						Mood::Indicatif,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						"avez",
						Auxiliaire::Avoir,
						Tense::Passe_compose,
						Person::SecondPersonPlural,
						Mood::Indicatif,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						"ont",
						Auxiliaire::Avoir,
						Tense::Passe_compose,
						Person::ThirdPersonPlural,
						Mood::Indicatif,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				] 
		];
	}
}



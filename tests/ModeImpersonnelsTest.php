<?php
require_once '../conjugate.php';
class ModeImpersonnelsTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider modeImpersonnelsTestProvider
	 */
	public function testModeImpersonnels($expectedResult, $infinitiveVerb, $auxiliaire, $mode, $tense, $gender, $voice, $sentencetype) {
		$this->assertEquals ( $expectedResult, modes_impersonnels ( new InfinitiveVerb ( $infinitiveVerb ), new Auxiliaire ( $auxiliaire ), new Mode ( $mode ), new Tense ( $tense ), new Gender ( $gender ), new Voice ( $voice ), new SentenceType ( $sentencetype ) ) );
	}
	public function modeImpersonnelsTestProvider() {
		;
		return [ 
				[ 
						'aimer',
						'aimer',
						Auxiliaire::Avoir,
						Mode::Infinitif,
						Tense::Present,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'ne pas aimer',
						'aimer',
						Auxiliaire::Avoir,
						Mode::Infinitif,
						Tense::Present,
						Gender::Masculine,
						Voice::Active,
						SentenceType::Negation 
				],
				[ 
						'être aimé',
						'aimer',
						Auxiliaire::Avoir,
						Mode::Infinitif,
						Tense::Present,
						Gender::Masculine,
						Voice::Passive,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'avoir aimé',
						'aimer',
						Auxiliaire::Avoir,
						Mode::Infinitif,
						Tense::Passe,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'avoir été aimé',
						'aimer',
						Auxiliaire::Avoir,
						Mode::Infinitif,
						Tense::Passe,
						Gender::Masculine,
						Voice::Passive,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'en aimant',
						'aimer',
						Auxiliaire::Avoir,
						Mode::Gerondif,
						Tense::Present,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'en ayant aimé',
						'aimer',
						Auxiliaire::Avoir,
						Mode::Gerondif,
						Tense::Passe,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'aimant',
						'aimer',
						Auxiliaire::Avoir,
						Mode::Participe,
						Tense::Present,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'aimé',
						'aimer',
						Auxiliaire::Avoir,
						Mode::Participe,
						Tense::Passe,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				
				[ 
						'amuser',
						'amuser',
						Auxiliaire::Avoir,
						Mode::Infinitif,
						Tense::Present,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'avoir amusé',
						'amuser',
						Auxiliaire::Avoir,
						Mode::Infinitif,
						Tense::Passe,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'avoir amusé',
						'amuser',
						Auxiliaire::Avoir,
						Mode::Infinitif,
						Tense::Passe,
						Gender::Feminine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'en amusant',
						'amuser',
						Auxiliaire::Avoir,
						Mode::Gerondif,
						Tense::Present,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'en ayant amusé',
						'amuser',
						Auxiliaire::Avoir,
						Mode::Gerondif,
						Tense::Passe,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'en ayant amusé',
						'amuser',
						Auxiliaire::Avoir,
						Mode::Gerondif,
						Tense::Passe,
						Gender::Feminine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'en ayant été amusé',
						'amuser',
						Auxiliaire::Avoir,
						Mode::Gerondif,
						Tense::Passe,
						Gender::Masculine,
						Voice::Passive,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'en ayant été amusée',
						'amuser',
						Auxiliaire::Avoir,
						Mode::Gerondif,
						Tense::Passe,
						Gender::Feminine,
						Voice::Passive,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'amusant',
						'amuser',
						Auxiliaire::Avoir,
						Mode::Participe,
						Tense::Present,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'amusé',
						'amuser',
						Auxiliaire::Avoir,
						Mode::Participe,
						Tense::Passe,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'amusé',
						'amuser',
						Auxiliaire::Avoir,
						Mode::Participe,
						Tense::Passe,
						Gender::Feminine,
						Voice::Active,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'ayant été amusé',
						'amuser',
						Auxiliaire::Avoir,
						'Participe',
						Tense::Passe,
						Gender::Masculine,
						Voice::Passive,
						SentenceType::DeclarativeSentence 
				],
				[ 
						'ayant été amusée',
						'amuser',
						Auxiliaire::Avoir,
						'Participe',
						Tense::Passe,
						Gender::Feminine,
						Voice::Passive,
						SentenceType::DeclarativeSentence 
				] 
		];
	}
}
?>

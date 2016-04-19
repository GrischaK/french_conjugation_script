<?php
require_once '../conjugate.php';
class ConjugatePhraseTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider ConjugatePhraseTestProvider
	 */
	public function testConjugatePhrase($expectedResult, $infinitiveVerb, $auxiliaire, $gender, $voice, $sentencetype, $person, $tense, $mood) {
		$this->assertEquals ( $expectedResult, ( string ) conjugation_phrase ( new InfinitiveVerb ( $infinitiveVerb ), new Auxiliaire ( $auxiliaire ), new Gender ( $gender ), new Voice ( $voice ), new SentenceType ( $sentencetype ), new Person ( $person ), new Tense ( $tense ), new Mood ( $mood ) ) );
	}
	public function ConjugatePhraseTestProvider() {
		;
		return [ 
				[ 
						'j’ai aimé',
						'aimer',
						Auxiliaire::Avoir,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonSingular,						
						Tense::Passe_compose,
						Mood::Indicatif 
				],
				[ 
						'j’avais aimé',
						'aimer',
						Auxiliaire::Avoir,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonSingular,						
						Tense::Plus_que_parfait,
						Mood::Indicatif 
				],
				[ 
						'je suis amusé',
						'amuser',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonSingular,						
						Tense::Passe_compose,
						Mood::Indicatif 
				],
				[ 
						'ils sont amusés',
						'amuser',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::ThirdPersonPlural,						
						Tense::Passe_compose,
						Mood::Indicatif 
				],
				[ 
						'j’aime',
						'aimer',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonSingular,
						Tense::Present,
						Mood::Indicatif 
				],
				[ 
						'j’haïs',
						'haïr',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonSingular,						
						Tense::Present,
						Mood::Indicatif 
				],
				[ 
						'j’habilite',
						'habiliter',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonSingular,						
						Tense::Present,
						Mood::Indicatif 
				],
				[ 
						'je hérisse',
						'hérisser',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonSingular,						
						Tense::Present,
						Mood::Indicatif 
				],
				[ 
						'hérissé-je ?',
						'hérisser',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::InterrogativeSentence,
						Person::FirstPersonSingular,						
						Tense::Present,
						Mood::Indicatif 
				],				
				[ 
						'je hérissais',
						'hérisser',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonSingular,						
						Tense::Imparfait,
						Mood::Indicatif 
				],
				[ 
						'je finis',
						'finir',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonSingular,						
						Tense::Present,
						Mood::Indicatif 
				],
				[ 
						'elle finit',
						'finir',
						Auxiliaire::Etre,
						Gender::Feminine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::ThirdPersonSingular,						
						Tense::Present,
						Mood::Indicatif 
				],
				[ 
						'elles finissent',
						'finir',
						Auxiliaire::Etre,
						Gender::Feminine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::ThirdPersonPlural,						
						Tense::Present,
						Mood::Indicatif 
				],
				[ 
						'que j’aime',
						'aimer',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonSingular,						
						Tense::Present,
						Mood::Subjonctif 
				],
				[ 
						'aime',
						'aimer',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::SecondPersonSingular,						
						Tense::Present,
						Mood::Imperatif 
				],
				[ 
						'aimons',
						'aimer',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonPlural,						
						Tense::Present,
						Mood::Imperatif 
				],
				[ 
						'aimez',
						'aimer',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::SecondPersonPlural,						
						Tense::Present,
						Mood::Imperatif 
				],
				[ 
						'aie aimé',
						'aimer',
						Auxiliaire::Avoir,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::SecondPersonSingular,						
						Tense::Passe,
						Mood::Imperatif 
				],
				[ 
						'ayons aimé',
						'aimer',
						Auxiliaire::Avoir,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonPlural,						
						Tense::Passe,
						Mood::Imperatif 
				],
				[ 
						'ayez aimé',
						'aimer',
						Auxiliaire::Avoir,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::SecondPersonPlural,						
						Tense::Passe,
						Mood::Imperatif 
				],
				[ 
						'je donne',
						'donner',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonSingular,						
						Tense::Present,
						Mood::Indicatif 
				],
				[ 
						'je vais donner',
						'donner',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Active,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonSingular,						
						Tense::Futur_compose,
						Mood::Indicatif 
				],
				[ 
						'-',
						'donner',
						Auxiliaire::Etre,
						Gender::Masculine,
						Voice::Passive,
						SentenceType::DeclarativeSentence,
						Person::FirstPersonSingular,						
						Tense::Futur_compose,
						Mood::Indicatif 
				] 
		];
	}
}
?>

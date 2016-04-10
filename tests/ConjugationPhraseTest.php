<?php
require_once '../conjugate.php';

class ConjugatePhraseTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider ConjugatePhraseTestProvider
     */
    public function testConjugatePhrase($expectedResult, $infinitiveVerb, $auxiliaire, $gender, $voice, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, (string) conjugation_phrase(new InfinitiveVerb($infinitiveVerb), new Auxiliaire($auxiliaire), new Gender($gender), new Voice($voice), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function ConjugatePhraseTestProvider()
    {
        ;
        return [
            [
                'j’ai aimé',
                'aimer',
		Auxiliaire::Avoir,
		Gender::Masculine,
		Voice::Active,		
        Tense::Passe_compose,
        Person::FirstPersonSingular,
        Mood::Indicatif
            ],
            [
                'je suis amusé',
                'amuser',
		Auxiliaire::Etre,
		Gender::Masculine,	
		Voice::Active,		
        Tense::Passe_compose,
        Person::FirstPersonSingular,
        Mood::Indicatif
            ],
            [
                'ils sont amusés',
                'amuser',
		Auxiliaire::Etre,
		Gender::Masculine,
		Voice::Active,		
        Tense::Passe_compose,
        Person::ThirdPersonPlural,
        Mood::Indicatif
            ],
            [
                'j’aime',
                'aimer',
		Auxiliaire::Etre,
		Gender::Masculine,
		Voice::Active,		
        Tense::Present,
        Person::FirstPersonSingular,
        Mood::Indicatif
            ],
            [
                'j’haïs',
                'haïr',
		Auxiliaire::Etre,
		Gender::Masculine,	
		Voice::Active,		
        Tense::Present,
        Person::FirstPersonSingular,
        Mood::Indicatif
            ],
            [
                'j’habilite',
                'habiliter',
		Auxiliaire::Etre,
		Gender::Masculine,
		Voice::Active,		
        Tense::Present,
		Person::FirstPersonSingular,
		Mood::Indicatif
            ],
            [
                'je hérisse',
                'hérisser',
		Auxiliaire::Etre,
		Gender::Masculine,
		Voice::Active,		
        Tense::Present,
		Person::FirstPersonSingular,
		Mood::Indicatif
            ],
            [
                'je finis',
                'finir',
		Auxiliaire::Etre,
		Gender::Masculine,
		Voice::Active,		
        Tense::Present,
		Person::FirstPersonSingular,
		Mood::Indicatif
            ],
            [
                'elle finit',
                'finir',
		Auxiliaire::Etre,
		Gender::Feminine,		
		Voice::Active,		
        Tense::Present,
        Person::ThirdPersonSingular,
        Mood::Indicatif
            ],
            [
                'elles finissent',
                'finir',
		Auxiliaire::Etre,
		Gender::Feminine,	
		Voice::Active,		
        Tense::Present,
        Person::ThirdPersonPlural,
        Mood::Indicatif
            ],			
            [
                'que j’aime',
                'aimer',
		Auxiliaire::Etre,
		Gender::Masculine,	
		Voice::Active,		
        Tense::Present,
        Person::FirstPersonSingular,
        Mood::Subjonctif
            ],
            [
                'aime',
                'aimer',
		Auxiliaire::Etre,
		Gender::Masculine,
		Voice::Active,		
        Tense::Present,
        Person::SecondPersonSingular,
        Mood::Imperatif
            ],
            [
                'aimons',
                'aimer',
		Auxiliaire::Etre,
		Gender::Masculine,
		Voice::Active,		
        Tense::Present,
        Person::FirstPersonPlural,
        Mood::Imperatif
            ],
            [
                'aimez',
                'aimer',
		Auxiliaire::Etre,
		Gender::Masculine,
		Voice::Active,		
        Tense::Present,
        Person::SecondPersonPlural,
        Mood::Imperatif
            ],
            [
                'aie aimé',
                'aimer',
		Auxiliaire::Avoir,
		Gender::Masculine,	
		Voice::Active,		
        Tense::Passe,
        Person::SecondPersonSingular,
        Mood::Imperatif
            ],
            [
                'ayons aimé',
                'aimer',
		Auxiliaire::Avoir,
		Gender::Masculine,	
		Voice::Active,		
        Tense::Passe,
        Person::FirstPersonPlural,
        Mood::Imperatif
            ],
            [
                'ayez aimé',
                'aimer',
		Auxiliaire::Avoir,
		Gender::Masculine,
		Voice::Active,		
        Tense::Passe,
        Person::SecondPersonPlural,
        Mood::Imperatif
            ],
            [
                'je donne',
                'donner',
		Auxiliaire::Etre,
		Gender::Masculine,	
		Voice::Active,		
        Tense::Present,
        Person::FirstPersonSingular,
        Mood::Indicatif
            ],
            [
                'je vais donner',
                'donner',
		Auxiliaire::Etre,
		Gender::Masculine,	
		Voice::Active,		
        Tense::Futur_compose,
        Person::FirstPersonSingular,
        Mood::Indicatif
            ],
            [
                'je vais être donner',
                'donner',
		Auxiliaire::Etre,
		Gender::Masculine,	
		Voice::Passive,		
        Tense::Futur_compose,
        Person::FirstPersonSingular,
        Mood::Indicatif
            ]			
        ];
    }
}
?>

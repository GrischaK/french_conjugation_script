<?php
require_once '../conjugate.php';

class ConjugatePhraseTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider ConjugatePhraseTestProvider
     */
    public function testConjugatePhrase($expectedResult, $infinitiveVerb, $auxiliaire, $gender, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, (string) conjugation_phrase(new InfinitiveVerb($infinitiveVerb), new Auxiliaire($auxiliaire), new Gender($gender), new Person($person), new Tense($tense), new Mood($mood)));
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
                'Passe_compose',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'je suis amusé',
                'amuser',
		Auxiliaire::Etre,
		Gender::Masculine,		
                'Passe_compose',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'ils sont amusés',
                'amuser',
		Auxiliaire::Etre,
		Gender::Masculine,		
                'Passe_compose',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [
                'j’aime',
                'aimer',
		Auxiliaire::Etre,
		Gender::Masculine,		
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'j’haïs',
                'haïr',
		Auxiliaire::Etre,
		Gender::Masculine,	
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'j’habilite',
                'habiliter',
		Auxiliaire::Etre,
		Gender::Masculine,
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'je hérisse',
                'hérisser',
		Auxiliaire::Etre,
		Gender::Masculine,
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'je finis',
                'finir',
		Auxiliaire::Etre,
		Gender::Masculine,		
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'elle finit',
                'finir',
		Auxiliaire::Etre,
		Gender::Feminine,		
                'Present',
                'ThirdPersonSingular',
                'Indicatif'
            ],
            [
                'elles finissent',
                'finir',
		Auxiliaire::Etre,
		Gender::Feminine,		
                'Present',
                'ThirdPersonPlural',
                'Indicatif'
            ],			
            [
                'que j’aime',
                'aimer',
		Auxiliaire::Etre,
		Gender::Masculine,	
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'aime',
                'aimer',
		Auxiliaire::Etre,
		Gender::Masculine,		
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ],
            [
                'aimons',
                'aimer',
		Auxiliaire::Etre,
		Gender::Masculine,	
                'Present',
                'FirstPersonPlural',
                'Imperatif'
            ],
            [
                'aimez',
                'aimer',
		Auxiliaire::Etre,
		Gender::Masculine,	
                'Present',
                'SecondPersonPlural',
                'Imperatif'
            ],
            [
                'aie aimé',
                'aimer',
		Auxiliaire::Avoir,
		Gender::Masculine,	
                'Passe',
                'SecondPersonSingular',
                'Imperatif'
            ],
            [
                'ayons aimé',
                'aimer',
		Auxiliaire::Avoir,
		Gender::Masculine,	
                'Passe',
                'FirstPersonPlural',
                'Imperatif'
            ],
            [
                'ayez aimé',
                'aimer',
		Auxiliaire::Avoir,
		Gender::Masculine,	
                'Passe',
                'SecondPersonPlural',
                'Imperatif'
            ],
            [
                'je donne',
                'donner',
		Auxiliaire::Etre,
		Gender::Masculine,	
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'je vais donner',
                'donner',
		Auxiliaire::Etre,
		Gender::Masculine,	
                'Futur_compose',
                'FirstPersonSingular',
                'Indicatif'
            ]
        ];
    }
}
?>

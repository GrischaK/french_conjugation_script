<?php
require_once '../conjugate.php';

class ConjugatePhraseTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider ConjugatePhraseTestProvider
     */
    public function testConjugatePhrase($expectedResult, $infinitiveVerb, $auxiliaire, $tense, $person, $mood)
    {
        $this->assertEquals($expectedResult, (string) conjugation_phrase(new InfinitiveVerb($infinitiveVerb), new Auxiliaire($auxiliaire), new Person($person), new Tense($tense), new Mood($mood)));
    }

    public function ConjugatePhraseTestProvider()
    {
        ;
        return [
            [
                'j’ai aimé',
                'aimer',
		Auxiliaire::Avoir,
                'Passe_compose',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'je suis amusé',
                'amuser',
		Auxiliaire::Etre,
                'Passe_compose',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'ils sont amusés',
                'amuser',
		Auxiliaire::Etre,
                'Passe_compose',
                'ThirdPersonPlural',
                'Indicatif'
            ],
            [
                'j’aime',
                'aimer',
		Auxiliaire::Etre,
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'j’haïs',
                'haïr',
		Auxiliaire::Etre,
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'j’habilite',
                'habiliter',
		Auxiliaire::Etre,
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'je hérisse',
                'hérisser',
		Auxiliaire::Etre,
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'je finis',
                'finir',
		Auxiliaire::Etre,
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'que j’aime',
                'aimer',
		Auxiliaire::Etre,
                'Present',
                'FirstPersonSingular',
                'Subjonctif'
            ],
            [
                'aime',
                'aimer',
		Auxiliaire::Etre,
                'Present',
                'SecondPersonSingular',
                'Imperatif'
            ],
            [
                'aimons',
                'aimer',
		Auxiliaire::Etre,
                'Present',
                'FirstPersonPlural',
                'Imperatif'
            ],
            [
                'aimez',
                'aimer',
		Auxiliaire::Etre,
                'Present',
                'SecondPersonPlural',
                'Imperatif'
            ],
            [
                'aie aimé',
                'aimer',
		Auxiliaire::Avoir,
                'Passe',
                'SecondPersonSingular',
                'Imperatif'
            ],
            [
                'ayons aimé',
                'aimer',
		Auxiliaire::Avoir,
                'Passe',
                'FirstPersonPlural',
                'Imperatif'
            ],
            [
                'ayez aimé',
                'aimer',
		Auxiliaire::Avoir,
                'Passe',
                'SecondPersonPlural',
                'Imperatif'
            ],
            [
                'je donne',
                'donner',
		Auxiliaire::Etre,
                'Present',
                'FirstPersonSingular',
                'Indicatif'
            ],
            [
                'je vais donner',
                'donner',
		Auxiliaire::Etre,
                'Futur_compose',
                'FirstPersonSingular',
                'Indicatif'
            ]
        ];
    }
}
?>

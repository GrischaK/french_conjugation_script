<?php
require_once 'classes/Enum.php';
require_once 'classes/InfinitiveVerb.php';
require_once 'classes/ConjugatedVerb.php';
require_once 'classes/ConjugatedAuxiliaireVerb.php';
require_once 'classes/EndingWith.php';
require_once 'classes/Tense.php';
require_once 'classes/Person.php';
require_once 'classes/Gender.php';
require_once 'classes/Voice.php';
require_once 'classes/SentenceType.php';
require_once 'classes/Mood.php';
require_once 'classes/Mode.php';
require_once 'classes/Auxiliaire.php';
require_once 'classes/ConjugationModel.php';
require_once 'classes/ExceptionModel.php';
require_once 'classes/IrregularExceptionGroup.php'; // should be replaced by DB
require_once 'word_stem.php';
require_once 'groups/verbes_pronominaux.php';
require_once 'groups/verbes_exclusivement_pronominaux.php';
require_once 'groups/h_apire.php';
// require_once 'groups/verbes_intransitifs.php';
// require_once 'groups/verbes_transitifs.php';
// require_once 'groups/irregular-verb-groups.php';
// require_once 'groups/verbes_defectifs.php';
// require_once 'groups/verbes_en_ancien.php';
function finding_infinitive_ending(InfinitiveVerb $infinitiveVerb)
{
    switch (mb_substr($infinitiveVerb->getInfinitiveVerb(), - 2, 2)) {
        case 'er':
            $endingwith = EndingWith::ER;
            break;
        case 'ir':
            $endingwith = EndingWith::IR;
            switch (mb_substr($infinitiveVerb->getInfinitiveVerb(), - 3, 3)) {
                case 'oir': // Undefined index: -oir
                    $endingwith = EndingWith::OIR; // not ExceptionModel SEOIR !in_array($verb, $seoir)
                    break;
            }
            break;
        case 're':
            $endingwith = EndingWith::RE;
            break;
        case 'ïr':
            $endingwith = EndingWith::I_TREMA_R;
            break;
    }
    return new EndingWith($endingwith);
}
function finding_exception_model(InfinitiveVerb $infinitiveVerb)
{
    $exceptionmodel = ExceptionModel::NO_EXCEPTIONS;
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$aller)) {
        $exceptionmodel = ExceptionModel::ALLER;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$avoir_irr)) {
        $exceptionmodel = ExceptionModel::AVOIR_IRR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$etre_irr)) {
        $exceptionmodel = ExceptionModel::ETRE_IRR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$eler_ele)) {
        $exceptionmodel = ExceptionModel::Eler_Ele;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$eter_ete)) {
        $exceptionmodel = ExceptionModel::Eter_Ete;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$eler_elle)) {
        $exceptionmodel = ExceptionModel::Eler_Elle;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$eter_ette)) {
        $exceptionmodel = ExceptionModel::Eter_Ette;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$envoyer)) {
        $exceptionmodel = ExceptionModel::ENVOYER;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$cer)) {
        $exceptionmodel = ExceptionModel::CER;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$ger)) {
        $exceptionmodel = ExceptionModel::GER;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$ier)) {
        $exceptionmodel = ExceptionModel::IER;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$yer)) {
        $exceptionmodel = ExceptionModel::YER;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$e_akut_er)) {
        $exceptionmodel = ExceptionModel::E_Akut_ER;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$e_akut_cer)) {
        $exceptionmodel = ExceptionModel::E_Akut_CER;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$e_akut_ger)) {
        $exceptionmodel = ExceptionModel::E_Akut_GER;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$e_akut_ier)) {
        $exceptionmodel = ExceptionModel::E_Akut_IER;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$e_akut_yer)) {
        $exceptionmodel = ExceptionModel::E_Akut_YER;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$i_trema_er)) {
        $exceptionmodel = ExceptionModel::I_Trema_ER;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$e_er)) {
        $exceptionmodel = ExceptionModel::E_Er;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$devoir)) {
        $exceptionmodel = ExceptionModel::DEVOIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$mouvoir)) {
        $exceptionmodel = ExceptionModel::MOUVOIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$choir)) {
        $exceptionmodel = ExceptionModel::CHOIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$cevoir)) {
        $exceptionmodel = ExceptionModel::CEVOIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$pleuvoir)) {
        $exceptionmodel = ExceptionModel::PLEUVOIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$falloir)) {
        $exceptionmodel = ExceptionModel::FALLOIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$seoir)) {
        $exceptionmodel = ExceptionModel::SEOIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$vouloir)) {
        $exceptionmodel = ExceptionModel::VOULOIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$pouvoir)) {
        $exceptionmodel = ExceptionModel::POUVOIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$savoir)) {
        $exceptionmodel = ExceptionModel::SAVOIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$rir)) {
        $exceptionmodel = ExceptionModel::RIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$courir)) {
        $exceptionmodel = ExceptionModel::COURIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$mourir)) {
        $exceptionmodel = ExceptionModel::MOURIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$querir)) {
        $exceptionmodel = ExceptionModel::QUERIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$fleurir)) {
        $exceptionmodel = ExceptionModel::FLEURIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$enir)) {
        $exceptionmodel = ExceptionModel::ENIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$fuir)) {
        $exceptionmodel = ExceptionModel::FUIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$faillir)) {
        $exceptionmodel = ExceptionModel::FAILLIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$bouillir)) {
        $exceptionmodel = ExceptionModel::BOUILLIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$saillir)) {
        $exceptionmodel = ExceptionModel::SAILLIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$valoir)) {
        $exceptionmodel = ExceptionModel::VALOIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$voir)) {
        $exceptionmodel = ExceptionModel::VOIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$dormir)) {
        $exceptionmodel = ExceptionModel::DORMIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$tir)) {
        $exceptionmodel = ExceptionModel::TIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$servir)) {
        $exceptionmodel = ExceptionModel::SERVIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$cueillir)) {
        $exceptionmodel = ExceptionModel::CUEILLIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$vetir)) {
        $exceptionmodel = ExceptionModel::VETIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$faire)) {
        $exceptionmodel = ExceptionModel::FAIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$raire)) {
        $exceptionmodel = ExceptionModel::RAIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$plaire)) {
        $exceptionmodel = ExceptionModel::PLAIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$taire)) {
        $exceptionmodel = ExceptionModel::TAIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$vaincre)) {
        $exceptionmodel = ExceptionModel::VAINCRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$dre)) {
        $exceptionmodel = ExceptionModel::DRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$prendre)) {
        $exceptionmodel = ExceptionModel::PRENDRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$indre)) {
        $exceptionmodel = ExceptionModel::INDRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$oindre)) {
        $exceptionmodel = ExceptionModel::OINDRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$coudre)) {
        $exceptionmodel = ExceptionModel::COUDRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$moudre)) {
        $exceptionmodel = ExceptionModel::MOUDRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$soudre)) {
        $exceptionmodel = ExceptionModel::SOUDRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$resoudre)) {
        $exceptionmodel = ExceptionModel::RESOUDRE;
    }   
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$occire)) {
        $exceptionmodel = ExceptionModel::OCCIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$circoncire)) {
        $exceptionmodel = ExceptionModel::CIRCONCIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$dire)) {
        $exceptionmodel = ExceptionModel::DIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$maudire)) {
        $exceptionmodel = ExceptionModel::MAUDIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$suffire)) {
        $exceptionmodel = ExceptionModel::SUFFIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$confire)) {
        $exceptionmodel = ExceptionModel::CONFIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$lire)) {
        $exceptionmodel = ExceptionModel::LIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$boire)) {
        $exceptionmodel = ExceptionModel::BOIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$croire)) {
        $exceptionmodel = ExceptionModel::CROIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$rire)) {
        $exceptionmodel = ExceptionModel::RIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$crire)) {
        $exceptionmodel = ExceptionModel::CRIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$frire)) {
        $exceptionmodel = ExceptionModel::FRIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$uire)) {
        $exceptionmodel = ExceptionModel::UIRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$bruire)) {
        $exceptionmodel = ExceptionModel::BRUIRE;
    }   
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$clore)) {
        $exceptionmodel = ExceptionModel::CLORE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$rompre)) {
        $exceptionmodel = ExceptionModel::ROMPRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$aitre)) {
        $exceptionmodel = ExceptionModel::AITRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$naitre)) {
        $exceptionmodel = ExceptionModel::NAITRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$oitre)) {
        $exceptionmodel = ExceptionModel::OITRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$attre)) {
        $exceptionmodel = ExceptionModel::ATTRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$mettre)) {
        $exceptionmodel = ExceptionModel::METTRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$foutre)) {
        $exceptionmodel = ExceptionModel::FOUTRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$clure)) {
        $exceptionmodel = ExceptionModel::CLURE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$suivre)) {
        $exceptionmodel = ExceptionModel::SUIVRE;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$vivre)) {
        $exceptionmodel = ExceptionModel::VIVRE;
    }
    return new ExceptionModel($exceptionmodel);
}
function finding_conjugation_model(InfinitiveVerb $infinitiveVerb)
{
	global $verbes_pronominaux,$verbes_exclusivement_pronominaux;

    if (! in_array($infinitiveVerb, $verbes_pronominaux)) {
        $conjugationmodel = ConjugationModel::NonReflexive;
    }
    if (in_array($infinitiveVerb, $verbes_pronominaux)) {
        $conjugationmodel = ConjugationModel::Reflexive;
    }
    if (in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {
        $conjugationmodel = ConjugationModel::OnlyReflexive;
    }
    return new ConjugationModel($conjugationmodel);
}
function personal_pronoun(Person $person, Gender $gender, Mood $mood)
{
    $finding_person = 'Unknown Person';
    if ($gender->getValue() === Gender::Masculine) {
    $finding_person = [
        Person::FirstPersonSingular => 'je',
        Person::SecondPersonSingular => 'tu',
        Person::ThirdPersonSingular => 'il',
        Person::FirstPersonPlural => 'nous',
        Person::SecondPersonPlural => 'vous',
        Person::ThirdPersonPlural => 'ils'
    ];
    }		
    if ($gender->getValue() === Gender::Feminine) {
		$finding_person = [
			Person::FirstPersonSingular => 'je',
			Person::SecondPersonSingular => 'tu',
			Person::ThirdPersonSingular => 'elle',
			Person::FirstPersonPlural => 'nous',
			Person::SecondPersonPlural => 'vous',
			Person::ThirdPersonPlural => 'elles'
    ];
    }	
    $subjonctif_pre_pronouns = [
        Person::FirstPersonSingular => 'que ',
        Person::SecondPersonSingular => 'que ',
        Person::ThirdPersonSingular => 'qu’',
        Person::FirstPersonPlural => 'que ',
        Person::SecondPersonPlural => 'que ',
        Person::ThirdPersonPlural => 'qu’'
    ];
    
    if ($mood->getValue() === Mood::Subjonctif) {
        return $subjonctif_pre_pronouns[$person->getValue()] . $finding_person[$person->getValue()];
    } else {
        return $finding_person[$person->getValue()];
    }
}
function reflexive_pronoun(Person $person, Mood $mood)
{
	
    $finding_reflexive_pronoun = [
        Person::FirstPersonSingular => 'me',
        Person::SecondPersonSingular => 'te',
        Person::ThirdPersonSingular => 'se',
        Person::FirstPersonPlural => 'nous',
        Person::SecondPersonPlural => 'vous',
        Person::ThirdPersonPlural => 'se'
    ];
    if ($mood->getValue() === Mood::Imperatif) {
    $finding_reflexive_pronoun = [
        Person::SecondPersonSingular => '-toi',
        Person::FirstPersonPlural => '-nous',
        Person::SecondPersonPlural => '-vous',
    ];	
	}	
    return $finding_reflexive_pronoun[$person->getValue()];
}
include_once 'ending.php';
function aller(Person $person, Tense $tense, Mood $mood, Voice $voice)
{
    $aller_form = [
        Mood::Indicatif => [
            Tense::Futur_compose => [
                Person::FirstPersonSingular => 'vais',
                Person::SecondPersonSingular => 'vas',
                Person::ThirdPersonSingular => 'va',
                Person::FirstPersonPlural => 'allons',
                Person::SecondPersonPlural => 'allez',
                Person::ThirdPersonPlural => 'vont'
            ]
        ]
    ];   
    return $aller_form[$mood->getValue()][$tense->getValue()][$person->getValue()];
}
function etre_passive(Person $person, Tense $tense, Mood $mood)
{
    $etre_passive_form = [
                Mood::Indicatif => [
                    Tense::Present => [
                        Person::FirstPersonSingular => 'suis',
                        Person::SecondPersonSingular => 'es',
                        Person::ThirdPersonSingular => 'est',
                        Person::FirstPersonPlural => 'sommes',
                        Person::SecondPersonPlural => 'êtes',
                        Person::ThirdPersonPlural => 'sont'
                    ],
                    Tense::Imparfait => [
                        Person::FirstPersonSingular => 'étais',
                        Person::SecondPersonSingular => 'étais',
                        Person::ThirdPersonSingular => 'était',
                        Person::FirstPersonPlural => 'étiez',
                        Person::SecondPersonPlural => 'étiez',
                        Person::ThirdPersonPlural => 'étaient'
                    ],
                    Tense::Passe => [
                        Person::FirstPersonSingular => 'fus',
                        Person::SecondPersonSingular => 'fus',
                        Person::ThirdPersonSingular => 'fut',
                        Person::FirstPersonPlural => 'fûmes',
                        Person::SecondPersonPlural => 'fûtes',
                        Person::ThirdPersonPlural => 'furent'
                    ],
                    Tense::Futur => [
                        Person::FirstPersonSingular => 'serai',
                        Person::SecondPersonSingular => 'seras',
                        Person::ThirdPersonSingular => 'sera',
                        Person::FirstPersonPlural => 'serons',
                        Person::SecondPersonPlural => 'serez',
                        Person::ThirdPersonPlural => 'seront'
                    ]
                ],
                Mood::Subjonctif => [
                    Tense::Present => [
                        Person::FirstPersonSingular => 'sois',
                        Person::SecondPersonSingular => 'sois',
                        Person::ThirdPersonSingular => 'soit',
                        Person::FirstPersonPlural => 'soyons',
                        Person::SecondPersonPlural => 'soyez',
                        Person::ThirdPersonPlural => 'soient'
                    ],
                    Tense::Imparfait => [
                        Person::FirstPersonSingular => 'fusse',
                        Person::SecondPersonSingular => 'fusses',
                        Person::ThirdPersonSingular => 'fût',
                        Person::FirstPersonPlural => 'fussions',
                        Person::SecondPersonPlural => 'fussiez',
                        Person::ThirdPersonPlural => 'fussent'
                    ]
                ],
                Mood::Conditionnel => [
                    Tense::Present => [
                        Person::FirstPersonSingular => 'serais',
                        Person::SecondPersonSingular => 'serais',
                        Person::ThirdPersonSingular => 'serait',
                        Person::FirstPersonPlural => 'serions',
                        Person::SecondPersonPlural => 'seriez',
                        Person::ThirdPersonPlural => 'seraient'
                    ]
                ],
                Mood::Imperatif => [
                    Tense::Present => [
                        Person::SecondPersonSingular => 'sois',
                        Person::FirstPersonPlural => 'soyons',
                        Person::SecondPersonPlural => 'soyez'
                    ]
                ]
            ];
    
    return $etre_passive_form[$mood->getValue()][$tense->getValue()][$person->getValue()];
}
function conjugated_auxiliaire(Auxiliaire $auxiliaire, Person $person, Tense $tense, Mood $mood, Voice $voice)
{
    switch ($auxiliaire->getValue()) {
        case Auxiliaire::Etre:
            $conjugated_auxiliaire = [
                Mood::Indicatif => [
                    Tense::Passe_compose => [
                        Person::FirstPersonSingular => 'suis',
                        Person::SecondPersonSingular => 'es',
                        Person::ThirdPersonSingular => 'est',
                        Person::FirstPersonPlural => 'sommes',
                        Person::SecondPersonPlural => 'êtes',
                        Person::ThirdPersonPlural => 'sont'
                    ],
                    Tense::Plus_que_parfait => [
                        Person::FirstPersonSingular => 'étais',
                        Person::SecondPersonSingular => 'étais',
                        Person::ThirdPersonSingular => 'était',
                        Person::FirstPersonPlural => 'étiez',
                        Person::SecondPersonPlural => 'étiez',
                        Person::ThirdPersonPlural => 'étaient'
                    ],
                    Tense::Passe_anterieur => [
                        Person::FirstPersonSingular => 'fus',
                        Person::SecondPersonSingular => 'fus',
                        Person::ThirdPersonSingular => 'fut',
                        Person::FirstPersonPlural => 'fûmes',
                        Person::SecondPersonPlural => 'fûtes',
                        Person::ThirdPersonPlural => 'furent'
                    ],
                    Tense::Futur_anterieur => [
                        Person::FirstPersonSingular => 'serais',
                        Person::SecondPersonSingular => 'serais',
                        Person::ThirdPersonSingular => 'serait',
                        Person::FirstPersonPlural => 'serions',
                        Person::SecondPersonPlural => 'seriez',
                        Person::ThirdPersonPlural => 'seraient'
                    ]
                ],
                Mood::Subjonctif => [
                    Tense::Passe => [
                        Person::FirstPersonSingular => 'sois',
                        Person::SecondPersonSingular => 'sois',
                        Person::ThirdPersonSingular => 'soit',
                        Person::FirstPersonPlural => 'soyons',
                        Person::SecondPersonPlural => 'soyez',
                        Person::ThirdPersonPlural => 'soient'
                    ],
                    Tense::Plus_que_parfait => [
                        Person::FirstPersonSingular => 'fusse',
                        Person::SecondPersonSingular => 'fusses',
                        Person::ThirdPersonSingular => 'fût',
                        Person::FirstPersonPlural => 'fussions',
                        Person::SecondPersonPlural => 'fussiez',
                        Person::ThirdPersonPlural => 'fussent'
                    ]
                ],
                Mood::Conditionnel => [
                    Tense::Premiere_Forme => [
                        Person::FirstPersonSingular => 'serais',
                        Person::SecondPersonSingular => 'serais',
                        Person::ThirdPersonSingular => 'serait',
                        Person::FirstPersonPlural => 'serions',
                        Person::SecondPersonPlural => 'seriez',
                        Person::ThirdPersonPlural => 'seraient'
                    ],
                    Tense::Deuxieme_Forme => [
                        Person::FirstPersonSingular => 'fusse',
                        Person::SecondPersonSingular => 'fusses',
                        Person::ThirdPersonSingular => 'fût',
                        Person::FirstPersonPlural => 'fussions',
                        Person::SecondPersonPlural => 'fussiez',
                        Person::ThirdPersonPlural => 'fussent'
                    ]
                ],
                Mood::Imperatif => [
                    Tense::Passe => [
                        Person::SecondPersonSingular => 'sois',
                        Person::FirstPersonPlural => 'soyons',
                        Person::SecondPersonPlural => 'soyez'
                    ]
                ]
            ];
            break;
        case Auxiliaire::Avoir:
            $conjugated_auxiliaire = [
                Mood::Indicatif => [
                    Tense::Passe_compose => [
                        Person::FirstPersonSingular => 'ai',
                        Person::SecondPersonSingular => 'as',
                        Person::ThirdPersonSingular => 'a',
                        Person::FirstPersonPlural => 'avons',
                        Person::SecondPersonPlural => 'avez',
                        Person::ThirdPersonPlural => 'ont'
                    ],
                    Tense::Plus_que_parfait => [
                        Person::FirstPersonSingular => 'avais',
                        Person::SecondPersonSingular => 'avais',
                        Person::ThirdPersonSingular => 'avait',
                        Person::FirstPersonPlural => 'avions',
                        Person::SecondPersonPlural => 'aviez',
                        Person::ThirdPersonPlural => 'avaient'
                    ],
                    Tense::Passe_anterieur => [
                        Person::FirstPersonSingular => 'eus',
                        Person::SecondPersonSingular => 'eus',
                        Person::ThirdPersonSingular => 'eut',
                        Person::FirstPersonPlural => 'eûmes',
                        Person::SecondPersonPlural => 'eûtes',
                        Person::ThirdPersonPlural => 'eurent'
                    ],
                    Tense::Futur_anterieur => [
                        Person::FirstPersonSingular => 'aurai',
                        Person::SecondPersonSingular => 'auras',
                        Person::ThirdPersonSingular => 'aura',
                        Person::FirstPersonPlural => 'aurons',
                        Person::SecondPersonPlural => 'aurez',
                        Person::ThirdPersonPlural => 'auront'
                    ]
                ],
                Mood::Subjonctif => [
                    Tense::Passe => [
                        Person::FirstPersonSingular => 'aie',
                        Person::SecondPersonSingular => 'aies',
                        Person::ThirdPersonSingular => 'ait',
                        Person::FirstPersonPlural => 'ayons',
                        Person::SecondPersonPlural => 'ayez',
                        Person::ThirdPersonPlural => 'aient'
                    ],
                    Tense::Plus_que_parfait => [
                        Person::FirstPersonSingular => 'eusse',
                        Person::SecondPersonSingular => 'eusses',
                        Person::ThirdPersonSingular => 'eût',
                        Person::FirstPersonPlural => 'eussions',
                        Person::SecondPersonPlural => 'eussiez',
                        Person::ThirdPersonPlural => 'eussent'
                    ]
                ],
                Mood::Conditionnel => [
                    Tense::Premiere_Forme => [
                        Person::FirstPersonSingular => 'aurais',
                        Person::SecondPersonSingular => 'aurais',
                        Person::ThirdPersonSingular => 'aurait',
                        Person::FirstPersonPlural => 'aurions',
                        Person::SecondPersonPlural => 'auriez',
                        Person::ThirdPersonPlural => 'auraient'
                    ],
                    Tense::Deuxieme_Forme => [
                        Person::FirstPersonSingular => 'eusse',
                        Person::SecondPersonSingular => 'eusses',
                        Person::ThirdPersonSingular => 'eût',
                        Person::FirstPersonPlural => 'eussions',
                        Person::SecondPersonPlural => 'eussiez',
                        Person::ThirdPersonPlural => 'eussent'
                    ]
                ],
                Mood::Imperatif => [
                    Tense::Passe => [
                        Person::SecondPersonSingular => 'aie',
                        Person::FirstPersonPlural => 'ayons',
                        Person::SecondPersonPlural => 'ayez'
                    ]
                ]
            ];
            break;
    }
    if ($tense->getValue() === Tense::Futur_compose) {
        return aller($person, $tense, $mood, $voice);
    }
    if (!isComposite($mood, $tense) && $voice->getValue() === Voice::Passive) {	
        return etre_passive($person, $tense, $mood, $voice);
    }	
    if ($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $voice->getValue() === Voice::Passive) {	
        return etre_passive($person, $tense, $mood, $voice);
    }		
    return $conjugated_auxiliaire[$mood->getValue()][$tense->getValue()][$person->getValue()];
}
function finding_auxiliaire(InfinitiveVerb $infinitiveVerb)
{
    if (in_array($infinitiveVerb, Auxiliaire::getVerbsThatUse(new Auxiliaire(Auxiliaire::Etre)))) { 
        $auxiliaire = Auxiliaire::Etre;
    } else {
        $auxiliaire = Auxiliaire::Avoir;
    }
    return new Auxiliaire($auxiliaire);
}
function canBeConjugatedWith(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire)
{
 return in_array($infinitiveVerb, Auxiliaire::getVerbsThatUse($auxiliaire)) || in_array($infinitiveVerb, Auxiliaire::getVerbsThatUse(new Auxiliaire(Auxiliaire::AvoirandEtre)));
}
function isPlural(Person $person)
{
    $plural_persons = [
        Person::FirstPersonPlural,
        Person::SecondPersonPlural,
        Person::ThirdPersonPlural
    ];
    return in_array($person->getValue(), $plural_persons);
}
function conjugate(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood)
{
    $endingwith = finding_infinitive_ending($infinitiveVerb);
    $exceptionmodel = finding_exception_model($infinitiveVerb);
    $conjugated_verb = word_stem($infinitiveVerb, $person, $tense, $mood) . ending($person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb);
    
    $word_stem_last_char = mb_substr(word_stem($infinitiveVerb, $person, $tense, $mood), - 1);
    $word_stem_last_2chars = mb_substr(word_stem($infinitiveVerb, $person, $tense, $mood), - 2);
    $ending_first_char = mb_substr(ending($person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb), 0, 1);
    $i_variants = [
        'i',
        'î',
        'ï'
    ];
    if (in_array($word_stem_last_char, $i_variants) && in_array($ending_first_char, $i_variants) && ! in_array($infinitiveVerb, [
        'abrier',
        'rocouier',
        'planchéier',
        'paranoïer',
        'fleurir'
    ])) // should be replaced with static $ier + $e_akut_ier + $i_trema_er
{ // example used it: $fuir verbs
        return mb_substr(word_stem($infinitiveVerb, $person, $tense, $mood), 0, - 1) . ending($person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb); // delete last char in word_stem
    }
    if (in_array($word_stem_last_2chars, [
        'oi'
    ]) && in_array($ending_first_char, [
        'u'
    ])) // should be replaced with static $boire
{ // example used it: $boire verbs for Indicative Passe+Subjontif Imparfait
        return mb_substr(word_stem($infinitiveVerb, $person, $tense, $mood), 0, - 2) . ending($person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb); // delete last char i
    }
    if (in_array($word_stem_last_char, [
        'i'
    ]) && in_array($ending_first_char, [
        'u',
        'y'
    ])) // should be replaced with static $lire
{ // example used it: $lire verbs for Indicative Passe+Subjontif Imparfait
        return mb_substr(word_stem($infinitiveVerb, $person, $tense, $mood), 0, - 1) . ending($person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb); // delete last char in word_stem
    }
    
    
    if (in_array($word_stem_last_char, [
        'c', // used in VAINCRE
        'd', // used in COUDRE + DRE,
        't'
    ]) // used in VETIR
 && $ending_first_char == 't') {
        return word_stem($infinitiveVerb, $person, $tense, $mood) . mb_substr(ending($person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb), 0, - 1); // delete ending string
    } else
        return $conjugated_verb;
}
function isComposite(Mood $mood, Tense $tense)
{
    $composite_tenses = [
        Mood::Indicatif => [
            Tense::Passe_compose,
            Tense::Plus_que_parfait,
            Tense::Passe_anterieur,
            Tense::Futur_anterieur,
            Tense::Futur_compose
        ],
        Mood::Subjonctif => [
            Tense::Passe,
            Tense::Plus_que_parfait
        ],
        Mood::Conditionnel => [
            Tense::Premiere_Forme,
            Tense::Deuxieme_Forme
        ],
        Mood::Imperatif => [
            Tense::Passe
        ]
    ];
    return in_array($tense->getValue(), $composite_tenses[$mood->getValue()]);
}
function finding_participe_present(InfinitiveVerb $infinitiveVerb)
{
    $participe_present = finding_infinitive_ending($infinitiveVerb); // without this line Undefined variable
    if (in_array($participe_present->getValue(), [
        EndingWith::ER,
        EndingWith::RE,
        EndingWith::OIR
    ])) // + all unregular verbs from EndingWith::IR
        $participe_present = participe_present_word_stem($infinitiveVerb) . 'ant';
    if (finding_infinitive_ending($infinitiveVerb)->getValue() === EndingWith::IR)
        $participe_present = participe_present_word_stem($infinitiveVerb) . 'issant';
    if (finding_infinitive_ending($infinitiveVerb)->getValue() === EndingWith::I_TREMA_R)
        $participe_present = participe_present_word_stem($infinitiveVerb) . 'ïssant';
    if (in_array(finding_exception_model($infinitiveVerb)->getValue(), [ // + all unregular verbs from EndingWith::IR
        ExceptionModel::COURIR,
        ExceptionModel::MOURIR,
        ExceptionModel::QUERIR,
        ExceptionModel::FAILLIR,
        ExceptionModel::FUIR,
        ExceptionModel::VETIR
    ]))
        $participe_present = participe_present_word_stem($infinitiveVerb) . 'ant';
    $word_stem = word_stem_length($infinitiveVerb, 5) . 'or';
    // beginning unregular
    $exceptionmodel = finding_exception_model($infinitiveVerb); // without this line Undefined variable
    if ($exceptionmodel->getValue() === ExceptionModel::AVOIR_IRR)
        $participe_present = participe_present_word_stem($infinitiveVerb) . 'ayant';
    if ($exceptionmodel->getValue() === ExceptionModel::ETRE_IRR)
        $participe_present = participe_present_word_stem($infinitiveVerb) . 'étant';
    if ($exceptionmodel->getValue() === ExceptionModel::FLEURIR)
        
        $participe_present = participe_present_word_stem($infinitiveVerb) . 'issant / ' . $word_stem . 'issant';
    if ($exceptionmodel->isNAITRE() || $exceptionmodel->isOITRE() || $exceptionmodel->isAITRE())
        $participe_present = participe_present_word_stem($infinitiveVerb) . 'issant';
    return $participe_present;
}
function finding_participe_passe(InfinitiveVerb $infinitiveVerb)
{
    if (finding_infinitive_ending($infinitiveVerb)->getValue() === EndingWith::ER)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'é';
    if (finding_infinitive_ending($infinitiveVerb)->getValue() === EndingWith::IR)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'i';
    if (finding_infinitive_ending($infinitiveVerb)->getValue() === EndingWith::I_TREMA_R)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'ï';
    if (finding_infinitive_ending($infinitiveVerb)->getValue() === EndingWith::RE)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'u';
        // beginning unregular
    $exceptionmodel = finding_exception_model($infinitiveVerb); // without this line Undefined variable
    if (in_array(finding_exception_model($infinitiveVerb)->getValue(), [
        ExceptionModel::CHOIR,
        ExceptionModel::COURIR,
        ExceptionModel::VETIR,
        ExceptionModel::POUVOIR,
        ExceptionModel::SAVOIR,
        ExceptionModel::VOIR,
        ExceptionModel::CEVOIR,
        ExceptionModel::VALOIR,
        ExceptionModel::VOULOIR,
        ExceptionModel::ENIR,
        ExceptionModel::FALLOIR,
        ExceptionModel::PLEUVOIR
    ]))
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'u';
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::DEVOIR,
        ExceptionModel::MOUVOIR,
        ExceptionModel::OITRE
    ]))
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'û';
        if ($exceptionmodel->getValue() === ExceptionModel::VIVRE)
            $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'écu';
    if ($exceptionmodel->getValue() === ExceptionModel::NAITRE)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'é';
    if ($exceptionmodel->getValue() === ExceptionModel::RIR)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'ert';
    if ($exceptionmodel->getValue() === ExceptionModel::MOURIR)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'ort';
    if ($exceptionmodel->isQUERIR() || $exceptionmodel->isSEOIR() || $exceptionmodel->isPRENDRE() || $exceptionmodel->isMETTRE())
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'is';
    if ($exceptionmodel->isSEOIR() && (in_array($infinitiveVerb, [
        'assoir',
        'rassoir',
        'réassoir',
        's’assoir',
        'sursoir'
    ])))
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'sis';
    if ($exceptionmodel->getValue() === ExceptionModel::DEVOIR && substr($infinitiveVerb, - 8) == 'redevoir')
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'u';
    if ($exceptionmodel->getValue() === ExceptionModel::AVOIR_IRR)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'eu';
    if ($exceptionmodel->getValue() === ExceptionModel::ETRE_IRR)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'été';
    if ($exceptionmodel->isSOUDRE() || $exceptionmodel->isOCCIRE() 
        || $exceptionmodel->isCIRCONCIRE() 
        || $exceptionmodel->isCLORE() 
        || $exceptionmodel->isCLURE() )
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 's';
    if ($exceptionmodel->isRIRE() 
        || $exceptionmodel->isSUFFIRE() 
        || $exceptionmodel->isSUIVRE())
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'i';
    if (in_array(finding_exception_model($infinitiveVerb)->getValue(), [
        ExceptionModel::FAIRE,
        ExceptionModel::RAIRE,
        ExceptionModel::INDRE,
        ExceptionModel::OINDRE,
        ExceptionModel::DIRE,
        ExceptionModel::MAUDIRE,
        ExceptionModel::CONFIRE,
        ExceptionModel::CRIRE,
        ExceptionModel::FRIRE,
        ExceptionModel::UIRE,
        ExceptionModel::BRUIRE
    ]))
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 't';
    return $participe_passe;
}
function modes_impersonnels(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Mode $mode, Tense $tense, Gender $gender, Voice $voice)
{
    $participe_passe = finding_participe_passe($infinitiveVerb);
    $participe_present = finding_participe_present($infinitiveVerb);
	$avoir_participe_present = 'ayant';	
	$etre_participe_present = 'étant';
	$etre_participe_passe = 'été';	
	$etre_infinitive = 'être';	
	$en = 'en';	
	$gerondif_present = $en .' '. $participe_present;
	$gerondif_passe_etre = $en .' '. $etre_participe_present .' '. $participe_passe;	
	$gerondif_passe_avoir = $en .' '. $avoir_participe_present .' '. $participe_passe;
	$infinitiveVerb_passe = $auxiliaire->getValue(). ' ' . $participe_passe;
		 if (($auxiliaire->getValue() === Auxiliaire::Etre || $voice->getValue() === Voice::Passive) && $gender->getValue() === Gender::Feminine) 	
			$participe_passe .= 'e';		
		 if ($voice->getValue() === Voice::Passive) {		
			$infinitiveVerb = Auxiliaire::Etre .  ' ' . $participe_passe;
			$participe_present = $etre_participe_present .' '. $participe_passe;
		    $participe_passe = $etre_participe_passe .' '. $participe_passe;	
		 }		
		 if ($voice->getValue() === Voice::Pronominal &&  $tense->getValue() === Tense::Present) {		
			$infinitiveVerb = concatenate_apostrophized('se',$infinitiveVerb);
			$gerondif_present = $en .' '. concatenate_apostrophized('se',$participe_present);
		 }	
		 if ($voice->getValue() === Voice::Pronominal &&  $tense->getValue() === Tense::Passe) {		
			$infinitiveVerb_passe = concatenate_apostrophized('se',Auxiliaire::Etre) .' '. $infinitiveVerb;
			$gerondif_passe_etre = $en .' '. concatenate_apostrophized('se',$etre_participe_present) .' '. $participe_passe;			
		 }			 
    switch ($auxiliaire->getValue()) {	
        case Auxiliaire::Etre:
            $modes_impersonnels = [
                Tense::Present => [
                    Mode::Infinitif => $infinitiveVerb,
					Mode::Participe => $participe_present,
                    Mode::Gerondif => $gerondif_present
                ],
                Tense::Passe => [
                    Mode::Infinitif => $infinitiveVerb_passe,
                    Mode::Participe => $participe_passe,
					Mode::Gerondif => $gerondif_passe_etre,
                ]
            ];
            break;
        case Auxiliaire::Avoir:
            $modes_impersonnels = [
                Tense::Present => [
                    Mode::Infinitif => $infinitiveVerb_passe,
                    Mode::Participe => $participe_present,
                    Mode::Gerondif => $gerondif_present					
                ],
                Tense::Passe => [
                    Mode::Infinitif => Auxiliaire::Avoir . ' ' . $participe_passe,
                    Mode::Participe => $participe_passe,
                    Mode::Gerondif => $gerondif_passe_avoir					
                ]
            ];
            break;
    }
    return $modes_impersonnels[$tense->getValue()][$mode->getValue()];
}
function apostrophized($pronoun, $verb, & $was_apostrophized = null)
{	
	global $h_apire;
    if ((preg_match('~(.*\b[jtms])e$~ui', $pronoun, $m)) && (preg_match('~^h?(?:[aæàâeéèêëiîïoôœuûù]|y(?![aæàâeéèêëiîïoôœuûù]))~ui', $verb) && !in_array($verb, $h_apire))) { // should bein_array($conjugatedVerb->getInfinitive(), $h_apire)
        $was_apostrophized = true;
        return "{$m[1]}’";
    }
    $was_apostrophized = false;
    return $pronoun;
}
function concatenate_apostrophized($pronoun, $verb)
{
    $was_apostrophized = false;
    $possiblyApostrophizedPronoun = apostrophized($pronoun, $verb, $was_apostrophized);
    return $was_apostrophized ? $possiblyApostrophizedPronoun . $verb : "$possiblyApostrophizedPronoun $verb";
}
abstract class ConjugationPhrase
{
    abstract function accept(ConjugationPhraseVisitor $visitor);
    static function create(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Gender $gender, Voice $voice, Person $person, Tense $tense, Mood $mood)
    {
        $personal_pronoun = personal_pronoun($person, $gender, $mood);
		$reflexive_pronoun = reflexive_pronoun($person, $mood);
		$conjugated_auxiliaire_verb = new ConjugatedAuxiliaireVerb($auxiliaire, $person, $tense, $mood, $voice);
		$etre_participe_passe = 'été';
		$etre_infinitive = 'être';			
        if (isComposite($mood, $tense)) {
            $participe_passe = finding_participe_passe($infinitiveVerb);			
		    if (($auxiliaire->getValue() === Auxiliaire::Etre || $voice->getValue() === Voice::Passive 
			) && $gender->getValue() === Gender::Masculine && (isPlural($person))) {
                $participe_passe .= 's';
            }
            if (($auxiliaire->getValue() === Auxiliaire::Etre || $voice->getValue() === Voice::Passive) && $gender->getValue() === Gender::Feminine && (!isPlural($person))) {
                $participe_passe .= 'e';
            }			
            if (($auxiliaire->getValue() === Auxiliaire::Etre || $voice->getValue() === Voice::Passive) && $gender->getValue() === Gender::Feminine && (isPlural($person))) {
                $participe_passe .= 'es';
            }
			if ($mood->getValue() === Mood::Imperatif  && $voice->getValue() === Voice::Active) {
                return new ImperatifPasseTenseConjugationPhrase($conjugated_auxiliaire_verb, $participe_passe);
            }		
            if ($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Passe && $voice->getValue() === Voice::Passive) {
                return new ImperatifPasseTenseinPassiveVoiceConjugationPhrase($conjugated_auxiliaire_verb, $etre_participe_passe, $participe_passe);
            }	
            if ($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Passe && $voice->getValue() === Voice::Pronominal) {
                return new ImperatifPasseTensePronominalConjugationPhrase($conjugated_auxiliaire_verb, $participe_passe);
            }				
            if ($voice->getValue() === Voice::Passive && $tense->getValue() != Tense::Futur_compose ) {
                return new CompositeTenseinPassiveVoiceConjugationPhrase($personal_pronoun, $conjugated_auxiliaire_verb, $etre_participe_passe, $participe_passe);
            }
            $conjugated_auxiliaire_verb = new ConjugatedAuxiliaireVerb($auxiliaire, $person, $tense, $mood, $voice);
		
            if ($tense->getValue() === Tense::Futur_compose && $voice->getValue() === Voice::Active) {
                return new FuturComposeTenseConjugationPhrase($personal_pronoun, $conjugated_auxiliaire_verb, $infinitiveVerb);
            }
            if ($tense->getValue() === Tense::Futur_compose && $voice->getValue() === Voice::Passive) {			
                return new FuturComposeTenseinPassiveVoiceConjugationPhrase($personal_pronoun, $conjugated_auxiliaire_verb, $etre_infinitive, $infinitiveVerb);
            }
            if ($tense->getValue() === Tense::Futur_compose && $voice->getValue() === Voice::Pronominal) {			
                return new FuturComposeTensePronominalConjugationPhrase($personal_pronoun, $conjugated_auxiliaire_verb, $reflexive_pronoun, $infinitiveVerb);
            }			
            if (isComposite($mood, $tense) && $voice->getValue() === Voice::Pronominal) {
                return new CompositeTensePronominalConjugationPhrase($personal_pronoun, $reflexive_pronoun, $conjugated_auxiliaire_verb, $participe_passe);
            }			
            return new CompositeTenseConjugationPhrase($personal_pronoun, $conjugated_auxiliaire_verb, $participe_passe);
        } else {
            $conjugated_verb = new ConjugatedVerb($infinitiveVerb, $person, $tense, $mood);
			$conjugated_auxiliaire_verb = new ConjugatedAuxiliaireVerb($auxiliaire, $person, $tense, $mood, $voice);
			$participe_passe = finding_participe_passe($infinitiveVerb);				
		    if (($auxiliaire->getValue() === Auxiliaire::Etre || $voice->getValue() === Voice::Passive 
			) && $gender->getValue() === Gender::Masculine && (isPlural($person))) {
                $participe_passe .= 's';
            }				
            if ($mood->getValue() === Mood::Imperatif && $voice->getValue() === Voice::Active) {
                return new ImperatifPresentTenseConjugationPhrase($conjugated_verb);
            }		
            if ($mood->getValue() === Mood::Imperatif && $voice->getValue() === Voice::Passive) {
				$conjugated_auxiliaire_verb = new ConjugatedAuxiliaireVerb($auxiliaire, $person, $tense, $mood, $voice); 
                return new ImperatifPresentTenseinPassiveVoiceConjugationPhrase($conjugated_auxiliaire_verb, $conjugated_verb);
            }
            if ($mood->getValue() === Mood::Imperatif && $voice->getValue() === Voice::Pronominal) {
                return new ImperatifPresentTensePronominalConjugationPhrase($conjugated_verb,$reflexive_pronoun);
            }				
            if (!isComposite($mood, $tense) && $voice->getValue() === Voice::Passive) {
                return new SimpleTensesPassiveConjugationPhrase($personal_pronoun, $conjugated_auxiliaire_verb, $participe_passe);
            }	
            if (!isComposite($mood, $tense) && $voice->getValue() === Voice::Pronominal) {
                return new SimpleTensePronominalConjugationPhrase($personal_pronoun, $reflexive_pronoun, $conjugated_verb);
            }				
            return new SimpleTenseConjugationPhrase($personal_pronoun, $conjugated_verb);
        }
    }
}
class SimpleTenseConjugationPhrase extends ConjugationPhrase
{
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitSimpleTense($this);
    }
    public $personal_pronoun, $conjugated_verb;
    public function __construct($personal_pronoun, ConjugatedVerb $conjugated_verb)
    {
        $this->personal_pronoun = $personal_pronoun;
        $this->conjugated_verb = $conjugated_verb;
    }
}
class SimpleTensePronominalConjugationPhrase extends ConjugationPhrase
{	
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitSimpleTensePronominal($this);
    }
    public $personal_pronoun, $reflexive_pronoun, $conjugated_verb;
    public function __construct($personal_pronoun, $reflexive_pronoun, ConjugatedVerb $conjugated_verb)
    {
        $this->personal_pronoun = $personal_pronoun;
		$this->reflexive_pronoun = $reflexive_pronoun;
        $this->conjugated_verb = $conjugated_verb;
    }
}
class CompositeTenseConjugationPhrase extends ConjugationPhrase
{
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitCompositeTense($this);
    }
    public $personal_pronoun, $conjugated_auxiliaire_verb, $participe_passe;
    public function __construct($personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $participe_passe)
    {
        $this->personal_pronoun = $personal_pronoun;
        $this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
        $this->participe_passe = $participe_passe;
    }
}
class CompositeTenseinPassiveVoiceConjugationPhrase extends ConjugationPhrase
{
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitCompositeTenseinPassiveVoice($this);
    }
    public $personal_pronoun, $etre_participe_passe, $conjugated_auxiliaire_verb, $participe_passe;
    public function __construct($personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $etre_participe_passe, $participe_passe)
    {
        $this->personal_pronoun = $personal_pronoun;
        $this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->etre_participe_passe = $etre_participe_passe;
        $this->participe_passe = $participe_passe;
    }
}
class CompositeTensePronominalConjugationPhrase extends ConjugationPhrase
{	
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitCompositeTensePronominal($this);
    }
    public $personal_pronoun, $reflexive_pronoun, $conjugated_auxiliaire_verb, $participe_passe;
    public function __construct($personal_pronoun, $reflexive_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $participe_passe)
    {
        $this->personal_pronoun = $personal_pronoun;
		$this->reflexive_pronoun = $reflexive_pronoun;
        $this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
        $this->participe_passe = $participe_passe;
    }
}
class ImperatifPresentTenseConjugationPhrase extends ConjugationPhrase
{
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitImperatifPresentTense($this);
    }
    public $conjugated_verb;
    public function __construct($conjugated_verb)
    {
        $this->conjugated_verb = $conjugated_verb;
    }
}
class ImperatifPresentTenseinPassiveVoiceConjugationPhrase extends ConjugationPhrase
{
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitImperatifPresentTenseinPassiveVoice($this);
    }
    public $conjugated_auxiliaire_verb,$conjugated_verb;
    public function __construct(ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $conjugated_verb)
    {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
        $this->conjugated_verb = $conjugated_verb;
    }
}
class ImperatifPresentTensePronominalConjugationPhrase extends ConjugationPhrase
{	
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitImperatifPresentTensePronominal($this);
    }
    public $conjugated_verb, $reflexive_pronoun;
	
    public function __construct($conjugated_verb, $reflexive_pronoun)
    {
        $this->conjugated_verb = $conjugated_verb;
		$this->reflexive_pronoun = $reflexive_pronoun;
    }
}
class ImperatifPasseTenseConjugationPhrase extends ConjugationPhrase
{
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitImperatifPasseTense($this);
    }
    public $conjugated_auxiliaire_verb, $participe_passe;
    public function __construct($conjugated_auxiliaire_verb, $participe_passe)
    {
        $this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
        $this->participe_passe = $participe_passe;
    }
}
class ImperatifPasseTenseinPassiveVoiceConjugationPhrase extends ConjugationPhrase
{
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitImperatifPasseTenseinPassiveVoice($this);
    }
    public $conjugated_auxiliaire_verb, $etre_participe_passe, $participe_passe;
    public function __construct($conjugated_auxiliaire_verb, $etre_participe_passe, $participe_passe)
    {
        $this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->etre_participe_passe = $etre_participe_passe;
        $this->participe_passe = $participe_passe;
    }
}
class ImperatifPasseTensePronominalConjugationPhrase extends ConjugationPhrase
{	// should only print '-'
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitImperatifPasseTensePronominal($this);
    }
    public $conjugated_auxiliaire_verb, $participe_passe;
    public function __construct($conjugated_auxiliaire_verb, $participe_passe)
    {
        $this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
        $this->participe_passe = $participe_passe;
    }
}
class FuturComposeTenseConjugationPhrase extends ConjugationPhrase
{
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitFuturComposeTense($this);
    }
    public $personal_pronoun, $conjugated_auxiliaire_verb, $infinitiveVerb;
    public function __construct($personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, InfinitiveVerb $infinitiveVerb)
    {
        $this->personal_pronoun = $personal_pronoun;
        $this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
        $this->infinitiveVerb = $infinitiveVerb;
    }
}
class FuturComposeTenseinPassiveVoiceConjugationPhrase extends ConjugationPhrase
{
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitFuturComposeTenseinPassiveVoice($this);
    }
    public $personal_pronoun, $conjugated_auxiliaire_verb, $etre_infinitive, $infinitiveVerb;
    public function __construct($personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $etre_infinitive, InfinitiveVerb $infinitiveVerb)
    {
        $this->personal_pronoun = $personal_pronoun;
        $this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->etre_infinitive = $etre_infinitive;
        $this->infinitiveVerb = $infinitiveVerb;
    }
}
class FuturComposeTensePronominalConjugationPhrase extends ConjugationPhrase
{     
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitFuturComposeTensePronominal($this);
    }
    public $personal_pronoun, $conjugated_auxiliaire_verb, $reflexive_pronoun, $infinitiveVerb;
    public function __construct($personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $reflexive_pronoun, InfinitiveVerb $infinitiveVerb)
    {
        $this->personal_pronoun = $personal_pronoun;
        $this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->reflexive_pronoun = $reflexive_pronoun;		
        $this->infinitiveVerb = $infinitiveVerb;
    }
}

class SimpleTensesPassiveConjugationPhrase extends ConjugationPhrase
{
    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitSimpleTensesPassive($this);
    }
    public $personal_pronoun, $conjugated_auxiliaire_verb, $infinitiveVerb;
    public function __construct($personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, $participe_passe)
    {
        $this->personal_pronoun = $personal_pronoun;
        $this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
        $this->participe_passe = $participe_passe;
    }
}
abstract class ConjugationPhraseVisitor
{
    abstract function visitSimpleTense(SimpleTenseConjugationPhrase $visitee);
    abstract function visitSimpleTensesPassive(SimpleTensesPassiveConjugationPhrase $visitee);		
	abstract function visitSimpleTensePronominal(SimpleTensePronominalConjugationPhrase $visitee);
    abstract function visitCompositeTense(CompositeTenseConjugationPhrase $visitee);
	abstract function visitCompositeTensePronominal(CompositeTensePronominalConjugationPhrase $visitee);
    abstract function visitCompositeTenseinPassiveVoice(CompositeTenseinPassiveVoiceConjugationPhrase $visitee);	
    abstract function visitImperatifPresentTense(ImperatifPresentTenseConjugationPhrase $visitee);
    abstract function visitImperatifPresentTenseinPassiveVoice(ImperatifPresentTenseinPassiveVoiceConjugationPhrase $visitee);		
	abstract function visitImperatifPresentTensePronominal(ImperatifPresentTensePronominalConjugationPhrase $visitee);
    abstract function visitImperatifPasseTense(ImperatifPasseTenseConjugationPhrase $visitee);
	abstract function visitImperatifPasseTensePronominal(ImperatifPasseTensePronominalConjugationPhrase $visitee);
    abstract function visitImperatifPasseTenseinPassiveVoice(ImperatifPasseTenseinPassiveVoiceConjugationPhrase $visitee);	
    abstract function visitFuturComposeTense(FuturComposeTenseConjugationPhrase $visitee);
    abstract function visitFuturComposeTenseinPassiveVoice(FuturComposeTenseinPassiveVoiceConjugationPhrase $visitee);
	abstract function visitFuturComposeTensePronominal(FuturComposeTensePronominalConjugationPhrase $visitee);	
}
class GoogleTTSConjugationPhraseVisitor extends ConjugationPhraseVisitor
{
    function visitSimpleTense(SimpleTenseConjugationPhrase $visitee)
    {
        return concatenate_apostrophized($visitee->personal_pronoun, $visitee->conjugated_verb);
    }
    function visitSimpleTensesPassive(SimpleTensesPassiveConjugationPhrase $visitee)
    {
		return concatenate_apostrophized($visitee->personal_pronoun, $visitee->conjugated_auxiliaire_verb). ' ' . $visitee->infinitiveVerb;
    }	
    function visitSimpleTensePronominal(SimpleTensePronominalConjugationPhrase $visitee)
    {
        return $visitee->personal_pronoun . ' ' .  concatenate_apostrophized($visitee->reflexive_pronoun, $visitee->conjugated_verb);
    }	
    function visitCompositeTense(CompositeTenseConjugationPhrase $visitee)
    {
        return concatenate_apostrophized($visitee->personal_pronoun, $visitee->conjugated_auxiliaire_verb) . ' ' . $visitee->participe_passe;
    }
    function visitCompositeTenseinPassiveVoice(CompositeTenseinPassiveVoiceConjugationPhrase $visitee)
    {
        return concatenate_apostrophized($visitee->personal_pronoun, $visitee->conjugated_auxiliaire_verb) . ' ' . $visitee->etre_participe_passe. ' ' . $visitee->participe_passe;
    }
    function visitCompositeTensePronominal(CompositeTensePronominalConjugationPhrase $visitee)
    {
        return $visitee->personal_pronoun . ' ' .  concatenate_apostrophized($visitee->reflexive_pronoun, $visitee->conjugated_auxiliaire_verb). ' ' . $visitee->participe_passe;
    }	
    function visitFuturComposeTense(FuturComposeTenseConjugationPhrase $visitee)
    {
        return $visitee->personal_pronoun . ' ' . $visitee->conjugated_auxiliaire_verb . ' ' . $visitee->infinitiveVerb;
    }
    function visitFuturComposeTenseinPassiveVoice(FuturComposeTenseinPassiveVoiceConjugationPhrase $visitee)
    {
        return $visitee->personal_pronoun . ' ' . $visitee->conjugated_auxiliaire_verb . ' '. $visitee->etre_infinitive . ' ' . $visitee->infinitiveVerb;
    }	
    function visitFuturComposeTensePronominal(FuturComposeTensePronominalConjugationPhrase $visitee)
    {
        return $visitee->personal_pronoun . ' ' . $visitee->conjugated_auxiliaire_verb . ' ' . concatenate_apostrophized($visitee->reflexive_pronoun, $visitee->infinitiveVerb);
    }	
    function visitImperatifPresentTense(ImperatifPresentTenseConjugationPhrase $visitee)
    {
        return $visitee->conjugated_verb;
    }
    function visitImperatifPresentTenseinPassiveVoice(ImperatifPresentTenseinPassiveVoiceConjugationPhrase $visitee)
    {
        return $visitee->conjugated_auxiliaire_verb . ' ' . $visitee->conjugated_verb;
    }	
    function visitImperatifPresentTensePronominal(ImperatifPresentTensePronominalConjugationPhrase $visitee)
    {
        return $visitee->conjugated_verb . $visitee->reflexive_pronoun;
    }		
    function visitImperatifPasseTense(ImperatifPasseTenseConjugationPhrase $visitee)
    {
        return $visitee->conjugated_auxiliaire_verb . ' ' . $visitee->participe_passe;
    }
    function visitImperatifPasseTenseinPassiveVoice(ImperatifPasseTenseinPassiveVoiceConjugationPhrase $visitee)
    {
        return $visitee->conjugated_auxiliaire_verb . ' ' . $visitee->etre_participe_passe. ' ' . $visitee->participe_passe;
    }	
    function visitImperatifPasseTensePronominal(ImperatifPasseTensePronominalConjugationPhrase $visitee)
    {
        return '-';
    }			
} 
function conjugation_phrase(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Gender $gender, Voice $voice, Person $person, Tense $tense, Mood $mood)
{
    $conjugationPhrase = ConjugationPhrase::create($infinitiveVerb, $auxiliaire, $gender, $voice, $person, $tense, $mood);
    $visitor = new GoogleTTSConjugationPhraseVisitor();
    return $conjugationPhrase->accept($visitor);
}
?>
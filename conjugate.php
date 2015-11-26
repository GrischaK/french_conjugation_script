<?php
require_once 'classes/Enum.php';
require_once 'classes/InfinitiveVerb.php';
require_once 'classes/ConjugatedVerb.php';
require_once 'classes/ConjugatedAuxiliaireVerb.php';
require_once 'classes/EndingWith.php';
require_once 'classes/Tense.php';
require_once 'classes/Person.php';
require_once 'classes/Mood.php';
require_once 'classes/Mode.php';
require_once 'classes/Auxiliaire.php';
require_once 'classes/ConjugationModel.php';
require_once 'classes/ExceptionModel.php';
require_once 'classes/IrregularExceptionGroup.php'; // should be replaced by DB
require_once 'word_stem.php';

// require_once 'groups/verbes_pronominaux.php';
// require_once 'groups/verbes_exclusivement_pronominaux.php';
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
    
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$enir)) {
        $exceptionmodel = ExceptionModel::ENIR;
    }
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$fuir)) {
        $exceptionmodel = ExceptionModel::FUIR;
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
    return new ExceptionModel($exceptionmodel);
}

function finding_conjugation_model(InfinitiveVerb $infinitiveVerb)
{
    $verbes_pronominaux = [
        'aimer',
        'lever'
    ];
    $verbes_exclusivement_pronominaux = [
        'abrater',
        'empommer'
    ];
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

function personal_pronoun(Person $person, Mood $mood)
{
    $finding_person = '"Unknown Person';
    $finding_person = [
        Person::FirstPersonSingular => 'je',
        Person::SecondPersonSingular => 'tu',
        Person::ThirdPersonSingular => 'il',
        Person::FirstPersonPlural => 'nous',
        Person::SecondPersonPlural => 'vous',
        Person::ThirdPersonPlural => 'ils'
    ];
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
    return $finding_reflexive_pronoun[$person->getValue()];
}

function merge_pronoun(Person $person, Mood $mood)
{
    if ($mood->getValue() === Mood::Subjonctif) {
        return $subjonctif_pre_pronouns[$person->getValue()] . $finding_person[$person->getValue()] . $finding_reflexive_pronoun[$person->getValue()];
    } else {
        return $finding_person[$person->getValue()] . $finding_reflexive_pronoun[$person->getValue()];
    }
}
include_once 'ending.php';

function aller(Person $person, Tense $tense, Mood $mood)
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

function conjugated_auxiliaire(Auxiliaire $auxiliaire, Person $person, Tense $tense, Mood $mood)
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
        return aller($person, $tense, $mood);
    }
    return $conjugated_auxiliaire[$mood->getValue()][$tense->getValue()][$person->getValue()];
}

function finding_auxiliaire(InfinitiveVerb $infinitiveVerb)
{
    // Auxiliaire::getVerbsThatUse(new Auxiliaire(Auxiliaire::AvoirandEtre)) // will use $aux_avoir_etre from Auxiliaire class
    if (in_array($infinitiveVerb, Auxiliaire::getVerbsThatUse(new Auxiliaire(Auxiliaire::Etre)))) { // later or in_array($infinitiveVerb, $verbes_pronominaux) only the pronominal version!
        $auxiliaire = Auxiliaire::Etre;
    } else {
        $auxiliaire = Auxiliaire::Avoir;
    }
    return new Auxiliaire($auxiliaire);
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
        'paranoïer'
    ])) // should be replaced with static $ier + $e_akut_ier+ $i_trema_er
{ // example used it: $fuir verbs
        
        return mb_substr(word_stem($infinitiveVerb, $person, $tense, $mood), 0, - 1) . ending($person, $tense, $mood, $endingwith, $exceptionmodel, $infinitiveVerb);
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
        ExceptionModel::FUIR,
        ExceptionModel::VETIR
    ]))
        $participe_present = participe_present_word_stem($infinitiveVerb) . 'ant';
        // beginning unregular
    $exceptionmodel = finding_exception_model($infinitiveVerb); // without this line Undefined variable
    if ($exceptionmodel->getValue() === ExceptionModel::AVOIR_IRR)
        $participe_present = participe_present_word_stem($infinitiveVerb) . 'ayant';
    if ($exceptionmodel->getValue() === ExceptionModel::ETRE_IRR)
        $participe_present = participe_present_word_stem($infinitiveVerb) . 'étant';
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
        // beginning unregular
    $exceptionmodel = finding_exception_model($infinitiveVerb); // without this line Undefined variable
    if (in_array(finding_exception_model($infinitiveVerb)->getValue(), [
        ExceptionModel::COURIR,
        ExceptionModel::VETIR,
        ExceptionModel::POUVOIR,
        ExceptionModel::SAVOIR,
        ExceptionModel::VOIR,
        ExceptionModel::VALOIR,
        ExceptionModel::ENIR
    ]))
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'u';
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::DEVOIR,
        ExceptionModel::MOUVOIR
    ]))
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'û';
    if ($exceptionmodel->getValue() === ExceptionModel::RIR)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'ert';
    if ($exceptionmodel->getValue() === ExceptionModel::MOURIR)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'ort';
    if ($exceptionmodel->getValue() === ExceptionModel::QUERIR)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'is';
    
    if ($exceptionmodel->getValue() === ExceptionModel::DEVOIR && substr($infinitiveVerb, - 8) == 'redevoir')
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'u';
    if ($exceptionmodel->getValue() === ExceptionModel::AVOIR_IRR)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'eu';
    if ($exceptionmodel->getValue() === ExceptionModel::ETRE_IRR)
        $participe_passe = participe_passe_word_stem($infinitiveVerb) . 'été';
    return $participe_passe;
}

function modes_impersonnels(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Mode $mode, Tense $tense)
{
    $participe_passe = finding_participe_passe($infinitiveVerb);
    $participe_present = finding_participe_present($infinitiveVerb);
    switch ($auxiliaire->getValue()) {
        case Auxiliaire::Etre:
            $modes_impersonnels = [
                Tense::Present => [
                    Mode::Infinitif => $infinitiveVerb,
                    Mode::Gerondif => 'en ' . $participe_present,
                    Mode::Participe => $participe_present
                ],
                Tense::Passe => [
                    Mode::Infinitif => Auxiliaire::Etre . ' ' . $participe_passe,
                    Mode::Gerondif => 'en étant ' . $participe_passe,
                    Mode::Participe => $participe_passe
                ]
            ];
            break;
        case Auxiliaire::Avoir:
            $modes_impersonnels = [
                Tense::Present => [
                    Mode::Infinitif => $infinitiveVerb,
                    Mode::Gerondif => 'en ' . $participe_present,
                    Mode::Participe => $participe_present
                ],
                Tense::Passe => [
                    Mode::Infinitif => Auxiliaire::Avoir . ' ' . $participe_passe,
                    Mode::Gerondif => 'en ayant ' . $participe_passe,
                    Mode::Participe => $participe_passe
                ]
            ];
            
            break;
    }
    return $modes_impersonnels[$tense->getValue()][$mode->getValue()];
}

function apostrophized($pronoun, ConjugatedVerb $conjugatedVerb, & $was_apostrophized = null)
{
    $h_apire = [
        'hérisser'
    ]; // example values
    if (preg_match('~(.*\b[jtms])e$~ui', $pronoun, $m) && (preg_match('~^h?(?:[aæàâeéèêëiîïoôœuûù]|y(?![aæàâeéèêëiîïoôœuûù]))~ui', $conjugatedVerb) && ! in_array($conjugatedVerb->getInfinitive(), $h_apire))) {
        $was_apostrophized = true;
        return "{$m[1]}’";
    }
    $was_apostrophized = false;
    return $pronoun;
}

function concatenate_apostrophized($pronoun, ConjugatedVerb $conjugatedVerb)
{
    $was_apostrophized = false;
    $possiblyApostrophizedPronoun = apostrophized($pronoun, $conjugatedVerb, $was_apostrophized);
    return $was_apostrophized ? $possiblyApostrophizedPronoun . $conjugatedVerb : "$possiblyApostrophizedPronoun $conjugatedVerb";
}

abstract class ConjugationPhrase
{

    abstract function accept(ConjugationPhraseVisitor $visitor);

    static function create(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood)
    {
        $personal_pronoun = personal_pronoun($person, $mood);
        if (isComposite($mood, $tense)) {
            $participe_passe = finding_participe_passe($infinitiveVerb);
            if (finding_auxiliaire($infinitiveVerb)->getValue() === Auxiliaire::Etre && (isPlural($person))) {
                $participe_passe .= 's';
            }
            $conjugated_auxiliaire_verb = new ConjugatedAuxiliaireVerb(finding_auxiliaire($infinitiveVerb), $person, $tense, $mood);
            if ($mood->getValue() === Mood::Imperatif) {
                return new ImperatifPasseTenseConjugationPhrase($conjugated_auxiliaire_verb, $participe_passe);
            }
            if ($tense->getValue() === Tense::Futur_compose) {
                return new FuturComposeTenseConjugationPhrase($personal_pronoun, $conjugated_auxiliaire_verb, $infinitiveVerb);
            }
            return new CompositeTenseConjugationPhrase($personal_pronoun, $conjugated_auxiliaire_verb, $participe_passe);
        } else {
            $conjugated_verb = new ConjugatedVerb($infinitiveVerb, $person, $tense, $mood);
            if ($mood->getValue() === Mood::Imperatif) {
                return new ImperatifPresentTenseConjugationPhrase($conjugated_verb);
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

class FuturComposeTenseConjugationPhrase extends ConjugationPhrase
{

    function accept(ConjugationPhraseVisitor $visitor)
    {
        return $visitor->visitFuturComposeTense($this);
    }

    public $personal_pronoun;

    public $conjugated_auxiliaire_verb;

    public $infinitiveVerb;

    public function __construct($personal_pronoun, ConjugatedAuxiliaireVerb $conjugated_auxiliaire_verb, InfinitiveVerb $infinitiveVerb)
    {
        $this->personal_pronoun = $personal_pronoun;
        $this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
        $this->infinitiveVerb = $infinitiveVerb;
    }
}

abstract class ConjugationPhraseVisitor
{

    abstract function visitSimpleTense(SimpleTenseConjugationPhrase $visitee);

    abstract function visitCompositeTense(CompositeTenseConjugationPhrase $visitee);

    abstract function visitImperatifPresentTense(ImperatifPresentTenseConjugationPhrase $visitee);

    abstract function visitImperatifPasseTense(ImperatifPasseTenseConjugationPhrase $visitee);

    abstract function visitFuturComposeTense(FuturComposeTenseConjugationPhrase $visitee);
}

class GoogleTTSConjugationPhraseVisitor extends ConjugationPhraseVisitor
{

    function visitSimpleTense(SimpleTenseConjugationPhrase $visitee)
    {
        return concatenate_apostrophized($visitee->personal_pronoun, $visitee->conjugated_verb);
    }

    function visitCompositeTense(CompositeTenseConjugationPhrase $visitee)
    {
        return concatenate_apostrophized($visitee->personal_pronoun, $visitee->conjugated_auxiliaire_verb) . ' ' . $visitee->participe_passe;
    }

    function visitImperatifPresentTense(ImperatifPresentTenseConjugationPhrase $visitee)
    {
        return $visitee->conjugated_verb;
    }

    function visitImperatifPasseTense(ImperatifPasseTenseConjugationPhrase $visitee)
    {
        return $visitee->conjugated_auxiliaire_verb . ' ' . $visitee->participe_passe;
    }

    function visitFuturComposeTense(FuturComposeTenseConjugationPhrase $visitee)
    {
        return $visitee->personal_pronoun . ' ' . $visitee->conjugated_auxiliaire_verb . ' ' . $visitee->infinitiveVerb;
    }
}

function conjugation_phrase(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood)
{
    $conjugationPhrase = ConjugationPhrase::create($infinitiveVerb, $person, $tense, $mood);
    $visitor = new GoogleTTSConjugationPhraseVisitor();
    return $conjugationPhrase->accept($visitor);
}
$variable = conjugate(new InfinitiveVerb('aimer'), new Person(Person::FirstPersonSingular), new Tense(Tense::Present), new Mood(Mood::Indicatif), new EndingWith(EndingWith::ER));
?>

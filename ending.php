<?php
function ending(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
    switch ($exceptionModel->getValue()) {
        case ExceptionModel::ENIR:
            return ending_enir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::VOIR:
            return ending_voir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::VALOIR:
            return ending_valoir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::FUIR:
            return ending_fuir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::SAILLIR: // also regular form like -ir with iss is availaible (not implemented yet)
            return ending_saillir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::BOUILLIR:
            return ending_bouillir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::ENVOYER:
            return ending_envoyer($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::COURIR:
            return ending_courir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::RIR:
            return ending_rir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::MOURIR:
            return ending_mourir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::QUERIR:
            return ending_querir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::CUEILLIR:
            return ending_cueillir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::VETIR:
            return ending_vetir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::DEVOIR:
            return ending_devoir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::MOUVOIR:
            return ending_mouvoir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::POUVOIR:
            return ending_pouvoir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case ExceptionModel::SAVOIR:
            return ending_savoir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
            
    }
    switch ($endingwith->getValue()) {
        case EndingWith::ER:
            return ending_er($person, $tense, $mood, $endingwith, $exceptionModel);
        case EndingWith::IR:
            return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
        case EndingWith::OIR:
            return ending_oir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
    }
    return null;
}

function ending_er(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel)
{
    $ending = [
        EndingWith::ER => [ // standard endings for verbs ending with -er
            Mood::Indicatif => [
                Tense::Present => [
                    Person::FirstPersonSingular => 'e',
                    Person::SecondPersonSingular => 'es',
                    Person::ThirdPersonSingular => 'e',
                    Person::FirstPersonPlural => 'ons',
                    Person::SecondPersonPlural => 'ez',
                    Person::ThirdPersonPlural => 'ent'
                ],
                Tense::Imparfait => [
                    Person::FirstPersonSingular => 'ais',
                    Person::SecondPersonSingular => 'ais',
                    Person::ThirdPersonSingular => 'ait',
                    Person::FirstPersonPlural => 'ions',
                    Person::SecondPersonPlural => 'iez',
                    Person::ThirdPersonPlural => 'aient'
                ],
                Tense::Passe => [
                    Person::FirstPersonSingular => 'ai',
                    Person::SecondPersonSingular => 'as',
                    Person::ThirdPersonSingular => 'a',
                    Person::FirstPersonPlural => 'âmes',
                    Person::SecondPersonPlural => 'âtes',
                    Person::ThirdPersonPlural => 'èrent'
                ],
                Tense::Futur => [
                    Person::FirstPersonSingular => 'erai',
                    Person::SecondPersonSingular => 'eras',
                    Person::ThirdPersonSingular => 'era',
                    Person::FirstPersonPlural => 'erons',
                    Person::SecondPersonPlural => 'erez',
                    Person::ThirdPersonPlural => 'eront'
                ]
            ],
            Mood::Subjonctif => [
                Tense::Present => [
                    Person::FirstPersonSingular => 'e',
                    Person::SecondPersonSingular => 'es',
                    Person::ThirdPersonSingular => 'e',
                    Person::FirstPersonPlural => 'ions',
                    Person::SecondPersonPlural => 'iez',
                    Person::ThirdPersonPlural => 'ent'
                ],
                Tense::Imparfait => [
                    Person::FirstPersonSingular => 'asse',
                    Person::SecondPersonSingular => 'asses',
                    Person::ThirdPersonSingular => 'ât',
                    Person::FirstPersonPlural => 'assions',
                    Person::SecondPersonPlural => 'assiez',
                    Person::ThirdPersonPlural => 'assent'
                ]
            ],
            Mood::Conditionnel => [
                Tense::Present => [
                    Person::FirstPersonSingular => 'erais',
                    Person::SecondPersonSingular => 'erais',
                    Person::ThirdPersonSingular => 'erait',
                    Person::FirstPersonPlural => 'erions',
                    Person::SecondPersonPlural => 'eriez',
                    Person::ThirdPersonPlural => 'eraient'
                ]
            ],
            Mood::Imperatif => [
                Tense::Present => [
                    Person::SecondPersonSingular => 'e',
                    Person::FirstPersonPlural => 'ons',
                    Person::SecondPersonPlural => 'ez'
                ]
            ]
        ]
    ];
    return $ending[$endingwith->getValue()][$mood->getValue()][$tense->getValue()][$person->getValue()];
}
function ending_ir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
    if (in_array($infinitiveVerb, IrregularExceptionGroup::$ohne_iss)) {
        return ending_ir_without_iss($person, $tense, $mood, $endingwith, $exceptionModel);
    } else {
        return ending_ir_with_iss($person, $tense, $mood, $endingwith, $exceptionModel);
    }
}
function ending_ir_with_iss(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel)
{
    $endings = [
        
        Mood::Indicatif => [
            Tense::Present => [
                Person::FirstPersonSingular => 'is',
                Person::SecondPersonSingular => 'is',
                Person::ThirdPersonSingular => 'it',
                Person::FirstPersonPlural => 'issions',
                Person::SecondPersonPlural => 'issiez',
                Person::ThirdPersonPlural => 'issent'
            ],
            Tense::Imparfait => [
                Person::FirstPersonSingular => 'issais',
                Person::SecondPersonSingular => 'issais',
                Person::ThirdPersonSingular => 'issait',
                Person::FirstPersonPlural => 'issions',
                Person::SecondPersonPlural => 'issiez',
                Person::ThirdPersonPlural => 'issaient'
            ],
            Tense::Passe => [
                Person::FirstPersonSingular => 'is',
                Person::SecondPersonSingular => 'is',
                Person::ThirdPersonSingular => 'it',
                Person::FirstPersonPlural => 'îmes',
                Person::SecondPersonPlural => 'îtes',
                Person::ThirdPersonPlural => 'irent'
            ],
            Tense::Futur => [
                Person::FirstPersonSingular => 'irai',
                Person::SecondPersonSingular => 'iras',
                Person::ThirdPersonSingular => 'ira',
                Person::FirstPersonPlural => 'irons',
                Person::SecondPersonPlural => 'irez',
                Person::ThirdPersonPlural => 'iront'
            ]
        ],
        Mood::Subjonctif => [
            Tense::Present => [
                Person::FirstPersonSingular => 'isse',
                Person::SecondPersonSingular => 'isses',
                Person::ThirdPersonSingular => 'isse',
                Person::FirstPersonPlural => 'issions',
                Person::SecondPersonPlural => 'issiez',
                Person::ThirdPersonPlural => 'issent'
            ],
            Tense::Imparfait => [
                Person::FirstPersonSingular => 'isse',
                Person::SecondPersonSingular => 'isses',
                Person::ThirdPersonSingular => 'ît',
                Person::FirstPersonPlural => 'issions',
                Person::SecondPersonPlural => 'issiez',
                Person::ThirdPersonPlural => 'issent'
            ]
        ],
        Mood::Conditionnel => [
            Tense::Present => [
                Person::FirstPersonSingular => 'irais',
                Person::SecondPersonSingular => 'irais',
                Person::ThirdPersonSingular => 'irait',
                Person::FirstPersonPlural => 'irions',
                Person::SecondPersonPlural => 'iriez',
                Person::ThirdPersonPlural => 'iraient'
            ]
        ],
        Mood::Imperatif => [
            Tense::Present => [
                Person::SecondPersonSingular => 'is',
                Person::FirstPersonPlural => 'issons',
                Person::SecondPersonPlural => 'issez'
            ]
        ]
        
    ];
    return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
}
function ending_ir_without_iss(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel)
{ 
    $endings = [      
        Mood::Indicatif => [
            Tense::Present => [// without -iss at beginning like ending regular -er
                Person::FirstPersonSingular => 's',
                Person::SecondPersonSingular => 's',
                Person::ThirdPersonSingular => 't',
                Person::FirstPersonPlural => 'ons',
                Person::SecondPersonPlural => 'ez',
                Person::ThirdPersonPlural => 'ent'
            ],
        		Tense::Passe => [
        		Person::FirstPersonSingular => 'us',
        		Person::SecondPersonSingular => 'us',
        		Person::ThirdPersonSingular => 'ut',
        		Person::FirstPersonPlural => 'ûmes',
        		Person::SecondPersonPlural => 'ûtes',
        		Person::ThirdPersonPlural => 'urent'
            ],	
            Tense::Imparfait => [// without -iss at beginning like ending regular -er
                Person::FirstPersonSingular => 'ais',
                Person::SecondPersonSingular => 'ais',
                Person::ThirdPersonSingular => 'ait',
                Person::FirstPersonPlural => 'ions',
                Person::SecondPersonPlural => 'iez',
                Person::ThirdPersonPlural => 'aient'
            ]
        ],
        Mood::Subjonctif => [
            Tense::Present => [// without -iss at beginning like ending regular -er
                Person::FirstPersonSingular => 'e',
                Person::SecondPersonSingular => 'es',
                Person::ThirdPersonSingular => 'e',
                Person::FirstPersonPlural => 'ions',
                Person::SecondPersonPlural => 'iez',
                Person::ThirdPersonPlural => 'ent'
            ],
			Tense::Imparfait => [ // changing first letter iî into u/û, else like ending-IR
				Person::FirstPersonSingular => 'usse',
				Person::SecondPersonSingular => 'usses',
				Person::ThirdPersonSingular => 'ût',
				Person::FirstPersonPlural => 'ussions',
				Person::SecondPersonPlural => 'ussiez',
				Person::ThirdPersonPlural => 'ussent'
			] 
        ],
        Mood::Imperatif => [
            Tense::Present => [// without -iss at beginning like ending regular -er
                Person::SecondPersonSingular => 's',
                Person::FirstPersonPlural => 'ons',
                Person::SecondPersonPlural => 'ez'
            ]
        ]
        
    ];
    
    $ending = ending_array_defines($endings, $person, $tense, $mood);
    if ($ending !== null) {
        return $ending;
    }
    return ending_ir_with_iss($person, $tense, $mood, new EndingWith(EndingWith::IR), $exceptionModel);
}

function ending_array_defines($array_mood_tense_person, Person $person, Tense $tense, Mood $mood)
{
    if (key_exists($mood->getValue(), $array_mood_tense_person)) {
        $array_tense_person = $array_mood_tense_person[$mood->getValue()];
        if (key_exists($tense->getValue(), $array_tense_person)) {
            $array_person = $array_tense_person[$tense->getValue()];
            if (key_exists($person->getValue(), $array_person)) {
                return $array_person[$person->getValue()];
            }
        }
    }
    return null;
}
function ending_envoyer(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
    assert($exceptionModel->getValue() === ExceptionModel::ENVOYER);
    assert($endingwith->getValue() === EndingWith::ER);
    $endings = [
        Mood::Indicatif => [
            Tense::Futur => [ // first e changed to r
                Person::FirstPersonSingular => 'rai',
                Person::SecondPersonSingular => 'ras',
                Person::ThirdPersonSingular => 'ra',
                Person::FirstPersonPlural => 'rons',
                Person::SecondPersonPlural => 'rez',
                Person::ThirdPersonPlural => 'ront'
            ]
        ],
        Mood::Conditionnel => [ // first e changed to r
            Tense::Present => [
                Person::FirstPersonSingular => 'rais',
                Person::SecondPersonSingular => 'rais',
                Person::ThirdPersonSingular => 'rait',
                Person::FirstPersonPlural => 'rions',
                Person::SecondPersonPlural => 'riez',
                Person::ThirdPersonPlural => 'raient'
            ]
        ]
    ];
    $ending  = ending_array_defines($endings, $person, $tense, $mood);
    if ($ending !== null) {
        return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
    }
    return ending_er($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_rir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
    assert($exceptionModel->getValue() === ExceptionModel::RIR);
    assert($endingwith->getValue() === EndingWith::IR);
    $endings = [
        Mood::Indicatif => [
            Tense::Present => [ // like regular verbs ending with -er
                Person::FirstPersonSingular => 'e',
                Person::SecondPersonSingular => 'es',
                Person::ThirdPersonSingular => 'e'
            ]
        ],
        Mood::Imperatif => [ // like regular verbs ending with -er
            Tense::Present => [
                Person::SecondPersonSingular => 'e'
            ]
        ]
    ];
    $ending  = ending_array_defines($endings, $person, $tense, $mood);
    if ($ending !== null) {
        return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
    }
    return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_courir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
    assert($exceptionModel->getValue() === ExceptionModel::COURIR);
    assert($endingwith->getValue() === EndingWith::IR);
    $endings = [
        Mood::Indicatif => [ // without 'i' at beginning like regular
            Tense::Futur => [ // without first letter i, like ending-oir
                Person::FirstPersonSingular => 'rai',
                Person::SecondPersonSingular => 'ras',
                Person::ThirdPersonSingular => 'ra',
                Person::FirstPersonPlural => 'rons',
                Person::SecondPersonPlural => 'rez',
                Person::ThirdPersonPlural => 'ront'
            ]
        ],
        Mood::Conditionnel => [
            Tense::Present => [ // replace first letter i -> r
                Person::FirstPersonSingular => 'rais',
                Person::SecondPersonSingular => 'rais',
                Person::ThirdPersonSingular => 'rait',
                Person::FirstPersonPlural => 'rions',
                Person::SecondPersonPlural => 'riez',
                Person::ThirdPersonPlural => 'raient'
            ]
        ]
    ];
    $ending  = ending_array_defines($endings, $person, $tense, $mood);
    if ($ending !== null) {
        return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
    }
    return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_mourir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
    assert($exceptionModel->getValue() === ExceptionModel::MOURIR);
    assert($endingwith->getValue() === EndingWith::IR);
    $endings = [
        Mood::Indicatif => [
            Tense::Futur => [ // without first letter i, like ending-oir
                Person::FirstPersonSingular => 'rai',
                Person::SecondPersonSingular => 'ras',
                Person::ThirdPersonSingular => 'ra',
                Person::FirstPersonPlural => 'rons',
                Person::SecondPersonPlural => 'rez',
                Person::ThirdPersonPlural => 'ront'
            ]
        ],
        Mood::Conditionnel => [
            Tense::Present => [ // replace first leeter i -> r
                Person::FirstPersonSingular => 'rais',
                Person::SecondPersonSingular => 'rais',
                Person::ThirdPersonSingular => 'rait',
                Person::FirstPersonPlural => 'rions',
                Person::SecondPersonPlural => 'riez',
                Person::ThirdPersonPlural => 'raient'
            ]
        ]
    ];
    $ending  = ending_array_defines($endings, $person, $tense, $mood);
    if ($ending !== null) {
        return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
    }
    return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_querir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
    assert($exceptionModel->getValue() === ExceptionModel::QUERIR);
    assert($endingwith->getValue() === EndingWith::IR);
    $endings = [
        Mood::Indicatif => [
            Tense::Present => [ //adds 3x'iers'/1x'ièr' to standard ending
                Person::FirstPersonSingular => 'iers',
                Person::SecondPersonSingular => 'iers',
                Person::ThirdPersonSingular => 'iert',
                Person::ThirdPersonPlural => 'ièrent'
            ],
            Tense::Futur => [ // replace first letter i -> r
                Person::FirstPersonSingular => 'rai',
                Person::SecondPersonSingular => 'ras',
                Person::ThirdPersonSingular => 'ra',
                Person::FirstPersonPlural => 'rons',
                Person::SecondPersonPlural => 'rez',
                Person::ThirdPersonPlural => 'ront'
            ]
        ],
        Mood::Subjonctif => [
            Tense::Present => [ //adds 'ièr' to standard ending
                Person::FirstPersonSingular => 'ière',
                Person::SecondPersonSingular => 'ières',
                Person::ThirdPersonSingular => 'ière',
                Person::ThirdPersonPlural => 'ièrent'
            ],
            Tense::Imparfait => [ // = like ending-IR but this verb uses ending_ir_without_iss!
                Person::FirstPersonSingular => 'isse',
                Person::SecondPersonSingular => 'isses',
                Person::ThirdPersonSingular => 'ît',
                Person::FirstPersonPlural => 'issions',
                Person::SecondPersonPlural => 'issiez',
                Person::ThirdPersonPlural => 'issent'
            ]
        ],
        Mood::Conditionnel => [ // replace first letter i -> r
            Tense::Present => [
                Person::FirstPersonSingular => 'rais',
                Person::SecondPersonSingular => 'rais',
                Person::ThirdPersonSingular => 'rait',
                Person::FirstPersonPlural => 'rions',
                Person::SecondPersonPlural => 'riez',
                Person::ThirdPersonPlural => 'raient'
            ]
        ],
        Mood::Imperatif => [
            Tense::Present => [
                Person::SecondPersonSingular => 'iers'
            ]
        ]
    ];
    $ending  = ending_array_defines($endings, $person, $tense, $mood);
    if ($ending !== null) {
        return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
    }
    return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_cueillir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
	assert($exceptionModel->getValue() === ExceptionModel::CUEILLIR);
	assert($endingwith->getValue() === EndingWith::IR);
	$endings = [
			Mood::Indicatif => [
					Tense::Present => [// like regular verbs ending with -er
							Person::FirstPersonSingular => 'e',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'e'
					],
					Tense::Futur => [// replace first letter i -> er
							Person::FirstPersonSingular => 'erai',
							Person::SecondPersonSingular => 'eras',
							Person::ThirdPersonSingular => 'era',
							Person::FirstPersonPlural => 'erons',
							Person::SecondPersonPlural => 'erez',
							Person::ThirdPersonPlural => 'eront'
					]
			],
			Mood::Subjonctif => [
					Tense::Imparfait => [ // = like ending-IR but this verb uses ending_ir_without_iss!
							Person::FirstPersonSingular => 'isse',
							Person::SecondPersonSingular => 'isses',
							Person::ThirdPersonSingular => 'ît',
							Person::FirstPersonPlural => 'issions',
							Person::SecondPersonPlural => 'issiez',
							Person::ThirdPersonPlural => 'issent'
					]
			],
			Mood::Conditionnel => [ // replace first letter i -> er
					Tense::Present => [
							Person::FirstPersonSingular => 'erais',
							Person::SecondPersonSingular => 'erais',
							Person::ThirdPersonSingular => 'erait',
							Person::FirstPersonPlural => 'erions',
							Person::SecondPersonPlural => 'eriez',
							Person::ThirdPersonPlural => 'eraient'
					]
			],
			Mood::Imperatif => [// like regular verbs ending with -er
					Tense::Present => [
							Person::SecondPersonSingular => 'e'
					]
			]
	];
	$ending  = ending_array_defines($endings, $person, $tense, $mood);
	if ($ending !== null) {
		return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
	}
	return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_vetir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
    assert($exceptionModel->getValue() === ExceptionModel::VETIR);
    assert($endingwith->getValue() === EndingWith::IR);
    $endings = [
        Mood::Indicatif => [ // without 'i' at beginning like regular
            Tense::Present => [
                Person::ThirdPersonSingular => ''
            ]
        ]
    ];
    $ending  = ending_array_defines($endings, $person, $tense, $mood);
    if ($ending !== null) {
        return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
    }
    return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_bouillir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)

{
	assert($exceptionModel->getValue() === ExceptionModel::BOUILLIR);
	assert($endingwith->getValue() === EndingWith::IR);
	$endings = [
			Mood::Subjonctif => [ // changing first letter iî into u/û, else like ending-IR
					Tense::Imparfait => [ // changing first letter iî into u/û, else like ending-IR
							Person::FirstPersonSingular => 'isse',
							Person::SecondPersonSingular => 'isses',
							Person::ThirdPersonSingular => 'ît',
							Person::FirstPersonPlural => 'issions',
							Person::SecondPersonPlural => 'issiez',
							Person::ThirdPersonPlural => 'issent'
					]
			]
	];
	$ending  = ending_array_defines($endings, $person, $tense, $mood);
	if ($ending !== null) {
		return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
	}
	return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_enir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
	assert($exceptionModel->getValue() === ExceptionModel::ENIR);
	assert($endingwith->getValue() === EndingWith::IR);
	$endings = [
			Mood::Indicatif => [
					Tense::Present => [ 
							Person::ThirdPersonPlural => 'nent' //irregular
					],
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'ins',
							Person::SecondPersonSingular => 'ins',
							Person::ThirdPersonSingular => 'int',
							Person::FirstPersonPlural => 'înmes',
							Person::SecondPersonPlural => 'întes',
							Person::ThirdPersonPlural => 'inrent'
					],
					Tense::Futur => [// replace first letter i -> d
							Person::FirstPersonSingular => 'drai',
							Person::SecondPersonSingular => 'dras',
							Person::ThirdPersonSingular => 'dra',
							Person::FirstPersonPlural => 'drons',
							Person::SecondPersonPlural => 'drez',
							Person::ThirdPersonPlural => 'dront'
					]
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'ne',
							Person::SecondPersonSingular => 'nes',
							Person::ThirdPersonSingular => 'ne',
							Person::FirstPersonPlural => 'ions',//regular?
							Person::SecondPersonPlural => 'iez',//regular?
							Person::ThirdPersonPlural => 'nent'
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'insse',
							Person::SecondPersonSingular => 'insses',
							Person::ThirdPersonSingular => 'înt',
							Person::FirstPersonPlural => 'inssions',
							Person::SecondPersonPlural => 'inssiez',
							Person::ThirdPersonPlural => 'inssent'
					]
			],
			Mood::Conditionnel => [ // replace first letter i -> d
					Tense::Present => [
							Person::FirstPersonSingular => 'drais',
							Person::SecondPersonSingular => 'drais',
							Person::ThirdPersonSingular => 'drait',
							Person::FirstPersonPlural => 'drions',
							Person::SecondPersonPlural => 'driez',
							Person::ThirdPersonPlural => 'draient'
					]
			]
	];
	$ending  = ending_array_defines($endings, $person, $tense, $mood);
	if ($ending !== null) {
		return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
	}
	return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_saillir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)

{
	assert($exceptionModel->getValue() === ExceptionModel::SAILLIR);
	assert($endingwith->getValue() === EndingWith::IR);
	$endings = [
			Mood::Indicatif => [
					Tense::Present => [ // like regular verbs ending with -er
							Person::FirstPersonSingular => 'e',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'e'
					],
					Tense::Futur => [// replace first letter i -> er
							Person::FirstPersonSingular => 'erai',
							Person::SecondPersonSingular => 'eras',
							Person::ThirdPersonSingular => 'era',
							Person::FirstPersonPlural => 'erons',
							Person::SecondPersonPlural => 'erez',
							Person::ThirdPersonPlural => 'eront'
					]
			],
			Mood::Subjonctif => [ 
					Tense::Imparfait => [ // changing first letter iî into u/û, else like ending-IR
							Person::FirstPersonSingular => 'isse',
							Person::SecondPersonSingular => 'isses',
							Person::ThirdPersonSingular => 'ît',
							Person::FirstPersonPlural => 'issions',
							Person::SecondPersonPlural => 'issiez',
							Person::ThirdPersonPlural => 'issent'
					]
			],
			Mood::Conditionnel => [ // replace first letter i -> er
					Tense::Present => [
							Person::FirstPersonSingular => 'erais',
							Person::SecondPersonSingular => 'erais',
							Person::ThirdPersonSingular => 'erait',
							Person::FirstPersonPlural => 'erions',
							Person::SecondPersonPlural => 'eriez',
							Person::ThirdPersonPlural => 'eraient'
					]
			],
			Mood::Imperatif => [// like regular verbs ending with -er
					Tense::Present => [
							Person::SecondPersonSingular => 'e'
					]
			]
	];
	$ending  = ending_array_defines($endings, $person, $tense, $mood);
	if ($ending !== null) {
		return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
	}
	return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}

function ending_oir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
    $endings = [
        Mood::Indicatif => [
            Tense::Futur => [ // without first letter i, else like ending-IR
                Person::FirstPersonSingular => 'rai',
                Person::SecondPersonSingular => 'ras',
                Person::ThirdPersonSingular => 'ra',
                Person::FirstPersonPlural => 'rons',
                Person::SecondPersonPlural => 'rez',
                Person::ThirdPersonPlural => 'ront'
            ]
        ],
        Mood::Conditionnel => [ // without first letter i, else like ending-IR
            Tense::Present => [
                Person::FirstPersonSingular => 'rais',
                Person::SecondPersonSingular => 'rais',
                Person::ThirdPersonSingular => 'rait',
                Person::FirstPersonPlural => 'rions',
                Person::SecondPersonPlural => 'riez',
                Person::ThirdPersonPlural => 'raient'
            ]
        ]
    ];
    $ending  = ending_array_defines($endings, $person, $tense, $mood);
    if ($ending !== null) {
        return $ending;
    }
    return ending_ir($person, $tense, $mood, new EndingWith(EndingWith::IR), $exceptionModel, $infinitiveVerb);
}
function ending_devoir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
    assert($exceptionModel->getValue() === ExceptionModel::DEVOIR);
    assert($endingwith->getValue() === EndingWith::OIR);
    $endings = [
        
        Mood::Indicatif => [
            Tense::Present => [
                Person::FirstPersonSingular => 'ois',
                Person::SecondPersonSingular => 'ois',
                Person::ThirdPersonSingular => 'oit',
                Person::ThirdPersonPlural => 'oivent'
            ]
        ],
        Mood::Subjonctif => [
            Tense::Present => [
                Person::FirstPersonSingular => 'oive',
                Person::SecondPersonSingular => 'oives',
                Person::ThirdPersonSingular => 'oive',
                Person::ThirdPersonPlural => 'oivent'
            ]
        ],
        Mood::Imperatif => [
            Tense::Present => [
                Person::SecondPersonSingular => 'ois'
            ]
        ]
    ];
    $ending  = ending_array_defines($endings, $person, $tense, $mood);
    if ($ending !== null) {
        return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
    }
    return ending_oir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_mouvoir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
    assert($exceptionModel->getValue() === ExceptionModel::MOUVOIR);
    assert($endingwith->getValue() === EndingWith::OIR);
    $endings = [
        
        Mood::Indicatif => [
            Tense::Present => [
                Person::FirstPersonSingular => 'eus',
                Person::SecondPersonSingular => 'eus',
                Person::ThirdPersonSingular => 'eut',
                Person::ThirdPersonPlural => 'euvent'
            ]
        ],
        Mood::Subjonctif => [
            Tense::Present => [
                Person::FirstPersonSingular => 'euve',
                Person::SecondPersonSingular => 'euves',
                Person::ThirdPersonSingular => 'euve',
                Person::ThirdPersonPlural => 'euvent'
            ]
        ],
        Mood::Imperatif => [
            Tense::Present => [
                Person::SecondPersonSingular => 'eus'
            ]
        ]
    ];
    $ending  = ending_array_defines($endings, $person, $tense, $mood);
    if ($ending !== null) {
        return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
    }
    return ending_oir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_pouvoir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
    assert($exceptionModel->getValue() === ExceptionModel::POUVOIR);
    assert($endingwith->getValue() === EndingWith::OIR);
    $endings = [
        
        Mood::Indicatif => [
            Tense::Present => [
                Person::FirstPersonSingular => 'eux',
                Person::SecondPersonSingular => 'eux',
                Person::ThirdPersonSingular => 'eut',
                Person::ThirdPersonPlural => 'euvent'
            ]
        ]
    ];
    $ending  = ending_array_defines($endings, $person, $tense, $mood);
    if ($ending !== null) {
        return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
    }
    return ending_oir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_savoir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
    assert($exceptionModel->getValue() === ExceptionModel::SAVOIR);
    assert($endingwith->getValue() === EndingWith::OIR);
    $endings = [
        
        Mood::Indicatif => [
            Tense::Present => [
                Person::FirstPersonSingular => 'ais',
                Person::SecondPersonSingular => 'ais',
                Person::ThirdPersonSingular => 'ait'
            ]
        ],
        Mood::Imperatif => [
            Tense::Present => [
                Person::SecondPersonSingular => 'e'
            ]
        ]
    ];
    $ending  = ending_array_defines($endings, $person, $tense, $mood);
    if ($ending !== null) {
        return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
    }
    return ending_oir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_valoir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
	assert($exceptionModel->getValue() === ExceptionModel::VALOIR);
	assert($endingwith->getValue() === EndingWith::OIR);
	$endings = [
			Mood::Indicatif => [
					Tense::Present => [ 
							Person::FirstPersonSingular => 'x',
							Person::SecondPersonSingular => 'x',
							Person::ThirdPersonSingular => 't'
					],
					Tense::Futur => [// replace first letter i -> d  maybe word_stem change later
							Person::FirstPersonSingular => 'drai',
							Person::SecondPersonSingular => 'dras',
							Person::ThirdPersonSingular => 'dra',
							Person::FirstPersonPlural => 'drons',
							Person::SecondPersonPlural => 'drez',
							Person::ThirdPersonPlural => 'dront'
					]
			],
			Mood::Subjonctif => [
				Tense::Present => [
							Person::FirstPersonSingular => 'e',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'e',
							Person::ThirdPersonPlural => 'ent'
            ]
        ],
			Mood::Conditionnel => [ // replace first letter i -> d  maybe word_stem change later
					Tense::Present => [
							Person::FirstPersonSingular => 'drais',
							Person::SecondPersonSingular => 'drais',
							Person::ThirdPersonSingular => 'drait',
							Person::FirstPersonPlural => 'drions',
							Person::SecondPersonPlural => 'driez',
							Person::ThirdPersonPlural => 'draient'
					]
			],
        Mood::Imperatif => [
            Tense::Present => [
                Person::SecondPersonSingular => 'x'
            ]
        ]
	];
	$ending  = ending_array_defines($endings, $person, $tense, $mood);
	if ($ending !== null) {
		return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
	}
	return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_voir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
	assert($exceptionModel->getValue() === ExceptionModel::VOIR);
	assert($endingwith->getValue() === EndingWith::OIR);
	$endings = [ // NEW anpassen
			Mood::Indicatif => [
					Tense::Present => [ 
							Person::FirstPersonSingular => 'x',
							Person::SecondPersonSingular => 'x',
							Person::ThirdPersonSingular => 't'
					],
					Tense::Futur => [// replace first letter i -> d  maybe word_stem change later
							Person::FirstPersonSingular => 'drai',
							Person::SecondPersonSingular => 'dras',
							Person::ThirdPersonSingular => 'dra',
							Person::FirstPersonPlural => 'drons',
							Person::SecondPersonPlural => 'drez',
							Person::ThirdPersonPlural => 'dront'
					]
			],
			Mood::Subjonctif => [
				Tense::Present => [
							Person::FirstPersonSingular => 'e',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'e',
							Person::ThirdPersonPlural => 'ent'
            ]
        ],
			Mood::Conditionnel => [ // replace first letter i -> d  maybe word_stem change later
					Tense::Present => [
							Person::FirstPersonSingular => 'drais',
							Person::SecondPersonSingular => 'drais',
							Person::ThirdPersonSingular => 'drait',
							Person::FirstPersonPlural => 'drions',
							Person::SecondPersonPlural => 'driez',
							Person::ThirdPersonPlural => 'draient'
					]
			],
        Mood::Imperatif => [
            Tense::Present => [
                Person::SecondPersonSingular => 'x'
            ]
        ]
	];
	$ending  = ending_array_defines($endings, $person, $tense, $mood);
	if ($ending !== null) {
		return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
	}
	return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
function ending_fuir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb)
{
	assert($exceptionModel->getValue() === ExceptionModel::FUIR);
	assert($endingwith->getValue() === EndingWith::IR);
	$endings = [ // NEW anpassen
			Mood::Indicatif => [
					Tense::Present => [ 
							Person::FirstPersonSingular => 'x',
							Person::SecondPersonSingular => 'x',
							Person::ThirdPersonSingular => 't'
					],
					Tense::Futur => [// replace first letter i -> d  maybe word_stem change later
							Person::FirstPersonSingular => 'drai',
							Person::SecondPersonSingular => 'dras',
							Person::ThirdPersonSingular => 'dra',
							Person::FirstPersonPlural => 'drons',
							Person::SecondPersonPlural => 'drez',
							Person::ThirdPersonPlural => 'dront'
					]
			],
			Mood::Subjonctif => [
				Tense::Present => [
							Person::FirstPersonSingular => 'e',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'e',
							Person::ThirdPersonPlural => 'ent'
            ]
        ],
			Mood::Conditionnel => [ // replace first letter i -> d  maybe word_stem change later
					Tense::Present => [
							Person::FirstPersonSingular => 'drais',
							Person::SecondPersonSingular => 'drais',
							Person::ThirdPersonSingular => 'drait',
							Person::FirstPersonPlural => 'drions',
							Person::SecondPersonPlural => 'driez',
							Person::ThirdPersonPlural => 'draient'
					]
			],
        Mood::Imperatif => [
            Tense::Present => [
                Person::SecondPersonSingular => 'x'
            ]
        ]
	];
	$ending  = ending_array_defines($endings, $person, $tense, $mood);
	if ($ending !== null) {
		return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
	}
	return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
}
?>
<?php
function ending(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	$result = call_user_func('ending_'.$exceptionModel->getValue (), $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb);
	if(!($result === false)) {
		return $result;
	}
	switch ($endingwith->getValue ()) {
		case EndingWith::ER :
			return ending_er ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
		case EndingWith::IR :
			return ending_ir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
		case EndingWith::I_TREMA_R :
			return ending_i_trema_r ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
		case EndingWith::RE :
			return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
		case EndingWith::OIR :
			return ending_oir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
	}
	return null;
}
function ending_er(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	$ending = [ 
			EndingWith::ER => [  // standard endings for verbs ending with -er
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
	return $ending [$endingwith->getValue ()] [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
}
function ending_ir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	if (in_array ( $infinitiveVerb, IrregularExceptionGroup::$ohne_iss )) {
		return ending_ir_without_iss ( $person, $tense, $mood, $endingwith, $exceptionModel );
	} else {
		return ending_ir_with_iss ( $person, $tense, $mood, $endingwith, $exceptionModel );
	}
}
function ending_ir_with_iss(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel) {
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'is',
							Person::SecondPersonSingular => 'is',
							Person::ThirdPersonSingular => 'it',
							Person::FirstPersonPlural => 'issons',
							Person::SecondPersonPlural => 'issez',
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
	return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
}
function ending_ir_without_iss(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel) {
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Present => [  // without -iss at beginning like ending regular -er
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
					Tense::Imparfait => [  // without -iss at beginning like ending regular -er
							Person::FirstPersonSingular => 'ais',
							Person::SecondPersonSingular => 'ais',
							Person::ThirdPersonSingular => 'ait',
							Person::FirstPersonPlural => 'ions',
							Person::SecondPersonPlural => 'iez',
							Person::ThirdPersonPlural => 'aient' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [  // without -iss at beginning like ending regular -er
							Person::FirstPersonSingular => 'e',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'e',
							Person::FirstPersonPlural => 'ions',
							Person::SecondPersonPlural => 'iez',
							Person::ThirdPersonPlural => 'ent' 
					],
					Tense::Imparfait => [  // changing first letter iî into u/û, else like ending-IR
							Person::FirstPersonSingular => 'usse',
							Person::SecondPersonSingular => 'usses',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ussions',
							Person::SecondPersonPlural => 'ussiez',
							Person::ThirdPersonPlural => 'ussent' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [  // without -iss at beginning like ending regular -er
							Person::SecondPersonSingular => 's', // change e -> s
							Person::FirstPersonPlural => 'ons',
							Person::SecondPersonPlural => 'ez' 
					] 
			] 
	];
	
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $ending;
	}
	return ending_ir_with_iss ( $person, $tense, $mood, new EndingWith ( EndingWith::IR ), $exceptionModel );
}
function ending_re(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel) {
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 's',
							Person::SecondPersonSingular => 's',
							Person::ThirdPersonSingular => 't',
							Person::FirstPersonPlural => 'ons',
							Person::SecondPersonPlural => 'ez',
							Person::ThirdPersonPlural => 'ent' 
					],
					Tense::Imparfait => [  // like ending_ir_without_iss
							Person::FirstPersonSingular => 'ais',
							Person::SecondPersonSingular => 'ais',
							Person::ThirdPersonSingular => 'ait',
							Person::FirstPersonPlural => 'ions',
							Person::SecondPersonPlural => 'iez',
							Person::ThirdPersonPlural => 'aient' 
					],
					Tense::Passe => [  // like ending_ir_with_iss
							Person::FirstPersonSingular => 'is',
							Person::SecondPersonSingular => 'is',
							Person::ThirdPersonSingular => 'it',
							Person::FirstPersonPlural => 'îmes',
							Person::SecondPersonPlural => 'îtes',
							Person::ThirdPersonPlural => 'irent' 
					],
					Tense::Futur => [  // delete first letter from ending_er or ending_ir
							Person::FirstPersonSingular => 'rai',
							Person::SecondPersonSingular => 'ras',
							Person::ThirdPersonSingular => 'ra',
							Person::FirstPersonPlural => 'rons',
							Person::SecondPersonPlural => 'rez',
							Person::ThirdPersonPlural => 'ront' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [  // like ending_er or ending_ir_without_iss
							Person::FirstPersonSingular => 'e',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'e',
							Person::FirstPersonPlural => 'ions',
							Person::SecondPersonPlural => 'iez',
							Person::ThirdPersonPlural => 'ent' 
					],
					Tense::Imparfait => [  // like ending_ir_with_iss
							Person::FirstPersonSingular => 'isse',
							Person::SecondPersonSingular => 'isses',
							Person::ThirdPersonSingular => 'ît',
							Person::FirstPersonPlural => 'issions',
							Person::SecondPersonPlural => 'issiez',
							Person::ThirdPersonPlural => 'issent' 
					] 
			],
			Mood::Conditionnel => [  // delete first letter from ending_er or ending_ir
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
					Tense::Present => [  // like ending_ir_without_iss
							Person::SecondPersonSingular => 's',
							Person::FirstPersonPlural => 'ons',
							Person::SecondPersonPlural => 'ez' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $ending;
	}
	return ending_re ( $person, $tense, $mood, new EndingWith ( EndingWith::I_TREMA_R ), $exceptionModel );
}
function ending_array_defines($array_mood_tense_person, Person $person, Tense $tense, Mood $mood) {
	if (key_exists ( $mood->getValue (), $array_mood_tense_person )) {
		$array_tense_person = $array_mood_tense_person [$mood->getValue ()];
		if (key_exists ( $tense->getValue (), $array_tense_person )) {
			$array_person = $array_tense_person [$tense->getValue ()];
			if (key_exists ( $person->getValue (), $array_person )) {
				return $array_person [$person->getValue ()];
			}
		}
	}
	return null;
}
function ending_envoyer(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::ENVOYER );
	assert ( $endingwith->getValue () === EndingWith::ER );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Futur => [  // first e changed to r
							Person::FirstPersonSingular => 'rai',
							Person::SecondPersonSingular => 'ras',
							Person::ThirdPersonSingular => 'ra',
							Person::FirstPersonPlural => 'rons',
							Person::SecondPersonPlural => 'rez',
							Person::ThirdPersonPlural => 'ront' 
					] 
			],
			Mood::Conditionnel => [  // first e changed to r
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
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_er ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_aller_irr(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::ALLER );
	assert ( $endingwith->getValue () === EndingWith::ER );
	$endings = [ 
			
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'vais',
							Person::SecondPersonSingular => 'vas',
							Person::ThirdPersonSingular => 'va',
							Person::ThirdPersonPlural => 'vont' 
					],
					Tense::Futur => [  // like in ending_ir_with_iss
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
							Person::FirstPersonSingular => 'aille',
							Person::SecondPersonSingular => 'ailles',
							Person::ThirdPersonSingular => 'aille',
							Person::ThirdPersonPlural => 'aillent' 
					] 
			],
			Mood::Conditionnel => [ 
					Tense::Present => [  // like in ending_ir_with_iss
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
							Person::SecondPersonSingular => 'va' 
					] 
			] 
	];
	if ($infinitiveVerb == 'raller') {
		$endings = [ 
				Mood::Indicatif => [  // add 'e' before orginal ending
						Tense::Present => [ 
								Person::FirstPersonSingular => 'evais',
								Person::SecondPersonSingular => 'evas',
								Person::ThirdPersonSingular => 'eva',
								Person::ThirdPersonPlural => 'evont' 
						] 
				],
				Mood::Imperatif => [  // add 'e' before orginal ending
						Tense::Present => [ 
								Person::SecondPersonSingular => 'eva' 
						] 
				] 
		];
	}
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_er ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_etre_irr(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::ETRE_IRR );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [ 
			
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
							Person::FirstPersonPlural => 'étions',
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
					Tense::Futur => [  // i -> se?
							Person::FirstPersonSingular => 'serai',
							Person::SecondPersonSingular => 'seras',
							Person::ThirdPersonSingular => 'sera',
							Person::FirstPersonPlural => 'serons',
							Person::SecondPersonPlural => 'serez',
							Person::ThirdPersonPlural => 'seront' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [  // f + i -> u ???
							Person::FirstPersonSingular => 'sois',
							Person::SecondPersonSingular => 'sois',
							Person::ThirdPersonSingular => 'soit',
							Person::FirstPersonPlural => 'soyons',
							Person::SecondPersonPlural => 'soyez',
							Person::ThirdPersonPlural => 'soient' 
					],
					Tense::Imparfait => [  // f + i -> u ???
							Person::FirstPersonSingular => 'fusse',
							Person::SecondPersonSingular => 'fusses',
							Person::ThirdPersonSingular => 'fût',
							Person::FirstPersonPlural => 'fussions',
							Person::SecondPersonPlural => 'fussiez',
							Person::ThirdPersonPlural => 'fussent' 
					] 
			],
			Mood::Conditionnel => [ 
					Tense::Present => [  // i -> se?
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
							Person::SecondPersonPlural => 'soyons',
							Person::ThirdPersonPlural => 'soyez' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_faire(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::FAIRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [ 
			
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::ThirdPersonPlural => 'ont',
							Person::SecondPersonPlural => 'tes' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::SecondPersonPlural => 'tes' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_taire(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::TAIRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'us',
							Person::SecondPersonSingular => 'us',
							Person::ThirdPersonSingular => 'ut',
							Person::FirstPersonPlural => 'ûmes',
							Person::SecondPersonPlural => 'ûtes',
							Person::ThirdPersonPlural => 'urent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Imparfait => [  // = like ending-IR but this verb uses ending_ir_without_iss!
							Person::FirstPersonSingular => 'usse',
							Person::SecondPersonSingular => 'usses',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ussions',
							Person::SecondPersonPlural => 'ussiez',
							Person::ThirdPersonPlural => 'ussent' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_moudre(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::MOUDRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'us',
							Person::SecondPersonSingular => 'us',
							Person::ThirdPersonSingular => 'ut',
							Person::FirstPersonPlural => 'ûmes',
							Person::SecondPersonPlural => 'ûtes',
							Person::ThirdPersonPlural => 'urent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Imparfait => [  // = like ending-IR but this verb uses ending_ir_without_iss!
							Person::FirstPersonSingular => 'usse',
							Person::SecondPersonSingular => 'usses',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ussions',
							Person::SecondPersonPlural => 'ussiez',
							Person::ThirdPersonPlural => 'ussent' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_soudre(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::SOUDRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'us',
							Person::SecondPersonSingular => 'us',
							Person::ThirdPersonSingular => 'ut',
							Person::FirstPersonPlural => 'ûmes',
							Person::SecondPersonPlural => 'ûtes',
							Person::ThirdPersonPlural => 'urent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Imparfait => [  // = like ending-IR but this verb uses ending_ir_without_iss!
							Person::FirstPersonSingular => 'usse',
							Person::SecondPersonSingular => 'usses',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ussions',
							Person::SecondPersonPlural => 'ussiez',
							Person::ThirdPersonPlural => 'ussent' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_resoudre(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::RESOUDRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'us',
							Person::SecondPersonSingular => 'us',
							Person::ThirdPersonSingular => 'ut',
							Person::FirstPersonPlural => 'ûmes',
							Person::SecondPersonPlural => 'ûtes',
							Person::ThirdPersonPlural => 'urent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Imparfait => [  // = like ending-IR but this verb uses ending_ir_without_iss!
							Person::FirstPersonSingular => 'usse',
							Person::SecondPersonSingular => 'usses',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ussions',
							Person::SecondPersonPlural => 'ussiez',
							Person::ThirdPersonPlural => 'ussent' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_ire(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [  // / addding s to -er endings
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'sons',
							Person::SecondPersonPlural => 'sez',
							Person::ThirdPersonPlural => 'sent' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'sais',
							Person::SecondPersonSingular => 'sais',
							Person::ThirdPersonSingular => 'sait',
							Person::FirstPersonPlural => 'sions',
							Person::SecondPersonPlural => 'siez',
							Person::ThirdPersonPlural => 'saient' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'se',
							Person::SecondPersonSingular => 'ses',
							Person::ThirdPersonSingular => 'se',
							Person::FirstPersonPlural => 'sions',
							Person::SecondPersonPlural => 'siez',
							Person::ThirdPersonPlural => 'sent' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'sons',
							Person::SecondPersonPlural => 'sez' 
					] 
			] 
	];
	if ($exceptionModel->getValue () == ExceptionModel::DIRE) {
		$endings = [  // / addding s to -er endings
				Mood::Indicatif => [ 
						Tense::Present => [ 
								Person::FirstPersonPlural => 'sons',
								Person::SecondPersonPlural => 'sez',
								Person::ThirdPersonPlural => 'sent' 
						],
						Tense::Imparfait => [ 
								Person::FirstPersonSingular => 'sais',
								Person::SecondPersonSingular => 'sais',
								Person::ThirdPersonSingular => 'sait',
								Person::FirstPersonPlural => 'sions',
								Person::SecondPersonPlural => 'siez',
								Person::ThirdPersonPlural => 'saient' 
						] 
				],
				Mood::Subjonctif => [ 
						Tense::Present => [ 
								Person::FirstPersonSingular => 'se',
								Person::SecondPersonSingular => 'ses',
								Person::ThirdPersonSingular => 'se',
								Person::FirstPersonPlural => 'sions',
								Person::SecondPersonPlural => 'siez',
								Person::ThirdPersonPlural => 'sent' 
						] 
				],
				Mood::Imperatif => [ 
						Tense::Present => [ 
								Person::FirstPersonPlural => 'sons',
								Person::SecondPersonPlural => 'ites' 
						] 
				] 
		]; // only this ending is changed from ending_ire
	}
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_lire(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::LIRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [  // / addding s to -er endings + changes for Passe + Subjonctif Imparfait, else like ending_ire
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'sons',
							Person::SecondPersonPlural => 'sez',
							Person::ThirdPersonPlural => 'sent' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'sais',
							Person::SecondPersonSingular => 'sais',
							Person::ThirdPersonSingular => 'sait',
							Person::FirstPersonPlural => 'sions',
							Person::SecondPersonPlural => 'siez',
							Person::ThirdPersonPlural => 'saient' 
					],
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'us',
							Person::SecondPersonSingular => 'us',
							Person::ThirdPersonSingular => 'ut',
							Person::FirstPersonPlural => 'ûmes',
							Person::SecondPersonPlural => 'ûtes',
							Person::ThirdPersonPlural => 'urent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'se',
							Person::SecondPersonSingular => 'ses',
							Person::ThirdPersonSingular => 'se',
							Person::FirstPersonPlural => 'sions',
							Person::SecondPersonPlural => 'siez',
							Person::ThirdPersonPlural => 'sent' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'usse',
							Person::SecondPersonSingular => 'usses',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ussions',
							Person::SecondPersonPlural => 'ussiez',
							Person::ThirdPersonPlural => 'ussent' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'sons',
							Person::SecondPersonPlural => 'sez' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_uire(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::UIRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [  // / addding s to -er endings
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'sons',
							Person::SecondPersonPlural => 'sez',
							Person::ThirdPersonPlural => 'sent' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'sais',
							Person::SecondPersonSingular => 'sais',
							Person::ThirdPersonSingular => 'sait',
							Person::FirstPersonPlural => 'sions',
							Person::SecondPersonPlural => 'siez',
							Person::ThirdPersonPlural => 'saient' 
					],
					Tense::Passe => [  // adding 's' to standard ending
							Person::FirstPersonSingular => 'sis',
							Person::SecondPersonSingular => 'sis',
							Person::ThirdPersonSingular => 'sit',
							Person::FirstPersonPlural => 'sîmes',
							Person::SecondPersonPlural => 'sîtes',
							Person::ThirdPersonPlural => 'sirent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'se',
							Person::SecondPersonSingular => 'ses',
							Person::ThirdPersonSingular => 'se',
							Person::FirstPersonPlural => 'sions',
							Person::SecondPersonPlural => 'siez',
							Person::ThirdPersonPlural => 'sent' 
					],
					Tense::Imparfait => [  // adding 's' to standard ending
							Person::FirstPersonSingular => 'sisse',
							Person::SecondPersonSingular => 'sisses',
							Person::ThirdPersonSingular => 'sît',
							Person::FirstPersonPlural => 'sissions',
							Person::SecondPersonPlural => 'sissiez',
							Person::ThirdPersonPlural => 'sissent' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'sons',
							Person::SecondPersonPlural => 'sez' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_bruire(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) // some forms are defectif
{
	assert ( $exceptionModel->getValue () === ExceptionModel::BRUIRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [  // added 'ss' to ending
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'ssons',
							Person::SecondPersonPlural => 'ssez',
							Person::ThirdPersonPlural => 'ssent' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'ssais',
							Person::SecondPersonSingular => 'ssais',
							Person::ThirdPersonSingular => 'ssait',
							Person::FirstPersonPlural => 'ssions',
							Person::SecondPersonPlural => 'ssiez',
							Person::ThirdPersonPlural => 'ssaient' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'sse',
							Person::SecondPersonSingular => 'sses',
							Person::ThirdPersonSingular => 'sse',
							Person::FirstPersonPlural => 'ssions',
							Person::SecondPersonPlural => 'ssiez',
							Person::ThirdPersonPlural => 'ssent' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'ssasse',
							Person::SecondPersonSingular => 'ssasses',
							Person::ThirdPersonSingular => 'ssât',
							Person::FirstPersonPlural => 'ssassions',
							Person::SecondPersonPlural => 'ssassiez',
							Person::ThirdPersonPlural => 'ssassent' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'ssons',
							Person::SecondPersonPlural => 'ssez' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_rire(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::RIRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [ 
			Mood::Subjonctif => [  // added 'ss' to ending
					Tense::Present => [ 
							Person::FirstPersonPlural => 'ssions',
							Person::SecondPersonPlural => 'ssiez',
							Person::ThirdPersonPlural => 'ssent' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_boire(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::BOIRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [  // / addding v to -er endings + changes for Passe + Subjonctif Imparfait, else like ending_ire
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'vons',
							Person::SecondPersonPlural => 'vez',
							Person::ThirdPersonPlural => 'vent' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'vais',
							Person::SecondPersonSingular => 'vais',
							Person::ThirdPersonSingular => 'vait',
							Person::FirstPersonPlural => 'vions',
							Person::SecondPersonPlural => 'viez',
							Person::ThirdPersonPlural => 'vaient' 
					],
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'us',
							Person::SecondPersonSingular => 'us',
							Person::ThirdPersonSingular => 'ut',
							Person::FirstPersonPlural => 'ûmes',
							Person::SecondPersonPlural => 'ûtes',
							Person::ThirdPersonPlural => 'urent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 've',
							Person::SecondPersonSingular => 'ves',
							Person::ThirdPersonSingular => 've',
							Person::FirstPersonPlural => 'vions',
							Person::SecondPersonPlural => 'viez',
							Person::ThirdPersonPlural => 'vent' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'usse',
							Person::SecondPersonSingular => 'usses',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ussions',
							Person::SecondPersonPlural => 'ussiez',
							Person::ThirdPersonPlural => 'ussent' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'vons',
							Person::SecondPersonPlural => 'vez' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_passe_subjonctif_changes_re(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [  // / addding v to -er endings + changes for Passe + Subjonctif Imparfait, else like ending_ire
			Mood::Indicatif => [ 
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'us',
							Person::SecondPersonSingular => 'us',
							Person::ThirdPersonSingular => 'ut',
							Person::FirstPersonPlural => 'ûmes',
							Person::SecondPersonPlural => 'ûtes',
							Person::ThirdPersonPlural => 'urent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'usse',
							Person::SecondPersonSingular => 'usses',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ussions',
							Person::SecondPersonPlural => 'ussiez',
							Person::ThirdPersonPlural => 'ussent' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_crire(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::CRIRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [  // / addding v to -er endings + changes for Passe + Subjonctif Imparfait, else like ending_ire
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'vons',
							Person::SecondPersonPlural => 'vez',
							Person::ThirdPersonPlural => 'vent' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'vais',
							Person::SecondPersonSingular => 'vais',
							Person::ThirdPersonSingular => 'vait',
							Person::FirstPersonPlural => 'vions',
							Person::SecondPersonPlural => 'viez',
							Person::ThirdPersonPlural => 'vaient' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 've',
							Person::SecondPersonSingular => 'ves',
							Person::ThirdPersonSingular => 've',
							Person::FirstPersonPlural => 'vions',
							Person::SecondPersonPlural => 'viez',
							Person::ThirdPersonPlural => 'vent' 
					],
					Tense::Imparfait => [  // adding 'v' to standard endings
							Person::FirstPersonSingular => 'visse',
							Person::SecondPersonSingular => 'visses',
							Person::ThirdPersonSingular => 'vît',
							Person::FirstPersonPlural => 'vissions',
							Person::SecondPersonPlural => 'vissiez',
							Person::ThirdPersonPlural => 'vissent' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'vons',
							Person::SecondPersonPlural => 'vez' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_croire(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::CROIRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [  // / addding y to -er endings (not all like ending_ir) + changes for Passe + Subjonctif Imparfait, else like ending_ire
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'yons',
							Person::SecondPersonPlural => 'yez' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'yais',
							Person::SecondPersonSingular => 'yais',
							Person::ThirdPersonSingular => 'yait',
							Person::FirstPersonPlural => 'yions',
							Person::SecondPersonPlural => 'yiez',
							Person::ThirdPersonPlural => 'yaient' 
					],
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'us',
							Person::SecondPersonSingular => 'us',
							Person::ThirdPersonSingular => 'ut',
							Person::FirstPersonPlural => 'ûmes',
							Person::SecondPersonPlural => 'ûtes',
							Person::ThirdPersonPlural => 'urent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'yions',
							Person::SecondPersonPlural => 'yiez' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'usse',
							Person::SecondPersonSingular => 'usses',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ussions',
							Person::SecondPersonPlural => 'ussiez',
							Person::ThirdPersonPlural => 'ussent' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'yons',
							Person::SecondPersonPlural => 'yez' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_ire_with_iss(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [  // / addding -iss to -er endings
			Mood::Indicatif => [ 
					Tense::Present => [  // add additonal -is+s
							Person::FirstPersonPlural => 'issons',
							Person::SecondPersonPlural => 'issez',
							Person::ThirdPersonPlural => 'issent' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'issais',
							Person::SecondPersonSingular => 'issais',
							Person::ThirdPersonSingular => 'issait',
							Person::FirstPersonPlural => 'issions',
							Person::SecondPersonPlural => 'issiez',
							Person::ThirdPersonPlural => 'issaient' 
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
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'issons',
							Person::SecondPersonPlural => 'issez' 
					] 
			] 
	];
	
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_aitre(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::AITRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [  // / addding -iss to -er endings
			Mood::Indicatif => [ 
					Tense::Present => [  // add additonal -is+s
							Person::FirstPersonPlural => 'issons',
							Person::SecondPersonPlural => 'issez',
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
							Person::FirstPersonSingular => 'us',
							Person::SecondPersonSingular => 'us',
							Person::ThirdPersonSingular => 'ut',
							Person::FirstPersonPlural => 'ûmes',
							Person::SecondPersonPlural => 'ûtes',
							Person::ThirdPersonPlural => 'urent' 
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
					Tense::Imparfait => [  // = like ending-IR but this verb uses ending_ir_without_iss!
							Person::FirstPersonSingular => 'usse',
							Person::SecondPersonSingular => 'usses',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ussions',
							Person::SecondPersonPlural => 'ussiez',
							Person::ThirdPersonPlural => 'ussent' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'issons',
							Person::SecondPersonPlural => 'issez' 
					] 
			] 
	]; // only this is different from ending_circoncire
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_oitre(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::OITRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [  // / addding -iss to -er endings
			Mood::Indicatif => [ 
					Tense::Present => [  // add additonal -is+s
							Person::FirstPersonPlural => 'issons',
							Person::SecondPersonPlural => 'issez',
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
							Person::FirstPersonSingular => 'ûs',
							Person::SecondPersonSingular => 'ûs',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ûmes',
							Person::SecondPersonPlural => 'ûtes',
							Person::ThirdPersonPlural => 'ûrent' 
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
					Tense::Imparfait => [  // = like ending-IR but this verb uses ending_ir_without_iss!
							Person::FirstPersonSingular => 'ûsse',
							Person::SecondPersonSingular => 'ûsses',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ûssions',
							Person::SecondPersonPlural => 'ûssiez',
							Person::ThirdPersonPlural => 'ûssent' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::FirstPersonPlural => 'issons',
							Person::SecondPersonPlural => 'issez' 
					] 
			] 
	]; // only this is different from ending_circoncire
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_plaire(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::PLAIRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::ThirdPersonSingular => 'ît' 
					],
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'us',
							Person::SecondPersonSingular => 'us',
							Person::ThirdPersonSingular => 'ut',
							Person::FirstPersonPlural => 'ûmes',
							Person::SecondPersonPlural => 'ûtes',
							Person::ThirdPersonPlural => 'urent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Imparfait => [  // = like ending-IR but this verb uses ending_ir_without_iss!
							Person::FirstPersonSingular => 'usse',
							Person::SecondPersonSingular => 'usses',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ussions',
							Person::SecondPersonPlural => 'ussiez',
							Person::ThirdPersonPlural => 'ussent' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_raire(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::RAIRE );
	assert ( $endingwith->getValue () === EndingWith::RE );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Passe => [  // like ending_er
							Person::FirstPersonSingular => 'ai',
							Person::SecondPersonSingular => 'as',
							Person::ThirdPersonSingular => 'a',
							Person::FirstPersonPlural => 'âmes',
							Person::SecondPersonPlural => 'âtes',
							Person::ThirdPersonPlural => 'èrent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Imparfait => [  // like ending_er
							Person::FirstPersonSingular => 'asse',
							Person::SecondPersonSingular => 'asses',
							Person::ThirdPersonSingular => 'ât',
							Person::FirstPersonPlural => 'assions',
							Person::SecondPersonPlural => 'assiez',
							Person::ThirdPersonPlural => 'assent' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_avoir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::AVOIR_IRR );
	assert ( $endingwith->getValue () === EndingWith::OIR );
	$endings = [ 
			
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'ai',
							Person::SecondPersonSingular => 'as',
							Person::ThirdPersonSingular => 'a',
							Person::FirstPersonPlural => 'avons',
							Person::SecondPersonPlural => 'avez',
							Person::ThirdPersonPlural => 'ont' 
					],
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'eus',
							Person::SecondPersonSingular => 'eus',
							Person::ThirdPersonSingular => 'eut',
							Person::FirstPersonPlural => 'eûmes',
							Person::SecondPersonPlural => 'eûtes',
							Person::ThirdPersonPlural => 'eurent' 
					],
					Tense::Futur => [  // a + i-> u
							Person::FirstPersonSingular => 'aurai',
							Person::SecondPersonSingular => 'auras',
							Person::ThirdPersonSingular => 'aura',
							Person::FirstPersonPlural => 'aurons',
							Person::SecondPersonPlural => 'aurez',
							Person::ThirdPersonPlural => 'auront' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'aie',
							Person::SecondPersonSingular => 'aies',
							Person::ThirdPersonSingular => 'ait',
							Person::FirstPersonPlural => 'ayons',
							Person::SecondPersonPlural => 'ayez',
							Person::ThirdPersonPlural => 'aient' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'eusse',
							Person::SecondPersonSingular => 'eusses',
							Person::ThirdPersonSingular => 'eût',
							Person::FirstPersonPlural => 'eussions',
							Person::SecondPersonPlural => 'eussiez',
							Person::ThirdPersonPlural => 'eussent' 
					] 
			],
			Mood::Conditionnel => [ 
					Tense::Present => [  // a + i-> u
							Person::FirstPersonSingular => 'aurais',
							Person::SecondPersonSingular => 'aurais',
							Person::ThirdPersonSingular => 'aurait',
							Person::FirstPersonPlural => 'aurions',
							Person::SecondPersonPlural => 'auriez',
							Person::ThirdPersonPlural => 'auraient' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::SecondPersonSingular => 'aie',
							Person::FirstPersonPlural => 'ayons',
							Person::SecondPersonPlural => 'ayez' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_oir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_i_trema_r(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel) {
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'ïs',
							Person::SecondPersonSingular => 'ïs',
							Person::ThirdPersonSingular => 'ït',
							Person::FirstPersonPlural => 'ïssons',
							Person::SecondPersonPlural => 'ïssez',
							Person::ThirdPersonPlural => 'ïssent' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'ïssais',
							Person::SecondPersonSingular => 'ïssais',
							Person::ThirdPersonSingular => 'ïssait',
							Person::FirstPersonPlural => 'ïssions',
							Person::SecondPersonPlural => 'ïssiez',
							Person::ThirdPersonPlural => 'ïssaient' 
					],
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'ïs',
							Person::SecondPersonSingular => 'ïs',
							Person::ThirdPersonSingular => 'ït',
							Person::FirstPersonPlural => 'ïmes',
							Person::SecondPersonPlural => 'ïtes',
							Person::ThirdPersonPlural => 'ïrent' 
					],
					Tense::Futur => [ 
							Person::FirstPersonSingular => 'ïrai',
							Person::SecondPersonSingular => 'ïras',
							Person::ThirdPersonSingular => 'ïra',
							Person::FirstPersonPlural => 'ïrons',
							Person::SecondPersonPlural => 'ïrez',
							Person::ThirdPersonPlural => 'ïront' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'ïsse',
							Person::SecondPersonSingular => 'ïsses',
							Person::ThirdPersonSingular => 'ïsse',
							Person::FirstPersonPlural => 'ïssions',
							Person::SecondPersonPlural => 'ïssiez',
							Person::ThirdPersonPlural => 'ïssent' 
					],
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'ïsse',
							Person::SecondPersonSingular => 'ïsses',
							Person::ThirdPersonSingular => 'ït',
							Person::FirstPersonPlural => 'ïssions',
							Person::SecondPersonPlural => 'ïssiez',
							Person::ThirdPersonPlural => 'ïssent' 
					] 
			],
			Mood::Conditionnel => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'ïrais',
							Person::SecondPersonSingular => 'ïrais',
							Person::ThirdPersonSingular => 'ïrait',
							Person::FirstPersonPlural => 'ïrions',
							Person::SecondPersonPlural => 'ïriez',
							Person::ThirdPersonPlural => 'ïraient' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::SecondPersonSingular => 'ïs',
							Person::FirstPersonPlural => 'ïssons',
							Person::SecondPersonPlural => 'ïssez' 
					] 
			] 
	];
	
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $ending;
	}
	return ending_i_trema_r ( $person, $tense, $mood, new EndingWith ( EndingWith::I_TREMA_R ), $exceptionModel );
}
function ending_yer(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::YER );
	assert ( $endingwith->getValue () === EndingWith::ER );
	$red_slash = '/';
	$word_stem = word_stem_length ( $infinitiveVerb, 2 ); // regular case
	$word_stem = substr_replace ( $word_stem, 'i', - 1, 1 );
	$endings = [  // regular ending for -er
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'e ' . $red_slash . ' ' . $word_stem . 'e',
							Person::SecondPersonSingular => 'es ' . $red_slash . ' ' . $word_stem . 'es',
							Person::ThirdPersonSingular => 'e ' . $red_slash . ' ' . $word_stem . 'e',
							Person::ThirdPersonPlural => 'ent ' . $red_slash . ' ' . $word_stem . 'ent' 
					],
					
					Tense::Futur => [ 
							Person::FirstPersonSingular => 'erai ' . $red_slash . ' ' . $word_stem . 'erai',
							Person::SecondPersonSingular => 'eras ' . $red_slash . ' ' . $word_stem . 'eras',
							Person::ThirdPersonSingular => 'era ' . $red_slash . ' ' . $word_stem . 'era',
							Person::FirstPersonPlural => 'erons ' . $red_slash . ' ' . $word_stem . 'erons',
							Person::SecondPersonPlural => 'erez ' . $red_slash . ' ' . $word_stem . 'erez',
							Person::ThirdPersonPlural => 'eront ' . $red_slash . ' ' . $word_stem . 'eront' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'e ' . $red_slash . ' ' . $word_stem . 'e',
							Person::SecondPersonSingular => 'es ' . $red_slash . ' ' . $word_stem . 'es',
							Person::ThirdPersonSingular => 'e ' . $red_slash . ' ' . $word_stem . 'e',
							Person::ThirdPersonPlural => 'ent ' . $red_slash . ' ' . $word_stem . 'ent' 
					] 
			],
			Mood::Conditionnel => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'erais ' . $red_slash . ' ' . $word_stem . 'erais',
							Person::SecondPersonSingular => 'erais ' . $red_slash . ' ' . $word_stem . 'erais',
							Person::ThirdPersonSingular => 'erait ' . $red_slash . ' ' . $word_stem . 'erait',
							Person::FirstPersonPlural => 'erions ' . $red_slash . ' ' . $word_stem . 'erions',
							Person::SecondPersonPlural => 'eriez ' . $red_slash . ' ' . $word_stem . 'eriez',
							Person::ThirdPersonPlural => 'eraient ' . $red_slash . ' ' . $word_stem . 'eraient' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::SecondPersonSingular => 'e ' . $red_slash . ' ' . $word_stem . 'e' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_er ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_rir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::RIR );
	assert ( $endingwith->getValue () === EndingWith::IR );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Present => [  // like regular verbs ending with -er
							Person::FirstPersonSingular => 'e',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'e' 
					] 
			],
			Mood::Imperatif => [  // like regular verbs ending with -er
					Tense::Present => [ 
							Person::SecondPersonSingular => 'e' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_ir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_courir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::COURIR );
	assert ( $endingwith->getValue () === EndingWith::IR );
	$endings = [ 
			Mood::Indicatif => [  // without 'i' at beginning like regular
					Tense::Futur => [  // without first letter i, like ending-oir
							Person::FirstPersonSingular => 'rai',
							Person::SecondPersonSingular => 'ras',
							Person::ThirdPersonSingular => 'ra',
							Person::FirstPersonPlural => 'rons',
							Person::SecondPersonPlural => 'rez',
							Person::ThirdPersonPlural => 'ront' 
					] 
			],
			Mood::Conditionnel => [ 
					Tense::Present => [  // replace first letter i -> r
							Person::FirstPersonSingular => 'rais',
							Person::SecondPersonSingular => 'rais',
							Person::ThirdPersonSingular => 'rait',
							Person::FirstPersonPlural => 'rions',
							Person::SecondPersonPlural => 'riez',
							Person::ThirdPersonPlural => 'raient' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_ir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_mourir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::MOURIR );
	assert ( $endingwith->getValue () === EndingWith::IR );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Futur => [  // without first letter i, like ending-oir
							Person::FirstPersonSingular => 'rai',
							Person::SecondPersonSingular => 'ras',
							Person::ThirdPersonSingular => 'ra',
							Person::FirstPersonPlural => 'rons',
							Person::SecondPersonPlural => 'rez',
							Person::ThirdPersonPlural => 'ront' 
					] 
			],
			Mood::Conditionnel => [ 
					Tense::Present => [  // replace first leeter i -> r
							Person::FirstPersonSingular => 'rais',
							Person::SecondPersonSingular => 'rais',
							Person::ThirdPersonSingular => 'rait',
							Person::FirstPersonPlural => 'rions',
							Person::SecondPersonPlural => 'riez',
							Person::ThirdPersonPlural => 'raient' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_ir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_querir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::QUERIR );
	assert ( $endingwith->getValue () === EndingWith::IR );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Present => [  // adds 3x'iers'/1x'ièr' to standard ending
							Person::FirstPersonSingular => 'iers',
							Person::SecondPersonSingular => 'iers',
							Person::ThirdPersonSingular => 'iert',
							Person::ThirdPersonPlural => 'ièrent' 
					],
					Tense::Futur => [  // replace first letter i -> r
							Person::FirstPersonSingular => 'rai',
							Person::SecondPersonSingular => 'ras',
							Person::ThirdPersonSingular => 'ra',
							Person::FirstPersonPlural => 'rons',
							Person::SecondPersonPlural => 'rez',
							Person::ThirdPersonPlural => 'ront' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [  // adds 'ièr' to standard ending
							Person::FirstPersonSingular => 'ière',
							Person::SecondPersonSingular => 'ières',
							Person::ThirdPersonSingular => 'ière',
							Person::ThirdPersonPlural => 'ièrent' 
					],
					Tense::Imparfait => [  // = like ending-IR but this verb uses ending_ir_without_iss!
							Person::FirstPersonSingular => 'isse',
							Person::SecondPersonSingular => 'isses',
							Person::ThirdPersonSingular => 'ît',
							Person::FirstPersonPlural => 'issions',
							Person::SecondPersonPlural => 'issiez',
							Person::ThirdPersonPlural => 'issent' 
					] 
			],
			Mood::Conditionnel => [  // replace first letter i -> r
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
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_ir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_fleurir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::FLEURIR );
	assert ( $endingwith->getValue () === EndingWith::IR );
	$red_slash = '/';
	$word_stem = word_stem_length ( $infinitiveVerb, 5 ) . 'or';
	$endings = [ 
			
			Mood::Indicatif => [ 
					Tense::Imparfait => [ 
							Person::FirstPersonSingular => 'issais ' . $red_slash . ' ' . $word_stem . 'issais',
							Person::SecondPersonSingular => 'issais ' . $red_slash . ' ' . $word_stem . 'issais',
							Person::ThirdPersonSingular => 'issait ' . $red_slash . ' ' . $word_stem . 'issait',
							Person::FirstPersonPlural => 'issions ' . $red_slash . ' ' . $word_stem . 'issions',
							Person::SecondPersonPlural => 'issiez ' . $red_slash . ' ' . $word_stem . 'issiez',
							Person::ThirdPersonPlural => 'issaient ' . $red_slash . ' ' . $word_stem . 'issaient' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_ir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_falloir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::FALLOIR );
	assert ( $endingwith->getValue () === EndingWith::OIR );
	$endings = [ 
			
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::ThirdPersonSingular => 'ut' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::ThirdPersonSingular => 'ille' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_oir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_seoir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::SEOIR );
	assert ( $endingwith->getValue () === EndingWith::OIR );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Passe => [  // // = like ending-IR but this verb uses ending_ir_without_iss!
							Person::FirstPersonSingular => 'is',
							Person::SecondPersonSingular => 'is',
							Person::ThirdPersonSingular => 'it',
							Person::FirstPersonPlural => 'îmes',
							Person::SecondPersonPlural => 'îtes',
							Person::ThirdPersonPlural => 'irent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Imparfait => [  // = like ending-IR but this verb uses ending_ir_without_iss!
							Person::FirstPersonSingular => 'isse',
							Person::SecondPersonSingular => 'isses',
							Person::ThirdPersonSingular => 'ît',
							Person::FirstPersonPlural => 'issions',
							Person::SecondPersonPlural => 'issiez',
							Person::ThirdPersonPlural => 'issent' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_oir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_cueillir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::CUEILLIR );
	assert ( $endingwith->getValue () === EndingWith::IR );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Present => [  // like regular verbs ending with -er
							Person::FirstPersonSingular => 'e',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'e' 
					],
					Tense::Futur => [  // replace first letter i -> er
							Person::FirstPersonSingular => 'erai',
							Person::SecondPersonSingular => 'eras',
							Person::ThirdPersonSingular => 'era',
							Person::FirstPersonPlural => 'erons',
							Person::SecondPersonPlural => 'erez',
							Person::ThirdPersonPlural => 'eront' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Imparfait => [  // = like ending-IR but this verb uses ending_ir_without_iss!
							Person::FirstPersonSingular => 'isse',
							Person::SecondPersonSingular => 'isses',
							Person::ThirdPersonSingular => 'ît',
							Person::FirstPersonPlural => 'issions',
							Person::SecondPersonPlural => 'issiez',
							Person::ThirdPersonPlural => 'issent' 
					] 
			],
			Mood::Conditionnel => [  // replace first letter i -> er
					Tense::Present => [ 
							Person::FirstPersonSingular => 'erais',
							Person::SecondPersonSingular => 'erais',
							Person::ThirdPersonSingular => 'erait',
							Person::FirstPersonPlural => 'erions',
							Person::SecondPersonPlural => 'eriez',
							Person::ThirdPersonPlural => 'eraient' 
					] 
			],
			Mood::Imperatif => [  // like regular verbs ending with -er
					Tense::Present => [ 
							Person::SecondPersonSingular => 'e' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_ir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_bouillir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) 

{
	assert ( $exceptionModel->getValue () === ExceptionModel::BOUILLIR );
	assert ( $endingwith->getValue () === EndingWith::IR );
	$endings = [ 
			Mood::Subjonctif => [  // changing first letter iî into u/û, else like ending-IR
					Tense::Imparfait => [  // changing first letter iî into u/û, else like ending-IR
							Person::FirstPersonSingular => 'isse',
							Person::SecondPersonSingular => 'isses',
							Person::ThirdPersonSingular => 'ît',
							Person::FirstPersonPlural => 'issions',
							Person::SecondPersonPlural => 'issiez',
							Person::ThirdPersonPlural => 'issent' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_ir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_enir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::ENIR );
	assert ( $endingwith->getValue () === EndingWith::IR );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::ThirdPersonPlural => 'nent' 
					], // irregular
					Tense::Passe => [ 
							Person::FirstPersonSingular => 'ins',
							Person::SecondPersonSingular => 'ins',
							Person::ThirdPersonSingular => 'int',
							Person::FirstPersonPlural => 'înmes',
							Person::SecondPersonPlural => 'întes',
							Person::ThirdPersonPlural => 'inrent' 
					],
					Tense::Futur => [  // replace first letter i -> d
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
							Person::FirstPersonPlural => 'ions', // regular?
							Person::SecondPersonPlural => 'iez', // regular?
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
			Mood::Conditionnel => [  // replace first letter i -> d
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
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_ir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_saillir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) 

{
	assert ( $exceptionModel->getValue () === ExceptionModel::SAILLIR );
	assert ( $endingwith->getValue () === EndingWith::IR );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Present => [  // like regular verbs ending with -er
							Person::FirstPersonSingular => 'e',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'e' 
					],
					Tense::Futur => [  // replace first letter i -> er
							Person::FirstPersonSingular => 'erai',
							Person::SecondPersonSingular => 'eras',
							Person::ThirdPersonSingular => 'era',
							Person::FirstPersonPlural => 'erons',
							Person::SecondPersonPlural => 'erez',
							Person::ThirdPersonPlural => 'eront' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Imparfait => [  // changing first letter iî into u/û, else like ending-IR
							Person::FirstPersonSingular => 'isse',
							Person::SecondPersonSingular => 'isses',
							Person::ThirdPersonSingular => 'ît',
							Person::FirstPersonPlural => 'issions',
							Person::SecondPersonPlural => 'issiez',
							Person::ThirdPersonPlural => 'issent' 
					] 
			],
			Mood::Conditionnel => [  // replace first letter i -> er
					Tense::Present => [ 
							Person::FirstPersonSingular => 'erais',
							Person::SecondPersonSingular => 'erais',
							Person::ThirdPersonSingular => 'erait',
							Person::FirstPersonPlural => 'erions',
							Person::SecondPersonPlural => 'eriez',
							Person::ThirdPersonPlural => 'eraient' 
					] 
			],
			Mood::Imperatif => [  // like regular verbs ending with -er
					Tense::Present => [ 
							Person::SecondPersonSingular => 'e' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_ir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_oir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Futur => [  // without first letter i, else like ending-IR
							Person::FirstPersonSingular => 'rai',
							Person::SecondPersonSingular => 'ras',
							Person::ThirdPersonSingular => 'ra',
							Person::FirstPersonPlural => 'rons',
							Person::SecondPersonPlural => 'rez',
							Person::ThirdPersonPlural => 'ront' 
					] 
			],
			Mood::Conditionnel => [  // without first letter i, else like ending-IR
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
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $ending;
	}
	return ending_ir ( $person, $tense, $mood, new EndingWith ( EndingWith::IR ), $exceptionModel, $infinitiveVerb );
}
function ending_mouvoir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::MOUVOIR );
	assert ( $endingwith->getValue () === EndingWith::OIR );
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
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_oir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_pouvoir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::POUVOIR );
	assert ( $endingwith->getValue () === EndingWith::OIR );
	$red_slash = '/';
	$word_stem = word_stem_length ( $infinitiveVerb, 6 );
	$endings = [ 
			
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'eux ' . $red_slash . ' ' . $word_stem . 'uis',
							Person::SecondPersonSingular => 'eux',
							Person::ThirdPersonSingular => 'eut',
							Person::ThirdPersonPlural => 'euvent' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_oir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_vouloir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::VOULOIR );
	assert ( $endingwith->getValue () === EndingWith::OIR );
	$red_slash = '/';
	$word_stem = word_stem_length ( $infinitiveVerb, 6 );
	$endings = [ 
			
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'eux',
							Person::SecondPersonSingular => 'eux',
							Person::ThirdPersonSingular => 'eut',
							Person::ThirdPersonPlural => 'eulent' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [ 
							Person::SecondPersonSingular => 'eux ' . $red_slash . ' ' . $word_stem . 'euille',
							Person::FirstPersonPlural => 'oulons ' . $red_slash . ' ' . $word_stem . 'euillons',
							Person::SecondPersonPlural => 'oulez ' . $red_slash . ' ' . $word_stem . 'euillez' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_oir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_faillir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::FAILLIR );
	assert ( $endingwith->getValue () === EndingWith::IR );
	$endings = [ 
			
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'aux',
							Person::SecondPersonSingular => 'aux',
							Person::ThirdPersonSingular => 'aut' 
					],
					Tense::Passe => [  // like ending_ir_with_iss
							Person::FirstPersonSingular => 'is',
							Person::SecondPersonSingular => 'is',
							Person::ThirdPersonSingular => 'it',
							Person::FirstPersonPlural => 'îmes',
							Person::SecondPersonPlural => 'îtes',
							Person::ThirdPersonPlural => 'irent' 
					] 
			],
			Mood::Subjonctif => [  // replace first letter i -> r
					Tense::Imparfait => [  // like ending_ir_with_iss
							Person::FirstPersonSingular => 'isse',
							Person::SecondPersonSingular => 'isses',
							Person::ThirdPersonSingular => 'ît',
							Person::FirstPersonPlural => 'issions',
							Person::SecondPersonPlural => 'issiez',
							Person::ThirdPersonPlural => 'issent' 
					] 
			],
			Mood::Imperatif => [  // replace first letter i -> r
					Tense::Present => [ 
							Person::SecondPersonSingular => 'aux' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_ir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_savoir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::SAVOIR );
	assert ( $endingwith->getValue () === EndingWith::OIR );
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
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_oir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_valoir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::VALOIR );
	assert ( $endingwith->getValue () === EndingWith::OIR );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'x',
							Person::SecondPersonSingular => 'x',
							Person::ThirdPersonSingular => 't' 
					],
					Tense::Futur => [  // replace first letter i -> d maybe word_stem change later
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
			Mood::Conditionnel => [  // replace first letter i -> d maybe word_stem change later
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
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_oir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_voir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::VOIR );
	assert ( $endingwith->getValue () === EndingWith::OIR );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'is',
							Person::SecondPersonSingular => 'is',
							Person::ThirdPersonSingular => 'it',
							Person::ThirdPersonPlural => 'ient' 
					],
					Tense::Passe => [  // like ending_ir_with_iss
							Person::FirstPersonSingular => 'is',
							Person::SecondPersonSingular => 'is',
							Person::ThirdPersonSingular => 'it',
							Person::FirstPersonPlural => 'îmes',
							Person::SecondPersonPlural => 'îtes',
							Person::ThirdPersonPlural => 'irent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [ 
							Person::FirstPersonSingular => 'ie',
							Person::SecondPersonSingular => 'ies',
							Person::ThirdPersonSingular => 'ie',
							Person::ThirdPersonPlural => 'ient' 
					],
					Tense::Imparfait => [  // like ending_ir_with_iss
							Person::FirstPersonSingular => 'isse',
							Person::SecondPersonSingular => 'isses',
							Person::ThirdPersonSingular => 'ît',
							Person::FirstPersonPlural => 'issions',
							Person::SecondPersonPlural => 'issiez',
							Person::ThirdPersonPlural => 'issent' 
					] 
			],
			Mood::Imperatif => [  // like ending_ir_with_iss
					Tense::Present => [ 
							Person::SecondPersonSingular => 'is' 
					] 
			] 
	];
	if ($infinitiveVerb == 'pourvoir') {
		$endings = [ 
				Mood::Indicatif => [ 
						Tense::Passe => [  // like ending_ir_without_iss
								Person::FirstPersonSingular => 'us',
								Person::SecondPersonSingular => 'us',
								Person::ThirdPersonSingular => 'ut',
								Person::FirstPersonPlural => 'ûmes',
								Person::SecondPersonPlural => 'ûtes',
								Person::ThirdPersonPlural => 'urent' 
						] 
				] 
		];
	}
	
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_oir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_fuir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel, InfinitiveVerb $infinitiveVerb) {
	assert ( $exceptionModel->getValue () === ExceptionModel::FUIR );
	assert ( $endingwith->getValue () === EndingWith::IR );
	$endings = [ 
			Mood::Indicatif => [ 
					Tense::Present => [  // without -iss at beginning like ending regular -er
							Person::FirstPersonSingular => 's',
							Person::SecondPersonSingular => 's',
							Person::ThirdPersonSingular => 't',
							Person::FirstPersonPlural => 'ons',
							Person::SecondPersonPlural => 'ez',
							Person::ThirdPersonPlural => 'ent' 
					],
					Tense::Passe => [  // like ending_ir_with_iss
							Person::FirstPersonSingular => 'is',
							Person::SecondPersonSingular => 'is',
							Person::ThirdPersonSingular => 'it',
							Person::FirstPersonPlural => 'îmes',
							Person::SecondPersonPlural => 'îtes',
							Person::ThirdPersonPlural => 'irent' 
					] 
			],
			Mood::Subjonctif => [ 
					Tense::Present => [  // without -iss at beginning like ending regular -er
							Person::FirstPersonSingular => 'e',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'e',
							Person::FirstPersonPlural => 'ions',
							Person::SecondPersonPlural => 'iez',
							Person::ThirdPersonPlural => 'ent' 
					],
					Tense::Imparfait => [  // like ending_ir_with_iss -> CHECKEN OHNE
							Person::FirstPersonSingular => 'isse',
							Person::SecondPersonSingular => 'isses',
							Person::ThirdPersonSingular => 'ît',
							Person::FirstPersonPlural => 'issions',
							Person::SecondPersonPlural => 'issiez',
							Person::ThirdPersonPlural => 'issent' 
					] 
			],
			Mood::Imperatif => [ 
					Tense::Present => [  // without -iss at beginning like ending regular -er
							Person::SecondPersonSingular => 's',
							Person::FirstPersonPlural => 'ons',
							Person::SecondPersonPlural => 'ez' 
					] 
			] 
	];
	$ending = ending_array_defines ( $endings, $person, $tense, $mood );
	if ($ending !== null) {
		return $endings [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
	}
	return ending_ir ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}

function ending_circoncire($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb) {
	return ending_ire ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_confire($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb) {
	return ending_ire ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_dire($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb) {
	return ending_ire ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_suffire($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb) {
	return ending_ire ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}


function ending_vivre($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb) {
	return ending_passe_subjonctif_changes_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_clure($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb) {
	return ending_passe_subjonctif_changes_re ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}

function ending_maudire($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb) {
	return ending_ire_with_iss ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
function ending_naite($person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb) {
	return ending_ire_with_iss ( $person, $tense, $mood, $endingwith, $exceptionModel, $infinitiveVerb );
}
?>
<?php
function ending(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel) {
	switch ($exceptionModel->getValue ()) {
		case ExceptionModel::VETIR :
			return ending_vetir ( $person, $tense, $mood, $endingwith, $exceptionModel );
		case ExceptionModel::MOUVOIR :
			return ending_mouvoir ( $person, $tense, $mood, $endingwith, $exceptionModel );
	}
	switch ($endingwith->getValue ()) {
		case EndingWith::ER :
			return ending_er ( $person, $tense, $mood, $endingwith, $exceptionModel );
		case EndingWith::IR :
			return ending_ir ( $person, $tense, $mood, $endingwith, $exceptionModel );
		case EndingWith::OIR :
			return ending_oir ( $person, $tense, $mood, $endingwith, $exceptionModel );
	}
	return null;
}

function ending_er(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel) {
	$ending = array (
			EndingWith::ER => array ( // standard endings for verbs ending with -er
					Mood::Indicatif => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'e',
									Person::SecondPersonSingular => 'es',
									Person::ThirdPersonSingular => 'e',
									Person::FirstPersonPlural => 'ons',
									Person::SecondPersonPlural => 'ez',
									Person::ThirdPersonPlural => 'ent'
							),
							Tense::Imparfait => array (
									Person::FirstPersonSingular => 'ais',
									Person::SecondPersonSingular => 'ais',
									Person::ThirdPersonSingular => 'ait',
									Person::FirstPersonPlural => 'ions',
									Person::SecondPersonPlural => 'iez',
									Person::ThirdPersonPlural => 'aient'
							),
							Tense::Passe => array (
									Person::FirstPersonSingular => 'ai',
									Person::SecondPersonSingular => 'as',
									Person::ThirdPersonSingular => 'a',
									Person::FirstPersonPlural => 'âmes',
									Person::SecondPersonPlural => 'âtes',
									Person::ThirdPersonPlural => 'èrent'
							),
							Tense::Futur => array (
									Person::FirstPersonSingular => 'erai',
									Person::SecondPersonSingular => 'eras',
									Person::ThirdPersonSingular => 'era',
									Person::FirstPersonPlural => 'erons',
									Person::SecondPersonPlural => 'erez',
									Person::ThirdPersonPlural => 'eront'
							)
					),
					Mood::Subjonctif => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'e',
									Person::SecondPersonSingular => 'es',
									Person::ThirdPersonSingular => 'e',
									Person::FirstPersonPlural => 'ions',
									Person::SecondPersonPlural => 'iez',
									Person::ThirdPersonPlural => 'ent'
							),
							Tense::Imparfait => array (
									Person::FirstPersonSingular => 'asse',
									Person::SecondPersonSingular => 'asses',
									Person::ThirdPersonSingular => 'ât',
									Person::FirstPersonPlural => 'assions',
									Person::SecondPersonPlural => 'assiez',
									Person::ThirdPersonPlural => 'assent'
							)
					),
					Mood::Conditionnel => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'erais',
									Person::SecondPersonSingular => 'erais',
									Person::ThirdPersonSingular => 'erait',
									Person::FirstPersonPlural => 'erions',
									Person::SecondPersonPlural => 'eriez',
									Person::ThirdPersonPlural => 'eraient'
							)
					),
					Mood::Imperatif => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'e',
									Person::FirstPersonPlural => 'ons',
									Person::SecondPersonPlural => 'ez'
							)
					)
			)
	);
	return $ending [$endingwith->getValue ()][$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
}
function ending_ir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel) {
	$ending = array (
			EndingWith::IR => array ( // standard endings for verbs ending with -ir
					Mood::Indicatif => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'is',
									Person::SecondPersonSingular => 'is',
									Person::ThirdPersonSingular => 'it',
									Person::FirstPersonPlural => 'issions',
									Person::SecondPersonPlural => 'issiez',
									Person::ThirdPersonPlural => 'issent'
							),
							Tense::Imparfait => array (
									Person::FirstPersonSingular => 'issais',
									Person::SecondPersonSingular => 'issais',
									Person::ThirdPersonSingular => 'issait',
									Person::FirstPersonPlural => 'issions',
									Person::SecondPersonPlural => 'issiez',
									Person::ThirdPersonPlural => 'issaient'
							),
							Tense::Passe => array (
									Person::FirstPersonSingular => 'is',
									Person::SecondPersonSingular => 'is',
									Person::ThirdPersonSingular => 'it',
									Person::FirstPersonPlural => 'îmes',
									Person::SecondPersonPlural => 'îtes',
									Person::ThirdPersonPlural => 'irent'
							),
							Tense::Futur => array (
									Person::FirstPersonSingular => 'irai',
									Person::SecondPersonSingular => 'iras',
									Person::ThirdPersonSingular => 'ira',
									Person::FirstPersonPlural => 'irons',
									Person::SecondPersonPlural => 'irez',
									Person::ThirdPersonPlural => 'iront'
							)
					),
					Mood::Subjonctif => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'isse',
									Person::SecondPersonSingular => 'isses',
									Person::ThirdPersonSingular => 'isse',
									Person::FirstPersonPlural => 'issions',
									Person::SecondPersonPlural => 'issiez',
									Person::ThirdPersonPlural => 'issent'
							),
							Tense::Imparfait => array (
									Person::FirstPersonSingular => 'isse',
									Person::SecondPersonSingular => 'isses',
									Person::ThirdPersonSingular => 'ît',
									Person::FirstPersonPlural => 'issions',
									Person::SecondPersonPlural => 'issiez',
									Person::ThirdPersonPlural => 'issent'
							)
					),
					Mood::Conditionnel => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'irais',
									Person::SecondPersonSingular => 'irais',
									Person::ThirdPersonSingular => 'irait',
									Person::FirstPersonPlural => 'irions',
									Person::SecondPersonPlural => 'iriez',
									Person::ThirdPersonPlural => 'iraient'
							)
					),
					Mood::Imperatif => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'is',
									Person::FirstPersonPlural => 'issons',
									Person::SecondPersonPlural => 'issez'
							)
					)
			)
	);
	return $ending [$endingwith->getValue ()][$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
}
function ending_without_iss(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel) {
	$ending = array (
			EndingWith::IR => array ( // standard endings for verbs ending with -ir
					Mood::Indicatif => array (
							Tense::Present => array (
									Person::FirstPersonPlural => 'ions',
									Person::SecondPersonPlural => 'iez',
									Person::ThirdPersonPlural => 'ent'
							),
							Tense::Imparfait => array (
									Person::FirstPersonSingular => 'ais',
									Person::SecondPersonSingular => 'ais',
									Person::ThirdPersonSingular => 'ait',
									Person::FirstPersonPlural => 'ions',
									Person::SecondPersonPlural => 'iez',
									Person::ThirdPersonPlural => 'aient'
							)
					),
					Mood::Subjonctif => array (
							Tense::Present => array (
									Person::FirstPersonSingular => 'e',
									Person::SecondPersonSingular => 'es',
									Person::ThirdPersonSingular => 'e',
									Person::FirstPersonPlural => 'ions',
									Person::SecondPersonPlural => 'iez',
									Person::ThirdPersonPlural => 'ent'
							),
							Tense::Imparfait => array (
									Person::FirstPersonSingular => 'e',
									Person::SecondPersonSingular => 'es',
									Person::FirstPersonPlural => 'ions',
									Person::SecondPersonPlural => 'iez',
									Person::ThirdPersonPlural => 'ent'
							)
					),
					Mood::Imperatif => array (
							Tense::Present => array (
									Person::FirstPersonPlural => 'ons',
									Person::SecondPersonPlural => 'ez'
							)
					)
			)
	);
	return $ending [$endingwith->getValue ()][$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
}

function ending_array_defines($array_mood_tense_person, Person $person, Tense $tense, Mood $mood) {
	if (key_exists ( $mood->getValue (), $array_mood_tense_person )) {
		$array_tense_person = $array_mood_tense_person [$mood->getValue ()];
		if (key_exists ( $tense->getValue (), $array_tense_person )) {
			$array_person = $array_tense_person [$tense->getValue ()];
			if (key_exists ( $person->getValue (), $array_person)) {
				return $array_person[$person->getValue()];
			}
		}
	}
	return null;
}

function ending_vetir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel) {
	assert($exceptionModel->getValue() === ExceptionModel::VETIR);
	assert($endingwith->getValue() === EndingWith::IR);
	$endings = array(
			Mood::Indicatif => array(
					Tense::Present => array(
							Person::FirstPersonSingular => 's',
							Person::SecondPersonSingular => 's',
							Person::ThirdPersonSingular => '')),
			Mood::Imperatif => array(
					Tense::Present => array(
							Person::FirstPersonSingular => 's')));
	$ending = ending_array_defines($endings, $person, $tense, $mood);
	if($ending !== null) {
		return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
	}
	return ending_ir($person, $tense, $mood, $endingwith, $exceptionModel);
}

function ending_oir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel) {
	$endings = array (
			Mood::Indicatif => array (
					Tense::Passe => array (// changing first letter iî into u/û, else like ending-IR
							Person::FirstPersonSingular => 'us',
							Person::SecondPersonSingular => 'us',
							Person::ThirdPersonSingular => 'ut',
							Person::FirstPersonPlural => 'ûmes',
							Person::SecondPersonPlural => 'ûtes',
							Person::ThirdPersonPlural => 'urent'
					),
					Tense::Futur => array ( // without first letter i, else like ending-IR
							Person::FirstPersonSingular => 'rai',
							Person::SecondPersonSingular => 'ras',
							Person::ThirdPersonSingular => 'ra',
							Person::FirstPersonPlural => 'rons',
							Person::SecondPersonPlural => 'rez',
							Person::ThirdPersonPlural => 'ront'
					)
			),
			Mood::Subjonctif => array (// changing first letter iî into u/û, else like ending-IR
					Tense::Imparfait => array (// changing first letter iî into u/û, else like ending-IR
							Person::FirstPersonSingular => 'usse',
							Person::SecondPersonSingular => 'usses',
							Person::ThirdPersonSingular => 'ût',
							Person::FirstPersonPlural => 'ussions',
							Person::SecondPersonPlural => 'ussiez',
							Person::ThirdPersonPlural => 'ussent'
					)
			),
			Mood::Conditionnel => array ( // without first letter i, else like ending-IR
					Tense::Present => array (
							Person::FirstPersonSingular => 'rais',
							Person::SecondPersonSingular => 'rais',
							Person::ThirdPersonSingular => 'rait',
							Person::FirstPersonPlural => 'rions',
							Person::SecondPersonPlural => 'riez',
							Person::ThirdPersonPlural => 'raient'
					)
			)
	);
	$ending = ending_array_defines($endings, $person, $tense, $mood);
	if($ending !== null) {
		return $ending;
	}
	return ending_ir($person, $tense, $mood, new EndingWith(EndingWith::IR), $exceptionModel);
}
function ending_mouvoir(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith, ExceptionModel $exceptionModel) {
	assert($exceptionModel->getValue() === ExceptionModel::MOUVOIR);
	assert($endingwith->getValue() === EndingWith::OIR);
	$endings = array(

			Mood::Indicatif => array(
					Tense::Present => array(
							Person::FirstPersonSingular => 'eus',
							Person::SecondPersonSingular => 'eus',
							Person::ThirdPersonSingular => 'eut',
							Person::ThirdPersonPlural => 'euvent')),
			Mood::Subjonctif => array(
					Tense::Present => array(
							Person::FirstPersonSingular => 'euve',
							Person::SecondPersonSingular => 'euves',
							Person::ThirdPersonSingular => 'euve',
							Person::ThirdPersonPlural => 'euvent')),
			Mood::Imperatif => array(
					Tense::Present => array(
							Person::FirstPersonSingular => 'eus')));
	$ending = ending_array_defines($endings, $person, $tense, $mood);
	if($ending !== null) {
		return $endings[$mood->getValue()][$tense->getValue()][$person->getValue()];
	}
	return ending_oir($person, $tense, $mood, $endingwith, $exceptionModel);
}
?>
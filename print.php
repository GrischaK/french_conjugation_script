<?php
require_once 'conjugate.php';

function print_persons($verb, Tense $tense, Mood $mood) {
	$persons = array (
			Mood::Indicatif => array (
					Tense::Present => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					),
					Tense::Imparfait => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					),
					Tense::Passe => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					),
					Tense::Futur => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					),
					Tense::Passe_compose => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					),
					Tense::Plus_que_parfait => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					),
					Tense::Passe_anterieur => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					) 
			),
			Mood::Subjonctif => array (
					Tense::Present => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					),
					Tense::Imparfait => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					),
					Tense::Passe => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					),
					Tense::Plus_que_parfait => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					) 
			),
			Mood::Conditionnel => array (
					Tense::Present => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					),
					Tense::Premiere_Forme => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					),
					Tense::Deuxieme_Forme => array (
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					) 
			),
			Mood::Imperatif => array (
					Tense::Present => array (
							Person::FirstPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural
					),
					Tense::Passe => array (
							Person::FirstPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural
					)
			) 
	);
	foreach ( $persons[$mood->getValue ()][$tense->getValue ()] as $person) {
	//	print_xyz ( $verb, new Person($person) ); 
		echo conjugation_phrase($verb, new Person ($person), ($tense),  ($mood)). "\n\r";
	}
	
}

function print_tenses($verb, Mood $mood) {
	$tenses = array (
			Mood::Indicatif => array (
					Tense::Present,
					Tense::Imparfait,
					Tense::Passe,
					Tense::Futur,
					Tense::Passe_compose,
					Tense::Plus_que_parfait,
					Tense::Passe_anterieur 
			),
			Mood::Subjonctif => array (
					Tense::Present,
					Tense::Imparfait,
					Tense::Passe,
					Tense::Plus_que_parfait 
			),
			Mood::Conditionnel => array (
					Tense::Present,
					Tense::Premiere_Forme,
					Tense::Deuxieme_Forme 
			),
			Mood::Imperatif => array (
					Tense::Present,
					Tense::Passe 
			) 
	);
	foreach ( $tenses[$mood->getValue ()] as $tense ) {
		print_persons ( $verb, new Tense($tense),new Mood($mood) ); 
	}	
}

function print_conjugations_of_verb($verb) {
   $moods = array(Mood::Indicatif,Mood::Subjonctif,Mood::Conditionnel,Mood::Imperatif);
	foreach ( $moods as $mood ) {
		print_tenses ( $verb, new Mood($mood) );
	}
}
?>

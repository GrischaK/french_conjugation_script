<?php
abstract class Tense 
{ 
// simple tenses 
const Present= 0; 
const Imparfait= 1; 
const Passe_simple= 2; 
const Futur_simple= 3; // (Futur I) 
// composite tenses 
const Passe_compose= 4; 
const Plus_que_parfait= 5; 
const Passe_anterieur= 6; 
const Futur_anterieur= 7; // (Futur II) 

const Futur_compose = 8; // (Futur proche) 

}


abstract class Person 
{ 
const FirstPersonSingular= 0; 
const SecondPersonSingular= 1; 
const ThirdPersonSingular= 2; 
const FirstPersonPlural= 4; 
const SecondPersonPlural= 5; 
const ThirdPersonPlural= 6; 
}

abstract class Mood 
{ 
const Indicative= 0; 
const Subjonctif= 1; 
const Conditionnel= 2; 
const Imperatif= 3;  
const Modes_impersonnels= 4; 
 
}

function word_stem($verb){
  $word_stem = substr($verb, 0, - 2);
return $verb; // or return $word_stem ?
}

function person($person) {
	$person = '"Unknown Person';
	switch ($person) {
		case Person::FirstPersonSingular :
			$person = "Je "; // shoudl use the function_French
			break;
		case Person::SecondPersonSingular :
			$person = "Tu ";
			break;
		case Person::ThirdPersonSingular :
			$person = "Il ";
			break;
		case Person::FirstPersonPlural :
			$person = "Nous ";
			break;
		case Person::SecondPersonPlural :
			$person = "Vous ";
			break;
		case Person::ThirdPersonPlural :
			$person = "Ils ";
			break;
	}
	return $person;
}
function conjugate($verb, $tense, $person, $mood) {
	$conjugated_verb = 'Unknown Person';
	switch ($person) {
		case Person::FirstPersonSingular :
			$conjugated_verb = "aime";
			break;
		case Person::SecondPersonSingular :
			$conjugated_verb = "aimes";
			break;
		case Person::ThirdPersonSingular :
			$conjugated_verb = "aime";
			break;
	}
	return $conjugated_verb;
}
function conjugation_phrase($verb, $tense, $person, $mood) {
	$conjugated_verb = conjugate ( $verb, $tense, $person, $mood );
	$personal_pronoun = person ( $person );
	return $personal_pronoun . $conjugated_verb;
}

?>
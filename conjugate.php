<?php
abstract class Tense {
	// simple tenses
	const Indicatif_Present = 0;
	const Indicatif_Imparfait = 1;
	const Indicatif_Passe_simple = 2;
	const Indicatif_Futur_simple = 3; 		// (Futur I)
	
	const Subjonctif_Present = 4;
	const Subjonctif_Imparfait = 5;		
	
	const Conditionnel_Present = 6;	
	// composite tenses
	const Indicatif_Passe_compose = 7;
	const Indicatif_Plus_que_parfait = 8;
	const Indicatif_Passe_anterieur = 9;
	const Indicatif_Futur_anterieur = 10;	// (Futur II)
	const Indicatif_Futur_compose = 11; 	// (Futur proche)
	
	const Subjonctif_Passe = 12;
	const Subjonctif_Plus_que_parfait = 13;
	
	const Conditionnel_Premiere_Forme = 14; 
	const Conditionnel_Deuxieme_Forme = 15;	
}
abstract class Person {
	const FirstPersonSingular = 0;
	const SecondPersonSingular = 1;
	const ThirdPersonSingular = 2;
	const FirstPersonPlural = 3;
	const SecondPersonPlural = 4;
	const ThirdPersonPlural = 5;
}
abstract class Mood {
	const Indicatif = 0;
	const Subjonctif = 1;
	const Conditionnel = 2;
	const Imperatif = 3;
	const Modes_impersonnels = 4;
}
abstract class auxiliaire {
	const Avoir = 0;
	const Etre = 1;
}
function word_stem($verb) {
	$word_stem = substr ( $verb, 0, - 2 );
	return $word_stem;
}
function person($person) {
	$person = '"Unknown Person';
// for all Tenses in Mood::Subjonctif add before personal pronoun "que"/"qu'" for ThirdPersonSingular and ThirdPersonPlural  
	switch ($person) {
		case Person::FirstPersonSingular :
			$person = "je "; // should use the function_French
			break;
		case Person::SecondPersonSingular :
			$person = "tu ";
			break;
		case Person::ThirdPersonSingular :
			$person = "il ";
			break;
		case Person::FirstPersonPlural :
			$person = "nous ";
			break;
		case Person::SecondPersonPlural :
			$person = "vous ";
			break;
		case Person::ThirdPersonPlural :
			$person = "ils ";
			break;
	}
	return $person;
}
function endings($person, $tense, $mood) {
	// $ending = 'Unknown Ending';
	$ending = array ( // Standardendungen für Verben auf -er
			Mood::Indicatif => array (
					Tense::Indicatif_Present => array (
							Person::FirstPersonSingular => 'e',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'e',
							Person::FirstPersonPlural => 'ons',
							Person::SecondPersonPlural => 'ez',
							Person::ThirdPersonPlural => 'ent' 
					),
					Tense::Indicatif_Imparfait => array (
							Person::FirstPersonSingular => 'ais',
							Person::SecondPersonSingular => 'ais',
							Person::ThirdPersonSingular => 'ait',
							Person::FirstPersonPlural => 'ions',
							Person::SecondPersonPlural => 'iez',
							Person::ThirdPersonPlural => 'aient' 
					),
					Tense::Indicatif_Passe_simple => array (
							Person::FirstPersonSingular => 'ai',
							Person::SecondPersonSingular => 'as',
							Person::ThirdPersonSingular => 'a',
							Person::FirstPersonPlural => 'âmes',
							Person::SecondPersonPlural => 'âtes',
							Person::ThirdPersonPlural => 'èrent' 
					),
					Tense::Indicatif_Futur_simple => array (
							Person::FirstPersonSingular => 'erai',
							Person::SecondPersonSingular => 'eras',
							Person::ThirdPersonSingular => 'era',
							Person::FirstPersonPlural => 'erons',
							Person::SecondPersonPlural => 'erez',
							Person::ThirdPersonPlural => 'eront' 
					) 
			),
			Mood::Subjonctif => array (
					Tense::Subjonctif_Present => array (
							Person::FirstPersonSingular => 'e',							
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'e',
							Person::FirstPersonPlural => 'ions',
							Person::SecondPersonPlural => 'iez',
							Person::ThirdPersonPlural => 'ent' 
					),
					Tense::Subjonctif_Imparfait => array (
							Person::FirstPersonSingular => 'asse',
							Person::SecondPersonSingular => 'asses',
							Person::ThirdPersonSingular => 'ât',
							Person::FirstPersonPlural => 'assions',
							Person::SecondPersonPlural => 'assiez',
							Person::ThirdPersonPlural => 'assent' 
					) 
			),
			Mood::Conditionnel => array (
					Tense::Conditionnel_Present => array (
							Person::FirstPersonSingular => 'erais',
							Person::SecondPersonSingular => 'erais',
							Person::ThirdPersonSingular => 'erait',
							Person::FirstPersonPlural => 'erions',
							Person::SecondPersonPlural => 'eriez',
							Person::ThirdPersonPlural => 'raient' 
					) 
			) 
	);
	return $ending($person, $tense, $mood);
}
function aller($person, $tense, $mood) {
	// $aller = 'Unknown Aller';
	$ending = array (
			Mood::Indicatif => array (
					Tense::Indicatif_Futur_compose => array (
							Person::FirstPersonSingular => 'vais',
							Person::SecondPersonSingular => 'vas',
							Person::ThirdPersonSingular => 'va',
							Person::FirstPersonPlural => 'allons',
							Person::SecondPersonPlural => 'allez',
							Person::ThirdPersonPlural => 'vont'
					),
			)
	);

return $aller($person, $tense, $mood);
}
function auxiliaire($person, $tense, $mood) {
	$aux_etre = array('accourir', 'advenir', 'aller', 'amuser', 'apparaitre', 'apparaître', 'arriver', 'ascendre', 'co-naitre', 'co-naître', 
			'convenir', 'débeller', 'décéder', 'démourir', 'descendre', 'disconvenir', 'devenir', 'échoir', 'entre-venir', 'entrer', 'époustoufler',
			 'intervenir', 'issir', 'mévenir', 'monter', 'mourir', 'naitre', 'naître', 'obvenir', 'paraitre', 'paraître', 'partir', 'parvenir', 
			'pourrir', 'prémourir', 'provenir', 'ragaillardir', 'raller', 'réadvenir', 're-aller', 'réapparaitre', 'réapparaître', 'reconvenir', 
			'redépartir', 'redescendre', 'redevenir', 'réentrer', 'réintervenir', 'remonter', 'remourir', 'renaitre', 'renaître', 'rentrer', 
			'revenir', 'reparaitre', 'reparaître', 'repartir', 'reparvenir', 'repasser', 'repourrir', 'rerentrer', 'rerester', 'ressortir', 
			'ressouvenir', 'rester', 'resurvenir', 'retomber', 'retourner', 'retrépasser', 'revenir', 's’amuser', 'se redépartir', 'se sortir', 
			'se souvenir', 'sortir', 'souvenir', 'stationner', 'sur-aller', 'suradvenir', 'survenir', 'tomber', 'trépasser', 'venir'); // accourir,...,...  use both     auxiliary verbs
	// $auxiliaire = 'Unknown Auxiliaire';
	if (in_array($verb, $aux_etre)) {  // later or in_array($verb, $verbes_pronominaux) only the pronominal version!
		$auxiliaire = 'être';	
		$ending = array ( 
			Mood::Indicatif => array (					
					Tense::Indicatif_Passe_compose => array (
							Person::FirstPersonSingular => 'suis',
							Person::SecondPersonSingular => 'es',
							Person::ThirdPersonSingular => 'est',
							Person::FirstPersonPlural => 'sommes',
							Person::SecondPersonPlural => 'êtes',
							Person::ThirdPersonPlural => 'sont'
					),				
					Tense::Indicatif_Plus_que_parfait => array (
							Person::FirstPersonSingular => 'étais',
							Person::SecondPersonSingular => 'étais',
							Person::ThirdPersonSingular => 'était',
							Person::FirstPersonPlural => 'étiez',
							Person::SecondPersonPlural => 'étiez',
							Person::ThirdPersonPlural => 'étaient'
					),							
					Tense::Indicatif_Passe_anterieur => array (
							Person::FirstPersonSingular => 'fus',
							Person::SecondPersonSingular => 'fus',
							Person::ThirdPersonSingular => 'fut',
							Person::FirstPersonPlural => 'fûmes',
							Person::SecondPersonPlural => 'fûtes',
							Person::ThirdPersonPlural => 'furent'
					),		
					Tense::Indicatif_Futur_anterieur => array (
							Person::FirstPersonSingular => 'serais',
							Person::SecondPersonSingular => 'serais',
							Person::ThirdPersonSingular => 'serait',
							Person::FirstPersonPlural => 'serions',
							Person::SecondPersonPlural => 'seriez',
							Person::ThirdPersonPlural => 'seraient'
					)
			),				
			Mood::Subjonctif => array (
					Tense::Subjonctif_Passe => array (
							Person::FirstPersonSingular => 'sois',
							Person::SecondPersonSingular => 'sois',
							Person::ThirdPersonSingular => 'soit',
							Person::FirstPersonPlural => 'soyons',
							Person::SecondPersonPlural => 'soyez',
							Person::ThirdPersonPlural => 'soient'
					),		
					Tense::Subjonctif_Plus_que_parfait => array (
							Person::FirstPersonSingular => 'fusse',
							Person::SecondPersonSingular => 'fusses',
							Person::ThirdPersonSingular => 'fût',
							Person::FirstPersonPlural => 'fussions',
							Person::SecondPersonPlural => 'fussiez',
							Person::ThirdPersonPlural => 'fussent'
					)
			),
			Mood::Conditionnel => array (								
					Tense::Conditionnel_Premiere_Forme => array (
							Person::FirstPersonSingular => 'serais',
							Person::SecondPersonSingular => 'serais',
							Person::ThirdPersonSingular => 'serait',
							Person::FirstPersonPlural => 'serions',
							Person::SecondPersonPlural => 'seriez',
							Person::ThirdPersonPlural => 'seraient'
					),
					Tense:: Conditionnel_Deuxieme_Forme => array (
						    Person::FirstPersonSingular => 'fusse',
							Person::SecondPersonSingular => 'fusses',
							Person::ThirdPersonSingular => 'fût',
							Person::FirstPersonPlural => 'fussions',
							Person::SecondPersonPlural => 'fussiez',
							Person::ThirdPersonPlural => 'fussent'
					)					
			)
		);
	}	
}		
function conjugate($verb, $tense, $person, $mood) {
	// $conjugated_verb = 'Unknown Person';
	$conjugated_verb = word_stem ( $verb ) . endings ( $person );
	return $conjugated_verb;
}
function conjugation_phrase($verb, $tense, $person, $mood) {
	$conjugated_verb = conjugate ( $verb, $tense, $person, $mood );
	$personal_pronoun = person ( $person );
	return $personal_pronoun . $conjugated_verb;
}
// $variable = conjugate ( "aimer", Tense::Present, Person::SecondPersonSingular, Mood::Indicative );
?>
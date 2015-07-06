<?php

require_once 'Enum.php';
require_once 'Tense.php';
require_once 'Person.php';
require_once 'Mood.php';
require_once 'Auxiliaire.php';
function word_stem($verb) {
	$word_stem = substr ( $verb, 0, - 2 );
	return $word_stem;
}
function personal_pronoun(Person $person) {
	$finding_person = '"Unknown Person';
// for all Tenses in Mood::Subjonctif add before personal pronoun "que"/"qu'" for ThirdPersonSingular and ThirdPersonPlural  
$finding_person =  array (
					Person::FirstPersonSingular => 'je ',
					Person::SecondPersonSingular => 'tu ',
					Person::ThirdPersonSingular => 'il ',
					Person::FirstPersonPlural => 'nous ',
					Person::SecondPersonPlural => 'vous ',
					Person::ThirdPersonPlural => 'ils ',
			);	
return $finding_person[$person->getValue()];
}
function endings(Person $person, Tense $tense, Mood $mood) {
	// $ending = 'Unknown Ending';
	$ending = array ( // Standardendungen für Verben auf -er
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
							Person::ThirdPersonPlural => 'raient' 
					) 
			) 
	);
	return $ending [$mood->getValue()][$tense->getValue()][$person->getValue()];
}
function aller(Person $person, Tense $tense, Mood $mood) {
	// $aller = 'Unknown Aller';
	$aller_form = array (
			Mood::Indicatif => array (
					Tense::Futur_compose => array (
							Person::FirstPersonSingular => 'vais ',
							Person::SecondPersonSingular => 'vas ',
							Person::ThirdPersonSingular => 'va ',
							Person::FirstPersonPlural => 'allons ',
							Person::SecondPersonPlural => 'allez ',
							Person::ThirdPersonPlural => 'vont '
					),
			)
	);

return $aller_form [$mood->getValue()][$tense->getValue()][$person->getValue()];
}
function conjugated_auxiliaire(Auxiliaire $auxiliaire, Person $person, Tense $tense, Mood $mood) {
	switch ($auxiliaire->getValue()) {
		case Auxiliaire::Etre :
			$conjugated_auxiliaire = array (
					Mood::Indicatif => array (
							Tense::Passe_compose => array (
									Person::FirstPersonSingular => 'suis',
									Person::SecondPersonSingular => 'es',
									Person::ThirdPersonSingular => 'est',
									Person::FirstPersonPlural => 'sommes',
									Person::SecondPersonPlural => 'êtes',
									Person::ThirdPersonPlural => 'sont' 
							),
							Tense::Plus_que_parfait => array (
									Person::FirstPersonSingular => 'étais',
									Person::SecondPersonSingular => 'étais',
									Person::ThirdPersonSingular => 'était',
									Person::FirstPersonPlural => 'étiez',
									Person::SecondPersonPlural => 'étiez',
									Person::ThirdPersonPlural => 'étaient' 
							),
							Tense::Passe_anterieur => array (
									Person::FirstPersonSingular => 'fus',
									Person::SecondPersonSingular => 'fus',
									Person::ThirdPersonSingular => 'fut',
									Person::FirstPersonPlural => 'fûmes',
									Person::SecondPersonPlural => 'fûtes',
									Person::ThirdPersonPlural => 'furent' 
							),
							Tense::Futur_anterieur => array (
									Person::FirstPersonSingular => 'serais',
									Person::SecondPersonSingular => 'serais',
									Person::ThirdPersonSingular => 'serait',
									Person::FirstPersonPlural => 'serions',
									Person::SecondPersonPlural => 'seriez',
									Person::ThirdPersonPlural => 'seraient' 
							) 
					),
					Mood::Subjonctif => array (
							Tense::Passe => array (
									Person::FirstPersonSingular => 'sois',
									Person::SecondPersonSingular => 'sois',
									Person::ThirdPersonSingular => 'soit',
									Person::FirstPersonPlural => 'soyons',
									Person::SecondPersonPlural => 'soyez',
									Person::ThirdPersonPlural => 'soient' 
							),
							Tense::Plus_que_parfait => array (
									Person::FirstPersonSingular => 'fusse',
									Person::SecondPersonSingular => 'fusses',
									Person::ThirdPersonSingular => 'fût',
									Person::FirstPersonPlural => 'fussions',
									Person::SecondPersonPlural => 'fussiez',
									Person::ThirdPersonPlural => 'fussent' 
							) 
					),
					Mood::Conditionnel => array (
							Tense::Premiere_Forme => array (
									Person::FirstPersonSingular => 'serais',
									Person::SecondPersonSingular => 'serais',
									Person::ThirdPersonSingular => 'serait',
									Person::FirstPersonPlural => 'serions',
									Person::SecondPersonPlural => 'seriez',
									Person::ThirdPersonPlural => 'seraient' 
							),
							Tense::Deuxieme_Forme => array (
									Person::FirstPersonSingular => 'fusse',
									Person::SecondPersonSingular => 'fusses',
									Person::ThirdPersonSingular => 'fût',
									Person::FirstPersonPlural => 'fussions',
									Person::SecondPersonPlural => 'fussiez',
									Person::ThirdPersonPlural => 'fussent' 
							) 
					) 
			);
			break;
		case Auxiliaire::Avoir :
			$conjugated_auxiliaire = array (
					Mood::Indicatif => array (
							Tense::Passe_compose => array (
									Person::FirstPersonSingular => 'ai',
									Person::SecondPersonSingular => 'as',
									Person::ThirdPersonSingular => 'a',
									Person::FirstPersonPlural => 'avons',
									Person::SecondPersonPlural => 'avez',
									Person::ThirdPersonPlural => 'ont' 
							),
							Tense::Plus_que_parfait => array (
									Person::FirstPersonSingular => 'avais',
									Person::SecondPersonSingular => 'avais',
									Person::ThirdPersonSingular => 'avait',
									Person::FirstPersonPlural => 'avions',
									Person::SecondPersonPlural => 'aviez',
									Person::ThirdPersonPlural => 'avaient' 
							),
							Tense::Passe_anterieur => array (
									Person::FirstPersonSingular => 'eus',
									Person::SecondPersonSingular => 'eus',
									Person::ThirdPersonSingular => 'eut',
									Person::FirstPersonPlural => 'eûmes',
									Person::SecondPersonPlural => 'eûtes',
									Person::ThirdPersonPlural => 'eurent' 
							),
							Tense::Futur_anterieur => array (
									Person::FirstPersonSingular => 'aurai',
									Person::SecondPersonSingular => 'auras',
									Person::ThirdPersonSingular => 'aura',
									Person::FirstPersonPlural => 'aurons',
									Person::SecondPersonPlural => 'aurez',
									Person::ThirdPersonPlural => 'auront' 
							) 
					),
					Mood::Subjonctif => array (
							Tense::Passe => array (
									Person::FirstPersonSingular => 'ai',
									Person::SecondPersonSingular => 'as',
									Person::ThirdPersonSingular => 'a',
									Person::FirstPersonPlural => 'avons',
									Person::SecondPersonPlural => 'avez',
									Person::ThirdPersonPlural => 'ont' 
							),
							Tense::Plus_que_parfait => array (
									Person::FirstPersonSingular => 'eusse',
									Person::SecondPersonSingular => 'eusses',
									Person::ThirdPersonSingular => 'eût',
									Person::FirstPersonPlural => 'eussions',
									Person::SecondPersonPlural => 'eussiez',
									Person::ThirdPersonPlural => 'eussent' 
							) 
					),
					Mood::Conditionnel => array (
							Tense::Premiere_Forme => array (
									Person::FirstPersonSingular => 'aurais',
									Person::SecondPersonSingular => 'aurais',
									Person::ThirdPersonSingular => 'aurait',
									Person::FirstPersonPlural => 'aurions',
									Person::SecondPersonPlural => 'auriez',
									Person::ThirdPersonPlural => 'auraient' 
							),
							Tense::Deuxieme_Forme => array (
									Person::FirstPersonSingular => 'eusse',
									Person::SecondPersonSingular => 'eusses',
									Person::ThirdPersonSingular => 'eût',
									Person::FirstPersonPlural => 'eussions',
									Person::SecondPersonPlural => 'eussiez',
									Person::ThirdPersonPlural => 'eussent' 
							) 
					) 
			);
			break;
	}
	return $conjugated_auxiliaire [$mood->getValue()] [$tense->getValue()] [$person->getValue()];
}	
function finding_auxiliaire($verb) {
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
		$auxiliaire = Auxiliaire::Etre;
	}
	else {
		$auxiliaire = Auxiliaire::Avoir;

	}
return new Auxiliaire($auxiliaire);
}
function isPlural(Person $person) {
	$plural_persons = array( Person::FirstPersonPlural, Person::SecondPersonPlural, Person::ThirdPersonPlural);
	return in_array($person->getValue(), $plural_persons);
}                   
function finding_participle ($verb, $person) {
//  $participe_passe = 'Unknown Participe Passé';
	$participe_passe = word_stem ( $verb ) .'é';
 	if (finding_auxiliaire($verb)->getValue() === Auxiliaire::Etre && (isPlural($person)) )	{	
	$participe_passe .='s';
	}
	return $participe_passe;
}	
function finding_participle2 ($verb) {
		//  $participe_present = 'Unknown Participe Présent';
	$participe_present = word_stem ( $verb ) .'ant';
	return $participe_present;	
}	
function conjugate($verb, Person $person, Tense $tense, Mood $mood) {
	// $conjugated_verb = 'Unknown Person';
	$conjugated_verb = word_stem ( $verb ) . endings ( $person, $tense, $mood);
	return $conjugated_verb;
}
function isComposite(Tense $tense) {
	$composite_tenses = array(Tense::Passe_compose, Tense::Plus_que_parfait, Tense::Passe_anterieur, Tense::Futur_anterieur);
	return in_array($tense->getValue(), $composite_tenses);
}
function conjugation_phrase($verb, Person $person, Tense $tense, Mood $mood) {
	$personal_pronoun = personal_pronoun ( $person);
	if(isComposite( $tense)) {
	$participe_passe = finding_participle( $verb, $person);
	$conjugated_auxiliaire_verb = conjugated_auxiliaire(finding_auxiliaire($verb), $person, $tense, $mood);
	return $personal_pronoun . $conjugated_auxiliaire_verb .' '. $participe_passe;
	}
	else {				
	$conjugated_verb = conjugate ( $verb, $person, $tense, $mood);
	return $personal_pronoun . $conjugated_verb;
	}
}
$variable = conjugate ( 'aimer', new Person(Person::FirstPersonSingular), new Tense(Tense::Present), new Mood(Mood::Indicatif)); 
?>
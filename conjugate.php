<?php

abstract class Enum {
	private $value;
	public function __construct($value) {
		$constants = $this->getConstants ();
		if (is_string ( $value )) {
			if (isset ( $constants [$value] )) {
				$this->value = $constants [$value];
			} else {
				throw new Exception ( "No constant of name $value in Enum " . get_called_class () );
			}
		} else {
			if (in_array ( $value, $constants )) {
				$this->value = $value;
			} else {
				throw new Exception ( "No constant of value $value in Enum " . get_called_class () );
			}
		}
	}
	
	public function getValue() {
		return $this->value;
	}
	
	static public function getConstants() {
		$reflection = new ReflectionClass(get_called_class());
		return $reflection->getConstants();
	}
	
	public function __toString() {
		// must not throw from toString
		try {
			return array_flip(getConstants())[$this->$value];
			// when the value is not in the constants
		} catch(Exception $e) {
			return "Invalid value ".$this->$value;
		}
	}
}

class Tense extends Enum {	
	// simple tenses
	const Present = 0;
	const Imparfait = 1;
	const Passe = 2;
	const Futur = 3; 		// (Futur I)		
		
	// composite tenses
	const Passe_compose = 4;
	const Plus_que_parfait = 5;
	const Passe_anterieur = 6;
	const Futur_anterieur = 7;	// (Futur II)
	const Futur_compose = 8; 	// (Futur proche)
	
	const Premiere_Forme = 9; 
	const Deuxieme_Forme = 10;	
}

class Person extends Enum {
	const FirstPersonSingular = 0;
	const SecondPersonSingular = 1;
	const ThirdPersonSingular = 2;
	const FirstPersonPlural = 3;
	const SecondPersonPlural = 4;
	const ThirdPersonPlural = 5;
}
class Mood extends Enum {
	const Indicatif = 0;
	const Subjonctif = 1;
	const Conditionnel = 2;
	const Imperatif = 3;
	const Modes_impersonnels = 4;
}
class Auxiliaire {
	const Avoir = 0;
	const Etre = 1;
}
function word_stem($verb) {
	$word_stem = substr ( $verb, 0, - 2 );
	return $word_stem;
}
function personal_pronoun(Person $person) {
	$finding_personperson = '"Unknown Person';
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
function conjugated_auxiliaire($auxiliaire, Person $person, Tense $tense, Mood $mood) {
	switch ($auxiliaire) {
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
return $auxiliaire;
}	
function conjugate($verb, Person $person, Tense $tense, Mood $mood) {
	// $conjugated_verb = 'Unknown Person';
	$conjugated_verb = word_stem ( $verb ) . endings ( $person, $tense, $mood);
	return $conjugated_verb;
}
function conjugation_phrase($verb, Person $person, Tense $tense, Mood $mood) {
	$conjugated_verb = conjugate ( $verb, $person, $tense, $mood);
	$personal_pronoun = personal_pronoun ( $person);
	return $personal_pronoun . $conjugated_verb;
}
$variable = conjugate ( 'aimer', new Person(Person::FirstPersonSingular), new Tense(Tense::Present), new Mood(Mood::Indicatif)); 
?>
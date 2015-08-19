<?php
require_once 'classes/Enum.php';
require_once 'classes/EndingWith.php';
require_once 'classes/Tense.php';
require_once 'classes/Person.php';
require_once 'classes/Mood.php';
require_once 'classes/Mode.php';
require_once 'classes/Auxiliaire.php';
require_once 'classes/ConjugationModel.php';
require_once 'classes/ExceptionModel.php';

function word_stem($verb) {
	$word_stem = substr ( $verb, 0, - 2 );
	return $word_stem;
}
function finding_infinitive_ending($verb) {
	switch (substr ( $verb, - 2, 2 )) {
		case 'er' :
			$endingwith = EndingWith::ER;
			switch (substr ( $verb, - 3, 3 )) {
				case 'cer' :
					$endingwith = EndingWith::CER;
					break;
				case 'ger' :
					$endingwith = EndingWith::GER;
					break;
				case 'yer' :
					$endingwith = EndingWith::YER;
					break;
			}
			break;
		case 'ir' :
			$endingwith = EndingWith::IR;
			switch (substr ( $verb, - 3, 3 )) {
				case 'cer' :
					$endingwith = EndingWith::CER;
					break;
			}
			break;
	}
	return new EndingWith ( $endingwith );
}
function finding_exception_model($verb) {
	include 'irregular/irregular-verb-groups.php';
	if (in_array ( $verb, $eler_ele )) {
		$exceptionmodel = ExceptionModel::ELER_ELE;
	}
	if (in_array ( $verb, $eler_elle )) {
		$exceptionmodel = ExceptionModel::ELER_ELLE;
	}
	return new ExceptionModel ( $exceptionmodel );
}
function finding_conjugation_model($verb) {
	$verbes_pronominaux  = array('aimer','lever');
	$verbes_exclusivement_pronominaux  = array('abrater','empommer');
	if (!in_array ( $verb, $verbes_pronominaux )) {
		$conjugationmodel = ConjugationModel::NonReflexive;
	}
	if (in_array ( $verb, $verbes_pronominaux )) {
		$conjugationmodel = ConjugationModel::Reflexive;
	}
	if (in_array ( $verb, $verbes_exclusivement_pronominaux  )) {
		$conjugationmodel = ConjugationModel::OnlyReflexive;
	}
	return new ConjugationModel ( $conjugationmodel );
}
function personal_pronoun(Person $person, Mood $mood) {
	$finding_person = '"Unknown Person';
	$finding_person = array (
			Person::FirstPersonSingular => 'je',
			Person::SecondPersonSingular => 'tu',
			Person::ThirdPersonSingular => 'il',
			Person::FirstPersonPlural => 'nous',
			Person::SecondPersonPlural => 'vous',
			Person::ThirdPersonPlural => 'ils' 
	);
	$subjonctif_pre_pronouns = array (
			Person::FirstPersonSingular => 'que ',
			Person::SecondPersonSingular => 'que ',
			Person::ThirdPersonSingular => 'qu’',
			Person::FirstPersonPlural => 'que ',
			Person::SecondPersonPlural => 'que ',
			Person::ThirdPersonPlural => 'qu’' 
	);
	
	if ($mood->getValue () === Mood::Subjonctif) {
		return $subjonctif_pre_pronouns [$person->getValue ()] . $finding_person [$person->getValue ()];
	} else {
		return $finding_person [$person->getValue ()];
	}
}
function reflexive_pronoun(Person $person, Mood $mood) {
	$finding_reflexive_pronoun = array (
			Person::FirstPersonSingular => 'me',
			Person::SecondPersonSingular => 'te',
			Person::ThirdPersonSingular => 'se',
			Person::FirstPersonPlural => 'nous',
			Person::SecondPersonPlural => 'vous',
			Person::ThirdPersonPlural => 'se' 
	);
	return $finding_reflexive_pronoun [$person->getValue ()];
}
function merge_pronoun(Person $person, Mood $mood) {
	if ($mood->getValue () === Mood::Subjonctif) {
		return $subjonctif_pre_pronouns [$person->getValue ()] . $finding_person [$person->getValue ()] . $finding_reflexive_pronoun [$person->getValue ()];
	} else {
		return $finding_person [$person->getValue ()] . $finding_reflexive_pronoun [$person->getValue ()];
	}
}
function ending(Person $person, Tense $tense, Mood $mood, EndingWith $endingwith) {
	$ending = array ( 
			EndingWith::ER => array ( // Standardendungen für Verben auf -er
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
			),
			EndingWith::IR => array ( // Standardendungen für Verben auf -er
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
function aller(Person $person, Tense $tense, Mood $mood) {
	// $aller = 'Unknown Aller';
	$aller_form = array (
			Mood::Indicatif => array (
					Tense::Futur_compose => array (
							Person::FirstPersonSingular => 'vais',
							Person::SecondPersonSingular => 'vas',
							Person::ThirdPersonSingular => 'va',
							Person::FirstPersonPlural => 'allons',
							Person::SecondPersonPlural => 'allez',
							Person::ThirdPersonPlural => 'vont'
					) 
			) 
	);
	
	return $aller_form [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
}
function conjugated_auxiliaire(Auxiliaire $auxiliaire, Person $person, Tense $tense, Mood $mood) {
	switch ($auxiliaire->getValue ()) {
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
					),
					Mood::Imperatif => array (
							Tense::Passe => array (
									Person::FirstPersonSingular => 'sois',
									Person::FirstPersonPlural => 'soyons',
									Person::SecondPersonPlural => 'soyez' 
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
									Person::FirstPersonSingular => 'aie',
									Person::SecondPersonSingular => 'aies',
									Person::ThirdPersonSingular => 'ait',
									Person::FirstPersonPlural => 'ayons',
									Person::SecondPersonPlural => 'ayez',
									Person::ThirdPersonPlural => 'aient' 
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
					),
					Mood::Imperatif => array (
							Tense::Passe => array (
									Person::FirstPersonSingular => 'aie',
									Person::FirstPersonPlural => 'ayons',
									Person::SecondPersonPlural => 'ayez' 
							) 
					) 
			);
			break;
	}
	if ($tense->getValue () === Tense::Futur_compose) {
		return aller ( $person, $tense, $mood );
	}
	return $conjugated_auxiliaire [$mood->getValue ()] [$tense->getValue ()] [$person->getValue ()];
}
function finding_auxiliaire($verb) {
	$aux_etre = array ('accourir','advenir','aller','amuser','apparaitre','apparaître','arriver','ascendre','co-naitre','co-naître','convenir',
			'débeller','décéder','démourir','descendre','disconvenir','devenir','échoir','entre-venir','entrer','époustoufler','intervenir',
			'issir','mévenir','monter','mourir','naitre','naître','obvenir','paraitre','paraître','partir','parvenir','pourrir','prémourir',
			'provenir','ragaillardir','raller','réadvenir','re-aller','réapparaitre','réapparaître','reconvenir','redépartir','redescendre',
			'redevenir','réentrer','réintervenir','remonter','remourir','renaitre','renaître','rentrer','revenir','reparaitre','reparaître',
			'repartir','reparvenir','repasser','repourrir','rerentrer','rerester','ressortir','ressouvenir','rester','resurvenir','retomber',
			'retourner','retrépasser','revenir','s’amuser','se redépartir','se sortir','se souvenir','sortir','souvenir','stationner','sur-aller'
			,'suradvenir','survenir','tomber','trépasser','venir');
	$aux_avoir_etre = array ('accourir','ascendre','convenir','déchoir','demeurer','descendre','disparaitre','disparaître','disconvenir',
			'éclore','enclore','entrer ','monter','paraitre','paraître','passer','ragaillardir', 'ré-apparaître','réapparaître','reconvenir',
			'reparaitre','reparaître','sortir','tomber'); // use both auxiliary verbs
	if (in_array ( $verb, $aux_etre )) { // later or in_array($verb, $verbes_pronominaux) only the pronominal version!
		$auxiliaire = Auxiliaire::Etre;
	} else {
		$auxiliaire = Auxiliaire::Avoir;
	}
	return new Auxiliaire ( $auxiliaire );
}
function isPlural(Person $person) {
	$plural_persons = array (
			Person::FirstPersonPlural,
			Person::SecondPersonPlural,
			Person::ThirdPersonPlural 
	);
	return in_array ( $person->getValue (), $plural_persons );
}
function conjugate($verb, Person $person, Tense $tense, Mood $mood) {
	$endingwith = finding_infinitive_ending($verb);
	$conjugated_verb = word_stem ( $verb ) . ending ( $person, $tense, $mood, $endingwith );
	return $conjugated_verb;
}
function isComposite(Mood $mood, Tense $tense) {
	$composite_tenses = array (
			Mood::Indicatif => array (
					Tense::Passe_compose,
					Tense::Plus_que_parfait,
					Tense::Passe_anterieur,
					Tense::Futur_anterieur,
					Tense::Futur_compose 
			),
			Mood::Subjonctif => array (
					Tense::Passe,
					Tense::Plus_que_parfait 
			),
			Mood::Conditionnel => array (
					Tense::Premiere_Forme,
					Tense::Deuxieme_Forme 
			),
			Mood::Imperatif => array (
					Tense::Passe 
			) 
	);
	return in_array ( $tense->getValue (), $composite_tenses [$mood->getValue ()] );
}
function finding_participe_present($verb) { 
	
if ( finding_infinitive_ending( $verb )->getValue () === EndingWith::ER)
	$participe_present = word_stem ( $verb ) . 'ant';
if ( finding_infinitive_ending( $verb )->getValue () === EndingWith::IR)
	$participe_present = word_stem ( $verb ) . 'issant';	
	return $participe_present;
}
function finding_participe_passe($verb) {

	if ( finding_infinitive_ending( $verb )->getValue () === EndingWith::ER)
		$participe_passe = word_stem ( $verb ) . 'é';
	if ( finding_infinitive_ending( $verb )->getValue () === EndingWith::IR)
		$participe_passe = word_stem ( $verb ) . 'i';
	return $participe_passe;
}
function modes_impersonnels($verb, Auxiliaire $auxiliaire, Mode $mode, Tense $tense) {
	$participe_passe = finding_participe_passe ($verb);
	$participe_present = finding_participe_present ($verb);
	switch ($auxiliaire->getValue ()) {
		case Auxiliaire::Etre :
			$modes_impersonnels = array (
					Tense::Present => array (
									Mode::Infinitif => $verb,
									Mode::Gerondif => 'en ' . $participe_present,
									Mode::Participe => $participe_present 
							),
					Tense::Passe => array (
									Mode::Infinitif => Auxiliaire::Etre . ' ' . $participe_passe,
									Mode::Gerondif => 'en étant ' . $participe_passe,
									Mode::Participe => $participe_passe 
					) 
			);
			break;
		case Auxiliaire::Avoir :
			$modes_impersonnels = array (
					Tense::Present => array (
									Mode::Infinitif => $verb,
									Mode::Gerondif => 'en ' . $participe_present,
									Mode::Participe => $participe_present 
							),
					Tense::Passe => array (
									Mode::Infinitif => Auxiliaire::Avoir. ' ' . $participe_passe,
									Mode::Gerondif => 'en ayant ' . $participe_passe,
									Mode::Participe => $participe_passe 
							) 
			);
			
			break;
	}
	return $modes_impersonnels [$tense->getValue ()] [$mode->getValue ()];
}

function apostrophized($pronoun, $verb, & $was_apostrophized = null) { 
	$h_apire = array ('hérisser');//  example values
	if (preg_match ( '~(.*\b[jtms])e$~ui', $pronoun, $m ) && (preg_match ( '~^h?(?:[aæàâeéèêëiîïoôœuûù]|y(?![aæàâeéèêëiîïoôœuûù]))~ui', $verb ) && !in_array($verb, $h_apire))) {
		$was_apostrophized = true;
		return "{$m[1]}’";
	}
	$was_apostrophized = false;
	return $pronoun;
}
function concatenate_apostrophized($pronoun, $verb) { 
	$was_apostrophized = false;
	$possiblyApostrophizedPronoun = apostrophized ( $pronoun, $verb, $was_apostrophized);
	return $was_apostrophized ? $possiblyApostrophizedPronoun.$verb : "$possiblyApostrophizedPronoun $verb";
}

abstract class ConjugationPhrase {
	abstract function accept(ConjugationPhraseVisitor $visitor);
	static function create($verb, Person $person, Tense $tense, Mood $mood) {
		$personal_pronoun = personal_pronoun ( $person, $mood );
		if (isComposite ( $mood, $tense )) {
			$participe_passe = finding_participe_passe ( $verb );
			if (finding_auxiliaire ( $verb )->getValue () === Auxiliaire::Etre && (isPlural ( $person ))) {
				$participe_passe .= 's';
			}
			$conjugated_auxiliaire_verb = conjugated_auxiliaire ( finding_auxiliaire ( $verb ), $person, $tense, $mood );
			if ($mood->getValue () === Mood::Imperatif) {
				return new ImperatifPasseTenseConjugationPhrase ( $conjugated_auxiliaire_verb, $participe_passe );
			}
			if ($tense->getValue () === Tense::Futur_compose) {
				return new FuturComposeTenseConjugationPhrase ( $personal_pronoun, $conjugated_auxiliaire_verb, $verb );
			}
			return new CompositeTenseConjugationPhrase ( $personal_pronoun, $conjugated_auxiliaire_verb, $participe_passe ); 
		} else {
			$conjugated_verb = conjugate ( $verb, $person, $tense, $mood );
			if ($mood->getValue () === Mood::Imperatif) {
				return new ImperatifPresentTenseConjugationPhrase ( $conjugated_verb );
			}
			return new SimpleTenseConjugationPhrase ( $personal_pronoun, $conjugated_verb );
		}
	}
}
class SimpleTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitSimpleTense ( $this );
	}
	public $personal_pronoun, $conjugated_verb;
	public function __construct($personal_pronoun, $conjugated_verb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_verb = $conjugated_verb;
	}
}
class CompositeTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitCompositeTense ( $this );
	}
	public $personal_pronoun, $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct($personal_pronoun, $conjugated_auxiliaire_verb, $participe_passe) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->participe_passe = $participe_passe;
	}
}
class ImperatifPresentTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitImperatifPresentTense ( $this );
	}
	public $conjugated_verb;
	public function __construct($conjugated_verb) {
		$this->conjugated_verb = $conjugated_verb;
	}
}
class ImperatifPasseTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitImperatifPasseTense ( $this );
	}
	public $conjugated_auxiliaire_verb, $participe_passe;
	public function __construct($conjugated_auxiliaire_verb, $participe_passe) {
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->participe_passe = $participe_passe;
	}
}
class FuturComposeTenseConjugationPhrase extends ConjugationPhrase {
	function accept(ConjugationPhraseVisitor $visitor) {
		return $visitor->visitFuturComposeTense ( $this );
	}
	public $personal_pronoun;
	public $verb;
	public function __construct($personal_pronoun, $conjugated_auxiliaire_verb, $verb) {
		$this->personal_pronoun = $personal_pronoun;
		$this->conjugated_auxiliaire_verb = $conjugated_auxiliaire_verb;
		$this->verb = $verb;
	}
}
abstract class ConjugationPhraseVisitor {
	abstract function visitSimpleTense(SimpleTenseConjugationPhrase $visitee);
	abstract function visitCompositeTense(CompositeTenseConjugationPhrase $visitee);
	abstract function visitImperatifPresentTense(ImperatifPresentTenseConjugationPhrase $visitee);
	abstract function visitImperatifPasseTense(ImperatifPasseTenseConjugationPhrase $visitee);
	abstract function visitFuturComposeTense(FuturComposeTenseConjugationPhrase $visitee);
}
class GoogleTTSConjugationPhraseVisitor extends ConjugationPhraseVisitor {
	function visitSimpleTense(SimpleTenseConjugationPhrase $visitee) {
		return concatenate_apostrophized ( $visitee->personal_pronoun, $visitee->conjugated_verb );
	}
	function visitCompositeTense(CompositeTenseConjugationPhrase $visitee) {
		return concatenate_apostrophized ( $visitee->personal_pronoun, $visitee->conjugated_auxiliaire_verb ) . ' ' . $visitee->participe_passe;
	}
	function visitImperatifPresentTense(ImperatifPresentTenseConjugationPhrase $visitee) {
		return $visitee->conjugated_verb;
	}
	function visitImperatifPasseTense(ImperatifPasseTenseConjugationPhrase $visitee) {
		return $visitee->conjugated_auxiliaire_verb . ' ' . $visitee->participe_passe;
	}
	function visitFuturComposeTense(FuturComposeTenseConjugationPhrase $visitee) {
		return $visitee->personal_pronoun  . ' ' . $visitee->conjugated_auxiliaire_verb  . ' ' . $visitee->verb;
	}
}

function conjugation_phrase($verb, Person $person, Tense $tense, Mood $mood) {
	$conjugationPhrase = ConjugationPhrase::create($verb, $person, $tense, $mood);
	$visitor = new GoogleTTSConjugationPhraseVisitor();
	return $conjugationPhrase->accept($visitor);
}
$variable = conjugate ( 'aimer', new Person ( Person::FirstPersonSingular ), new Tense ( Tense::Present ), new Mood ( Mood::Indicatif ), new EndingWith ( EndingWith::ER ) );
?>
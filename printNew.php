<?php
require_once 'conjugate.php';
class 	OutputConjugationPhraseVisitor extends ConjugationPhraseVisitor {
	function visitSimpleTense(SimpleTenseConjugationPhrase $visitee) {
		return concatenate_apostrophized ( $visitee->personal_pronoun, $visitee->conjugated_verb );
	}
	function visitCompositeTense(CompositeTenseConjugationPhrase $visitee) {
		return concatenate_apostrophized ( $visitee->personal_pronoun, $visitee->conjugated_auxiliaire_verb )  . PHP_EOL."\t\t\t".'<td>' . $visitee->participe_passe;
	}
	function visitImperatifPresentTense(ImperatifPresentTenseConjugationPhrase $visitee) {
		return "\t\t\t".'<td>'. $visitee->conjugated_verb.'</td>';
	}
	function visitImperatifPasseTense(ImperatifPasseTenseConjugationPhrase $visitee) {
		return "\t\t\t".'<td>'. $visitee->conjugated_auxiliaire_verb .'</td>' . PHP_EOL."\t\t\t".'<td>' . $visitee->participe_passe.'</td>';
	}
	function visitFuturComposeTense(FuturComposeTenseConjugationPhrase $visitee) {
		return "\t\t\t".'<td "text-right text-muted">'. $visitee->personal_pronoun .'</td>' . PHP_EOL."\t\t\t".'<td>' . $visitee->conjugated_auxiliaire_verb  .'</td> <td>' . $visitee->verb.'</td>';
	}
}
function print_persons($verb, Tense $tense, Mood $mood) {
	$persons = [
			Mood::Indicatif => [
					Tense::Present => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					],
					Tense::Imparfait => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					],
					Tense::Passe => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					],
					Tense::Futur => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					],
					Tense::Passe_compose => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					],
					Tense::Plus_que_parfait => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					],
					Tense::Passe_anterieur => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					],
					Tense::Futur_anterieur => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					],
					Tense::Futur_compose => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					] 
			],
			Mood::Subjonctif => [
					Tense::Present => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					],
					Tense::Imparfait => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					],
					Tense::Passe => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					],
					Tense::Plus_que_parfait => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					] 
			],
			Mood::Conditionnel => [
					Tense::Present => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					],
					Tense::Premiere_Forme => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					],
					Tense::Deuxieme_Forme => [
							Person::FirstPersonSingular,
							Person::SecondPersonSingular,
							Person::ThirdPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural,
							Person::ThirdPersonPlural 
					] 
			],
			Mood::Imperatif => [
					Tense::Present => [
							Person::FirstPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural 
					],
					Tense::Passe => [
							Person::FirstPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural 
					] 
			] 
	];
	foreach ( $persons [$mood->getValue ()] [$tense->getValue ()] as $person ) {
		//$output = conjugation_phrase ( $verb, new Person ( $person ), $tense, $mood );
		$conjugationPhrase = ConjugationPhrase::create($infinitiveVerb->getInfinitiveVerb(), new Person($person), $tense, $mood);
		$ttsVisitor = new GoogleTTSConjugationPhraseVisitor();
		$output = $conjugationPhrase->accept($ttsVisitor);
		
		
		$OutputVisitor = new OutputConjugationPhraseVisitor(); 
		$output2 = $conjugationPhrase->accept($OutputVisitor);
		echo "\t\t".'<tr>' . PHP_EOL;
		echo "\t\t\t".'<td><span data-text="' . $output . '" data-lang="fr" class="trigger_play"></span></td>' . PHP_EOL;
		echo ' . $output2 . ' . PHP_EOL;
		echo "\t\t".'</tr>' . PHP_EOL;		
	}   
}
function print_tenses($verb, Mood $mood, $tenses) {
	$th_of_tense = [
			Tense::Present =>'Présent',
			Tense::Imparfait =>'Imparfait',
			Tense::Passe => ($mood->getValue() == Mood::Indicatif ? 'Passé simple' : 'Passé'),
			Tense::Futur =>'Futur simple (Futur I)',
			Tense::Passe_compose =>'Passé composé',
			Tense::Plus_que_parfait =>'Plus-que-parfait',
			Tense::Passe_anterieur =>'Passé antérieur',
			Tense::Futur_anterieur =>'Futur antérieur (Futur II)',
			Tense::Futur_compose =>'Futur composé (Futur proche)',
			Tense::Premiere_Forme =>'Passé première forme',
			Tense::Deuxieme_Forme =>'Passé deuxième forme'
	];
	foreach ( $tenses [$mood->getValue ()] as $tense ) {
		echo "\t\t".'<tr class="border">' . PHP_EOL;
		echo "\t\t\t".'<th colspan="number">'.$th_of_tense[$tense].'</th></tr>' . PHP_EOL;
		print_persons ( $verb, new Tense ( $tense ), new Mood ( $mood ) );
		echo PHP_EOL;
	}
}
function print_simple_tenses($verb, Mood $mood) {
	$tenses = [
			Mood::Indicatif => [
					Tense::Present,
					Tense::Imparfait,
					Tense::Passe,
					Tense::Futur 
			],
			Mood::Subjonctif => [
					Tense::Present,
					Tense::Imparfait 
			],
			Mood::Conditionnel => [
					Tense::Present 
			],
			Mood::Imperatif => [
					Tense::Present 
			] 
	];
	print_tenses ( $verb, $mood, $tenses );
}
function print_composite_tenses($verb, Mood $mood) {
	$tenses = [
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
	print_tenses ( $verb, $mood, $tenses );
}
function print_modes($verb) {
	$tenses = [
			Tense::Present,
			Tense::Passe 
	];
	$modes = [
			Mode::Infinitif,
			Mode::Gerondif,
			Mode::Participe 
	];
	foreach ( $modes as $mode ) {
		foreach ( $tenses as $tense ) {
			echo "\t\t".'<tr>' . PHP_EOL;
			echo "\t\t\t".'<td>' . modes_impersonnels ( $verb, finding_auxiliaire ( $verb ), new Mode ( $mode ), new Tense ( $tense ) ) . '</td>' . PHP_EOL;
			echo "\t\t".'</tr>' . PHP_EOL;
		}
	}
}
function print_conjugations_of_verb($verb) {
	$moods = [
			Mood::Indicatif,
			Mood::Subjonctif,
			Mood::Conditionnel,
			Mood::Imperatif 
	];
	$h2_of_mood = [
			Mood::Indicatif =>'Indicatif',
			Mood::Subjonctif =>'Subjonctif',
			Mood::Conditionnel =>'Conditionnel',
			Mood::Imperatif =>'Imperatif',
	];
	foreach ( $moods as $mood ) {
		echo "\t".'<hr class="linie">' . PHP_EOL;
		echo "\t".'<h2 class="home"><a id="'.strtolower($h2_of_mood[$mood]).'"></a>'.$h2_of_mood[$mood].'</h2>' . PHP_EOL;
		echo "\t".'<table class="tab">' . PHP_EOL;		
		print_simple_tenses ( $verb, new Mood ( $mood ) );
		echo "\t".'</table>' . PHP_EOL . PHP_EOL;
		echo "\t".'<table class="tab">' . PHP_EOL;		
		print_composite_tenses ( $verb, new Mood ( $mood ) );
		echo "\t".'</table>' . PHP_EOL . PHP_EOL;
	}
	echo "\t".'<table class="tab">' . PHP_EOL;
	print_modes ( $verb );
	echo "\t".'</table>' . PHP_EOL . PHP_EOL;
}
?>
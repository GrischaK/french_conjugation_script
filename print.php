<?php
require_once 'conjugate.php';
require_once 'groups/verbes_impersonnels.php';
function recursiveRemoval(&$array, $val) {
	if (is_array ( $array )) {
		foreach ( $array as $key => &$arrayElement ) {
			if (is_array ( $arrayElement )) {
				recursiveRemoval ( $arrayElement, $val );
			} else {
				if ($arrayElement == $val) {
					unset ( $array [$key] );
				}
			}
		}
	}
}
function print_persons(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Gender $gender, Voice $voice, SentenceType $sentencetype, Tense $tense, Mood $mood) {
	global $verbes_impersonnels;
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
					],
					Tense::Passe_recent => [ 
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
							Person::SecondPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural 
					],
					Tense::Passe => [ 
							Person::SecondPersonSingular,
							Person::FirstPersonPlural,
							Person::SecondPersonPlural 
					] 
			] 
	];
	if (in_array ( $infinitiveVerb, $verbes_impersonnels )) {
		recursiveRemoval ( $persons, Person::FirstPersonSingular );
		recursiveRemoval ( $persons, Person::SecondPersonSingular );
		recursiveRemoval ( $persons, Person::FirstPersonPlural );
		recursiveRemoval ( $persons, Person::SecondPersonPlural );
		unset ( $persons [Mood::Imperatif] );
	}
	
	foreach ( $persons [$mood->getValue ()] [$tense->getValue ()] as $person ) {
		$conjugationPhrase = ConjugationPhrase::create ( $infinitiveVerb, $auxiliaire, $gender, $voice, $sentencetype, new Person ( $person ), $tense, $mood );
		$ttsVisitor = new GoogleTTSConjugationPhraseVisitor ();
		$output = $conjugationPhrase->accept ( $ttsVisitor );
		$tablePrintVisitor = new OutputConjugationPhraseVisitor ();
		$conjugationPhrase->accept ( $tablePrintVisitor );
		echo "\t\t" . '<tr>' . PHP_EOL;
		echo "\t\t\t" . '<td><span data-text="' . $output . '" data-lang="fr" class="trigger_play"></span></td>' . PHP_EOL;
		echo $conjugationPhrase->accept ( $tablePrintVisitor );
		echo "\t\t" . '</tr>' . PHP_EOL;
	}
}
class OutputConjugationPhraseVisitor extends ConjugationPhraseVisitor {
	function visitSimpleTense(SimpleTenseConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . apostrophized ( $visitee->personal_pronoun, $visitee->conjugated_verb ) . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->conjugated_verb . '</td>' . PHP_EOL;
	}
	function visitSimpleTensesPassive(SimpleTensesPassiveConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->conjugated_auxiliaire_verb . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . '</td>' . PHP_EOL;
	}
	function visitSimpleTensePronominal(SimpleTensePronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_verb ) . '</td>' . PHP_EOL;
	}
	function visitSimpleTenseInterrogativeActice(SimpleTenseInterrogativeActiceConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right">' . euphonious_change ( $visitee->conjugated_verb, $visitee->personal_pronoun ) . '-</td>' . PHP_EOL . "\t\t\t" . '<td class="text-muted">' . $visitee->personal_pronoun . ' ?</td>' . PHP_EOL;
	}
	function visitSimpleTenseInterrogativePassive(SimpleTenseInterrogativePassiveConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right">' . euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . '-</td>' . PHP_EOL . "\t\t\t" . '<td class="text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . ' ?</td>' . PHP_EOL;
	}
	function visitSimpleTenseInterrogativePronominal(SimpleTenseInterrogativePronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right">' . apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_verb ) . ' ' . euphonious_change ( $visitee->conjugated_verb, $visitee->personal_pronoun ) . '-</td>' . PHP_EOL . "\t\t\t" . '<td class="text-muted">' . $visitee->personal_pronoun . ' ?</td>' . PHP_EOL;
	}
	function visitSimpleTenseNegationActive(SimpleTenseNegationActiveConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( 'ne', $visitee->conjugated_verb ) . ' pas</td>' . PHP_EOL;
	}
	function visitSimpleTenseNegationPassive(SimpleTenseNegationPassiveConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . '</td>' . PHP_EOL;
	}
	function visitSimpleTenseNegationPronominal(SimpleTenseNegationPronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>ne ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_verb ) . ' pas</td>' . PHP_EOL;
	}
	function visitCompositeTense(CompositeTenseConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . apostrophized ( $visitee->personal_pronoun, $visitee->conjugated_auxiliaire_verb ) . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->conjugated_auxiliaire_verb . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . '</td>' . PHP_EOL;
	}
	function visitCompositeTenseinPassiveVoice(CompositeTenseinPassiveVoiceConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . apostrophized ( $visitee->personal_pronoun, $visitee->conjugated_auxiliaire_verb ) . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->conjugated_auxiliaire_verb . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->etre_participe_passe . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . '</td>' . PHP_EOL;
	}
	function visitCompositeTensePronominal(CompositeTensePronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . ' ' . apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_auxiliaire_verb ) . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->conjugated_auxiliaire_verb . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . '</td>' . PHP_EOL;
	}
	function visitCompositeTenseInterrogativeActice(CompositeTenseInterrogativeActiceConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right">' . euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . '-</td>' . PHP_EOL . "\t\t\t" . '<td class="text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . ' ?</td>' . PHP_EOL;
	}
	function visitCompositeTenseInterrogativePassive(CompositeTenseInterrogativePassiveConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right">' . euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . '-</td>' . PHP_EOL . "\t\t\t" . '<td class="text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->etre_participe_passe . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . ' ?</td>' . PHP_EOL;
	}
	function visitCompositeTenseInterrogativePronominal(CompositeTenseInterrogativePronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right">' . apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_auxiliaire_verb ) . ' ' . euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . '-</td>' . PHP_EOL . "\t\t\t" . '<td class="text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . ' ?</td>' . PHP_EOL;
	}
	function visitCompositeTenseNegationActive(CompositeTenseNegationActiveConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . '</td>' . PHP_EOL;
	}
	function visitCompositeTenseNegationPassive(CompositeTenseNegationPassiveConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->etre_participe_passe . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . '</td>' . PHP_EOL;
	}
	function visitCompositeTenseNegationPronominal(CompositeTenseNegationPronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>ne ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_auxiliaire_verb ) . ' pas</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . '</td>' . PHP_EOL;
	}
	function visitFuturComposeTense(FuturComposeTenseConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->conjugated_auxiliaire_verb . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->infinitiveVerb . '</td>' . PHP_EOL;
	}
	function visitFuturComposePronominal(FuturComposeTensePronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->conjugated_auxiliaire_verb . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->infinitiveVerb ) . '</td>' . PHP_EOL;
	}
	function visitFuturComposeInterrogativeActive(FuturComposeTenseInterrogativeActiveConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right">' . euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . '-</td>' . PHP_EOL . "\t\t\t" . '<td class="text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->infinitiveVerb . ' ?</td>' . PHP_EOL;
	}
	function visitFuturComposeInterrogativePronominal(FuturComposeTenseInterrogativePronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right">' . euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . '-</td>' . PHP_EOL . "\t\t\t" . '<td class="text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->infinitiveVerb ) . ' ?</td>' . PHP_EOL;
	}
	function visitFuturComposeNegationActive(FuturComposeTenseNegationActiveConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->infinitiveVerb . '</td>' . PHP_EOL;
	}
	function visitFuturComposeNegationPronominal(FuturComposeTenseNegationPronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->infinitiveVerb ) . '</td>' . PHP_EOL;
	}
	function visitPasseRecent(PasseRecentTenseConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->conjugated_auxiliaire_verb . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( 'de', $visitee->infinitiveVerb ) . '</td>' . PHP_EOL;
	}
	function visitPasseRecentPronominal(PasseRecentTensePronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->conjugated_auxiliaire_verb . ' de</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->infinitiveVerb ) . '</td>' . PHP_EOL;
	}
	function visitPasseRecentInterrogativeActive(PasseRecentTenseInterrogativeActiveConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right">' . euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . '-</td>' . PHP_EOL . "\t\t\t" . '<td class="text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( 'de', $visitee->infinitiveVerb ) . ' ?</td>' . PHP_EOL;
	}
	function visitPasseRecentInterrogativePronominal(PasseRecentTenseInterrogativePronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right">' . euphonious_change ( $visitee->conjugated_auxiliaire_verb, $visitee->personal_pronoun ) . '-</td>' . PHP_EOL . "\t\t\t" . '<td class="text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>de ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->infinitiveVerb ) . ' ?</td>' . PHP_EOL;
	}
	function visitPasseRecentNegationActive(PasseRecentTenseNegationActiveConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( 'de', $visitee->infinitiveVerb ) . '</td>' . PHP_EOL;
	}
	function visitPasseRecentNegationPronominal(PasseRecentTenseNegationPronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td class="text-right text-muted">' . $visitee->personal_pronoun . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas</td>' . PHP_EOL . "\t\t\t" . '<td>de ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->infinitiveVerb ) . '</td>' . PHP_EOL;
	}
	function visitImperatifPresentTense(ImperatifPresentTenseConjugationPhrase $visitee) {
		return "\t\t\t" . '<td>' . $visitee->conjugated_verb . '</td>' . PHP_EOL;
	}
	function visitImperatifPresentTenseinPassiveVoice(ImperatifPresentTenseinPassiveVoiceConjugationPhrase $visitee) {
		return "\t\t\t" . '<td>' . $visitee->conjugated_auxiliaire_verb . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->conjugated_verb . '</td>' . PHP_EOL;
	}
	function visitImperatifPresentTensePronominal(ImperatifPresentTensePronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td>' . $visitee->conjugated_verb . $visitee->reflexive_pronoun . '</td>' . PHP_EOL;
	}
	function visitImperatifPresentNegationActive(ImperatifPresentTenseNegationActiveConjugationPhrase $visitee) {
		return "\t\t\t" . '<td>' . concatenate_apostrophized ( 'ne', $visitee->conjugated_verb ) . ' pas</td>' . PHP_EOL;
	}
	function visitImperatifPresentNegationPassive(ImperatifPresentTenseNegationPassiveConjugationPhrase $visitee) {
		return "\t\t\t" . '<td>' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->conjugated_verb . '</td>' . PHP_EOL;
	}
	function visitImperatifPresentNegationPronominal(ImperatifPresentTenseNegationPronominalConjugationPhrase $visitee) {
		return "\t\t\t" . '<td>ne ' . concatenate_apostrophized ( $visitee->reflexive_pronoun, $visitee->conjugated_verb ) . ' pas</td>' . PHP_EOL;
	}
	function visitImperatifPasse(ImperatifPasseTenseConjugationPhrase $visitee) {
		return "\t\t\t" . '<td>' . $visitee->conjugated_auxiliaire_verb . '</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . '</td>' . PHP_EOL;
	}
	function visitImperatifPasseNegation(ImperatifPasseTenseNegationConjugationPhrase $visitee) {
		return "\t\t\t" . '<td>' . concatenate_apostrophized ( 'ne', $visitee->conjugated_auxiliaire_verb ) . ' pas</td>' . PHP_EOL . "\t\t\t" . '<td>' . $visitee->participe_passe . '</td>' . PHP_EOL;
	}
	function visitNotExisting(NoConjugationPhrase $visitee) {
		return "\t\t\t" . '<td> - </td>' . PHP_EOL;
	}
	function visitNotExistingwithFiveTDs(NoConjugationwithFiveTDsPhrase $visitee) {
		return "\t\t\t" . '<td></td>' . PHP_EOL . "\t\t\t" . '<td> - </td>' . PHP_EOL . "\t\t\t" . '<td></td>' . PHP_EOL . "\t\t\t" . '<td></td>' . PHP_EOL;
	}
}
function colspan_number($mood, $tense, $voice, $sentencetype) {
	if (isComposite ( $mood, $tense )) {
		$colspan = 4;
		if ($voice->getValue () === Voice::Passive) {
			$colspan = 5;
		}
		if ($mood->getValue () === Mood::Imperatif && $voice->getValue () === Voice::Active) {
			$colspan = 3;
		}
		if ($sentencetype->getValue () === SentenceType::InterrogativeSentence && $mood->getValue () === Mood::Imperatif && $voice->getValue () === Voice::Active) {
			$colspan = 2;
		}
		if ($mood->getValue () === Mood::Imperatif && ($voice->getValue () === Voice::Passive || $voice->getValue () === Voice::Pronominal)) {
			$colspan = 2;
		}
		if ($sentencetype->getValue () === SentenceType::InterrogativeSentence && $mood->getValue () === Mood::Subjonctif) {
			$colspan = 2;
		}
	} else {
		$colspan = 3;
		if ($voice->getValue () === Voice::Passive) {
			$colspan = 4;
		}
		if ($mood->getValue () === Mood::Imperatif && ($voice->getValue () === Voice::Active || $voice->getValue () === Voice::Pronominal)) {
			$colspan = 2;
		}
		if ($mood->getValue () === Mood::Imperatif && $voice->getValue () === Voice::Passive) {
			$colspan = 3;
		}
		if ($sentencetype->getValue () === SentenceType::InterrogativeSentence && $mood->getValue () === Mood::Imperatif && $voice->getValue () === Voice::Passive) {
			$colspan = 2;
		}
		if ($sentencetype->getValue () === SentenceType::InterrogativeSentence && $mood->getValue () === Mood::Subjonctif) {
			$colspan = 2;
		}
	}
	return $colspan;
}
function print_tenses(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Gender $gender, Voice $voice, SentenceType $sentencetype, Mood $mood, $tenses) {
	$th_of_tense = [ 
			Tense::Present => 'Présent',
			Tense::Imparfait => 'Imparfait',
			Tense::Passe => ($mood->getValue () == Mood::Indicatif ? 'Passé simple' : 'Passé'),
			Tense::Futur => 'Futur simple (Futur I)',
			Tense::Passe_compose => 'Passé composé',
			Tense::Plus_que_parfait => 'Plus-que-parfait',
			Tense::Passe_anterieur => 'Passé antérieur',
			Tense::Futur_anterieur => 'Futur antérieur (Futur II)',
			Tense::Futur_compose => 'Futur composé (Futur proche)',
			Tense::Passe_recent => 'Passé récent (Passé proche)',
			Tense::Premiere_Forme => 'Passé première forme',
			Tense::Deuxieme_Forme => 'Passé deuxième forme' 
	];
	foreach ( $tenses [$mood->getValue ()] as $tense ) {
		echo "\t\t" . '<tr class="border">' . PHP_EOL;
		echo "\t\t\t" . '<th colspan="' . colspan_number ( $mood, new Tense ( $tense ), $voice, $sentencetype ) . '">' . $th_of_tense [$tense] . '</th>' . PHP_EOL;
		echo "\t\t" . '</tr>' . PHP_EOL;
		print_persons ( $infinitiveVerb, $auxiliaire, $gender, $voice, new SentenceType ( $sentencetype ), new Tense ( $tense ), new Mood ( $mood ) );
	}
}
function print_simple_tenses(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Gender $gender, Voice $voice, SentenceType $sentencetype, Mood $mood) {
	global $verbes_impersonnels;
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
	if (in_array ( $infinitiveVerb, $verbes_impersonnels ))
		unset ( $tenses [Mood::Imperatif] );
	
	print_tenses ( $infinitiveVerb, $auxiliaire, $gender, $voice, $sentencetype, $mood, $tenses );
}
function print_composite_tenses(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Gender $gender, Voice $voice, SentenceType $sentencetype, Mood $mood) {
	global $verbes_impersonnels;
	$tenses = [ 
			Mood::Indicatif => [ 
					Tense::Passe_compose,
					Tense::Plus_que_parfait,
					Tense::Passe_anterieur,
					Tense::Futur_anterieur,
					Tense::Futur_compose,
					Tense::Passe_recent 
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
	if (in_array ( $infinitiveVerb, $verbes_impersonnels ))
		unset ( $tenses [Mood::Imperatif] );
	
	print_tenses ( $infinitiveVerb, $auxiliaire, $gender, $voice, $sentencetype, $mood, $tenses );
}
function print_modes(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Gender $gender, Voice $voice, SentenceType $sentencetype) {
	global $css_class, $category;
	$tenses = [ 
			Tense::Present,
			Tense::Passe 
	];
	$modes = [ 
			Mode::Infinitif => 'Infinitif',
			Mode::Participe => 'Participe',
			Mode::Gerondif => 'Gérondif' 
	];
	echo "\t\t" . '<tr>' . PHP_EOL;
	echo "\t\t\t" . '<th class="titel_new ' . $css_class . '">Mode</th>' . PHP_EOL;
	echo "\t\t\t" . '<th class="titel_new ' . $css_class . '">Présent</th>' . PHP_EOL;
	echo "\t\t\t" . '<th class="titel_new ' . $css_class . '">Passé</th>' . PHP_EOL;
	echo "\t\t" . '</tr>' . PHP_EOL;
	foreach ( $modes as $mode => $mode_name ) {
		echo "\t\t" . '<tr>' . PHP_EOL;
		echo "\t\t\t" . '<td class="text-center"><b>' . $mode_name . '</b></td>' . PHP_EOL;
		foreach ( $tenses as $tense ) {
			$output_modes = modes_impersonnels ( $infinitiveVerb, $auxiliaire, new Mode ( $mode ), new Tense ( $tense ), new Gender ( $gender ), new Voice ( $voice ), new SentenceType ( $sentencetype ) );
			echo "\t\t\t" . '<td><span data-text="' . $output_modes . '" data-lang="fr" class="trigger_play"></span>' . $output_modes . '</td>' . PHP_EOL;
		}
		echo "\t\t" . '</tr>' . PHP_EOL;
	}
}
function print_conjugations_of_verb(InfinitiveVerb $infinitiveVerb, Auxiliaire $auxiliaire, Gender $gender, Voice $voice, SentenceType $sentencetype) {
	global $css_class, $category, $verbes_impersonnels;
	$moods = [ 
			Mood::Indicatif,
			Mood::Subjonctif,
			Mood::Conditionnel,
			Mood::Imperatif 
	];
	$h2_of_mood = [ 
			Mood::Indicatif => 'Indicatif',
			Mood::Subjonctif => 'Subjonctif',
			Mood::Conditionnel => 'Conditionnel',
			Mood::Imperatif => 'Imperatif' 
	];
	
	if (in_array ( $infinitiveVerb, $verbes_impersonnels ))
		unset ( $moods [Mood::Imperatif], $h2_of_mood [Mood::Imperatif] );
	
	foreach ( $moods as $mood ) {
		echo '<h2 class="home"><a id="' . strtolower ( $h2_of_mood [$mood] ) . $category . '"></a>' . $h2_of_mood [$mood] . '</h2>' . PHP_EOL;
		echo "\t" . '<hr class="linie " />' . PHP_EOL;
		echo "\t" . '<table class="tab_new ' . $css_class . '">' . PHP_EOL;
		print_simple_tenses ( $infinitiveVerb, $auxiliaire, $gender, $voice, $sentencetype, new Mood ( $mood ) );
		echo "\t" . '</table>' . PHP_EOL . PHP_EOL;
		echo "\t" . '<table class="tab_new ' . $css_class . '">' . PHP_EOL;
		print_composite_tenses ( $infinitiveVerb, $auxiliaire, $gender, $voice, $sentencetype, new Mood ( $mood ) );
		echo "\t" . '</table>' . PHP_EOL . PHP_EOL;
	}
	echo '<h2 class="home"><a id="modes-impersonnels' . $category . '"></a>Modes impersonnels</h2>' . PHP_EOL;
	echo "\t" . '<hr class="linie" />' . PHP_EOL;
	echo "\t" . '<table class="tab_new ' . $css_class . '">' . PHP_EOL;
	print_modes ( $infinitiveVerb, $auxiliaire, $gender, $voice, $sentencetype );
	echo "\t" . '</table>' . PHP_EOL;
}
?>
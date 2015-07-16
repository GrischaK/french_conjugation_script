<?
require_once 'conjugate.php';

function print_tenses($verb) {
	$tenses = array(Tense::Present,Tense::Imparfait,Tense::Passe,Tense::Futur, Tense::Futur_compose,Tense::Plus_que_parfait,
			Tense::Passe_anterieur, Tense::Futur_anterieur,Tense::Premiere_Forme,Tense::Deuxieme_Forme);
	foreach ( $tenses as $tense ) {
		print_tenses ( $verb, $tense ); // other name than print_tenses???
	}	
}

function print_conjugations_of_verb($verb) {
   $moods = array(Mood::Indicatif,Mood::Subjonctif,Mood::Conditionnel,Mood::Imperatif,Mood::Modes_impersonnels);
	foreach ( $moods as $mood ) {
		print_tenses ( $verb, $mood );
	}
}
?>

<?php
function word_stem_length(InfinitiveVerb $infinitiveVerb, $endingLength) {
	return substr ( $infinitiveVerb->getInfinitiveVerb (), 0, - $endingLength);
}

function word_stem_regular(InfinitiveVerb $infinitiveVerb) {
	return word_stem_length($infinitiveVerb, 2);
}

function word_stem_ending_oir(InfinitiveVerb $infinitiveVerb) {
	return word_stem_length($infinitiveVerb, 3);
}

function word_stem_mouvoir_exception(InfinitiveVerb $infinitiveVerb) {
	return word_stem_length($infinitiveVerb, 6);
}

function word_stem(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood) {
	$exceptionmodel = finding_exception_model ( $infinitiveVerb );
	$word_stem = word_stem_regular ( $infinitiveVerb );
	if ($exceptionmodel->getValue () === ExceptionModel::MOUVOIR ) {
		$word_stem = word_stem_ending_oir ( $infinitiveVerb );
	}
	if ($exceptionmodel->getValue () === ExceptionModel::MOUVOIR && (($mood->getValue () === Mood::Indicatif && $tense->getValue () === Tense::Present 
			&& in_array ( $person->getValue (), array (
			Person::FirstPersonSingular,
			Person::SecondPersonSingular,
			Person::ThirdPersonSingular,
			Person::ThirdPersonPlural
	) ) || $tense->getValue () === Tense::Passe) || ($mood->getValue () === Mood::Subjonctif && $tense->getValue () === Tense::Present && in_array ( $person->getValue (), array (
			Person::FirstPersonSingular,
			Person::SecondPersonSingular,
			Person::ThirdPersonSingular,
			Person::ThirdPersonPlural
	) ) ) 
	|| (($mood->getValue () === Mood::Subjonctif && $tense->getValue () === Tense::Imparfait )) 
	|| (($mood->getValue () === Mood::Imperatif && $tense->getValue () === Tense::Present && $person->getValue () === Person::FirstPersonSingular)))) {
		$word_stem = word_stem_mouvoir_exception ( $infinitiveVerb );
	}
	return $word_stem;
}
function participe_word_stem(InfinitiveVerb $infinitiveVerb) {
	$exceptionmodel = finding_exception_model($infinitiveVerb);
	$word_stem = word_stem_regular($infinitiveVerb);
	if ($exceptionmodel->getValue () === ExceptionModel::MOUVOIR) {
		$word_stem = word_stem_mouvoir_exception($infinitiveVerb);
	}
	return $word_stem;
}
?>
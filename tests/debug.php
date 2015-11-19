<?php
require_once '../conjugate.php';
function testConjugatePhrase($expectedResult, $infinitiveVerb, $tense, $person, $mood) {
	conjugation_phrase ( $infinitiveVerb, new Person ( $person ), new Tense ( $tense ), new Mood ( $mood ) );
}

testConjugatePhrase ( 'ayez aimé', 'aimer', 'Passe', 'SecondPersonPlural', 'Imperatif' );
?>
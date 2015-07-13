<?php
require_once '../conjugate.php';
function testConjugatePhrase($expectedResult, $verb, $tense, $person, $mood) {
	conjugation_phrase ( $verb, new Person ( $person ), new Tense ( $tense ), new Mood ( $mood ) );
}

testConjugatePhrase ( 'ayez aimé', 'aimer', 'Passe', 'SecondPersonPlural', 'Imperatif' );
?>
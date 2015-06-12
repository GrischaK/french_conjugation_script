<?php
require 'conjugate.php';

class ConjugateFrenchVerbTest extends PHPUnit_Framework_TestCase {

public function testRegularVerb() { 
$this->assertEquals("J'aime", conjugate("aimer", Tense::Present, Person::FirstPersonSingular, Mood::Indicative) ); 
}

public function testRegularVerb2() { 
$this->assertEquals("Tu aimes", conjugate("aimer", Tense::Present, Person::SecondPersonSingular, Mood::Indicative) ); 
}

public function testRegularVerb3() { 
$this->assertEquals("Il aime", conjugate("aimer", Tense::Present, Person::ThirdPersonSingular, Mood::Indicative) ); 
}

}

?>
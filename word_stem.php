<?php
function word_stem_length(InfinitiveVerb $infinitiveVerb, $endingLength)
{
    return substr($infinitiveVerb->getInfinitiveVerb(), 0, -$endingLength);
}
function word_stem_regular(InfinitiveVerb $infinitiveVerb)
{
    return word_stem_length($infinitiveVerb, 2);
}
function word_stem_ending_oir(InfinitiveVerb $infinitiveVerb)
{
    return word_stem_length($infinitiveVerb, 3);
}
function word_stem_oir_first_letter(InfinitiveVerb $infinitiveVerb)
{
	$word_stem      = word_stem_regular($infinitiveVerb);
	$word_stem      = substr($word_stem, 0, 1);
	return $word_stem;
}

function replace_akut($str, $replace, $replaceWith)
{
	$exp = explode($replace, $str);
	 
	$i = 1;
	$cnt = count($exp);
	$format_str = '';
	foreach($exp as $v)
	{
		if($i == 1)
		{
			$format_str = $v;
		}
		else if($i == $cnt)
		{
			$format_str .= $replaceWith . $v;
		}
		else
		{
			$format_str .= $replace . $v;
		}
		$i++;
	}
	return $format_str;
}


function word_stem(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood)
{
    $exceptionmodel = finding_exception_model($infinitiveVerb);
    $word_stem      = word_stem_regular($infinitiveVerb);
    if (in_array($exceptionmodel->getValue(), array(
        ExceptionModel::Eler_Ele,
        ExceptionModel::Eter_Ete
    )) && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    )) || $tense->getValue() === Tense::Futur) || ($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ))) || ($mood->getValue() === Mood::Conditionnel && $tense->getValue() === Tense::Present) || ($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::FirstPersonSingular))) {
    	$word_stem = substr_replace($word_stem, 'è', -2, 1);
    }
    if (in_array($exceptionmodel->getValue(), array(
        ExceptionModel::Eler_Elle,
        ExceptionModel::Eter_Ette
    )) && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    )) || $tense->getValue() === Tense::Futur) || ($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ))) || ($mood->getValue() === Mood::Conditionnel && $tense->getValue() === Tense::Present) || ($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::FirstPersonSingular))) {
        if (substr(word_stem_regular($infinitiveVerb), -1) == 'l') {
        $word_stem = $word_stem . 'l';
    }
   		 if (substr(word_stem_regular($infinitiveVerb), -1) == 't') {
        $word_stem = $word_stem . 't';
    	}
    }
    
    if (in_array($exceptionmodel->getValue(), array(
    		ExceptionModel::CER,
    		ExceptionModel::GER
    )) && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::FirstPersonPlural || $tense->getValue() === Tense::Imparfait && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    )) || $tense->getValue() === Tense::Passe && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::FirstPersonPlural,
        Person::SecondPersonPlural
    ))) || ($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Imparfait) || ($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::FirstPersonPlural))) {
    	if (substr(word_stem_regular($infinitiveVerb), -1) == 'c') {
    		$word_stem = substr_replace($word_stem,'ç',-1);
    	}
    	if (substr(word_stem_regular($infinitiveVerb), -1) == 'g') {
    		$word_stem = $word_stem . 'e';
    	}
    }    
    
    
    if ($exceptionmodel->getValue() === ExceptionModel::ENVOYER && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Futur) ||
    		($mood->getValue() === Mood::Conditionnel && $tense->getValue() === Tense::Present) )) {
    	$word_stem = substr_replace($word_stem, 'enver', -5, 5);
    }
    
    if ($exceptionmodel->getValue() === ExceptionModel::ENVOYER && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
    		Person::FirstPersonSingular,
    		Person::SecondPersonSingular,
    		Person::ThirdPersonSingular,
    		Person::ThirdPersonPlural
    ))) || ($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
    		Person::FirstPersonSingular,
    		Person::SecondPersonSingular,
    		Person::ThirdPersonSingular,
    		Person::ThirdPersonPlural
    ))) || (($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::FirstPersonSingular)))) {
    	$word_stem = substr_replace($word_stem, 'i', -1);
    }

    if ($exceptionmodel->getValue() === ExceptionModel::E_Akut_Er && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    )) || $tense->getValue() === Tense::Futur) || ($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ))) || ($mood->getValue() === Mood::Conditionnel && $tense->getValue() === Tense::Present) || ($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::FirstPersonSingular))) {
    	$word_stem = replace_akut($word_stem, 'é', 'è');
    }
    if ($exceptionmodel->getValue() === ExceptionModel::E_Er && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    )) || $tense->getValue() === Tense::Futur)
	   || ($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ))) || (($mood->getValue() === Mood::Conditionnel && $tense->getValue() === Tense::Present)) || (($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::FirstPersonSingular)))) {
    	$word_stem = replace_akut($word_stem, 'e', 'è');
    }   
     if (in_array($exceptionmodel->getValue(), array(
    		ExceptionModel::DEVOIR,
    		ExceptionModel::MOUVOIR,
    		ExceptionModel::POUVOIR,
    		ExceptionModel::SAVOIR
    )) ) {   
        $word_stem = word_stem_ending_oir($infinitiveVerb);
    }
    if (in_array($exceptionmodel->getValue(), array(
    		ExceptionModel::DEVOIR,
    		ExceptionModel::MOUVOIR
    )) && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    )) || $tense->getValue() === Tense::Passe) || ($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ))) || (($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Imparfait)) || (($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::FirstPersonSingular)))) {
    	if ($exceptionmodel->getValue() === ExceptionModel::DEVOIR) {
    		$word_stem = word_stem_oir_first_letter($infinitiveVerb);
    	}
    	if ($exceptionmodel->getValue() === ExceptionModel::MOUVOIR) {
    		$word_stem = word_stem_oir_first_letter($infinitiveVerb);
    	}

    }
   if ($exceptionmodel->getValue() === ExceptionModel::POUVOIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
		Person::ThirdPersonPlural,
    )) || $tense->getValue() === Tense::Passe) || (($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Imparfait)))) {
    		$word_stem = word_stem_oir_first_letter($infinitiveVerb);
    }   	
   if ($exceptionmodel->getValue() === ExceptionModel::POUVOIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Futur)
	    || (($mood->getValue() === Mood::Conditionnel && $tense->getValue() === Tense::Present)) )) {
			$word_stem = word_stem_ending_oir($infinitiveVerb);
			$word_stem = substr_replace($word_stem,'r',-1);
    }  
   if ($exceptionmodel->getValue() === ExceptionModel::POUVOIR && (($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present))) {
			$word_stem = word_stem_oir_first_letter($infinitiveVerb).'uiss';
			// unset Imperatif Present later
    } 
   if ($exceptionmodel->getValue() === ExceptionModel::SAVOIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), array(
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
    )) || $tense->getValue() === Tense::Passe) || (($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Imparfait)))) {
    		$word_stem = word_stem_oir_first_letter($infinitiveVerb);
    }   	
   if ($exceptionmodel->getValue() === ExceptionModel::SAVOIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Futur)
	    || (($mood->getValue() === Mood::Conditionnel && $tense->getValue() === Tense::Present)) )) {
			$word_stem = word_stem_ending_oir($infinitiveVerb);
			$word_stem = substr_replace($word_stem,'u',-1);
    }   
   if ($exceptionmodel->getValue() === ExceptionModel::SAVOIR && (($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present)
	    || (($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present)) )) {
			$word_stem = word_stem_ending_oir($infinitiveVerb);
			$word_stem = substr_replace($word_stem,'ch',-1);
    }   		
    return $word_stem;
}
function participe_present_word_stem(InfinitiveVerb $infinitiveVerb)
{
    $exceptionmodel = finding_exception_model($infinitiveVerb);	//without this line Undefined variable
    $word_stem      = word_stem_regular($infinitiveVerb);	//without this line Undefined variable
    if (in_array($exceptionmodel->getValue(), array(
    		ExceptionModel::CER,
    		ExceptionModel::GER
    ))) {
       if (substr(word_stem_regular($infinitiveVerb), -1) == 'c') {
    		$word_stem = substr_replace($word_stem,'ç',-1);
    	}
    	if (substr(word_stem_regular($infinitiveVerb), -1) == 'g') {
    		$word_stem = $word_stem . 'e';
    	}
    }	
    if (in_array($exceptionmodel->getValue(), array(ExceptionModel::DEVOIR, ExceptionModel::MOUVOIR, ExceptionModel::POUVOIR, ExceptionModel::SAVOIR))) 
		{
			$word_stem = word_stem_ending_oir($infinitiveVerb);
		}	
    return $word_stem;
}
function participe_passe_word_stem(InfinitiveVerb $infinitiveVerb)
{
    $exceptionmodel = finding_exception_model($infinitiveVerb);	//without this line Undefined variable
    $word_stem      = word_stem_regular($infinitiveVerb);	//without this line Undefined variable
if (in_array($exceptionmodel->getValue(), array(ExceptionModel::DEVOIR, ExceptionModel::MOUVOIR, ExceptionModel::POUVOIR, ExceptionModel::SAVOIR))) 
		{
			$word_stem = word_stem_oir_first_letter($infinitiveVerb);
		}
    return $word_stem;
}
?>
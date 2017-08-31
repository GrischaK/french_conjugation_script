<?php
function word_stem_length(InfinitiveVerb $infinitiveVerb, $endingLength) {
    return mb_substr($infinitiveVerb->getInfinitiveVerb(), 0, - $endingLength);
}
function word_stem_only_first_letter(InfinitiveVerb $infinitiveVerb) {
    $word_stem = word_stem_length($infinitiveVerb, 2);
    $word_stem = mb_substr($word_stem, 0, 1);
    return $word_stem;
}
function mb_substr_replace($string, $replacement, $start, $length=NULL) { 
    if (is_array($string)) {
        $num = count($string);
        // $replacement
        $replacement = is_array($replacement) ? array_slice($replacement, 0, $num) : array_pad(array($replacement), $num, $replacement);
        // $start
        if (is_array($start)) {
            $start = array_slice($start, 0, $num);
            foreach ($start as $key => $value)
                $start[$key] = is_int($value) ? $value : 0;
        }
        else {
            $start = array_pad(array($start), $num, $start);
        }
        // $length
        if (!isset($length)) {
            $length = array_fill(0, $num, 0);
        }
        elseif (is_array($length)) {
            $length = array_slice($length, 0, $num);
            foreach ($length as $key => $value)
                $length[$key] = isset($value) ? (is_int($value) ? $value : $num) : 0;
        }
        else {
            $length = array_pad(array($length), $num, $length);
        }
        // Recursive call
        return array_map(__FUNCTION__, $string, $replacement, $start, $length);
    }
    preg_match_all('/./us', (string)$string, $smatches);
    preg_match_all('/./us', (string)$replacement, $rmatches);
    if ($length === NULL) $length = mb_strlen($string);
    array_splice($smatches[0], $start, $length, $rmatches[0]);
    return join($smatches[0]);
}
function replace_akut($str, $replace, $replaceWith) {
    $exp = explode($replace, $str);
    
    $i = 1;
    $cnt = count($exp);
    $format_str = '';
    foreach ($exp as $v) {
        if ($i == 1) {
            $format_str = $v;
        } else 
            if ($i == $cnt) {
                $format_str .= $replaceWith . $v;
            } else {
                $format_str .= $replace . $v;
            }
        $i ++;
    }
    return $format_str;
}

function word_stem(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood) {
    $exceptionmodel = finding_exception_model($infinitiveVerb);
    $word_stem = word_stem_length($infinitiveVerb, 2);
    
    // Precompute condition parts start
    $personVal = $person->getValue();
    $personIs_2S = $personVal == Person::SecondPersonSingular;
    $personIs_3S = $personVal == Person::ThirdPersonSingular;
    $personIs_1P = $personVal == Person::FirstPersonPlural;
    $personIs_3P = $personVal == Person::ThirdPersonPlural;
    $personIs_1S_2S_3S = in_array($personVal, [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular
    ]);
    $personIs_1P_2P = in_array($personVal, [
        Person::FirstPersonPlural,
        Person::SecondPersonPlural
    ]);
    
    $personIs_1P_2P_3P = in_array($personVal, [
        Person::FirstPersonPlural,
        Person::SecondPersonPlural,
        Person::ThirdPersonPlural
    ]);
    $personIs_1S_2S_3S_3P = in_array($personVal, [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ]);
    $personIs_1S_2S_3S_1P_2P = in_array($personVal, [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::FirstPersonPlural,
        Person::SecondPersonPlural
    ]);
    $personIs_1S_2S_1P_2P_3P = in_array($personVal, [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::FirstPersonPlural,
        Person::SecondPersonPlural,
        Person::ThirdPersonPlural
    ]);
    
    // Precompute condition parts end
    if ($exceptionmodel->isYER_IE() && (($mood == Indicatif or $mood == Subjonctif)&& ($tense == Present && in_array ( $person, [FirstPersonSingular,SecondPersonSingular,ThirdPersonSingular,ThirdPersonPlural]) || $tense == Futur) || $mood == Conditionnel && $tense == Present || $mood == Imperatif && $tense == Present && $person == SecondPersonSingular))
        $word_stem = substr_replace ( $word_stem, 'i', - 1, 1 );	
    if ($exceptionmodel->isFUIR() || $exceptionmodel->isCHOIR2())
        $word_stem = word_stem_length($infinitiveVerb, 1);    	
    if ($exceptionmodel->isCHOIR2() && ($mood->isIndicatif()) && $tense->isImparfait()) 
        $word_stem = word_stem_length($infinitiveVerb, 2). '<span class="unregel">y</span>'; 
    if ($exceptionmodel->isCHOIR2() && ($mood->isSubjonctif()) && $tense->isImparfait()) 
        $word_stem = word_stem_length($infinitiveVerb, 3); 
			
    if ($exceptionmodel->isAVOIR_IRR() || $exceptionmodel->isCEVOIR() || $exceptionmodel->isCHOIR() || $exceptionmodel->isDEVOIR() || $exceptionmodel->isMOUVOIR() || $exceptionmodel->isPOUVOIR() || $exceptionmodel->isSAVOIR() || $exceptionmodel->isRAMENTEVOIR() || $exceptionmodel->isVALOIR() || $exceptionmodel->isPLEUVOIR() || $exceptionmodel->isFALLOIR() || $exceptionmodel->isVOULOIR())
        $word_stem = word_stem_length($infinitiveVerb, 3);
    if ($exceptionmodel->isETRE_IRR()) 
        $word_stem = word_stem_length($infinitiveVerb, 4);
    if (($exceptionmodel->isEler_Ele() || $exceptionmodel->isEter_Ete()) && (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S_3P) || $tense->isFutur() || ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P) || ($mood->isConditionnel() && $tense->isPresent()) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
        $word_stem = substr_replace($word_stem, '<span class="unregel">è</span>', - 2, 1);
    if (($exceptionmodel->isEler_Elle() || $exceptionmodel->isEter_Ette()) && (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S_3P) || $tense->isFutur() || ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P) || ($mood->isConditionnel() && $tense->isPresent()) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S))) {
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'l')
            $word_stem = $word_stem . '<span class="unregel">l</span>';
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 't')
            $word_stem = $word_stem . '<span class="unregel">t</span>';
    }
    if (($exceptionmodel->isCER() || $exceptionmodel->isGER() || $exceptionmodel->isE_Akut_CER() || $exceptionmodel->isE_Akut_GER()) && (($mood->isIndicatif() && $tense->isPresent() && $personIs_1P) || ($mood->isIndicatif() && $tense->isImparfait() && $personIs_1S_2S_3S_3P) || ($mood->isIndicatif() && $tense->isPasse() && $personIs_1S_2S_3S_1P_2P) || ($mood->isSubjonctif() && $tense->isImparfait()) || ($mood->isConditionnel() && $tense->isPresent()) || ($mood->isImperatif() && $tense->isPresent() && $personIs_1P))) {
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'c')
            $word_stem = substr_replace($word_stem, '<span class="unregel">ç</span>', - 1);
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'g')
            $word_stem = $word_stem . '<span class="unregel">e</span>';
    }
    if (($exceptionmodel->isE_Akut_ER() || $exceptionmodel->isE_Akut_CER() || $exceptionmodel->isE_Akut_GER() || $exceptionmodel->isE_Akut_YER()) && ((($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) || 
$tense->isFutur() || ($mood->isConditionnel() && $tense->isPresent()) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
        $word_stem = replace_akut($word_stem, 'é', '<span class="unregel">è</span>');
    if ($exceptionmodel->isE_Er() && ((($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) || 
$tense->isFutur() || ($mood->isConditionnel() && $tense->isPresent()) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
        $word_stem = replace_akut($word_stem, 'e', '<span class="unregel">è</span>');
    if ($exceptionmodel->isMOURIR() && ((($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) || 
($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
        $word_stem = word_stem_length($infinitiveVerb, 5) . '<span class="unregel">eur</span>';
    if ($exceptionmodel->isBOUILLIR() && (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S_3P) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
        $word_stem = word_stem_length($infinitiveVerb, 5);
    if ($exceptionmodel->isQUERIR() && ((($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) || 
($mood->isSubjonctif() && $tense->isImparfait()) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
        $word_stem = word_stem_length($infinitiveVerb, 4);
    if ($exceptionmodel->isQUERIR() && (($mood->isIndicatif() && $tense->isFutur()) || ($mood->isConditionnel() && $tense->isPresent())))
        $word_stem = word_stem_length($infinitiveVerb, 4) . '<span class="unregel">er</span>';
    if ($exceptionmodel->isENVOYER() && (($mood->isIndicatif() && $tense->isFutur()) || ($mood->isConditionnel() && $tense->isPresent())))
        $word_stem = substr_replace($word_stem, '<span class="unregel">enver</span>', - 5, 5);
    if ($exceptionmodel->isENVOYER() && (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S_3P) || ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
        $word_stem = substr_replace($word_stem, 'i', - 1);
    if ($exceptionmodel->isVALOIR() && (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S) || $tense->isFutur() || ($mood->isConditionnel() && $tense->isPresent()) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
        $word_stem = word_stem_length($infinitiveVerb, 4) . '<span class="unregel">u</span>';  
    if ($exceptionmodel->isVALOIR() && ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P))
        $word_stem = word_stem_length($infinitiveVerb, 4) . '<span class="unregel">ill</span>';
    if ($exceptionmodel->isCEVOIR() && (($mood->isIndicatif() && $tense->isPasse()) || ($mood->isSubjonctif() && $tense->isImparfait())))
        $word_stem = word_stem_length($infinitiveVerb, 6) . '<span class="unregel">ç</span>';
    if ($exceptionmodel->isDEVOIR() && (($mood->isIndicatif() && $tense->isPasse()) || ($mood->isSubjonctif() && $tense->isImparfait())))
        $word_stem = word_stem_length($infinitiveVerb, 5);
    if ((($mood->isIndicatif()) && $tense->isPresent() && $personIs_1S_2S_3S) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)) {
        if ($exceptionmodel->isCEVOIR())
            $word_stem = substr_replace($word_stem, '<span class="unregel">çoi</span>', - 3);
        if ($exceptionmodel->isCHOIR())
            $word_stem = substr_replace($word_stem, '<span class="unregel">oi</span>', 2);
        if ($exceptionmodel->isDEVOIR() || $exceptionmodel->isSEOIR())
            $word_stem = substr_replace($word_stem, '<span class="unregel">oi</span>', - 2);
    }
    if (($mood->isIndicatif() && $tense->isPresent() && $personIs_3P) || ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P)) {
        if ($exceptionmodel->isCEVOIR())
            $word_stem = substr_replace($word_stem, '<span class="unregel">çoiv</span>', - 3);
        if ($exceptionmodel->isCHOIR())
            $word_stem = substr_replace($word_stem, '<span class="unregel">oi</span>', 2);
        if ($exceptionmodel->isDEVOIR())
            $word_stem = substr_replace($word_stem, '<span class="unregel">oiv</span>', - 2);
    }
    if ((($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1P_2P)) {
        if ($exceptionmodel->isCHOIR())
            $word_stem = substr_replace($word_stem, '<span class="unregel">oy</span>', 2);
        if ($exceptionmodel->isSEOIR())
            $word_stem = substr_replace($word_stem, '<span class="unregel">oy</span>', 3);
    }
    if ($exceptionmodel->isPLEUVOIR()) {
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S))
            $word_stem = word_stem_length($infinitiveVerb, 4);
        if (($mood->isIndicatif() && $tense->isPasse()) || // only 3S is not defectif
($mood->isSubjonctif() && $tense->isImparfait())) // only 3S is not defectif
            $word_stem = word_stem_length($infinitiveVerb, 6);
    }			
    if (($exceptionmodel->isCHOIR()) && ((($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1P_2P)))
        $word_stem = substr_replace($word_stem, '<span class="unregel">oy</span>', 2);   
    if ($exceptionmodel->isSEOIR()) {
        if (($mood->isIndicatif() || $mood->isSubjonctif() || $mood->isImperatif()) && $tense->isPresent() && $personIs_1P_2P)
            $word_stem = substr_replace($word_stem, '<span class="unregel">oy</span>', 3);
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_3P) || $tense->isFutur() || ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P) || ($mood->isConditionnel() && $tense->isPresent()))
            $word_stem = substr_replace($word_stem, '<span class="unregel">oi</span>', 3);
        if (($mood->isIndicatif() && $tense->isImparfait()))
            $word_stem = substr_replace($word_stem, '<span class="unregel">oy</span>', 3);
        if (($mood->isIndicatif() && $tense->isPasse()) || ($mood->isSubjonctif() && $tense->isImparfait()))
            $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    $soir = ['assoir','rassoir','réassoir','s’assoir','sursoir']; // 5 Verben
    if ((in_array($infinitiveVerb, $soir))) {
        if (($mood->isIndicatif() && $tense->isPasse()) || ($mood->isSubjonctif() && $tense->isImparfait()))
            $word_stem = word_stem_length($infinitiveVerb, 3);
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S) || $mood->isImperatif() && $tense->isPresent() && $personIs_2S)
            $word_stem = substr_replace($word_stem, '<span class="unregel">soi</span>', 2);
    }
    if (($exceptionmodel->isCHOIR()) && (($mood->isIndicatif() && $tense->isFutur()) || ($mood->isConditionnel() && $tense->isPresent())))
        $word_stem = word_stem_length($infinitiveVerb, 1);
    if ($exceptionmodel->isMOUVOIR() && ((($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) || $tense->isPasse() || ($mood->isSubjonctif() && $tense->isImparfait()) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
        $word_stem = word_stem_length($infinitiveVerb, 6);
    if (($exceptionmodel->isDORMIR() || $exceptionmodel->isTIR() || $exceptionmodel->isSERVIR()) && (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
        $word_stem = word_stem_length($infinitiveVerb, 3);
    if ($exceptionmodel->isPOUVOIR() && (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S_3P) || $tense->isPasse() || ($mood->isSubjonctif() && $tense->isImparfait())))
        $word_stem = word_stem_length($infinitiveVerb, 6);   
    if (($mood->isIndicatif() && $tense->isFutur()) || ($mood->isConditionnel() && $tense->isPresent())) {
        if ($exceptionmodel->isPOUVOIR())
            $word_stem = substr_replace($word_stem, '<span class="unregel">r</span>', - 1);
        if ($exceptionmodel->isSAVOIR())
            $word_stem = substr_replace($word_stem, '<span class="unregel">u</span>', - 1);
        if ($exceptionmodel->isVOULOIR())
            $word_stem = substr_replace($word_stem, '<span class="unregel">d</span>', - 1);
    }
    if ($exceptionmodel->isRAMENTEVOIR())
        if ( (($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) || $mood->isIndicatif() && $tense->isPasse() || $mood->isSubjonctif() && $tense->isImparfait()  || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S) ) 
            $word_stem = word_stem_length($infinitiveVerb, 5);		
    if ($exceptionmodel->isPOUVOIR() && ($mood->isSubjonctif() && $tense->isPresent()))
        $word_stem = word_stem_length($infinitiveVerb, 6) . '<span class="unregel">uiss</span>';
        // unset Imperatif Present later
    if ($exceptionmodel->isFAILLIR()) {
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S))
            $word_stem = word_stem_length($infinitiveVerb, 6);
        if (($mood->isSubjonctif() && $tense->isPresent() && $personIs_1P_2P_3P))
            $word_stem = $word_stem . '<span class="unregel">iss</span>';
    }
    if ($exceptionmodel->isFALLOIR()) {
        if ((($mood->isIndicatif() || ($mood->isSubjonctif())) && $tense->isPresent()))
            $word_stem = word_stem_length($infinitiveVerb, 5);
        if (($mood->isIndicatif() && $tense->isFutur()) || ($mood->isConditionnel() && $tense->isPresent())) {
            $word_stem = word_stem_length($infinitiveVerb, 5);
            $word_stem = $word_stem . '<span class="unregel">ud</span>';
        }
    }
    if ($exceptionmodel->isVOULOIR() && (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S_3P) || ($mood->isImperatif() && $tense->isPresent())))
        $word_stem = word_stem_length($infinitiveVerb, 6);
    if ($exceptionmodel->isVOULOIR() && ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P))
        $word_stem = word_stem_length($infinitiveVerb, 6) . '<span class="unregel">euill</span>';   
    if ($exceptionmodel->isSAVOIR() && (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S) || $tense->isPasse() || ($mood->isSubjonctif() && $tense->isImparfait())))
        $word_stem = word_stem_length($infinitiveVerb, 5);
    if ($exceptionmodel->isSAVOIR() && (($mood->isSubjonctif() && $tense->isPresent()) || ($mood->isImperatif() && $tense->isPresent()))) {
        $word_stem = word_stem_length($infinitiveVerb, 3);
        $word_stem = substr_replace($word_stem, '<span class="unregel">d</span>', - 1);
    }
    if ($exceptionmodel->isVOIR() && (($mood->isIndicatif() && $tense->isPasse()) || ($mood->isSubjonctif() && $tense->isImparfait())))
        $word_stem = word_stem_length($infinitiveVerb, 3);
    if ($exceptionmodel->isENIR() && (($mood->isIndicatif() && $tense->isPasse()) || ($mood->isSubjonctif() && $tense->isImparfait())))
        $word_stem = word_stem_length($infinitiveVerb, 4);
    if ($exceptionmodel->isENIR() && ((($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) || 
$tense->isFutur() || ($mood->isConditionnel() && $tense->isPresent()) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
        $word_stem = word_stem_length($infinitiveVerb, 4) . '<span class="unregel">ien</span>';
    if ($exceptionmodel->isALLER() && ((($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) || 
$tense->isFutur() || ($mood->isConditionnel() && $tense->isPresent()) || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
        $word_stem = word_stem_length($infinitiveVerb, 5);  
    if ($exceptionmodel->isAVOIR_IRR() && ((($mood->isIndicatif() || $mood->isSubjonctif() || $mood->isConditionnel() || $mood->isImperatif()) && $tense->isPresent()) || 
$tense->isPasse() || $tense->isFutur() || ($mood->isSubjonctif() && $tense->isImparfait()) || ($mood->isConditionnel() && $tense->isPresent())))
        $word_stem = word_stem_length($infinitiveVerb, 5);
    if (($exceptionmodel->isFUIR() || $exceptionmodel->isVOIR()) && ((($mood->isIndicatif() || $mood->isSubjonctif() || $mood->isImperatif()) && $tense->isPresent() && $personIs_1P_2P) 
|| ($mood->isIndicatif() && $tense->isImparfait())))
        $word_stem = word_stem_length($infinitiveVerb, 2) . '<span class="unregel">y</span>';
    if ($exceptionmodel->isVOIR() && (($mood->isIndicatif() && $tense->isFutur()) || ($mood->isConditionnel()))) {
        if (in_array($infinitiveVerb, ['pourvoir','repourvoir','dépourvoir','prévoir','reprévoir']))
            $word_stem = word_stem_length($infinitiveVerb, 3) . '<span class="unregel">oi</span>';
        else
            $word_stem = word_stem_length($infinitiveVerb, 3) . '<span class="unregel">er</span>';
    } 
    if ($exceptionmodel->isFAIRE()) {
         if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1P)
             || ($mood->isIndicatif() && $tense->isImparfait()) 
             || ($mood->isImperatif() && $tense->isPresent() && $personIs_1P))
            $word_stem = word_stem_length($infinitiveVerb, 2) . '<span class="unregel">s</span>';
         if (($mood->isIndicatif() && $tense->isPresent() && $personIs_3P)
             || (($mood->isIndicatif() && $tense->isPasse()))             
             || (($mood->isSubjonctif() && $tense->isImparfait())))
                $word_stem = word_stem_length($infinitiveVerb, 4);
         if (($mood->isIndicatif() && $tense->isFutur())
            || (($mood->isConditionnel() && $tense->isPresent())))
                $word_stem = word_stem_length($infinitiveVerb, 4) . '<span class="unregel">e</span>';
         if (($mood->isSubjonctif() && $tense->isPresent()))
                $word_stem = word_stem_length($infinitiveVerb, 3) . '<span class="unregel">ss</span>';
    }
    if ($exceptionmodel->isPLAIRE() || $exceptionmodel->isTAIRE()) {
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1P_2P_3P)
            || ($mood->isIndicatif() && $tense->isImparfait())
            || ($mood->isSubjonctif() && $tense->isPresent())
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_1P_2P))
                $word_stem = word_stem_length($infinitiveVerb, 2) . '<span class="unregel">s</span>';
            if (($mood->isIndicatif() && $tense->isPasse())
                || (($mood->isSubjonctif() && $tense->isImparfait())))
                    $word_stem = word_stem_length($infinitiveVerb, 4);         
    }   
    if ($exceptionmodel->isRAIRE()) {
        if ((($mood->isIndicatif() || $mood->isSubjonctif() || $mood->isImperatif()) && $tense->isPresent() && $personIs_1P_2P)
            || ($mood->isIndicatif() && $tense->isPasse()) 
            || (($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isImparfait()))
                $word_stem = word_stem_length($infinitiveVerb, 3) . '<span class="unregel">y</span>';
    }  
    if ($exceptionmodel->isVAINCRE()) {
        if ((($mood->isIndicatif() && $tense->isPresent() && $personIs_1P_2P_3P)
            || ($mood->isIndicatif() && $tense->isPasse())
            || ($mood->isSubjonctif() && $tense->isPresent())
            || (($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isImparfait())
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_1P_2P)))
                $word_stem = substr_replace($word_stem, '<span class="unregel">qu</span>', -1);
    }  
    if ($exceptionmodel->isPRENDRE()) {
        if ((($mood->isIndicatif() || $mood->isSubjonctif() || $mood->isImperatif()) && $tense->isPresent() && $personIs_1P_2P)
            || ($mood->isIndicatif() && $tense->isImparfait()))
                $word_stem = word_stem_length($infinitiveVerb, 3);
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_3P)
            || ($mood->isIndicatif() && $tense->isPasse())
            || ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P))
                $word_stem = word_stem_length($infinitiveVerb, 3).'<span class="unregel">n</span>';           
        if (($mood->isIndicatif() && $tense->isPasse())
                || ($mood->isSubjonctif() && $tense->isImparfait()))
                $word_stem = word_stem_length($infinitiveVerb, 5);
    }    
    if ($exceptionmodel->isINDRE() || $exceptionmodel->isOINDRE()) {
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1P_2P_3P)
            || ($mood->isIndicatif() && ($tense->isImparfait() || $tense->isPasse()))
            || ($mood->isSubjonctif() && ($tense->isPresent() || $tense->isImparfait()))          
            || ($mood->isImperatif() && $tense->isPresent()) && $personIs_1P_2P)
                $word_stem = substr_replace($word_stem, '<span class="unregel">gn</span>', - 2);
            if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S)          
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S))
               $word_stem = word_stem_length($infinitiveVerb, 3);  
    }
    if ($exceptionmodel->isCOUDRE()) {
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1P_2P_3P)
            || ($mood->isIndicatif() && ($tense->isImparfait() || $tense->isPasse()))
            || ($mood->isSubjonctif() && ($tense->isPresent() || $tense->isImparfait()))
            || ($mood->isImperatif() && $tense->isPresent()) && $personIs_1P_2P)
                $word_stem = substr_replace($word_stem, '<span class="unregel">s</span>', - 1);             
    }   
    if ($exceptionmodel->isMOUDRE()) {
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1P_2P_3P)
            || ($mood->isIndicatif() && ($tense->isImparfait() || $tense->isPasse()))
            || ($mood->isSubjonctif() && ($tense->isPresent() || $tense->isImparfait()))
            || ($mood->isImperatif() && $tense->isPresent()) && $personIs_1P_2P)
                $word_stem = substr_replace($word_stem, '<span class="unregel">l</span>', - 1);
    }
    if ($exceptionmodel->isSOUDRE() || $exceptionmodel->isRESOUDRE()) {
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S)
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S))
                $word_stem = word_stem_length($infinitiveVerb, 3); 
            if (($mood->isIndicatif() && $tense->isPasse())
                || ($mood->isSubjonctif() && $tense->isImparfait()))
                $word_stem = substr_replace($word_stem, '<span class="unregel">l</span>', - 2);      
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1P_2P_3P)
            || ($mood->isIndicatif() && ($tense->isImparfait()))
            || ($mood->isSubjonctif() && ($tense->isPresent()))
            || ($mood->isImperatif() && $tense->isPresent()) && $personIs_1P_2P)
                $word_stem = substr_replace($word_stem, '<span class="unregel">lv</span>', - 2);
    }  
    if ($exceptionmodel->isBOIRE()) {
        if ($mood->isIndicatif() && ($tense->isImparfait()))
                $word_stem = substr_replace($word_stem, '<span class="unregel">u</span>', -2);
    }    
    if ($exceptionmodel->isVIVRE()) { 
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S)
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S))
                $word_stem = word_stem_length($infinitiveVerb, 3);     
        if (($mood->isIndicatif() && $tense->isPasse())
            || ($mood->isSubjonctif() && $tense->isImparfait()))
            $word_stem = substr_replace($word_stem, '<span class="unregel">éc</span>', -2);
    } 
    if ($exceptionmodel->isSUIVRE() 
        || $exceptionmodel->isFOUTRE()
        || $exceptionmodel->isATTRE()) {
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S)
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S))
                $word_stem = word_stem_length($infinitiveVerb, 3);
    }   
    if ($exceptionmodel->isCLURE()) {    
        if (($mood->isIndicatif() && $tense->isPasse())
           || ($mood->isSubjonctif() && $tense->isImparfait()))
               $word_stem = word_stem_length($infinitiveVerb, 3);
    }   
    if ($exceptionmodel->isMETTRE()) {
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S)
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S))
                $word_stem = word_stem_length($infinitiveVerb, 3);
        if (($mood->isIndicatif() && $tense->isPasse())
            || ($mood->isSubjonctif() && $tense->isImparfait()))
                 $word_stem = word_stem_length($infinitiveVerb, 5);
    }  
    if ($exceptionmodel->isCLORE()) {
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1P_2P_3P)
            || ($mood->isSubjonctif() && $tense->isPresent())
            || ($mood->isIndicatif() && $tense->isImparfait())
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_1P_2P))
                $word_stem = word_stem_length($infinitiveVerb, 2).'<span class="unregel">s</span>';
            if (($mood->isIndicatif() && $tense->isPresent() && $personIs_3S)
                || ($mood->isSubjonctif() && $tense->isImparfait()))
                    $word_stem = word_stem_length($infinitiveVerb, 3).'<span class="unregel">ô</span>';
    }  
    if ($exceptionmodel->isAITRE()) {
        if (($mood->isIndicatif() && ($tense->isPresent() || $tense->isImparfait()))
            || ($mood->isSubjonctif() && $tense->isPresent())
            || ($mood->isImperatif() && $tense->isPresent()))
                $word_stem = word_stem_length($infinitiveVerb, 3);
        if (($mood->isIndicatif() && $tense->isPasse())
            || ($mood->isSubjonctif() && $tense->isImparfait()))
                 $word_stem = word_stem_length($infinitiveVerb, 5);
        if ((mb_substr($infinitiveVerb, -4, 1)  === 'î') &&
             (($mood->isIndicatif() && ($tense->isPresent() && $personIs_1S_2S_1P_2P_3P))
             || ($mood->isIndicatif() && ($tense->isImparfait() || $tense->isPasse()))
             || ($mood->isConditionnel() && $tense->isImparfait())
             || ($mood->isImperatif() && $tense->isPresent())))
                 $word_stem = mb_substr_replace($word_stem, '<span class="unregel">i</span>', -1, 1);          
    }   
    if ($exceptionmodel->isNAITRE() ) {
        if (($mood->isIndicatif() && ($tense->isPresent() || $tense->isImparfait()))
            || ($mood->isSubjonctif() && $tense->isPresent())
            || ($mood->isImperatif() && $tense->isPresent()))
                $word_stem = word_stem_length($infinitiveVerb, 3);
        if (($mood->isIndicatif() && $tense->isPasse())
            || ($mood->isSubjonctif() && $tense->isImparfait()))
                 $word_stem = word_stem_length($infinitiveVerb, 5).'<span class="unregel">aqu</span>';
        if ((mb_substr($infinitiveVerb, -4, 1)  === 'î') &&
                (($mood->isIndicatif() && ($tense->isPresent() && $personIs_1S_2S_1P_2P_3P))
                    || ($mood->isIndicatif() && $tense->isImparfait())
                    || ($mood->isConditionnel() && $tense->isImparfait())
                    || ($mood->isImperatif() && $tense->isPresent())))
                        $word_stem = mb_substr_replace($word_stem, '<span class="unregel">i</span>', -1, 1);
            if ((mb_substr($infinitiveVerb, -4, 1)  === 'î') &&
                ($mood->isIndicatif() && $tense->isPasse()))
                        $word_stem = mb_substr_replace($word_stem, 'ui', -1, 1);           
    }  
    if ($exceptionmodel->isOITRE() ) {
        if (($mood->isIndicatif() && ($tense->isPresent() || $tense->isImparfait()))
            || ($mood->isSubjonctif() && $tense->isPresent())
            || ($mood->isImperatif() && $tense->isPresent()))
                $word_stem = word_stem_length($infinitiveVerb, 3);
        if  (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S)
        || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S))
            $word_stem = mb_substr_replace($word_stem, '<span class="unregel">î</span>', - 1);
        if (($mood->isIndicatif() && $tense->isPasse())
            || ($mood->isSubjonctif() && $tense->isImparfait()))
                $word_stem = word_stem_length($infinitiveVerb, 5);
    }    
    return $word_stem;
}
function word_stem2(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood) {
    $exceptionmodel = finding_exception_model($infinitiveVerb);
    $word_stem = word_stem_length($infinitiveVerb, 2);
    if ($exceptionmodel->isUIRE()) 
        $word_stem = word_stem_length($infinitiveVerb, 3);	
    if ($exceptionmodel->isCHOIR2())
        $word_stem = word_stem_length($infinitiveVerb, 3);   
    if ($exceptionmodel->isYER_YE_IE())
        $word_stem = substr_replace ( $word_stem, 'i', - 1, 1 );	
    if ($exceptionmodel->isFLEURIR())
        $word_stem = word_stem_length($infinitiveVerb, 5).'<span class="unregel">or</span>';
	    return $word_stem;	
}	
function participe_present_word_stem(InfinitiveVerb $infinitiveVerb) {
    $exceptionmodel = finding_exception_model($infinitiveVerb); // without this line Undefined variable
    $word_stem = word_stem_length($infinitiveVerb, 2); // without this line Undefined variable
    
    if ($exceptionmodel->isCER() 
        || $exceptionmodel->isGER()) {
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'c')
            $word_stem = substr_replace($word_stem, '<span class="unregel">ç</span>', - 1);
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'g')
            $word_stem = $word_stem . '<span class="unregel">e</span>';
    }   
    if ($exceptionmodel->isDEVOIR() 	
        || $exceptionmodel->isMOUVOIR() 
        || $exceptionmodel->isPOUVOIR() 
        || $exceptionmodel->isSAVOIR() 
        || $exceptionmodel->isVOULOIR() 
        || $exceptionmodel->isCEVOIR() 
        || $exceptionmodel->isFALLOIR() 
        || $exceptionmodel->isPLEUVOIR() 
        || $exceptionmodel->isRAMENTEVOIR()			
        || $exceptionmodel->isVALOIR())
        $word_stem = word_stem_length($infinitiveVerb, 3);
    if ($exceptionmodel->isETRE_IRR()
        || $exceptionmodel->isAITRE()
        || $exceptionmodel->isNAITRE()
        || $exceptionmodel->isOITRE())
        $word_stem = word_stem_length($infinitiveVerb, 4);
    if ($exceptionmodel->isSEOIR())
        $word_stem = substr_replace($word_stem, '<span class="unregel">oy</span>', 3);
    if ($exceptionmodel->isCHOIR2())
        $word_stem = word_stem_length($infinitiveVerb, 3) . '<span class="unregel">é</span>';	
    if ($exceptionmodel->isAVOIR_IRR())
        $word_stem = word_stem_length($infinitiveVerb, 5);
    if ($exceptionmodel->isFUIR() 
        || $exceptionmodel->isVOIR())
        $word_stem = word_stem_length($infinitiveVerb, 2) . '<span class="unregel">y</span>';
    if ($exceptionmodel->isFAIRE() 
        || $exceptionmodel->isPLAIRE() 
        || $exceptionmodel->isTAIRE())
        $word_stem = word_stem_length($infinitiveVerb, 2) . '<span class="unregel">s</span>';
    if ($exceptionmodel->isDORMIR() 
        || $exceptionmodel->isTIR() 
        || $exceptionmodel->isSERVIR() 
        || $exceptionmodel->isPRENDRE())
        $word_stem = word_stem_length($infinitiveVerb, 3);
    if ($exceptionmodel->isVAINCRE())
        $word_stem = substr_replace($word_stem, '<span class="unregel">qu</span>', -1);
    if ($exceptionmodel->isRAIRE() 
        || $exceptionmodel->isCROIRE())
        $word_stem = substr_replace($word_stem, '<span class="unregel">y</span>', - 1); 
    if ($exceptionmodel->isMOUDRE())
        $word_stem = substr_replace($word_stem, '<span class="unregel">l</span>', - 1);
    if ($exceptionmodel->isCOUDRE() 
        || $exceptionmodel->isOINDRE())
        $word_stem = substr_replace($word_stem, '<span class="unregel">s</span>', - 1);   
    if ($exceptionmodel->isINDRE() 
        || $exceptionmodel->isOINDRE())
        $word_stem = substr_replace($word_stem, '<span class="unregel">gn</span>', - 2);    
    if ($exceptionmodel->isSOUDRE() 
        || $exceptionmodel->isRESOUDRE())
        $word_stem = substr_replace($word_stem, '<span class="unregel">lv</span>', - 2);
    if ($exceptionmodel->isSUFFIRE() 
        || $exceptionmodel->isCIRCONCIRE()
        || $exceptionmodel->isDIRE()
        || $exceptionmodel->isCONFIRE()
        || $exceptionmodel->isLIRE()
        || $exceptionmodel->isUIRE()
        || $exceptionmodel->isCLORE())
        $word_stem = word_stem_length($infinitiveVerb, 2).'<span class="unregel">s</span>';  
    if ($exceptionmodel->isMAUDIRE()
        || $exceptionmodel->isBRUIRE())
        $word_stem = word_stem_length($infinitiveVerb, 2).'<span class="unregel">ss</span>';    
    if ($exceptionmodel->isCRIRE())
        $word_stem = word_stem_length($infinitiveVerb, 2).'<span class="unregel">v</span>'; 
    if ($exceptionmodel->isBOIRE())
        $word_stem = word_stem_length($infinitiveVerb, 4).'<span class="unregel">uv</span>';      
    return $word_stem;
}

function participe_passe_word_stem(InfinitiveVerb $infinitiveVerb) {
    $exceptionmodel = finding_exception_model($infinitiveVerb); // without this line Undefined variable
    $word_stem = word_stem_length($infinitiveVerb, 2); // regular case
    
    if ($exceptionmodel->isCHOIR() 
	|| $exceptionmodel->isCHOIR2()		
        || $exceptionmodel->isRIR() 
        || $exceptionmodel->isVALOIR() 
        || $exceptionmodel->isVOIR() 
        || $exceptionmodel->isFALLOIR() 
        || $exceptionmodel->isVOULOIR()
        || $exceptionmodel->isINDRE()
        || $exceptionmodel->isOINDRE()
        || $exceptionmodel->isSOUDRE()
        || $exceptionmodel->isSUFFIRE()        
        || $exceptionmodel->isLIRE()		
        || $exceptionmodel->isRIRE()
        || $exceptionmodel->isUIRE()		
		|| in_array ($infinitiveVerb, [ 'exclure','conclure','autoexclure','auto-exclure','occlure','réocclure','réexclure','se réocclure','s’occlure','s’auto-exclure','s’autoexclure']))
        $word_stem = word_stem_length($infinitiveVerb, 3);
    if ($exceptionmodel->isETRE_IRR() 
        || $exceptionmodel->isQUERIR() 
        || $exceptionmodel->isSEOIR() 
        || $exceptionmodel->isPLAIRE()
        || $exceptionmodel->isTAIRE()
        || $exceptionmodel->isCROIRE()
        || $exceptionmodel->isBOIRE()
        || $exceptionmodel->isVIVRE())
        $word_stem = word_stem_length($infinitiveVerb, 4);
    if ($exceptionmodel->isDEVOIR()
        || $exceptionmodel->isMOURIR() 
        || $exceptionmodel->isAVOIR_IRR() 
        || $exceptionmodel->isPRENDRE()
        || $exceptionmodel->isAITRE()
        || $exceptionmodel->isNAITRE()
        || $exceptionmodel->isMETTRE()
        || $exceptionmodel->isSAVOIR() 
        || $exceptionmodel->isRAMENTEVOIR()				
        || $exceptionmodel->isOITRE())
        $word_stem = word_stem_length($infinitiveVerb, 5);    
    if ($exceptionmodel->isCEVOIR())
        $word_stem = word_stem_length($infinitiveVerb, 6) . '<span class="unregel">ç</span>';
    if ($exceptionmodel->isMOUVOIR() || $exceptionmodel->isPOUVOIR() || $exceptionmodel->isPLEUVOIR())
        $word_stem = word_stem_length($infinitiveVerb, 6);
    if ($exceptionmodel->isMOUDRE())
        $word_stem = substr_replace($word_stem, '<span class="unregel">l</span>', - 1);
    if ($exceptionmodel->isCOUDRE())
        $word_stem = substr_replace($word_stem, '<span class="unregel">s</span>', - 1);
    if ($exceptionmodel->isRESOUDRE())
        $word_stem = substr_replace($word_stem, '<span class="unregel">l</span>', - 2);
    return $word_stem;
}
?>
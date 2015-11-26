<?php

function word_stem_length(InfinitiveVerb $infinitiveVerb, $endingLength)
{
    return mb_substr($infinitiveVerb->getInfinitiveVerb(), 0, - $endingLength);
}

function word_stem_only_first_letter(InfinitiveVerb $infinitiveVerb)
{
    $word_stem = word_stem_length($infinitiveVerb, 2);
    $word_stem = mb_substr($word_stem, 0, 1);
    return $word_stem;
}

function replace_akut($str, $replace, $replaceWith)
{
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

function word_stem(InfinitiveVerb $infinitiveVerb, Person $person, Tense $tense, Mood $mood)
{
    $exceptionmodel = finding_exception_model($infinitiveVerb);
    $word_stem = word_stem_length($infinitiveVerb, 2);
    
    // Precompute condition parts start
    $exceptionIsFUIR = $exceptionmodel->getValue() === ExceptionModel::FUIR;
    $exceptionIsDEVOIR = $exceptionmodel->getValue() === ExceptionModel::DEVOIR;
    $exceptionIsMOUVOIR = $exceptionmodel->getValue() === ExceptionModel::MOUVOIR;
    $exceptionIsPOUVOIR = $exceptionmodel->getValue() === ExceptionModel::POUVOIR;
    $exceptionIsSAVOIR = $exceptionmodel->getValue() === ExceptionModel::SAVOIR;
    $exceptionIsVALOIR = $exceptionmodel->getValue() === ExceptionModel::VALOIR;
    $exceptionIsAVOIR_IRR = $exceptionmodel->getValue() === ExceptionModel::AVOIR_IRR;
    $exceptionIsETRE_IRR = $exceptionmodel->getValue() === ExceptionModel::ETRE_IRR;
    $exceptionIsEler_Ele = $exceptionmodel->getValue() === ExceptionModel::Eler_Ele;
    $exceptionIsEter_Ete = $exceptionmodel->getValue() === ExceptionModel::Eter_Ete;
    $exceptionIsEler_Elle = $exceptionmodel->getValue() === ExceptionModel::Eler_Elle;
    $exceptionIsEter_Ette = $exceptionmodel->getValue() === ExceptionModel::Eter_Ette;
    $exceptionIsCER = $exceptionmodel->getValue() === ExceptionModel::CER;
    $exceptionIsGER = $exceptionmodel->getValue() === ExceptionModel::GER;
    $exceptionIsE_Er = $exceptionmodel->getValue() === ExceptionModel::E_Er;  
    $exceptionIsE_Akut_ER = $exceptionmodel->getValue() === ExceptionModel::E_Akut_ER;    
    $exceptionIsE_Akut_CER = $exceptionmodel->getValue() === ExceptionModel::E_Akut_CER;
    $exceptionIsE_Akut_GER = $exceptionmodel->getValue() === ExceptionModel::E_Akut_GER;  
    $exceptionIsE_Akut_YER = $exceptionmodel->getValue() === ExceptionModel::E_Akut_YER;
    $exceptionIsMOURIR = $exceptionmodel->getValue() === ExceptionModel::MOURIR;    
    $exceptionIsQUERIR = $exceptionmodel->getValue() === ExceptionModel::QUERIR;
    $exceptionIsBOUILLIR = $exceptionmodel->getValue() === ExceptionModel::BOUILLIR;    
    
    $exceptionIsENVOYER = $exceptionmodel->getValue() === ExceptionModel::ENVOYER;    
    $exceptionIsValoir = $exceptionmodel->getValue() === ExceptionModel::VALOIR;    

    
    $moodVal =  $mood->getValue();
    $moodIsIndicatif = $moodVal == Mood::Indicatif;
    $moodIsConditionnel = $moodVal === Mood::Conditionnel;
    $moodIsSubjonctif =  $moodVal === Mood::Subjonctif;
    $moodIsImperatif =  $moodVal === Mood::Imperatif;
    
    $tenseVal = $tense->getValue();
    $tenseIsPresent = $tenseVal=== Tense::Present;
    $tenseIsImparfait = $tenseVal=== Tense::Imparfait;
    $tenseIsPasse= $tenseVal=== Tense::Passe;
    $tenseIsFutur = $tenseVal === Tense::Futur;
    
    $personVal = $person->getValue();
    $personIs_2S = $personVal == Person::SecondPersonSingular;
    $personIs_1P = $personVal == Person::FirstPersonPlural;
    $personIs_1S_2S_3S = in_array($personVal, [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular
    ]);
    $personIs_1S_2S_3S_3P = in_array($personVal, [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ]);
    $personIs_1S_2S_3S_1P_2P= in_array($personVal, [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::FirstPersonPlural,
        Person::SecondPersonPlural
    ]);
    
    // Precompute condition parts end    
    if ($exceptionIsFUIR)
    {
        $word_stem = word_stem_length($infinitiveVerb, 1);
    }
    if ($exceptionIsDEVOIR
        || $exceptionIsMOUVOIR
        || $exceptionIsPOUVOIR
        || $exceptionIsSAVOIR
        || $exceptionIsVALOIR
        || $exceptionIsAVOIR_IRR)
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    if ($exceptionIsETRE_IRR)
    {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    
    if (($exceptionIsEler_Ele || $exceptionIsEter_Ete)
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1S_2S_3S_3P)
            || $tenseIsFutur
            || ($moodIsSubjonctif && $tenseIsPresent && $personIs_1S_2S_3S_3P)
            || ($moodIsConditionnel && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = substr_replace($word_stem, 'è', - 2, 1);
    }
    if (($exceptionIsEler_Elle || $exceptionIsEter_Ette)
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1S_2S_3S_3P)
            || $tenseIsFutur
            || ($moodIsSubjonctif && $tenseIsPresent && $personIs_1S_2S_3S_3P)
            || ($moodIsConditionnel && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'l') {
            $word_stem = $word_stem . 'l';
        }
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 't') {
            $word_stem = $word_stem . 't';
        }
    }
    if (($exceptionIsCER || $exceptionIsGER || $exceptionIsE_Akut_CER || $exceptionIsE_Akut_GER)
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1P)
            || ($moodIsIndicatif && $tenseIsImparfait && $personIs_1S_2S_3S_3P)
            || ($moodIsIndicatif && $tenseIsPasse && $personIs_1S_2S_3S_1P_2P)
            || ($moodIsSubjonctif && $tenseIsImparfait)
            || ($moodIsConditionnel && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_1P)))
    {
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'c') {
            $word_stem = substr_replace($word_stem, 'ç', - 1);
        }
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'g') {
            $word_stem = $word_stem . 'e';
        }
    } 
    if (($exceptionIsE_Akut_ER || $exceptionIsE_Akut_CER || $exceptionIsE_Akut_GER || $exceptionIsE_Akut_YER)
        && (   (($moodIsIndicatif || $moodIsSubjonctif) && $tenseIsPresent && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || $tenseIsFutur
            || ($moodIsConditionnel && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = replace_akut($word_stem, 'é', 'è');
    }    
    if ($exceptionIsE_Er
        && (   (($moodIsIndicatif || $moodIsSubjonctif) && $tenseIsPresent && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || $tenseIsFutur
            || ($moodIsConditionnel && $tenseIsPresent)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = replace_akut($word_stem, 'e', 'è');
    } 
    if ($exceptionIsMOURIR 
        && (   (($moodIsIndicatif || $moodIsSubjonctif) && $tenseIsPresent && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5) . 'eur';
    }   
    if ($exceptionIsBOUILLIR
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1S_2S_3S_3P) 
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    if ($exceptionIsQUERIR
        && (   (($moodIsIndicatif || $moodIsSubjonctif) && $tenseIsPresent && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || ($moodIsSubjonctif && $tenseIsImparfait)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    if ($exceptionIsQUERIR
        && (   ($moodIsIndicatif && $tenseIsFutur)
            || ($moodIsConditionnel && $tenseIsPresent)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4) . 'er';
    }    
    if ($exceptionIsENVOYER
        && (   ($moodIsIndicatif && $tenseIsFutur)
            || ($moodIsConditionnel && $tenseIsPresent)))
    {
        $word_stem = substr_replace($word_stem, 'enver', - 5, 5);
    }
    if ($exceptionIsENVOYER
        && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1S_2S_3S_3P)
            || ($moodIsSubjonctif && $tenseIsPresent && $personIs_1S_2S_3S_3P)
            || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
    {
        $word_stem = substr_replace($word_stem, 'i', - 1);
    }
     

    if ($exceptionmodel->getValue() === ExceptionModel::DEVOIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ]) || $tense->getValue() === Tense::Passe) || ($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ])) || (($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Imparfait)) || (($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::SecondPersonSingular)))) {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    
    if ($exceptionmodel->getValue() === ExceptionModel::MOUVOIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ]) || $tense->getValue() === Tense::Passe) || ($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ])) || (($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Imparfait)) || (($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::SecondPersonSingular)))) {
        $word_stem = word_stem_length($infinitiveVerb, 6);
    }
    
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::DORMIR,
        ExceptionModel::TIR,
        ExceptionModel::SERVIR
    ]) && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular
    ])) || (($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::SecondPersonSingular)))) {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    if ($exceptionmodel->getValue() === ExceptionModel::POUVOIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ]) || $tense->getValue() === Tense::Passe) || (($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Imparfait)))) {
        $word_stem = word_stem_length($infinitiveVerb, 6);
    }
    if ($exceptionmodel->getValue() === ExceptionModel::POUVOIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Futur) || (($mood->getValue() === Mood::Conditionnel && $tense->getValue() === Tense::Present)))) {
        $word_stem = word_stem_length($infinitiveVerb, 3);
        $word_stem = substr_replace($word_stem, 'r', - 1);
    }
    if ($exceptionmodel->getValue() === ExceptionModel::POUVOIR && (($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present))) {
        $word_stem = word_stem_length($infinitiveVerb, 6) . 'uiss';
        // unset Imperatif Present later
    }
    if ($exceptionmodel->getValue() === ExceptionModel::SAVOIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular
    ]) || $tense->getValue() === Tense::Passe) || (($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Imparfait)))) {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    if ($exceptionmodel->getValue() === ExceptionModel::SAVOIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Futur) || (($mood->getValue() === Mood::Conditionnel && $tense->getValue() === Tense::Present)))) {
        $word_stem = word_stem_length($infinitiveVerb, 3);
        $word_stem = substr_replace($word_stem, 'u', - 1);
    }
    if ($exceptionmodel->getValue() === ExceptionModel::SAVOIR && (($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present) || (($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present)))) {
        $word_stem = word_stem_length($infinitiveVerb, 3);
        $word_stem = substr_replace($word_stem, 'ch', - 1);
    }
    if ($exceptionmodel->getValue() === ExceptionModel::ENIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Passe) || ($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Imparfait))) {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    if ($exceptionmodel->getValue() === ExceptionModel::ENIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ]) || $tense->getValue() === Tense::Futur) || ($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ])) || ($mood->getValue() === Mood::Conditionnel && $tense->getValue() === Tense::Present) || (($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::SecondPersonSingular)))) {
        $word_stem = word_stem_length($infinitiveVerb, 4) . 'ien';
    }
    if ($exceptionmodel->getValue() === ExceptionModel::ALLER && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ]) || $tense->getValue() === Tense::Futur) || ($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::ThirdPersonPlural
    ])) || ($mood->getValue() === Mood::Conditionnel && $tense->getValue() === Tense::Present) || (($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::SecondPersonSingular)))) {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    
    if ($exceptionmodel->getValue() === ExceptionModel::AVOIR_IRR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present || $tense->getValue() === Tense::Passe || $tense->getValue() === Tense::Futur) || ($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present || $tense->getValue() === Tense::Imparfait) || ($mood->getValue() === Mood::Conditionnel && $tense->getValue() === Tense::Present) || (($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present)))) {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    
    
    
if ($exceptionIsValoir
    && (   ($moodIsIndicatif && $tenseIsPresent && $personIs_1S_2S_3S)
        || $tenseIsFutur
        || ($moodIsConditionnel && $tenseIsPresent)
        || ($moodIsImperatif && $tenseIsPresent && $personIs_2S)))
{
    $word_stem = word_stem_length($infinitiveVerb, 4) . 'u';
}

if ($exceptionIsValoir
    && ($moodIsSubjonctif && $tenseIsPresent && $personIs_1S_2S_3S_3P))
{
    $word_stem = word_stem_length($infinitiveVerb, 4) . 'ill';
}
    
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::FUIR,
        ExceptionModel::VOIR
    ]) && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonPlural,
        Person::SecondPersonPlural
    ])) || ($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Imparfait) || // if I put Imparfait without Mood::Indicatif, it use it for Subjonctif Imparfait
($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonPlural,
        Person::SecondPersonPlural
    ])) || ($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonPlural,
        Person::SecondPersonPlural
    ])))) {
        $word_stem = word_stem_length($infinitiveVerb, 2) . 'y';
    }
    
    if ($exceptionmodel->getValue() === ExceptionModel::VOIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Futur) || (($mood->getValue() === Mood::Conditionnel)))) {
        if (in_array($infinitiveVerb, [
            'pourvoir',
            'prévoir'
        ])) {
            $word_stem = word_stem_length($infinitiveVerb, 3) . 'oi';
        } else
            $word_stem = word_stem_length($infinitiveVerb, 3) . 'er';
    }
    if ($exceptionmodel->getValue() === ExceptionModel::VOIR && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Passe) || (($mood->getValue() === Mood::Subjonctif && $tense->getValue() === Tense::Imparfait)))) {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    return $word_stem;
}

function participe_present_word_stem(InfinitiveVerb $infinitiveVerb)
{
    $exceptionmodel = finding_exception_model($infinitiveVerb); // without this line Undefined variable
    $word_stem = word_stem_length($infinitiveVerb, 2); // without this line Undefined variable
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::CER,
        ExceptionModel::GER
    ])) {
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'c') {
            $word_stem = substr_replace($word_stem, 'ç', - 1);
        }
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'g') {
            $word_stem = $word_stem . 'e';
        }
    }
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::DEVOIR,
        ExceptionModel::MOUVOIR,
        ExceptionModel::POUVOIR,
        ExceptionModel::SAVOIR,
        ExceptionModel::VALOIR
    ])) {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::ETRE_IRR
    ])) {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::AVOIR_IRR
    ])) {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::FUIR,
        ExceptionModel::VOIR
    ])) {
        $word_stem = word_stem_length($infinitiveVerb, 2) . 'y';
    }
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::DORMIR,
        ExceptionModel::TIR,
        ExceptionModel::SERVIR
    ]) && (($mood->getValue() === Mood::Indicatif && $tense->getValue() === Tense::Present && in_array($person->getValue(), [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular
    ])) || (($mood->getValue() === Mood::Imperatif && $tense->getValue() === Tense::Present && $person->getValue() === Person::SecondPersonSingular)))) {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    
    return $word_stem;
}

function participe_passe_word_stem(InfinitiveVerb $infinitiveVerb)
{
    $exceptionmodel = finding_exception_model($infinitiveVerb); // without this line Undefined variable
    $word_stem = word_stem_length($infinitiveVerb, 2); // regular case
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::RIR,
        ExceptionModel::VALOIR,
        ExceptionModel::VOIR
    ])) {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::ETRE_IRR,
        ExceptionModel::QUERIR
    ])) {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::DEVOIR,
        ExceptionModel::SAVOIR,
        ExceptionModel::MOURIR,
        ExceptionModel::AVOIR_IRR
    ])) {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    } //
    if (in_array($exceptionmodel->getValue(), [
        ExceptionModel::MOUVOIR,
        ExceptionModel::POUVOIR
    ])) {
        $word_stem = word_stem_length($infinitiveVerb, 6);
    }
    return $word_stem;
}
?>
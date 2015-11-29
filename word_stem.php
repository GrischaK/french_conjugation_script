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
    $personVal = $person->getValue();
    $personIs_2S = $personVal == Person::SecondPersonSingular;
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
    $personIs_1S_2S_3S_1P_2P= in_array($personVal, [
        Person::FirstPersonSingular,
        Person::SecondPersonSingular,
        Person::ThirdPersonSingular,
        Person::FirstPersonPlural,
        Person::SecondPersonPlural
    ]);
    
    // Precompute condition parts end    
    if ($exceptionmodel->isFUIR())
    {
        $word_stem = word_stem_length($infinitiveVerb, 1);
    }
   
    if ($exceptionmodel->isAVOIR_IRR()      
        || $exceptionmodel->isCEVOIR()
        || $exceptionmodel->isCHOIR()   
        || $exceptionmodel->isDEVOIR()        
        || $exceptionmodel->isMOUVOIR()
        || $exceptionmodel->isPOUVOIR()
        || $exceptionmodel->isSAVOIR()   
        || $exceptionmodel->isVALOIR()   
        || $exceptionmodel->isPLEUVOIR()
        || $exceptionmodel->isFALLOIR()
        || $exceptionmodel->isVOULOIR())
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    if ($exceptionmodel->isETRE_IRR())
    {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    
    if (($exceptionmodel->isEler_Ele() || $exceptionmodel->isEter_Ete())
        && (   ($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S_3P)
            || $tense->isFutur()
            || ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P)
            || ($mood->isConditionnel() && $tense->isPresent())
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
    {
        $word_stem = substr_replace($word_stem, 'è', - 2, 1);
    }
    if (($exceptionmodel->isEler_Elle() || $exceptionmodel->isEter_Ette())
        && (   ($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S_3P)
            || $tense->isFutur()
            || ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P)
            || ($mood->isConditionnel() && $tense->isPresent())
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
    {
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'l') {
            $word_stem = $word_stem . 'l';
        }
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 't') {
            $word_stem = $word_stem . 't';
        }
    }
    if (($exceptionmodel->isCER() 
        || $exceptionmodel->isGER() 
        || $exceptionmodel->isE_Akut_CER() 
        || $exceptionmodel->isE_Akut_GER())
        && (   ($mood->isIndicatif() && $tense->isPresent() && $personIs_1P)
            || ($mood->isIndicatif() && $tense->isImparfait() && $personIs_1S_2S_3S_3P)
            || ($mood->isIndicatif() && $tense->isPasse() && $personIs_1S_2S_3S_1P_2P)
            || ($mood->isSubjonctif() && $tense->isImparfait())
            || ($mood->isConditionnel() && $tense->isPresent())
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_1P)))
    {
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'c') {
            $word_stem = substr_replace($word_stem, 'ç', - 1);
        }
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'g') {
            $word_stem = $word_stem . 'e';
        }
    } 
    if (($exceptionmodel->isE_Akut_ER() 
        || $exceptionmodel->isE_Akut_CER() 
        || $exceptionmodel->isE_Akut_GER() 
        || $exceptionmodel->isE_Akut_YER())
        && (   (($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || $tense->isFutur()
            || ($mood->isConditionnel() && $tense->isPresent())
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
    {
        $word_stem = replace_akut($word_stem, 'é', 'è');
    }    
    if ($exceptionmodel->isE_Er()
        && (   (($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || $tense->isFutur()
            || ($mood->isConditionnel() && $tense->isPresent())
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
    {
        $word_stem = replace_akut($word_stem, 'e', 'è');
    } 
    if ($exceptionmodel->isMOURIR() 
        && (   (($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5) . 'eur';
    }   
    if ($exceptionmodel->isBOUILLIR()
        && (   ($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S_3P) 
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    if ($exceptionmodel->isQUERIR()
        && (   (($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || ($mood->isSubjonctif() && $tense->isImparfait())
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    if ($exceptionmodel->isQUERIR()
        && (   ($mood->isIndicatif() && $tense->isFutur())
            || ($mood->isConditionnel() && $tense->isPresent())))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4) . 'er';
    }    
    if ($exceptionmodel->isENVOYER()
        && (   ($mood->isIndicatif() && $tense->isFutur())
            || ($mood->isConditionnel() && $tense->isPresent())))
    {
        $word_stem = substr_replace($word_stem, 'enver', - 5, 5);
    }
    if ($exceptionmodel->isENVOYER()
        && (   ($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S_3P)
            || ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P)
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
    {
        $word_stem = substr_replace($word_stem, 'i', - 1);
    }
    if ($exceptionmodel->isVALOIR()
        && (   ($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S)
            || $tense->isFutur()
            || ($mood->isConditionnel() && $tense->isPresent())
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4) . 'u';
    }
    
    if ($exceptionmodel->isVALOIR()
        && ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4) . 'ill';
    }
    if ($exceptionmodel->isCEVOIR()
                && (   ($mood->isIndicatif() && $tense->isPasse())     
            || ($mood->isSubjonctif() && $tense->isImparfait())))
    {
            $word_stem = word_stem_length($infinitiveVerb, 6).'ç';
    }    
    if ($exceptionmodel->isDEVOIR()
        && (   ($mood->isIndicatif() && $tense->isPasse())     
            || ($mood->isSubjonctif() && $tense->isImparfait())))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }          
    if ((($mood->isIndicatif() ) && $tense->isPresent() && $personIs_1S_2S_3S)
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S))
    {
        if ($exceptionmodel->isCEVOIR()) {
            $word_stem = substr_replace($word_stem, 'çoi', - 3);
        }
        if ($exceptionmodel->isCHOIR()) {
            $word_stem = substr_replace($word_stem, 'oi', 2);
        }       
        if ($exceptionmodel->isDEVOIR() || $exceptionmodel->isSEOIR()) {
            $word_stem = substr_replace($word_stem, 'oi', - 2);
        } 
    }  
    if (($mood->isIndicatif() && $tense->isPresent() && $personIs_3P)
            || ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P))
    {
         if ($exceptionmodel->isCEVOIR()) {
            $word_stem = substr_replace($word_stem, 'çoiv', - 3);
        }     
        if ($exceptionmodel->isCHOIR()) {
            $word_stem = substr_replace($word_stem, 'oi', 2);
        } 
        if ($exceptionmodel->isDEVOIR()) {
            $word_stem = substr_replace($word_stem, 'oiv', - 2);
        } 
    }    
    if ((($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1P_2P))
    {
        if ($exceptionmodel->isCHOIR()) {
            $word_stem = substr_replace($word_stem, 'oy', 2);
        }
        if ($exceptionmodel->isSEOIR()){
            $word_stem = substr_replace($word_stem, 'oy', 3);
        }
    }
    if ($exceptionmodel->isPLEUVOIR())
    {
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S)
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)){
            $word_stem = word_stem_length($infinitiveVerb, 4);
        }
        if (($mood->isIndicatif() && $tense->isPasse()) // onky 3S is not defektif
            || ($mood->isSubjonctif() && $tense->isImparfait())){// onky 3S is not defektif
            $word_stem = word_stem_length($infinitiveVerb, 6);
        }        
    }        
    if (($exceptionmodel->isCHOIR())
        && (   (($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1P_2P)))
    {
        $word_stem = substr_replace($word_stem, 'oy', 2);
    }   
    
    if ($exceptionmodel->isSEOIR()){
        if (($mood->isIndicatif() || $mood->isSubjonctif() || $mood->isImperatif()) && $tense->isPresent() && $personIs_1P_2P){          
        $word_stem = substr_replace($word_stem, 'oy', 3);
       }
       if (($mood->isIndicatif() && $tense->isPresent() && $personIs_3P)
                 || $tense->isFutur()           
               || ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P)
               || ($mood->isConditionnel() && $tense->isPresent()))
       {
           $word_stem = substr_replace($word_stem, 'oi', 3);
       }
       if (($mood->isIndicatif() && $tense->isImparfait()))
       {
           $word_stem = substr_replace($word_stem, 'oy', 3);
       }
       if (($mood->isIndicatif() && $tense->isPasse())
               || ($mood->isSubjonctif() && $tense->isImparfait()))
       {
           $word_stem = word_stem_length($infinitiveVerb, 4);
       }      
    }   
    $soir = ['assoir','rassoir','réassoir','s’assoir','sursoir']; // 5 Verben
    if ((in_array($infinitiveVerb, $soir)))
    {
        if (($mood->isIndicatif() && $tense->isPasse()) 
            || ($mood->isSubjonctif() && $tense->isImparfait()))
        {
            $word_stem = word_stem_length($infinitiveVerb, 3);
        }
        if (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S)
            || $mood->isImperatif() && $tense->isPresent() && $personIs_2S)
        {             
      $word_stem = substr_replace($word_stem, 'soi', 2);
            }
    }
    if (($exceptionmodel->isCHOIR())
        && (   ($mood->isIndicatif() && $tense->isFutur())
            || ($mood->isConditionnel() && $tense->isPresent())))
    {
        $word_stem = word_stem_length($infinitiveVerb, 1);
    }       
    if ($exceptionmodel->isMOUVOIR()
        && (   (($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) 
            || $tense->isPasse()
            || ($mood->isSubjonctif() && $tense->isImparfait())
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 6);
    }       
    if (($exceptionmodel->isDORMIR() || $exceptionmodel->isTIR() || $exceptionmodel->isSERVIR())
        && (   ($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S) 
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    } 

    if ($exceptionmodel->isPOUVOIR() 
        && (   ($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S_3P) 
            || $tense->isPasse()            
            || ($mood->isSubjonctif() && $tense->isImparfait())))
    {
        $word_stem = word_stem_length($infinitiveVerb, 6);
    }
    
    if (($mood->isIndicatif() && $tense->isFutur())
            || ($mood->isConditionnel() && $tense->isPresent()))
    {
        if ($exceptionmodel->isPOUVOIR()) {
            $word_stem = substr_replace($word_stem, 'r', - 1);
        }
        if ($exceptionmodel->isSAVOIR()) {
            $word_stem = substr_replace($word_stem, 'u', - 1);
        }        
        if ($exceptionmodel->isVOULOIR()) {
            $word_stem = substr_replace($word_stem, 'd', - 1);
        }       
    }
    
    if ($exceptionmodel->isPOUVOIR()
        && ($mood->isSubjonctif() && $tense->isPresent()))
    {
       $word_stem = word_stem_length($infinitiveVerb, 6) . 'uiss';
        // unset Imperatif Present later
    }    
    if ($exceptionmodel->isFAILLIR())
      {
        if  (($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S)
            || ($mood->isImperatif() && $tense->isPresent()) && $personIs_2S)
         {
        $word_stem = word_stem_length($infinitiveVerb, 6);
        } 
        if  (($mood->isSubjonctif() && $tense->isPresent() && $personIs_1P_2P_3P))
        {
            $word_stem = $word_stem.'iss';
        }        
    }
    if ($exceptionmodel->isFALLOIR())
    {
        if  ((($mood->isIndicatif() || ($mood->isSubjonctif())) && $tense->isPresent()))
        {
            $word_stem = word_stem_length($infinitiveVerb, 5);
        }     
        if  (($mood->isIndicatif() && $tense->isFutur())
            || ($mood->isConditionnel() && $tense->isPresent()))
        {
            $word_stem = word_stem_length($infinitiveVerb, 5);
            $word_stem = $word_stem.'ud';
        }
        
    }    
    if ($exceptionmodel->isVOULOIR()
        && (   ($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S_3P)
            || ($mood->isImperatif() && $tense->isPresent())))
    {
        $word_stem = word_stem_length($infinitiveVerb, 6);
    }   
    if ($exceptionmodel->isVOULOIR()
        && ($mood->isSubjonctif() && $tense->isPresent() && $personIs_1S_2S_3S_3P))
    {
        $word_stem = word_stem_length($infinitiveVerb, 6) . 'euill';
    }    
    
    if ($exceptionmodel->isSAVOIR()
        && (   ($mood->isIndicatif() && $tense->isPresent() && $personIs_1S_2S_3S)
            || $tense->isPasse()
            || ($mood->isSubjonctif() && $tense->isImparfait())))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    if ($exceptionmodel->isSAVOIR()
        && (   ($mood->isSubjonctif() && $tense->isPresent())
            || ($mood->isImperatif() && $tense->isPresent())))
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
        $word_stem = substr_replace($word_stem, 'ch', - 1);
    }  
    if ($exceptionmodel->isVOIR()
        && (   ($mood->isIndicatif() && $tense->isPasse())
            || ($mood->isSubjonctif() && $tense->isImparfait())))
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    if ($exceptionmodel->isENIR()
        && (   ($mood->isIndicatif() && $tense->isPasse())
            || ($mood->isSubjonctif() && $tense->isImparfait())))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
    if ($exceptionmodel->isENIR()
        && (   (($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || $tense->isFutur()
            || ($mood->isConditionnel() && $tense->isPresent())
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 4) . 'ien';
    }   
    if ($exceptionmodel->isALLER()
        && (   (($mood->isIndicatif() || $mood->isSubjonctif()) && $tense->isPresent() && $personIs_1S_2S_3S_3P) // summarized 2 lines
            || $tense->isFutur()
            || ($mood->isConditionnel() && $tense->isPresent())
            || ($mood->isImperatif() && $tense->isPresent() && $personIs_2S)))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    
    if ($exceptionmodel->isAVOIR_IRR()
        && (   (($mood->isIndicatif() || $mood->isSubjonctif() || $mood->isConditionnel() || $mood->isImperatif()) && $tense->isPresent() ) // summarized 4 lines
            || $tense->isPasse()
            || $tense->isFutur()
            || ($mood->isSubjonctif() && $tense->isImparfait())
            || ($mood->isConditionnel() && $tense->isPresent())))
    {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    if (($exceptionmodel->isFUIR() || $exceptionmodel->isVOIR())
        && (   (($mood->isIndicatif() || $mood->isSubjonctif() || $mood->isImperatif()) && $tense->isPresent() && $personIs_1P_2P) // summarized 3 lines
            || ($mood->isIndicatif() && $tense->isImparfait())))
    {
        $word_stem = word_stem_length($infinitiveVerb, 2) . 'y';
    }
    if ($exceptionmodel->isVOIR()
        && (   ($mood->isIndicatif() && $tense->isFutur())
            || ($mood->isConditionnel())))
    {
    if (in_array($infinitiveVerb, [
            'pourvoir',
            'prévoir'
        ])) {
            $word_stem = word_stem_length($infinitiveVerb, 3) . 'oi';
        } else
            $word_stem = word_stem_length($infinitiveVerb, 3) . 'er';
    }  
    return $word_stem;
}

function participe_present_word_stem(InfinitiveVerb $infinitiveVerb)
{
    $exceptionmodel = finding_exception_model($infinitiveVerb); // without this line Undefined variable
    $word_stem = word_stem_length($infinitiveVerb, 2); // without this line Undefined variable

  
    if ($exceptionmodel->isCER() || $exceptionmodel->isGER())
    {
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'c') {
            $word_stem = substr_replace($word_stem, 'ç', - 1);
        }
        if (substr(word_stem_length($infinitiveVerb, 2), - 1) == 'g') {
            $word_stem = $word_stem . 'e';
        }
    }
  
    if ($exceptionmodel->isDEVOIR() 
        || $exceptionmodel->isMOUVOIR() 
        || $exceptionmodel->isPOUVOIR() 
        || $exceptionmodel->isSAVOIR() 
        || $exceptionmodel->isVOULOIR()
        || $exceptionmodel->isCEVOIR() 
        || $exceptionmodel->isFALLOIR()
        || $exceptionmodel->isPLEUVOIR()
        || $exceptionmodel->isVALOIR())
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    
    if ($exceptionmodel->isETRE_IRR())
    {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }   
    if ($exceptionmodel->isSEOIR())
    {
            $word_stem = substr_replace($word_stem, 'oy', 3);
    }   
    if ($exceptionmodel->isAVOIR_IRR())
    {
        $word_stem = word_stem_length($infinitiveVerb, 5);
    }
    
    if ($exceptionmodel->isFUIR() || $exceptionmodel->isVOIR())
    {
        $word_stem = word_stem_length($infinitiveVerb, 2) . 'y';
    }
    if ($exceptionmodel->isDORMIR() 
        || $exceptionmodel->isTIR() 
        || $exceptionmodel->isSERVIR())
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }      
    return $word_stem;
}

function participe_passe_word_stem(InfinitiveVerb $infinitiveVerb)
{
    $exceptionmodel = finding_exception_model($infinitiveVerb); // without this line Undefined variable
    $word_stem = word_stem_length($infinitiveVerb, 2); // regular case

    
    if ($exceptionmodel->isCHOIR() 
        || $exceptionmodel->isRIR()
        || $exceptionmodel->isVALOIR() 
        || $exceptionmodel->isVOIR()
        || $exceptionmodel->isFALLOIR()
        || $exceptionmodel->isVOULOIR())
    {
        $word_stem = word_stem_length($infinitiveVerb, 3);
    }
    
    if ($exceptionmodel->isETRE_IRR() || $exceptionmodel->isQUERIR() || $exceptionmodel->isSEOIR())    
    {
        $word_stem = word_stem_length($infinitiveVerb, 4);
    }
 
    if ($exceptionmodel->isCEVOIR())
    {
        $word_stem = word_stem_length($infinitiveVerb, 6).'ç';
    }
    if ($exceptionmodel->isDEVOIR() 
        || $exceptionmodel->isMOURIR() 
        || $exceptionmodel->isAVOIR_IRR() 
        || $exceptionmodel->isSAVOIR())
    {   

        $word_stem = word_stem_length($infinitiveVerb, 5);
    } 
    if ($exceptionmodel->isMOUVOIR() || $exceptionmodel->isPOUVOIR() || $exceptionmodel->isPLEUVOIR())
    {    
        $word_stem = word_stem_length($infinitiveVerb, 6);
    }
    return $word_stem;
}
?>
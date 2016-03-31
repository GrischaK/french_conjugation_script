<?php
// https://fr.wiktionary.org/wiki/Annexe:Conjugaison_en_fran%C3%A7ais/f%C3%A9rir
// http://www.larousse.fr/conjugaison/francais/forfaire/4822 / 
// reclore,refoutre,rentraire   defect
// http://conjf.cactus2000.de/showverb.php?verb=gesir issir messeoir 
// ressortir 2 variantes of avoir mit verschiedenen Übersetzungen
// https://fr.wiktionary.org/wiki/Annexe:Conjugaison_en_fran%C3%A7ais/faillir verschiedene Bedeutungen
// http://conjf.cactus2000.de/showverb.php?verb=saillir&var=1  2 Bedeutungen
// https://fr.wiktionary.org/wiki/Mod%C3%A8le:fr-conj-2-fleurir-flor 2 Formen
function mb_substr_replace($string, $replacement, $start, $length=NULL) { // https://gist.github.com/stemar/8287074
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
$red_slash = '<span class="text-danger"> / </span>';
$zeiten = range(0,8); 
/************************************************************************************************************/ 
/* Gruppe I :  Verben auf -er      				                                                            */
/************************************************************************************************************/  
	if(in_array($verb, $eler_ele) or in_array($verb, $eter_ete))  {   // z. B. acheter, celer,peler,... verändert Vokal e -> è von Stamm 
		$stamm2 = substr_replace($stamm, '<u>è</u>', -2, 1);        
		foreach($zeiten as $zeit) { 
			foreach($array[$zeit] as $person => $value)	{   			
				if ((($zeit == 0  || $zeit == 4) && !in_array($person,array(3,4))) || ($zeit == 3 || $zeit == 6) || ($zeit == 7 && $person==0))    
				$array[$zeit][$person] = str_replace($stamm, $stamm2, $value);		
			}   
		}     		
	};    
	$letters=array('l','t',$eler_elle,$eter_ette);     
	for($a=0;$a<2;$a++)// Verben auf -eler, -eter verdoppeln den Konsonanten -t-,-l- beim Typen 'jeter', appeler'   
		if ((substr("$verb", -4, 4) == 'e'.$letters[$a].'er') and (in_array($verb, $letters[$a+2])))  {  // z. B. appeler
		$stamm2 = substr("$verb", 0, -2)."<u>".$letters[$a]."</u>" ; 		       
		foreach($zeiten as $zeit) { 
			foreach($array[$zeit] as $person => $value)	{   			
				if ((($zeit == 0  || $zeit == 4) && !in_array($person,array(3,4))) || ($zeit == 3 || $zeit == 6) || ($zeit == 7 && $person==0))    
				$array[$zeit][$person] = str_replace($stamm, $stamm2, $value);		
			}   
		} 		
	};     
	if ((substr($verb,-7,7) == 'envoyer') and (in_array($verb, $envoyer)))   {   // z. B. envoyer           
		$stamm2 = mb_substr_replace($stamm, 'enver', -5, 5);         
		$array[3]  = array ("{$stamm2}<u>rai</u>","{$stamm2}<u>ras</u>","{$stamm2}<u>ra</u>","{$stamm2}<u>rons</u>","{$stamm2}<u>rez</u>","{$stamm2}<u>ront</u>");
		$array[6] = array ("{$stamm2}<u>rais</u>","{$stamm2}<u>rais</u>","{$stamm2}<u>rait</u>","{$stamm2}<u>rions</u>","{$stamm2}<u>riez</u>","{$stamm2}<u>raient</u>");
	};    	
	if (in_array(mb_substr("$verb", -5, 5, "utf-8"), array("ébrer","écher", "égler", "égner", "égrer","éguer","étrer")) and (in_array($verb, $e_akut_er)))   {   // z. B. espérer, accréter               
		$stamm2 = mb_substr_replace($stamm, '<u>è</u>', -2, 1);
		$array[0][0] = $array[0][2] = $array[4][0] = $array[4][2] = $array[7][0] = $stamm2.'e';
		$array[0][1] = $array[4][1] = $stamm2.'es';
		$array[0][5] = $array[4][5] = $stamm2.'ent';
	};
	if (in_array(mb_substr("$verb", -5, 5, "utf-8"), array("ébrer","écher", "égler", "égner", "égrer","éguer","étrer")) and (in_array($verb, $e_akut_er)))   {   // z. B. sécher                    
		$stamm2 = mb_substr_replace($stamm, '<u>è</u>', -3, 1);
		$array[0][0] = $array[0][2] = $array[4][0] = $array[4][2] = $array[7][0] = $stamm2.'e';
		$array[0][1] = $array[4][1] = $stamm2.'es';
		$array[0][5] = $array[4][5] = $stamm2.'ent';
	};
	
	if (in_array(substr("$verb", -4, 4), array("eler","emer", "ener", "eser", "eter", "ever")) and (in_array($verb, $e_er)))   {   // z. B. peser
		echo "neuer test";                      
		$stamm2 = mb_substr_replace($stamm, '<u>è</u>', -2, 1);
		$array[0][0] = $array[0][2] = $array[4][0] = $array[4][2] = $array[7][0] = $stamm2.'e';
		$array[0][1] = $array[4][1] = $stamm2.'es';
		$array[0][5] = $array[4][5] = $stamm2.'ent';
		$array[3] = array ("{$stamm2}erai","{$stamm2}eras","{$stamm2}era","{$stamm2}erons","{$stamm2}erez","{$stamm2}eront");           // mit array_walk kürzen
		$array[6] = array ("{$stamm2}erais","{$stamm2}erais","{$stamm2}erait","{$stamm2}erions","{$stamm2}eriez","{$stamm2}eraient");   // mit array_walk kürzen
	};                     
/************************************************************************************************************/ 
/* Gruppe III : Verben enden -er					                                  	                    */
/************************************************************************************************************/  
	if ($verb == 'aller'){ // aller
		$array[0][0] = '<u>vais</u>';
		$array[0][1] = '<u>vas</u>';
		$array[0][2] = $array[7][0] = '<u>va</u>';
		$array[0][5] = '<u>vont</u>';
		$array[3] = array ('<u>irai</u>','<u>iras</u>','<u>ira</u>','irons</u>','<u>irez</u>','<u>iront</u>');
		$array[4] = array ('<u>aille</u>','<u>ailles</u>','<u>aille</u>','allions','alliez','<u>aillent</u>');
		$array[6] = array ('<u>irais</u>','<u>irais</u>','<u>irait</u>','irions</u>','<u>iriez</u>','<u>iraient</u>');
	};  
	if ($verb == 'raller' or $verb == 're-aller' or $verb == 's’en aller' or $verb == 'sur-aller'){  //    NICHT 'raller ' (2: Bedeutung)
		$r = substr_replace($verb, '', -5, 5);
		$array[0][0] = "{$r}vais";
		$array[0][1] = "{$r}vas";
		$array[0][2] = $array[7][0] = "{$r}va";
		$array[0][5] = "{$r}vont";
		$array[3] = array ("{$r}irai","{$r}iras","{$r}ira","{$r}irons","{$r}irez","{$r}iront");
		$array[4] = array ("{$r}aille","{$r}ailles","{$r}aille","{$r}allions","{$r}alliez","{$r}aillent");
		$array[6] = array ("{$r}irais","{$r}irais","{$r}irait","{$r}irions","{$r}iriez","{$r}'iraient");
	};	
	if ($verb == 'raller'){ // nur raller
		$r = substr_replace($verb, 'e', -5, 5);
		$array[0][0] = "{$r}vais";
		$array[0][1] = "{$r}vas";
		$array[0][2] = $array[7][0] = "{$r}va";
		$array[0][5] = "{$r}vont";
	};	
/************************************************************************************************************/ 
/* Gruppe III : Verben enden auf -ir					                                                    */
/************************************************************************************************************/ 	
   if (in_array($verb, $avoir_irr))   { // avoir, ravoir Teil 2:
		$r = substr_replace($verb, '', -5, 5);
		$array[0] = array ("{$r}ai","{$r}as","{$r}a","{$r}avons","{$r}avez","{$r}ont");
		$array[1] = array ("{$r}avais","{$r}avais","{$r}avait","{$r}avions","{$r}aviez","{$r}avaient");
		$array[2] = array ("{$r}eus","{$r}eus","{$r}eut","{$r}eûmes","{$r}eûtes","{$r}eurent");
		$array[3] = array ("{$r}aurai","{$r}auras","{$r}aura","{$r}aurons","{$r}aurez","{$r}auront"); 
		$array[4] = array ("{$r}aie","{$r}aies","{$r}ait","{$r}ayons","{$r}ayez","{$r}aient");
		$array[5] = array ("{$r}eusse","{$r}eusses","{$r}ût","{$r}eussions","{$r}eussiez","{$r}eussent");
		$array[6] = array ("{$r}aurais","{$r}aurais","{$r}aurait","{$r}aurions","{$r}auriez","{$r}auraient");
		$array[7] = array ($r."aie",$r."ayons",$r."ayez");
		$array [8][0] = $r.'ayant';    	
};    

	if ($verb == 'fleurir') {     
$stamm2 = 'flor';  	
		foreach($zeiten as $zeit)	{ 
			foreach($array[$zeit] as $person => $value) {   			
				if ($zeit == 1 || $zeit == 8) 
				$array[$zeit][$person] .=  $red_slash.str_replace($stamm, $stamm2.'</u>', $value);// flor		 
			}   
		}  	                                                                                                           		           		
	};
	
if (in_array($verb, $pleuvoir))   {   // z. B. pleuvoir Teil 2 
$stamm2 = substr("$verb", 0, -6);
$array[0][2] = '<u>'.$stamm2.'eu</u>t';
$array[2][2] = '<u>'.$stamm2.'u</u>t';
$array[5][2] = '<u>'.$stamm2.'</u>ût';
};
 if (in_array($verb, $pouvoir))   {   // z. B. pouvoir  Teil 2  
  $stamm2 = substr("$verb", 0, -6);  // p...
  $array[0][0] =  $array[0][1] =  "{$stamm2}<u>eu</u>x";$array[0][2] = "{$stamm2}<u>eu</u>t";$array[0][5] = "{$stamm2}<u>e</u>uvent";
  $array[0][0] .= '<span class="text-danger"> / </span> puis';
  $array[2] = array ("<u>{$stamm2}</u>us","<u>{$stamm2}</u>us","<u>{$stamm2}</u>ut","<u>{$stamm2}</u>ûmes","<u>{$stamm2}</u>ûtes","<u>{$stamm2}</u>urent");   //wie $mouvoir,$savoir     
  $array[5] = array ("<u>{$stamm2}</u>usse","<u>{$stamm2}</u>usses","<u>{$stamm2}</u>ût","<u>{$stamm2}</u>ussions","<u>{$stamm2}</u>ussiez","<u>{$stamm2}</u>ussent");//wie $devoir

  $puiss = "<u>puiss</u>";  
  $array[4] = array ("{$puiss}e","{$puiss}es","{$puiss}e","{$puiss}ions","{$puiss}iez","{$puiss}ent");
  
  $stamm3 = substr("$verb", 0, -4);   //pou
  $array[3] = array ("{$stamm3}<u>r</u>rai","{$stamm3}<u>r</u>ras","{$stamm3}<u>r</u>ra","{$stamm3}<u>r</u>rons","{$stamm3}<u>r</u>rez","{$stamm3}<u>r</u>ent");  
  $array[6] = array ("{$stamm3}<u>r</u>rais","{$stamm3}<u>r</u>rais","{$stamm3}<u>r</u>rait","{$stamm3}<u>r</u>rions","{$stamm3}<u>r</u>riez","{$stamm3}<u>r</u>raient");  
	unset ($array[7]);
};
if (in_array($verb, $mouvoir ))   {   // z. B. mouvoir  Teil 2  
  $stamm2 = substr("$verb", 0, -6);  // m...     
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if ($zeit == 0 && in_array($person,array(0,1)) ||
			    $zeit == 7 && $person == 0)  
			$array[$zeit][$person] = $stamm2.'<u>eu</u>s';	
			if ($zeit == 0 && $person == 2 )     
			$array[$zeit][$person] = $stamm2.'<u>eu</u>t';		
			if ($zeit == 0 && $person == 5 )     
			$array[$zeit][$person] = $stamm2.'<u>eu</u>vent';					
			if ($zeit == 4 && in_array($person,array(0,1,2,5)))     
			$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>eu</u>v', $value); 
			if ($zeit == 2 || $zeit == 5 )   //wie $pouvoir,$savoir / $devoir,$pouvoir   Endungen wie immer bei OIR
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'</u>', $value);				
		}   
	}  
}; 
if (in_array($verb, $devoir))   {   // z. B. devoir, redevoir Teil 2  
  $stamm2 = substr("$verb", 0, -5);  // d...
  $array[0][0] = $array[0][1] = $array[7][0] = "{$stamm2}<u>oi</u>s";$array[0][2] = "{$stamm2}<u>oi</u>t";$array[0][5] = "{$stamm2}<u>oi</u>vent";     
  $array[2] = array ("<u>{$stamm2}</u>us","<u>{$stamm2}</u>us","<u>{$stamm2}</u>ut","<u>{$stamm2}</u>ûmes","<u>{$stamm2}</u>ûtes","<u>{$stamm2}</u>urent");   //wie $mouvoir,$savoir
  $array[4][0] = $array[4][2] =  "{$stamm2}<u>oiv</u>e";$array[4][1] = "{$stamm2}<u>oiv</u>es";$array[4][5] = "{$stamm2}<u>oiv</u>ent";
  $array[5] = array ("<u>{$stamm2}</u>usse","<u>{$stamm2}</u>usses","<u>{$stamm2}</u>ût","<u>{$stamm2}</u>ussions","<u>{$stamm2}</u>ussiez","<u>{$stamm2}</u>ussent"); //wie $mouvoir,$savoir   Endungen wie immer bei OIR
// participe passé	dû/dus - due/dues  
};  
if (in_array($verb, $falloir))   {   // z. B. falloir Teil 2  
$stamm2 = substr("$verb", 0, -5);
$array[0][2] = '<u>'.$stamm2.'u</u>t';
$array[3][2] = '<u>'.$stamm2.'ud</u>ra';
$array[4][2] = '<u>'.$stamm2.'ill</u>e';
$array[6][2] = '<u>'.$stamm2.'ud</u>rait';
};  
if (in_array($verb, $savoir))   {   // z. B. savoir,resavoir,...  Teil 2   
	$stamm2 = substr("$verb", 0, -5);   //s
	$array[0][0] = $array[0][1] =  "{$stamm2}a<u>i</u>s";$array[0][2] = "{$stamm2}a<u>i</u>t";  
	$array[2] = array ("<u>{$stamm2}</u>us","<u>{$stamm2}</u>us","<u>{$stamm2}</u>ut","<u>{$stamm2}</u>ûmes","<u>{$stamm2}</u>ûtes","<u>{$stamm2}</u>urent");   //wie $devoir
	$array[5] = array ("{$stamm2}<u>u</u>sse","{$stamm2}<u>u</u>sses","{$stamm2}<u>û</u>t","{$stamm2}<u>u</u>ssions","{$stamm2}<u>u</u>ssiez","{$stamm2}<u>u</u>ssent");//wie $devoir,$mouvoir,$pouvoir  Endungen wie immer bei OIR

	$stamm3 = substr("$verb", 0, -4);   //sa
	$array[3] = array ("{$stamm3}<u>u</u>rai","{$stamm3}<u>u</u>ras","{$stamm3}<u>u</u>ra","{$stamm3}<u>u</u>rons","{$stamm3}<u>u</u>rez","{$stamm3}<u>u</u>ent"); 
	$array[4] = array ("{$stamm3}<u>ch</u>e","{$stamm3}<u>ch</u>es","{$stamm3}<u>ch</u>e","{$stamm3}<u>ch</u>ions","{$stamm3}<u>ch</u>iez","{$stamm3}<u>ch</u>ent");  
	$array[6] = array ("{$stamm3}<u>u</u>rais","{$stamm3}<u>u</u>rais","{$stamm3}<u>u</u>rait","{$stamm3}<u>u</u>rions","{$stamm3}<u>u</u>riez","{$stamm3}<u>u</u>raient"); 
	$array[7] = array ("{$stamm3}<u>ch</u>e","{$stamm3}<u>ch</u>ons","{$stamm3}<u>ch</u>ez");
	$array[9] = array ("{$stamm3}<u>ch</u>ant"); 	
};       
if (in_array($verb, $valoir))   {   // z. B. valoir
	$stamm2 = '<u>'.substr("$verb", 0, -4);   
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if ($zeit == 0 && in_array($person,array(0,1)) ||
			    $zeit == 7 && $person == 0)  
			$array[$zeit][$person] = $stamm2.'u</u>x';	
			if ($zeit == 0 && $person == 2 )     
			$array[$zeit][$person] = $stamm2.'u</u>t';			
			if ($zeit == 4 && in_array($person,array(0,1,2,5)))     
			$array[$zeit][$person] = str_replace($stamm, $stamm2.'ill</u>', $value); 
			if ($zeit == 3 || $zeit == 6 )  // ändert $stamm bei  $array[3]/$array[6]   
			$array[$zeit][$person] = str_replace($stamm, $stamm2.'ud</u>', $value);		
		}   
	}   
}; 
if (in_array($verb, $courir))   {   // z. B. courir
  $array[0][0] = $array[0][1] = $array[7][0] = $stamm.'<u>s</u>';$array[0][2] = $stamm.'<u>t</u>';
  $array[2] = array ("{$stamm}<u>us</u>","{$stamm}<u>us</u>","{$stamm}<u>ut</u>","{$stamm}<u>ûmes</u>","{$stamm}<u>ûtes</u>","{$stamm}<u>urent</u>");  
  $array[5] = array ("{$stamm}<u>u</u>sse","{$stamm}<u>u</u>sses","{$stamm}<u>û</u>t","{$stamm}<u>u</u>ssions","{$stamm}<u>u</u>ssiez","{$stamm}<u>u</u>ssent"); //anstatt i/î->u/û 
}; 
if (in_array($verb, $mourir))   {   // z. B. mourir       
  $stamm2 = substr("$verb", 0, -5); 
  $array[0][0] = $array[0][1] = $array[7][0] = $stamm2.'<u>eur</u>s';$array[0][2] = $stamm2.'<u>eur</u>t'; $array[0][5] = $stamm2.'<u>eur</u>ent'; 
  $array[4][0] =  $array[4][2] = $stamm2.'<u>eur</u>e';$array[4][1] = $stamm2.'<u>eur</u>es';$array[4][5] = $stamm2.'<u>eur</u>ent';  
  $array[5] = array ("{$stamm}<u>u</u>sse","{$stamm}<u>u</u>sses","{$stamm}<u>û</u>t","{$stamm}<u>u</u>ssions","{$stamm}<u>u</u>ssiez","{$stamm}<u>u</u>ssent"); //anstatt i/î->u/û
}; 
	if (in_array($verb, $enir))   {   // z. B. tenir,venir Teil 2 
		$stamm2 = substr("$verb", 0, -4);     
		foreach($zeiten as $zeit) { 
			foreach($array[$zeit] as $person => $value)	{   
				if ($zeit == 0 && in_array($person,array(0,1,2)) ||
				    $zeit == 7 && $person == 0)   	    
					$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>ien</u>', $value);				
				if ($zeit == 4 && in_array($person,array(0,1,2,5)) || ($zeit == 0 && $person == 5))        
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>ienn</u>', $value); 
				if ($zeit == 2 || $zeit == 5)     
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>in</u>', $value);	
				if ($zeit == 2 && in_array($person,array(3,4)) ||
					$zeit == 5 && $person == 2)    
				$array[$zeit][$person] = str_replace($stamm, $stamm2, $value);				
				if ($zeit == 3 || $zeit == 6)     
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>iend</u>', $value);		
			}   
		}   	 
	};                         
if ((substr($verb,-7,7) == 'ouillir') and (in_array($verb, $ouillir)))   {   // z. B. bouillir           
  $stamm2 = substr("$verb", 0, -5); 
  $array[0][0] = $array[0][1] = $array[7][0] = "<u>".$stamm2.'s</u>';$array[0][2] = "<u>".$stamm2.'t</u>';  
  };  
if ((substr($verb,-7,7) == 'saillir') and (in_array($verb, $saillir)))   {   // z. B. saillir           
  $array[0][0] = $array[0][2] = $array[7][0] = $stamm.'<u>e</u>';$array[0][1] = $stamm.'<u>es</u>';  
};
if (in_array($verb, $querir))   {   // Teil 2 z. B. acquérir, conquérir
  $stamm2 = mb_substr("$verb", 0, -5); 
  $array[0][0] = $array[0][1] = $array[7][0] = $stamm2.'<u>ier</u>s';$array[0][2] = $stamm2.'<u>ier</u>t';$array[0][5] = $stamm2.'<u>ièr</u>ent';  
  $array[4][0] = $array[4][2]  = $stamm2.'<u>ièr</u>e';$array[4][1] = $stamm2.'<u>ièr</u>es';$array[4][5] = $stamm2.'<u>ièr</u>ent';  
  $array[2] = array ("{$stamm2}<u>i</u>s","{$stamm2}<u>i</u>s","{$stamm2}<u>i</u>t","{$stamm2}<u>î</u>mes","{$stamm2}<u>î</u>tes","{$stamm2}<u>i</u>rent");//nur Stammänderung -ér
  $array[3] = array ("{$stamm2}<u>er</u>rai","{$stamm2}<u>er</u>ras","{$stamm2}<u>er</u>ra","{$stamm2}<u>er</u>rons","{$stamm2}<u>er</u>rez","{$stamm2}<u>er</u>ront");// er 
  $array[5] = array ("{$stamm2}<u>i</u>sse","{$stamm2}<u>i</u>sses","{$stamm2}<u>î</u>t","{$stamm2}<u>i</u>ssions","{$stamm2}<u>i</u>ssiez","{$stamm2}<u>i</u>ssent"); //nur Stammänderung 
  $array[6] = array ("{$stamm2}<u>er</u>rais","{$stamm2}<u>er</u>rais","{$stamm2}<u>er</u>rait","{$stamm2}<u>er</u>rions","{$stamm2}<u>er</u>riez","{$stamm2}<u>er</u>raient");// er    
};     
if (in_array($verb, $vetir))   {   // z. B. Teil 1 avêtir
	$stamm2 = mb_substr("$verb", 0, -2);//vêt 

	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if ($zeit == 0 && in_array($person,array(0,1)) || $zeit == 7 && $person == 0)  
			$array[$zeit][$person] = '<u>'.$stamm2.'</u>s';	
			if ($zeit == 0 && $person == 2 )     
			$array[$zeit][$person] = '<u>'.$stamm2.'</u>';						
		}  
	}   		
};  
// 1. Gruppe von unregelmäßigen Verben auf -ir -dormir, mentir, -partir, -sentir, -servir, -sortir,    // Most French verbs ending in -mir, -tir, or -vir 
if (in_array($verb, $dormir) || in_array($verb, $tir) || in_array($verb, $servir) )   {   // z. B. dormir   KOMPLETT RICHTIG
  $stamm2 = substr("$verb", 0, -3);   
  $array[0][0] = $array[0][1]  = $array[7][0]  = '<u>'.$stamm2.'s</u>';
  $array[0][2]  = '<u>'.$stamm2.'t</u>'; 
};  
// 2. Gruppe von unregelmäßigen Verben auf -ir -couvrir, -cueillir, -découvrir, -offrir, -ouvrir, -souffrir
if ((substr($verb,-8,8) == 'cueillir') and (in_array($verb, $cueillir)))   {   // z. B. cueillir           
  $array[0][0] = $array[0][2] = $array[7][0] = $stamm.'<u>e</u>';$array[0][1] = $stamm.'<u>es</u>';  
  $array [2] = array("{$stamm}is", "{$stamm}is", "{$stamm}it", "{$stamm}îmes", "{$stamm}îtes", "{$stamm}irent"); //Standard auf -ir
  $array[3] = array ("{$stamm}<u>e</u>rai","{$stamm}<u>e</u>ras","{$stamm}<u>e</u>ra","{$stamm}<u>e</u>rons","{$stamm}<u>e</u>rez","{$stamm}<u>e</u>ront"); // mit e dazwischen
  $array[5]   = array ("{$stamm}isse","{$stamm}isses","{$stamm}ît","{$stamm}issions","{$stamm}issiez","{$stamm}issent"); // a/â gegen i/î wie auf -er  
  $array[6] = array ("{$stamm}<u>e</u>rais","{$stamm}<u>e</u>rais","{$stamm}<u>e</u>rait","{$stamm}<u>e</u>rions","{$stamm}<u>e</u>riez","{$stamm}<u>e</u>raient");
$passe = $stamm . 'i';  
};                                                              
if (in_array($verb, $rir))   {   // z. B. couvrir,offrir,ouvrir,souffrir ... NICHT  courir, conquérir, mourir   
  $array[0][0] = $array[0][2] = $array[7][0] = $stamm.'<u>e</u>';$array[0][1] = $stamm.'<u>es</u>';   
  $stamm2 = substr("$verb", 0, -3); 
}; 
// Rest von unregelmäßigen Verben auf -ir (as)seoir, courir, devoir, falloir, mourir, pleuvoir, pouvoir, (re)cevoir, savoir, tenir, valoir, venir, voir, vouloir		     
	if (in_array($verb, $seoir)) {     
$stamm2 = '<u>' . substr("$verb", 0, -4); //  ass  	
$ending3 = array('rai', 'ras', 'ra', 'rons', 'rez', 'ront'); // nur ohne ein 'i' davor wie $array[3] Endungen
$ending6 = array ('rais','rais','rait','rions','riez','raient');// nur ohne ein 'i' davor wie $array[6] Endungen
$assied  = '<u>assied</u>';	
		foreach($zeiten as $zeit)	{ 
			foreach($array[$zeit] as $person => $value) {   			
				$soir = array('assoir','rassoir','réassoir','s’assoir','sursoir'); // 10 Verben
				if (in_array($verb, $soir)) { // z. B. assoir  	
					$stamm2 = substr("$verb", 0, -3);	// ass  
				}			
				if ( 
				($zeit == 1 || $zeit == 7 || $zeit == 8) ||(($zeit == 0 || $zeit == 4) && in_array($person,array(3,4))) || ($zeit == 7 && person != 0)           
				)                                                         
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'oy</u>', $value). $red_slash.str_replace($stamm, $stamm2.'ey</u>', $value);
				if ($zeit == 2 || $zeit == 5) 
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'</u>', $value);             
				if (($zeit == 0 && in_array($person,array(0,1))) || ($zeit == 7 && $person == 0)) 
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'o</u>', $value). $red_slash.$assied.'s';				//  asso
				if ($zeit == 0 && $person == 2) 
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'o</u>', $value). $red_slash.$assied;  				//  asso			
				if ($zeit == 0 && $person == 5) 
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'eoi</u>', $value). $red_slash.$stamm2.'eyent</u>';	//  asso			
				if ($zeit == 3) 		
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'o</u>', $value). $red_slash.$stamm2.'ié</u>' . $ending3[$person]; // assoi/assié 							
				if ($zeit == 6) 	
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'o</u>', $value). $red_slash.$stamm2.'ié</u>' . $ending6[$person];	//  assoi/assié 		
				if ($zeit == 4 && !in_array($person,array(3,4)))     
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'oi</u>', $value). $red_slash.str_replace($stamm, $stamm2.'ey</u>', $value);  //  assoi/ asseye   
			}   
		}  	                                                                                                           		           		
	};
if (in_array($verb, $voir))   {   // z. B. voir Teil 2 + Ausnahmen für 'prévoir','pourvoir'  
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if ($zeit == 0 && in_array($person,array(0,1)) || $zeit == 7 && $person == 0)  
			$array[$zeit][$person] = '<u>'.$stamm.'oi</u>s';	
			if ($zeit == 0 && $person == 2 )     
			$array[$zeit][$person] = '<u>'.$stamm.'oi</u>t';			
			if ($zeit == 0 && $person == 5 || $zeit == 4 && in_array($person,array(0,1,2,5)))     
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm.'oi</u>', $value);		
			if ($zeit == 0 && in_array($person,array(3,4)) ||  $zeit == 1 || $zeit == 8 || $zeit == 4 && in_array($person,array(3,4)) || ($zeit == 7 && $person != 0))    
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm.'oy</u>', $value);
			if ($zeit == 3 || $zeit == 6)  // ändert $stamm bei  $array[3]/$array[6]   
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm.'er</u>', $value);	
			if (($zeit == 3 || $zeit == 6) && in_array($verb,array('prévoir','pourvoir')))  // ändert $stamm bei  $array[3]/$array[6]   
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm.'oi</u>', $value);			
			if (($zeit == 2 && in_array($person,array(0,1,2,5)) || $zeit == 5 && $person!=2 ) && ($verb != 'pourvoir')) 
			$array[$zeit][$person] = str_replace($stamm.'u', ''.$stamm.'i', $value);	// normale Endung ir,nicht oir!	
			if (($zeit == 2 && in_array($person,array(3,4)) || $zeit == 5 && $person==2) && ($verb != 'pourvoir'))     		
			$array[$zeit][$person] = str_replace($stamm.'û', ''.$stamm.'î', $value);	// normale Endung ir,nicht oir!					
		}  
	}   	
}; 
if (in_array($verb, $cevoir))   {   // z. B. apercevoir, coconcevoir  Teil 2                     
  $stamm2 = substr("$verb", 0, -6);  
  $array[0][0] = $array[0][1] = $array[7][0] = "{$stamm2}<u>çoi</u>s";$array[0][2] = "{$stamm2}<u>çoi</u>t"; $array[0][5] ="{$stamm2}<u>çoi</u>vent"; 
  $array[4][0] =  $array[4][2] = $stamm2.'<u>çoiv</u>e';$array[4][1] = $stamm2.'<u>çoiv</u>es';$array[4][5] = $stamm2.'<u>çoiv</u>ent';    
  foreach ($zeiten as $time) { // ändert bei  $array[2]/$array[5] den Stamm und fügt '<u>ç</u>' (frueher $between) zwischen Stamm und Endung
      foreach ($array[$time] as $time2 => $value) {
          $array[$time][$time2] = str_replace($stamm, $stamm2.'<u>ç</u>', $value);
      }
  }          
};
if (in_array($verb, $vouloir ))   {   // z. B. vouloir  Teil 2 
 	$stamm2 = substr("$verb", 0, -6);  // v...    
	$stamm3 = substr("$verb", 0, -4);  // vou      
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if (($zeit == 0 && in_array($person,array(0,1))) || ($zeit == 7 && $person == 0))  
			$array[$zeit][$person] = $stamm2.'<u>eu</u>x';	
			if ($zeit == 0 && $person == 2)  
			$array[$zeit][$person] = $stamm2.'<u>eu</u>t';	
			if ($zeit == 0 && $person == 5)  
			$array[$zeit][$person] = $stamm2.'<u>eu</u>lent';						
			if ($zeit == 4 && in_array($person,array(0,1,2,5)))     
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'euill</u>', $value); 		
			if ($zeit == 3 || $zeit == 6 )  
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm3.'d</u>', $value);		
		}   
	} 
$array[7][0] .= $red_slash. $array[4][0];
$array[7][1] .= $red_slash. '<u>'.$stamm2.'euill</u>ons';
$array[7][2] .= $red_slash. '<u>'.$stamm2.'euill</u>ez';    
 }; 
if (in_array($verb, $choir))   {   // z. B.  choir Teil 2
	$stamm2 = substr("$verb", 0, - 1); // chois	 
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   		
			if ($zeit == 0 && in_array($person,array(0,1)))
			$array[$zeit][$person] = $stamm2.'<u>s</u>';	 		
			if (($zeit == 0 && $person == 2)  )   
			$array[$zeit][$person] = $stamm2.'<u>t</u>';	
			if (($zeit == 0 && $person == 5)  )   
			$array[$zeit][$person] = $stamm2.'<u>ent</u>';		
			if ($zeit == 3 || $zeit == 6)     
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'</u>', $value);			
		}   
	}   
		$array [8][0] = '-';
	unset ($array [1],$array [4],$array [7]); // 4 = rare
};
if (in_array($verb, $faillir))   { 
$stamm2 = substr("$verb", 0, - 6); // f	 
$stamm3 = substr("$verb", 0, - 5).'ud'; // faud	 
$ending3 = array('rai', 'ras', 'ra', 'rons', 'rez', 'ront'); // nur ohne ein 'i' davor wie $array[3] Endungen
$ending6 = array ('rais','rais','rait','rions','riez','raient');// nur ohne ein 'i' davor wie $array[6] Endungen
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{  
			// $zeit == 0,1,5 veraltet 		
			if ($zeit == 0 && in_array($person,array(0,1))) 
			$array[$zeit][$person] = '<span class="text-muted"><i>'.$stamm2.'<u>aux</u></i></span>';	 		
			if ($zeit == 0 && $person == 2)     
			$array[$zeit][$person] = '<span class="text-muted"><i>'.$stamm2.'<u>aut</u></i></span>';	 			
			if ($zeit == 0 && in_array($person,array(3,4,5)) || $zeit == 1 || $zeit == 5)    
			$array[$zeit][$person] = str_replace($stamm, '<span class="text-muted"><i>'.$stamm, $value.'</i></span>');  
			if ($zeit == 3)    
			$array[$zeit][$person] .= $red_slash.'<span class="text-muted"><i><u>'.$stamm3.$ending3[$person].'</u></i></span>';  
			if ($zeit == 6)    
			$array[$zeit][$person] .= $red_slash.'<span class="text-muted"><i><u>'.$stamm3.$ending3[$person].'</u></i></span>';  
		}                                         
	}   
unset ($array[7],$imperatif_passe); // = rare 

};
if (in_array($verb, $fuir))   {   // z. B.  fuir
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   	
			if ($zeit == 0 && in_array($person,array(3,4)) || $zeit == 1 || $zeit == 4 && in_array($person,array(3,4)) || $zeit == 7 && $person != 0 || $zeit == 8)    
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm.'y</u>', $value);	
			if ($zeit == 0 && $person == 5 || $zeit == 4 && $person == 5)     
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm.'i</u>', $value);							
		}  
	}  
}; 
/************************************************************************************************************/ 
/* Gruppe III : Verben enden auf -re					                                                    */
/************************************************************************************************************/  
 
if ($verb == 'être' or $verb == 'r’être' or $verb == 're-être'){  
	$r = substr_replace($verb, '', -5, 5); 
	$array[0] = array ("{$r}suis","{$r}es","{$r}est","{$r}sommes","{$r}êtes","{$r}sont");
	$array[1] = array ("{$r}étais","{$r}étais","{$r}était","{$r}étions","{$r}étiez","{$r}étaient");
	$array[2] = array ("{$r}fus","{$r}fus","{$r}fut","{$r}fûmes","{$r}fûtes","{$r}furent");
	$array[3] = array ("{$r}serai","{$r}eras","{$r}sera","{$r}serons","{$r}serez","{$r}seront");      
	$array[4] = array ("{$r}sois","{$r}sois","{$r}soit","{$r}soyons","{$r}soyez","{$r}soient");
	$array[5] = array ("{$r}fusse","{$r}fusses","{$r}fût","{$r}fussions","{$r}fussiez","{$r}fussent");
	$array[6] = array ("{$r}serais","{$r}serais","{$r}serait","{$r}serions","{$r}seriez","{$r}seraient");           
	$array[7] = array ($array[4][0],$array[4][3],$array[4][4]);
	if ($verb == 'r’être'){  
	$re = 're'; 	// if no vowel change 'r’' in 're'
	$array[0][0] = "{$re}suis";$array[0][3] = "{$re}sommes";$array[0][5] = "{$re}sont";
	$array[2] = array ("{$re}fus","{$re}fus","{$re}fut","{$re}fûmes","{$re}fûtes","{$re}furent");
	$array[3] = array ("{$re}serai","{$re}eras","{$re}sera","{$re}serons","{$re}serez","{$re}seront");   
	$array[4] = array ("{$re}sois","{$re}sois","{$re}soit","{$re}soyons","{$re}soyez","{$re}soient");	
	$array[5] = array ("{$re}fusse","{$re}fusses","{$re}fût","{$re}fussions","{$re}fussiez","{$re}fussent");	
	$array[6] = array ("{$re}serais","{$re}serais","{$re}serait","{$re}serions","{$re}seriez","{$re}seraient");
	$array[7] = array ($array[4][0],$array[4][3],$array[4][4]);	
	}
 };  
 
if (in_array($verb, $prendre))   {   // comprendre, prendre
  $stamm = substr("$verb", 0, -3);
  $stamm2 = substr("$verb", 0, -5); 
  $array[0]   = array ("{$stamm}ds","{$stamm}ds","{$stamm}d","{$stamm}ons","{$stamm}ez","{$stamm}nent");
  $array[1]   = array ("{$stamm}ais","{$stamm}ais","{$stamm}ait","{$stamm}ions","{$stamm}iez","{$stamm}aient");               
  $array[2]   = array ("{$stamm2}is","{$stamm2}is","{$stamm2}it","{$stamm2}îmes","{$stamm2}îtes","{$stamm2}irent");                  
  $array[3]   = array ("{$stamm}drai","{$stamm}dras","{$stamm}dra","{$stamm}drons","{$stamm}drez","{$stamm}dront");
  $array[4]   = array ("{$stamm}ne","{$stamm}nes","{$stamm}ne","{$stamm}ions","{$stamm}iez","{$stamm}nent");
  $array[5]   = array ("{$stamm2}isse","{$stamm2}isses","{$stamm2}ît","{$stamm2}issions","{$stamm2}issiez","{$stamm2}issent");          
  $array[6]   = array ("{$stamm}drais","{$stamm}drais","{$stamm}drait","{$stamm}drions","{$stamm}driez","{$stamm}draient");  
  $array[7] = array ("{$stamm}ds","{$stamm}ons","{$stamm}ez"); // Soll WEG foreach
};           
if (in_array($verb, $battre))   { // Teil 2:  // battre, débattre,...  ALLE -attre
  $stamm2 = substr("$verb", 0, -2);   // ??? gleich stamm?
  $array[0]   = array ("{$stamm}s","{$stamm}s", "$stamm","{$stamm2}ons","{$stamm2}ez","{$stamm2}ent");
  $array[1]   = array ("{$stamm2}ais","{$stamm2}ais","{$stamm2}ait","{$stamm2}ions","{$stamm2}ez","{$stamm2}aient");               
  $array[2]   = array ("{$stamm2}is","{$stamm2}is","{$stamm2}it","{$stamm2}îmes","{$stamm2}îtes","{$stamm2}irent");                 
  $array[3]   = array ("{$stamm2}rai","{$stamm2}ras","{$stamm2}ra","{$stamm2}rons","{$stamm2}rez","{$stamm2}ront");
  $array[4]   = array ("{$stamm2}e","{$stamm2}es","{$stamm2}e","{$stamm2}ions","{$stamm2}iez","{$stamm2}ent");
  $array[5]   = array ("{$stamm2}isse","{$stamm2}isses","{$stamm2}ît","{$stamm2}issions","{$stamm2}issiez","{$stamm2}issent");          
  $array[6]   = array ("{$stamm2}rais","{$stamm2}rais","{$stamm2}rait","{$stamm2}rions","{$stamm2}riez","{$stamm2}raient"); 
  $array[7]   = array ("{$stamm}s","{$stamm2}ons","{$stamm2}ez");           
  
}; 
if (in_array($verb, $mettre))   {  // Teil 2:  // mettre, 
  $stamm2 = substr("$verb", 0, -2); 
  $stamm3 = substr("$verb", 0, -5); 
  
  $array[0]   = array ("{$stamm}s","{$stamm}s","$stamm","{$stamm2}ons","{$stamm2}ez","{$stamm2}ent");
  $array[1]   = array ("{$stamm2}ais","{$stamm2}ais","{$stamm2}ait","{$stamm2}ions","{$stamm2}iez","{$stamm2}aient");              
  $array[2]   = array ("{$stamm3}is","{$stamm3}is","{$stamm3}it","{$stamm3}îmes","{$stamm3}îtes","{$stamm3}irent");                   
  $array[3]   = array ("{$stamm2}rai","{$stamm2}ras","{$stamm2}ra","{$stamm2}rons","{$stamm2}rez","{$stamm2}ront");
  $array[4]   = array ("{$stamm2}e","{$stamm2}es","{$stamm2}e","{$stamm2}ions","{$stamm2}iez","{$stamm2}ent");
  $array[5]   = array ("{$stamm3}isse","{$stamm3}isses","{$stamm3}ît","{$stamm3}issions","{$stamm3}issiez","{$stamm3}issent");          
  $array[6]   = array ("{$stamm2}rais","{$stamm2}rais","{$stamm2}rait","{$stamm2}drions","{$stamm2}riez","{$stamm2}raient");    
  $array[7]   = array ("{$stamm}s","{$stamm2}ons","{$stamm2}ez");            
}; 
if (in_array($verb, $rompre))   {  // corrompre,rompre,...
  $array[0][2] = "{$stamm}t";
}; 
if (in_array($verb, $clore))   {  // Teil 1 clore,...
  $stamm2 = substr("$verb", 0, -3);  // cl
		foreach($zeiten as $zeit) { 
			foreach($array[$zeit] as $person => $value)	{   
				if (  $zeit == 1 || $zeit == 2 || $zeit == 5)     	    
					$array[$zeit][$person] = '-';		
				if ($zeit == 0 && $person == 2)     
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>ô</u>', $value);	
				if ($zeit == 0 && in_array($person,array(3,4,5)) || $zeit == 4 || $zeit == 7 && $person != 0 || $zeit == 8)  			   
				$array[$zeit][$person] = str_replace($stamm, $stamm.'<u>s</u>', $value);				
			}   
		}   	 
}; 
if (in_array($verb, $bruire))   {  // bruire 
  $stamm2 = substr("$verb", 0, -3);  
foreach($zeiten as $zeit) { 
			foreach($array[$zeit] as $person => $value)	{   
				if ($zeit == 0 && !in_array($person,array(2,5)) || $zeit == 1 && !in_array($person,array(2,5)) || $zeit == 2 || $zeit == 3 || $zeit == 4 && !in_array($person,array(2,5)) || $zeit == 5 || $zeit == 6 || $zeit == 7)     	    
					$array[$zeit][$person] = '-';
				if (($zeit == 0 && $person == 5) || $zeit == 1 && in_array($person,array(2,5)) || $zeit == 4 && in_array($person,array(2,5)))     	    
				$array[$zeit][$person] = str_replace($stamm, $stamm.'<u>ss</u>', $value);						
			}   
		}  
     unset ($aux_exts[0], $aux_exts[1], $aux_exts[2], $aux_exts[3], $aux_exts[4], $aux_exts[5], $aux_exts[6], $aller );	// changing with '-' maybe
};
if (in_array($verb, $circoncire) || in_array($verb, $confire))   {   // z. B.  circoncire Teil 2  confire Teil 2
	$stamm2 = substr("$verb", 0, -3);// maud /conf 
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if (($zeit == 0 && in_array($person,array(3,4,5))) || $zeit == 7 && $person!= 0 || $zeit == 1 || $zeit == 4 || $zeit == 8)  
			$array[$zeit][$person] = str_replace($stamm, $stamm.'<u>s</u>', $value); 	
			if ($zeit == 2 || $zeit == 5)   
			$array[$zeit][$person] = str_replace($stamm, $stamm2, $value);			
		}   
	} 	  
};
if (in_array($verb, $occire))   {   // z. B.  occire Teil 2

for ($i = 0; $i <= 7; $i++) {
	unset ($array [$i]);         
      }
for ($i = 0; $i <= 6; $i++) {
	unset ($aux_exts[$i]);        
      }	  
	unset ($aller,$imperatif_passe); //  ,$gerontif_present deleted 'en'-part missing 
	$array [8][0] = '-';
};
if (in_array($verb, $foutre))   {   // z. B.  foutre Teil 2
	$stamm2 = substr("$verb", 0, - 3); // fou	 
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   		
			if ($zeit == 0 && in_array($person,array(0,1)) || $zeit == 7 && $person== 0)
			$array[$zeit][$person] = $stamm2.'<u>s</u>';	 		
			if (($zeit == 0 && $person == 2)  )   
			$array[$zeit][$person] = $stamm2.'<u>t</u>';			
			// 2,5 = rare	
		}   
	}  
};
if (in_array($verb, $oiitre))   {   // z. B.  accroître Teil 2
	$stamm2 = mb_substr("$verb", 0, -3);// accroî 
    $stamm3 = mb_substr("$verb", 0, -6);// accr  	
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
				$oitre = array('accroitre','décroitre','réaccroitre','recroitre','redécroitre','s’accroitre','se réaccroitre','surcroitre'); // 8 Verben
				if (in_array($verb, $oitre)) { // z. B.  accroitre Teil 2
				$stamm2 = mb_substr("$verb", 0, -3);// accroi 
				$stamm3 = substr("$verb", 0, -5);// accr  
				} 				
			if (($zeit == 0 && in_array($person,array(3,4,5))) || $zeit == 1 || $zeit == 4 || $zeit == 7 && $person!= 0 || $zeit == 8)  
			$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>ss</u>', $value);                                                    
			if ($zeit == 0 && in_array($person,array(0,1,2)) || $zeit == 7 && $person == 0)  
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'</u>', $value);	
			if ($zeit == 0 && in_array($person,array(0,1)) || $zeit == 7 && $person == 0 and !in_array($verb,$oitre) )  
			$array[$zeit][$person] .= $red_slash.$stamm3.'ois';			
			if ($zeit == 2 || $zeit == 5)   
			$array[$zeit][$person] = str_replace($stamm, $stamm3, $value);			
		}   
	} 	 
};
if (in_array(substr("$verb", -6, 6), array("aindre", "eindre", "oindre")))  {  // Teil 2:   craindre, peindre, joindre   bzw. nur -indre
  $stamm = substr("$verb", 0, -3);  
  $stamm_g = substr("$verb", 0, -4)."gn"; 
  $stamm_d = substr("$verb", 0, -2);  // ??? gleich stamm? 
  $array[0]   = array ("{$stamm}s","{$stamm}s"."$stamm","{$stamm_g}ons","{$stamm_g}ez","{$stamm_g}ent");
  $array[1]   = array ("{$stamm_g}ais","{$stamm_g}ais","{$stamm_g}ait","{$stamm_g}ions","{$stamm_g}iez","{$stamm_g}aient");               
  $array[2]   = array ("{$stamm_g}is","{$stamm_g}is","{$stamm_g}it","{$stamm_g}îmes","{$stamm_g}îtes","{$stamm_g}irent");                     
  $array[3]   = array ("{$stamm_d}rai","{$stamm_d}ras","{$stamm_d}ra","{$stamm_d}rons","{$stamm_d}rez","{$stamm_d}ront");
  $array[4]   = array ("{$stamm_g}e","{$stamm_g}es","{$stamm_g}e","{$stamm_g}ions","{$stamm_g}iez","{$stamm_g}ent");
  $array[5]   = array ("{$stamm_g}isse","{$stamm_g}isses","{$stamm_g}ît","{$stamm_g}issions","{$stamm_g}issiez","{$stamm_g}issent");          
  $array[6]   = array ("{$stamm_d}rais","{$stamm_d}rais","{$stamm_d}rait","{$stamm_d}rions","{$stamm_d}riez","{$stamm_d}raient"); 
  $array[7]   = array ("{$stamm}s","{$stamm_g}ons","{$stamm_g}ez");
  $array [8][0] = $stamm_g.'ant';            
};
if (in_array($verb, $boire))   {   // z. B. boire Teil 2   
		$stamm2 = substr("$verb", 0, -4);     
		foreach($zeiten as $zeit) { 
			foreach($array[$zeit] as $person => $value)	{   
				if ($zeit == 0 && in_array($person,array(3,4)) || $zeit == 7 && in_array($person,array(1,2)))     	    
					$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>uv</u>', $value);
				if (($zeit == 0 && $person == 5) || $zeit == 4 && (!in_array($person,array(3,4))) )     
				$array[$zeit][$person] = str_replace($stamm, $stamm.'<u>v</u>', $value);				
				if ($zeit == 1 || $zeit == 8)     
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>uv</u>', $value);			
				if ($zeit == 2 || $zeit == 5)     
				$array[$zeit][$person] = str_replace($stamm, $stamm2, $value); 
				if ($zeit == 4 && (in_array($person,array(3,4))))    
				$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>uv</u>', $value);								
			}   
		}   	 
}; 	
if (in_array($verb, $croire))   {  // z. B. croire Teil 2   
	$stamm2 = substr("$verb", 0, -3); 
	$stamm3 = substr("$verb", 0, -4);     
		foreach($zeiten as $zeit) { 
			foreach($array[$zeit] as $person => $value)	{   
				if ($zeit == 0 && in_array($person,array(3,4,5)) || $zeit == 1 || $zeit == 4 && (in_array($person,array(3,4))) || $zeit == 7 && in_array($person,array(1,2)) || $zeit == 8)     	    
					$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>y</u>', $value);
				if ($zeit == 2 || $zeit == 5)     
				$array[$zeit][$person] = str_replace($stamm, $stamm3, $value); 				
			}   
		} 
}; 
if (in_array($verb, $naiitre))   {  // z. B. naître Teil 2
	$stamm2 = mb_substr("$verb", 0, -3); 
	$stamm2 = mb_substr_replace($stamm2 , 'i', -1,1);
	$stamm3 = mb_substr("$verb", 0, -5);      
		foreach($zeiten as $zeit) { 
			foreach($array[$zeit] as $person => $value)	{   
				if ($zeit == 0 && in_array($person,array(3,4,5)) || $zeit == 1 || $zeit == 4 || $zeit == 7 && in_array($person,array(1,2)) || $zeit == 8)     	    
					$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>ss</u>', $value);
				if ($zeit == 0 && in_array($person,array(0,1)) || $zeit == 7 && $person == 0)      
				$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'</u>', $value);				
				if ($zeit == 2 || $zeit == 5)     
				$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm3.'qu</u>', $value); 											
			}   
		}  	
};   
if (in_array($verb, $naitre))   {  // z. B. naitre Teil 2 
$stamm2 = mb_substr("$verb", 0, -3); 
	$stamm2 = substr_replace($stamm2 , 'i', -1,1);
	$stamm3 = substr("$verb", 0, -4);       
		foreach($zeiten as $zeit) { 
			foreach($array[$zeit] as $person => $value)	{   
				if ($zeit == 0 && in_array($person,array(3,4,5)) || $zeit == 1 || $zeit == 4 || $zeit == 7 && in_array($person,array(1,2)) || $zeit == 8)     	    
					$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>ss</u>', $value);
				if ($zeit == 0 && in_array($person,array(0,1)) || $zeit == 7 && $person == 0)      
				$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'</u>', $value);				
				if ($zeit == 2 || $zeit == 5)     
				$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm3.'qu</u>', $value); 											
			}   
		}  	
}; 
if (in_array($verb, $aiitre))   {  // z. B. apparaître,connaître Teil 2 	
	$stamm2 = mb_substr("$verb", 0, -3); 
	$stamm2 = mb_substr_replace($stamm2 , 'i', -1,1);
	$stamm3 = mb_substr("$verb", 0, -6);        
		foreach($zeiten as $zeit) { 
			foreach($array[$zeit] as $person => $value)	{   
				if ($zeit == 0 && in_array($person,array(3,4,5)) || $zeit == 1 || $zeit == 4 || $zeit == 7 && in_array($person,array(1,2)) || $zeit == 8)     	    
					$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>ss</u>', $value);
				if ($zeit == 0 && in_array($person,array(0,1)) || $zeit == 7 && $person == 0)      
				$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'</u>', $value);				
				if ($zeit == 2 || $zeit == 5)     
				$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm3.'</u>', $value); 											
			}   
		}  	
};
if (in_array($verb, $aitre))   {  // z. B. apparaitre,connaitre Teil 2 	
	$stamm2 = mb_substr("$verb", 0, -3); 
	$stamm2 = mb_substr_replace($stamm2 , 'i', -1,1);
	$stamm3 = mb_substr("$verb", 0, -5); 
		foreach($zeiten as $zeit) { 
			foreach($array[$zeit] as $person => $value)	{   
				if ($zeit == 0 && in_array($person,array(3,4,5)) || $zeit == 1 || $zeit == 4 || $zeit == 7 && in_array($person,array(1,2)) || $zeit == 8)     	    
					$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>ss</u>', $value);
				if ($zeit == 0 && in_array($person,array(0,1)) || $zeit == 7 && $person == 0)      
				$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'</u>', $value);				
				if ($zeit == 2 || $zeit == 5)     
				$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm3.'</u>', $value); 											
			}   
		}  	
};  
if (in_array($verb, $faire))   {	// z.B. faire, contrefaire  Teil 2      
  $stamm2 = substr("$verb", 0, -4);    // f..       
		foreach($zeiten as $zeit) { 
			foreach($array[$zeit] as $person => $value)	{   
				if ($zeit == 0 && $person==3 || $zeit == 1 || $zeit == 7 && $person==1 || $zeit == 8)     	    
					$array[$zeit][$person] = str_replace($stamm, $stamm.'<u>s</u>', $value);
				if ($zeit == 0 && $person==4 || $zeit == 7 && $person==2)     	    
					$array[$zeit][$person] = $stamm.'<u>tes</u>';				
				if ($zeit == 0 && $person == 5)     	    
					$array[$zeit][$person] = '<u>'.$stamm2.'</u>ont';	
				if ($zeit == 2 || $zeit == 5)     
					$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'</u>', $value); 					
				if ($zeit == 3 || $zeit == 6)   
					$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'e</u>', $value);				
				if ($zeit == 4)     
					$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'ass</u>', $value); 														
			}   
		}   
  };   
if (in_array($verb, $plaire) || in_array($verb, $raire) || in_array($verb, $taire))   { // Teil 2: -plaire, -taire, -raire,...
  $stamm2 = substr("$stamm", 0, -2);       
		foreach($zeiten as $zeit) { 
			foreach($array[$zeit] as $person => $value)	{   
				if (($zeit == 0 && in_array($person,array(3,4,5)) || $zeit == 1 || $zeit == 4 ||$zeit == 7 && $person!=0 || $zeit == 8))     	    
					$array[$zeit][$person] = str_replace($stamm, $stamm.'<u>s</u>', $value);	
				if ($zeit == 0 && $person == 2 && in_array($verb, $plaire))     
					$array[$zeit][$person] = str_replace($stamm, substr_replace($stamm, '<u>î</u>', -1, 1), $value);							
				if ($zeit == 2 || $zeit == 5)     
					$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'</u>', $value);			
			}   
		} 
  if (in_array($verb, $raire))   {	// z.B. traire
	unset ($array[2], $array[5]);
	};			
};
if (in_array($verb, $suivre))   {	// z.B. suivre  Teil 2    
$stamm2 = substr("$verb", 0, -3);// sui 
$stamm3 = substr("$verb", 0, -4); // su  
$zeiten = array(0, 7);        
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if (($zeit == 0 && in_array($person,array(0,1,2))) || ($zeit == 7 && $person == 0))  
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'</u>', $value);						
		}   
	} 
};
if (in_array($verb, $vivre))   {	// z.B. vivre  Teil 2    
$stamm2 = substr("$verb", 0, -3);// vi  
$stamm3 = substr("$verb", 0, -4); // v        
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if (($zeit == 0 && in_array($person,array(0,1,2))) || ($zeit == 7 && $person == 0))  
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm2.'</u>', $value);
			if ($zeit == 2 || $zeit == 5)  
			$array[$zeit][$person] = str_replace($stamm, '<u>'.$stamm3.'éc</u>', $value);						
		}   
	} 	
};
if (in_array($verb, $dire))   {	// z.B. dire  Teil 2   
	$stamm2 = substr("$verb", 0, -3);// vi  
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if (($zeit == 0 && in_array($person,array(3,4))) || $zeit == 7 && $person!= 0 || $zeit == 1 || $zeit == 4 || $zeit == 8)  
			$array[$zeit][$person] = str_replace($stamm, $stamm.'<u>s</u>', $value);  // gilt [0][4] gilt für 'contredire','interdire','médire'
			if (($zeit == 0 && $person== 4 || $zeit == 7 && $person== 2) && in_array($verb,array('dire','entre-dire','redire','reredire','s’entre-dire','se dire')))
			$array[$zeit][$person] = $stamm.'<u>tes</u>';	                                                    
			if ($zeit == 0 && $person== 5)   
			$array[$zeit][$person] = str_replace($stamm, $stamm.'<u>t</u>', $value);	
			if ($zeit == 2 || $zeit == 5)   
			$array[$zeit][$person] = str_replace($stamm, $stamm2, $value);			
		}   
	} 	
};
if (in_array($verb, $maudire))   {   // z. B.  maudire Teil 2
	$stamm2 = substr("$verb", 0, -3);// maud  
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if (($zeit == 0 && in_array($person,array(3,4,5))) || $zeit == 7 && $person!= 0 || $zeit == 1 || $zeit == 4 || $zeit == 8)  
			$array[$zeit][$person] = str_replace($stamm, $stamm.'<u>ss</u>', $value); 	
			if ($zeit == 2 || $zeit == 5)   
			$array[$zeit][$person] = str_replace($stamm, $stamm2, $value);			
		}   
	} 	 
};
if (in_array($verb, $rire))   {	// z.B. rire  Teil 2  
$stamm2 = substr("$verb", 0, -3);// ri  
foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if ($zeit == 2 || $zeit == 5)   
			$array[$zeit][$person] = str_replace($stamm, $stamm2, $value);			
		}   
	} 	
};
if (in_array($verb, $crire))   {  // Teil 2: écrire, décrire, récrire,souscrire
  $stamm2 = substr("$verb", 0, -2)."<u>v</u>"; 
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   			
			if ($zeit == 0 && in_array($person,array(3,4,5)) || $zeit == 1 || $zeit == 2 || $zeit == 4 || $zeit == 5 || $zeit == 7 && $person!=0 || $zeit == 8) 
			$array[$zeit][$person] = str_replace($stamm, $stamm2, $value);			
		}   
	} 	
};  
if (in_array($verb, $lire))   {	// z.B. lire  Teil 2   
	$stamm2 = substr("$verb", 0, - 3);
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if (($zeit == 0 && in_array($person,array(3,4,5))) || $zeit == 7 && $person!= 0 || $zeit == 1 || $zeit == 4 || $zeit == 8)  
			$array[$zeit][$person] = str_replace($stamm, $stamm.'<u>s</u>', $value);  // gilt [0][4] gilt für 'contredire','interdire','médire'				
		}   
	} 	
};
if (in_array($verb, $frire))   {	// z.B. frire  Teil 2 
unset ($array [1], $array [2], $array [4], $array [5], $array [8]);  
for ($i = 3; $i <= 5; $i++) {
	unset ($array [0][$i]);        
      }
	unset ($array [7][1],$array [7][2]);    
};
if (in_array($verb, $clure))   {	// z.B. conclure  Teil 2  
$stamm2 = substr("$verb", 0, -3);// concl  
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if ($zeit == 2 || $zeit == 5)   
			$array[$zeit][$person] = str_replace($stamm, $stamm2, $value);			
		}   
	} 	 
};
if (in_array($verb, $uire))   {	// z.B. uire  Teil 2  conduire
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if ($zeit == 0 && in_array($person,array(3,4,5)) || $zeit == 1  || $zeit == 2|| $zeit == 4 || $zeit == 5 || $zeit == 7 && in_array($person,array(1,2)) || $zeit == 8) $array[$zeit][$person] = str_replace($stamm, $stamm.'<u>s</u>', $value);						
		}   
	}  
};
if (in_array($verb, $suffire))   {	// z.B. suffire Teil 2  
	$stamm2 = substr("$verb", 0, - 3);
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if (($zeit == 0 && in_array($person,array(3,4,5))) || $zeit == 7 && $person!= 0 || $zeit == 1 || $zeit == 4 || $zeit == 8)  
			$array[$zeit][$person] = str_replace($stamm, $stamm.'<u>s</u>', $value);  // gilt [0][4] gilt für 'contredire','interdire','médire'	
			if ($zeit == 2 || $zeit == 5)   
			$array[$zeit][$person] = str_replace($stamm, $stamm2, $value);			
		}   
	}  
};
if (in_array($verb, $coudre))   {	// z.B. coudre Teil 2  
	$stamm2 = substr("$verb", 0, - 3);
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if (($zeit == 0 && in_array($person,array(3,4,5))) || $zeit == 7 && $person!= 0 || $zeit == 1 ||$zeit == 2 || $zeit == 4 || $zeit == 5 || $zeit == 8)  
			$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>s</u>', $value);  
			if ($zeit == 0 && $person == 2)   
			$array[$zeit][$person] = $stamm;				
		}   
	} 
};
if (in_array($verb, $moudre))   {	// z.B. moudre Teil 2  
	$stamm2 = substr("$verb", 0, - 3);
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if (($zeit == 0 && in_array($person,array(3,4,5))) || $zeit == 7 && $person!= 0 || $zeit == 1 ||$zeit == 2 || $zeit == 4 || $zeit == 5 || $zeit == 8)  
			$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>l</u>', $value);  
			if ($zeit == 0 && $person == 2)   
			$array[$zeit][$person] = $stamm;				
		}   
	} 
};
if (in_array($verb, $soudre) or in_array($verb, $resoudre))   {	// z.B. soudre,résoudre Teil 2  
	$stamm2 = substr("$verb", 0, - 3); // résou
	$stamm3 = substr("$verb", 0, - 4); // réso	 
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if (($zeit == 0 && in_array($person,array(3,4,5))) || $zeit == 7 && $person!= 0 || $zeit == 1 || $zeit == 4 || $zeit == 8)  
			$array[$zeit][$person] = str_replace($stamm, $stamm3.'<u>lv</u>', $value); 
			if ($zeit == 0 && in_array($person,array(0,1)) || $zeit == 7 && $person== 0)
			$array[$zeit][$person] = $stamm2.'<u>s</u>';	 		
			if ($zeit == 0 && $person == 2)   
			$array[$zeit][$person] = $stamm2.'<u>t</u>';			
			if ($zeit == 2 || $zeit == 5)    // rare and outdated
			$array[$zeit][$person] = str_replace($stamm, $stamm3.'<u>l</u>', $value); 		
		}   
	} 
};
if (in_array($verb, $vaincre))   {	// z.B. vaincre Teil 2  	
	$stamm2 = substr("$verb", 0, - 3); // vain 
	foreach($zeiten as $zeit) { 
		foreach($array[$zeit] as $person => $value)	{   
			if (($zeit == 0 && in_array($person,array(3,4,5))) || $zeit == 7 && $person!= 0 || $zeit == 1 || $zeit == 4 || $zeit == 2 || $zeit == 5 || $zeit == 8)  
			$array[$zeit][$person] = str_replace($stamm, $stamm2.'<u>qu</u>', $value); 				
			if ($zeit == 0 && $person == 2)   
			$array[$zeit][$person] = $stamm;					
		}   
	} 
};
$re = array("andre", "erdre", "ondre", "ordre", "endre");    // z.B. rendre   // funktioniert nicht? 
if (in_array(substr("$verb", -5, 5), $re) and (in_array($verb, $dre)) and (!in_array($verb, $prendre))) {   // -RE mit Stammerweiterung -d   
  $array[0][2] = $stamm;      
};    
?>
<link rel="stylesheet" type="text/css" media="screen" property="stylesheet" href="../../tabs.css" /> 
<?php 
require_once 'classes/Auxiliaire.php';
require_once 'classes/InfinitiveVerb.php';
require_once 'groups/verbes_pronominaux.php';
require_once 'groups/verbes_exclusivement_pronominaux.php';
require_once 'groups/verbes_intransitifs.php';
require_once 'groups/verbes_transitifs.php';
require_once 'groups/irregular-verb-groups.php';
require_once 'groups/verbes_defectifs.php';
require_once 'groups/verbes_en_ancien.php';
require_once 'groups/verbes_impersonnels.php';	
require_once 'groups/verbes_defectifs.php';	

		$func_array=[preg_grep("/.*er$/",$infinitiveVerb),preg_grep("/.*[iï]r$/",$infinitiveVerb),preg_grep("/.*re$/",$infinitiveVerb),
		array_diff($infinitiveVerb,Auxiliaire::getVerbsThatUse(new Auxiliaire(Auxiliaire::Etre))),Auxiliaire::getVerbsThatUse(new Auxiliaire(Auxiliaire::Etre)),Auxiliaire::getVerbsThatUse(new Auxiliaire(Auxiliaire::AvoirandEtre)),
		$verbes_pronominaux,array_diff($infinitiveVerb,$verbes_pronominaux),$verbes_exclusivement_pronominaux,$verbes_transitifs,$verbes_intransitifs,$verbes_en_ancien,$verbes_defectifs,$impersonnels,
		$cer,$ger,$eler_ele,$eler_elle,$eter_ete,$eter_ette,$yer_ie,$e_akut_er,$ecer,$eger,$eyer,$envoyer,
		$vouloir,$avoir_irr,$voir,$cevoir,$devoir,$mouvoir,$pleuvoir,$pouvoir,$savoir,$falloir,$seoir,$valoir,$haiir,
		$indre,$battre,$crire,$mettre,$prendre,$rompre,$etre_irr,$faire];

		if($_GET["buchstabe"]=="kategorien"){
			$per_page=200;
			$params=explode($char_split,$_GET["verb"]);
			$num=0;
			$start=0;
			$page=0;
			if(count($params)>1)
				$page=$params[1];
			$start=$page*$per_page;
			
			$h1="Unknown group name!!!";
			for($a=0;$a<count($kategorien);$a++)
				if($params[0]==$kategorien[$a]){
					$array=$func_array[$a];
					$h1=$titles[$a];
					break;
				}
			echo '<h1>Kategorie: '.$h1.'</h1>';
			echo '<table width="100%">';
			$array = array_chunk($array, 4);
			foreach($array as $chunk){
				if($num>=$start) echo '<tr>';
				foreach($chunk as $val){
					$num++;
					if($num<=$start) continue;
					if($num>$start+$per_page) break;
					echo '<td><a class="franzoesisch" href="../../'.mb_substr($val,0,1,'utf-8').'/'.$val.'/">'.$val.'</a></td>';
				}
				if($num>$start+$per_page) break;
				if($num>$start) '</tr>';
			}
			echo '</table>';
			echo '<div id="prev_next">';
			if($page>0)
				echo '<a href="../'.$params[0].$char_split.($page-1).'/">&lt; Vorherige</a>';
			if($num>$start+$per_page)
				echo '<a href="../'.$params[0].$char_split.($page+1).'/">Nächste &gt;</a>';
			echo '</div>';
		}else{  
?>

<h1><?php echo $_GET['verb'];?></h1>
<?php translation($_GET['verb'],$fr_de[$_GET['verb']]); 
echo '<h2 class="home">Die Konjugation von '.$_GET['verb'].'</h2>';
$infinitiveVerb = new InfinitiveVerb($_GET['verb']);
if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::AvoirandEtre))) { 
?> 
<div class="tabbable boxed parentTabs">
   <ul class="nav nav-tabs">
      <li class="active"><a href="#auxiliary1">intransitiv (Hilfsverb être)</a>
      </li>
      <li><a href="#auxiliary2">transitiv (Hilfsverb avoir)</a>
      </li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane fade active in" id="auxiliary1">
         <div class="tabbable">
            <ul class="nav nav-tabs">
               <li class="active"><a href="#sentence-type11">Aussagesatz</a>
               </li>
               <li><a href="#sentence-type12">Fragesatz</a>
               </li>
               <li><a href="#sentence-type13">Verneinung</a>
               </li>
            </ul>
            <div class="tab-content">
               <div class="tab-pane fade active in" id="sentence-type11">
                  <div class="tabbable">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#etre-voice111">aktiv</a>
                        </li>
                        <li><a href="#etre-voice112">passiv</a>
                        </li>
						<?php	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Etre)) && in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<li><a href="#etre-voice113">pronominal</a>
						</li>
						<?php } ?>							
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane fade active in" id="etre-voice111">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#etre-voice-gender1111">männlich</a>
                                 </li>
                                 <li><a href="#etre-voice-gender1112">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="etre-voice-gender1111">
									<?php
									$css_class = 'green';
									require_once("text.php");
									print_explanatory_text($infinitiveVerb);
									print_conjugations_of_verb($infinitiveVerb, new Auxiliaire(Auxiliaire::Etre)); 
									?>
                                 </div>
                                 <div class="tab-pane fade" id="etre-voice-gender1112">
								 il = elle / ils = elles
                                    <?php
									$css_class = 'ForestGreen';
									$number = '4';
									require_once("text.php");
									print_explanatory_text($infinitiveVerb);
									print_conjugations_of_verb($infinitiveVerb, new Auxiliaire(Auxiliaire::Etre)); 
									?>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="etre-voice112">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#etre-voice-gender1121">männlich</a>
                                 </li>
                                 <li><a href="#etre-voice-gender1122">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="etre-voice-gender1121">
                                    <p>Tab 1.1.2.1 être Aussage passiv männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="etre-voice-gender1122">
                                    <p>Tab 1.1.2.2 être Aussage passiv weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="etre-voice113">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#etre-voice-gender1131">männlich</a>
                                 </li>
                                 <li><a href="#etre-voice-gender1132">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="etre-voice-gender1131">
                                    <p>Tab 1.1.3.1 être Aussage pronominal männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="etre-voice-gender1132">
                                    <p>Tab 1.1.3.2 être Aussage pronominal weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>						
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="sentence-type12">
                  <div class="tabbable">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#etre-voice121">aktiv</a>
                        </li>
                        <li><a href="#etre-voice122">passiv</a>
                        </li>
						<?php	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Etre)) && in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<li><a href="#etre-voice123">pronominal</a>
						</li>
						<?php } ?>						
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane fade active in" id="etre-voice121">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#etre-voice-gender1211">männlich</a>
                                 </li>
                                 <li><a href="#etre-voice-gender1212">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="etre-voice-gender1211">
                                    <p>Tab 1.2.1.1 être Frage aktiv männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="etre-voice-gender1212">
                                    <p>Tab 1.2.1.2 être Frage aktiv weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="etre-voice122">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#etre-voice-gender1221">männlich</a>
                                 </li>
                                 <li><a href="#etre-voice-gender1222">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="etre-voice-gender1221">
                                    <p>Tab 1.2.2.1 être Frage passiv männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="etre-voice-gender1222">
                                    <p>Tab 1.2.2.2 être Frage passiv weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="etre-voice132">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#etre-voice-gender1231">männlich</a>
                                 </li>
                                 <li><a href="#etre-voice-gender1232">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="etre-voice-gender1231">
                                    <p>Tab 1.2.3.1 être Frage pronominal männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="etre-voice-gender1232">
                                    <p>Tab 1.2.3.2 être Frage pronominal weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>						
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="sentence-type13">
                  <div class="tabbable">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#etre-voice131">aktiv</a>
                        </li>
                        <li><a href="#etre-voice132">passiv</a>
                        </li>
						<?php	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Etre)) && in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<li><a href="#voice133">pronominal</a>
						</li>
						<?php } ?>							
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane fade active in" id="etre-voice131">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#etre-voice-gender1311">männlich</a>
                                 </li>
                                 <li><a href="#etre-voice-gender1312">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="etre-voice-gender1311">
                                    <p>Tab 1.3.1.1 être Verneinung aktiv männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="etre-voice-gender1312">
                                    <p>Tab 1.3.1.2 être Verneinung aktiv weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="etre-voice132">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#etre-voice-gender1321">männlich</a>
                                 </li>
                                 <li><a href="#etre-voice-gender1322">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="etre-voice-gender1321">
                                    <p>Tab 1.3.2.1 être Verneinung passiv männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="etre-voice-gender1322">
                                    <p>Tab 1.3.2.2 être Verneinung passiv weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="etre-voice133">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#etre-voice-gender1331">männlich</a>
                                 </li>
                                 <li><a href="#etre-voice-gender1332">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="etre-voice-gender1331">
                                    <p>Tab 1.3.3.1 être Verneinung pronominal männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="etre-voice-gender1332">
                                    <p>Tab 1.3.3.2 être Verneinung pronominal weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>						
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane fade" id="auxiliary2">
         <div class="tabbable">
            <ul class="nav nav-tabs">
               <li class="active"><a href="#sentence-type21">Aussagesatz</a>
               </li>
               <li><a href="#sentence-type22">Fragesatz</a>
               </li>
               <li><a href="#sentence-type23">Verneinung</a>
               </li>
            </ul>
            <div class="tab-content">
               <div class="tab-pane fade active in" id="sentence-type21">
                  <div class="tabbable">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#avoir-voice211">aktiv</a>
                        </li>
                        <li><a href="#avoir-voice212">passiv</a>
                        </li>
						<?php	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Avoir)) && in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<li><a href="#avoir-voice213">pronominal</a>
						</li>						
						<?php } ?>	
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane fade active in" id="avoir-voice211">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#avoir-voice-gender2111">männlich</a>
                                 </li>
                                 <li><a href="#avoir-voice-gender2112">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="avoir-voice-gender2111">
									<?php
									$css_class = 'light_blue';
									$number = '2';
									require_once("text.php");
									print_explanatory_text($infinitiveVerb);
									print_conjugations_of_verb($infinitiveVerb, new Auxiliaire(Auxiliaire::Avoir)); 
									?>
                                 </div>
                                 <div class="tab-pane fade" id="avoir-voice-gender2112">
                                    <p>Tab 2.1.1.2 avoir Aussage aktiv weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="avoir-voice212">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#avoir-voice-gender2121">männlich</a>
                                 </li>
                                 <li><a href="#avoir-voice-gender2122">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="avoir-voice-gender2121">
                                    <p>Tab 2.1.2.1 avoir Aussage passiv männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="avoir-voice-gender2122">
                                    <p>Tab 2.1.2.2 avoir Aussage passiv weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="avoir-voice213">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#avoir-voice-gender2131">männlich</a>
                                 </li>
                                 <li><a href="#avoir-voice-gender2132">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="avoir-voice-gender2131">
                                    <p>Tab 2.1.3.1 avoir Aussage pronominal männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="avoir-voice-gender2132">
                                    <p>Tab 2.1.3.2 avoir Aussage pronominal weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>						
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="sentence-type22">
                  <div class="tabbable">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#avoir-voice221">aktiv</a>
                        </li>
                        <li><a href="#avoir-voice222">passiv</a>
                        </li>
						<?php	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Avoir)) && in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<li><a href="#avoir-voice223">pronominal</a>
						</li>
						<?php } ?>							
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane fade active in" id="avoir-voice121">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#avoir-voice-gender2211">männlich</a>
                                 </li>
                                 <li><a href="#avoir-voice-gender2212">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="avoir-voice-gender2211">
                                    <p>Tab 2.2.1.1 avoir Frage aktiv männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="avoir-voice-gender2212">
                                    <p>Tab 2.2.1.2 avoir Frage aktiv weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="avoir-voice222">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#avoir-voice-gender2221">männlich</a>
                                 </li>
                                 <li><a href="#avoir-voice-gender2222">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="avoir-voice-gender2221">
                                    <p>Tab 2.2.2.1 avoir Frage passiv männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="avoir-voice-gender2222">
                                    <p>Tab 2.2.2.2 avoir Frage passiv weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="avoir-voice223">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#avoir-voice-gender2231">männlich</a>
                                 </li>
                                 <li><a href="#avoir-voice-gender2232">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="avoir-voice-gender2231">
                                    <p>Tab 2.2.3.1 avoir Frage pronominal männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="avoir-voice-gender2232">
                                    <p>Tab 2.2.3.2 avoir Frage pronominal weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>						
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="sentence-type23">
                  <div class="tabbable">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#avoir-voice231">aktiv</a>
                        </li>
                        <li><a href="#avoir-voice232">passiv</a>
                        </li>
						<?php	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Avoir)) && in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<li><a href="#avoir-voice233">pronominal</a>
						</li>
						<?php } ?>					
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane fade active in" id="avoir-voice231">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#avoir-voice-gender2311">männlich</a>
                                 </li>
                                 <li><a href="#avoir-voice-gender2312">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="avoir-voice-gender2311">
                                    <p>Tab 2.3.1.1 avoir Verneinung aktiv männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="avoir-voice-gender2312">
                                    <p>Tab 2.3.1.2 avoir Verneinung aktiv weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="avoir-voice232">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#avoir-voice-gender2321">männlich</a>
                                 </li>
                                 <li><a href="#avoir-voice-gender2322">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="avoir-voice-gender2321">
                                    <p>Tab 2.3.2.1 avoir Verneinung passiv männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="avoir-voice-gender2322">
                                    <p>Tab 2.3.2.2 avoir Verneinung passiv weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="avoir-voice233">
                           <div class="tabbable">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a href="#avoir-voice-gender2331">männlich</a>
                                 </li>
                                 <li><a href="#avoir-voice-gender2332">weiblich</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane fade active in" id="avoir-voice-gender2331">
                                    <p>Tab 2.3.3.1 avoir Verneinung pronominal männlich</p>
                                 </div>
                                 <div class="tab-pane fade" id="avoir-voice-gender2332">
                                    <p>Tab 2.3.3.2 avoir Verneinung pronominal weiblich</p>
                                 </div>
                              </div>
                           </div>
                        </div>						
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php 
} else {
	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Avoir)) ) { ?>	
<div class="tabbable boxed parentTabs">
   <ul class="nav nav-tabs">
      <li class="active"><a href="#sentence-type11">Aussagesatz</a>
      </li>
      <li><a href="#sentence-type12">Fragesatz</a>
      </li>
      <li><a href="#sentence-type13">Verneinung</a>
      </li>
   </ul>
   <div class="tab-content">
      <div class="tab-content">
         <div class="tab-pane fade active in" id="sentence-type11">
            <div class="tabbable">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#voice111">aktiv</a>
                  </li>
                  <li><a href="#voice112">passiv</a>
                  </li>
				  <?php	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Avoir)) && in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
                  <li><a href="#voice113">pronominal</a>			  
                  </li>
				  <?php } ?>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane fade active in" id="voice111">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1111">männlich</a>
                           </li>
                           <li><a href="#voice-gender1112">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1111">
                              <p>Tab 1.1.1.1 Aussage aktiv männlich</p>
                              <?php
                                $css_class = 'light_blue';
								require_once("text.php");
								print_explanatory_text($infinitiveVerb);
								print_conjugations_of_verb($infinitiveVerb, new Auxiliaire(Auxiliaire::Avoir)); 
								?>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1112">
                              <p>Tab 1.1.1.2 Aussage aktiv weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="voice112">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1121">männlich</a>
                           </li>
                           <li><a href="#voice-gender1122">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1121">
                              <p>Tab 1.1.2.1 Aussage passiv männlich</p>
                              <?php
                                 $css_class = 'DarkOrange';
                                 $number = '5';
                                 require_once("text.php");
                                 print_explanatory_text($infinitiveVerb);
                                 print_conjugations_of_verb($infinitiveVerb, new Auxiliaire(Auxiliaire::Avoir)); 
                                 ?>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1122">
                              <p>Tab 1.1.2.2 Aussage passiv weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="voice113">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1131">männlich</a>
                           </li>
                           <li><a href="#voice-gender1132">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1131">
                              <p>Tab 1.1.3.1 Aussage pronominal männlich</p>
                              <?php
                                 $css_class = 'GoldenRod';
                                 $number = '3';
                                 require_once("text.php");
                                 print_explanatory_text($infinitiveVerb);
                                 print_conjugations_of_verb($infinitiveVerb, new Auxiliaire(Auxiliaire::Avoir)); 
                                 ?>				
                           </div>
                           <div class="tab-pane fade" id="voice-gender1132">
                              <p>Tab 1.1.3.2 Aussage pronominal weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-pane fade" id="sentence-type12">
            <div class="tabbable">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#voice121">aktiv</a>
                  </li>
                  <li><a href="#voice122">passiv</a>
                  </li>
				  <?php	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Avoir)) && in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
                  <li><a href="#voice123">pronominal</a>
				  </li>
				  <?php } ?>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane fade active in" id="voice121">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1211">männlich</a>
                           </li>
                           <li><a href="#voice-gender1212">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1211">
                              <p>Tab 1.2.1.1 Frage aktiv männlich</p>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1212">
                              <p>Tab 1.2.1.2 Frage aktiv weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="voice122">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1221">männlich</a>
                           </li>
                           <li><a href="#voice-gender1222">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1221">
                              <p>Tab 1.2.2.1 Frage passiv männlich</p>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1222">
                              <p>Tab 1.2.2.2 Frage passiv weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="voice123">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1231">männlich</a>
                           </li>
                           <li><a href="#voice-gender1232">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1231">
                              <p>Tab 1.2.3.1 Frage pronominal männlich</p>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1232">
                              <p>Tab 1.2.3.2 Frage pronominal weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-pane fade" id="sentence-type13">
            <div class="tabbable">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#voice131">aktiv</a>
                  </li>
                  <li><a href="#voice132">passiv</a>
                  </li>
				  <?php	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Avoir)) && in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
                  <li><a href="#voice133">pronominal</a>
				  </li>
				  <?php } ?>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane fade active in" id="voice131">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1311">männlich</a>
                           </li>
                           <li><a href="#voice-gender1312">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1311">
                              <p>Tab 1.3.1.1 Verneinung aktiv männlich</p>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1312">
                              <p>Tab 1.3.1.2 Verneinung aktiv weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="voice132">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1321">männlich</a>
                           </li>
                           <li><a href="#voice-gender1322">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1321">
                              <p>Tab 1.3.2.1 Verneinung passiv männlich</p>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1322">
                              <p>Tab 1.3.2.2 Verneinung passiv weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="voice133">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1331">männlich</a>
                           </li>
                           <li><a href="#voice-gender1332">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1331">
                              <p>Tab 1.3.3.1 Verneinung pronominal männlich</p>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1332">
                              <p>Tab 1.3.3.2 Verneinung pronominal weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<?php 
	}	
	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Etre))) { ?> 
<div class="tabbable boxed parentTabs">
   <ul class="nav nav-tabs">
      <li class="active"><a href="#sentence-type11">Aussagesatz</a>
      </li>
      <li><a href="#sentence-type12">Fragesatz</a>
      </li>
      <li><a href="#sentence-type13">Verneinung</a>
      </li>
   </ul>
   <div class="tab-content">
      <div class="tab-content">
         <div class="tab-pane fade active in" id="sentence-type11">
            <div class="tabbable">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#voice111">aktiv</a>
                  </li>
                  <li><a href="#voice112">passiv</a>
                  </li>
				  <?php	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Etre)) && in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
                  <li><a href="#voice113">pronominal</a>
				  </li>
				  <?php } ?>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane fade active in" id="voice111">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1111">männlich</a>
                           </li>
                           <li><a href="#voice-gender1112">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1111">
                              <p>Tab 1.1.1.1 Aussage aktiv männlich</p>
                              <?php
                                 $css_class = 'green';
                                 require_once("text.php");
                                 print_explanatory_text($infinitiveVerb);
                                 print_conjugations_of_verb($infinitiveVerb, new Auxiliaire(Auxiliaire::Etre)); 
                                 ?>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1112">
                              <p>Tab 1.1.1.2 Aussage aktiv weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="voice112">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1121">männlich</a>
                           </li>
                           <li><a href="#voice-gender1122">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1121">
                              <p>Tab 1.1.2.1 Aussage passiv männlich</p>
                              <?php
                                 $css_class = 'DarkOrange';
                                 $number = '5';
                                 require_once("text.php");
                                 print_explanatory_text($infinitiveVerb);
                                 print_conjugations_of_verb($infinitiveVerb, new Auxiliaire(Auxiliaire::Etre)); 
                                 ?>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1122">
                              <p>Tab 1.1.2.2 Aussage passiv weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="voice113">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1131">männlich</a>
                           </li>
                           <li><a href="#voice-gender1132">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1131">
                              <p>Tab 1.1.3.1 Aussage pronominal männlich</p>
                              <?php
                                 $css_class = 'GoldenRod';
                                 $number = '3';
                                 require_once("text.php");
                                 print_explanatory_text($infinitiveVerb);
                                 print_conjugations_of_verb($infinitiveVerb, new Auxiliaire(Auxiliaire::Etre)); 
                                 ?>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1132">
                              <p>Tab 1.1.3.2 Aussage pronominal weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-pane fade" id="sentence-type12">
            <div class="tabbable">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#voice121">aktiv</a>
                  </li>
                  <li><a href="#voice122">passiv</a>
                  </li>
				  <?php	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Etre)) && in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
                  <li><a href="#voice123">pronominal</a>
				  </li>
				  <?php } ?>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane fade active in" id="voice121">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1211">männlich</a>
                           </li>
                           <li><a href="#voice-gender1212">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1211">
                              <p>Tab 1.2.1.1 Frage aktiv männlich</p>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1212">
                              <p>Tab 1.2.1.2 Frage aktiv weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="voice122">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1221">männlich</a>
                           </li>
                           <li><a href="#voice-gender1222">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1221">
                              <p>Tab 1.2.2.1 Frage passiv männlich</p>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1222">
                              <p>Tab 1.2.2.2 Frage passiv weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="voice123">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1231">männlich</a>
                           </li>
                           <li><a href="#voice-gender1232">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1231">
                              <p>Tab 1.2.3.1 Frage pronominal männlich</p>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1232">
                              <p>Tab 1.2.3.2 Frage pronominal weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-pane fade" id="sentence-type13">
            <div class="tabbable">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#voice131">aktiv</a>
                  </li>
                  <li><a href="#voice132">passiv</a>
                  </li>
				  <?php	if(canBeConjugatedWith($infinitiveVerb, new Auxiliaire(Auxiliaire::Etre)) && in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
                  <li><a href="#voice133">pronominal</a>
				  </li>
				  <?php } ?>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane fade active in" id="voice131">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1311">männlich</a>
                           </li>
                           <li><a href="#voice-gender1312">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1311">
                              <p>Tab 1.3.1.1 Verneinung aktiv männlich</p>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1312">
                              <p>Tab 1.3.1.2 Verneinung aktiv weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="voice132">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1321">männlich</a>
                           </li>
                           <li><a href="#voice-gender1322">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1321">
                              <p>Tab 1.3.2.1 Verneinung passiv männlich</p>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1322">
                              <p>Tab 1.3.2.2 Verneinung passiv weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="voice133">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#voice-gender1331">männlich</a>
                           </li>
                           <li><a href="#voice-gender1332">weiblich</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade active in" id="voice-gender1331">
                              <p>Tab 1.3.3.1 Verneinung pronominal männlich</p>
                           </div>
                           <div class="tab-pane fade" id="voice-gender1332">
                              <p>Tab 1.3.3.2 Verneinung pronominal weiblich</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<?php 
	}	
}
?>
<div id="hidden_player"></div>
<?php		}
	?>
<script>
$("ul.nav-tabs a").click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});
</script>
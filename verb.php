<link rel="stylesheet" type="text/css" media="screen" href="../../tabs.css" /> 
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
echo '<h2 class="home">Die Konjugation von '.$_GET['verb'].'</h2>'
if(canBeConjugatedWith($verb, $auxiliaireAVOIR)) { 
	require_once("text.php");
	$infinitiveVerb = new InfinitiveVerb($_GET['verb']);
	print_explanatory_text($infinitiveVerb);
	print_conjugations_of_verb($infinitiveVerb); 
}
if(canBeConjugatedWith($verb, $auxiliaireETRE)) { 
	require_once("text.php");
	$infinitiveVerb = new InfinitiveVerb($_GET['verb']);
	print_explanatory_text($infinitiveVerb);
	print_conjugations_of_verb($infinitiveVerb); 
}
if(canBeConjugatedWith($verb, $auxiliaireAvoirandEtre)) { ?> 

<div class="tabreiter">
    <ul>
        <li>
            <input type="radio" name="tabreiter-0" checked="checked" id="tabreiter-0-0" /><label for="tabreiter-0-0">intransitiv (Hilfsverb être)</label>
            <div>
                <?php
				require_once("text.php");
				$infinitiveVerb = new InfinitiveVerb($_GET['verb']);
				print_explanatory_text($infinitiveVerb);
				print_conjugations_of_verb($infinitiveVerb); 
				?>
            </div>
        </li><li>
            <input type="radio" name="tabreiter-0" id="tabreiter-0-1" /><label for="tabreiter-0-1">transitiv (Hilfsverb avoir)</label>
            <div>
                <?php
				require_once("text.php");
				$infinitiveVerb = new InfinitiveVerb($_GET['verb']);
				print_explanatory_text($infinitiveVerb);
				print_conjugations_of_verb($infinitiveVerb); 
				?>
            </div>
        </li>
    </ul>
</div>
<?php 
}
?> 

<div id="hidden_player"></div>
<?php		}
	?>
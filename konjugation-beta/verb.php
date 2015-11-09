<?php 
		$func_array=array(preg_grep("/.*er$/",$verbs1),preg_grep("/.*[iï]r$/",$verbs1),preg_grep("/.*re$/",$verbs1),
		array_diff($verbs1,$aux_etre),$aux_etre,$aux_avoir_etre,
		$verbes_pronominaux,array_diff($verbs1,$verbes_pronominaux),$verbes_exclusivement_pronominaux,$verbes_transitifs,$verbes_intransitifs,$verbes_en_ancien,$verbes_defectifs,$impersonnels,
		$cer,$ger,$eler_ele,$eler_elle,$eter_ete,$eter_ette,$yer_ie,$e_akut_er,$ecer,$eger,$eyer,$envoyer,
		$vouloir,$avoir_ravoir,$voir,$cevoir,$devoir,$mouvoir,$pleuvoir,$pouvoir,$savoir,$falloir,$seoir,$valoir,$haiir,
		$indre,$battre,$crire,$mettre,$prendre,$rompre,$etre_unregel,$aire,$faire);

		if($_GET["buchstabe"]=="kategorien"){
			$per_page=200;
			$params=explode($char_split,$_GET["verb"]);
			$num=0;
			$start=0;
			$page=0;
			if(count($params)>1)
				$page=$params[1];
			$start=$page*$per_page;
			$aux_etre  = array('accourir','advenir','aller','amuser','apparaitre','apparaître','arriver','ascendre','co-naitre',
				'co-naître','convenir','débeller','décéder','démourir','descendre','disconvenir','devenir','échoir',
				'entre-venir','entrer','époustoufler','intervenir','issir','mévenir','monter','mourir','naitre','naître',
				'obvenir','paraitre','paraître','partir','parvenir','pourrir','prémourir','provenir','ragaillardir',
				'raller','réadvenir','re-aller','réapparaitre','réapparaître','reconvenir','redépartir','redescendre',
				'redevenir','réentrer','réintervenir','remonter','remourir','renaitre','renaître','rentrer','revenir',
				'reparaitre','reparaître','repartir','reparvenir','repasser','repourrir','rerentrer','rerester',
				'ressortir','ressouvenir','rester','resurvenir','retomber','retourner','retrépasser','revenir',
				's’amuser','se redépartir','se sortir','se souvenir','sortir','souvenir','stationner','sur-aller',
				'suradvenir','survenir','tomber','trépasser','venir');
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
<?php
$exception == $_GET['verb'].'es' ;
	translation($_GET['verb'],$fr_de[$_GET['verb']]);  
    include("text.php"); 	
	print_conjugations_of_verb($_GET['verb']);
?>
<div id="hidden_player"></div>
<?php		}
	?>
<?php
include($_SERVER['DOCUMENT_ROOT']."/data/languages/french/translation.php");
include($_SERVER['DOCUMENT_ROOT']. "/data/languages/french/verbs.php");
include($_SERVER['DOCUMENT_ROOT']."/data/languages/french/beta/conjugate.php"); 
include($_SERVER['DOCUMENT_ROOT']."/data/languages/french/beta/print.php"); 
include($_SERVER['DOCUMENT_ROOT']."/data/before_content.php");


$kategorien=array("erste-gruppe","zweite-gruppe","dritte-gruppe",
					"hifsverb-avoir","hilfsverb-etre","hilfsverb-avoir-etre",
					"reflexiv","irreflexiv","ausschließlich-reflexiven-Verben","transitiv","intransitiv",'altfrannzösische-Sprache','defekte Verben','unpersönliche Verben',
	"endung-cer","endung-ier","endung-ger","endung-eler_ele","endung-eler_elle","endung-eter_ete","endung-eter_ette","endung-yer_ie","endung-é_er","endung-écer","endung-éger","endung-éyer","endung-envoyer",
	"endung-vouloir","endung-avoir_ravoir","endung-voir","endung-cevoir","endung-devoir",
	"endung-mouvoir","endung-pleuvoir","endung-pouvoir","endung-savoir","endung-falloir",
	"endung-seoir","endung-valoir","endung-haïr",
	"endung-indre","endung-battre","endung-crire","endung-mettre","endung-prendre","endung-rompre","endung-être","endung-aire","endung-faire");
$func_array=array(preg_grep("/.*er$/",$verbs1),preg_grep("/.*[iï]r$/",$verbs1),preg_grep("/.*re$/",$verbs1),
					array_diff($verbs1,$aux_etre),$aux_etre,$aux_avoir_etre,
	$verbes_pronominaux,array_diff($verbs1,$verbes_pronominaux),$verbes_exclusivement_pronominaux,$verbes_transitifs,$verbes_intransitifs,$verbes_en_ancien,$verbes_defectifs,$impersonnels,
	$cer,$ger,$eler_ele,$eler_elle,$eter_ete,$eter_ette,$yer_ie,$e_akut_er,$ecer,$eger,$eyer,$envoyer,
	$vouloir,$avoir_ravoir,$voir,$cevoir,$devoir,$mouvoir,$pleuvoir,$pouvoir,$savoir,$falloir,$seoir,$valoir,$haiir,
	$indre,$battre,$crire,$mettre,$prendre,$rompre,$etre_unregel,$aire,$faire);
$titles=array();
for($a=0;$a<count($kategorien);$a++){
	if($a<3){
		$temp=explode("-",$kategorien[$a]);
		$temp[1]=ucwords($temp[1]);
		$titles[$a]=implode(" ",$temp);
	}
	elseif($a<5){
		$titles[$a]=implode(" ",explode("-",ucwords($kategorien[$a])));
	}
	elseif($a<9) $titles[$a]=ucfirst($kategorien[$a]);
	else
		$titles[$a]=implode(" -",explode("-",ucwords($kategorien[$a]),2));
}
$char_split='!';
if(isset($_GET['verb']))
	$keywords='Konjugation von '.$_GET["verb"].', '.$_GET["verb"].' konjugieren';
elseif(isset($_GET['buchstabe'])){
	$keywords='';
}

//index.php (no parameters / main page)
if(!isset($_GET['verb'])&&(!isset($_GET['buchstabe']) || preg_match('/^'.$char_split.'.*/',$_GET['buchstabe']))){
	$per_page=7;
	$page=0;
	$params=explode($char_split,$_GET["buchstabe"]);
	if(count($params)>0)
		$page=$params[1];
	$description='Hier findest du die Übersicht aller französischen Verben mit ihrer Konjugation.';
	$keywords='Konjugation, Konjugation von französischen Verben, Französische Verben konjugieren';  
	$letters=range('a','z');
	$letters_special=array("à","â","æ","ç","é","ê","è","ë","î","ï","ô","œ","û","ù");
?>                                                          
<h1> <?=$h1;?></h1>
<? translation('la conjugaison','die Konjugation'); ?>
<p>Derzeit befindet sich <b><?php echo count($verbs, COUNT_RECURSIVE)-count($verbs)-1; ?></b> Verben unserer Datenbank. Klicke auf einen Buchstaben, um alle Verben zu finden, die mit diesem Buchstaben anfangen.</p>
<?php
	$str="";
	//letter menu
	for($a=0;$a<count($letters);$a++){
		$str .= '<a href="'.(isset($_GET['buchstabe'])?'../':'').$letters[$a].'/"> '.strtoupper($letters[$a]).'</a> &nbsp;| &nbsp;';
	}
	echo substr($str,0,count($str)-2);
?>
	  
<script>
function showResult(str) {
	if (str.length==0) { 
		document.getElementById("livesearch").innerHTML="";
		document.getElementById("livesearch").style.border="0px";
		return;
	}
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else {  // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
			document.getElementById("livesearch").style.border="1px solid #A5ACB2";
		}
	}
	xmlhttp.open("GET","livesearch.php?pattern="+str,true);
	xmlhttp.send();
}
function suchen(){
	var val = window.location.protocol + "//" + window.location.host + window.location.pathname+document.getElementById("txt").value+"/";
	document.location.href=val;
}

</script>
<br><br>
<p>Hier kannst du den Infinitiv Form des Verbes eingeben,um die Konjugationsformen für alle französischen Zeiten zu sehen.</p>
  <input type="text" id="txt" size="27" onkeyup="showResult(this.value)">
  <input id="suchen" type="button" value="Suchen" onclick="suchen()">
<br> 
<?php
	//special letters menu
	foreach($letters_special as $letter_special){
		echo '<input type="button" value="'.$letter_special.'" onclick="'.$letter_special.'()" />';
	}
	echo '<script>';  
	//functions for special letters
	foreach($letters_special as $letter_special){  
		echo 'function '.$letter_special.'() {document.getElementById("txt").value += "'.$letter_special.'";}';                                  
	}
	echo '</script>';
?>
  <div id="livesearch"></div>
<br><br>
<p>Hier finden Sie die meistgesuchten Verben:</p>
<?php
$beliebtesten_verben = array(array('acheter','aller','appeler','apprendre','attendre','avoir','balayer','battre','boire','choisir','comprendre','connaître','courir','devenir','devoir','dormir','dire','envoyer','être','écrire','étudier','faire','falloir','finir','fuir','gagner','grandir','grossir','guerir','habiller','habiter','inviter','jeter','joindre','jouer','jouir','laver','laisser','lever','lire','manger','mettre','monter','mourir','nager','naître','nettoyer','nuire','obtenir','offrir','oublier','ouvrir','parler','partir','prendre','pouvoir','quitter','recevoir','rendre','rester','reussir','savoir','sentir','servir','sortir','tenir','travailler','trouver','utiliser','venir','vivre','vouloir','voir'));    

	//verbs in groups
	foreach($beliebtesten_verben as $bel_verben){
		echo '<h2 class="home"><a id="'.mb_substr($bel_verben[0],0,1,"utf-8").'"></a>Meistgesuchten Verben:</h2><hr class="linie"><table width="100%">';
		$chunks = array_chunk($bel_verben, 4);
		foreach($chunks as $chunk){
			echo '<tr>';
			foreach($chunk as $val)
				echo'<td><a class="franzoesisch" href="'.substr($val,0,1).'/'.$val.'/">'.$val.'</a></td>';
			echo '</tr>';
		}
		echo '</table>';	
	}
//index.php?buchstabe=x (parameters = starting letter)
}elseif(isset($_GET["buchstabe"]) && !isset($_GET["verb"]) && $_GET["buchstabe"]!="kategorien"){
	$per_page=200;
	$params=explode($char_split,$_GET["buchstabe"]);

	if(strlen($params[0])>1){
		$array = preg_grep("/^".$params[0].".*/",$verbs[substr($params[0],0,1)]);
		$h1='Suchergebnisse für '.$params[0];
	}else{
		$array = $verbs[$params[0]];
		$h1=strtoupper($params[0]);
	}
?>
<h1>
<?php echo $h1; ?>
</h1>
<? translation('la conjugaison','die Konjugation'); ?>
<p>Hier finden sie alle Verben, die mit <?=ucfirst($params[0]);?> beginnen. Zu jeder Vokabel finden Sie die Konjugation für den Indicatif, Subjonctif, Conditionnel und sowie den Impératif, Infinitif, Gérondif und Participe Modus.</p>
<?php
	$num=0;
	$start=0;
	$page=0;
	if(count($params)>1)
		$page=$params[1];
	$start=$page*$per_page;
?>
<table width="100%">
<?php
	$array = array_chunk($array, 4);
	foreach($array as $chunk){
		if($num>=$start) echo '<tr>';
		foreach($chunk as $val){
			$num++;
			if($num<=$start) continue;
			if($num>$start+$per_page) break;
			echo '<td><a class="franzoesisch" href="'.$val.'/">'.$val.'</a></td>';
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
	//index.php?verb=xxxx (only one verb)
	}elseif(isset($_GET['verb'])){
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
	}elseif($_GET["buchstabe"]=="kategorien" && !isset($_GET['verb'])){
    echo '<h1>Kategorien</h1>';
		echo '<p>Hier findest du alle Kategorien. Entweder die Gruppe der drei großen Verbgruppen, den zwei Hilfsverben, der Transitivität oder ob das Verb reflexiv oder irreflexiv ist sowie vielen unregelmäßigen Verbgruppen</p>'; 
		for($a=0;$a<count($kategorien);$a++){		
			if($a==0) echo '<h3 class="home">Verbgruppen</h3>';
			elseif($a==3) echo '<br><h3 class="home">Hilfsverb</h3>';
			elseif($a==6) echo '<br><h3 class="home">Eigenschaft von Verben</h3>';			
			elseif($a==14) echo '<br><h3 class="home">Endungen unregelmäßiger Verben auf -ER</h3>';			
			elseif($a==27) echo '<br><h3 class="home">Endungen unregelmäßiger Verben auf -IR</h3>';		
			elseif($a==40) echo '<br><h3 class="home">Endungen unregelmäßiger Verben auf -RE</h3>';					
			echo '<li><a href="'.$kategorien[$a].'/">'.$titles[$a].'</a></li>';
		}
		echo '</ul>';                       		
} ?>
<script type="text/javascript">
	document.getElementById("txt").addEventListener("keypress", function() {
	    if (event.keyCode == 13) suchen();
	});
</script>
<?php include($_SERVER['DOCUMENT_ROOT']."/data/after_content.php"); ?>


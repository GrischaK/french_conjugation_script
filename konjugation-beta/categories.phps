<?php 
include($_SERVER['DOCUMENT_ROOT']."/data/before_content.php");

$kategorien=array("erste-gruppe","zweite-gruppe","dritte-gruppe",
					"hifsverb-avoir","hilfsverb-etre","hilfsverb-avoir-etre",
					"reflexiv","irreflexiv","ausschlieﬂlich-reflexiven-Verben","transitiv","intransitiv",'altfrannzˆsische-Sprache','defekte Verben','unpersˆnliche Verben',
	"endung-cer","endung-ier","endung-ger","endung-eler_ele","endung-eler_elle","endung-eter_ete","endung-eter_ette","endung-yer_ie","endung-È_er","endung-Ècer","endung-Èger","endung-Èyer","endung-envoyer",
	"endung-vouloir","endung-avoir_ravoir","endung-voir","endung-cevoir","endung-devoir",
	"endung-mouvoir","endung-pleuvoir","endung-pouvoir","endung-savoir","endung-falloir",
	"endung-seoir","endung-valoir","endung-haÔr",
	"endung-indre","endung-battre","endung-crire","endung-mettre","endung-prendre","endung-rompre","endung-Ítre","endung-aire","endung-faire");
$func_array=array(preg_grep("/.*er$/",$verbs1),preg_grep("/.*[iÔ]r$/",$verbs1),preg_grep("/.*re$/",$verbs1),
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
?>	
<h1><?php echo $_GET['verb'];?></h1>
<?php
$exception == $_GET['verb'].'es' ;
	translation($_GET['verb'],$fr_de[$_GET['verb']]);  
    include("text.php"); 	
	print_conjugations_of_verb($_GET['verb']);
?>
<div id="hidden_player"></div>
<?php		
	if($_GET["buchstabe"]=="kategorien" && !isset($_GET['verb'])){
    echo '<h1>Kategorien</h1>';
		echo '<p>Hier findest du alle Kategorien. Entweder die Gruppe der drei groﬂen Verbgruppen, den zwei Hilfsverben, der Transitivit‰t oder ob das Verb reflexiv oder irreflexiv ist sowie vielen unregelm‰ﬂigen Verbgruppen</p>'; 
		for($a=0;$a<count($kategorien);$a++){		
			if($a==0) echo '<h3 class="home">Verbgruppen</h3>';
			elseif($a==3) echo '<br><h3 class="home">Hilfsverb</h3>';
			elseif($a==6) echo '<br><h3 class="home">Eigenschaft von Verben</h3>';			
			elseif($a==14) echo '<br><h3 class="home">Endungen unregelm‰ﬂiger Verben auf -ER</h3>';			
			elseif($a==27) echo '<br><h3 class="home">Endungen unregelm‰ﬂiger Verben auf -IR</h3>';		
			elseif($a==40) echo '<br><h3 class="home">Endungen unregelm‰ﬂiger Verben auf -RE</h3>';					
			echo '<li><a href="'.$kategorien[$a].'/">'.$titles[$a].'</a></li>';
		}
		echo '</ul>';                       		
} 
include($_SERVER['DOCUMENT_ROOT']."/data/after_content.php"); ?>
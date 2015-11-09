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

//index.php (no parameters / main page)
if(!isset($_GET['verb'])&&(!isset($_GET['buchstabe']) || preg_match('/^'.$char_split.'.*/',$_GET['buchstabe']))){
	require "main.php";	
}//index.php?buchstabe=x (parameters = starting letter)
elseif(isset($_GET["buchstabe"]) && !isset($_GET["verb"]) && $_GET["buchstabe"]!="kategorien"){
	require "character.php";
}//index.php?verb=xxxx (only one verb)
elseif(isset($_GET['verb'])){
	require "verb.php";
}elseif($_GET["buchstabe"]=="kategorien" && !isset($_GET['verb'])){
	require "categories.php";
} ?>
<script type="text/javascript">
	document.getElementById("txt").addEventListener("keypress", function() {
	    if (event.keyCode == 13) suchen();
	});
</script>
<?php include($_SERVER['DOCUMENT_ROOT']."/data/after_content.php"); ?>


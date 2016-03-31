<?
//require_once 'translation.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'verbs.php';
require_once 'conjugate.php';
require_once 'print.php';
include_once($_SERVER['DOCUMENT_ROOT']."/data/before_content.php");
?>
<style type="text/css">
#menu,#right-part  {display:none;}
#right-part.col-md-2{display:none;}	  
#content.col-md-7 {width:85%;}
 
@media 
  (min-device-width: 800px) 
  and (max-device-width: 1280px) {
#menu.col-md-3 {width:23%;}
#content.col-md-7 {width:77%;}
}
</style> 
<?
$kategorien=[
"erste-gruppe","zweite-gruppe","dritte-gruppe",
"hifsverb-avoir","hilfsverb-etre","hilfsverb-avoir-etre",
"reflexiv","irreflexiv","ausschlie�lich-reflexiven-Verben","transitiv","intransitiv",'altfrannz�sische-Sprache','defekte Verben','unpers�nliche Verben',

"endung-cer","endung-ier","endung-ger","endung-eler_ele","endung-eler_elle","endung-eter_ete","endung-eter_ette","endung-yer_ie","endung-�_er","endung-�cer","endung-�ger","endung-�yer","endung-envoyer",
"endung-vouloir","endung-avoir_ravoir","endung-voir","endung-cevoir","endung-devoir","endung-mouvoir","endung-pleuvoir","endung-pouvoir","endung-savoir","endung-falloir","endung-seoir","endung-valoir","endung-ha�r",
"endung-indre","endung-battre","endung-crire","endung-mettre","endung-prendre","endung-rompre","endung-�tre","endung-aire","endung-faire"];
$titles=[];
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
<? 
$trigger_play ='';
include_once($_SERVER['DOCUMENT_ROOT']."/data/after_content.php"); ?>


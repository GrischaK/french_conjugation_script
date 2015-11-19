<?php 
	if(isset($_GET['verb']))
		$keywords='Konjugation von '.$_GET["verb"].', '.$_GET["verb"].' konjugieren';
	elseif(isset($_GET['buchstabe'])){
		$keywords='';
	}

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

?>
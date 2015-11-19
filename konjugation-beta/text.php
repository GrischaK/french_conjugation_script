<?php
/*
Hier findet man alles, was über den Konjugationstabellen steht.
*/ 
$regelmaessig = in_array($verb, $unregelmaessige_verben) ? 'unregelmäßig' : 'regelmäßig'; 
$reflexiv = in_array($verb, $verbes_pronominaux) ? 'reflexives' : 'nicht reflexives';
$conditions = array();
if (in_array($verb, $verbes_transitifs)) {
  $conditions[] = 'transitives';
}
if (in_array($verb, $verbes_intransitifs)) {
  $conditions[] = 'intransitives';
}
if (!in_array($verb, $verbes_transitifs) and !in_array($verb, $verbes_intransitifs)) {
  $conditions[] = '???';
}
$transitiv = implode(' oder ', $conditions);
  
  if ((substr ( $verb, - 2, 2 ) == 'er') &&  (!in_array($verb,array('aller','raller','re-aller','saisir-arrêter','saisir-brandonner','saisir-exécuter','s’en aller','sur-aller')))) {
    $gruppe = 'der 1. Verbgruppe';
  } 
  elseif ((substr ( $verb, - 2, 2 ) == 'ir') or (in_array(mb_substr("$verb", - 2, 2, "utf-8"), array("ïr"))) && !in_array($verb, $unregel_ir)) {
    $gruppe = 'der 2. Verbgruppe';
  } 
  elseif ($verb == 'saisir-brandonner') {
    $gruppe = 'keiner Verbgruppe';
  }   
  else { // aller,....
    $gruppe = 'der 3. Verbgruppe';
  }

include ($_SERVER['DOCUMENT_ROOT'] . "/data/languages/french/verbs.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/data/languages/french/irregular-verb-groups.php");

include ($_SERVER['DOCUMENT_ROOT'] . "/data/languages/french/verbes_pronominaux.php"); 				// Array mit allen reflexiven Verben
include ($_SERVER['DOCUMENT_ROOT'] . "/data/languages/french/verbes_exclusivement_pronominaux.php");	// Array mit allen - ausschließlich - reflexiven Verben
// manche Verben sind transitiv oder auch intransitiv
include ($_SERVER['DOCUMENT_ROOT'] . "/data/languages/french/verbes_intransitifs.php"); 				// Array mit allen transitiven Verben
include ($_SERVER['DOCUMENT_ROOT'] . "/data/languages/french/verbes_transitifs.php");	// Array mit allen intransitiven Verben 
include ($_SERVER['DOCUMENT_ROOT'] . "/data/languages/french/irregular.php");    
?>
<style type="text/css">
#menu,#rechts {display:none;} 
</style>
<p>Die Konjugation von <?=$verb ?></p>
<p>Das Verb <b><?=$verb ?></b> wird <b><?=$regelmaessig ?></b> konjugiert und wird in den zusammengesetzten Zeiten mit den Hilfsverb <b><?=$auxiliaire ?></b> gebildet.</p>
<p><b><?=$verb ?></b> ist ein <b><?=$reflexiv ?></b> und <b><?=$transitiv ?></b> Verb.</p>
<?
  include ($_SERVER['DOCUMENT_ROOT'] . "/data/languages/french/verbes_en_ancien.php");	// Array mit allen Verben aus der altfranzösischen Sprache
  if (in_array($verb, $verbes_en_ancien)) {
    echo '<p>'.$verb.' kommt aus der <b>altfranzösischen Sprache</b>.</p>';
  }
  include ($_SERVER['DOCUMENT_ROOT'] . "/data/languages/french/verbes_defectifs.php");	// Array mit allen defekten Verben    
  if (in_array($verb, $verbes_defectifs)) {
    echo '<p>'.$verb.' ist ein <b>defektes Verb</b>, d. h. es  bildet nicht alle Formen aus.</p>';
  }  
  if (in_array($verb, $impersonnels)) {
    echo '<p>'.$verb.' ist ein <b>unpersönliches Verb</b>.</p>';	
  }
?> 
<p><b><?=$verb ?></b> ist in <b><?=$gruppe ?></b>.</p>   
<h2 class="home">Verzeichnis</h2>
<ul style="list-style-type:none;">
	<li><a class="down" href="#indicatif">Indicatif</a></li>
	<li><a class="down" href="#subjonctif">Subjonctif</a></li>
	<li><a class="down" href="#conditionnel">Conditionnel</a></li>
	<li><a class="down" href="#imperatif">Impératif</a></li>
	<li><a class="down" href="#modes-impersonnels">Modes impersonnels</a></li>
</ul>
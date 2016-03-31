<?
/*
Hier findet man alles, was über den Konjugationstabellen steht.
*/ 
$regelmaessig = in_array($infinitiveVerb, $unregelmaessige_verben) ? 'unregelmäßig' : 'regelmäßig'; 
$reflexiv = in_array($infinitiveVerb, $verbes_pronominaux) ? 'reflexives' : 'nicht reflexives';
$conditions = [];
if (in_array($infinitiveVerb, $verbes_transitifs)) {
  $conditions[] = 'transitives';
}
if (in_array($infinitiveVerb, $verbes_intransitifs)) {
  $conditions[] = 'intransitives';
}
if (!in_array($infinitiveVerb, $verbes_transitifs) and !in_array($infinitiveVerb, $verbes_intransitifs)) {
  $conditions[] = '???';
}
$transitiv = implode(' oder ', $conditions);

//$substr_er = array_filter($infinitiveVerb, function($value) { return substr($value, -2) == 'er'; });
function finding_group(InfinitiveVerb $infinitiveVerb)
{
if ((substr ($infinitiveVerb, - 2, 2 ) == 'er') &&  (!in_array($infinitiveVerb,['aller','raller','re-aller','saisir-arrêter','saisir-brandonner','saisir-exécuter','s’en aller','sur-aller']))) {
    $gruppe = 'der 1. Verbgruppe';
  } 
  elseif ((substr ($infinitiveVerb, - 2, 2 ) == 'ir') or (in_array(mb_substr($infinitiveVerb, - 2, 2, "utf-8"), ["ïr"])) && !in_array($infinitiveVerb, $unregel_ir)) {
    $gruppe = 'der 2. Verbgruppe';
  } 
  elseif ($infinitiveVerb == 'saisir-brandonner') {
    $gruppe = 'keiner Verbgruppe';
  }   
  else { // aller,....
    $gruppe = 'der 3. Verbgruppe';
  }
    return $gruppe;
}
echo finding_group( new InfinitiveVerb($_GET['verb']));
require_once 'classes/InfinitiveVerb.php';    
require_once 'verbs.php';
require_once 'groups/verbes_pronominaux.php';
require_once 'groups/verbes_exclusivement_pronominaux.php';
require_once 'groups/verbes_intransitifs.php';
require_once 'groups/verbes_transitifs.php';
require_once 'groups/irregular-verb-groups.php';
require_once 'groups/verbes_en_ancien.php';  
require_once 'groups/verbes_defectifs.php';
//  require_once 'groups/irregular.php';
?>

<p>Die Konjugation von <?=($_GET['verb']) ?></p>
<p>Das Verb <b><?=($_GET['verb']) ?></b> wird <b><?=$regelmaessig ?></b> konjugiert und wird in den zusammengesetzten Zeiten mit den Hilfsverb <b><?=$auxiliaire ?></b> gebildet.</p>
<p><b><?=($_GET['verb']) ?></b> ist ein <b><?=$reflexiv ?></b> und <b><?=$transitiv ?></b> Verb.</p>
<?
  if (in_array($infinitiveVerb, $verbes_en_ancien)) {
    echo '<p>'.$infinitiveVerb.' kommt aus der <b>altfranzösischen Sprache</b>.</p>';
  }  
  if (in_array($infinitiveVerb, $verbes_defectifs)) {
    echo '<p>'.$infinitiveVerb.' ist ein <b>defektes Verb</b>, d. h. es  bildet nicht alle Formen aus.</p>';
  }  
  if (in_array($infinitiveVerb, $impersonnels)) {
    echo '<p>'.$infinitiveVerb.' ist ein <b>unpersönliches Verb</b>.</p>';	
  }
?> 
<p><b><?=($_GET['verb']) ?></b> ist in <b><?=$gruppe ?></b>.</p>   
<h2 class="home">Verzeichnis</h2>
<ul style="list-style-type:none;">
	<li><a class="down" href="#indicatif">Indicatif</a></li>
	<li><a class="down" href="#subjonctif">Subjonctif</a></li>
	<li><a class="down" href="#conditionnel">Conditionnel</a></li>
	<li><a class="down" href="#imperatif">Impératif</a></li>
	<li><a class="down" href="#modes-impersonnels">Modes impersonnels</a></li>
</ul>
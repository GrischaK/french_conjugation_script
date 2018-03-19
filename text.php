<?php
function print_explanatory_text(InfinitiveVerb $infinitiveVerb) {
	global $verbes_en_ancien, $verbes_defectifs, $verbes_impersonnels, $verbes_transitifs, $verbes_intransitifs, $verbes_pronominaux, $category;
	require_once 'classes/InfinitiveVerb.php';
	require_once 'verbs.php';
	require_once 'groups/verbes_pronominaux.php';
	require_once 'groups/verbes_exclusivement_pronominaux.php';
	require_once 'groups/verbes_intransitifs.php';
	require_once 'groups/verbes_transitifs.php';
	require_once 'groups/verbes_en_ancien.php';
	require_once 'groups/verbes_defectifs.php';
	
	$regelmaessig = in_array ( $infinitiveVerb, IrregularExceptionGroup::$irregular ) ? 'unregelmäßig' : 'regelmäßig';	
	$reflexiv = in_array ( $infinitiveVerb, $verbes_pronominaux ) ? 'reflexives' : 'nicht reflexives';
	$conditions = [ ];
	if (in_array ( $infinitiveVerb, $verbes_transitifs ))
		$conditions [] = 'transitives';
	if (in_array ( $infinitiveVerb, $verbes_intransitifs ))
		$conditions [] = 'intransitives';
	if (! in_array ( $infinitiveVerb, $verbes_transitifs ) && !in_array ( $infinitiveVerb, $verbes_intransitifs ))
		$conditions [] = '';
	$transitiv = implode ( ' oder ', $conditions );
	if ((mb_substr ( $infinitiveVerb, - 2, 2 ) == 'er') && (!in_array ( $infinitiveVerb, ['aller','raller','re-aller','saisir-arrêter','saisir-brandonner','saisir-exécuter','saisir-gager','saisir-revendiquer','s’en aller','sur-aller'] )))
		$group = 'der 1. Verbgruppe';
	elseif ((in_array ( mb_substr ( $infinitiveVerb, - 2, 2), [ 'ir','ïr' ] )) && (!in_array ( $infinitiveVerb, IrregularExceptionGroup::$irregular)))
		$group = 'der 2. Verbgruppe'; // and $infinitiveVerb = "fleurir"
	elseif (in_array ($infinitiveVerb, [ 'saillir','faillir' ] ))
		$group = 'der 2. oder 3. Verbgruppe';				
	else
		$group = 'der 3. Verbgruppe';
	echo '<p class="card card-body bg-light">Das Verb <b>' . $_GET ['verb'] . '</b> wird <b>' . $regelmaessig . '</b> konjugiert und wird in den zusammengesetzten Zeiten mit den Hilfsverb <b>' . finding_auxiliaire ( new InfinitiveVerb ( $_GET ['verb'] ) )->getValue () . '</b> gebildet.</p>
<p class="card card-body bg-light">' . $_GET ['verb'] . ' ist ein <b>' . $reflexiv . '</b> und <b>' . $transitiv . '</b> Verb und ist in <b>' . $group . '</b>.</p>';
	if (in_array ( $infinitiveVerb, $verbes_en_ancien ))
		echo '<p class="card card-body bg-light">' . $infinitiveVerb . ' kommt aus der <b>altfranzösischen Sprache</b>.</p>';
	if (in_array ( $infinitiveVerb, $verbes_defectifs ))
		echo '<p class="card card-body bg-light">' . $infinitiveVerb . ' ist ein <b>defektes Verb</b>, d. h. es  bildet nicht alle Formen aus.</p>';
	if (in_array ( $infinitiveVerb, $verbes_impersonnels ))
		echo '<p class="card card-body bg-light">' . $infinitiveVerb . ' ist ein <b>unpersönliches Verb</b>.</p>';
	?>
<h2 class="home h2-responsive">Verzeichnis</h2>
<a href="#indicatif<?php echo $category ?>">Indicatif</a>
-
<a href="#subjonctif<?php echo $category ?>">Subjonctif</a>
-
<a href="#conditionnel<?php echo $category ?>">Conditionnel</a>
-
<?php if (!in_array($infinitiveVerb, $verbes_impersonnels) && !in_array(finding_exception_model($infinitiveVerb)->getValue(), [ExceptionModel::POUVOIR])) { ?>
<a href="#impératif<?php echo $category ?>">Impératif</a>
- 
<?php } ?>
<a href="#modes-impersonnels<?php echo $category ?>">Modes impersonnels</a>
<?php } ?>
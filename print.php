<?
require_once 'conjugate.php';

function printIt($verb, $auxiliaire, $aller) {
	?>
<p>Die Konjugation von <?=$verb ?></p>
<p>Das Verb <b><?=$verb ?></b> wird <b><?=$regelmaessig ?></b> konjugiert und wird in den zusammengesetzten Zeiten mit den Hilfsverb <b><?=$auxiliaire ?></b> gebildet.</p>
<p><b><?=$verb ?></b> ist ein <b><?=$reflexiv ?></b> und <b><?=$transitiv ?></b> Verb.</p>
<h2 class="home">Verzeichnis</h2>
<ul style="list-style-type:none;">
	<li><a class="down" href="#indicatif">Indicatif</a></li>
	<li><a class="down" href="#subjonctif">Subjonctif</a></li>
	<li><a class="down" href="#conditionnel">Conditionnel</a></li>
	<li><a class="down" href="#imperatif">Impératif</a></li>
	<li><a class="down" href="#modes-impersonnels">Modes impersonnels</a></li>
</ul>
<h2 class="home"><a id="indicatif"></a>Indicatif</h2>
<hr class="linie">

<table class="tab">
	<tr class="border">
		<th colspan="3">Présent</th>
	</tr>
<?array_map( function ($pers, $array) {?>
	<tr>
		<td><span data-text="<?=French($pers, strip_tags($array)) ?>" data-lang="fr" class="trigger_play"></span></td>
	    <?=FrenchSeparated($pers, $array) ?>
	</tr>
<?}, $pers, $array [0] );?>
	<tr class="border">
		<th colspan="3">Imparfait</th>
	</tr>
<?array_map( function ($pers, $array) {?>
	<tr>
		<td><span data-text="<?=French($pers, strip_tags($array)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchSeparated($pers, $array) ?>
	</tr>
<?}, $pers, $array [1] );?>
	<tr class="border">
		<th colspan="3">Passé simple</th>
	</tr>
<?array_map( function ($pers, $array) {?>
	<tr>
		<td><span data-text="<?=French($pers, strip_tags($array)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchSeparated($pers, $array) ?>
	</tr>
<?}, $pers, $array [2] );?>
	<tr class="border">
		<th colspan="3">Futur simple  (Futur I)</th>
	</tr>
<?array_map( function ($pers, $array) {?>
	<tr>
		<td><span data-text="<?=French($pers, strip_tags($array)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchSeparated($pers, $array) ?>
	</tr>
<?}, $pers, $array [3] );?>
</table>

<table class="tab">
	<tr class="border">
		<th colspan="4">Passé composé</th>
	</tr>
<?array_map( function ($pers, $aux_exts) {?>
	<tr>
		<td><span data-text="<?=French($pers, strip_tags($aux_exts)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchCompoundTenses($pers, $aux_exts) ?>
	</tr>
<?}, $pers, $aux_exts[0], $aux_exts[0] );?>
	<tr class="border">
		<th colspan="4">Plus-que-parfait</th>
	</tr>
<?array_map( function ($pers, $aux_exts) {?>
<tr>
		<td><span data-text="<?=French($pers, strip_tags($aux_exts)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchCompoundTenses($pers, $aux_exts) ?>
	</tr>
<?}, $pers, $aux_exts[3] );?>
	<tr class="border">
		<th colspan="4">Passé antérieur</th>
	</tr>
<?array_map( function ($pers, $aux_exts) {?>
	<tr>
		<td><span data-text="<?=French($pers, strip_tags($aux_exts)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchCompoundTenses($pers, $aux_exts) ?>
	</tr>
<?}, $pers, $aux_exts[1] );?>
	<tr class="border">
		<th colspan="4">Futur antérieur (Futur II)</th>
	</tr>
<?array_map( function ($pers, $aux_exts) {?>
	<tr>
		<td><span data-text="<?=French($pers, strip_tags($aux_exts)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchCompoundTenses($pers, $aux_exts) ?>
	</tr>
<?}, $pers, $aux_exts[2] );?>
	<tr class="border">
		<th colspan="4">Futur composé (Futur proche)</th>
	</tr>
<?array_map( function ($pers, $aller) {?>
	<tr>
		<td><span data-text="<?=French($pers, strip_tags($aller)) ?>" data-lang="fr" class="trigger_play"></span></td>
        <?=FrenchCompoundTenses($pers, $aller) ?>
	</tr>
<?}, $pers, $aller );?>
</table>
<br>
<br>
<h2 class="home"><a id="subjonctif"></a>Subjonctif</h2>
<hr class="linie">
<table class="tab">
	<tr class="border">
		<th colspan="3">Présent</th>
	</tr>
<?array_map( function ($que_pers, $array) {?>
	<tr>
		<td><span data-text="<?=French($que_pers, strip_tags($array)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchSeparated($que_pers, $array) ?>
	</tr>
<?}, $que_pers, $array [4] );?>
	<tr class="border">
		<th colspan="3">Imparfait</th>
	</tr>
<?array_map( function ($que_pers, $array) {?>
	<tr>
		<td><span data-text="<?=French($que_pers, strip_tags($array)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchSeparated($que_pers, $array) ?>
	</tr>
<?}, $que_pers, $array [5] );?>
</table>
<table class="tab">
	<tr class="border">
		<th colspan="4">Passé</th>
	</tr>
<?array_map( function ($que_pers, $aux_exts) {?>
	<tr>
		<td><span data-text="<?=French($que_pers, strip_tags($aux_exts)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchCompoundTenses($que_pers, $aux_exts) ?>
	</tr>
<?}, $que_pers, $aux_exts[4] );?>
	<tr class="border">
		<th colspan="4">Plus-que-parfait</th>
	</tr>
<?array_map( function ($que_pers, $aux_exts) {?>
	<tr>
		<td><span data-text="<?=French($que_pers, strip_tags($aux_exts)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchCompoundTenses($que_pers, $aux_exts) ?>
	</tr>
<?}, $que_pers, $aux_exts[5] );?>
</table>
<br>
<br>
<h2 class="home"><a id="conditionnel"></a>Conditionnel</h2>
<hr class="linie">
<table class="tab">
	<tr class="border">
		<th colspan="3">Présent</th>
	</tr>
<?array_map( function ($pers, $array) {?>
	<tr>
		<td><span data-text="<?=French($pers, strip_tags($array)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchSeparated($pers, $array) ?>
	</tr>
<?}, $pers, $array [6] );?>
</table>
<table class="tab">
	<tr class="border">
		<th colspan="4">Passé première forme</th>
	</tr>
<?array_map( function ($pers, $aux_exts) {?>
	<tr>
		<td><span data-text="<?=French($pers, strip_tags($aux_exts)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchCompoundTenses($pers, $aux_exts) ?>
	</tr>
<?}, $pers, $aux_exts[6] );?>
	<tr class="border">
		<th colspan="4">Passé deuxième forme</th>
	</tr>
<?array_map( function ($pers, $aux_exts) {?>
	<tr>
		<td><span data-text="<?=French($pers, strip_tags($aux_exts)) ?>" data-lang="fr" class="trigger_play"></span></td>
		<?=FrenchCompoundTenses($pers, $aux_exts) ?>
	</tr>
<?}, $pers, $aux_exts[5] );?>
</table>
<br>
<br>
<h2 class="home"><a id="imperatif"></a>Impératif</h2>
<hr class="linie">
<table class="tab">
	<tr class="border">
		<th colspan="2">Présent</th>
	</tr>
<?foreach ($array[7] as $present) {?>
	<tr>
		<td><span data-text="<?=strip_tags($present)?>" data-lang="fr" class="trigger_play"></span></td>
        <td><?=$present ?></td>
	</tr>
<?}?>
</table>
<table class="tab">
	<tr class="border">
		<th colspan="3">Passé</th>
	</tr>
<?foreach ($imperatif_passe as $imperatif_passe) {?>
	<tr>
		<td><span data-text="<?=strip_tags($imperatif_passe) ?>" data-lang="fr" class="trigger_play"></span></td>
        <?=$imperatif_passe ?>
	</tr>
<?}?>
</table>
<br>
<br>
<h2 class="home"><a id="modes-impersonnels"></a>Modes impersonnels</h2>
<hr class="linie">
<table>
	<tr>
	    <th class="titel">Mode</th>
	    <th class="titel">Présent</th>
	    <th class="titel">Passé</th>
	</tr>
    <tr>
	    <td class="text-center"><b>Infinitif</b></td>
	    <td><span data-text="<?=$verb ?>" data-lang="fr" class="trigger_play"></span><?=$verb ?></td>
	    <td><span data-text="<?=$auxiliaire . ' ' . strip_tags($passe) ?>" data-lang="fr" class="trigger_play"></span><?=$auxiliaire . ' ' . strip_tags($passe) ?></td>
	</tr>
    <tr>
	    <td class="text-center"><b>Gérondif</b></td>
	    <td><span data-text="<?=strip_tags($gerontif_present) ?>" data-lang="fr" class="trigger_play"></span><?=$gerontif_present ?></td>
	    <td><span data-text="<?=strip_tags($aux_exts[7][0]) ?>" data-lang="fr" class="trigger_play"></span><?=$aux_exts[7][0] ?></td>
	</tr>
    <tr>
	    <td class="text-center"><b>Participe</b></td>
	    <td><span data-text="'<?=strip_tags($array [8][0]) ?>" data-lang="fr" class="trigger_play"></span><?=$array [8][0] ?></td>
	    <td><span data-text="'<?=strip_tags($passe) ?>" data-lang="fr" class="trigger_play"></span><?=$passe ?></td>
	 </tr>
</table>
  <?
}
?>

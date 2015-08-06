<?php
require_once 'conjugate.php';
require_once 'print.php';

function wrapInXMLTag($string) {
	return '<xml_tag>'.PHP_EOL.$string.PHP_EOL.'</xml_tag>';
}

class PrintTest extends PHPUnit_Framework_TestCase {	
	public function testPrintAimer() {
		ob_start();
		print_conjugations_of_verb ( 'aimer' );
		$actual_output = ob_get_clean();
		$this->assertXmlStringEqualsXmlString(wrapInXMLTag('<h2 class="home"><a id="indicatif"></a>Indicatif</h2>
	<hr class="linie" />
	<table class="tab">
		<tr class="border">
			<th>Présent</th>
		</tr>
		<tr>
			<td><span data-text="j’aime" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">j’</td>
			<td>aime</td>
		</tr>
		<tr>
			<td><span data-text="tu aimes" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">tu</td>
			<td>aimes</td>
		</tr>
		<tr>
			<td><span data-text="il aime" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">il</td>
			<td>aime</td>
		</tr>
		<tr>
			<td><span data-text="nous aimons" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">nous</td>
			<td>aimons</td>
		</tr>
		<tr>
			<td><span data-text="vous aimez" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">vous</td>
			<td>aimez</td>
		</tr>
		<tr>
			<td><span data-text="ils aiment" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">ils</td>
			<td>aiment</td>
		</tr>

		<tr class="border">
			<th>Imparfait</th>
		</tr>
		<tr>
			<td><span data-text="j’aimais" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">j’</td>
			<td>aimais</td>
		</tr>
		<tr>
			<td><span data-text="tu aimais" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">tu</td>
			<td>aimais</td>
		</tr>
		<tr>
			<td><span data-text="il aimait" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">il</td>
			<td>aimait</td>
		</tr>
		<tr>
			<td><span data-text="nous aimions" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">nous</td>
			<td>aimions</td>
		</tr>
		<tr>
			<td><span data-text="vous aimiez" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">vous</td>
			<td>aimiez</td>
		</tr>
		<tr>
			<td><span data-text="ils aimaient" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">ils</td>
			<td>aimaient</td>
		</tr>

		<tr class="border">
			<th>Passé simple</th>
		</tr>
		<tr>
			<td><span data-text="j’aimai" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">j’</td>
			<td>aimai</td>
		</tr>
		<tr>
			<td><span data-text="tu aimas" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">tu</td>
			<td>aimas</td>
		</tr>
		<tr>
			<td><span data-text="il aima" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">il</td>
			<td>aima</td>
		</tr>
		<tr>
			<td><span data-text="nous aimâmes" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">nous</td>
			<td>aimâmes</td>
		</tr>
		<tr>
			<td><span data-text="vous aimâtes" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">vous</td>
			<td>aimâtes</td>
		</tr>
		<tr>
			<td><span data-text="ils aimèrent" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">ils</td>
			<td>aimèrent</td>
		</tr>

		<tr class="border">
			<th>Futur simple (Futur I)</th>
		</tr>
		<tr>
			<td><span data-text="j’aimerai" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">j’</td>
			<td>aimerai</td>
		</tr>
		<tr>
			<td><span data-text="tu aimeras" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">tu</td>
			<td>aimeras</td>
		</tr>
		<tr>
			<td><span data-text="il aimera" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">il</td>
			<td>aimera</td>
		</tr>
		<tr>
			<td><span data-text="nous aimerons" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">nous</td>
			<td>aimerons</td>
		</tr>
		<tr>
			<td><span data-text="vous aimerez" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">vous</td>
			<td>aimerez</td>
		</tr>
		<tr>
			<td><span data-text="ils aimeront" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">ils</td>
			<td>aimeront</td>
		</tr>

	</table>

	<table>
		<tr class="border">
			<th>Passé composé</th>
		</tr>
		<tr>
			<td><span data-text="j’ai aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">j’</td>
			<td>ai</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="tu as aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">tu</td>
			<td>as</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="il a aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">il</td>
			<td>a</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="nous avons aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">nous</td>
			<td>avons</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="vous avez aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">vous</td>
			<td>avez</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="ils ont aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">ils</td>
			<td>ont</td>
			<td>aimé</td>
		</tr>

		<tr class="border">
			<th>Plus-que-parfait</th>
		</tr>
		<tr>
			<td><span data-text="j’avais aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">j’</td>
			<td>avais</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="tu avais aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">tu</td>
			<td>avais</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="il avait aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">il</td>
			<td>avait</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="nous avions aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">nous</td>
			<td>avions</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="vous aviez aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">vous</td>
			<td>aviez</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="ils avaient aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">ils</td>
			<td>avaient</td>
			<td>aimé</td>
		</tr>

		<tr class="border">
			<th>Passé antérieur</th>
		</tr>
		<tr>
			<td><span data-text="j’eus aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">j’</td>
			<td>eus</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="tu eus aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">tu</td>
			<td>eus</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="il eut aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">il</td>
			<td>eut</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="nous eûmes aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">nous</td>
			<td>eûmes</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="vous eûtes aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">vous</td>
			<td>eûtes</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="ils eurent aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">ils</td>
			<td>eurent</td>
			<td>aimé</td>
		</tr>

		<tr class="border">
			<th>Futur antérieur (Futur II)</th>
		</tr>
		<tr>
			<td><span data-text="j’aurai aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">j’</td>
			<td>aurai</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="tu auras aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">tu</td>
			<td>auras</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="il aura aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">il</td>
			<td>aura</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="nous aurons aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">nous</td>
			<td>aurons</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="vous aurez aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">vous</td>
			<td>aurez</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="ils auront aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">ils</td>
			<td>auront</td>
			<td>aimé</td>
		</tr>

		<tr class="border">
			<th>Futur composé (Futur proche)</th>
		</tr>
		<tr>
			<td><span data-text="je vais aimer" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">je</td>
			<td>vais</td>
			<td>aimer</td>
		</tr>
		<tr>
			<td><span data-text="tu vas aimer" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">tu</td>
			<td>vas</td>
			<td>aimer</td>
		</tr>
		<tr>
			<td><span data-text="il va aimer" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">il</td>
			<td>va</td>
			<td>aimer</td>
		</tr>
		<tr>
			<td><span data-text="nous allons aimer" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">nous</td>
			<td>allons</td>
			<td>aimer</td>
		</tr>
		<tr>
			<td><span data-text="vous allez aimer" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">vous</td>
			<td>allez</td>
			<td>aimer</td>
		</tr>
		<tr>
			<td><span data-text="ils vont aimer" data-lang="fr" class="trigger_play"></span></td>
			<td>ils</td>
			<td>vont</td>
			<td>aimer</td>
		</tr>

	</table>

<h2 class="home"><a id="subjonctif"></a>Subjonctif</h2>
	<hr class="linie" />
	<table class="tab">
		<tr class="border">
			<th>Présent</th>
		</tr>
		<tr>
			<td><span data-text="que j’aime" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que j’</td>
			<td>aime</td>
		</tr>
		<tr>
			<td><span data-text="que tu aimes" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que tu</td>
			<td>aimes</td>
		</tr>
		<tr>
			<td><span data-text="qu’il aime" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">qu’il</td>
			<td>aime</td>
		</tr>
		<tr>
			<td><span data-text="que nous aimions" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que nous</td>
			<td>aimions</td>
		</tr>
		<tr>
			<td><span data-text="que vous aimiez" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que vous</td>
			<td>aimiez</td>
		</tr>
		<tr>
			<td><span data-text="qu’ils aiment" data-lang="fr" class="trigger_play"></span></td>
			<td>qu’ils</td>
			<td>aiment</td>
		</tr>

		<tr class="border">
			<th>Imparfait</th>
		</tr>
		<tr>
			<td><span data-text="que j’aimasse" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que j’</td>
			<td>aimasse</td>
		</tr>
		<tr>
			<td><span data-text="que tu aimasses" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que tu</td>
			<td>aimasses</td>
		</tr>
		<tr>
			<td><span data-text="qu’il aimât" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">qu’il</td>
			<td>aimât</td>
		</tr>
		<tr>
			<td><span data-text="que nous aimassions" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que nous</td>
			<td>aimassions</td>
		</tr>
		<tr>
			<td><span data-text="que vous aimassiez" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que vous</td>
			<td>aimassiez</td>
		</tr>
		<tr>
			<td><span data-text="qu’ils aimassent" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">qu’ils</td>
			<td>aimassent</td>
		</tr>

	</table>

	<table>
		<tr class="border">
			<th>Passé</th>
		</tr>
		<tr>
			<td><span data-text="que j’aie aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que j’</td>
			<td>aie</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="que tu aies aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que tu</td>
			<td>aies</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="qu’il ait aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">qu’il</td>
			<td>ait</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="que nous ayons aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que nous</td>
			<td>ayons</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="que vous ayez aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que vous</td>
			<td>ayez</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="qu’ils aient aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">qu’ils</td>
			<td>aient</td>
			<td>aimé</td>
		</tr>

		<tr class="border">
			<th>Plus-que-parfait</th>
		</tr>
		<tr>
			<td><span data-text="que j’eusse aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que j’</td>
			<td>eusse</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="que tu eusses aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que tu</td>
			<td>eusses</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="qu’il eût aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">qu’il</td>
			<td>eût</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="que nous eussions aimé" data-lang="fr" class="trigger_play"></span></td>
	 		<td class="text-right text-muted">que nous</td>
			<td>eussions</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="que vous eussiez aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">que vous</td>
			<td>eussiez</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="qu’ils eussent aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">qu’ils</td>
			<td>eussent</td>
			<td>aimé</td>
		</tr>

	</table>

<h2 class="home"><a id="conditionnel"></a>Conditionnel</h2>
	<hr class="linie" />
	<table class="tab">
		<tr class="border">
			<th>Présent</th>
		</tr>
		<tr>
			<td><span data-text="j’aimerais" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">j’</td>
			<td>aimerais</td>
		</tr>
		<tr>
			<td><span data-text="tu aimerais" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">tu</td>
			<td>aimerais</td>
		</tr>
		<tr>
			<td><span data-text="il aimerait" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">il</td>
			<td>aimerait</td>
		</tr>
		<tr>
			<td><span data-text="nous aimerions" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">nous</td>
			<td>aimerions</td>
		</tr>
		<tr>
			<td><span data-text="vous aimeriez" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">vous</td>
			<td>aimeriez</td>
		</tr>
		<tr>
			<td><span data-text="ils aimeraient" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">ils</td>
			<td>aimeraient</td>
		</tr>

	</table>

	<table>
		<tr class="border">
			<th>Passé première forme</th>
		</tr>
		<tr>
			<td><span data-text="j’aurais aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">j’</td>
			<td>aurais</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="tu aurais aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">tu</td>
			<td>aurais</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="il aurait aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">il</td>
			<td>aurait</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="nous aurions aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">nous</td>
			<td>aurions</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="vous auriez aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">vous</td>
			<td>auriez</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="ils auraient aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">ils</td>
			<td>auraient</td>
			<td>aimé</td>
		</tr>

		<tr class="border">
			<th>Passé deuxième forme</th>
		</tr>
		<tr>
			<td><span data-text="j’eusse aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">j’</td>
			<td>eusse</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="tu eusses aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">tu</td>
			<td>eusses</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="il eût aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">il</td>
			<td>eût</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="nous eussions aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">nous</td>
			<td>eussions</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="vous eussiez aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">vous</td>
			<td>eussiez</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="ils eussent aimé" data-lang="fr" class="trigger_play"></span></td>
			<td class="text-right text-muted">ils</td>
			<td>eussent</td>
			<td>aimé</td>
		</tr>

	</table>

<h2 class="home"><a id="imperatif"></a>Imperatif</h2>
	<hr class="linie" />
	<table class="tab">
		<tr class="border">
			<th>Présent</th>
		</tr>
		<tr>
			<td><span data-text="aime" data-lang="fr" class="trigger_play"></span></td>
			<td>aime</td>
		</tr>
		<tr>
			<td><span data-text="aimons" data-lang="fr" class="trigger_play"></span></td>
			<td>aimons</td>
		</tr>
		<tr>
			<td><span data-text="aimez" data-lang="fr" class="trigger_play"></span></td>
			<td>aimez</td>
		</tr>

	</table>

	<table>
		<tr class="border">
			<th>Passé</th>
		</tr>
		<tr>
			<td><span data-text="aie aimé" data-lang="fr" class="trigger_play"></span></td>
			<td>aie</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="ayons aimé" data-lang="fr" class="trigger_play"></span></td>
			<td>ayons</td>
			<td>aimé</td>
		</tr>
		<tr>
			<td><span data-text="ayez aimé" data-lang="fr" class="trigger_play"></span></td>
			<td>ayez</td>
			<td>aimé</td>
		</tr>

	</table>

	<table>
		<tr>
			<td>aimer</td>
		</tr>
		<tr>
			<td>avoir aimé</td>
		</tr>
		<tr>
			<td>en aimant</td>
		</tr>
		<tr>
			<td>en ayant aimé</td>
		</tr>
		<tr>
			<td>aimant</td>
		</tr>
		<tr>
			<td>aimé</td></tr>
	</table>'), wrapInXMLTag($actual_output));
	}
}
?>
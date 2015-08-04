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
		<td>j’aime</td>
	</tr>
	<tr>
		<td><span data-text="tu aimes" data-lang="fr" class="trigger_play"></span></td>
		<td>tu aimes</td>
	</tr>
	<tr>
		<td><span data-text="il aime" data-lang="fr" class="trigger_play"></span></td>
		<td>il aime</td>
	</tr>
	<tr>
		<td><span data-text="nous aimons" data-lang="fr" class="trigger_play"></span></td>
		<td>nous aimons</td>
	</tr>
	<tr>
		<td><span data-text="vous aimez" data-lang="fr" class="trigger_play"></span></td>
		<td>vous aimez</td>
	</tr>
	<tr>
		<td><span data-text="ils aiment" data-lang="fr" class="trigger_play"></span></td>
		<td>ils aiment</td>
	</tr>

		<tr class="border">
			<th>Imparfait</th>
		</tr>
	<tr>
		<td><span data-text="j’aimais" data-lang="fr" class="trigger_play"></span></td>
		<td>j’aimais</td>
	</tr>
	<tr>
		<td><span data-text="tu aimais" data-lang="fr" class="trigger_play"></span></td>
		<td>tu aimais</td>
	</tr>
	<tr>
		<td><span data-text="il aimait" data-lang="fr" class="trigger_play"></span></td>
		<td>il aimait</td>
	</tr>
	<tr>
		<td><span data-text="nous aimions" data-lang="fr" class="trigger_play"></span></td>
		<td>nous aimions</td>
	</tr>
	<tr>
		<td><span data-text="vous aimiez" data-lang="fr" class="trigger_play"></span></td>
		<td>vous aimiez</td>
	</tr>
	<tr>
		<td><span data-text="ils aimaient" data-lang="fr" class="trigger_play"></span></td>
		<td>ils aimaient</td>
	</tr>

		<tr class="border">
			<th>Passé simple</th>
		</tr>
		<tr>
			<td><span data-text="j’aimai" data-lang="fr" class="trigger_play"></span></td>
			<td>j’aimai</td>
		</tr>
		<tr>
			<td><span data-text="tu aimas" data-lang="fr" class="trigger_play"></span></td>
			<td>tu aimas</td>
		</tr>
		<tr>
			<td><span data-text="il aima" data-lang="fr" class="trigger_play"></span></td>
			<td>il aima</td>
		</tr>
		<tr>
			<td><span data-text="nous aimâmes" data-lang="fr" class="trigger_play"></span></td>
			<td>nous aimâmes</td>
		</tr>
		<tr>
			<td><span data-text="vous aimâtes" data-lang="fr" class="trigger_play"></span></td>
			<td>vous aimâtes</td>
		</tr>
		<tr>
			<td><span data-text="ils aimèrent" data-lang="fr" class="trigger_play"></span></td>
			<td>ils aimèrent</td>
		</tr>

		<tr class="border">
			<th>Futur simple (Futur I)</th>
		</tr>
		<tr>
			<td><span data-text="j’aimerai" data-lang="fr" class="trigger_play"></span></td>
			<td>j’aimerai</td>
		</tr>
		<tr>
			<td><span data-text="tu aimeras" data-lang="fr" class="trigger_play"></span></td
			<td>tu aimeras</td>
		</tr>
		<tr>
			<td><span data-text="il aimera" data-lang="fr" class="trigger_play"></span></td>
			<td>il aimera</td>
		</tr>
		<tr>
			<td><span data-text="nous aimerons" data-lang="fr" class="trigger_play"></span></td>
			<td>nous aimerons</td>
		</tr>
		<tr>
			<td><span data-text="vous aimerez" data-lang="fr" class="trigger_play"></span></td>
			<td>vous aimerez</td
		</tr>
	<tr><td><span data-text="ils aimeront" data-lang="fr" class="trigger_play"></span></td><td>ils aimeront</td>
	</tr>

	</table>

	<table>
		<tr class="border">
			<th>Passé composé</th>
		</tr>
<tr><td><span data-text="j’ai aimé" data-lang="fr" class="trigger_play"></span></td><td>j’ai aimé</td></tr>
<tr><td><span data-text="tu as aimé" data-lang="fr" class="trigger_play"></span></td><td>tu as aimé</td></tr>
<tr><td><span data-text="il a aimé" data-lang="fr" class="trigger_play"></span></td><td>il a aimé</td></tr>
<tr><td><span data-text="nous avons aimé" data-lang="fr" class="trigger_play"></span></td><td>nous avons aimé</td></tr>
<tr><td><span data-text="vous avez aimé" data-lang="fr" class="trigger_play"></span></td><td>vous avez aimé</td></tr>
<tr><td><span data-text="ils ont aimé" data-lang="fr" class="trigger_play"></span></td><td>ils ont aimé</td></tr>

		<tr class="border">
			<th>Plus-que-parfait</th>
		</tr>
<tr><td><span data-text="j’avais aimé" data-lang="fr" class="trigger_play"></span></td><td>j’avais aimé</td></tr>
<tr><td><span data-text="tu avais aimé" data-lang="fr" class="trigger_play"></span></td><td>tu avais aimé</td></tr>
<tr><td><span data-text="il avait aimé" data-lang="fr" class="trigger_play"></span></td><td>il avait aimé</td></tr>
<tr><td><span data-text="nous avions aimé" data-lang="fr" class="trigger_play"></span></td><td>nous avions aimé</td></tr>
<tr><td><span data-text="vous aviez aimé" data-lang="fr" class="trigger_play"></span></td><td>vous aviez aimé</td></tr>
<tr><td><span data-text="ils avaient aimé" data-lang="fr" class="trigger_play"></span></td><td>ils avaient aimé</td></tr>

		<tr class="border">
			<th>Passé antérieur</th>
		</tr>
<tr><td><span data-text="j’eus aimé" data-lang="fr" class="trigger_play"></span></td><td>j’eus aimé</td></tr>
<tr><td><span data-text="tu eus aimé" data-lang="fr" class="trigger_play"></span></td><td>tu eus aimé</td></tr>
<tr><td><span data-text="il eut aimé" data-lang="fr" class="trigger_play"></span></td><td>il eut aimé</td></tr>
<tr><td><span data-text="nous eûmes aimé" data-lang="fr" class="trigger_play"></span></td><td>nous eûmes aimé</td></tr>
<tr><td><span data-text="vous eûtes aimé" data-lang="fr" class="trigger_play"></span></td><td>vous eûtes aimé</td></tr>
<tr><td><span data-text="ils eurent aimé" data-lang="fr" class="trigger_play"></span></td><td>ils eurent aimé</td></tr>

		<tr class="border">
			<th>Futur antérieur (Futur II)</th>
		</tr>
<tr><td><span data-text="j’aurai aimé" data-lang="fr" class="trigger_play"></span></td><td>j’aurai aimé</td></tr>
<tr><td><span data-text="tu auras aimé" data-lang="fr" class="trigger_play"></span></td><td>tu auras aimé</td></tr>
<tr><td><span data-text="il aura aimé" data-lang="fr" class="trigger_play"></span></td><td>il aura aimé</td></tr>
<tr><td><span data-text="nous aurons aimé" data-lang="fr" class="trigger_play"></span></td><td>nous aurons aimé</td></tr>
<tr><td><span data-text="vous aurez aimé" data-lang="fr" class="trigger_play"></span></td><td>vous aurez aimé</td></tr>
<tr><td><span data-text="ils auront aimé" data-lang="fr" class="trigger_play"></span></td><td>ils auront aimé</td></tr>

		<tr class="border">
			<th>Futur composé (Futur proche)</th>
		</tr>
<tr><td><span data-text="je vais aimer" data-lang="fr" class="trigger_play"></span></td><td>je vais aimer</td></tr>
<tr><td><span data-text="tu vas aimer" data-lang="fr" class="trigger_play"></span></td><td>tu vas aimer</td></tr>
<tr><td><span data-text="il va aimer" data-lang="fr" class="trigger_play"></span></td><td>il va aimer</td></tr>
<tr><td><span data-text="nous allons aimer" data-lang="fr" class="trigger_play"></span></td><td>nous allons aimer</td></tr>
<tr><td><span data-text="vous allez aimer" data-lang="fr" class="trigger_play"></span></td><td>vous allez aimer</td></tr>
<tr><td><span data-text="ils vont aimer" data-lang="fr" class="trigger_play"></span></td><td>ils vont aimer</td></tr>

	</table>

<h2 class="home"><a id="subjonctif"></a>Subjonctif</h2>
	<hr class="linie" />
	<table class="tab">
		<tr class="border">
			<th>Présent</th>
		</tr>
<tr><td><span data-text="que j’aime" data-lang="fr" class="trigger_play"></span></td><td>que j’aime</td></tr>
<tr><td><span data-text="que tu aimes" data-lang="fr" class="trigger_play"></span></td><td>que tu aimes</td></tr>
<tr><td><span data-text="qu’il aime" data-lang="fr" class="trigger_play"></span></td><td>qu’il aime</td></tr>
<tr><td><span data-text="que nous aimions" data-lang="fr" class="trigger_play"></span></td><td>que nous aimions</td></tr>
<tr><td><span data-text="que vous aimiez" data-lang="fr" class="trigger_play"></span></td><td>que vous aimiez</td></tr>
<tr><td><span data-text="qu’ils aiment" data-lang="fr" class="trigger_play"></span></td><td>qu’ils aiment</td></tr>

		<tr class="border">
			<th>Imparfait</th>
		</tr>
<tr><td><span data-text="que j’aimasse" data-lang="fr" class="trigger_play"></span></td><td>que j’aimasse</td></tr>
<tr><td><span data-text="que tu aimasses" data-lang="fr" class="trigger_play"></span></td><td>que tu aimasses</td></tr>
<tr><td><span data-text="qu’il aimât" data-lang="fr" class="trigger_play"></span></td><td>qu’il aimât</td></tr>
<tr><td><span data-text="que nous aimassions" data-lang="fr" class="trigger_play"></span></td><td>que nous aimassions</td></tr>
<tr><td><span data-text="que vous aimassiez" data-lang="fr" class="trigger_play"></span></td><td>que vous aimassiez</td></tr>
<tr><td><span data-text="qu’ils aimassent" data-lang="fr" class="trigger_play"></span></td><td>qu’ils aimassent</td></tr>

	</table>

	<table>
		<tr class="border">
			<th>Passé</th>
		</tr>
<tr><td><span data-text="que j’aie aimé" data-lang="fr" class="trigger_play"></span></td><td>que j’aie aimé</td></tr>
<tr><td><span data-text="que tu aies aimé" data-lang="fr" class="trigger_play"></span></td><td>que tu aies aimé</td></tr>
<tr><td><span data-text="qu’il ait aimé" data-lang="fr" class="trigger_play"></span></td><td>qu’il ait aimé</td></tr>
<tr><td><span data-text="que nous ayons aimé" data-lang="fr" class="trigger_play"></span></td><td>que nous ayons aimé</td></tr>
<tr><td><span data-text="que vous ayez aimé" data-lang="fr" class="trigger_play"></span></td><td>que vous ayez aimé</td></tr>
<tr><td><span data-text="qu’ils aient aimé" data-lang="fr" class="trigger_play"></span></td><td>qu’ils aient aimé</td></tr>

		<tr class="border">
			<th>Plus-que-parfait</th>
		</tr>
<tr><td><span data-text="que j’eusse aimé" data-lang="fr" class="trigger_play"></span></td><td>que j’eusse aimé</td></tr>
<tr><td><span data-text="que tu eusses aimé" data-lang="fr" class="trigger_play"></span></td><td>que tu eusses aimé</td></tr>
<tr><td><span data-text="qu’il eût aimé" data-lang="fr" class="trigger_play"></span></td><td>qu’il eût aimé</td></tr>
<tr><td><span data-text="que nous eussions aimé" data-lang="fr" class="trigger_play"></span></td><td>que nous eussions aimé</td></tr>
<tr><td><span data-text="que vous eussiez aimé" data-lang="fr" class="trigger_play"></span></td><td>que vous eussiez aimé</td></tr>
<tr><td><span data-text="qu’ils eussent aimé" data-lang="fr" class="trigger_play"></span></td><td>qu’ils eussent aimé</td></tr>

	</table>

<h2 class="home"><a id="conditionnel"></a>Conditionnel</h2>
	<hr class="linie" />
	<table class="tab">
		<tr class="border">
			<th>Présent</th>
		</tr>
<tr><td><span data-text="j’aimerais" data-lang="fr" class="trigger_play"></span></td><td>j’aimerais</td></tr>
<tr><td><span data-text="tu aimerais" data-lang="fr" class="trigger_play"></span></td><td>tu aimerais</td></tr>
<tr><td><span data-text="il aimerait" data-lang="fr" class="trigger_play"></span></td><td>il aimerait</td></tr>
<tr><td><span data-text="nous aimerions" data-lang="fr" class="trigger_play"></span></td><td>nous aimerions</td></tr>
<tr><td><span data-text="vous aimeriez" data-lang="fr" class="trigger_play"></span></td><td>vous aimeriez</td></tr>
<tr><td><span data-text="ils aimeraient" data-lang="fr" class="trigger_play"></span></td><td>ils aimeraient</td></tr>

	</table>

	<table>
		<tr class="border">
			<th>Passé première forme</th>
		</tr>
<tr><td><span data-text="j’aurais aimé" data-lang="fr" class="trigger_play"></span></td><td>j’aurais aimé</td></tr>
<tr><td><span data-text="tu aurais aimé" data-lang="fr" class="trigger_play"></span></td><td>tu aurais aimé</td></tr>
<tr><td><span data-text="il aurait aimé" data-lang="fr" class="trigger_play"></span></td><td>il aurait aimé</td></tr>
<tr><td><span data-text="nous aurions aimé" data-lang="fr" class="trigger_play"></span></td><td>nous aurions aimé</td></tr>
<tr><td><span data-text="vous auriez aimé" data-lang="fr" class="trigger_play"></span></td><td>vous auriez aimé</td></tr>
<tr><td><span data-text="ils auraient aimé" data-lang="fr" class="trigger_play"></span></td><td>ils auraient aimé</td></tr>

		<tr class="border">
			<th>Passé deuxième forme</th>
		</tr>
<tr><td><span data-text="j’eusse aimé" data-lang="fr" class="trigger_play"></span></td><td>j’eusse aimé</td></tr>
<tr><td><span data-text="tu eusses aimé" data-lang="fr" class="trigger_play"></span></td><td>tu eusses aimé</td></tr>
<tr><td><span data-text="il eût aimé" data-lang="fr" class="trigger_play"></span></td><td>il eût aimé</td></tr>
<tr><td><span data-text="nous eussions aimé" data-lang="fr" class="trigger_play"></span></td><td>nous eussions aimé</td></tr>
<tr><td><span data-text="vous eussiez aimé" data-lang="fr" class="trigger_play"></span></td><td>vous eussiez aimé</td></tr>
<tr><td><span data-text="ils eussent aimé" data-lang="fr" class="trigger_play"></span></td><td>ils eussent aimé</td></tr>

	</table>

<h2 class="home"><a id="imperatif"></a>Imperatif</h2>
	<hr class="linie" />
	<table class="tab">
		<tr class="border">
			<th>Présent</th>
		</tr>
<tr><td><span data-text="aime" data-lang="fr" class="trigger_play"></span></td><td>aime</td></tr>
<tr><td><span data-text="aimons" data-lang="fr" class="trigger_play"></span></td><td>aimons</td></tr>
<tr><td><span data-text="aimez" data-lang="fr" class="trigger_play"></span></td><td>aimez</td></tr>

	</table>

	<table>
		<tr class="border">
			<th>Passé</th>
		</tr>
<tr><td><span data-text="aie aimé" data-lang="fr" class="trigger_play"></span></td><td>aie aimé</td></tr>
<tr><td><span data-text="ayons aimé" data-lang="fr" class="trigger_play"></span></td><td>ayons aimé</td></tr>
<tr><td><span data-text="ayez aimé" data-lang="fr" class="trigger_play"></span></td><td>ayez aimé</td></tr>

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
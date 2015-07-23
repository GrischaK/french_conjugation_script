<?php
require_once 'conjugate.php';
require_once 'print.php';
class PrintTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider PrintProvider
	 */
	public function testPrint($expectedResult, $verb) {
		$this->expectOutputString ( $expectedResult );
		print_conjugations_of_verb ( $verb );
	}
	public function PrintProvider() {
		return array (
				array (
'<table>
<tr><td>j’aime</td></tr>
<tr><td>tu aimes</td></tr>
<tr><td>il aime</td></tr>
<tr><td>nous aimons</td></tr>
<tr><td>vous aimez</td></tr>
<tr><td>ils aiment</td></tr>

<tr><td>j’aimais</td></tr>
<tr><td>tu aimais</td></tr>
<tr><td>il aimait</td></tr>
<tr><td>nous aimions</td></tr>
<tr><td>vous aimiez</td></tr>
<tr><td>ils aimaient</td></tr>

<tr><td>j’aimai</td></tr>
<tr><td>tu aimas</td></tr>
<tr><td>il aima</td></tr>
<tr><td>nous aimâmes</td></tr>
<tr><td>vous aimâtes</td></tr>
<tr><td>ils aimèrent</td></tr>

<tr><td>j’aimerai</td></tr>
<tr><td>tu aimeras</td></tr>
<tr><td>il aimera</td></tr>
<tr><td>nous aimerons</td></tr>
<tr><td>vous aimerez</td></tr>
<tr><td>ils aimeront</td></tr>

</table>

<table>
<tr><td>j’ai aimé</td></tr>
<tr><td>tu as aimé</td></tr>
<tr><td>il a aimé</td></tr>
<tr><td>nous avons aimé</td></tr>
<tr><td>vous avez aimé</td></tr>
<tr><td>ils ont aimé</td></tr>

<tr><td>j’avais aimé</td></tr>
<tr><td>tu avais aimé</td></tr>
<tr><td>il avait aimé</td></tr>
<tr><td>nous avions aimé</td></tr>
<tr><td>vous aviez aimé</td></tr>
<tr><td>ils avaient aimé</td></tr>

<tr><td>j’eus aimé</td></tr>
<tr><td>tu eus aimé</td></tr>
<tr><td>il eut aimé</td></tr>
<tr><td>nous eûmes aimé</td></tr>
<tr><td>vous eûtes aimé</td></tr>
<tr><td>ils eurent aimé</td></tr>

<tr><td>j’aurai aimé</td></tr>
<tr><td>tu auras aimé</td></tr>
<tr><td>il aura aimé</td></tr>
<tr><td>nous aurons aimé</td></tr>
<tr><td>vous aurez aimé</td></tr>
<tr><td>ils auront aimé</td></tr>

<tr><td>je vais aimer</td></tr>
<tr><td>tu vas aimer</td></tr>
<tr><td>il va aimer</td></tr>
<tr><td>nous allons aimer</td></tr>
<tr><td>vous allez aimer</td></tr>
<tr><td>ils vont aimer</td></tr>

</table>

<table>
<tr><td>que j’aime</td></tr>
<tr><td>que tu aimes</td></tr>
<tr><td>qu’il aime</td></tr>
<tr><td>que nous aimions</td></tr>
<tr><td>que vous aimiez</td></tr>
<tr><td>qu’ils aiment</td></tr>

<tr><td>que j’aimasse</td></tr>
<tr><td>que tu aimasses</td></tr>
<tr><td>qu’il aimât</td></tr>
<tr><td>que nous aimassions</td></tr>
<tr><td>que vous aimassiez</td></tr>
<tr><td>qu’ils aimassent</td></tr>

</table>

<table>
<tr><td>que j’aie aimé</td></tr>
<tr><td>que tu aies aimé</td></tr>
<tr><td>qu’il ait aimé</td></tr>
<tr><td>que nous ayons aimé</td></tr>
<tr><td>que vous ayez aimé</td></tr>
<tr><td>qu’ils aient aimé</td></tr>

<tr><td>que j’eusse aimé</td></tr>
<tr><td>que tu eusses aimé</td></tr>
<tr><td>qu’il eût aimé</td></tr>
<tr><td>que nous eussions aimé</td></tr>
<tr><td>que vous eussiez aimé</td></tr>
<tr><td>qu’ils eussent aimé</td></tr>

</table>

<table>
<tr><td>j’aimerais</td></tr>
<tr><td>tu aimerais</td></tr>
<tr><td>il aimerait</td></tr>
<tr><td>nous aimerions</td></tr>
<tr><td>vous aimeriez</td></tr>
<tr><td>ils aimeraient</td></tr>

</table>

<table>
<tr><td>j’aurais aimé</td></tr>
<tr><td>tu aurais aimé</td></tr>
<tr><td>il aurait aimé</td></tr>
<tr><td>nous aurions aimé</td></tr>
<tr><td>vous auriez aimé</td></tr>
<tr><td>ils auraient aimé</td></tr>

<tr><td>j’eusse aimé</td></tr>
<tr><td>tu eusses aimé</td></tr>
<tr><td>il eût aimé</td></tr>
<tr><td>nous eussions aimé</td></tr>
<tr><td>vous eussiez aimé</td></tr>
<tr><td>ils eussent aimé</td></tr>

</table>

<table>
<tr><td>aime</td></tr>
<tr><td>aimons</td></tr>
<tr><td>aimez</td></tr>

</table>

<table>
<tr><td>aie aimé</td></tr>
<tr><td>ayons aimé</td></tr>
<tr><td>ayez aimé</td></tr>

</table>

<table>
<tr><td>aimer</td></tr>
<tr><td>avoir aimé</td></tr>
<tr><td>en aimant</td></tr>
<tr><td>en ayant aimé</td></tr>
<tr><td>aimant</td></tr>
<tr><td>aimé</td></tr>
</table>

',



'aimer' 
				) 
		);
	}
}
?>
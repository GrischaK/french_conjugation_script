<?php
echo '<h1>Kategorien</h1>';
echo '<p class="well">Hier findest du alle Kategorien. Entweder die Gruppe der drei großen Verbgruppen, den zwei Hilfsverben, der Transitivität oder ob das Verb reflexiv oder irreflexiv ist sowie vielen unregelmäßigen Verbgruppen</p>';
for($a = 0; $a < count ( $kategorien ); $a ++) {
	if ($a == 0)
		echo '<h3 class="home">Verbgruppen</h3>';
	elseif ($a == 3)
		echo '<br><h3 class="home">Hilfsverb</h3>';
	elseif ($a == 6)
		echo '<br><h3 class="home">Eigenschaft von Verben</h3>';
	elseif ($a == 14)
		echo '<br><h3 class="home">Endungen unregelmäßiger Verben auf -ER</h3>';
	elseif ($a == 27)
		echo '<br><h3 class="home">Endungen unregelmäßiger Verben auf -IR</h3>';
	elseif ($a == 40)
		echo '<br><h3 class="home">Endungen unregelmäßiger Verben auf -RE</h3>';
	echo '<li><a href="' . $kategorien [$a] . '/">' . $titles [$a] . '</a></li>';
}
echo '</ul>';
?>
<?php 
	$per_page=200;
	$params=explode($char_split,$_GET["buchstabe"]);

function filter_factory($letter) {
    return function ($input) use ($letter) {
        return is_string($input) && $input[0] === $letter;
    };
}		
	
	if(strlen($params[0])>1){
		$array = preg_grep("/^".$params[0].".*/",substr($infinitiveVerb,0,1));	
		$h1='Suchergebnisse für '.$params[0];
	}else{
		$array = array_filter($infinitiveVerb, filter_factory($params[0])); 
		$h1=strtoupper($params[0]);
	}
?>
<h1><?php echo $h1; ?></h1>
<?php translation('la conjugaison','die Konjugation'); ?>
<p class="well">Hier finden sie alle Verben, die mit <?php echo ucfirst($params[0]);?> beginnen. Zu jeder Vokabel finden Sie die Konjugation für den Indicatif, Subjonctif, Conditionnel und sowie den Impératif, Infinitif, Gérondif und Participe Modus.</p>
<?php
	$num=0;
	$start=0;
	$page=0;
	if(count($params)>1)
		$page=$params[1];
	$start=$page*$per_page;
?>
<table width="100%">
<?php
	$array = array_chunk($array, 4);
if (is_array($array) || is_object($array))
{	
	foreach($array as $chunk){
		if($num>=$start) echo '<tr>';
		foreach($chunk as $val){
			$num++;
			if($num<=$start) continue;
			if($num>$start+$per_page) break;
			echo '<td><a class="franzoesisch" href="'.$val.'/">'.$val.'</a></td>';
		}
		if($num>$start+$per_page) break;
		if($num>$start) '</tr>';
	}
}	
	echo '</table>';
	echo '<div id="prev_next">';
	if($page>0)
		echo '<a href="../'.$params[0].$char_split.($page-1).'/">&lt; Vorherige</a>';
	if($num>$start+$per_page)
		echo '<a href="../'.$params[0].$char_split.($page+1).'/">Nächste &gt;</a>';
	echo '</div>';
?>
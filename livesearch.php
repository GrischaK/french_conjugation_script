<?php
	header('Content-Type: application/xml; charset=utf-8');
	require_once 'verbs.php';
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<pages>
<?php 
	$num=0;
	$hint="";
	foreach($infinitiveVerb as $buchstabe){
		foreach($buchstabe as $$infinitiveVerb){
			if(preg_match("/^".$_GET['pattern']."/",$infinitiveVerb)){
				$hint.="<a class=\"franzoesisch konju\" href='".substr($infinitiveVerb,0,1)."/".$infinitiveVerb."/'>".$infinitiveVerb."</a>";
				$num++;
			}
			if($num>10)break;
		}
		if($num>10)break;
	}
	if($num==0)
		echo 'keine Vorschläge';
	else 
		echo $hint;
?>
</pages>

<?php
	header('Content-Type: application/xml; charset=utf-8');
	include($_SERVER['DOCUMENT_ROOT']."/data/languages/french/verbs.php");
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<pages>
<?php 
	$num=0;
	$hint="";
	foreach($verbs as $buchstabe){
		foreach($buchstabe as $verb){
			if(preg_match("/^".$_GET['pattern']."/",$verb)){
				$hint.="<a class=\"franzoesisch konju\" href='".substr($verb,0,1)."/".$verb."/'>".$verb."</a>";
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

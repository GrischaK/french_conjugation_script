<?php
	header('Content-Type: application/xml; charset=utf-8');
	require_once 'verbs.php';
?>
<? echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<pages>
<?php
	$num=0;
	$hint="";
if (is_array($infinitiveVerb) || is_object($infinitiveVerb))
{	
	foreach($infinitiveVerb as $buchstabe){
		if (is_array($buchstabe) || is_object($buchstabe))	
		{	
			foreach($buchstabe as $verb){
				if(preg_match("/^".$_GET['pattern']."/",$infinitiveVerb)){
					$hint.="<a class=\"franzoesisch konju\" href='".substr($verb,0,1)."/".$verb."/'>".$verb."</a>";
					$num++;
				}
				if($num>10)break;
			}
			if($num>10)break;
		}
	}		
}	
	if($num==0)
		echo 'keine Vorschläge';
	else 
		echo $hint;
?>
</pages>

<?php
header ( 'Content-Type: application/xml; charset=utf-8' );
require_once 'verbs.php';
?>
<? echo '<?xml version="1.0" encoding="UTF-8"?>'?>
<pages>
<?php
$num = 0;
$hint = "";
foreach ( $infinitiveVerb as $output ) {
		if (preg_match ( "/^" . $_GET ['pattern'] . "/", $output )) {
			$hint .= "<a class=\"franzoesisch konju\" href='" . substr ( $output, 0, 1 ) . "/" . $output . "/'>" . $output . "</a>";
			$num ++;
		}
	if ($num > 10)
		break;
}
if ($num == 0)
	echo 'keine Vorschläge';
else
	echo $hint;
?>
</pages>
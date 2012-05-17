<?php
$pName = $_GET["dictionary"];
$p = "";
switch($pName) {
	case "dicHeight" :
		$p = "<select><option value=\"1\">9</option><option value=\"2\">3</option><option value=\"3\">6</option></select>";
		break;
	case "pDocType" :	
		break;
	case "pOperationLamp" :
		break;
	default :
		echo "Нет такого раздела";
}
echo $p;
?>
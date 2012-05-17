<?php
$pName = $_GET["dictionary"];
$term = $_GET["term"];
$p = array();
switch($pName) {
	case "lightingMode" :
		$a = array( array("value" => "1", "label" => "первый режим"), array("value" => "2", "label" => "второй режим"), array("value" => "33", "label" => "особый режим"));
		$p = $a;
		break;
	case "dicHeight" :
		break;
	case "pDocType" :
		break;
	case "pOperationLamp" :
		break;
	default :
		echo "Нет такого раздела";
}
echo json_encode($p);
?>
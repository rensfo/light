<?php
$pName = $_GET["part"];
$p = array();
switch($pName) {
	case "dicHeight" :
	//$p["colNames"]=;
		$p["hasTree"] = false;
		$p["id"] = $pName;
		$p["items"] = array( array("colModel" => array( array("name" => "id", "hidden" => true, "key" => true, "label" => "РН"), array("name" => "code", "label" => "Высота")), "items" => array(), "id" => "pHeight", "caption" => "Высота"));
		break;
	case "docType" :
		$p["hasTree"] = false;
		$p["id"] = $pName;
		$p["items"] = array( array("colModel" => array( array("name" => "id", "hidden" => true, "key" => true, "label" => "РН"), array("name" => "code", "label" => "Код"), array("name" => "name", "label" => "Наименование")), "items" => array(), "id" => "pDocType", "caption" => "Тип документа"));
		break;
	default :
		echo "Нет такого раздела";
		break;
}
echo json_encode($p);
?>
<?php
$pName = $_GET["part"];
$p = array();
switch($pName) {
	case "dicHeight" :
	//$p["colNames"]=;
		$p["hasTree"] = false;
		$p["id"] = $pName;
		$p["items"] = array( array("colModel" => array( array("name" => "id", "hidden" => true, "key" => true, "label" => "РН"), array("name" => "code", "label" => "Высота", "editable"=> true, "edittype"=>"text", "editoptions"=>array("size"=> 2, "maxlength"=> 2))), "items" => array(), "id" => "pHeight", "caption" => "Высота"));
		break;
	case "docType" :
		$p["hasTree"] = false;
		$p["id"] = $pName;
		$p["items"] = array( array("colModel" => array( array("name" => "id", "hidden" => true, "key" => true, "label" => "РН"), array("name" => "code", "label" => "Код", "editable"=> true, "edittype"=>"text", "editoptions"=>array("size"=> 20, "maxlength"=> 20)), array("name" => "name", "label" => "Наименование", "editable"=> true, "edittype"=>"textarea", "editoptions"=>array("cols"=> 20, "rows"=> 2))), "items" => array(), "id" => "pDocType", "caption" => "Тип документа"));
		break;
	default :
		echo "Нет такого раздела";
		break;
}
echo json_encode($p);
?>
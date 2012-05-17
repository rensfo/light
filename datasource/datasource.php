<?php
$userData = $_GET["userData"];
$pName = $userData["part"];
$_search = $_GET["_search"];
$nd = $_GET["nd"];
$page = $_GET["page"];
$rows = $_GET["rows"];
$sidx = $_GET["sidx"];
$sord = $_GET["sord"];
$p = array("page" => 1, "total" => 1, "records" => 1, "rows" => array());
switch($pName) {
	case "pHeight" :
	/*
	 *Тут будет подключение к БД и отбор данных
	 *  */
		$p["rows"] = array( array("id" => "1", "code" => "9"), array("id" => "2", "code" => "12"), array("id" => "3", "code" => "6"));
		$p["records"] = count($p["rows"]);
		break;
	case "pDocType" :
		$p["rows"] = array( array("id" => "1", "code" => "Приказ", "name"=>"Приказ"), array("id" => "2", "code" => "Распоряжение", "name"=>"Распоряжение"), array("id" => "3", "code" => "Служебная", "name"=>"Служебная"));
		$p["records"] = count($p["rows"]);
		break;
	case "pOperationLamp" :
		$p["rows"] = array( array("id" => "1", "code" => "I", "height"=>"9"), array("id" => "2", "code" => "II", "height"=>"12"), array("id" => "3", "code" => "III", "height"=>"3"));
		$p["records"] = count($p["rows"]);
		break;
	case "gLamp":
		$p["rows"] = array( 
					array("id" => "1", "addr" => "воткинск", "agent"=>"Окунцев", "contract"=>"324242", "height"=>"9", "majorLamp"=>"0", "serialNumber"=>"54645g-45646", "coordinateX"=>"190.12", "coordinateY"=>"80.5")
			);
		$p["records"] = count($p["rows"]);
		break;
	case "gWorkLamp":
		switch ($userData["prn"]) {
			case "1":
				$p["rows"] = array( 
					array("id" => "1", "begDate" => "01.01.2012", "endDate"=>"10.01.2012", "operationLamp"=>"I"),
					array("id" => "2", "begDate" => "11.01.2012", "endDate"=>"", "operationLamp"=>"II")
			);
				break;
			
			default:
				
				break;
		}
		$p["records"] = count($p["rows"]);
		break;	
	default :
		echo "Нет такого раздела";
}
echo json_encode($p);
?>
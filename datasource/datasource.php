<?php
$pName = $_GET["part"];
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
	default :
		echo "Нет такого раздела";
}
echo json_encode($p);
?>
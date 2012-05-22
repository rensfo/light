<?php
$oper = $_POST["oper"];
//операция
$part = $_POST["part"];
//$proc = "";
$SQL = "";
$dbhost = "localhost";
$dbuser = "test";
$dbpassword = "1";
$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error());
mysql_select_db("light") or die("Error conecting to db.");
switch($part) {
	case "pHeight" :
	//echo $oper . $part;
		switch($oper) {
			case "add" :
			//$proc = "p_height_insert";
				$SQL = "CALL p_height_insert('" . $_POST["scode"] . "')";
				break;
			case "edit" :
				$SQL = "CALL p_height_update(" . $_POST["id"] . ",'" . $_POST["scode"] . "')";
				break;
			case "del" :
				foreach (split(",", $_POST["id"]) as $key => $value) {
					$SQL = "CALL p_height_delete(" . $value . ")";
					$result = mysql_query($SQL) or die(mysql_error());
					//$row = mysql_fetch_array($result, MYSQL_ASSOC);
				}
				break;
		}
		break;
	default :
		break;
}
if ($oper != "del") {
	$result = mysql_query($SQL) or die(mysql_error());
	//$row = mysql_fetch_array($result, MYSQL_ASSOC);
}
//echo json_encode($row);
?>
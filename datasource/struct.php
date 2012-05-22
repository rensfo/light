<?php
include 'partstructdata.php';
$pName = $_GET["part"];


/*function _strToFunc($items){
foreach ($items["colModel"] as $key => $value) {
			foreach ($variable as $key => $value) {
				
			}
		}	
}*/
echo json_encode(getPart($pName));
?>


<?php

    function getPart($pName){
    	//Разделы		
    	$p = array(
    	//высота
    	"dicHeight" => array(
			"hasTree" => false,
			"id" => "dicHeight",
			"items" => array( 
					array(
						"colModel" => array( 
							array(
								"name" => "id", 
								"hidden" => true, 
								"key" => true, 
								"label" => "РН"
								), 
							array(
								"name" => "scode", 
								"label" => "Высота", 
								"editable"=> true, 
								"edittype"=>"text", 
								"editoptions"=>
									array(
										"size"=> 2, 
										"maxlength"=> 2
										)
								 )
						), 
						"items" => array(), 
						"id" => "pHeight", 
						"caption" => "Высота"
					)
				)
			),
			//Типы документов
		"dicDocType" =>array(
			"hasTree" => false,
			"id" => $pName,
			"items" => array( 
				array(
					"colModel" => array( 
						array(
							"name" => "id", 
							"hidden" => true, 
							"key" => true, 
							"label" => "РН"
							), 
						array(
							"name" => "code", 
							"label" => "Код", 
							"editable"=> true, 
							"edittype"=>"text", 
							"editoptions"=>array(
								"size"=> 20, 
								"maxlength"=> 20
							)
						), 
						array(
							"name" => "name", 
							"label" => "Наименование", 
							"editable"=> true, 
							"edittype"=>"textarea", 
							"editoptions"=>array(
								"cols"=> 20, 
								"rows"=> 2
							)
						)
					), 
					"items" => array(), 
					"id" => "pDocType", 
					"caption" => "Тип документа"
				)
			)
		),
		//Режим работы светильника
		"dicOperationLamp"=>array(
			"hasTree" => false,
			"id" => "dicOperationLamp",
			"items" => array( 
				array(
					"colModel" => array( 
						array(
							"name" => "id", 
							"hidden" => true, 
							"key" => true, 
							"label" => "РН"
						), 
						array(
							"name" => "code", 
							"label" => "Код", 
							"editable"=> true, 
							"edittype"=>"text", 
							"editoptions"=>array(
								"size"=> 20, 
								"maxlength"=> 20
							)
						), 
						array(
							"name" => "height", 
							"label" => "Высота", 
							"editable"=> true, 
							"edittype"=>"select", 
							"editoptions"=>array(
								"dataUrl"=> "datasource/dataDictionary.php?dictionary=dicHeight"
							)
						), 
						array(
							"name" => "height", 
							"label" => "Режим освещения", 
							"editable"=> true, 
							"edittype"=>"custom", 
							"editoptions"=>"this._customEditing.lightingMode"
						)
					), 
					"items" => array(), 
					"id" => "pOperationLamp", 
					"caption" => "Режим работы светильника"
				)
			)
		),
		//Светильник
		"pLamp"=>array(
			"hasTree" => false,
			"id" => $pName,
			"items" => array(
				array(
					"colModel" => array(
						array(
							"name" => "id", 
							"hidden" => true, 
							"key" => true, 
							"label" => "РН"
						),
						array(
							"name" => "addr", 
							"label" => "Адрес", 
							"editable"=> true, 
							"edittype"=>"text", 
							"editoptions"=>array(
								"size"=> 20, 
								"maxlength"=> 20
							), 
							"align"=>"center"
						),
						array(
							"name" => "agent", 
							"label" => "Контрагент", 
							"editable"=> true, 
							"edittype"=>"text", 
							"editoptions"=>array(
								"size"=> 20, 
								"maxlength"=> 20
							), 
							"align"=>"center"
						),
						array(
							"name" => "contract", 
							"label" => "Договор", 
							"editable"=> true, 
							"edittype"=>"text", 
							"editoptions"=>array(
								"size"=> 20, 
								"maxlength"=> 20
							), 
							"align"=>"center"
						),
						array(
							"name" => "height", 
							"label" => "Высота", 
							"editable"=> true, 
							"edittype"=>"select", 
							"editoptions"=>array(
								"dataUrl"=> "datasource/dataDictionary.php?dictionary=dicHeight"
							), 
							"align"=>"right"
						),
						array(
							"name" => "majorLamp", 
							"label" => "Признак главного светильника", 
							"editable"=> true, 
							"edittype"=>"checkbox", 
							"editoptions"=>array(
								"value"=>"1:0"
							), 
							"formatter"=>"checkbox", 
							"align"=>"center"
						),
						array(
							"name" => "serialNumber", 
							"label" => "Заводской номер", 
							"editable"=> true, "edittype"=>"text", "editoptions"=>array("size"=> 20, "maxlength"=> 20), "align"=>"right"),
											array("name" => "coordinateX", "label" => "Х", "editable"=> true, "edittype"=>"text", "editrules"=>array("number"=>"true"), "editoptions"=>array("size"=> 20, "maxlength"=> 20), "formatter"=>"number", "align"=>"right"),
											array("name" => "coordinateY", "label" => "Y", "editable"=> true, "edittype"=>"text", "editrules"=>array("number"=>"true"), "editoptions"=>array("size"=> 20, "maxlength"=> 20), "formatter"=>"number", "align"=>"right")
											), 
					"items" => array(
								array(
									"colModel" => array(
										array(
											"name" => "id", 
											"hidden" => true, 
											"key" => true, 
											"label" => "РН"
										),
										array(
											"name" => "begDate", 
											"label" => "Дата начала", 
											"editable"=> true, 
											"edittype"=>"text"
										),//, "formatter"=> "date"/*, "editoptions"=>array("size"=> 20, "maxlength"=> 20)
										array(
											"name" => "endDate", 
											"label" => "Дата окончания", 
											"editable"=> true, 
											"edittype"=>"text"
										),///*, "formatter"=> "date"/*, "editoptions"=>array("size"=> 20, "maxlength"=> 20)
										array(
											"name" => "operationLamp", 
											"label" => "Режим работы", 
											"editable"=> true, 
											"edittype"=>"text"
										)///*, "formatter"=> "date"/*, "editoptions"=>array("size"=> 20, "maxlength"=> 20)
									),
									"userData"=> array("prn"=>""),
									"id" => "gWorkLamp", 
									"caption" => "Работа светильника",
									"items"=>array()
								)
					), 
					"id" => "gLamp", 
					"caption" => "Светильник"
				)
			)
		)
		);
		return $p[$pName];
	}
/*switch($pName) {
	case "dicHeight" :
	//$p["colNames"]=;
		$p["hasTree"] = false;
		$p["id"] = $pName;
		$p["items"] = array( array("colModel" => array( array("name" => "id", "hidden" => true, "key" => true, "label" => "РН"), array("name" => "scode", "label" => "Высота", "editable"=> true, "edittype"=>"text", "editoptions"=>array("size"=> 2, "maxlength"=> 2))), "items" => array(), "id" => "pHeight", "caption" => "Высота"));
		break;
	case "dicDocType" :
		$p["hasTree"] = false;
		$p["id"] = $pName;
		$p["items"] = array( array("colModel" => array( array("name" => "id", "hidden" => true, "key" => true, "label" => "РН"), array("name" => "code", "label" => "Код", "editable"=> true, "edittype"=>"text", "editoptions"=>array("size"=> 20, "maxlength"=> 20)), array("name" => "name", "label" => "Наименование", "editable"=> true, "edittype"=>"textarea", "editoptions"=>array("cols"=> 20, "rows"=> 2))), "items" => array(), "id" => "pDocType", "caption" => "Тип документа"));
		break;
	case "dicOperationLamp":
		$p["hasTree"] = false;
		$p["id"] = $pName;
		$p["items"] = array( array("colModel" => array( array("name" => "id", "hidden" => true, "key" => true, "label" => "РН"), array("name" => "code", "label" => "Код", "editable"=> true, "edittype"=>"text", "editoptions"=>array("size"=> 20, "maxlength"=> 20)), array("name" => "height", "label" => "Высота", "editable"=> true, "edittype"=>"select", "editoptions"=>array("dataUrl"=> "datasource/dataDictionary.php?dictionary=dicHeight")), array("name" => "height", "label" => "Режим освещения", "editable"=> true, "edittype"=>"custom", "editoptions"=>"this._customEditing.lightingMode")), "items" => array(), "id" => "pOperationLamp", "caption" => "Режим работы светильника"));
		break;
	case "pLamp":
		$p["hasTree"] = false;
		$p["id"] = $pName;
		$p["items"] = array(array("colModel" => array(
										array("name" => "id", "hidden" => true, "key" => true, "label" => "РН"),
										array("name" => "addr", "label" => "Адрес", "editable"=> true, "edittype"=>"text", "editoptions"=>array("size"=> 20, "maxlength"=> 20), "align"=>"center"),
										array("name" => "agent", "label" => "Контрагент", "editable"=> true, "edittype"=>"text", "editoptions"=>array("size"=> 20, "maxlength"=> 20), "align"=>"center"),
										array("name" => "contract", "label" => "Договор", "editable"=> true, "edittype"=>"text", "editoptions"=>array("size"=> 20, "maxlength"=> 20), "align"=>"center"),
										array("name" => "height", "label" => "Высота", "editable"=> true, "edittype"=>"select", "editoptions"=>array("dataUrl"=> "datasource/dataDictionary.php?dictionary=dicHeight"), "align"=>"right"),
										array("name" => "majorLamp", "label" => "Признак главного светильника", "editable"=> true, "edittype"=>"checkbox", "editoptions"=>array("value"=>"1:0"), "formatter"=>"checkbox", "align"=>"center"),
										array("name" => "serialNumber", "label" => "Заводской номер", "editable"=> true, "edittype"=>"text", "editoptions"=>array("size"=> 20, "maxlength"=> 20), "align"=>"right"),
										array("name" => "coordinateX", "label" => "Х", "editable"=> true, "edittype"=>"text", "editrules"=>array("number"=>"true"), "editoptions"=>array("size"=> 20, "maxlength"=> 20), "formatter"=>"number", "align"=>"right"),
										array("name" => "coordinateY", "label" => "Y", "editable"=> true, "edittype"=>"text", "editrules"=>array("number"=>"true"), "editoptions"=>array("size"=> 20, "maxlength"=> 20), "formatter"=>"number", "align"=>"right")
										), 
				"items" => array(
							array("colModel" => array(
										array("name" => "id", "hidden" => true, "key" => true, "label" => "РН"),
										array("name" => "begDate", "label" => "Дата начала", "editable"=> true, "edittype"=>"text"),//, "formatter"=> "date"/*, "editoptions"=>array("size"=> 20, "maxlength"=> 20)
										array("name" => "endDate", "label" => "Дата окончания", "editable"=> true, "edittype"=>"text"),///*, "formatter"=> "date"/*, "editoptions"=>array("size"=> 20, "maxlength"=> 20)
										array("name" => "operationLamp", "label" => "Режим работы", "editable"=> true, "edittype"=>"text")///*, "formatter"=> "date"/*, "editoptions"=>array("size"=> 20, "maxlength"=> 20)
							),
							"userData"=> array("prn"=>""),
							"id" => "gWorkLamp", 
							"caption" => "Работа светильника",
							"items"=>array()
				)), 
				"id" => "gLamp", 
				"caption" => "Светильник"
				));
		break;
	default :
		echo "Нет такого раздела";
		break;  
}*/
?>
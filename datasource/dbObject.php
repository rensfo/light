<?php
/*
 * Описание класса раздел
 * Рассмотреть: включение всех настроект jqGrid в одино свойство
 */ 
class cPartition {
	//Идентификатор - раздел
	public $id;
	//Имеет раздел каталоги или нет
	public $hasTree = FALSE;
	//Элеметны раздела (Таблицы)
	public $items = array();
	
}


class item {
	//настройки jqGrid
	public $colModel;
	//Идентификатор раздела
	public $id;
	//Наименование раздела
	public $caption;
	//Дочерние элементы раздела (Таблицы)
	public $items;
	//Необходимые данные (Prn(Идентификатор родительской записи), Crn(Идентификатор каталога))
	public $userData;
	//Действия для раздела - таблицы
	public $actions;
	//Представление (роизводится выборка из указанного представления)
	public $view;
}


class action {
	//Идентификатор действия
	public $id;
	//Код действия
	public $code;
	//Наименование действия
	public $name;
	//Имя исполняемой процедуры/функциии
	public $procName;
	//Признак привязки (одна строка или несколько)
	//public 
	//Признак обновления (обновлять выборку после выполнения или нет)
	//public
	//
	//public
	
}

class proc{
	//
	public $id;
	//
	public $code;
	//
	public $name;
	//
	public $attrs;
}

class procAttr{
	//
	public $id;
	//
	public $code;
	//
	public $name;
}

class showMethod{
	//
	public $id;
	//
	public $code;
	//
	public $name;
}
?>
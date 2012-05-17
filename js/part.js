( function($) {
	$.widget("light.part", {
		options : {
			//parent : "#content",
			code : "",
			caption : "",
			menu : $("<ul style=\"position:absolute\"><li code=\"add\"><a>Добавить</a></li><li code=\"edit\"><a>Редактировать</a></li><li code=\"del\"><a>Удалить</a></li><li code=\"refresh\"><a>Обновить</a></li></ul>")
		},
		_create : function() {

		},
		_render : function() {

		},
		_generateId : function(id) {
			var $id = id;
			if($("#" + $id).size() > 0) {
				$id = $id + 1;
				$id = this._generateId($id);
			}
			return $id;
		},
		_destroy : function() {
			$.Widget.prototype.destroy.call(this);
		},
		setOption : function(key, value) {
			if(value != undefined) {
				this.options[key] = value;
				this._render();
				return this;
			} else {
				return this.options[key];
			}
		},
		minimized : function(options) {
			this._minimized.call(this, options);
		},
		_minimized : function(options) {
			var data = this.element.data(), p = this.element.children().first();
			data[p.attr("id")] = this.element.children().first().detach();
		},
		open : function(options) {
			//this._render();
			var $this = this, data = this.element.data();
			if(options.code != this.element.children().first().attr("id")) {
				if(this.element.children().size() > 0)
					this._minimized.call(this);
				if(data[options.code]) {
					data[options.code].appendTo(this.element);
				} else {
					$.getJSON("datasource/struct.php", {
						part : options.code
					}, function(data, textStatus, jqXHR) {
						if($.isPlainObject(data)) {
							$this.element.append($this._parseForm.call($this, data));
						} else {
							alert("Ошибка:\n" + data);
						}
					});
				}
			}
		},
		_parseForm : function(options) {
			var f = $("<div>", {
				id : "f_" + options.id
			})
			if(options.hasTree) {
				f.append(this._parseTree.call(this, options));
			} else {
				f.append(this._parseTable.call(this, options));
			}
			return f;
		},
		_parseTable : function(options) {
			var grid, cntx, cont = $("<div>"), $this = this, tab;
			options.items = _strToFunc.call(this, options.items);
			//if(options.items.length > 1) {
			for(t in options.items) {
				var tabcont;
				if(options.items.length > 1) {
					if(!tab) {
						tab = $("<div>").tabs();
					}
					//ДОДЕЛАТЬ С ДОБАВЛЕНИЕМ ЗАКЛАДОК
					tab.tabs("add", "#tab-", options.items[t].caption);
				}
				//}
				//} else {
				grid = $("<table>", {
					id : this._generateId(options.items[t].id)
				}).appendTo(tabcont || cont).jqGrid({
					altRows : true,
					caption : options.items[t].caption,
					multiselect : true,
					multiboxonly : true,
					rownumbers : true,
					scrol : true,
					datatype : "json",
					mtype : "GET",
					colNames : [],
					colModel : options.items[t].colModel,
					url : "datasource/datasource.php",
					jsonReader : {
						repeatitems : false,
						id : "0"
					},
					ajaxGridOptions : {
						type : "GET"
					},
					serializeGridData : function(postdata) {
						//postdata.page = 1;
						return $.extend(postdata, {
							userData : $.extend({}, this.p.userData || {}, {
								part : options.items[t].id
							})
						});
					},
					ondblClickRow : function(rowid, iRow, iCol, e) {
						grid.jqGrid('editGridRow', rowid, {});
					},
					onRightClickRow : function(rowid, iRow, iCol, e) {
						var arrrow = grid.jqGrid("getGridParam", "selarrrow");
						if(arrrow.length != 1)
							grid.jqGrid("setSelection", rowid, true);
						/*else
							grid.jqGrid("setSelection", rowid, false);*/
						cntx.show().position({
							my : "left top",
							at : "left top",
							of : e
						});
						$this.document.one("mousedown", function(event) {
							if(cntx.is(":visible") && !$(event.target).closest(cntx).length) {
								cntx.hide();
							}
						});
						e.stopPropagation();
						e.preventDefault();
						//return false;
					},
					gridComplete : function() {
						var $g = $(this), $arr = $g.jqGrid("getDataIDs");
						if($arr.length > 0)
							$g.jqGrid("setSelection", $arr[0], true);
					},
					onSelectRow : function(rowid, status) {
						var items = options.items[t].items;
						
						for(var i in items) {
							items[i].grid.jqGrid("setGridParam", {
								userData : $.extend(items[i].grid.jqGrid("getGridParam", "userData") || {}, {
									prn : status ? rowid : ""
								})
							}).trigger("reloadGrid");
						}
					},
					userData : options.items[t].userData || {}
				}).filterToolbar({
					searchOnEnter : true
				});
				options.items[t].grid = grid;
				cntx = this.options.menu.clone().appendTo(cont).menu({
					select : function(event, ui) {
						switch(ui.item.attr("code")) {
							case "add":
								grid.jqGrid('editGridRow', "new", {});
								break;
							case "edit":
								grid.jqGrid('editGridRow', grid.jqGrid("getGridParam", "selrow"), {});
								break;
							case "del":
								grid.jqGrid('delGridRow', grid.jqGrid("getGridParam", "selarrrow"), {});
								break;
							case "refresh":
								grid.trigger("reloadGrid");
								break;
							default:
								break;
						}
						cntx.hide();
					}
				}).hide();
				options.items[t].cntx = cntx;
				//}
				if(options.items[t].items.length > 0) {
					cont.append(this._parseTable.call(this, options.items[t]));
				}
			}
			return cont;

			function _strToFunc(items) {
				var newItems = items;
				for(var i in newItems) {
					for(var c in newItems[i].colModel) {
						if(newItems[i].colModel[c].edittype == "custom") {
							newItems[i].colModel[c].editoptions = eval(newItems[i].colModel[c].editoptions);
						}
					}
					if(newItems[i].items.length > 0) {
						newItems[i].items = _strToFunc.call(this, newItems[i].items);
					}
				}
				return newItems;
			}

		},
		_customEditing : {
			lightingMode : {
				custom_element : function(value, options) {
					var el = $("<input>", {
						type : "text",
						value : value
					}).autocomplete({
						source : function(request, response) {
							$.getJSON("datasource/dataAutocomplete.php", $.extend(request, {
								dictionary : "lightingMode"
							}), function(data) {
								response(data);
							});
						},
						minLength : 1,
						select : function(event, ui) {

						}
					});
					el.data("autocomplete")._renderItem = function(ul, item) {
						return $("<li></li>").data("item.autocomplete", item).append("<a>Код: " + item.value + "<br>Наименование: " + item.label + "</a>").appendTo(ul);
					};
					return el;
				},
				custom_value : function(elem, operation, value) {
					if(operation === 'get') {
						return $(elem).filter("input").val();
					} else if(operation === 'set') {
						$(elem).filter("input").val(value);
					}
				}
			}
		},
		_parseTree : function() {

		}
	});
}(jQuery))
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
			var grid, cntx, cont = $("<div>"), $this = this;
			if(options.items.length > 1) {
				for(t in options.items) {

				}
			} else {
				grid = $("<table>", {
					id : this._generateId(options.id)
				}).appendTo(cont).jqGrid({
					altRows : true,
					caption : options.items[0].caption,
					multiselect : true,
					multiboxonly : true,
					rownumbers : true,
					scrol : true,
					datatype : "json",
					mtype : "GET",
					colNames : [],
					colModel : options.items[0].colModel,
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
							part : options.items[0].id
						});
					},
					ondblClickRow : function(rowid, iRow, iCol, e) {
						grid.jqGrid('editGridRow', rowid, {});
					},
					onRightClickRow : function(rowid, iRow, iCol, e) {
						grid.jqGrid("setSelection", rowid);
						cntx
						.show()
						.position({
							my: "left top",
							at: "left top",
							of: e
						});
						e.stopPropagation();
						e.preventDefault();
					},
					gridComplete : function() {

					}
				}).filterToolbar({
					searchOnEnter : true
				});
				cntx = this.options.menu.clone().appendTo(cont).menu({
					select : function(event, ui) {
						switch(ui.item.attr("code")) {
							case "add":
								grid.jqGrid('editGridRow', "new", {});
								break;
							case "edit":

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
			}
			return cont;
		},
		_parseTree : function() {

		}
	});
}(jQuery))
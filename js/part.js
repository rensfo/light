( function($) {
	$.widget("light.part", {
		options : {
			//parent : "#content",
			code : "",
			caption : ""
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
				id : options.id
			})
			if(options.hasTree) {
				f.append(this._parseTree.call(this, options));
			} else {
				f.append(this._parseTable.call(this, options));
			}
			return f;
		},
		_parseTable : function(options) {
			var grid, cont = $("<div>");
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
					}
				}).filterToolbar({
					searchOnEnter : true
				});
			}
			return cont;
		},
		_parseTree : function() {

		}
	});
}(jQuery))
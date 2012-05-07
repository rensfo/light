$(function() {
	$("#menubar").menubar({
		position : {
			within : $("body").add(window).first()
		},
		select : function(event, ui) {
			if(ui.item.children("ul").size() == 0)
				$("#content").part("open", {
					code : ui.item.attr("part")
				});
			else
				return false;
		}
	});
	$("#content").part();
});

$(function(){
	$("#menubar").menubar({
				position: {
					within: $("body").add(window).first()
				},
				select: function(event, ui){
					alert(ui.item.text());
				}
	});
});

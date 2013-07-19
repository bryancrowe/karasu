$(function() {
	$('button.add-comment').on("click", function(event) {
	    var showForm = $(this).attr('data-toggle');
		$('#' + showForm).css('display', 'block');
		$(this).hide();
	});
});
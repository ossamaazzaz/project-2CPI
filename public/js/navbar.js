jQuery(function () {
// Remove Search if user Resets Form or hits Escape!
jQuery('body, .navbar-collapse form[role="search"] button[type="reset"]').on('click keyup', function(event) {
	if (event.which == 27 && $('.navbar-collapse form[role="search"]').hasClass('active') ||
		jQuery(event.currentTarget).attr('type') == 'reset') {
		closeSearch();
	}
});

function closeSearch() {
    var form = jQuery('.navbar-collapse form[role="search"].active')
	form.find('input').val('');
	form.removeClass('active');
}

// Show Search if form is not active // event.preventDefault() is important, this prevents the form from submitting
jQuery(document).on('click', '.navbar-collapse form[role="search"]:not(.active) button[type="submit"]', function(event) {
	event.preventDefault();
	var form = jQuery(this).closest('form'),
		input = form.find('input');
	form.addClass('active');
	input.focus();

});
// ONLY FOR DEMO // Please use $('form').submit(function(event)) to track from submission
// if your form is ajax remember to call `closeSearch()` to close the search container
jQuery(document).on('click', '.navbar-collapse form[role="search"].active button[type="submit"]', function(event) {
	event.preventDefault();
	var form = jQuery(this).closest('form'),
		input = form.find('input');
	data = {term:input.val()}
	jQuery.ajax({
                type : "GET",
                url : "/search",
                data : data,
                success : function(data){
                        window.location=this.url;
                }
    });

    closeSearch()
});
});

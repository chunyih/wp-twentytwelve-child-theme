jQuery(document).ready(function($) {

 	//Fix Events Plugin Submit Reload Issue When Creating New Categories
	if ( typenow=="ai1ec_event" && pagenow=="edit-events_categories" && adminpage=="edit-tags-php") {
		$("input.button-primary").click( function(){
			if ($('#tag-name').val() != '') {
				window.setTimeout('location.reload()', 50); //delay is added to avoid refresh taking over submition
			}
		});

		$("a.delete-tag").click( function(){window.setTimeout('location.reload()', 50);} );
	}
		
});

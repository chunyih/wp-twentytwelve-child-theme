jQuery(document).ready(function($) {

 	//Fix Events Plugin Submit Reload Issue When Creating New Categories
	if ( typenow=="ai1ec_event" && pagenow=="edit-events_categories" && adminpage=="edit-tags-php") {
		$('input#submit.button.button-primary').click( function(){
			if ($('#tag-name').val() != '') {
				location.delay(100).reload(); //delay is added to avoid refresh taking over submition
			}
		});
	}
		
});

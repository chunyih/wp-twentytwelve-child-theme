jQuery(document).ready(function($) {

	var dropdownSpeed = 100;
	var searchAnimateSpeed = 150;

	// Manipulate Menu
	$("ul.nav-menu > li.menu-item > a[href$='departments/']").attr("href", "#dept"); // select Departments menu and change its href to #dept
	$("ul.nav-menu > li.menu-item > a[href='#dept']").append('<span class="glyphicon glyphicon-chevron-down"></span>'); // add a dropdown arrow
	$("ul.nav-menu > li.menu-item > a[href$='settings/']").next().insertAfter("ul.nav-menu > li.settingParent > span").addClass("settingsMenu"); // move setting's submenu
	$("ul.nav-menu > li.menu-item.logout").insertAfter($("ul.nav-menu > li.settingParent > ul.settingsMenu > li").last()); // move logout under settings
	$("ul.nav-menu > li.settingParent > ul.settingsMenu > li > a[href$='add-new-post/']").attr("href", "https://www.myppmech.com/wp-admin/post-new.php");
	$("ul.nav-menu > li.settingParent > ul.settingsMenu > li > a[href$='add-new-event/']").attr("href", "https://www.myppmech.com/wp-admin/post-new.php?post_type=ai1ec_event");

	

	// Departments on Click
	$("ul.nav-menu > li.menu-item > a[href='#dept']").click( function(e){
		e.stopPropagation(); // prevent the hide event being propagate
		e.preventDefault(); // prevent menu item reload on click
		fold("_dept");
		$("ul.nav-menu > li.menu-item > a > span.glyphicon").toggleClass("glyphicon-chevron-down glyphicon-chevron-up");
		$(this).toggleClass("menuHilight").next().slideToggle(dropdownSpeed);
	});

	// Setting Icon on Click
	$("ul.nav-menu > li.settingParent").click( function(e){ 
		e.stopPropagation();
		if ($("ul.nav-menu > li.menu-item > form > p > input.textInput").css("display") != "none") { return false }; // if searchbar is on, break
		fold("_settings");
		$(this).children("span").toggleClass("menuHilight").next().slideToggle(dropdownSpeed);
	});

	// Search on Click
	$("ul.nav-menu > li.menu-item > form > p > input.textInput").click( function(e){e.stopPropagation();} ); // search input on click
	$("ul.nav-menu > li.searchIcon").click( function(e){
		e.stopPropagation();
		fold("_search");
		$("ul.nav-menu > li.menu-item > form > p > input.textInput").css("display","block").focus().animate({width: "181px", opacity: 1}, searchAnimateSpeed);
	});

	// Hide Everything When Clicking Elsewhere
	$(document).click( function() {
    	if ("ul.nav-menu > li.menu-item > a > span.glyphicon[class~='glyphicon-chevron-up']") { fold("dept") }; // if dept is on
    	if ($("ul.nav-menu > li.menu-item > form > p > input.textInput").css("display") != "none") { fold("search") }; // if search is on
	    if ($("ul.nav-menu > li.settingParent > ul").css("display") != "none") { fold("settings") }; // if settings is on
	});

	// Tablet Menu Btn Corrention
	$(window).resize( function() {
		// Remove the toggled-on class in regular window size to ensure the regualr style
		if ( $(window).width() > 579) {
			$('ul.nav-menu').removeClass('toggled-on');
			$('h3.menu-toggle').removeClass('toggled-on');
		}
	});



	function fold (target) {
		if (target == "settings") {
			$("ul.nav-menu > li.settingParent > span").removeClass("menuHilight").next().slideUp(dropdownSpeed); // fold settings
		}
		if (target == "dept") {
			$("ul.nav-menu > li.menu-item  > a > span.glyphicon").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down"); // fold dept
			$("ul.nav-menu > li.menu-item > a[href='#dept']").removeClass("menuHilight").next().slideUp(dropdownSpeed); // fold dept
		}
		if (target == "search") {
			$("ul.nav-menu > li.menu-item > form > p > input.textInput").animate({width:"",opacity:0},searchAnimateSpeed).delay(searchAnimateSpeed).queue( function(next){ $(this).css("display","none"); next(); } ); // fold search; next() is req'd to execute the queue
		}
		if (target == "_settings") {
			$("ul.nav-menu > li.menu-item > form > p > input.textInput").animate({width:"",opacity:0},searchAnimateSpeed).delay(searchAnimateSpeed).queue( function(next){ $(this).css("display","none"); next(); } ); // fold search; next() is req'd to execute the queue
			$("ul.nav-menu > li.menu-item  > a > span.glyphicon").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down"); // fold dept
			$("ul.nav-menu > li.menu-item > a[href='#dept']").removeClass("menuHilight").next().slideUp(dropdownSpeed); // fold dept
		}
		if (target == "_dept") {
			$("ul.nav-menu > li.menu-item > form > p > input.textInput").animate({width:"",opacity:0},searchAnimateSpeed).delay(searchAnimateSpeed).queue( function(next){ $(this).css("display","none"); next(); } ); // fold search; next() is req'd to execute the queue
			$("ul.nav-menu > li.settingParent > span").removeClass("menuHilight").next().slideUp(dropdownSpeed); // fold settings
		}
		if (target == "_search") {
			$("ul.nav-menu > li.menu-item  > a > span.glyphicon").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down"); // fold dept
			$("ul.nav-menu > li.menu-item > a[href='#dept']").removeClass("menuHilight").next().slideUp(dropdownSpeed); // fold dept
			$("ul.nav-menu > li.settingParent > span").removeClass("menuHilight").next().slideUp(dropdownSpeed); // fold settings
		}
	};
});


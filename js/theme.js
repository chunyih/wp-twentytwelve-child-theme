jQuery(document).ready(function($) {
	var currentURL = window.location.pathname; // get current url path name. [R] http://stackoverflow.com/questions/6944744/javascript-get-portion-of-url-path
	
	// Temp Alert Messages
	$("li.forum").click(function(){		alert("Forum is Under Construction") 	});
	$("li.search").click(function(){	alert("Search is Under Construction")	});
	$("a.testLink").click(function(){	alert("Thanks for Trying!")			 	});
	$("a.testLinkBox").click(function(){alert("Links to Job's Box Folder")		});

	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 		alert("iPP Mobile/Tablet Site is Under Construction. Please View It Using A Desktop Browser.");
	};

	// Site-wide content delay loading
	$('div.siteContent').delay(100).fadeIn(0);

	// Textarea auto size
	$('textarea').autosize({append: "\n"});


	// =========================================================================
	//	Topbar fix
	// =========================================================================
	var userName = $('li.userName > a').text();
	$('li.toggle-topbar.menu-icon > a').prepend('<div class="userName-small"></div>');
	$('li.toggle-topbar.menu-icon > a > div.userName-small').text(userName);

	// li.menu-icon toggle bug fix (body padding-top issue)
	// $('li.menu-icon').click( function() {
	// 	i += 1;
	// 	if ( i%2 !=0 ) { $('body').css('padding-top',0);} 
	// 	else { $('body').css('padding-top',BODY_PADDING_TOP);}
	// });


	// =========================================================================
	//	bbPress
	// =========================================================================
	if ($("body").has("div.forum").length != 0) { // only applies on Forum
		// Hide topic status in reply form
	    // $('p > label[for="bbp_topic_status"]').parent().hide();

		// Make reply form textfield "required"
		$('textarea.bbp-the-content').attr('required', true);
		
		// Fix the first "reply" link not replying to the first issue
		$("ul.bbp-replies > li.bbp-body").next().find("a.bbp-topic-reply-link").click(function(){
			$("div.bbp-reply-form").appendTo("div#bbpress-forums");
			$("input#bbp_reply_to").attr("value", "0");
		});

		// Breadcurmb
		var breadText = "";
		var breadLink = "";
		if (document.getElementsByClassName("bbp-topic-description").length != 0) {
			breadText = $("div.bbp-breadcrumb").find("span.bbp-breadcrumb-current").text();
			$("ul.breadcrumbs").append("<li class='current'><a href='#'></a></li>");
			$("ul.breadcrumbs > li").first().find("a").text("Topic: "+breadText);

			$("h2.forumTitle").text("Topic: "+breadText);
		} else {
			breadText = $("div.bbp-breadcrumb").find("span.bbp-breadcrumb-current").text();
			$("ul.breadcrumbs").append("<li class='current'><a href='#'></a></li>");
			$("ul.breadcrumbs > li").first().find("a").text(breadText);

			$("h2.forumTitle").text(breadText);
		}

		if (document.getElementsByClassName("bbp-breadcrumb-forum").length != 0) {
			breadLink = $("div.bbp-breadcrumb").find("a.bbp-breadcrumb-forum").attr("href"); // Forum Name
			breadText = $("div.bbp-breadcrumb").find("a.bbp-breadcrumb-forum").text();
			$("ul.breadcrumbs").prepend("<li><a></a></li>");
			$("ul.breadcrumbs > li").first().find("a").attr("href", breadLink);
			$("ul.breadcrumbs > li").first().find("a").text(breadText);
		}

		if (document.getElementsByClassName("bbp-breadcrumb-root").length != 0) {
			breadLink = $("div.bbp-breadcrumb").find("a.bbp-breadcrumb-root").attr("href"); // Forums All
			$("ul.breadcrumbs").prepend("<li><a>Forums</a></li>");
			$("ul.breadcrumbs > li").first().find("a").attr("href", breadLink);
		}

		breadLink = $("div.bbp-breadcrumb").find("a.bbp-breadcrumb-home").attr("href"); // Home
		$("ul.breadcrumbs").prepend("<li><a>Home</a></li>");
		$("ul.breadcrumbs > li").first().find("a").attr("href", breadLink);

		// Sort bbpress posts by latest
		// [r] http://jsfiddle.net/R4t4X/1/
		// $('ul.bbp-threaded-replies').each( function(){
		// 	$(this).prev().append($(this));
		// });

		// $.fn.reverseChildren = function() {
		// 	return this.each(function(){
		// 		var $this = $(this);
		// 		$this.children().each(function(){
		// 			$this.prepend(this);
		// 		});
		// 	});
		// };
		// $('.forums.bbp-replies').reverseChildren();	
	};


	// =========================================================================
	//	Weather
	// =========================================================================
	// $.ajax({
	// 	url: 'https://api.forecast.io/forecast/8039b9208f77d39aa7647a99843785d3/37.8267,-122.423',
	// 	type: 'get',
	// 	dataType: 'jsonp', // [!!IMP] jsonp allows cross-domain request
	// 	success: function (data) {
	// 		console.log("data: "+data.minutely.data[0].time);
	// 	}
 	// });


	// =========================================================================
	//	Dynamic sidebar width
	// ========================================================================= 
	if ( $("div.postContent").has("div.sidebar").length != 0 ){ // only run when page has sidebar
		var windowW 			= $(window).width();
		var sidebarW 			= $("div.sidebar").width();
		var sidebarPaddingRight = parseInt( $("div.sidebar").css("padding-right").replace("px", "") );
		if ( windowW < 955 ){ // trigger window width: 955px
				$("div.sidebar").width( $("div.siteContent").outerWidth() - $("div.rightColumn").outerWidth() - sidebarPaddingRight );
				$("div.sidebar").css("background", "rgb(235,235,235)").fadeIn(100);
		}
		else {  $("div.sidebar").css("background", "rgb(235,235,235)").fadeIn(100); };

		$(window).resize(function(){
			windowW = $(window).width();
			if ( windowW < 955 ){
				$("div.sidebar").width( $("div.siteContent").outerWidth() - $("div.rightColumn").outerWidth() - sidebarPaddingRight );
				console.log(sidebarW);
			}
			else {
				$("div.sidebar").width( sidebarW );
			}
		});
	}
	

	// =========================================================================
	//	Remove the inline style attr from wp image
	// ========================================================================= 
	$("div.wp-caption.alignnone").removeAttr("style");


	// =========================================================================
	//	Add all inks in post and comment area, and set target to blank
	// ========================================================================= 
	$("div.postContent > p > a").attr("target", "_blank");


	// =========================================================================
	//	Transform URL to hyperlink in comment area
	// ========================================================================= 
	$("div.commentMsg > span").each(function(){ 
		var content = $(this).text();
		var newContent = replaceURLWithHTMLLinks(content);
		$(this).html(newContent); 
	});


	// =========================================================================
	//	Create wiki page sidebar and modify h4 tags
	// =========================================================================
	if (currentURL.match(/(\/wiki\/)[a-z]/ig)) { // only apply to url starts with "/wiki/[a-z]"
		$("h4").each( function(){
			var text = $(this).text();
			var slug = text.toLowerCase().replace(/ /g,'-');
			console.log(slug);
		    $("ul.side-nav").append("<li><a href='#"+slug+"'>"+text+"</a></li>"); // create sidebar items
		    $(this).append("<a id='"+slug+"'></a>"); // add anchor to paragraph titles
		});
		$("ul.side-nav").append("<li><a href='#comment'>Comment</a></li>"); // add comment item to sidebar
		$("ul.side-nav > li:nth-child(1) >a").attr("href", "#"); // make sidebar first item on click scroll to top
		$("ul.side-nav > li:nth-child(1)").addClass("active"); // make sidebar first item active
	};


	// =========================================================================
	//	Prevent comment textarea line breaks, Prevent Forum Topic Title Enter
	// =========================================================================
	$("p.comment-form-comment > textarea").keypress(function(event) {
	    if(event.keyCode == 13) {
	    	event.preventDefault();
	    }
  	});

  	$("input#bbp_topic_title").keypress(function(event) {
	    if(event.keyCode == 13) {
	    	event.preventDefault();
	    }
  	});


	// =========================================================================
	//	Parallax Scrolling
	// =========================================================================
	// http://net.tutsplus.com/tutorials/html-css-techniques/simple-parallax-scrolling-technique/
	// var currentPosX = $("div.one").css("background-position-x");
	// var currentPosY = parseInt($("div.one").css("background-position-y"));
	// $(window).scroll( function(){
	// 	// console.log($(this).scrollTop());
	// 	var newPosY	= currentPosY-($(this).scrollTop()/3);
	// 	var newPos  = currentPosX+" "+newPosY+"px";
	// 	$("div.one").css({"background-position": newPos});
	// });


	// =========================================================================
	// 	Scrollpsy
	// =========================================================================
	// http://jsbin.com/EmIKarID/2/edit
	var lastId,
		topMenu = $("#mainSidebar"),  // <================== set target
		topMenuHeight = 132, // df: topMenu.outerHeight()+15, <================== set items' top alignment on click (the more the lower)
		// All list items
		menuItems = topMenu.find("a"),
		// Anchors corresponding to menu items
		scrollItems = menuItems.map( function(){
			var item = $( $(this).attr("href") );
			if (item.length) { return item; } // the length of # one is 0, won't be returned
		});

	// Bind click handler to menu items so we can get a fancy scroll animation
	menuItems.click( function(e){
		var href = $(this).attr("href"), offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
		$('html, body').stop().animate( {scrollTop: offsetTop}, 300 );
		e.preventDefault();
	});

	// Bind to scroll; on event scroll
	$(window).scroll( function(){
		// Get container scroll position
		var fromTop = $(this).scrollTop()+200; // df: +topMenuHeight; <================== set on scroll hilight switch triggure top threshold 
		var scrollBottom = $(document).height() - $(window).height() - $(window).scrollTop();
		if (scrollBottom <= 0) { fromTop=9999; } // <================== scrollBottom was <= 50; min distance to active the last item

		// Get id of current scroll item
		var cur = scrollItems.map( function(){
			if ($(this).offset().top < fromTop)
				return this;
		});

		// Get the id of the current element
		cur = cur[cur.length-1];
		var id = cur && cur.length ? cur[0].id : "";

		if (lastId !== id) {
			lastId = id;
			// Set/remove active class
			//console.log(lastId);
			menuItems
				.parent().removeClass("active")
				.end().filter("[href=#"+id+"]").parent().addClass("active");
		}                   
	});

});


// =========================================================================
// 	Auto Hyperlink 
// =========================================================================
// http://stackoverflow.com/questions/37684/how-to-replace-plain-urls-with-links?answertab=votes#tab-top
function replaceURLWithHTMLLinks(text) {
    
    var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
    text = text.replace(exp,'<a href="$1" target="_blank">$1</a>');
    
    // var exp = /(www\.[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
    // text = text.replace(exp,'<a href="http://$1" target="_blank">$1</a>');
    
    return text; 
}





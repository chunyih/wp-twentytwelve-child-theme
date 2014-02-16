jQuery(document).ready(function($) {
// Code here will be executed on document ready. Use $ as normal.

	//$('#login').append("<p>text append test</p>");

	//Login page modification
	$('#login>h1').remove(); //remove logo div
	$('#backtoblog').remove();

	$("#loginform label").contents().filter(function(){ return this.nodeValue == 'Username' || this.nodeValue == 'Password'; }).remove();//remove label text
	$("#lostpasswordform label").contents().filter(function(){ return this.nodeValue == 'Username or E-mail:' }).remove();//remove label text

	$('#loginform>p>label>br').remove();//remove br tag in the form
	$('#loginform #user_login').attr('placeholder', 'Username');//add placehoder
	$('#loginform #user_pass').attr('placeholder', 'Password');
	$('#lostpasswordform #user_login').attr('placeholder', 'Username or Email');

	$('p.submit').insertBefore('p.forgetmenot');//move submit class before forgetmenot class
	
	$('#nav').appendTo('#loginform');//append nav into #loginform
	$('#nav').appendTo('#lostpasswordform');//append #nav into #loginform

	$('p.submit').addClass('cf');
	
});

<?php
// ===== Change Default Thumbnail Size =====
function pp_twentytwelve_setup() {
	set_post_thumbnail_size( 630, 9999 ); // Unlimited height, soft crop. Default: 624
}
add_action( 'after_setup_theme', 'pp_twentytwelve_setup', 11 );
// http://voodoopress.com/modify-the-width-of-the-new-wordpress-twenty-twelve-theme/
// http://codex.wordpress.org/Child_Themes

// Override content width (for photo and video embeds)
$content_width = 631; /* content with in sidebar: Default: 625 */

function pp_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 980; /* default: 960 */
	}
}
add_action( 'template_redirect', 'pp_content_width', 11 );

function pp_custom_header_setup() {
	$header_args = array( 
		'width' => 980, /* default: 960 */
		'height' => 228
	 );
	add_theme_support( 'custom-header', $header_args );
}
add_action( 'after_setup_theme', 'pp_custom_header_setup' );
?>


<?php
// ===== Hide Admin Bar =====
add_filter('show_admin_bar', '__return_true');
?>


<?php
// ===== Login Logo =====
function my_login_logo() {?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/logo.png);
            padding-bottom: 30px;
        }
    </style>
<?php 
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );
// http://codex.wordpress.org/Customizing_the_Login_Form#Styling_Your_Login
// http://codex.wordpress.org/Function_Reference/get_bloginfo
?>


<?php
// ===== Change Loging Logo url and Description =====
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'iPP';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
// http://codex.wordpress.org/Customizing_the_Login_Form#Styling_Your_Login
// http://codex.wordpress.org/Plugin_API/Filter_Reference
?>


<?php
// ===== Include CSS / Fonts =====
// Main Page
function include_stylesheet() { 
	wp_register_style( 'bootstrap-css',  get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(),'v3.0.0', 'all' );  
	wp_enqueue_style( 'bootstrap-css' ); 
}
add_action( 'wp_enqueue_scripts', 'include_stylesheet' );
?>

<?php
// Login
function include_login_stylesheet() { ?>
    <link rel="stylesheet" id="custom_wp_admin_css" href="<?php echo get_stylesheet_directory_uri() . '/style-login.css'; ?>" type="text/css" media="all" />
<?php 
}
add_action( 'login_enqueue_scripts', 'include_login_stylesheet' );
?>


<?php
// ===== Include Scripts =====
// Main Page
function include_script(){
	wp_enqueue_script( 'jquery' ); // [IMP!!] jQuery need to load before bootstrap!!
//	wp_enqueue_script( 'jquery-effects-core' );
//	wp_enqueue_script( 'jqueryUI-js', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array(), 'v1.10.3', true );
	wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/js/theme.js', array(), 'v091613', true );
//	wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.js', array(), 'v3.0.0', true );
//	wp_enqueue_script( 'bootstrap-js', 'http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js', array(), 'v3.0.0', true );
}
add_action('wp_enqueue_scripts', 'include_script');
?>

<?php
// Login
function include_login_script(){
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'theme-login-js', get_stylesheet_directory_uri() . '/js/theme-login.js', array(), 'v091613', true );
}
add_action('login_enqueue_scripts', 'include_login_script');
?>

<?php
// Admin
function include_admin_script() {
	wp_enqueue_script( 'theme-admin-js', get_stylesheet_directory_uri() . '/js/theme-admin.js' , array(), 'v091613', true);
}
add_action( 'admin_menu', 'include_admin_script');
?>


<?php
// ===== Add Search Bar in Nav =====
// Main Page
function add_menu_item ( $items, $args ) {
	$current_user = wp_get_current_user();
	if( 'primary' === $args -> theme_location ) {
 		$items .= '<li class="menu-item"><div class="menuDivider"></div></li>';
 		$items .= '<li class="menu-item correntUser"><a>'.$current_user->user_firstname.'</a></li>';
 		$items .= '<li class="menu-item settingParent"><span class="glyphicon glyphicon-cog"></span><li class="menu-item logout" style="display:none;"><a href="'.wp_logout_url().'">Logout</a></li></li>';
 		$items .= '<li class="menu-item searchIcon"><span class="glyphicon glyphicon-search"></span></li>';
 		$items .= '<li class="menu-item menu-item-search">
						<form role="search" method="get" id="searchform" action="' . get_bloginfo('home') . '/" >
							<p>
								<input class="textInput" type="text" name="s" id="s" placeholder="Enter to Search"  autocomplete="off" />
				 				<input type="submit" class="my-wp-search" id="searchsubmit" value="" />
				 			</p>
			 			</form>
 					</li>';
	}
return $items;
}
add_filter('wp_nav_menu_items','add_menu_item',10,2); //priority 10, takes 2 arguments
// http://diythemes.com/thesis/rtfm/add-search-form-wp-wordpress-nav-menus/
?>
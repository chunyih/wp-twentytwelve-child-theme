<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<script>console.log("### header.php ###")</script>

	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<script src="<?php echo get_stylesheet_directory_uri() . '/js/vendor/custom.modernizr.js'; ?>"></script>

	<style type="text/css" media="screen">
		html { margin-top: 0 !important; }
		* html body { margin-top: 0 !important; }
	</style>
</head>



<body <?php body_class(); ?>>
	<script>console.log("### single-completly-blank.php ###")</script>


	<?php 
		while ( have_posts() ) : the_post();
		    get_template_part('content', 'blank'); // content-blank.php is a custom template in the child theme that displays <article> section
		endwhile; // end of the loop.
	?>



	<?php wp_footer(); ?>
	<script src="<?php echo get_stylesheet_directory_uri() . '/js/foundation.min.js' ?>"></script>
	<script src="<?php echo get_stylesheet_directory_uri() . '/js/foundation/foundation.topbar.js' ?>"></script>
	
	<script>
		jQuery(document).foundation();
	</script>

</body>
</html>

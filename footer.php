<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<script>console.log("### footer.php ###")</script>

	<?php wp_footer(); ?>

	<!-- <div class="spacer"></div> -->
	<div class="foot">
		<div class="footContent">
			<li>iPP - Pan-Pacific Mechanical Internal Information System &copy<?php echo date("Y") ?></li>
			<li><a href="<?php echo home_url(); ?>">Home</a></li>
			<li><a href="mailto:chunyih@ppmechanical.com">Contact</a></li>
			<li class="last-child"><a href="<?php echo wp_logout_url(); ?>">Log Out</a></li>
		</div>
	</div>


	<script src="<?php echo get_stylesheet_directory_uri() . '/js/foundation.min.js' ?>"></script>
  	<script src="<?php echo get_stylesheet_directory_uri() . '/js/foundation/foundation.topbar.js' ?>"></script>
	
	<script>
		jQuery(document).foundation();
	</script>



</body>
</html>
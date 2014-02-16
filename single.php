<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<script>console.log("### single.php ###")</script>



<div class="row">
	<div class="large-12 columns">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; // end of the loop. ?>

		<?php comments_template(); ?> 

	</div>
</div>

<?php get_footer(); ?>
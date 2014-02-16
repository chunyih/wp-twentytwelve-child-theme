<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<script>console.log("### content-blank.php ###")</script>



<!-- Construct Post Content -->
<div class="row">
    <ul class="breadcrumbs columns">
    </ul>
</div>

<h2 class="forumTitle">
</h2>

<article id="post-<?php the_ID(); ?>" <?php post_class('simple'); ?>> <!-- add claas attribute simple -->

	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
	<?php endif; ?>


	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	<?php else : ?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post -->


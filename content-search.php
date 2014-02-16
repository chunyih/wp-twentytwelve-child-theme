<?php
/**
 * Custom made search resault page. Modified from content.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<script>console.log("### content-search.php ###")</script>


<div class="row">
<div class="small-12 large-12 columns">

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?> <!-- display featured post -->
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>

		<header class="entry-header"> <!-- display title -->
			<?php the_post_thumbnail(); ?>

			<?php if ( is_single() ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
			<?php endif; // is_single() ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?> <!-- display excerpt or content -->
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

	</div><!-- #post -->

</div>
</div>

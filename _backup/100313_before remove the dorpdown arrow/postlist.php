<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template Name: Post List Template 
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div id="primary" class="site-content">
	<div id="content" role="main">

		<?php
		$query = new WP_Query( 'cat=10' );

		if ( $query->have_posts() ) {
			echo '<ul>';
			while ( $query->have_posts() ) {
				$query->the_post();
			?>

			<li><a href="<?php the_permalink();?>"> <?php the_title();?> <?php the_date();?> <?php the_author();?> </a></li>

			<?php
			}
			echo '</ul>';
		} else {
			// no posts found
		}

		wp_reset_postdata();
		//[r]http://codex.wordpress.org/Class_Reference/WP_Query
		?><br>

		<div class="postlist">
			<?php wp_get_archives(  array(
				'type'            => 'postbypost',
				'limit'           => '',
				'format'          => 'custom', 
				'before'          => '',
				'after'           =>'<br>',
				'show_post_count' => false,
				'echo'            => 1,
				'order'           => ''
				)
 			);//[r]http://codex.wordpress.org/Function_Reference/wp_get_archives?>
		</div>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

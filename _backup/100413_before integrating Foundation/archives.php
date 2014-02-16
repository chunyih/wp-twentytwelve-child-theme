<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template Name: Archives Template
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<h1 class="entry-title"><?php the_title(); ?></h1><br>
			<?php the_post(); the_content(); ?><br>

			<!-Main functions start-!>
			<?php get_search_form()?><br>
			
			<h2>Archives by Month:</h2><br>
			<ul><br>
				<?php wp_get_archives(); ?><br>
			</ul><br>

			<h2>Archives by Subject:</h2><br>
                        <ul><br>
                                <?php wp_get_categories(); ?><br>
                        </ul><br>
			
			<!-Main function end-!>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); 
?>
<script>console.log("### page.php ###")</script>



    <!-- Site Content -->
    <div class="row siteContent forum">
        <div class="large-10 large-centered columns testContent">
            <?php 
            while ( have_posts() ) : the_post();
                get_template_part('content', 'blank'); // content-blank.php is a custom template in the child theme that displays <article> section
            endwhile; // end of the loop.
            ?>
        </div>
    </div>







<?php get_footer(); ?>
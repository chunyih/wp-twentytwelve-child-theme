<?php
/**
* The template for displaying all pages.
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site will use a
* different template.
*
* Template Name: sinle-blank.php
* @package WordPress
* @subpackage Twenty_Twelve
* @since Twenty Twelve 1.0
*/


get_header(); 
?>
<script>console.log("### single-blank.php ###")</script>

<!-- Site Content -->
<div class="row">

    <!-- Display Post Title List -->
    <div class="large-3 hide-for-small columns fixed sidebar">
        <ul id="mainSidebar" class="side-nav">
            <?php
            $args = array(
                'posts_per_page'   => 1, // pull the first title out
                'offset'           => 0,
                'category'         => 'detailing',
                'orderby'          => 'meta_value',
                'order'            => 'ASC',
                'meta_key'         => 'display_order'
            );
            $lastposts = get_posts( $args );
            foreach ( $lastposts as $post ):
                setup_postdata( $post ); ?>
                <li class="active"><a href="#"><?php the_title(); ?></a></li>
            <?php
            endforeach;
            wp_reset_postdata();
            ?>

            <?php
            $args = array(
                'offset'           => 1, // pull the rest titles, offest 1: skip the first one
                'category'         => 'detailing',
                'orderby'          => 'meta_value',
                'order'            => 'ASC',
                'meta_key'         => 'display_order'
            );
            $lastposts = get_posts( $args );
            foreach ( $lastposts as $post ):
                setup_postdata( $post ); ?>
                <li><a href="#<?php echo the_slug(); ?>"><?php the_title(); ?></a></li>
            <?php
            endforeach; 
            wp_reset_postdata();
            ?>
        </ul>
    </div>

    <!-- Hard Coded Sidebar -->
    <!--  <div class="large-3 hide-for-small columns fixed sidebar">
        <ul id="mainSidebar" class="side-nav">
            <li class="active"><a href="#">Detailing Bulletin</a></li>
            <li><a href="#forms">Forms</a></li>
            <li><a href="#detailing-calendar">Detailing Calendar</a></li>
            <li><a href="#trimble-reservation">Trimble Reservation</a></li>
        </ul>

        <?php //get_sidebar('new'); ?>
    </div> -->

    <div class="large-9 columns">
        <div class="row">
            <div class="large-12 columns">
                <?php
                while ( have_posts() ) : the_post(); // means while "this page has post", loop them
                    get_template_part('content', 'blank'); // content-blank.php is a custom template in the child theme that displays <article> section
                endwhile; // end of the loop.
                ?>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="calendarSpot large-10 columns"></div>
</div>


<?php get_footer(); ?>
<?php
/**
* The template for displaying all pages.
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site will use a
* different template.
*
* Template Name: sinle-blank-wiki.php
* @package WordPress
* @subpackage Twenty_Twelve
* @since Twenty Twelve 1.0
*/

get_header(); 
?>
<script>console.log("### single-blank-wiki.php ###")</script>
<?php $cat_id = get_cat_ID( 'wiki' ); echo '<p>'.$cat_id.the_slug().'...........</p>';?>


<!-- Site Content -->
<div class="row">

    <!-- Display Post Title List -->
    <div class="large-3 hide-for-small columns fixed sidebar">
        <ul id="mainSidebar" class="side-nav">
            <?php
            // global $post;
            
            $args = array(
                'posts_per_page'   => 1, // pull the first title out
                'offset'           => 0,
                'category'         => $cat_id, // has to be car#, otherwise title won't display correct
                'orderby'          => 'meta_value',
                'order'            => 'ASC',
                'meta_key'         => 'display_order' // custom field 'display_order' need to be set for each post in advanced
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
                'category'         => $cat_id,
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

    <div class="large-9 columns"> 
        <div class="row">
            <div class="large-12 columns">

                <div class="row">
                    <ul class="breadcrumbs columns">
                        <li><a href="#">Home</a></li>
                        <li class="current"><a href="#">Wiki</a></li>
                    </ul>
                </div>

                <h2><?php echo get_the_title(); ?></h2>

                <?php the_content(); ?>

            </div>
        </div>
    </div>

</div>


<?php get_footer(); ?>
<?php
/**
* The template for displaying all pages.
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site will use a
* different template.
*
* Template Name: sinle.php (modified. overwritten by single-blank-wiki.php. original: _single.php)
* @package WordPress
* @subpackage Twenty_Twelve
* @since Twenty Twelve 1.0
*/

get_header(); 
?>

<script>console.log("### single-wiki.php ###")</script>
<?php $cat_id = get_cat_ID( the_slug() );?>

<?php
    wp_reset_postdata();
    $title = get_the_title();
?>



<!-- Site Content -->
<div class="row siteContent">

    <div class="row postContent">
        <!-- Display Post Title List -->
        <div class="hide-for-small columns fixed sidebar">
            <ul id="mainSidebar" class="side-nav">
            </ul>
        </div>

        <div class="large-9 columns rightColumn"> 
            <div class="row">
               
                <div class="rightContent">
                    <div class="row">
                        <ul class="breadcrumbs columns">
                            <li><a href="/../../">Home</a></li>
                            <li><a href="/../wiki/">Wiki</a></li>
                            <li class="current"><a href="#"><?php echo $title; ?></a></li>
                        </ul>
                    </div>

                
                    <h2><?php echo $title; ?></h2>
                    <?php the_content(); ?>

                    <footer class="entry-meta">
    					<span class="glyphicon glyphicon-stop"></span>
    					<span class="entry-date"><?php echo "By ".get_the_author()." • ".get_the_date(); ?></span>
    					<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link"> • ', '</span>' ); ?>
    				</footer><!-- .entry-meta -->

                    <div class="divider"></div>
                    <?php comments_template(); ?> 
                </div>

               
            </div>
        </div>     
    </div>

</div>


<?php get_footer(); ?>
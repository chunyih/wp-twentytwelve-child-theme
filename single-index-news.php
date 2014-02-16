<?php
/**
* The template for displaying all pages.
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site will use a
* different template.
*
* Template Name: sinle-index-news.php
* @package WordPress
* @subpackage Twenty_Twelve
* @since Twenty Twelve 1.0
*/

get_header(); 
?>
<script>console.log("### single-index-news.php ###")</script>
<?php wp_reset_postdata(); ?>


<!-- Site Content -->
<div class="row siteContent newsIndex">

    <!-- Display Post Content -->
    <div class="large-10 large-centered columns postContent"> 
        <div class="row">
            

                <div class="row">
                    <ul class="breadcrumbs columns">
                        <li><a href="/../">Home</a></li>
                        <li class="current"><a href="#">PP News</a></li>
                    </ul>
                </div>
                
                    <h2 class="newsIndexTitle"><?php echo get_the_title(); ?></h2>

                    <?php
                        if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }

                        $temp = $wp_query;  // re-sets query
                        $wp_query = null;   // re-sets query
                        $posts_per_page = 10;
                        $args = array( 
                            'post_type'       => 'news', // [IMP!!!] page slug can't be the same as custom post type name
                            'posts_per_page'  => $posts_per_page, 
                            'offset'          => 0, 
                            'category_name'   => 'news',
                            'paged'           => $paged
                            );

                        $wp_query = new WP_Query();
                        $wp_query->query( $args );
                    // http://stackoverflow.com/questions/13768900/wordpress-pagination-not-working
                    // http://wordpress.org/support/topic/pagination-with-custom-post-type-listing
                    ?>


                    <?php // Use page number to set li starting number 
                        $uriArray = explode('/', $_SERVER['REQUEST_URI']);
                        end($uriArray); // move pointer the end, then use prev. [R] http://stackoverflow.com/questions/2194388/php-how-to-get-the-element-before-the-last-element-from-an-array
                        $page_num = prev($uriArray);
                        $li_start = 1;
                        if ($page_num > 1) {
                            $li_start = ($page_num-1) * $posts_per_page + 1;
                        }
                        else {
                            $li_start = 1;
                        }
                    ?>


                    
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
                            <div class="newsListRow">
                                <a href="<?php echo get_permalink(); ?>">
                                <div class="newsListNum"><ol class="newsList" type="1" start="<?php echo $li_start ?>"><li class="newsListItem"></li></ol></div>
                                <div class="newsListData">
                                    <span><?php the_title(); ?></span>
                                    <div class="newsIndexMeta"><?php echo get_the_date(); ?></div>
                                </div>
                                </a>
                            </div>
                        <?php $li_start +=1; endwhile; ?>
                    

                    <nav class="pageNav">
                        <?php wp_pagenavi(); // handle by plugin ?>
                        <?php //paginate(); $wp_query = null; $wp_query = $temp; // Reset  // turn on if not using plugin ?>
                    </nav>
                
                <?php wp_reset_postdata(); ?>

            
        </div>
    </div>

</div>


<?php get_footer(); ?>
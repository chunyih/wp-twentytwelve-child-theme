<?php
/**
* The template for displaying all pages.
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site will use a
* different template.
*
* Template Name: sinle-home.php
* @package WordPress
* @subpackage Twenty_Twelve
* @since Twenty Twelve 1.0
*/

get_header(); 
?>

<script>console.log("### single-home.php ###")</script>
<?php wp_reset_postdata();?>


<!-- Site Content -->
<div class="row siteContent homeContent">


	<div class="one">
	</div>

    <div class="row postContent homePostContent">
        
        <div class="row homeInfo">
            <div class="row anno">
                <div class="large-9 large-centered columns"> 
                    <div class="large-2 columns"><i class="fa fa-bullhorn"></i></div>
                    <div class="large-10 columns annoContent"><?php $post = get_post(571); $content = $post->post_content; $content = apply_filters('the_content', $content); echo $content; ?></div>
                </div>
            </div>
            <div class="row cal">
                <div class="large-9 large-centered columns">
                    <div class="large-2 columns"><i class="fa fa-calendar"></i></div>
                    <div class="large-10 columns calContent"><?php the_content(); ?></div>
                </div>
            </div>
        </div>

        <div class="row project">
            <div class="large-10 large-centered columns">
                <div class="row">
                    <h2 class="projectTitle">Projects</h2>
                </div>
                <div class="row projectContent">
                    <div class="large-6 columns"><?php $post = get_post(573); $content = $post->post_content; $content = apply_filters('the_content', $content); echo $content; ?></div>
                    <div class="large-6 columns"><?php $post = get_post(574); $content = $post->post_content; $content = apply_filters('the_content', $content); echo $content; ?></div>
                </div>
            </div>
        </div>

        <div class="row weather">
            <div class="large-10 large-centered columns">
                <div class="row">
                    <h2 class="weatherTitle">Weather</h2>
                </div>
                <div class="large-9 large-centered columns">
                    <div class="overlay overlayMenlo">Menlo Park</div>
                    <div class="overlay overlayIrvine">Irvine</div>
                    <div class="overlay overlaySD">San Diego</div>
                    <div class="overlay overlayHawaii">Hawaii</div>
                    <div class="row">
                        <iframe id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%" src="http://forecast.io/embed/#lat=37.483187&lon=-122.175829&name=Menlo Park&color=#CACACA"></iframe>
                    </div>
                    <div class="row">
                        <iframe id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%" src="http://forecast.io/embed/#lat=33.693449&lon=-117.864034&name=Irvine&color=#CACACA"></iframe>
                    </div>
                    <div class="row">
                        <iframe id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%" src="http://forecast.io/embed/#lat=32.928510&lon=-117.239043&name=San Diego&color=#CACACA"></iframe>
                    </div>
                    <div class="row">
                        <iframe id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%" src="http://forecast.io/embed/#lat=19.663446&lon=-155.981593&name=Hawaii&color=#CACACA"></iframe>
                    </div>
                </div>
            </div>

            
        </div>

    </div>

</div>




              <!--   <div class="row weatherContent">
                    <div class="large-3 columns weatherMenlo">
                        <div class="row cityName"></div>
                        <div class="row">
                            <div class="large-7 columns weatherIcon"><i class="fa fa-spinner fa-spin"></i><canvas id="artly-cloudy-day" width="30" height="30"></canvas></div>
                            <div class="large-5 columns weatherTemp"></div>
                        </div>
                        <div calss="row weatherSum"></div>
                    </div>

                    <div class="large-3 columns weatherIrvine"></div>
                    <div class="large-3 columns weatherSD"></div>
                    <div class="large-3 columns weatherHawaii"></div>
                </div> -->

<?php get_footer(); ?>
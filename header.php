<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <script>console.log("### header.php ###")</script>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <!-- <link rel="profile" href="http://gmpg.org/xfn/11" /> -->
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <?php wp_head(); ?>

    <script src="<?php echo get_stylesheet_directory_uri().'/js/vendor/custom.modernizr.js'; ?>"></script>

    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <!--<style type="text/css" media="screen">
    /*	html { margin-top: 0 !important; }
    	* html body { margin-top: 0 !important; }*/ /* <================= turn on when wp admin bar enabled */
        @media only screen and (min-width: 768px) { 
            body {padding-top: 45px;} /* <================= fix the page padding-top loading delay issue. adjuest height accordingly, [IMP] breaking pt: 768px; */
        }
    </style> -->
</head>



<body <?php body_class(); ?>>

    <?php
    $current_user = wp_get_current_user();
    $home_url = get_bloginfo('home');

    ?>

    <div class="row topBarWrapper">
    <div class="large-12 small-12 large-centered">

        <!-- Nav Bar -->
        <div class="contain-to-grid fixed">
            <nav class="top-bar" data-options="is_hover:false"> 
                <ul class="title-area">
                    <!-- Title Area -->
                    <li class="name">
                        <h1><a href="<?php echo home_url(); ?>">(iPP Logo Pending)</a></h1>
                    </li>
                    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                </ul>

                <section class="top-bar-section">
                    <!-- Right Nav Section -->
                    <ul class="right">
                        
                        <!-- <li class="divider hide-for-small"></li> -->
                        <li><a href="<?php echo $home_url.'/ppnews' ?>">News</a></li>

                        <li class="divider show-for-small"></li>
                        <li><a href="<?php echo $home_url.'/wiki' ?>">Wiki</a></li>

                        <li class="divider show-for-small"></li>
                        <li class="has-dropdown"><a href="#">Departments</a>
                            <ul class="dropdown">
                                <li><a href="<?php echo $home_url.'/departments/accounting' ?>">Accounting</a></li>
                                <li><a href="<?php echo $home_url.'/departments/detailing' ?>">Detailing</a></li>
                                <li><a href="<?php echo $home_url.'/departments/estimating' ?>">Estimating</a></li>
                                <li><a href="<?php echo $home_url.'/departments/purchasing' ?>">Purchasing</a></li>
                                <li><a href="<?php echo $home_url.'/departments/qaqc' ?>">QA / QC</a></li>
                                <li><a href="<?php echo $home_url.'/departments/safety' ?>">Safety</a></li>
                                <li><a href="<?php echo $home_url.'/departments/it' ?>">IT</a></li>
                            </ul>
                        </li>

                        <li class="dividerLarge hide-for-small">|</li>

                        <li class="userName has-dropdown hide-for-small"><a><?php echo ($current_user->user_firstname); ?></a>
                            <ul class="dropdown">
                                <li><a href="<?php echo wp_logout_url(); ?>">Log Out</a></li>
                            </ul>
                        </li>

                        <li class="divider show-for-small"></li>
                        <li class="forum"><a><span class="glyphicon glyphicon-comment"></span></a></li>
                        <li class="show-for-small"><a href="<?php echo wp_logout_url(); ?>">Log Out</a></li>
                        
                        <li class="search hide-for-small"><a><span class="glyphicon glyphicon-search"></span></a></li>

                        <li class="divider show-for-small"></li>
                        <li class="has-form show-for-small">
                            <form class="searchForm" role="search" method="get" id="searchform" action="<?php echo $home_url ?>/">
                                <div class="small-8 large-12 columns show-for-small">
                                    <input class="textInput" type="text" name="s" id="s" placeholder="Enter to Search" autocomplete="off">
                                </div>
                                <div class="small-4 columns show-for-small">
                                    <input type="submit" class="my-wp-search" id="searchsubmit" value="Search">
                                </div>
                            </form>
                        </li>

                    </ul>
                </section>
            </nav>
        </div>
        
    </div>
    </div>

	

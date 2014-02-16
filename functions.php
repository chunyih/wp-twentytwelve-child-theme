<?php 
// ==========================================
// 		Hide Admin Bar
// ==========================================
    add_filter( 'show_admin_bar', '__return_false' );
?>
<?php
// ==========================================
// 		Login
// ===========================================
    // Logo
    function my_login_logo() {?>
        <style type="text/css">
            body.login div#login h1 a {
                background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/logo.png);
                padding-bottom: 30px;
            }
        </style>
    <?php 
    }
    add_action( 'login_enqueue_scripts', 'my_login_logo' );
    // http://codex.wordpress.org/Customizing_the_Login_Form#Styling_Your_Login
    // http://codex.wordpress.org/Function_Reference/get_bloginfo
    ?>
    <?php
    // Change Loging Logo url and Description
    function my_login_logo_url() {
        return get_bloginfo( 'url' );
    }
    add_filter( 'login_headerurl', 'my_login_logo_url' );

    function my_login_logo_url_title() {
        return 'iPP';
    }
    add_filter( 'login_headertitle', 'my_login_logo_url_title' );
    // http://codex.wordpress.org/Customizing_the_Login_Form#Styling_Your_Login
    // http://codex.wordpress.org/Plugin_API/Filter_Reference 
?>
<?php
// ==========================================
// 		Include CSS / Fonts
// ==========================================
    // Main Page
    function include_stylesheet() { 
    	wp_register_style( 'bootstrap-css-font-badge',  get_stylesheet_directory_uri() . '/css/bootstrap-font-badge.min.css', array(),'v3.0.0', 'all' );  
    	wp_enqueue_style( 'bootstrap-css-font-badge' ); 
    	wp_register_style( 'foundation-css',  get_stylesheet_directory_uri() . '/css/foundation.css', array(),'v4.3.2', 'all' );
    	wp_enqueue_style( 'foundation-css' ); 
    }
    add_action( 'wp_enqueue_scripts', 'include_stylesheet' );
    ?>
    <?php
    // Login
    function include_login_stylesheet() { ?>
        <link rel="stylesheet" id="custom_wp_admin_css" href="<?php echo get_stylesheet_directory_uri() . '/style-login.css'; ?>" type="text/css" media="all" />
    <?php 
    }
    add_action( 'login_enqueue_scripts', 'include_login_stylesheet' );
?>
<?php
// ==========================================
// 		Include Scripts
// ==========================================
    // Main Page
    function include_script(){
    	wp_enqueue_script( 'jquery' ); // [IMP!!] jQuery need to load before bootstrap!!
    //	wp_enqueue_script( 'jquery-effects-core' );
    	wp_enqueue_script( 'jquery-autosize-js',  get_stylesheet_directory_uri() . '/js/jquery.autosize.min.js', array(), 'v1.18.0', true );
    	wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/js/theme.js', array(), 'v091613', true );
    //	wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.js', array(), 'v3.0.0', true );
    //	wp_enqueue_script( 'bootstrap-js', 'http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js', array(), 'v3.0.0', true );
    	wp_enqueue_script( 'foundation-js', get_stylesheet_directory_uri() . '/js/foundation.min.js', array(), 'v4.3.2', true );
    //   wp_enqueue_script( 'skycons-js', get_stylesheet_directory_uri() . '/js/skycons.js', array(), 'v0', true );
    //   wp_enqueue_script( 'moment-js', get_stylesheet_directory_uri() . '/js/moment.min.js', array(), 'v2.5.0', true );
    }
    add_action( 'wp_enqueue_scripts', 'include_script' );
    ?>
    <?php
    // Login
    function include_login_script(){
    	wp_enqueue_script( 'jquery' );
    	wp_enqueue_script( 'theme-login-js', get_stylesheet_directory_uri() . '/js/theme-login.js', array(), 'v091613', true );
    }
    add_action( 'login_enqueue_scripts', 'include_login_script' );
    ?>
    <?php
    // Admin
    function include_admin_script() {
    	wp_enqueue_script( 'theme-admin-js', get_stylesheet_directory_uri() . '/js/theme-admin.js' , array(), 'v091613', true );
    }
    add_action( 'admin_menu', 'include_admin_script' );
    ?>
<?php
// ==========================================
// 		the_slug()
// ==========================================
    function the_slug() {
        $post_data = get_post($post->ID, ARRAY_A);
        $slug = $post_data['post_name'];
        return $slug; 
    }
    // http://www.wprecipes.com/wordpress-function-to-get-postpage-slug
?>
<?php
// ==========================================
//      the_parent_slug()
// ==========================================
    function the_parent_slug() {
        global $post;
        if($post->post_parent == 0) return '';
        $post_data = get_post($post->post_parent);
        return $post_data->post_name;
    }
?>
<?php
// ==========================================
//      Custom Post Type
// ==========================================
    function add_post_type() {
        $args = array(
          'public'          => true,
          'label'           => 'Wiki',
          'taxonomies'      => array('category'),
          'supports'        => array('title','editor','custom-fields','comments','thumbnail'),
          'menu_position'   => 5
        );
        register_post_type( 'wiki', $args ); // for single post, WP will then look for single-wiki.php
       
        $args = array(
          'public'          => true,
          'label'           => 'News',
          'taxonomies'      => array('category'),
          'supports'        => array('title','editor','custom-fields','comments', 'thumbnail'),
          'menu_position'   => 5
        );
        register_post_type( 'news', $args ); // for single post, WP will then look for single-news.php
    }
    add_action( 'init', 'add_post_type' );
    // http://codex.wordpress.org/Function_Reference/register_post_type
    // [IMP!!!] Flush rules is req'd when creating a new post type. Can be done by switching the permalinks setting.
?>
<?php
// ==========================================
//      Custom Comment Form
// ==========================================
    function mytheme_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ( 'div' == $args['style'] ) {
          $tag = 'div';
          $add_below = 'comment';
        } else {
          $tag = 'li';
          $add_below = 'div-comment';
        }
    ?>
        <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>

        <!-- Avatar -->
        <div class="comment-author vcard">
            <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        </div>

        <!-- Author -->
        <div class="author">
            <?php printf(__('<div class="fn">%s</div>'), get_comment_author_link()) ?> 
        </div>

        <!-- Meta/Edit -->
        <div class="comment-meta commentmetadata">
            <div>
                <?php // translators: 1: date, 2: time
                    printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time());
                    echo edit_comment_link(__('Edit'),' • ','' );
                ?>
            </div>
        </div>
        
        <!-- Comment -->
        <div class="commentMsg">
            <?php if ($comment->comment_approved == '0') : ?>
                <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
                <br />
            <?php endif; ?>
            <span><?php echo $comment->comment_content; ?></span>
        </div>
        

        <div class="reply">
            <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
        
        <?php if ( 'div' != $args['style'] ) : ?>
            </div>
        <?php endif; ?>
    <?php
    }
    // http://codex.wordpress.org/Template_Tags/wp_list_comments#Comments_Only_With_A_Custom_Comment_Display
?>
<?php 
// ==========================================
//      Custom Pagination (Not in Use)
// ==========================================
    function paginate() {
        global $wp_query, $wp_rewrite;
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        $pagination = array(
            'base'      => @add_query_arg('page','%#%'),
            'format'    => '',
            'total'     => $wp_query->max_num_pages,
            'current'   => $current,
            'show_all'  => true,
            'type'      => 'list',
            'next_text' => '&raquo;',
            'prev_text' => '&laquo;'
            );

        if( $wp_rewrite->using_permalinks() )
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 'page', get_pagenum_link( 1 ) ) ) . '?page=%#%/', 'paged' );

        if( !empty($wp_query->query_vars['s']) )
            $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

        echo paginate_links( $pagination );
    }
    // http://stackoverflow.com/questions/13768900/wordpress-pagination-not-working
    // http://wordpress.org/support/topic/pagination-with-custom-post-type-listing [IMP!!!] page slug can't be the same as custom post type name
?>
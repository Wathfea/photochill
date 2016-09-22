<?php
/**
 * @package photochill
 */

/**
 * Photochill only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
    require get_template_directory() . '/inc/back-compat.php';
}

/**
 * Required WordPress variable.
 */
if (!isset($content_width)) {
    $content_width = 1170;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 */
if ( ! function_exists( 'pc_setup' ) ) :
    function pc_setup() {
        /*
         * Make theme available for translation.
         */
        load_theme_textdomain( 'photochill', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 600, 350, true );

        // This theme uses wp_nav_menu()
        register_nav_menus( [
            'primary' => __( 'Primary Menu', 'photochill' )
        ] );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'] );

        // Enable support for Post Formats.
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ) );
    }
endif; // pc_setup
add_action( 'after_setup_theme', 'pc_setup' );

/**
 * Sets up theme widget areas
 *
 */
if (!function_exists('pc_widget_setup')) {
    /**
     * Register widget areas
     */
    function pc_widget_setup()
    {
        register_sidebar(array(
            'name'          => __('Sidebar right', 'photochill'),
            'id'            => 'sidebar-right',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
    }
}
add_action('widgets_init', 'pc_widget_setup');

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function pc_scripts() {
    $rand = rand(1,10000);
    wp_enqueue_style('main-style', get_template_directory_uri() . '/public/css/all.min.css?v=' . $rand);
    wp_enqueue_script('jquery');
    //wp_enqueue_script('main-script', get_template_directory_uri() . '/public/js/all.min.js?v=' . $rand, array(), false, false);
    wp_enqueue_style('pc-style', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'pc_scripts' );


/**
 * Custom dropdown menu and navbar in walker class
 */
require get_template_directory() . '/inc/PCMyWalkerNavMenu.php';

/**
 * Register our custom post type for Main Photos
 */
add_action( 'init', 'register_mainphotos' );
function register_mainphotos() {

    $args = array(
        'labels'             => array(
            'name'               => _x( 'Főoldali képek', 'post type general name', 'photochill' ),
            'singular_name'      => _x( 'Kép', 'post type singular name', 'photochill' ),
            'menu_name'          => _x( 'Főoldali képek', 'admin menu', 'photochill' ),
            'name_admin_bar'     => _x( 'Főoldali képek', 'add new on admin bar', 'photochill' ),
            'add_new'            => _x( 'Új', 'About', 'photochill' ),
            'add_new_item'       => __( 'Új', 'photochill' ),
            'new_item'           => __( 'Új kép', 'photochill' ),
            'edit_item'          => __( 'Kép szerkesztése', 'photochill' ),
            'view_item'          => __( 'Kép megtekintése', 'photochill' ),
            'all_items'          => __( 'Összes elem', 'photochill' ),
            'search_items'       => __( 'Keresés', 'photochill' ),
            'parent_item_colon'  => __( 'Szülő:', 'photochill' ),
            'not_found'          => __( 'Nem található.', 'photochill' ),
            'not_found_in_trash' => __( 'Nem található a kukában.', 'photochill' )
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'mainphotos' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
    );

    register_post_type( 'mainphotos', $args );
}

/**
 * Add featured image in admin list
 */
 function custom_columns( $columns ) {
     $columns = array(
         'cb' => '<input type="checkbox" />',
         'featured_image' => 'Kép',
         'title' => 'Cím',
         'comments' => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
         'date' => 'Dátum'
      );
     return $columns;
 }
 add_filter('manage_mainphotos_posts_columns' , 'custom_columns');

/**
 * Register the columns and add the thumbnail for the feauter image column.
 */
 function custom_columns_data( $column, $post_id ) {
     switch ( $column ) {
     case 'featured_image':
         echo the_post_thumbnail(array(100,100));
         break;
     }
 }
 add_action( 'manage_posts_custom_column' , 'custom_columns_data', 10, 2 );

/**
 * Prevent delete the mian pictures
 * @param  [type] $post_ID [description]
 * @return [type]          [description]
 */
 function restrict_post_deletion($post_ID){
      $restricted_ements = array(45,51);
      if(in_array($post_ID, $restricted_ements)){
          wp_redirect(admin_url('index.php'));
          exit;
      }
 }
 add_action('wp_trash_post', 'restrict_post_deletion', 1);
 add_action('before_delete_post', 'restrict_post_deletion', 1);


/**
 * Own excerpt making
 * @param $text
 * @param $numb
 * @return string
 */
function b_excerpt($text,$numb) {
    if (strlen($text) > $numb) {
        $text = substr($text, 0, $numb);
        $text = substr($text,0,strrpos($text," "));
        $etc = " ...";
        $text = $text.$etc;
    }
    return $text;
}

add_image_size( 'full-width-ratio', 600, 9999 );
add_image_size( 'full-width-crop', 235, 235, true );
add_image_size( 'no-cropped', 480, 360, true );


function custom_in_post_images( $args ) {
    $custom_images = array('full-width-ratio' => 'Full Width Ratio', 'full-width-crop' => 'Full Width Crop', 'no-cropped' => 'No Cropped');
    return array_merge( $args, $custom_images );
}
add_filter( 'image_size_names_choose', 'custom_in_post_images' );

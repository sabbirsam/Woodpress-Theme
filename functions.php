<?php
/**
 * Kirki
 */
include_once("inc/customizer/class-kirki-installer-section.php");
include_once("inc/customizer/customizer-main.php");


/**
 * Version
 */
if( site_url() == "http://localhost/sam/Theme_1/"){
    define( "VERSION" , time());
}else{
    define( "VERSION" , wp_get_theme()->get( "VERSION" ));
}

/**
 * Theme Support
 */
function woodpress_theme_setup(){
    load_theme_textdomain( "woodpress" );
    
    add_theme_support( "post-thumbnails" );
    
    add_theme_support( "title-tag" );

    // add_theme_support( 'custom-logo' );

    add_theme_support( 'html5', array( 'search-form','comment-list','comment-form','gallery', 'caption' ) );

    add_theme_support( "post-formats", array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat') );

    add_editor_style( "/assets/css/editor-style.css" );  

    register_nav_menu( "headermenu", __("Header Menu", "woodpress") );

    add_image_size( "woodpress-home-square", 400, 400, true );


    $defaults = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true, 
        );
     
    add_theme_support( 'custom-logo', $defaults );



}
add_action( "after_setup_theme", "woodpress_theme_setup");




 




/**
 * Enqueue 
 */
function woodpress_assets(){

wp_enqueue_style( 'woodpress-googleapis-css',get_theme_file_uri( '/assets/fonts/main-css2.css'),null,VERSION);

wp_enqueue_style( 'woodpress-bootstrap-min-css',get_theme_file_uri( '/assets/css/bootstrap.min.css'),null,VERSION);
wp_enqueue_style( 'woodpress-font-awesome-min-css',get_theme_file_uri( '/assets/css/font-awesome.min.css'),null,VERSION);
wp_enqueue_style( 'woodpress-elegant-icons-css',get_theme_file_uri( '/assets/css/elegant-icons.css'),null,VERSION);
wp_enqueue_style( 'woodpress-nice-select-css',get_theme_file_uri( '/assets/css/nice-select.css'),null,VERSION);
wp_enqueue_style( 'woodpress-jquery-ui-min-css',get_theme_file_uri( '/assets/css/jquery-ui.min.css'),null,VERSION);
wp_enqueue_style( 'woodpress-owl.carousel-min-css',get_theme_file_uri( '/assets/css/owl.carousel.min.css'),null,VERSION);
wp_enqueue_style( 'woodpress-slicknav-min-css',get_theme_file_uri( '/assets/css/slicknav.min.css'),null,VERSION);
wp_enqueue_style( 'woodpress-style-css',get_theme_file_uri( '/assets/css/style.css'),null,VERSION);


wp_enqueue_style( "woodpress-css",get_stylesheet_uri(), null, VERSION ); // add main css



wp_enqueue_script( 'woodpress-bootstrap-min-js',get_theme_file_uri( '/assets/js/bootstrap.min.js'),array('jquery'),VERSION,true);
wp_enqueue_script( 'woodpress-jquery-nice-select-min-js',get_theme_file_uri( '/assets/js/jquery.nice-select.min.js'),array('jquery'),VERSION,true);
wp_enqueue_script( 'woodpress-jquery-ui-min-js',get_theme_file_uri( '/assets/js/jquery-ui.min.js'),array('jquery'),VERSION,true);
wp_enqueue_script( 'woodpress-jquery-slicknav-js',get_theme_file_uri( '/assets/js/jquery.slicknav.js'),array('jquery'),VERSION,true);
wp_enqueue_script( 'woodpress-mixitup-min-js',get_theme_file_uri( '/assets/js/mixitup.min.js'),array('jquery'),VERSION,true);
wp_enqueue_script( 'woodpress-owl.carousel-min-js',get_theme_file_uri( '/assets/js/owl.carousel.min.js'),array('jquery'),VERSION,true);
wp_enqueue_script( 'woodpress-main-js',get_theme_file_uri( '/assets/js/main.js'),array('jquery'),VERSION,true);


wp_enqueue_script( 'woodpress-js',get_theme_file_uri( '/assets/js/woodpress.js'),array('jquery'),VERSION,true);



}
add_action( "wp_enqueue_scripts", "woodpress_assets" );


/**
 * Navigation Menu walker
 */
class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu {
 

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // Depth-dependent classes.
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ( $display_depth % 2  ? 'header__menu__dropdown' : 'menu-even' ), //ul class here
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );
 
        // Build HTML for output.
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
 
        // Depth-dependent classes.
        $depth_classes = array(
            ( $depth == 0 ? 'sam-first-li' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
 
        // Passed classes.
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
 
        // Build HTML.
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
 
        // Link attributes.
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? '2nd-ul-sub-menu-link' : 'sam-first-li-menu-link' ) . '"';
 
        // Build HTML output and pass through the proper filter.
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}



/**
 * Search
 */
function advanced_search_query($query) {

    if($query->is_search()) {

        // your extra param is: in_category // &in_category=sample-category
        if (isset($_GET['in_category'])) {
            $query->set('category_name', $_GET['in_category']);
        }

        return $query;
    }

}
add_action('pre_get_posts', 'advanced_search_query', 1000);



function advanced_search_query_demo($query) {

    if($query->is_search()) {
        if (isset($_GET['in_category'])) {

            $query->set('tax_query', array(array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array($_GET['in_category']) )
            ));
        }

        return $query;
    }

}
add_action('pre_get_posts', 'advanced_search_query_demo', 1000);

/**
 * End
 */



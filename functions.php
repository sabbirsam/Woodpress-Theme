<?php
/**
 * Kirki
 */

require_once(get_theme_file_path("/inc/tgm.php" ));

include_once("inc/customizer/class-kirki-installer-section.php");
include_once("inc/customizer/customizer-main.php");



/**
 * Version
 */
if (site_url() == "http://localhost/sam/Theme_1/") {
    define("VERSION", time());
} else {
    define("VERSION", wp_get_theme()->get("VERSION"));
}

/**
 * Theme Support
 */
function woodpress_theme_setup()
{
    load_theme_textdomain("woodpress");
    
    add_theme_support("post-thumbnails");
    
    add_theme_support("title-tag");

    add_theme_support('woocommerce');

    add_theme_support('html5', array( 'search-form','comment-list','comment-form','gallery', 'caption' ));

    add_theme_support("post-formats", array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'));

    add_editor_style("/assets/css/editor-style.css");

    register_nav_menu("headermenu", __("Header Menu", "woodpress"));

    add_image_size("woodpress-home-square", 400, 400, true);
    add_image_size("woodpress-popular-square", 360, 259, true);


    $defaults = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true,
        );
     
    add_theme_support('custom-logo', $defaults);
}
add_action("after_setup_theme", "woodpress_theme_setup");


/**
 * Enqueue
 */
function woodpress_assets()
{
    wp_enqueue_style('woodpress-googleapis-css', get_theme_file_uri('/assets/fonts/main-css2.css'), null, VERSION);

    wp_enqueue_style('woodpress-bootstrap-min-css', get_theme_file_uri('/assets/css/bootstrap.min.css'), null, VERSION);
    wp_enqueue_style('woodpress-font-awesome-min-css', get_theme_file_uri('/assets/css/font-awesome.min.css'), null, VERSION);
    wp_enqueue_style('woodpress-elegant-icons-css', get_theme_file_uri('/assets/css/elegant-icons.css'), null, VERSION);
    wp_enqueue_style('woodpress-nice-select-css', get_theme_file_uri('/assets/css/nice-select.css'), null, VERSION);
    wp_enqueue_style('woodpress-jquery-ui-min-css', get_theme_file_uri('/assets/css/jquery-ui.min.css'), null, VERSION);
    wp_enqueue_style('woodpress-owl.carousel-min-css', get_theme_file_uri('/assets/css/owl.carousel.min.css'), null, VERSION);
    wp_enqueue_style('woodpress-slicknav-min-css', get_theme_file_uri('/assets/css/slicknav.min.css'), null, VERSION);
    wp_enqueue_style('woodpress-style-css', get_theme_file_uri('/assets/css/style.css'), null, VERSION);
   

    wp_enqueue_style("woodpress-css", get_stylesheet_uri(), null, VERSION); // add main css



    wp_enqueue_script('woodpress-bootstrap-min-js', get_theme_file_uri('/assets/js/bootstrap.min.js'), array('jquery'), VERSION, true);
    wp_enqueue_script('woodpress-jquery-nice-select-min-js', get_theme_file_uri('/assets/js/jquery.nice-select.min.js'), array('jquery'), VERSION, true);
    wp_enqueue_script('woodpress-jquery-ui-min-js', get_theme_file_uri('/assets/js/jquery-ui.min.js'), array('jquery'), VERSION, true);
    wp_enqueue_script('woodpress-jquery-slicknav-js', get_theme_file_uri('/assets/js/jquery.slicknav.js'), array('jquery'), VERSION, true);
    wp_enqueue_script('woodpress-mixitup-min-js', get_theme_file_uri('/assets/js/mixitup.min.js'), array('jquery'), VERSION, true);
    wp_enqueue_script('woodpress-owl.carousel-min-js', get_theme_file_uri('/assets/js/owl.carousel.min.js'), array('jquery'), VERSION, true);
    wp_enqueue_script('woodpress-main-js', get_theme_file_uri('/assets/js/main.js'), array('jquery'), VERSION, true);


    wp_enqueue_script('woodpress-darkmode-js', get_theme_file_uri('/assets/js/darkmode-js.min.js'), array('jquery'), VERSION, true);

    wp_enqueue_script('woodpress-js', get_theme_file_uri('/assets/js/woodpress.js'), array('jquery'), VERSION, true);


    /**
     * Featured section ajax
     */
    if(is_page_template('page-templates/homepage.php')){

        wp_enqueue_script('woodpress-featured-section', get_theme_file_uri('/assets/js/featured-section.js'), array('jquery'), VERSION, true);
        $ajaxurl = admin_url( 'admin-ajax.php' );

        wp_localize_script( "woodpress-featured-section" , "wfs", array('ajaxurl'=>$ajaxurl ));

    }

}
add_action("wp_enqueue_scripts", "woodpress_assets");


/**
 * Navigation Menu walker
 */
class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        // Depth-dependent classes.
        $indent = ($depth > 0  ? str_repeat("\t", $depth) : ''); // code indent
        $display_depth = ($depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ($display_depth % 2  ? 'header__menu__dropdown' : 'menu-even'), //ul class here
            ($display_depth >=2 ? 'sub-sub-menu' : ''),
            'menu-depth-' . $display_depth
        );
        $class_names = implode(' ', $classes);
 
        // Build HTML for output.
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        global $wp_query;
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent
 
        // Depth-dependent classes.
        $depth_classes = array(
            ($depth == 0 ? 'sam-first-li' : 'sub-menu-item'),
            ($depth >=2 ? 'sub-sub-menu-item' : ''),
            ($depth % 2 ? 'menu-item-odd' : 'menu-item-even'),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr(implode(' ', $depth_classes));
 
        // Passed classes.
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));
 
        // Build HTML.
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
 
        // Link attributes.
        $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url) .'"' : '';
        $attributes .= ' class="menu-link ' . ($depth > 0 ? '2nd-ul-sub-menu-link' : 'sam-first-li-menu-link') . '"';
 
        // Build HTML output and pass through the proper filter.
        $item_output = sprintf(
            '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters('the_title', $item->title, $item->ID),
            $args->link_after,
            $args->after
        );
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}



/**
 * Search
 */
function advanced_search_query($query)
{
    if ($query->is_search()) {

        // your extra param is: in_category // &in_category=sample-category
        if (isset($_GET['in_category'])) {
            $query->set('category_name', $_GET['in_category']);
        }

        return $query;
    }
}
add_action('pre_get_posts', 'advanced_search_query', 1000);



function advanced_search_query_demo($query)
{
    if ($query->is_search()) {
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
 * breadcrumb style fix
 */


function woodpress_woocommerce_breadcrumbs()
{
    return array(
            'delimiter'   => '', //&#47;
            'wrap_before' => '<span class="breadcrumb__option" itemprop="breadcrumb">',
            'wrap_after'  => '</span>',
            'before'      => '',
            'after'       => '',
            'home'        => _x('Home', 'breadcrumb', 'woocommerce'),
        );
}
add_filter('woocommerce_breadcrumb_defaults', 'woodpress_woocommerce_breadcrumbs', 20);


/**
 * Blog Pagination
 */
function woodpress_pagination()
{
    global $wp_query;
    $links=  paginate_links(array(
       'current' => max(1, get_query_var('paged')),
       'total' => $wp_query->max_num_pages,
       'mid_size'=>3
    ));

    $links = str_replace("page-numbers", 'sam', $links);
    
    echo $links;
}



/**
 *  blog page social icon
 */

 if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_61503c6a5b178',
        'title' => 'Social From',
        'fields' => array(
            array(
                'key' => 'field_61503c77481b7',
                'label' => 'Facebook',
                'name' => 'facebook',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_61503c84481b8',
                'label' => 'Instagram',
                'name' => 'instagram',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_61503c93481b9',
                'label' => 'Twitter',
                'name' => 'twitter',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'user_form',
                    'operator' => '==',
                    'value' => 'all',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;
    
    
// end



/**
 * Comment
 */
function woodpress_comment($comment, $args, $depth)
{
    if ('div' === $args['style']) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    } ?>

<<?php echo $tag; ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>
    id="comment-<?php comment_ID() ?>"><?php
    if ('div' != $args['style']) { ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>


        <div class="comment__avatar">
            <?php
                    if ($args['avatar_size'] != 0) {
                        echo get_avatar($comment, $args['avatar_size']);
                    } ?>
        </div>
        <div class="comment__content">
            <div class="comment__info">
                <?php
                        printf(__('<cite class="fn">%s</cite> <span class="says"> </span>'), get_comment_author_link()); ?>
            </div>
        </div>
        <?php
        if ($comment->comment_approved == '0') { ?>
        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.'); ?></em><br /><?php
        } ?>
        <div class="comment-meta commentmetadata">
            <time class="comment__time">

                <?php
                    /* translators: 1: date, 2: time */
                    printf(
                        // __('%1$s at %2$s'),
                        get_comment_date(),
                        get_comment_time()
                    ); ?>
            </time><?php
            edit_comment_link(__('(Edit)'), '  ', ''); ?>
            <a class="reply">

                <?php
                comment_reply_link(
                        array_merge(
                            $args,
                            array(
                            'add_below' => $add_below,
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth']
                        )
                        )
                    ); ?></a>
        </div>

        <div class="comment__text">
            <?php comment_text(); ?>
        </div>


        <?php
        if ('div' != $args['style']) : ?>
    </div>
    <?php
        endif;
}


/**
 * Search Form on single post
 */
function woodpress_search_form($form)
{
    $home_dir = home_url("/");
    $newform=<<<FORM
<form role="search" method="get" action="{$home_dir}" >
<input type="search" placeholder="Search..." name="s">
<button type="submit"><span class="icon_search"></span></button>
</form>
FORM;

    return $newform;
}
add_filter("get_search_form", "woodpress_search_form");


/**
 * Sidebar
 */

function woodpress_about_widget()
{
    register_sidebar(array(
        'name'          => __('Footer Address', 'woodpress'),
        'id'            => 'footer_address_page',
        'description'   => 'Footer Address displaying Footer Section.',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Useful Links', 'woodpress'),
        'id'            => 'footer_useful_link',
        'description'   => 'Links  displaying Footer Section.',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="">',
        'after_title'   => '</h3>',
    ));

/**
 * WOOCOOMERCE Sidebar
*/
    register_sidebar(array(
        'name'          => __('WOOCOMMERCE Sidebar', 'woodpress'),
        'id'            => 'woocommerce_list',
        'description'   => 'Links  displaying Woocommerce sidebar Section.',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="">',
        'after_title'   => '</h3>',
    ));
}

add_action('widgets_init', 'woodpress_about_widget');


    /**
     * Remove woocommerce markup SHOP Page
     */
  
    remove_action("woocommerce_before_shop_loop_item", "woocommerce_template_loop_product_link_open", 10); 
     
    remove_action("woocommerce_before_shop_loop_item_title", "woocommerce_show_product_loop_sale_flash", 10); 
 
    remove_action("woocommerce_shop_loop_item_title", "woocommerce_template_loop_product_title", 10); //product title
 
    remove_action("woocommerce_after_shop_loop_item_title", "woocommerce_template_loop_rating", 5); //product rating
    remove_action("woocommerce_after_shop_loop_item_title", "woocommerce_template_loop_price", 10); //price
 
    remove_action("woocommerce_after_shop_loop_item", "woocommerce_template_loop_add_to_cart", 10); //add_to_cart
 
 
 
 /**
 * markup fix
 */
 
 function woodpress_before_shop_loop_item()
 {
     echo '<div class="product__item__pic set-bgs">';
 }
 add_action("woocommerce_before_shop_loop_item", "woodpress_before_shop_loop_item");
 
 add_action("woocommerce_before_shop_loop_item", "woocommerce_template_loop_product_link_open", 5); 
 
 add_action("woocommerce_before_shop_loop_item_title", "woocommerce_template_loop_add_to_cart", 10);
 
 add_action("woocommerce_shop_loop_item_title", "woocommerce_template_loop_product_title", 11);
 add_action("woocommerce_after_shop_loop_item_title", "woocommerce_template_loop_price", 10);
 
 function woodpress_shop_loop_item_title()
 {
     echo '</div>
     <div class="product__item__text">';
 }
 add_filter("woocommerce_shop_loop_item_title", "woodpress_shop_loop_item_title");



/**
 * extra cart remove by class
 */
 if ( ! function_exists( 'woocommerce_template_loop_product_link_open' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function woocommerce_template_loop_product_link_open() {
		global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

		echo '<a href="' . esc_url( $link ) . '" class="sam woocommerce-LoopProduct-link woocommerce-loop-product__link sam">';
	}
}


   /**
     * Remove woocommerce markup Single SHOP Page
     */
  
    remove_action("woocommerce_before_main_content", "woocommerce_breadcrumb", 20); 

    
/**
 * Change Woo Product H1 Tag to H3
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

function woocommerce_template_single_title() {
    the_title( '<div class="product__details__text"><h3 class="product_title entry-title">', '</h3></div>' );
}

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

/**
 * Cart button and style
 */
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus" >+</button>';
}
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' ); 

function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus" >-</button>';
}
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' ); 
// -------------
// 2. Trigger update quantity script

function bbloomer_add_cart_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() ) return;
    
   wc_enqueue_js( "   
           
      $('form.cart,form.woocommerce-cart-form').on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max );
            } else {
               qty.val( val + step );
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min );
            } else if ( val > 1 ) {
               qty.val( val - step );
            }
         }
 
      });
        
   " );
}
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );

 /**
* Change the test for "In Stock / Quantity Left / Out of Stock".
*/

function wcs_custom_get_availability( $availability, $_product ) {
   global $product;

   	// Change In Stock Text
    if ( $_product->is_in_stock() ) {
        $availability['availability'] = __('<b>Availability : </b> Plenty available in our store!', 'woocommerce');
    }

    // Change in Stock Text to only 1 or 2 left
    if ( $_product->is_in_stock() && $product->get_stock_quantity() <= 2 ) {
    	$availability['availability'] = sprintf( __('Only %s left in store!', 'woocommerce'), $product->get_stock_quantity());
	}

    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
    	$availability['availability'] = __('Sorry, All sold out!', 'woocommerce');
    }

    return $availability;
}
add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);


/**
 * WISH LIST 
 */
// function woocommerce_wishlist_action() { 
//     global $wishlists;
//     $wishlists -> add_wishlist_form();
//     $woo_url=  add_query_arg( array('add-to-wishlist-itemid' => $product->id), $product->add_to_cart_url() );
//     $woo_value=  esc_attr( $product->id );
//     $woo_button= $wishlists->add_to_wishlist_button();
    
//     $woodmart_wishlist =<<<FORM
// <form class="cart" method="post" enctype='multipart/form-data' action="{$woo_url}">
// <input type="hidden" name="add-to-cart" value="{$woo_value}" />
// {$woo_button}
// </form>
// FORM;

//   return $woodmart_wishlist;
// };     



/**
 * Filter Search ajax
 */
function woodpress_form_field(){
    $woodpress_data_filter = sanitize_text_field($_POST['woodpress_data_filter']);

    if(check_ajax_referer( "form_field", "woodpress_data_nonce" )){
       $trim_woodpress_data_filter = substr($woodpress_data_filter, 1, strlen($woodpress_data_filter) - 1);

    //    echo $trim_woodpress_data_filter;

       if(class_exists('woocommerce')):

        $args = array(
            // 'posts_per_page' => '12',
            'product_cat' =>  $trim_woodpress_data_filter,
            'post_type' => 'product',
            
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
                global $product;

                $id = $loop->post->ID;
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), array('220','220'), true);
                $sale_price = $product->get_price();
        ?>

    <div class="col-lg-3 col-md-4 col-sm-6 <?php echo $trim_woodpress_data_filter ?>">
        <div class="featured__item">
            <div class="featured__item__pic set-bg">
                <img src="<?php echo $image[0]; ?>" alt="NOT FOUND">
                <ul class="featured__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="featured__item__text">
                <h6><a href="<?php echo get_permalink()?>"><?php echo esc_html(get_the_title()); ?></a></h6>
                <h5><?php echo get_woocommerce_currency_symbol() . $sale_price.".00"; ?></h5>
            </div>
        </div>
    </div>
    <?php
    endwhile;
        wp_reset_query();
    ?>

    <?php endif;?>
    <?php
      
    }else{
        echo "<h6> Nothing Found </h6>";
    }


    die();
}

add_action("wp_ajax_form_field", "woodpress_form_field"); 
add_action("wp_ajax_nopriv_form_field", "woodpress_form_field");


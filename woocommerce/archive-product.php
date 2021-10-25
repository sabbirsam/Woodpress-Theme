<?php

defined('ABSPATH') || exit;

get_header('shop');

?>

<?php get_template_part("template-parts/common/breadcrumb-section");?>
<!-- Breadcrumb Section End -->

<section class="product spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-5">
                <?php
                
                // get_sidebar();
                do_action('woocommerce_sidebar');
                
                ?>

            </div>

            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">

                            <?php 
                             $args = array(
                                'post_type'      => 'product',
                                'posts_per_page' => 8,
                                'meta_query'     => array(
                                        'relation' => 'OR',
                                        array( // Simple products type
                                            'key'           => '_sale_price',
                                            'value'         => 0,
                                            'compare'       => '>',
                                            'type'          => 'numeric'
                                        ),
                                        array( // Variable products type
                                            'key'           => '_min_variation_sale_price',
                                            'value'         => 0,
                                            'compare'       => '>',
                                            'type'          => 'numeric'
                                        )
                                    )
                            );
                            $loop = new WP_Query( $args );

                            while ( $loop->have_posts() ) : $loop->the_post();
								global $product;

                                
                                $id = $loop->post->ID;
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), array('220','220'), true );
                                
                                $sale_price = $product->get_price();
                                $regular_price = $product->get_regular_price();

                                $saving_price = wc_price( $regular_price - $sale_price );
                
                            ?>
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="<?php echo $image[0]; ?>">
                                        <div class="product__discount__percent">-<?php echo $saving_price; ?></div>


                                        <?php 
                                            echo apply_filters(
                                                'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
                                                sprintf(
                                                    '<ul class="product__item__pic__hover">
                                                        <li><a href="%s" data-quantity="%s"> <i class="fa fa-shopping-cart"></i></a></li>
                                                        <li><a href="" data-quantity=""> <i class="fa fa-retweet"></i></a></li>
                                                        <li><a href="" data-quantity=""> <i class="fa fa-heart"></i></a></li> 
                                                    </ul>',
                                                    
                                                    esc_url( $product->add_to_cart_url() ),
                                                    esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 )
                                                    
                                                ),
                                                $product,
                                                $args
                                            );
                                            ?>


                                    </div>
                                    <div class="product__discount__item__text">
                                        <!-- <span>Dried Fruit</span> -->
                                        <h5><a
                                                href="<?php echo get_permalink()?>"><?php echo esc_html( get_the_title() ); ?></a>
                                        </h5>
                                        <div class="product__item__price">
                                            
                                            <?php echo get_woocommerce_currency_symbol() . $sale_price.".00"; ?><span><?php echo get_woocommerce_currency_symbol(). $product->get_regular_price(). ".00"; ?></span>
                        
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
							endwhile;
							wp_reset_query();
						    ?>
                        </div>
                    </div>
                </div>

                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By<?php woocommerce_catalog_ordering(); ?></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><?php woocommerce_result_count(); ?></h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>     
<?php

if ( woocommerce_product_loop() ) {

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
    
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );



?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php

get_footer('shop');

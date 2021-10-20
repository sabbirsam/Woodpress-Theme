<?php
echo "Shop page ";

 get_header();
?>
<!-- header end  -->
<?php get_template_part( "template-parts/common/breadcrumb-section" );?>

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <?php get_sidebar(); ?>
                </div>
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
                                                    esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                                                    
                                                ),
                                                $product,
                                                $args
                                            );
                                            ?>
                                        <!-- <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul> -->

                                    </div>
                                    <div class="product__discount__item__text">
                                        <!-- <span>Dried Fruit</span> -->
                                        <h5><a
                                                href="<?php echo get_permalink()?>"><?php echo esc_html( get_the_title() ); ?></a>
                                        </h5>
                                        <div class="product__item__price">
                                            <?php echo "$". $sale_price.".00"; ?><span><?php echo "$". $product->get_regular_price(). ".00"; ?></span>
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
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>16</span> Products found</h6>
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
                <div class="row">
                 
                    <?php echo do_shortcode( '[products per_page="12" columns="3" paginate="true"]' ); ?>
                    


                    <!-- <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?php echo get_template_directory_uri();?>/assets/img/product/product-12.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Crab Pool Security</a></h6>
                                    <h5>$30.00</h5>
                                </div>
                            </div>
                        </div> -->

                </div>
                <!-- <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

<?php get_footer(); ?>
<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">

                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">

                        <?php 
                            
                                $args = array(
                                    'post_type'             => 'product',               
                                    'post_status'           => 'publish',
                                    'ignore_sticky_posts'   => 1,
                                                'orderby'   => 'date',
                                                'order'     => 'desc'
                            );
                            $loop = new WP_Query( $args );

                            while ( $loop->have_posts() ) : $loop->the_post();
                                global $product;

                                
                                $id = $loop->post->ID;
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), array('220','220'), true );
                                
                                $sale_price = $product->get_price();
                            
                            ?>

                        <div class="latest-prdouct__slider__item">

                            <a href="<?php echo get_permalink()?>" class="latest-product__item">
                                <div class="latest-product__item__pic">

                                    <img src="<?php echo $image[0]; ?>">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?php echo esc_html( get_the_title() ); ?></h6>
                                    <span><?php echo get_woocommerce_currency_symbol() . $sale_price.".00"; ?></span>
                                </div>
                            </a>

                            <!-- <a href="<?php echo get_permalink()?>" class="latest-product__item">
                                <div class="latest-product__item__pic">

                                    <img src="<?php echo $image[0]; ?>">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?php echo esc_html( get_the_title() ); ?></h6>
                                    <span><?php echo get_woocommerce_currency_symbol() . $sale_price.".00"; ?></span>
                                </div>
                            </a>

                            <a href="<?php echo get_permalink()?>" class="latest-product__item">
                                <div class="latest-product__item__pic">

                                    <img src="<?php echo $image[0]; ?>">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?php echo esc_html( get_the_title() ); ?></h6>
                                    <span><?php echo get_woocommerce_currency_symbol() . $sale_price.".00"; ?></span>
                                </div>
                            </a> -->

                        </div>

                        <?php
                                endwhile;
                                wp_reset_query();
                                ?>

                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">

                        <?php 
                            
                                $args = array(
                                    'post_type'             => 'product',               
                                    'post_status'           => 'publish',
                                    'ignore_sticky_posts'   => 1,
                                    'meta_key'              => 'total_sales',
                                    'orderby'               => 'meta_value_num',
                                    'order'                 => 'DESC',
                            );
                            $loop = new WP_Query( $args );

                            while ( $loop->have_posts() ) : $loop->the_post();
                                global $product;

                                
                                $id = $loop->post->ID;
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), array('220','220'), true );
                                
                                $sale_price = $product->get_price();
                            
                            ?>

                        <div class="latest-prdouct__slider__item">

                            <a href="<?php echo get_permalink()?>" class="latest-product__item">
                                <div class="latest-product__item__pic">

                                    <img src="<?php echo $image[0]; ?>">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?php echo esc_html( get_the_title() ); ?></h6>
                                    <span><?php echo get_woocommerce_currency_symbol() . $sale_price.".00"; ?></span>
                                </div>
                            </a>

                        

                        </div>

                        <?php
                                endwhile;
                                wp_reset_query();
                                ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">

                        <?php 
                            
                                $args = array(
                                    'post_type'             => 'product',               
                                    'post_status'           => 'publish',
                                    'ignore_sticky_posts'   => 1,
                                                'orderby'   => 'date',
                                                'order'     => 'desc'
                            );
                            $loop = new WP_Query( $args );

                            while ( $loop->have_posts() ) : $loop->the_post();
                                global $product;

                                
                                $id = $loop->post->ID;
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), array('220','220'), true );
                                
                                $sale_price = $product->get_price();
                            
                            ?>

                        <div class="latest-prdouct__slider__item">

                            <a href="<?php echo get_permalink()?>" class="latest-product__item">
                                <div class="latest-product__item__pic">

                                    <img src="<?php echo $image[0]; ?>">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?php echo esc_html( get_the_title() ); ?></h6>
                                    <span><?php echo get_woocommerce_currency_symbol() . $sale_price.".00"; ?></span>
                                </div>
                            </a>

                            <!-- <a href="<?php echo get_permalink()?>" class="latest-product__item">
                                <div class="latest-product__item__pic">

                                    <img src="<?php echo $image[0]; ?>">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?php echo esc_html( get_the_title() ); ?></h6>
                                    <span><?php echo get_woocommerce_currency_symbol() . $sale_price.".00"; ?></span>
                                </div>
                            </a> -->

                           

                        </div>

                        <?php
                                endwhile;
                                wp_reset_query();
                                ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
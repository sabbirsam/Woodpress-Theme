<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>

                    <?php 
                            if(class_exists('woocommerce')):
                            $orderby = 'name';
                            $order = 'asc';
                            $hide_empty = false ;
                            $cat_args = array(
                                'orderby'    => $orderby,
                                'order'      => $order,
                                'hide_empty' => $hide_empty,
                            );

                            $product_categories = get_terms( 'product_cat', $cat_args );
                            if( !empty($product_categories) ):

                            ?>
                    <ul>
                        <?php foreach ($product_categories as $key => $category) :  ?>
                        <li><a
                                href="<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; endif;  ?>

                </div>
            </div>

            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                <?php _e( "All Categories", "woodpress")?>
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="<?php _e( "What do yo u need?", "woodpress")?>">
                            <button type="submit" class="site-btn"><?php _e( "SEARCH", "woodpress")?></button>
                        </form>
                    </div>
                    
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5><?php echo get_theme_mod( 'woodpress_header_phone_number', __( '+65 11.188.888', 'woodpress' ) ) ?>
                            </h5>
                            <span><?php echo get_theme_mod( 'woodpress_header_support_text', __( 'support 24/7 time', 'woodpress' ) ) ?></span>
                        </div>
                    </div>
                </div>
            </div>
</section>
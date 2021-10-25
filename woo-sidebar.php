<div class="sidebar">

    <div class="sidebar__item">
        <h4><?php _e("Department", "woodpress")?></h4>
        <?php
            if (class_exists('woocommerce')):
            $orderby = 'name';
            $order = 'asc';
            $hide_empty = false ;
            $cat_args = array(
                           
                'orderby'    => $orderby,
                'order'      => $order,
                'hide_empty' => $hide_empty,
                         
                            
            );

            $product_categories = get_terms('product_cat', $cat_args);
            if (!empty($product_categories)):

        ?>

        <ul>
            <?php foreach ($product_categories as $key => $category) :  ?>
            <li><a href="<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; endif;  ?>
    </div>



    <div class="sidebar__item">
        <?php

    if (is_active_sidebar("woocommerce_list")) {
        dynamic_sidebar("woocommerce_list");
    }

    ?>
    </div>

    <!-- <div class="sidebar__item">
        <h4>Price</h4>
        <div class="price-range-wrap">
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                data-min="10" data-max="540">
                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
            </div>
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount">
                    <input type="text" id="maxamount">
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar__item sidebar__item__color--option">
        <h4>Colors</h4>
        <div class="sidebar__item__color sidebar__item__color--white">
            <label for="white">
                White
                <input type="radio" id="white">
            </label>
        </div>
        <div class="sidebar__item__color sidebar__item__color--gray">
            <label for="gray">
                Gray
                <input type="radio" id="gray">
            </label>
        </div>
        <div class="sidebar__item__color sidebar__item__color--red">
            <label for="red">
                Red
                <input type="radio" id="red">
            </label>
        </div>
        <div class="sidebar__item__color sidebar__item__color--black">
            <label for="black">
                Black
                <input type="radio" id="black">
            </label>
        </div>
        <div class="sidebar__item__color sidebar__item__color--blue">
            <label for="blue">
                Blue
                <input type="radio" id="blue">
            </label>
        </div>
        <div class="sidebar__item__color sidebar__item__color--green">
            <label for="green">
                Green
                <input type="radio" id="green">
            </label>
        </div>
    </div>
    <div class="sidebar__item">
        <h4>Popular Size</h4>
        <div class="sidebar__item__size">
            <label for="large">
                Large
                <input type="radio" id="large">
            </label>
        </div>
        <div class="sidebar__item__size">
            <label for="medium">
                Medium
                <input type="radio" id="medium">
            </label>
        </div>
        <div class="sidebar__item__size">
            <label for="small">
                Small
                <input type="radio" id="small">
            </label>
        </div>
        <div class="sidebar__item__size">
            <label for="tiny">
                Tiny
                <input type="radio" id="tiny">
            </label>
        </div>
    </div> -->

    <div class="sidebar__item">
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





                </div>

                <?php
                    endwhile;
                    wp_reset_query();
                    ?>

            </div>
        </div>
    </div>

</div>
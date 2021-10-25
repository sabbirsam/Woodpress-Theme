<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Choose Desired Category</h2>
                </div>
                <div class="featured__controls">
                    <?php
                            wp_nonce_field( "form_field", "fr" ) ; //action name =form_field
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

                        <li class="active" data-filter="*">All</li>

                        <?php foreach ($product_categories as $key => $category) :  ?>


                        <li data-filter=".<?php echo esc_attr( $category->name ); ?>">
                            <?php echo esc_html( $category->name ); ?></li>
                        <?php endforeach; ?>

                    </ul>
                    <?php endif; endif;  ?>
                </div>
            </div>
        </div>

        <div class="row featured__filter" id="woodpress_featured__filter">


            <!-- here ajax call generate  -->

        </div>
    </div>
</section>



<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Some Listed Product</h2>
                </div>
                <div class="featured__controls">
                    <h5>PRODUCT</h5>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <div class="featured__item">

                <?php echo do_shortcode( '[products column=4]' ); ?>

            </div>
        </div>
    </div>

</section>
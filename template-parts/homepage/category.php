<!-- Categories Section Begin -->

<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">


                <?php
                        $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 20,
            
                    );
                    $loop = new WP_Query($args);

                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;

                        $id = $loop->post->ID;
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), array('220','220'), true);
                
                ?>

                <div class="col-lg-3">

                    <div class="categories__item set-bg" data-setbg="<?php echo $image[0]; ?>">
                        <h5><a href="<?php echo get_permalink()?>"><?php echo esc_html(get_the_title()); ?></a></h5>
                    </div>
                </div>

                <?php
                endwhile;
                 wp_reset_query();
                ?>


            </div>
        </div>
    </div>
</section>
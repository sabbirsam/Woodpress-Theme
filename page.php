<?php get_header(); 

 get_template_part( "template-parts/common/breadcrumb-section" );?>
<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">

            <?php if(have_posts()):?>

            <?php while(have_posts()): the_post();?>
            
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <!-- <img src="img/blog/blog-6.jpg" alt=""> -->
                        <?php if ( has_post_thumbnail() ):?>

                        <?php echo esc_url( the_post_thumbnail('woodpress-home-square')) ?>
                        <?php endif; ?>
                    </div>


                    <div class="blog__details__text">
                       
                       <?php the_post_thumbnail("large");?>
                       <?php the_content(); ?>
                   </div>

                </div>
            </div>
            <?php endwhile; ?>

            <?php endif; ?>

        </div>
    </div>

    </div>
    </div>
</section>
<?php

 get_footer(); 


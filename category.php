
<?php get_header(); ?>
    <!-- header end  -->
    <?php get_template_part( "template-parts/common/breadcrumb-section" );?>
      <!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                    <?php if(have_posts()):?>

                    <?php while(have_posts()): the_post();?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic category_image">
                                    <!-- <img src="img/blog/blog-6.jpg" alt=""> -->
                                    <?php if ( has_post_thumbnail() ):?>

                                        <?php echo esc_url( the_post_thumbnail('woodpress-home-square')) ?>
                                    <?php endif; ?>
                                </div>

                               
                                <div class="blog__item__text">
                                    
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> <?php echo esc_html(get_the_date()) ; ?></li>
                                        <li><i class="fa fa-comment-o"></i> 
                                        <?php 
                                        
                                            $woodpress_cn= get_comments_number();

                                            if ($woodpress_cn<=1) {
                                                echo $woodpress_cn." ".__("Comment", "philosophy");
                                            } else {
                                                echo $woodpress_cn." ".__("Comments", "philosophy");
                                            }
                                        ?></li>
                                    </ul>
                                    <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                    <p> <?php the_excerpt();?> </p>
                                    <a href="<?php the_permalink();?>" class="blog__btn"><?php _e( "READ MORE", "woodpress" )?><span class="arrow_right"></span></a>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <?php endwhile; ?>
                        
                        <?php endif; ?>

                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                            
                               <?php $args = array(
                                'base'               => '%_%',
                                'format'             => '?paged=%#%',
                                'total'              => 1,
                                'current'            => 0,
                                'show_all'           => false,
                                'end_size'           => 1,
                                'mid_size'           => 2,
                                'add_args'           => false,
                                'add_fragment'       => '',
                                'before_page_number' => '',
                                'after_page_number'  => ''); ?>

                                <!-- Put this where you want the paginate_links to appear -->
                                <?php echo paginate_links( array(

                                    'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
                                    'next_text' => '<i class="fa fa-long-arrow-right"></i>',

                                    )); 
                                
                                ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
  
    
<?php get_footer(); ?>


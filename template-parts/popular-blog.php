<?php
$woodpress_popular_post = new WP_Query(array(
    'posts_per_page' => 6,
    'ignore_sticky_posts'=>1,
    'orderby'=>"comment_count",
));

?>
<!-- Related Blog Section Begin -->
<section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2><?php _e( "Post You May Like", "woodpress" )?></h2>
                    </div>
                </div>
            </div>
            <div class="row"> 
                <?php 
                
                while ($woodpress_popular_post->have_posts()):
                    $woodpress_popular_post->the_post(); ?>

                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                        <?php the_post_thumbnail('woodpress-popular-square'); ?>
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i><?php  echo esc_html(get_the_date()) ;?> </li>
                                <li><i class="fa fa-comment-o"></i>
                            
                                    <?php 
                                    $woodpress_cn= get_comments_number();

                                    if ($woodpress_cn<=1) {
                                        echo $woodpress_cn." ".__("Comment", "woodpress");
                                    } else {
                                        echo $woodpress_cn." ".__("Comments", "woodpress");
                                    }
                                    ?>

                                </li>
                            </ul>
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p><?php the_excerpt();?> </p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                
            </div>
        </div>
    </section>
<section class="blog-details-hero set-bg" data-setbg="<?php echo get_template_directory_uri();?>/assets/img/blog/details/details-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2><?php the_title();?></h2>
                        <ul>
                            <li>By <?php the_author_meta('display_name', 1);  ?></li>
                            <li><?php echo esc_html(get_the_date()) ; ?></li>
                            <li>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
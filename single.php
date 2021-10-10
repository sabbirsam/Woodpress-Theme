
<?php 
the_post();

get_header(); ?>
    <!-- header end  -->
    <?php get_template_part( "template-parts/common/single-page-breadcrumb-section" );?>
      <!-- Breadcrumb Section End -->


      <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                    <!-- get_template_part( "sidebar" ); -->
                    <?php get_sidebar(); ?>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                       
                        <?php the_post_thumbnail("large");?>

                        <?php the_content(); ?>
                    </div>
                    
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                       
                                       <?php echo get_avatar(get_the_author_meta("ID"));?>
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6><?php the_author_meta('display_name', 1);?></h6>
                                        <span><?php the_author_meta('description');?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span><?php _e( "Categories:", "woodpress" ); ?></span> <?php the_category( " "); ?></li>
                                        <li><span><?php _e( "Tags:", "woodpress" )?></span> <?php the_tags(""," ",""); ?></li>
                                    </ul>

                                    <div class="blog__details__social">
                                        <?php 
                                        $woodpress_author_facebook=get_field("facebook", "user_".get_the_author_meta("ID"));
                                        $woodpress_author_twitter=get_field("twitter", "user_".get_the_author_meta("ID"));
                                        $woodpress_author_instagram=get_field("instagram", "user_".get_the_author_meta("ID"));
                                       
                                        ?>
                                        
                                        <?php if($woodpress_author_facebook) :?>
                                        <a href="<?php echo esc_url( $woodpress_author_facebook); ?>"><i class="fa fa-facebook"></i></a>
                                        <?php endif; ?>

                                        <?php if($woodpress_author_twitter) :?>
                                        <a href="<?php echo esc_url( $woodpress_author_twitter); ?>"><i class="fa fa-twitter"></i></a>
                                        <?php endif; ?>

                                        <?php if($woodpress_author_instagram) :?>
                                        <a href="<?php echo esc_url( $woodpress_author_instagram); ?>"><i class="fa fa-instagram"></i></a>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <?php
    if(! post_password_required()){
        comments_template(); 
    }
    ?>
    <!-- comment template  -->

     <!-- Comment Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>
            
            <?php 
                if (!comments_open()) {
                    _e("Commets are clsoed", "woodpress");
                }
                
                $comments_args = array(
                    // change the title of send button
                    'label_submit'=>'Send',
                    // change the title of the reply section
                    'title_reply'=>'Write a Reply or Comment',
                    // remove "Text or HTML to be displayed after the set of comment fields"
                    'comment_notes_after' => '',
                    // redefine your own textarea (the comment body)
                    'comment_field' => '<div class="message form-field">
                                            <label for="comment">' . _x('Comment', 'noun') . '</label>
                                           
                                            <textarea id="comment" name="comment" class="full-width" placeholder="Your Message" aria-required="true">
                                            </textarea>
                                        </div>',
                );
                
                comment_form($comments_args);
                ?>
        
        </div>
    </div>
    <!-- Comment Form End -->
    
    <?php get_template_part( "template-parts/popular-blog" );?>
    <!-- Related Blog Section End -->

    
<?php get_footer(); ?>
  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                   
                    <div class="breadcrumb__text">
                        <h2><?php _e( "BLOG", "woodpress" )?></h2> 
                        <div class="breadcrumb__option">
                        <?php woocommerce_breadcrumb(); ?>
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
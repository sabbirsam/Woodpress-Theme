<?php 
$defaults = [
    [
      'link_text' => esc_html__( 'fa fa-facebook', 'kirki' ),
          'link_url'  => 'https://www.facebook.com/',
      ],
      [
          'link_text' => esc_html__( 'fa fa-twitter', 'kirki' ),
          'link_url'  => 'https://twitter.com/',
      ],
  ];

  $settings = get_theme_mod( 'woodpress_social_repeater_setting', $defaults ); 

/**
 * Image
 */

$image = get_theme_mod( 'woodpress_footer_payment_image', 'woodpress' );
  
?>
<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <?php 
                        if ( function_exists( 'woodpress_theme_setup' ) ) {
                            the_custom_logo();
                        }
                        ?>
                    </div>
                    <?php 
                       if (is_active_sidebar("footer_address_page")) {
                        dynamic_sidebar("footer_address_page");
                    }
                       
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <?php 

                       if (is_active_sidebar("footer_useful_link")) {
                        dynamic_sidebar("footer_useful_link");
                    }
                       
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6><?php echo get_theme_mod( 'woodpress_footer_newsletter', __( 'Join Our Newsletter Now', 'woodpress' ) ) ?></h6>
                    <p><?php echo get_theme_mod( 'woodpress_footer_newsletter_slogan', __( 'Get E-mail updates about our latest shop and special offers.', 'woodpress' ) ) ?></p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn"><?php _e( "Subscribe", 'woodpress' )?></button>
                    </form>
                    <div class="footer__widget__social">
                        <?php foreach( $settings as $setting ) : ?>

                        <a href="<?php echo $setting['link_url']; ?>"><i
                                class="<?php echo $setting['link_text']; ?>"></i></a>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p>
                            
                            <?php echo get_theme_mod( 'woodpress_footer_copyright', __( 'Copyright ©2021 All rights reserved | This website is made with  by ₪ sabbir sam', 'woodpress' ) ) ?>
                           
                        </p>
                    </div>
                    <div class="footer__copyright__payment"><img
                            src="<?php echo esc_url( $image );?>" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<?php wp_footer(); ?>


</body>

</html>
<?php 
$banner_one = get_theme_mod( 'woodpress_homepage_banner_image_one', 'woodpress' );
$banner_two = get_theme_mod( 'woodpress_homepage_banner_image_two', 'woodpress' );

if(get_theme_mod( 'woodpress_banner_enable', true )):

?>

<!-- Banner Begin -->
<div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?php  echo esc_url( $banner_one); ?>" alt="banner one">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?php  echo esc_url($banner_two); ?>" alt="banner two">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php 
$image = get_theme_mod( 'woodpress_hero_image_setting_url', 'woodpress' );

if(get_theme_mod( 'woodpress_hero_banner_display', true )):

?>

<div class="hero__item set-bg" data-setbg="<?php echo esc_url( $image );?>">

                        <div class="hero__text">
                            <span><?php echo get_theme_mod( 'woodpress_hero_banner_text', __( 'FRUIT FRESH', 'woodpress' ) ) ?></span>

                            <h2>
                                <?php echo get_theme_mod( 'woodpress_hero_main_text', __( 'Vegetable 100% Organic', 'woodpress' ) ) ?> 
                            
                            <br />
                            
                                <?php echo get_theme_mod( 'woodpress_hero_main_text_2', __( '100% Organic', 'woodpress' ) ) ?>
                            </h2>
                            <p><?php echo get_theme_mod( 'woodpress_hero_bottom_text', __( 'Free Pickup and Delivery Available', 'woodpress' ) ) ?></p>
                            <a href="<?php echo get_theme_mod( 'woodpress_link_setting', __( '#', 'woodpress' ) ) ?>" class="primary-btn"><?php echo get_theme_mod( 'woodpress_hero_button_text', __( 'SHOP NOW', 'woodpress' ) ) ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php endif; ?>
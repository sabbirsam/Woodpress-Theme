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
  
?>

<!DOCTYPE html>
<!-- <html lang=""> -->
<html <?php language_attributes();?>>

<head>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <?php 
                if ( function_exists( 'woodpress_theme_setup' ) ) {
                    the_custom_logo();
                  }
            ?>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>

        <!-- humberger menu  -->
        <?php get_template_part( "template-parts/common/humberger-navigation" );?>

        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <?php foreach( $settings as $setting ) : ?>

            <a href="<?php echo $setting['link_url']; ?>"><i class="<?php echo $setting['link_text']; ?>"></i></a>

            <?php endforeach; ?>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> <?php echo get_theme_mod( 'woodpress_header_top_mail', __( 'hello@colorlib.com', 'woodpress' ) ) ?></li>
                <li><?php echo get_theme_mod( 'woodpress_top_slogan', __( 'Free Shipping for all Order of $89', 'woodpress' ) ) ?></li>
            </ul>
        </div>
    </div>

    <!-- Humberger End -->


    <?php get_template_part( "template-parts/common/top-header" );?>

    <!-- Header Top Header Section End -->



    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>

                        <?php 
                        if(class_exists('woocommerce')):
                        $orderby = 'name';
                        $order = 'asc';
                        $hide_empty = false ;
                        $cat_args = array(
                            'orderby'    => $orderby,
                            'order'      => $order,
                            'hide_empty' => $hide_empty,
                        );

                        $product_categories = get_terms( 'product_cat', $cat_args );
                        if( !empty($product_categories) ):

                        ?>
                        <ul>
                            <?php foreach ($product_categories as $key => $category) :  ?>
                            <li><a href="<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; endif;  ?>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    <?php _e( "All Categories", "woodpress")?>
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="<?php _e( "What do yo u need?", "woodpress")?>">
                                <button type="submit" class="site-btn"><?php _e( "SEARCH", "woodpress")?></button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><?php echo get_theme_mod( 'woodpress_header_phone_number', __( '+65 11.188.888', 'woodpress' ) ) ?>
                                </h5>
                                <span><?php echo get_theme_mod( 'woodpress_header_support_text', __( 'support 24/7 time', 'woodpress' ) ) ?></span>
                            </div>
                        </div>
                    </div>
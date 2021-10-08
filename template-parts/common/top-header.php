<!-- Header Section Begin -->
<!-- Socaial  -->
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
<!-- end   -->
<?php if(get_theme_mod( 'woodpress_Top_enable', true )):?>
    
<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> <?php echo get_theme_mod( 'woodpress_header_top_mail', __( 'hello@colorlib.com', 'woodpress' ) ) ?> </li>
                                <li><?php echo get_theme_mod( 'woodpress_top_slogan', __( 'Free Shipping for all Order of $89', 'woodpress' ) ) ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            
                            <div class="header__top__right__social">
                            <?php foreach( $settings as $setting ) : ?>
                                
                                <a href="<?php echo $setting['link_url']; ?>"><i class="<?php echo $setting['link_text']; ?>"></i></a>

                                <?php endforeach; ?>
                            </div>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">

                <!-- menu  -->
                <?php get_template_part( "template-parts/common/navigation" );?>
                    
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <?php endif; ?>
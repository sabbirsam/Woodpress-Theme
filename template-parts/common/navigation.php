<nav class="header__menu">

    <?php

    // $args = array(
                                    
    // 'theme_location'=> 'headermenu',
    // 'menu_id'=>'headermenu',
    // 'walker' => new WPDocs_Walker_Nav_Menu()


    // );

    // wp_nav_menu($args);

    

    if (has_nav_menu('headermenu')) {

        wp_nav_menu( array(
            'theme_location' => 'headermenu',
            // 'menu_id'=>'headermenu',
            'walker'         => new WPDocs_Walker_Nav_Menu,
        ) );
      }


?>

</nav>
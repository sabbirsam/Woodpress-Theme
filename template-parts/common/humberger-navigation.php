<nav class="humberger__menu__nav mobile-menu">
    <?php

        $args = array(
                                        
            'theme_location'=> 'headermenu',
            'menu_id'=>'headermenu',
            'walker' => new WPDocs_Walker_Nav_Menu()


        );

        wp_nav_menu($args);

    ?>

</nav>
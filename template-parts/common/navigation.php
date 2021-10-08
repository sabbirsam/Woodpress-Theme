<nav class="header__menu">

    <?php

    $args = array(
                                    
    'theme_location'=> 'headermenu',
    'menu_id'=>'headermenu',
    'walker' => new WPDocs_Walker_Nav_Menu()


    );

    wp_nav_menu($args);

?>

</nav>
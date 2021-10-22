<?php get_header(); 
    
if (is_shop()) {

    get_template_part("shop");
    
} else {
    echo "Normal page from Page.php";
     
}

 get_footer(); 

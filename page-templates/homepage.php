<?php
/**
 * Template Name: Woodpress Homepage
 */
?>

<?php get_header(); ?>
    <!-- header end  -->

   <?php get_template_part( "template-parts/homepage/hero-banner")?>
    <!-- Hero Section End -->

    <?php get_template_part( "template-parts/homepage/category")?>
    <!-- Categories Section End -->

    <?php get_template_part( "template-parts/homepage/featured-section")?>
    <!-- Featured Section End -->

    <?php get_template_part( "template-parts/homepage/banner")?>
    
    <!-- Banner End -->

    <?php get_template_part( "template-parts/homepage/three-product-slider")?>
    <!-- Latest Product Section End -->

    <?php get_template_part( "template-parts/homepage/home-blog")?>
    <!-- Blog Section End -->
    
<?php get_footer(); ?>
<?php 
the_post();

get_header(); ?>
<!-- header end  -->
<?php get_template_part( "template-parts/common/single-page-breadcrumb-section" );?>
<!-- Breadcrumb Section End -->


<section class="blog-details spad">
    <div class="container">
        <div class="row">
           
        </div>
    </div>
</section>

<?php get_template_part( "template-parts/popular-blog" );?>
<!-- Related Blog Section End -->


<?php get_footer(); ?>
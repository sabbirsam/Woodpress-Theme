<?php 
if (class_exists('woocommerce') && is_shop() ){
    get_template_part( "woo-sidebar" );
} 
else{
?>

<div class="blog__sidebar">
    <div class="blog__sidebar__search">

        <?php get_search_form();?>
    </div>
    <div class="blog__sidebar__item">
        <h4><?php _e( "Categories", "woodpress")?></h4>

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
            <li><a
                    href="<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name.'('.$category->count.')' ); ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; endif;  ?>
    </div>
    
    <div class="blog__sidebar__item">
        <h4><?php _e( "Recent News", "woodpress")?></h4>
        <div class="blog__sidebar__recent">
            <?php
$args = array(
    'numberposts' => 4,
    'offset' => 0,
    'category' => 0,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish',
    'suppress_filters' => true
);

$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
foreach ($recent_posts as $post ):
?>
            <a href="<?php echo $post["guid"]; ?>" class="blog__sidebar__recent__item">
                <div class="blog__sidebar__recent__item__pic">
                    <?php echo get_the_post_thumbnail( $post["ID"], array( 70, 70) );?>
                </div>
                <div class="blog__sidebar__recent__item__text">
                    <h6><?php echo $post["post_title"]; ?></h6>
                    <span><?php echo $post["post_date"];?></span>
                </div>

                <?php endforeach;  ?>
            </a>
            <?php 
            wp_reset_query();
            ?>

        </div>
    </div>
    <div class="blog__sidebar__item">
        <h4><?php _e( "Search By", "woodpress")?></h4>
        <div class="blog__sidebar__item__tags">
            <?php echo get_the_tag_list();?>
        </div>
    </div>
</div>

<?php
 } ?>
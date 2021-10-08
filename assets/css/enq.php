
<?php
foreach( glob( "*.css" ) as $css ){
    echo "wp_enqueue_style( 'woodpress-{$css}',get_template_directory_uri(). '/assets/css/{$css}',null,'1.0');\n";
}
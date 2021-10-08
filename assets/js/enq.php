
<?php
foreach( glob( "*.js" ) as $js ){
	echo "wp_enqueue_style( 'woodpress-{$js}',get_template_directory_uri(). '/assets/css/{$js}',array('jquery'),'1.0',true);\n";
}
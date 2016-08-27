<?php
/* -----------------------------------*/
/* 		Add Extended Meta Boxes
/* -----------------------------------*/
function pure_extended_options()
{

	 global $meta_boxes;
	if ( !class_exists( 'RW_Meta_Box' ) )
	return;
	

    $prefix = 'acid_';
    
    $meta_box = array(
        'id' => 'pure-extended-options',
        'title'    => 'Pure Extended Options',
        'priority' => 'high',
        'pages'    => array('page', 'post'),
        'fields' => array(
            
            array(
                'name' => 'Sidebar Enabled/Disabled',
                'std' => '',
                'id'   => $prefix . 'blog_sidebar',
                'type' => 'select',
                'options' => array(
                    '0' => ' - - - ' ,
                    '1' => 'Enabled',
                    'false' => "Disabled",
                ),
            ),
        ),
    );
    new RW_Meta_Box( $meta_box );
}
add_action( 'admin_menu', 'pure_extended_options' );
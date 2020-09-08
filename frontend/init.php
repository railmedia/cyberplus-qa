<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$files = array(
    'controllers/config.class.php'     => array( 'CPQA_Config' ),

    'controllers/rest.class.php'       => array( 'CPQA_REST' ),

    'views/shortcodes.views.class.php' => array(),
    'controllers/shortcodes.class.php' => array( 'CPQA_Shortcodes' )
);
foreach( $files as $file => $init ) {
    require_once( $file );
    if( $init ) {
        foreach( $init as $init )
            new $init;
    }
}
?>

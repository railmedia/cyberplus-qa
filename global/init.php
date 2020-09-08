<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$files = array(
    'controllers/cpt.class.php' => array( 'CPQA_CPT' )
);
foreach( $files as $file => $init ) {
    require_once( $file );
    if( $init ) {
        foreach( $init as $init )
            new $init;
    }
}
?>

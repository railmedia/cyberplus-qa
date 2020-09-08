<?php
class CPQA_Config {

    function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
    }

    function scripts() {
        wp_register_style( 'cpqa-css', CPQAURL . 'frontend/assets/css/qa.css' );
        wp_register_script( 'cpqa-js', CPQAURL . 'frontend/assets/js/qa.js', array('jquery'), null, true );
        wp_localize_script( 'cpqa-js', 'cpqa', array(
            'nonce' => wp_create_nonce('wp_rest')
        ) );
    }

}
?>

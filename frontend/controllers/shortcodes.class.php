<?php
class CPQA_Shortcodes {

    private $views;

    function __construct() {
        $this->views = new CPQA_Shortcodes_Views;
        add_shortcode( 'cyberplus_qa', array( $this, 'q_a' ) );
    }

    function q_a( $atts, $content = null ) {

        $a = shortcode_atts( array(
            'type' => 'form'
        ), $atts );

        wp_enqueue_style( 'cpqa-css' );
        wp_enqueue_script( 'jquery-ui-accordion' );
        wp_enqueue_script( 'cpqa-js' );

        $qa = new WP_Query( array( 'post_type' => 'q_and_a', 'posts_per_page' => 999 ) );
        if( $qa->post_count ) {
            $data = array(
                'qa'   => $qa->posts,
                'type' => $a['type']
            );
            return $this->views->q_a( $data );
        }

        return 'test';

    }

}
?>

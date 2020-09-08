<?php
class CPQA_CPT {

    function __construct() {
        add_action( 'init', array( $this, 'cpt' ) );
    }

    function cpt() {

        $labels = array(
            'name'                  => __( 'Q&A', 'cpqa' ),
            'singular_name'         => __( 'Q&A', 'cpqa' ),
            'menu_name'             => __( 'Q&A', 'cpqa' ),
            'name_admin_bar'        => __( 'Q&A', 'cpqa' ),
            'add_new'               => __( 'Add New', 'cpqa' ),
            'add_new_item'          => __( 'Add New Q&A', 'cpqa' ),
            'new_item'              => __( 'New Q&A', 'cpqa' ),
            'edit_item'             => __( 'Edit Q&A', 'cpqa' ),
            'view_item'             => __( 'View Q&A', 'cpqa' ),
            'all_items'             => __( 'All Q&A', 'cpqa' ),
            'search_items'          => __( 'Search Q&A', 'cpqa' ),
            'parent_item_colon'     => __( 'Parent Q&A', 'cpqa' ),
            'not_found'             => __( 'No Q&A found.', 'cpqa' ),
            'not_found_in_trash'    => __( 'No Q&A found in Trash.', 'cpqa' )
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'q-and-a' ),
            'capability_type'    => 'page',
            'has_archive'        => true,
            'hierarchical'       => true,
            'menu_icon'          => 'dashicons-editor-help',
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor' ),
        );

        register_post_type( 'q_and_a', $args );

    }

}
?>

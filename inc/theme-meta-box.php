<?php

/* add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style() {
   
        wp_enqueue_style( 'kids-meta-box', get_template_directory_uri() . '/assets/css/kids-meta.css' );
} */

add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {
    $meta_boxes[] = [
        'title'      => 'Image Gallery',
        'post_types' => 'ed_program',
        'class' => 'kids-meta-box',
        'fields'     => [
            
            [
                'name'          => '',
                'id'            => 'image-gallery',
                'type'          => 'image_advanced',
            ],
        ],
    ];

    // Add more field groups if you want
    // $meta_boxes[] = ...

    return $meta_boxes;
} );
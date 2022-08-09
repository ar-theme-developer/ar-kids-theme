<?php

    //add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo', array(
        'height' => 200,
        'width'  => 60,
    ) );
    add_image_size( 'single-image', 770, 450, true );
    add_action( 'after_setup_theme', 'kids_theme_setup' );

    function kids_theme_setup() {

        load_theme_textdomain( 'ar', get_template_directory() . '/languages' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
        add_theme_support( 'woocommerce' );
        global $content_width;
        if ( !isset( $content_width ) ) { $content_width = 1920; }
        register_nav_menus( 
            array( 
                'main-menu' => esc_html__( 'Primary Menu', 'kids_theme' ),
                'second-menu' => esc_html__( 'Second Menu', 'kids_theme' ) 
                ) 
            );
    }

    add_action( 'wp_enqueue_scripts', 'kids_theme_enqueue' );

    function kids_theme_enqueue() {
        wp_enqueue_style( 'kids-theme-style-main', get_stylesheet_uri() );
        wp_enqueue_style( 'kids-theme-style', get_template_directory_uri() . '/assets/css/style.css', array(), 1.5 );
        wp_enqueue_script( 'jquery' );
    
        wp_enqueue_script( 'jquery-min',  get_template_directory_uri() . '/assets/js/jquery-3.2.1.min.js', array('jquery'), 1.5 );
        wp_enqueue_script( 'owl-carousel-min',  get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), 1.5 );
        wp_enqueue_script( 'owl-carousel-thumbs-min',  get_template_directory_uri() . '/assets/js/owl.carousel2.thumbs.min.js', array('jquery'), 1.5 );
        //wp_enqueue_script( 'kids-wow-min', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), 1.5 );
        wp_enqueue_script( 'kids-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), 1.5 );
        //wp_enqueue_script( 'wpb_slidepanel', get_template_directory_uri() . '/assets/js/slidepanel.js', array('jquery'), '20160909', true );
    }

    add_action( 'wp_footer', 'kids_theme_footer' );

    function kids_theme_footer() {}


    if ( !function_exists( 'kids_theme_wp_body_open' ) ) {

        function kids_theme_wp_body_open() {

            do_action( 'wp_body_open' );

        }

    }

    add_action( 'wp_body_open', 'kids_theme_skip_link', 5 );

    function kids_theme_skip_link() {

        echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'kids_theme' ) . '</a>';

    }

    /**
    * Customizer additions.
    */
    require_once get_template_directory() . '/inc/customizer.php';
    require_once get_template_directory() . '/inc/theme-functions.php';
    require_once get_template_directory() . '/inc/theme-meta-box.php';
    require_once get_template_directory() . '/inc/kids-functions.php';

    add_action( 'widgets_init', 'kids_theme_widgets_init' );

    function kids_theme_widgets_init() {

        register_sidebar( array(

            'name' => esc_html__( 'Sidebar Widget Area', 'kids_theme' ),
            'id' => 'primary-widget-area',
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',

            ) 
        );
        register_sidebar( array(

            'name' => esc_html__( 'Education Program Widgets', 'kids_theme' ),
            'id' => 'education-program-widget-area',
            'before_widget' => '<div id="%1$s" class="program-information widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',

            ) 
        );
        register_sidebar( array(

            'name' => esc_html__( 'Footer First Widget', 'kids_theme' ),
            'id' => 'footer-first',
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',

            ) 
        );
        register_sidebar( array(

            'name' => esc_html__( 'Footer Second Widget', 'kids_theme' ),
            'id' => 'footer-second',
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',

            ) 
        );
        register_sidebar( array(

            'name' => esc_html__( 'Footer Third Widget', 'kids_theme' ),
            'id' => 'footer-third',
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',

            ) 
        );
        register_sidebar( array(

            'name' => esc_html__( 'Footer Fourth Widget', 'kids_theme' ),
            'id' => 'footer-fourth',
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',

            ) 
        );

        }

        add_action( 'wp_head', 'kids_theme_pingback_header' );

        function kids_theme_pingback_header() {

            if ( is_singular() && pings_open() ) {

                printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
            }
        }

        //Excerpt Lenght
        add_filter( 'excerpt_more', '__return_empty_string' );
        function my_excerpt_length($length){
            return 15 . '..';
            }
        add_filter('excerpt_length', 'my_excerpt_length');
/* 
        //Register Meta box
add_action( 'add_meta_boxes', function() {
    add_meta_box( 'wpdocs-id', 'Testimonial Info', 'wpdocs_field_cb', 'testimonial', 'normal' );
} );
 
//Meta callback function
function wpdocs_field_cb( $post ) {
    $wpdocs_meta_val = get_post_meta( $post->ID, 'wpdocs-meta-name', true );
    $wpdocs_rating_val = get_post_meta( $post->ID, 'wpdocs-rating', true );
    ?>
    <div class="testimonial-admin-info" style="padding-bottom:15px">
        <lable>Parents Info</lable>
        <input type="text" name="wpdocs-meta-name" value="<?php echo esc_attr( $wpdocs_meta_val ) ?>">
    </div>
    <div>
        <lable>Rating 1 to 5</lable>
        <input type="number" name="wpdocs-rating" value="<?php echo esc_attr( $wpdocs_rating_val ) ?>">
    </div>
    <?php
}
 
//save meta value with save post hook
add_action( 'save_post', function( $post_id ) {
    if ( isset( $_POST['wpdocs-meta-name'] ) ) {
        update_post_meta( $post_id, 'wpdocs-meta-name', $_POST['wpdocs-meta-name'] );
    }
    if ( isset( $_POST['wpdocs-rating'] ) ) {
        update_post_meta( $post_id, 'wpdocs-rating', $_POST['wpdocs-rating'] );
    }
} );
 
// show meta value after post content
add_filter( 'the_content', function( $content ) {
    $meta_val .= get_post_meta( get_the_ID(), 'wpdocs-meta-name', true );
    $meta_val .= get_post_meta( get_the_ID(), 'wpdocs-rating', true );
    return $content . $meta_val;
} ); */

add_image_size( 'thumbnail_teacher', 80, 80, array('center', 'top') );


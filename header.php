<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); 
        $site_name = get_bloginfo( 'name' );
        $tagline   = get_bloginfo( 'description', 'display' );
        $header_nav_menu = wp_nav_menu( [
            'theme_location' => 'main-menu',
            'fallback_cb' => false,
            'echo' => false,
        ] );
    
    ?>

    <div id="wrapper" class="hfeed">
        <header id="header" role="banner">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="top-contact">
                                <span class="address">
                                    <i class="ri-map-pin-line"></i> 
                                    <?php if ( get_theme_mod('top_bar_address')) : 
                                            echo get_theme_mod('top_bar_address'); 
                                            else : 
                                                echo '125 Local Street, New York';
                                        endif; ?>
                                </span>
                                <span class="phone">
                                    <i class="ri-phone-line"></i>
                                    <?php if ( get_theme_mod('top_bar_phone')) : 
                                            echo get_theme_mod('top_bar_phone'); 
                                            else : 
                                                echo '+012 (345) 678';
                                        endif; ?>
                                    
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <ul class="social-media">
                                <li>
                                    <a href="<?php echo get_theme_mod('top_bar_facebook'); ?>">
                                    <i class="ri-facebook-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo get_theme_mod('top_bar_twitter'); ?>">
                                        <i class="ri-twitter-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo get_theme_mod('top_bar_instra'); ?>">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo get_theme_mod('top_bar_youtube'); ?>">
                                        <i class="ri-youtube-line"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <div class="kids-header">
            <div class="container">
                <div class="site-branding">
                    <?php
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } elseif ( $site_name ) {
                        ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'hello-elementor' ); ?>" rel="home">
                                <?php echo esc_html( $site_name ); ?>
                            </a>
                        </h1>
                        <p class="site-description">
                            <?php
                            if ( $tagline ) {
                                echo esc_html( $tagline );
                            }
                            ?>
                        </p>
                    <?php } ?>
                </div>
                <nav class="primary-menu">
                    <?php echo $header_nav_menu; ?>
                </nav>
            </div>
        </div> <!-- ENd Kids Header -->
        </header>
                        
        <div class="mobile-menu">
            <div class="kidsMenu">
                <i class="ri-menu-fill"></i>
                <div class="mobile-logo">
                    <?php
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } elseif ( $site_name ) {
                        ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'hello-elementor' ); ?>" rel="home">
                                <?php echo esc_html( $site_name ); ?>
                            </a>
                        </h1>
                        <p class="site-description">
                            <?php
                            if ( $tagline ) {
                                echo esc_html( $tagline );
                            }
                            ?>
                        </p>
                    <?php } ?>
                </div>
            </div>

            <div id="mobile_menu_panel">
                <i class="close_mobile ri-close-fill"></i>
                <div class="mobile-logo">
                    <?php
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } elseif ( $site_name ) {
                        ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'hello-elementor' ); ?>" rel="home">
                                <?php echo esc_html( $site_name ); ?>
                            </a>
                        </h1>
                        <p class="site-description">
                            <?php
                            if ( $tagline ) {
                                echo esc_html( $tagline );
                            }
                            ?>
                        </p>
                    <?php } ?>
                </div>

                <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'jan', 'menu_class' => 'mobile-nav-menu' ) ); ?>

                <ul class="social-media">
                                <li>
                                    <a href="<?php echo get_theme_mod('top_bar_facebook'); ?>">
                                    <i class="ri-facebook-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo get_theme_mod('top_bar_twitter'); ?>">
                                        <i class="ri-twitter-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo get_theme_mod('top_bar_instra'); ?>">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo get_theme_mod('top_bar_youtube'); ?>">
                                        <i class="ri-youtube-line"></i>
                                    </a>
                                </li>
                </ul>
            </div>
        </div> <!-- Mobile Menu -->

    
    <div id="container">
    <main id="content" role="main">
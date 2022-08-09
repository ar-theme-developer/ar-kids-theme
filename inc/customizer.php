<?php

    add_action( 'customize_register', 'kids_theme_customizer_settings' );

    function kids_theme_customizer_settings( $wp_customize ) {

        //your section
        $wp_customize->add_section( 
            'topbar_customize_slug_section', 
            array(
                'title' => esc_html__( 'Topbar Section', 'theme_slug' ),
                'priority' => 150
            )
        );      
          
                  
    //add setting to your section
        $wp_customize->add_setting( 
            'top_bar_address', 
            array(
                'sanitize_callback' => 'wp_filter_nohtml_kses' //removes all HTML from content
            )
        );
          
        $wp_customize->add_control( 
            'top_bar_address', 
            array(
                'label' => esc_html__( 'Top Address', 'theme_slug' ),
                'section' => 'topbar_customize_slug_section',
                'type' => 'text'
            )
        );      

        //add setting to your section
        $wp_customize->add_setting( 
            'top_bar_phone', 
            array(
                'default' => ''
                //'sanitize_callback' => 'sanitize_email' //removes all invalid characters
            )
        );
          
        $wp_customize->add_control( 
            'top_bar_phone', 
            array(
                'label' => esc_html__( 'Phone', 'theme_slug' ),
                'section' => 'topbar_customize_slug_section',
                'type' => 'text'
            )
        );
        
        //Facebook
        $wp_customize->add_setting( 
            'top_bar_facebook', 
            array(
                'default' => '' //removes all HTML from content
            )
        );
          
        $wp_customize->add_control( 
            'top_bar_facebook', 
            array(
                'label' => esc_html__( 'Facebook Link', 'theme_slug' ),
                'section' => 'topbar_customize_slug_section',
                'type' => 'text'
            )
        );  

        //Twitter 
        $wp_customize->add_setting( 
            'top_bar_twitter', 
            array(
                'default' => '' //removes all HTML from content
            )
        );
          
        $wp_customize->add_control( 
            'top_bar_twitter', 
            array(
                'label' => esc_html__( 'Twitter Link', 'theme_slug' ),
                'section' => 'topbar_customize_slug_section',
                'type' => 'text'
            )
        );  

        // instragram 
        $wp_customize->add_setting( 
            'top_bar_instra', 
            array(
                'default' => '' //removes all HTML from content
            )
        );
          
        $wp_customize->add_control( 
            'top_bar_instra', 
            array(
                'label' => esc_html__( 'Instagram url', 'theme_slug' ),
                'section' => 'topbar_customize_slug_section',
                'type' => 'text'
            )
        );  

        // Youtube 

        $wp_customize->add_setting( 
            'top_bar_youtube', 
            array(
                'default' => '' //removes all HTML from content
            )
        );
          
        $wp_customize->add_control( 
            'top_bar_youtube', 
            array(
                'label' => esc_html__( 'Youtube Link', 'theme_slug' ),
                'section' => 'topbar_customize_slug_section',
                'type' => 'text'
            )
        );  

        /* // ### Test Code
        $colors = array();
        $colors[] = array(
            'slug'=>'content_text_color',
            'default' => '#333',
            'label' => __('Rana Mama Content Text Color', 'Ari')
        );
        
        $colors[] = array(
            'slug'=>'content_link_color',
            'default' => '#88C34B',
            'label' => __('Content Link Color', 'Ari')
        );

        
        foreach( $colors as $color ) {
          // SETTINGS
          $wp_customize->add_setting(
            $color['slug'], array(
                'default' => $color['default'],
                'type' => 'option',
                'capability' => 'edit_theme_options'
                )
            );

            // CONTROLS
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    $color['slug'],
                    array('label' => $color['label'],
                    'section' => 'colors',
                    'settings' => $color['slug'])
                    )
                );
            } */
    // ### Done code
    /* 
    $wp_customize->add_section(
        'demo_section_id',
            array(
                'title'=>'Section section title'
            )
        );
        
        
    $wp_customize->add_setting(
        'demo_setting_id',
            array(
                'default'=>'',
            )
        );

    $wp_customize->add_control(
        'demo_control_id',
        array(
            'slug'=>'abeer_text_color',
            'label'=>'Abeer Control Label',
            'type'=>'text',
            'section'=>'demo_section_id',
            'settings'=>'demo_setting_id',
        )
    );

    $wp_customize->add_control(
        'demo_control_id_abeer',
        array(
            'slug'=>'adeeb_text_color',
            'label'=>'Adeeb Control Label',
            'type'=>'text',
            'section'=>'demo_section_id',
            'settings'=>'demo_setting_id',
        )
    ); */

    }

<?php

/* Inssert New Custom Post */
    function recipes_post_type() {
        register_post_type( 'slider',
            array(
                'labels' => array(
                    'name' => __( 'Sliders' ),
                    'singular_name' => __( 'Slider' )
                ),
                'public' => true,
                'show_in_rest' => true,
            'supports' => array('title', 'thumbnail'),
            'has_archive' => true,
            )
        );
        register_post_type( 'ed_program',
            array(
                'labels' => array(
                    'name' => __( 'Education Programs' ),
                    'singular_name' => __( 'Education Program' )
                ),
                'public' => true,
                'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'has_archive' => true,
            )
        );
        register_post_type( 'teacher',
            array(
                'labels' => array(
                    'name' => __( 'Our Teachers' ),
                    'singular_name' => __( 'Teacher' )
                ),
                'public' => true,
                'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'has_archive' => true,
            )
        );
        register_post_type( 'testimonial',
            array(
                'labels' => array(
                    'name' => __( 'Testimonials' ),
                    'singular_name' => __( 'Testimonial' )
                ),
                'public' => true,
                'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'has_archive' => true,
            )
        );
        register_post_type( 'event',
            array(
                'labels' => array(
                    'name' => __( 'Events' ),
                    'singular_name' => __( 'Event' )
                ),
                'public' => true,
                'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'has_archive' => true,
            )
        );
    }
    add_action( 'init', 'recipes_post_type' );

    /* Add Custom Post Category */

    function create_recipes_taxonomy() {
        register_taxonomy('group','slider',array(
            'hierarchical' => false,
            'labels' => array(
                'name' => _x( 'Groups', 'taxonomy general name' ),
                'singular_name' => _x( 'Group', 'taxonomy singular name' ),
                'menu_name' => __( 'Group' ),
                'all_items' => __( 'All Group' ),
                'edit_item' => __( 'Edit Group' ), 
                'update_item' => __( 'Update Group' ),
                'add_new_item' => __( 'Add Group' ),
                'new_item_name' => __( 'New Group' ),
            ),
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        ));
    }
    add_action( 'init', 'create_recipes_taxonomy', 0 );

    /* Slider Short code */

    function ar_kids_main_slider($atts){

        $default = array(
            'cat' => '',
        );
        $kids_atts = shortcode_atts($default, $atts);
        ob_start();

        $the_query = new WP_Query( array(
            'post_type' => 'slider',
            'tax_query' => array(
                array (
                    'taxonomy' => 'group',
                    'field' => 'slug',
                    'terms' => $kids_atts['cat']
                )
            ),
        ) );
        
        echo '<div class="owl-carousel owl-theme home-slider">';
        
        while ( $the_query->have_posts() ) :
            $the_query->the_post();
            $slide_data = get_field('changed_slider_setting', get_the_id());
            $des = $slide_data['slider_short_description'];
            $img = $slide_data['second_image'];
            $link = $slide_data['button'];
            $text_color = $slide_data['text_color'];
            $image_side = $slide_data['pre_design'];
            
            $item_bg = has_post_thumbnail() ? 'style="background-image:url('.get_the_post_thumbnail_url().');"' : '';

        ?>
            <div class="item" <?php echo $item_bg; ?> >
                <?php /* if(has_post_thumbnail()): ?>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
                <?php endif; */ ?>
                    <div class="item-caption">
                        <div class="item-size <?php echo $image_side; ?>">
                        <?php $rcolor = $text_color ? 'style="color:'.$text_color.'"' : ''; ?>
                            <div class="slider-des" <?php echo $rcolor; ?>>
                                <h2 class="kids-caption animated fadeInDown"  <?php echo $rcolor; ?>><?php the_title(); ?></h2>
                                <div class="kids-caption animated fadeInDown">
                                    <?php 
                                        if($des):
                                            echo $des;
                                        endif;
                                    ?>
                                </div>
                                <div class="slider-read-more kids-caption animated fadeInDown">
                                    <a href="<?php echo $slide_data['button']['url']; ?>">
                                        <?php echo $slide_data['button']['title']; ?>
                                    </a>
                                </div>
                            </div>

                            <div class="kids-second-image animated fadeInRightSmall">
                                <img src="<?php echo $img; ?>" alt="" />
                            </div>
                        </div>
                    </div>
            </div>
        <?php 
        endwhile;
        
        wp_reset_postdata();
        
        echo '</div>'; // End Home Slider ####
        
        return ob_get_clean();
    }
    add_shortcode('main_slider', 'ar_kids_main_slider');

    /* Education Program slider */

    function kids_education_programs($related_post){
        ob_start();
        
       
        echo '<div class="kids-rutine owl-carousel owl-theme theme-default">';
        
        $the_query = new WP_Query( array(
            'post_type' => 'ed_program',
            'post__not_in' => array($related_post)
        ) );
        $color = 1;
        
        while ( $the_query->have_posts() ) :
            $the_query->the_post();
            
            $programs = get_field('education_program_settings', get_the_id());

            $program = $programs['programs_information'];

            $age_of_children = !empty($program['age_of_children']) ? $program['age_of_children'] : '4 - 6' ;
            $total_lesions = !empty($program['total_lesions']) ? $program['total_lesions'] : '20 Class' ;
            $price = !empty($program['price']) ? $program['price'] : '500' ;
            $duration = !empty($program['duration']) ? $program['duration'] : '4 Months' ;

        ?>
            <div class="item">
                <div class="class-routine <?php if($color == 2) echo 'red'; if($color == 3) echo 'blue'; if($color == 4) echo 'green'; ?>">
                    <div class="routine-thumbnail">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('single-image', true); ?></a>
                    </div>
                    <div class="routine-des">
                        <h3 class="kids-rutine-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                            <ul class="rutine-info">
                                <li><i class="ri-calendar-line"></i> <?php  echo $age_of_children; ?> <?php _e('years'); ?></li>
                                <li><i class="ri-book-line"></i> <?php  echo $total_lesions; ?> </li>
                                <li><i class="ri-money-dollar-circle-line"></i> $<?php  echo $price; ?> </li>
                                <li><i class="ri-time-line"></i> <?php  echo $duration; ?></li>
                                
                            </ul>
                        
                    </div>
                </div>
            </div>
        <?php $color++;
        endwhile;
        if($color == 4) $color = 0;
        wp_reset_postdata();
        
        echo '</div>';
        
        return ob_get_clean();
    }

    add_shortcode('kids-education', 'kids_education_programs');

    /* Education Program Single Slider */

    function kids_single_page_education_programs(){
        ob_start();
        //echo get_the_id();

        $images = rwmb_meta( 'image-gallery', ['size' => 'full'], get_the_id() );
        $images_thumbs = rwmb_meta( 'image-gallery', ['size' => 'thumbnail'], get_the_id() );
        //print_r($images);
        ?>
        <div class="education_signle_program owl-carousel" data-slider-id="1">

        <?php 
            foreach ( $images as $full_image ) :
        ?>
            <div class="program-full-image">
                <div class="Duration"></div>
                <img src="<?php echo $full_image['url'] ?>" alt="" />
            </div>

        <?php endforeach; ?>

        </div>

        <div class="owl-thumbs single-program-thumbs" data-slider-id="1">

        <?php 
            foreach ( $images_thumbs as $image ) :
        ?>
            <button class="owl-thumb-item">
              <div class="userimg">
                <img src="<?php echo $image['url'] ?>" alt="" />
              </div>
            </button>

        <?php endforeach; ?>

        </div>

        <?php 
        
        return ob_get_clean();
    }

    /* Our BLog Post Section  */

    function kids_our_most_wanted_blog_post( $atts ){
        ob_start();
        

        $default = array(
            'cat' => '',
        );
        $blog_atts = shortcode_atts($default, $atts);
        
        //print_r($blog_atts);

        $the_query = new WP_Query( array(
            'post_type' => 'post',
            'category_name' => $blog_atts['cat']
            
        ) );


        echo '<div class="latest-blog owl-carousel owl-theme theme-default">';
       

        $color = 1;
        
        while ( $the_query->have_posts() ) :
            $the_query->the_post();
            $program = get_field('programs_information', get_the_id());
        ?>
            <div class="item">
                <div class="blog-post-item">
                    <div class="routine-thumbnail">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('single-image', true); ?></a>
                    </div>
                    <div class="blog-des">
                        <h3 class="blog-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <?php echo kids_meta_info(); ?>
                        <?php the_excerpt(); ?>
                        <div class="blog-read-more">
                            <a href="<?php the_permalink(); ?>"><?php _e('Read more', 'kidstheme'); ?> <i class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php $color++;
        endwhile;
        if($color == 4) $color = 0;
        wp_reset_postdata();

        echo '</div>';

        return ob_get_clean();
    }

    add_shortcode('blog_post', 'kids_our_most_wanted_blog_post');


    /* Testimonial Slider  */

    function kids_very_powerful_testimonial( $atts ){
        ob_start();

        $default = array(
            'limit' => '',
        );
        $blog_atts = shortcode_atts($default, $atts);
        
        //print_r($bloga);

        $the_query = new WP_Query( array(
            'post_type' => 'testimonial'
            
        ) );


        echo '<div class="testimonial owl-carousel owl-theme theme-default">';
       

        $color = 1;
        
        while ( $the_query->have_posts() ) :
            $the_query->the_post();
            
            $rating = get_field('testimonial_information', get_the_id());

            //$program = get_field('programs_information', get_the_id());
            //$rating = get_post_meta(get_the_id(), 'wpdocs-rating', true);
        ?>
            <div class="item">
                <div class="our-testimonial <?php if($color == 2) echo 'red'; if($color == 3) echo 'blue'; if($color == 4) echo 'green'; ?>">
                    <div class="testimonial-thumbnail">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('single-image', true); ?></a>
                    </div>
                    <div class="blog-des">
                        <div class="testimonial-short-des">
                            <?php the_excerpt(); ?>
                        </div>
                        <?php   if( $rating['rating_us'] == 5 ) : echo '<div class="rating-five"><span></span><span></span><span></span><span></span><span></span></div>'; endif;
                                if( $rating['rating_us'] == 4 ) : echo '<div class="rating-five"><span></span><span></span><span></span><span></span><span class="no-rating"></span></div>'; endif;
                                if( $rating['rating_us'] == 3 ) : echo '<div class="rating-five"><span></span><span></span><span></span><span class="no-rating"></span><span class="no-rating"></span></div>'; endif;
                                if( $rating['rating_us'] == 2 ) : echo '<div class="rating-five"><span></span><span></span><span class="no-rating"></span><span class="no-rating"></span><span class="no-rating"></span></div>'; endif;
                                if( $rating['rating_us'] == 1 ) : echo '<div class="rating-five"><span></span><span class="no-rating"></span><span class="no-rating"></span><span class="no-rating"></span><span class="no-rating"></span></div>'; endif; ?>
                        <h3 class="blog-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <h4 class="testimonial-parent-profession"><?php echo $rating['parents_profession']; ?></h4>
                    </div>
                </div>
            </div>
        <?php $color++;
        endwhile;
        if($color == 4) $color = 0;
        wp_reset_postdata();

        echo '</div>';

        return ob_get_clean();
    }

    add_shortcode('kids_testimonial', 'kids_very_powerful_testimonial'); 

    /* Testimonial Slider  */

    function kids_our_teacher( $atts ){
        ob_start();
        

        $default = array(
            'limit' => '',
        );
        $blog_atts = shortcode_atts($default, $atts);
        
        //print_r($bloga);

        $the_query = new WP_Query( array(
            'post_type' => 'teacher'
            
        ) );


        echo '<div class="our-teacher-slider owl-carousel owl-theme theme-default">';
       

        $color = 1;
        
        while ( $the_query->have_posts() ) :
            $the_query->the_post();
            
            $social = get_field('social_links', get_the_id());

            //$program = get_field('programs_information', get_the_id());
            //$rating = get_post_meta(get_the_id(), 'wpdocs-rating', true);
        ?>
            <div class="item">
                <div class="our-teacher-item <?php if($color == 2) echo 'red'; if($color == 3) echo 'blue'; if($color == 4) echo 'green'; if($color == 5) echo 'black'; ?>">
                    <div class="teacher-image">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', true); ?></a>
                    </div>
                    <div class="teacher-data">
                        <h3 class="teacher-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="teacher-sub-title">
                            <?php echo get_field('subject', get_the_id());  ?>
                        </div>
                        <div class="social_media">
                            <ul>
                                <?php if($social['facebook']) : ?>
                                    <li>
                                        <a href="<?php echo $social['facebook']; ?>">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if($social['twitter']) : ?>
                                    <li class="twitter">
                                        <a href="<?php echo $social['twitter']; ?>">
                                            <i class="ri-twitter-fill"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if($social['instagram']) : ?>
                                    <li class="instagram">
                                        <a href="<?php echo $social['instagram']; ?>">
                                            <i class="ri-instagram-line"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if($social['linkedin']) : ?>
                                    <li class="linkedin">
                                        <a href="<?php echo $social['linkedin']; ?>">
                                            <i class="ri-linkedin-fill"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if($social['pinterest']) : ?>
                                    <li class="pinterest">
                                        <a href="<?php echo $social['pinterest']; ?>">
                                            <i class="ri-pinterest-line"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php $color++;
        endwhile;
        if($color == 5) $color = 0;
        wp_reset_postdata();

        echo '</div>';

        return ob_get_clean();
    }

    add_shortcode('our-teacher', 'kids_our_teacher');

    function kids_latest_blog_posts($atts){
        ob_start();

        $default = array(
            'cat' => '',
            'limit' => '3',
        );
        $blog_atts = shortcode_atts($default, $atts);
        
        //print_r($blog_atts);

        $the_query = new WP_Query( array(
            'post_type' => 'post',
            'category_name' => $blog_atts['cat'],
            'posts_per_page' => $blog_atts['limit']
            
        ) );

        ?>
        <div class="kids-latest-blog-widget">
            <ul>
        <?php while ( $the_query->have_posts() ) :
            $the_query->the_post(); 
            $categories = get_the_category();
        ?>
            
                <li>
                    <div class="news-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                    </div>
                    <div class="news-description">
                        <div class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <div class="kids-cat">
                            <?php the_category( ', ' ); ?>
                        </div>
                        <div class="kids-meta">
                            <?php echo kids_meta_info(); ?>
                        </div>
                    </div>
                </li>
            
        <?php endwhile; ?>
            </ul>
        </div>
        <?php
        return ob_get_clean();
    }

    add_shortcode('kids_blog_post', 'kids_latest_blog_posts');


    function kids_meta_info(){
        ob_start();
        ?>
        <div class="blog-meta-info">
            <div class="meta-6">
                <i class="ri-calendar-2-line"></i>
                <?php the_date('d M Y'); ?>
            </div>
            <div class="meta-6">
                <i class="ri-message-3-line"></i>
                <?php echo get_comments_number();
                if(get_comments_number() < 1) {
                    _e( ' comment' );
                } else {
                    _e( ' comments' );
                } ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    function kids_education_programs_information($atts){
        ob_start();
        $default = array(
            'link' => '',
            'link_text' => '',
        );
        $blog_atts = shortcode_atts($default, $atts);
        
        //echo get_the_id();
        $id = get_queried_object_id();
        $programs_information = get_field('education_program_settings', $id);
        $programs = $programs_information['programs_information'];

        $age_of_children = !empty($programs['age_of_children']) ? $programs['age_of_children'] : '4 - 6' ;
        $total_lesions = !empty($programs['total_lesions']) ? $programs['total_lesions'] : '20' ;
        $price = !empty($programs['price']) ? $programs['price'] : '500' ;
        $duration = !empty($programs['duration']) ? $programs['duration'] : '4 Months' ;

        $class_time = !empty($programs['class_time']) ? $programs['class_time'] : '08 - 10 am' ;
        $open_days = !empty($programs['open_days']) ? $programs['open_days'] : 'Sun - Fri' ;
        $total_lesions = !empty($programs['total_lesions']) ? $programs['total_lesions'] : '20' ;
        $language = !empty($programs['language']) ? $programs['language'] : 'English' ;
        $total_seats = !empty($programs['total_seats']) ? $programs['total_seats'] : '21' ;
        //$duration = !empty($programs['duration']) ? $programs['duration'] : '4' ;
        //$duration = !empty($programs['duration']) ? $programs['duration'] : '4' ;

        ?>
        <ul>
                        <li>
                            <i class="ri-money-dollar-circle-line"></i>
                            <?php _e('Course Price'); ?>
                            <span><?php echo $price; ?></span>
                        </li>
                        <li>
                            <i class="ri-calendar-event-line"></i>
                            <?php _e('Age'); ?>
                            <span><?php echo $age_of_children; ?> <?php _e('years'); ?></span>
                        </li>
                        <li>
                            <i class="ri-shield-user-line"></i>
                            <?php _e('Total Seat'); ?>
                            <span><?php echo $total_seats; ?></span>
                        </li>
                        <li>
                            <i class="ri-shield-user-line"></i>
                            <?php _e('Duration'); ?>
                            <span><?php echo $duration; ?></span>
                        </li>
                        <li>
                            <i class="ri-time-line"></i>
                            <?php _e('Class Time'); ?>
                            <span><?php echo $class_time; ?></span>
                        </li>
                        <li>
                            <i class="ri-calendar-2-line"></i>
                            <?php _e('Days'); ?>
                            <span><?php echo $open_days; ?></span>
                        </li>
                        <li>
                            <i class="ri-file-text-line"></i>
                            <?php _e('Lessions'); ?>
                            <span><?php echo $total_lesions; ?></span>
                        </li>
                        <li>
                            <i class="ri-global-line"></i>
                            <?php _e('Language'); ?>
                            <span><?php echo $language; ?></span>
                        </li>
                    </ul>

                    <div class="more">
                        <a href="<?php echo $blog_atts['link']; ?>"><?php echo $blog_atts['link_text']; ?> <i class="ri-arrow-right-line"></i></a>
                    </div>
        <?php 
        return ob_get_clean();
    }
    
    add_shortcode('programs_information', 'kids_education_programs_information');

    function single_related_post(){
        ob_start();
        $id = get_queried_object_id();
        $related_information = get_field('education_program_settings', $id);
        $related = $related_information['related_education_programs'];

        $title = !empty($related['title']) ? $related['title'] : 'We Provide Awesome Program<span>To Build Bright Future</span>' ;
       
        $slider = $related['show_program'];

        $class_time = !empty($related['class_time']) ? $related['class_time'] : '08 - 10 am' ;
        $open_days = !empty($related['open_days']) ? $related['open_days'] : 'Sun - Fri' ;
        $total_lesions = !empty($related['total_lesions']) ? $related['total_lesions'] : '20' ;
        $language = !empty($related['language']) ? $related['language'] : 'English' ;
        $total_seats = !empty($related['total_seats']) ? $related['total_seats'] : '21' ;

    ?>
    <div class="related-education-programs">
        <div class="container">
                <h2 class="title"><?php echo $title; ?></h2>
                <div class="slider-program">
                    <?php echo kids_education_programs($id, $slider); ?>
                </div>
        </div>
    </div>

    <?php
        return ob_get_clean();
    }
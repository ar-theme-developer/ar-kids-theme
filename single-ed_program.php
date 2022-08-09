<?php 
    // Single Program Template

    get_header();
?>
    <div class="single-program">
<?php 
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
        $programs_information = get_field('education_program_settings', get_the_id());
        $header = $programs_information['program_header_section'];
        $programs = $programs_information['programs_information'];
        $tid = $programs['teacher_information'];
        $tlink = get_the_permalink($tid);
        $age_of_children = !empty($programs['age_of_children']) ? $programs['age_of_children'] : '4 - 6';

        $hedear_image = !empty($header['full_image']) ? 'style="background-image:url('. $header['full_image'].');"' : '';
        $hedear_text_color = !empty($header['text_color']) ? 'style="color:'. $header['text_color'].';"' : '';
        //$images = rwmb_meta( 'image-gallery', ['size' => 'full'], get_the_id() );
        //header_text, text_align, header_space
    
    if($header['show_header']) :
    ?>
    <div class="header-section" <?php echo $hedear_image; ?>>
        <div class="container">
            <div class="header-text <?php echo $header['text_align']. ' ' . $header['header_space']; ?>" >
                <h1 <?php echo $hedear_text_color; ?>>
                    <?php if($header['header_text']): echo $header['header_text']; endif; ?>
                </h1>
            </div>
        </div>
    </div>
    <?php  endif; ?>
    
    <div class="single-education-container">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="program-header">
                    <h2 class="program-title"><?php the_title(); ?></h2>
                    <div class="teacher-info">
                        <?php if($tid) : ?>
                        <div class="teacher-thumb">
                            <?php echo '<a href="'.$tlink.'">'.get_the_post_thumbnail( $tid, 'thumbnail_teacher').'</a>'; ?>
                        </div>
                        <div class="teacher-info-data">
                        <?php 
                         echo '<h3><a href="'.$tlink.'">'.get_the_title($tid).'</a></h3>';
                         echo '<h4>'.get_field('subject', $tid).'</h4>';

                        ?>
                        </div>
                        <?php else : ?>
                            <div class="teacher-thumb-icon">
                                <i class="ri-file-user-fill"></i>
                            </div>
                        <div class="teacher-info-data">
                            <h3><a href="#"><?php _e('Teacher Name'); ?></a></h3>
                            <h4><?php _e('Teacher Subject'); ?></h4>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="program-slider">
                    <?php echo kids_single_page_education_programs(); ?>
                    <div class="duration-program">
                        <?php echo $age_of_children; _e(' Years'); ?>
                    </div>
                </div>
                <div class="program-description">
                    <?php the_content(); 
                    echo '<div class="program-requirement">'.$programs_information['requirements'].'</div>'; ?>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="program-information--">
                    <?php if ( is_active_sidebar( 'education-program-widget-area' ) ) : ?>
                        <?php dynamic_sidebar( 'education-program-widget-area' ); ?>
                    <?php endif; ?>
                </div>
                <?php /* <div class="program-information">
                    <h4><i class="ri-information-line"></i> Information</h4>
                    <?php echo do_shortcode('[programs_information link="../contact" link_text="Enroll now"]'); ?>
                    
                    
                </div> <!-- ### End program sidebar --> 

                <div class="program-information">
                    <div class="blog-post">
                    <h4><i class="ri-newspaper-fill"></i> <?php _e('Latest News'); ?></h4>
                    <?php echo do_shortcode('[kids_blog_post link="../contact" link_text="Enroll now"]'); ?>
                    </div>
                </div>
                
                <div class="kids-photo-gallery program-information">
                    <h4><i class="ri-newspaper-fill"></i> <?php _e('Photo Gallery'); ?></h4>
                    <?php  ?>
                </div>*/ ?>
            </div>
        </div>
    </div>
        
    </div>

        <?php
        

        endwhile; 
    endif; ?>

    <?php echo single_related_post(); ?>

    </div>

    <?php 
    get_footer();
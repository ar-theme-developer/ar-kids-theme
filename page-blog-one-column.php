<?php 
/*Template Name: Single Column Blog */

get_header(); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="header">
                <h1 class="entry-title">
                    <?php the_title(); ?>
                </h1> 
                <?php edit_post_link(); ?>
            </header>

            <div class="entry-content">
                <?php if ( has_post_thumbnail() ) { 
                        the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); 
                    } ?>
                <?php the_content(); ?>
            </div>
        </article>
        <?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>
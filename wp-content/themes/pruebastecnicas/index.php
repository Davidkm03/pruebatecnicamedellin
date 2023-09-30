<?php get_header(); ?>

<div id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; else: ?>
        <p><?php _e('Lo siento, no hay publicaciones que coincidan con tus criterios.'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>

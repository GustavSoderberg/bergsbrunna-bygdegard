<?php get_header(); ?>
<?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
            <?php if ( is_page() ) : ?>
            <?php else : ?>
                <div class=\"12u\"><a href="<?php the_permalink() ?>"><strong><?php the_title() ?></strong></a>
            <?php endif; ?>
            <?php the_content() ?>
            <?php if ( is_page() ) : ?>
            <?php else : ?>
                <em>Publicerat den <?php echo get_the_date(); ?></em></div><br />
            <?php endif; ?>
        <?php endwhile;
    else :
            if ( is_home() ) : ?>
                <div class=\"row 0% images\"><div class=\"12u\"><strong>Inget aktuellt för närvarande.</div></div><br />
            <?php else : ?>
                <div class=\"row 0% images\"><div class=\"12u\"><strong>Den här sidan finns inte.</div></div><br />
            <?php endif;
    endif; ?>
    <?php get_footer(); ?>
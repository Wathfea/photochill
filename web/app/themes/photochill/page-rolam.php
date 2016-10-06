<?php
/**
 * Created by PhpStorm.
 * User: Reni
 * Date: 2016. 10. 06.
 * Time: 22:02
 */
    get_header();
?>

<div class="article container">
    <?php while ( have_posts() ) : the_post(); ?>

        <h2 class="inner_title"><?php the_title(); ?></h2>
        <div class="col-xs-12 col-md-8"><?php the_content(); ?></div>
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="col-xs-12 col-md-4">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
    <?php endwhile; // end of the loop. ?>
</div>
<?php get_footer(); ?>

<?php get_header(); ?>
<div class="container blog_posts">
    <div class="col-md-9 col-xs-12">
        <h2 class="inner_title text-left"><?php echo single_cat_title("", false); ?></h2>
        <div class="grid">
            <?php if (have_posts()) : ?>
                <?php
                while (have_posts()) : the_post();
                    setup_postdata($post);
                    $meta =  get_post_meta($post->ID , 'Készült');

                    ?>
                    <a href="<?php the_permalink(); ?>">
                        <figure class="effect-winston">
                            <img src="<?php the_post_thumbnail_url(array(480, 360)); ?>" />
                            <figcaption>
                                <h2 class="archive_title"><?php the_title(); ?></h2>
                                <!-- <h2 class="archive_title"><?php the_title(); ?></h2> -->
                                <p class="hiddendate">
                                    <?php echo empty($meta[0]) ? the_date() : $meta[0];  ?>
                                </p>
                            </figcaption>
                        </figure>
                    </a>
                <?php endwhile;
            else: ?>
                <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
        </div> <!-- GRID END -->

        <!-- Pagination -->
        <div class="pagination">
            <?php
            global $wp_query;
            $big = 99999999;

            $args = array(
                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                'format' => '?paged=%#%',
                'total' => $wp_query->max_num_pages,
                'current' => max(1, get_query_var('paged')),
                'show_all' => false,
                'end_size' => 2,
                'mid_size' => 3,
                'prev_next' => True,
                'prev_text' => '« Previous Page',
                'next_text' => 'Next Page »',
                'type' => 'plain',
                'add_args' => False,
                'add_fragment' => ''
            );
            ?>
            <div class="pagination-in">
<?php echo paginate_links($args); ?>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xs-12">
        <?php dynamic_sidebar('sidebar-right'); ?>
    </div>
</div>
<?php get_footer(); ?>

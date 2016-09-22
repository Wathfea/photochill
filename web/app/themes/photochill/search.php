<?php get_header(); ?>
<div class="container">
	<h2 class="inner_title">Search results</h2>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post();
		setup_postdata($post);
	?>
		<div class="archive_post">
			<?php
				if(has_post_thumbnail( $post->ID )){
					echo get_the_post_thumbnail( $post->ID, 'thumbnail' );
				} else { ?>
					<img class="attachment-thumbnail" src="<?php bloginfo('template_url') ?>/images/no-image.jpg" />
			<?php }	?>
			<h3 class="archive_title inner_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="archive_content"><?php echo my_ultimate_excerpt(35,$post); ?></div>
				<a href="<?php the_permalink(); ?>" class="readmore">Read more</a>
		</div>
	<?php endwhile; else: ?>
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
	<!-- Pagination -->
	<div class="pagination">
		<?php
		global $wp_query;
		$big = 99999999;

		$args = array(
			'base'         => str_replace($big, '%#%', get_pagenum_link($big)),
			'format'       => '?paged=%#%',
			'total'        => $wp_query->max_num_pages,
			'current'      => max(1, get_query_var('paged')),
			'show_all'     => false,
			'end_size'     => 2,
			'mid_size'     => 3,
			'prev_next'    => True,
			'prev_text'    => '« Previous Page',
			'next_text'    => 'Next Page »',
			'type'         => 'plain',
			'add_args'     => False,
			'add_fragment' => ''
		);
		?><div class="pagination-in"><?php
	   echo paginate_links( $args );
	  ?></div>
	</div>
</div>
<?php get_footer(); ?>

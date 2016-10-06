<?php get_header(); ?>
<div class="article container">
	<div class="col-xs-9">
	<?php if (have_posts()) {
			the_post();
			setup_postdata($post);
	?>

	<div id="my-box">
		<div class="bg">
			<img src="<?php the_post_thumbnail_url('large'); ?>" alt="">
		</div>
		<h1 class="inner_title"><?php echo the_title(); ?></h1>
	</div>
	<div class="row">
		<div class="col-xs-12" style="height: 10px; background-color: black; border-top: 4px solid white;"></div>
		<div class="col-xs-12 text-right">
			<div class="col-xs-6 text-left">
				<?php the_tags(); ?>
			</div>
			<div class="col-xs-6 text-right">
					<i>Megjelenés: <?php the_date(); ?></i>
			</div>
		</div>
		<div class="col-xs-12"  style="margin-top: 25px;">
			<?php the_content(); ?>
		</div>
	</div>

		<!-- Post Ends -->
	<?php } else { ?>
			<p>Sorry, no posts matched your criteria.</p>
	<?php } ?>
	</div>
	<div class="col-xs-3">
		<?php dynamic_sidebar('sidebar-right'); ?>
	</div>
</div>
<?php get_footer(); ?>

<?php get_header(); ?>
<div class="article container">
	<div class="col-md-9 col-xs-12">
	<?php if (have_posts()) {
			the_post();
			setup_postdata($post);
	?>

	<div>
		<div class="bg">
			<img src="<?php the_post_thumbnail_url('large'); ?>" alt="">
		</div>
		<h1 class="inner_title"><?php echo the_title(); ?></h1>
	</div>
	<div class="row">
		<div class="col-md-12 hidden-xs hidden-sm" style="height: 8px; background-color: #776e87; border-top: 3px solid white;"></div>
		<div class="col-xs-12 text-right">
			<div class="col-xs-6 text-left">
				<?php the_tags(); ?>
			</div>
			<div class="col-md-6 col-xs-12 text-right">
					<i>Megjelenés: <?php the_date(); ?></i>
			</div>
		</div>
		<div class="col-xs-12 text-left"  style="margin-top: 25px;">
			<?php the_content(); ?>
		</div>
	</div>

		<!-- Post Ends -->
	<?php } else { ?>
			<p>Sorry, no posts matched your criteria.</p>
	<?php } ?>
	</div>
	<div class="col-md-3 col-xs-12">
		<?php dynamic_sidebar('sidebar-right'); ?>
	</div>
</div>
<?php get_footer(); ?>

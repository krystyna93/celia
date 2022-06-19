<?php
get_header();
?>

<div class="content">
	<h1 class="title main-title">
		<?php the_archive_title();
		if (is_author()) {
			echo '<small>&#8212;', the_archive_description(), '</small>';
		} ?>
	</h1>

	<?php while (have_posts()) : the_post(); ?>
		<article class="post">

			<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<!-- post meta -->
			<div class="post-meta">
				<p>
					<span><?php the_author_posts_link(); ?></span>
					<span><?php echo get_the_category_list(', '); ?></span>
					<span><?php the_time('F j, Y'); ?></span>
				</p>
			</div>

			<div class="the-excerpt">
				<?php the_excerpt(); ?>
			</div>
		</article>
	<?php endwhile; ?>

	<?php custom_pagination(); ?>
</div>

<?php
get_footer();
?>
<?php
get_header();
?>

<div class="content">
	<h1 class="title main-title">
		<?php the_archive_title(); ?>
	</h1>

	<?php
	if (have_posts()) : while (have_posts()) : the_post();	?>
			<article class="post">

				<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<!-- post meta -->
				<div class="post-meta">
					<p>
						<span><?php the_time('F j, Y'); ?></span>
					</p>
				</div>

				<div class="the-excerpt">
					<?php the_excerpt(); ?>
				</div>
			</article>
	<?php endwhile;
	else : _e('Sorry, no posts seem to have been found');
	endif;
	wp_reset_postdata(); ?>

	<?php custom_pagination(); ?>
</div>

<?php
get_footer();
?>
<?php
get_header();
?>

<div class="content">
	<?php while (have_posts()) : the_post(); ?>
		<article class="post">
			<?php if (has_post_thumbnail()) { ?>
				<div class="post-content">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php	} ?>
			<h2 class="title"><?php the_title(); ?></h2>

			<div class="the-content">
				<?php the_content(); ?>
			</div>

		</article>
	<?php endwhile ?>
</div>

<?php
get_footer();
?>
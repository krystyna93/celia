<?php
get_header();
?>

<div class="content">
	<?php if (have_posts()) : while (have_posts()) : the_post();
			setPostViews(get_the_ID());
	?>
			<article class="post">
				<div class="post-media">
					<?php the_post_thumbnail('lg-wide-image', array('alt' => get_the_title(), 'title' => get_the_title())); ?>
					<h5 class="title"><?php the_title(); ?></h5>
				</div>

				<div class="post-content">
					<h2 class="title"><?php the_title(); ?></h2>
					<!-- post meta -->
					<div class="post-meta">
						<p>
							<span><?php the_author_posts_link(); ?></span>
							<span><?php echo get_the_category_list(', '); ?></span>
							<span><?php the_time('F j, Y'); ?></span>
							<span><?php echo get_comments_number_text("No thoughts, yet", "One Thought only", "% thoughts"); ?></span>
							<span><?php echo getPostViews(get_the_ID()); ?></span>
						</p>
					</div>

					<!-- the excerpt -->
					<div class="the-content">
						<?php the_content(); ?>

						<div class="category">
							<span>Category <a href="#">Travel</a></span>
							<div class="post-tags">
								<a href="#">#amsterdam </a>
								<a href="#">#summer</a>
							</div>
						</div>
					</div>

					<div class="step-back">
						<a href="<?php echo site_url('/blog'); ?>">Blog home</a></p>
					</div>
				</div>
			</article>
	<?php endwhile;
	else : _e('Sorry, no posts seem to have been found');
	endif; ?>
</div>

<?php
get_footer();
?>
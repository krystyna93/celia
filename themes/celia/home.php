<?php
get_header();
?>

<div class="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="post">
				<div class="post-media">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('sm-wide-image', array('alt' => get_the_title(), 'title' => get_the_title())); ?>
						<!-- <h5 class="title"><?php //the_title(); 
																		?></h5> -->
					</a>
				</div>

				<div class="post-content">

					<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<!-- post meta -->
					<div class="post-meta">
						<p>
							<span><?php the_author_posts_link(); ?></span>
							<span><?php echo get_the_category_list(', '); ?></span>
							<span><?php the_time('F j, Y'); ?></span>
						</p>
					</div>

					<!-- the excerpt -->
					<div class="the-excerpt">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</article>
	<?php endwhile;
	else : _e('Sorry, no posts seem to have been found');
	endif; ?>

	<?php custom_pagination(); ?>
</div>

<?php
get_footer();
?>
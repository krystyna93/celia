<?php

/**
 * Template Name: Project Template
 * Template Post Type: projects, page, post
 */

get_header();
?>

<div class="content">
	<h1 class="title main-title"><?php the_title(); ?></h2>
		<?php if (have_posts()) : while (have_posts()) : the_post();
				the_content();
			endwhile;
		endif;
		wp_reset_postdata(); ?>

		<div class="sm-grid">
			<div>
				<div class="cell">Project Name</div>
				<div class="cell">Mixed Photography</div>
			</div>
			<div>
				<div class="cell">Year</div>
				<div class="cell">2019</div>
			</div>
			<div>
				<div class="cell">Location</div>
				<div class="cell">Amsterdam</div>
			</div>
			<div>
				<div class="cell">Category</div>
				<div class="cell">photography</div>
			</div>
		</div>

		<?php
		$projects = new WP_Query(array(
			'posts_per_page' => 5,
			'post_type'      => 'projects',
		)); ?>

		<div class="the-content">
			<?php if ($projects->have_posts()) : while ($projects->have_posts()) : $projects->the_post();	?>
					<div class="post-content">
						<div class="gallery">
							<?php if (has_post_thumbnail()) : ?>
								<a class="popup" href="<?php the_post_thumbnail_url(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							<?php endif; ?>
						</div>
						<h2 class="title"><?php the_title(); ?></h2>
					</div>
			<?php endwhile;
			else : _e('Sorry, no posts seem to have been found');
			endif;
			wp_reset_postdata(); ?>
		</div>

		<div class="">
			<p><a href="<?php echo get_post_type_archive_link('projects'); ?>">See all</a></p>
		</div>
		<div class="step-back">
			<a href="<?php echo site_url('/'); ?>">home</a></p>
		</div>

		<?php
		get_footer();
		?>
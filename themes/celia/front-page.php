<?php
get_header();
?>

<div class="content lg-grid">

	<?php
	$query1 = new WP_Query(array(
		'posts_per_page' => 5,
		'post_type'      => 'projects',
	));
	$query2 = new WP_Query(array(
		'posts_per_page' => 1,
		'orderby'   => 'rand',
		'category_name'  => 'art',
	));
	$posts = array_merge($query1->posts, $query2->posts);

	foreach ($posts as $post) : setup_postdata($post);
		if ($post->post_type == 'post') : ?>
			<div class="project-item">
				<div class="recent-post">
					<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<!-- post meta -->
					<div class="post-meta">
						<p>
							<span><?php the_author(); ?></span>
							<span><?php the_time('F j, Y'); ?></span>
						</p>
					</div>

					<!-- the content -->
					<div class="the-excerpt">
						<?php echo the_excerpt(); ?>
					</div>
				</div>
			</div>

		<?php else : ?>
			<div class="project-item">
				<a href="<?php echo site_url('/project'); ?>">
					<img src="<?php the_post_thumbnail_url(); ?>" />
					<h5 class="title"><?php the_title(); ?></h5>
				</a>
			</div>
	<?php
		endif;
	endforeach;

	wp_reset_postdata();
	?>
</div>


<?php
get_footer();
?>
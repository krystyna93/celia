<?php

/**
 * The template for displaying 404 pages (Not Found)
 *
 */
get_header();
?>

<div class="content error-404 not-found">
	<h1 class="title archive-title"><?php _e('Not Found', 'celia'); ?></h1>
	<article class="post">

		<h2>Well, this is embarassing...</h2>
		<p>It seems we can't fond what you're looking for. Perhaps searching can help.</p>

		<div class="step-back">
			<a href="<?php echo site_url('/'); ?>">Back home</a></p>
		</div>
	</article>
</div>

<?php
get_footer();
?>
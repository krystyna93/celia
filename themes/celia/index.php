<?php

/**
 * The main template file
 */

get_header();
?>

<div class="content">
	<?php if (have_posts()) :	while (have_posts()) : the_post(); ?>
			<article class="post">

				<h2 class="title"><?php the_title(); ?></h2>

				<div class="the-content">
					<?php the_content(); ?>
				</div>

			</article>
	<?php endwhile;
	endif;	?>
</div>

<?php
get_footer();
?>
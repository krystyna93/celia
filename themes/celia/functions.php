<?php
/*
* ====================================================
* ENQUEUE SCRIPTS
* ====================================================
*/
function add_theme_scripts()
{
	wp_enqueue_style('raleway-font', 'https://fonts.googleapis.com/css?family=Raleway:200,200i,400,400i,600,600i');
	wp_enqueue_style('syne-font', 'https://fonts.googleapis.com/css2?family=Syne:wght@400;500');
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('magnific-popup-style', get_template_directory_uri() . '/assets/css/magnific-popup/magnific-popup.css', array(), false, 'all');
	wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', array(), false, 'all');

	wp_enqueue_script('jquery-3.5.1', get_template_directory_uri() . '/assets/js/jquery-3.5.1.min.js', array('jquery'), false, true); /*when uploaded to server, wordpress already has jquery*/
	wp_enqueue_script('magnific', get_template_directory_uri() . '/assets/js/magnific-popup/jquery.magnific-popup.min.js', 'jquery', false, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', 'jquery', false, true);
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');


/*
* ====================================================
* THEME FEATURES
* ====================================================
*/
function add_theme_setup()
{
	// add theme supports
	add_theme_support('title-tag');
	add_theme_support('admin-bar', array('callback' => '__return_false')); // remove margin top

	add_theme_support('post-thumbnails');
	add_image_size('sm-wide-image', 920, 120, array('center', 'center'));
	add_image_size('lg-wide-image', 920, 480, array('center', 'center'));

	register_nav_menu('aside-location', 'Aside Location');

	// filter excerpt length
	function excerpt_length($length)
	{
		return 30;
	}
	add_filter('excerpt_length', 'excerpt_length', 999);

	// filter read more string
	function excerpt_more($more)
	{
		if (!is_single()) {
			$more = sprintf(
				' <small><a href="%1$s">&#8212;	%2$s</a></small>',
				esc_url(get_permalink(get_the_ID())),
				__('read more', 'textdomain')
			);
		}
		return $more;
	}
	add_filter('excerpt_more', 'excerpt_more');

	// custom pagination
	function custom_pagination()
	{
		//global $wp_query;
		$total = $GLOBALS['wp_query']->max_num_pages;
		// only bother with the rest if we have more than 1 page!
		if ($total > 1) {
			// get the current page
			if (!$current_page = get_query_var('paged'))
				$current_page = 1;
			// structure of "format" depends on whether we're using pretty permalinks
			$format = empty(get_option('permalink_structure')) ? '&page=%#%' : 'page/%#%/';
			$links = paginate_links(array(
				'base' => get_pagenum_link(1) . '%_%',
				'format' => $format,
				'current' => $current_page,
				'total' => $total,
				'mid_size' => 2,
				'prev_text' => __('<small>&larr;</small>', 'celia'),
				'next_text' => __('<small>&rarr;</small>', 'celia'),
				'type' => 'list'
			));
			if ($links) :
?>
				<div class="pagination" role="navigation">
					<?php echo $links; ?>
				</div>
<?php endif;
		}
	}

	//  keep track of post views
	function getPostViews($postID)
	{
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if ($count == '') {
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0 View";
		}
		return $count . ' Views';
	}

	function setPostViews($postID)
	{
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if ($count == '') {
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		} else {
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
}
add_action('after_setup_theme', 'add_theme_setup');







//remove auto wp markup
// function replace_content($content)
// {
// 	$content = htmlentities($content, null, 'utf-8');
// 	$content = str_replace("&nbsp;", " ", $content);
// 	$content = preg_replace("#<p>\s*+(<br\s*/*>)?|s*</p>#i", " ", $content);
// 	$content = html_entity_decode($content);
// 	return $content;
// }
// add_filter('the_content', 'replace_content', 999999999);


// Stop WordPress from adding <p> tags
//remove_filter('the_content', 'wpautop');
//remove_filter('the_excerpt', 'wpautop');

	// add_filter('get_the_archive_title', function ($title) {
	// 	if (is_category()) {
	// 		$title = 'change title';
	// 	}
	// 	return $title;
	// });
	// add_filter('get_the_archive_title', function ($title) {
	// 	if (is_category()) {
	// 		$title = single_cat_title('', false);
	// 	}
	// 	return $title;
	// });

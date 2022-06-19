<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="preloader">
		<div class="spinner"></div>
	</div>

	<form class="search-form" action="#" method="get">
		<input class="search-input" type="search" placeholder="search" />
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
			<circle cx="11" cy="11" r="8"></circle>
			<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
		</svg>
	</form>

	<div class="grid">
		<header role="banner">
			<a class="toggle open" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 64 64">
					<line x1="8" x2="56" y1="15" y2="15" />
					<line x1="8" x2="56" y1="32" y2="32" />
					<line x1="8" x2="56" y1="50" y2="50" />
				</svg>
			</a>
			<h1 class="logo"><a href="<?php echo site_url(); ?>">Celia Ibáñez Segundo</a></h1>
		</header>
		<div class="overlay"></div>
		<aside class="aside-transform" role="navigation">
			<a class="toggle close" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
					<line x1=8 x2=58 y1=8 y2=58></line>
					<line x1=58 x2=8 y1=8 y2=58></line>
				</svg>
			</a>
			<div>
				<h1 class="logo"><a href="<?php echo site_url(); ?>">Celia Ibáñez Segundo</a></h1>
				<div class="social">
					<a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
					<a href="#" title="Behance"><i class="fa fa-behance"></i></a>
					<a href="#" title="Instagram"><i class="fa fa-instagram"></i></a>
				</div>
				<nav>
					<?php wp_nav_menu(array(
						'theme_location'	=> 'aside-location',
						'container'				=> false,
						'menu_class'			=> false,
						'items_wrap' 			=> '<ul>%3$s</ul>',
					)); ?>
				</nav>
				<div class="copyright">Celia Ibanez Segundo &copy; 2020</div>
			</div>
		</aside>
		<main>
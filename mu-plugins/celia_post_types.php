<?php
/*
Plugin Name: Celia CPT and taxonomies
Description: Custom post types and taxonomies for Celia theme
Author: Christina
*/

// custom post type for projects
function custom_post_type_project()
{
	// CPT options
	register_post_type('projects', array(
		'labels'			=> array(
		'name'				=> 'Projects',
		'singular_name'			=> 'Project',
		'menu_name'			=> 'Projects',
		'name_admin_bar'		=> 'Projects',
		'archives'			=> 'Project Archives',
		'attributes'			=> 'Project Attributes',
		'parent_item_colon'		=> 'Parent Project',
		'add_new_item'			=> 'Add New Project',
		'add_new'			=> 'Add New',
		'new_item'			=> 'New Project',
		'edit_item'			=> 'Edit Projects',
		'update_item'			=> 'Update Project',
		'view_item'			=> 'View Project',
		'view_items'			=> 'View Projects',
		'all_items'			=> 'All Projects',
		'search_items'			=> 'Search Projects',
		'not_found'			=> 'Not Found',
		'not_found_in_trash'		=> 'Not Found In Trash',
		'featured_image'		=> 'Featured Image',
		'set_featured_image'		=> 'Set Featured Image',
		'remove_featured_image'		=> 'Remove Featured Image',
		'use_featured_image'		=> 'Use Featured Image',
		),
		'supports'			=> array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'post-formats',),
		'menu_icon'			=> 'dashicons-index-card',
		'capability_type'		=> 'post',
		'public'			=> true,
		'show_ui'			=> true,
		'show_in_menu'			=> true,
		'show_in_admin_bar'		=> true,
		'show_in_nav_menus'		=> true,
		'menu_position'			=> 20,
		'has_archive'			=> true,
		'hierarchical'			=> false,
		'publicly_querable'		=> true,
		'taxonomies'			=> array('photography'),
		'rewrite' 			=> array('slug' => 'all-projects')
	));
}
add_action('init', 'custom_post_type_project');

// custom taxonomies for projects
function custom_taxonomy_projects()
{
	register_taxonomy('photography', 'projects', array(
		'labels'			=> array(
		'name'				=> 'Photography',
		'menu_name'			=> 'Photography',
		'singular_name'			=> 'Photograph',
		'search_items'			=> 'Search Photographs',
		'all_items'			=> 'All Photographs',
		'parent_item'			=> null,
		'parent_item_colon'		=> null,
		'edit_item'			=> 'Edit Photograph',
		'update_item'			=> 'Update Photograph',
		'add_new_item'			=> 'Add New Photograph',
		'new_item_name'			=> 'New Photograph Name',
		'seperate_items_with_commas'	=> 'Seperate Photograph With Commas',
		'add_or_remove_items'		=> 'Add or remove Photograph',
		'choose_from_most_used'		=> 'Choose from the most used Photographs',
		'not_found'			=> 'Categories Not Found',
		'not_found_in_trash'		=> 'Categories Not Found In Trash',
		),
		'hierarchical'			=> true,
		'show_ui'			=> true,
		'show_admin_column'		=> true,
		'update_count_callback'		=> '_update_post_term_count',
		'query_var'			=> true,
		'public'			=> false, // doesn't display front-end
		'args'				=> array('orderby'	=> 'term_order'),
		'rewrite'			=> array('slug' => 'Photography'),
	));
}
add_action('init', 'custom_taxonomy_projects');

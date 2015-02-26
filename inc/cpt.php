<?php
/**
 * Blank Custom Post Type w/Taxonomy, commented and ready to use. 
 * Please note, once activated, permalinks must be refreshed.
 * 
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 *
 * @package Creare Boilerplate
 */

/*
add_action( 'init', 'creare_blank_cpt' );
function creare_blank_cpt() {
	$labels = array(
		'name'               => _x( 'Books', 'post type general name', 'creare-boilerplate' ),
		'singular_name'      => _x( 'Book', 'post type singular name', 'creare-boilerplate' ),
		'menu_name'          => _x( 'Books', 'admin menu', 'creare-boilerplate' ),
		'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'creare-boilerplate' ),
		'add_new'            => _x( 'Add New', 'book', 'creare-boilerplate' ),
		'add_new_item'       => __( 'Add New Book', 'creare-boilerplate' ),
		'new_item'           => __( 'New Book', 'creare-boilerplate' ),
		'edit_item'          => __( 'Edit Book', 'creare-boilerplate' ),
		'view_item'          => __( 'View Book', 'creare-boilerplate' ),
		'all_items'          => __( 'All Books', 'creare-boilerplate' ),
		'search_items'       => __( 'Search Books', 'creare-boilerplate' ),
		'parent_item_colon'  => __( 'Parent Books:', 'creare-boilerplate' ),
		'not_found'          => __( 'No books found.', 'creare-boilerplate' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'creare-boilerplate' ),
	);
	
	$capabilities = array();

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		//'exclude_from_search'=> true, // use this parameter to exclude posts from search results
		'show_in_menu'       => true,
		'menu_icon'          => 'dashicons-admin-post',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 25,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'capability_type'	 => 'post',
		'capabilities'		 => $capabilities
	);

	register_post_type( 'book', $args );
	
	register_taxonomy(
		'genre',
		'book',
		array(
			'label' => __( 'Genre' ),
			'rewrite' => array( 'slug' => 'genre' ),
			'hierarchical' => true,
		)
	);
	
} */
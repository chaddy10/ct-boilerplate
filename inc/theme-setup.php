<?php
/**
 * Custom functions that complete some basic set up.
 *
 * @package Creare Boilerplate
 */

/**
 * Allows SVG's to be uploaded into media library.
 *
 * @link https://gist.github.com/bavington/8371042
 */
function creare_boilerplate_svg_uploads( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'creare_boilerplate_svg_uploads' );

/**
 * Remove uneccessary links from wp_head()
 */			   
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );

/**
 * On theme activate, sets permalink structure to /%postname%/ ( if default setting == '' )
 *
 * @link http://codex.wordpress.org/Class_Reference/WP_Rewrite
 */
function creare_boilerplate_update_permalinks() {
	if (get_option('permalink_structure') == '') {
	    global $wp_rewrite;
	    $wp_rewrite->set_permalink_structure('/%postname%');
	    $wp_rewrite->flush_rules();
	}
}
add_action( 'after_switch_theme', 'creare_boilerplate_update_permalinks' );

/** 
 * Rename uncategorised category
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_update_term
 */
 function creare_boilerplate_rename_uncategorised() {
	$term = get_term_by( 'name', 'Uncategorised', 'category' );
	if( $term ) {
		wp_update_term(
			$term->term_taxonomy_id, 
			'category', 
			array(
				'name' => 'Latest News',
				'slug' => 'latest-news'
			)
		);
	}
}
add_action( 'after_switch_theme', 'creare_boilerplate_rename_uncategorised' );

/**
 * Add ie conditional html5 shiv to header
 *
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/wp_head
 */
function creare_boilerplate_html5shiv() {
    echo '<!--[if lt IE 9]><script src="'. get_template_directory_uri() .'/js/html5shiv.js"></script><![endif]-->';
}
add_action( 'wp_head', 'creare_boilerplate_html5shiv' );

/**
 * Exclude pages from search results
 * Un-comment below to remove pages from search results. Edit as necessary to exclude CPT's.
 *
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 */ 
/* 
function creare_boilerplate_searchfilter( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', 'post' );
	}
	return $query;
}
add_filter( 'pre_get_posts','creare_boilerplate_searchfilter' ); 
*/

/**
 * Disallow theme & plugin file editing
 *
 * @link http://codex.wordpress.org/Editing_wp-config.php#Disable_the_Plugin_and_Theme_Editor
 */ 
define('DISALLOW_FILE_EDIT',true);

/**
 * Comment Control
 * Moved to /inc/comments.php
 * See head of file for instructions
 */
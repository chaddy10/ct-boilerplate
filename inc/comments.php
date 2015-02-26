<?php 
/**
 * Functions to disable comments throughout entire website.
 * All functions below need to be removed/commented out if comments are enabled.
 *
 * @package Creare Boilerplate
 */

/** 
 * Master comments control
 * 
 * Comment out relevant option below
 * @link http://codex.wordpress.org/Function_Reference/comments_open
 */
function creare_boilerplate_enable_comments() {
    //return true; // shows comments
    return false; // hides comments
}
add_filter( 'comments_open', 'creare_boilerplate_enable_comments', 20, 2 );
add_filter( 'pings_open', 'creare_boilerplate_enable_comments', 20, 2 );

/** 
 * Disable support for comments and trackbacks in post types
 */
function creare_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'creare_disable_comments_post_types_support');

/** 
 * Hide existing comments
 */
function creare_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'creare_disable_comments_hide_existing_comments', 10, 2);
 
/** 
 * Remove comments page in menu
 */
function creare_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'creare_disable_comments_admin_menu');

/** 
 * Redirect any user trying to access comments page
 */
function creare_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'creare_disable_comments_admin_menu_redirect');

/** 
 * Remove comments metabox from dashboard
 */
function creare_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'creare_disable_comments_dashboard');

/** 
 * Remove comments links from admin bar
 */
function creare_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'creare_disable_comments_admin_bar');
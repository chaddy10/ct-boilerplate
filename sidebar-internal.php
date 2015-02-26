<?php
/**
 * The Sidebar containing the widget areas for the 'secondary' sidebar
 *
 * @package Creare Boilerplate
 */
?>
<div id="secondary" class="widget-area" role="complementary">
	<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
		<aside id="search" class="widget widget_search">
			<?php get_search_form(); ?>
		</aside>
		<aside id="archives" class="widget">
			<p class="widget-title"><?php _e( 'Archives', 'creare-boilerplate' ); ?></p>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>
	<?php endif; // end sidebar widget area ?>
</div><!-- #secondary -->
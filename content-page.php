<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Creare Boilerplate
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-header">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </div>
  <!-- .entry-header -->
  <div class="entry-content">
    <?php the_content(); ?>
    <?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'creare-boilerplate' ),
			'after'  => '</div>',
		) );
	?>
  </div>
  <!-- .entry-content -->
  <div class="entry-footer">
    <?php edit_post_link( __( 'Edit', 'creare-boilerplate' ), '<span class="edit-link">', '</span>' ); ?>
  </div>
  <!-- .entry-footer --> 
</article>
<!-- #post-## --> 
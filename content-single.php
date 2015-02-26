<?php
/**
 * @package Creare Boilerplate
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-thumbnail">
		<?php if( has_post_thumbnail() ) {
			the_post_thumbnail( 'thumbnail' ); // change 'thumbnail' to your post thumbnail add_image_size $name
		} else {
			$attachment_id = 2; // Upload your default thumbnail to the Media Library and add the attachment ID
			$image_attributes = wp_get_attachment_image_src( $attachment_id, 'thumbnail' ); // change 'thumbnail' to your post thumbnail add_image_size $name
			echo $image_attributes[0];
		} ?>
	</div>

  <div class="entry-header">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    <div class="entry-meta">
      <?php creare_boilerplate_posted_on(); ?>
    </div>
    <!-- .entry-meta --> 
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
    <?php
		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list( __( ', ', 'creare-boilerplate' ) );

		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list( '', __( ', ', 'creare-boilerplate' ) );

		if ( ! creare_boilerplate_categorized_blog() ) {
			// This blog only has 1 category so we just need to worry about tags in the meta text
			if ( '' != $tag_list ) {
				$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'creare-boilerplate' );
			} else {
				$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'creare-boilerplate' );
			}

		} else {
			// But this blog has loads of categories so we should probably display them here
			if ( '' != $tag_list ) {
				$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'creare-boilerplate' );
			} else {
				$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'creare-boilerplate' );
			}

		} // end check for categories on this blog

		printf(
			$meta_text,
			$category_list,
			$tag_list,
			get_permalink()
		);
	?>
    <?php edit_post_link( __( 'Edit', 'creare-boilerplate' ), '<span class="edit-link">', '</span>' ); ?>
  </div>
  <!-- .entry-footer --> 
</article>
<!-- #post-## --> 
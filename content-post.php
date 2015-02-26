<?php
/**
 * The template used for displaying page content in index.php for posts
 *
 * @package Creare Boilerplate
 */
?>
<?php
/**
 * @package Creare Boilerplate
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="entry-thumbnail">
    <?php if( has_post_thumbnail() ) {
      the_post_thumbnail( 'newsthumbnail' ); // change 'thumbnail' to your post thumbnail add_image_size $name
    } else {
      $attachment_id = 2; // Upload your default thumbnail to the Media Library and add the attachment ID
      $image_attributes = wp_get_attachment_image_src( $attachment_id, 'newsthumbnail' ); // change 'thumbnail' to your post thumbnail add_image_size $name
      echo '<img src="'. $image_attributes[0] .'" alt="'. get_the_title() .' thumbnail" />';
    } ?>
  </div>

  <div class="entry-header">
    <?php the_title( sprintf( '<p class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' ); ?>
    <?php if ( 'post' == get_post_type() ) : ?>
    <div class="entry-meta">
      <?php creare_boilerplate_posted_on(); ?>
    </div>
    <!-- .entry-meta -->
    <?php endif; ?>
  </div>
  <!-- .entry-header -->
  <?php if ( is_search() ) : // Only display Excerpts for Search ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <!-- .entry-summary -->
  <?php else : ?>
  <div class="entry-content">
    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'creare-boilerplate' ) ); ?>
    <?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'creare-boilerplate' ),
			'after'  => '</div>',
		) );
	?>
  </div>
  <!-- .entry-content -->
  <?php endif; ?>
  <div class="entry-footer">
    <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
    <?php
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'creare-boilerplate' ) );
		if ( $categories_list && creare_boilerplate_categorized_blog() ) :
	?>
    <span class="cat-links"> <?php printf( __( 'Posted in %1$s', 'creare-boilerplate' ), $categories_list ); ?> </span>
    <?php endif; // End if categories ?>
    <?php
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'creare-boilerplate' ) );
		if ( $tags_list ) :
	?>
    <span class="tags-links"> <?php printf( __( 'Tagged %1$s', 'creare-boilerplate' ), $tags_list ); ?> </span>
    <?php endif; // End if $tags_list ?>
    <?php endif; // End if 'post' == get_post_type() ?>
    <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
    <span class="comments-link">
    <?php comments_popup_link( __( 'Leave a comment', 'creare-boilerplate' ), __( '1 Comment', 'creare-boilerplate' ), __( '% Comments', 'creare-boilerplate' ) ); ?>
    </span>
    <?php endif; ?>
    <?php edit_post_link( __( 'Edit', 'creare-boilerplate' ), '<span class="edit-link">', '</span>' ); ?>
  </div>
  <!-- .entry-footer --> 
</article>
<!-- #post-## --> 
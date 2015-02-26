<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Creare Boilerplate
 */
get_header(); ?>
<section class="wrapper">
<div id="primary" class="content-area wrap">
  <main id="main" class="site-main" role="main">
    <?php if ( have_posts() ) : ?>
    <header class="page-header">
      <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'creare-boilerplate' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </header>
    <!-- .page-header -->
    <?php /* Start the Loop */ 
    while ( have_posts() ) : the_post();
		/**
		 * Run the loop for the search to output the results.
		 * If you want to overload this in a child theme then include a file
		 * called content-search.php and that will be used instead.
		 */
		get_template_part( 'content', 'search' );
	endwhile;
	creare_boilerplate_paging_nav();
	else :
		get_template_part( 'content', 'none' );
	endif; ?>
  </main>
  <!-- #main --> 
  <div class="sidebar">
    <?php get_sidebar(); ?>
  </div>
</div>
<!-- #primary -->
</section>
<?php get_footer(); ?>
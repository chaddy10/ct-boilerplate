<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page (home or internal) when set to 'show latest posts'.
 * Template should be used to show blog, unless bespoke coding is required
 * which requires a new template and query to be created and used.
 *
 * @package Creare Boilerplate
 */
get_header(); ?>
<section class="wrapper">
  <div id="primary" class="content-area wrap">
    <main id="main" class="site-main" role="main">
      <?php if ( have_posts() ) : 
      /* Start the Loop */
      while ( have_posts() ) : the_post();
      	/* Content for the post is controlled in content-post.php */
	  	get_template_part( 'content', 'post' );
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
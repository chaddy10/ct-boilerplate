<?php
/**
 * Template Name: HTML Sitemap
 *
 * This is the template that displays the HTML sitemap.
 *
 * @package Creare Boilerplate
 */
get_header(); ?>
<section class="wrapper">
  <div id="primary" class="content-area wrap">
    <main id="main" class="site-main" role="main">
      <?php while ( have_posts() ) : the_post();
	  	get_template_part( 'content', 'page' );
	  	wp_nav_menu( array( 'theme_location' => 'sitemap' ) );
	  endwhile; // end of the loop. ?>
    </main>
    <!-- #main -->
    <div class="sidebar">
      <?php get_sidebar( 'internal' ); ?>
    </div>
  </div>
  <!-- #primary --> 
</section>
<?php get_footer(); ?>
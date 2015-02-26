<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Creare Boilerplate
 */
get_header(); ?>
<section class="wrapper">
  <div id="primary" class="content-area wrap">
    <main id="main" class="site-main" role="main">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'page' ); ?>
      <?php endwhile; // end of the loop. ?>
    </main>
    <!-- #main -->
    <div class="sidebar">
      <?php get_sidebar( 'internal' ); ?>
    </div>
  </div>
  <!-- #primary --> 
</section>
<?php get_footer(); ?>
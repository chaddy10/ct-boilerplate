<?php
/**
 * Template Name: Home
 *
 * This is the template that displays the home page.
 *
 * @package Creare Boilerplate
 */

get_header(); ?>
<section class="wrapper">
  <div id="primary" class="content-area wrap">
    <main id="main" class="home-content site-main" role="main">
      <?php while ( have_posts() ) : the_post();
	  	get_template_part( 'content', 'page' );
	  	if ( comments_open() || '0' != get_comments_number() ) :
        		comments_template();
        	endif;
	  endwhile; // end of the loop. ?>
    </main>
    <!-- #main --> 
  </div>
  <!-- #primary --> 
</section>
<?php get_footer(); ?>
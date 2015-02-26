<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Creare Boilerplate
 */
get_header(); ?>
<section class="wrapper">
  <div id="primary" class="content-area wrap">
    <main id="main" class="site-main" role="main">
      <section class="error-404 not-found">
        <header class="page-header">
          <h1 class="page-title">
            <?php _e( 'Error 404, page not found.', 'creare-boilerplate' ); ?>
          </h1>
        </header>
        <!-- .page-header -->
        <div class="page-content">
          <p>
            <?php _e( 'Sorry, but we could not find the page you were looking for. It has either changed URL or been removed. Use the main website navigation to continue browsing this website or use the search form below.', 'creare-boilerplate' ); ?>
          </p>
          <?php get_search_form(); ?>
        </div>
        <!-- .page-content --> 
      </section>
      <!-- .error-404 --> 
    </main>
    <!-- #main -->
    <div class="sidebar">
      <?php get_sidebar( 'internal' ); ?>
    </div>
  </div>
  <!-- #primary --> 
</section>
<?php get_footer(); ?>
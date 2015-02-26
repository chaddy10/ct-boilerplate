<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header wrapper">
	  <div class="container">
      <div id="logo" itemscope itemtype="http://schema.org/Organization">
        <a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> 
          <?php if(get_field('company_logo', 'option')) { ?>
          <?php $img = get_field('company_logo', 'option'); ?>
          <img src="<?php echo $img['url']; ?>" title="<?php echo $img['title']; ?>" alt="<?php if($img['alt']) {
            echo $img['alt'];
            } else {
            echo $img['title']; } ?>"/>
          <?php } else { ?>
          <img itemprop="logo" src="http://www.ct-creative.co.uk/wp-content/themes/ct-creative/images/layout/logo.svg" alt="Logo"/>
          <?php } //end if ?>
        </a>
      </div>
      <div id="phone-number">
        <span id="phone-strap"><?php if(get_field('phone_strap_line', 'option')) { the_field('phone_strap_line', 'option');} else { ?>Call Us Today<?php } ?></span> 
        <?php if(have_rows('company_phone', 'option')){
        while ( have_rows('company_phone', 'option') ) { the_row();?>
       <?php $phone_number = get_sub_field('phone_number');
        $stripped_number = str_replace(' ', '', $phone_number);
       ?>
       <span class="tel-nos"><a href="tel:<?php echo $stripped_number;?>" onclick="ga('send', 'event', 'link', 'click', 'Header<?php the_sub_field('phone_label');?>');"><?php echo $phone_number;?></a></span>
      <?php }// end while
      }// end if ?>
      </div>
    </div>
	</header>
	<!-- #masthead --> 
</section>

<nav id="site-navigation" class="main-navigation" role="navigation">
  <div class="container">
    <?php wp_nav_menu( array( 'theme_location' => 'primary'/* add the name of your menu, 'menu' => 'Main Menu'*/ ) ); ?>
  </div>
</nav>
<!-- #site-navigation --> 

<?php if( !is_page(2) ) { // add homepage id to prevent breadcrumbs showing ?>
<section class="wrapper">
	<div class="container">
			<?php 
			if( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );	
			} ?>
  </div>
</section>
<?php } ?>
<?php
/**
 * Template Name: Contact
 *
 * This is the template that displays the home page.
 *
 * @package Creare Boilerplate
 */

get_header(); ?>

<?php if(have_rows('company_phone', 'option')){
        while ( have_rows('company_phone', 'option') ) { the_row();
          $phone_number = get_sub_field('phone_number');
        }//endwhile
      } else {
      $phone_number = '01234 567 890';
      }
      $stripped_number = str_replace(' ', '', $phone_number);
?>
<section class="wrapper contact-wrapper">
  <div id="primary" class="content-area container">
    <main id="main" class="site-main" role="main">
      <?php while ( have_posts() ) : the_post();?>
	  	<h1><?php the_title();?></h1>
	  	<?php the_content();?>
	  	<div class="content-left contact-form">
        <?php if (!stristr($_SERVER['REMOTE_ADDR'] ,"128.30.52") && !stristr($_SERVER['HTTP_USER_AGENT'] ,"W3C_Validator")) {
        // Add your Gravity Form / Contact Form 7 shortcode here
        // e.g. echo do_shortcode('[gravityform id="1" title="false" description="false"]');
        }?>
	  	</div>
	  	<div class="content-right">
	  	  <div id="our-details">
	  	    <span class="table-header">Our Details</span>
	  	    <div class="businessinfo" itemscope itemtype="http://schema.org/LocalBusiness">
               <?php $companyname = get_bloginfo( 'name' ); ?>
               <span itemprop="legalName"><?php echo $companyname;?></span>
               <div id="address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                   <div id="add-contain">
                     <span itemprop="streetAddress"><?php if(get_field('building_number', 'options')) { the_field('building_number', 'options');}?> <?php if(get_field('add_line_break', 'options') == 'Yes') {?><br/><?php } ?><?php if(get_field('street_name', 'options')) { the_field('street_name', 'options');}?></span>
                     <span itemprop="addressLocality"><?php if(get_field('town_city', 'options')) { the_field('town_city', 'options');}?></span>
                     <span itemprop="addressRegion"><?php if(get_field('county', 'options')) { the_field('county', 'options');}?></span>
                     <span itemprop="postalCode"><?php if(get_field('post_code', 'options')) { the_field('post_code', 'options');}?></span>
                   </div>
               </div>
               <div id="phone-open">
                 <p id="phone">Phone: <span itemprop="telephone"><a href="tel:<?php echo $stripped_number;?>" onClick="ga('send', 'event', {eventCategory:'Phone', eventAction:'Click-To-Call', eventLabel:'ContactClicked'});"><?php echo $phone_number; ?></a></span></p>
                 <p id="open"><span>Open: <meta itemprop="openingHours" content="Mo-Fr 09:00-16:00">Monday to Friday 9:00am to 4:00pm</span></p>
                 <?php /*<p>Find us on <a href="#" title="Find Us on Google Maps" target="_blank">Google Maps</a></p>*/?>
               </div>
            </div> 
	  	  </div>
	  	  <div id="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2419.605995534211!2d-1.1726075999999994!3d52.66709389999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xa14dc59e499f0bf5!2sBeaumont+Enterprise+Centre!5e0!3m2!1sen!2suk!4v1424692148547" frameborder="0" style="border:0"></iframe>
        </div>
	  	</div>
	  <?php endwhile; // end of the loop. ?>
    </main>
    <!-- #main -->
  </div>
  <!-- #primary -->
</section>
<?php get_footer(); ?>
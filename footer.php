<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Creare Boilerplate
 */
?>
<?php $companyname = get_bloginfo( 'name' ); ?>
<?php if(have_rows('company_phone', 'option')){
        while ( have_rows('company_phone', 'option') ) { the_row();
          $phone_number = get_sub_field('phone_number');
        }//endwhile
      } else {
      $phone_number = '01234 567 890';
      }
      $stripped_number = str_replace(' ', '', $phone_number);
?>

<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="container">
    <div id="company-footer">
      <div id="footer-info">
        <span itemprop="legalName"><?php echo $companyname;?></span>
        <div id="add-contain">
         <span><?php if(get_field('building_number', 'options')) { the_field('building_number', 'options');}?> <?php if(get_field('add_line_break', 'options') == 'Yes') {?><br/><?php } ?><?php if(get_field('street_name', 'options')) { the_field('street_name', 'options');}?></span>
         <span><?php if(get_field('town_city', 'options')) { the_field('town_city', 'options');}?></span>
         <span><?php if(get_field('county', 'options')) { the_field('county', 'options');}?></span>
         <span><?php if(get_field('post_code', 'options')) { the_field('post_code', 'options');}?></span>
        </div>
        <div id="phone-open">
         <p id="phone">Phone: <a href="tel:<?php echo $stripped_number;?>" onClick="ga('send', 'event', {eventCategory:'Phone', eventAction:'Click-To-Call', eventLabel:'ContactClicked'});"><?php echo $phone_number; ?></a></p>
         <p id="open">Open: Monday to Friday 9:00am to 4:00pm</p>
         <?php /*<p>Find us on <a href="#" title="Find Us on Google Maps" target="_blank">Google Maps</a></p>*/?>
        </div>
      </div>
    </div>
    
    <div id="sitemap-footer">
      <span class="footer-title">Sitemap</span>
      <?php wp_nav_menu( array( 'theme_location' => 'secondary'/* Name of the footer menu, 'menu' => 'Footer'*/ ) ); ?>
    </div>
    
	  <div class="site-info"> 
	    <span class="footer-title">Legal</span>
	    <p>&copy; <?php echo date( 'Y' ); ?> - All rights reserved - <?php echo $companyname;?></p>
	    <p>W3C Compliant <a href="http://validator.w3.org/check?uri=referer" title="Valid HTML5">HTML5</a></p>
    </div>
    <!-- .site-info --> 
  </div>
</footer>
  <!-- #colophon --> 
</div>
<!-- #page -->
<?php wp_footer(); ?>
</body></html>
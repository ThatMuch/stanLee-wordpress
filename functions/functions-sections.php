<?php
/**
 * functions to output ACFs flexible content
 *
 * @author     _a
 * @version    0.1.0
 * @since      _s 0.1.0
 *
 *
 */


/*==================================================================================
  SETTINGS/SETUP
==================================================================================*/


/* ADD TITLES BLOCKS
/––––––––––––––––––––––––––––––––––––*/
// adds the title sub-field to the ACF-row. Edit `name` at `add_filter` to match your ACF-value.
// » https://www.advancedcustomfields.com/resources/acf-fields-flexible_content-layout_title/
function stanlee_sections_backendtitle( $title, $field, $layout, $i ) {
  if (!empty(get_sub_field('title'))) {
  	$title = get_sub_field('title')." ($title)";
  }
  return $title;
}
add_filter('acf/fields/flexible_content/layout_title/name=sections', 'stanlee_sections_backendtitle', 10, 4);


/* GATHER SECTIONS
/––––––––––––––––––––––––*/
function stanlee_sections() {
  ob_start('sanitize_output');
  if (have_rows('sections')):
    while (have_rows('sections')): the_row();
      if (get_row_layout() == 'text') : stanlee_section_text(); endif;
      if (get_row_layout() == 'text_image') : stanlee_section_text_img(); endif;
      if (get_row_layout() == 'link') : stanlee_section_link(); endif;
      if (get_row_layout() == 'services') : stanlee_section_services(); endif;
      if (get_row_layout() == 'team') : stanlee_section_team(); endif;
      if (get_row_layout() == 'portfolio') : stanlee_section_portfolio(); endif;
      if (get_row_layout() == 'testimonials') : stanlee_section_testimonials(); endif;
      if (get_row_layout() == 'price') : stanlee_section_price(); endif;
      if (get_row_layout() == 'logos') : stanlee_section_logos(); endif;
      if (get_row_layout() == 'carousel') : stanlee_section_carousel(); endif;
      if (get_row_layout() == 'gallery') : stanlee_section_gallery(); endif;
      if (get_row_layout() == 'contact') : stanlee_section_contact(); endif;
      if (get_row_layout() == 'stats') : stanlee_section_stats(); endif;
      if (get_row_layout() == 'faq') : legaware_section_faq(); endif;
    endwhile;
  endif;
  return ob_get_flush();
}


/*==================================================================================
  BLOCKS
==================================================================================*/
// add your custom sections here...

/* TEXT
/––––––––––––––––––––––––*/
function stanlee_section_text() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-text.php');
  return ob_get_flush();
}
/* TEXT + IMAGE
/––––––––––––––––––––––––*/
function stanlee_section_text_img() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-text-image.php');
  return ob_get_flush();
}

/* LINK
/––––––––––––––––––––––––*/
function stanlee_section_link() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-link.php');
  return ob_get_flush();
}

/* SERVICES
/––––––––––––––––––––––––*/
function stanlee_section_services() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-services.php');
  return ob_get_flush();
}

/* TEAM
/––––––––––––––––––––––––*/
function stanlee_section_team() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-team.php');
  return ob_get_flush();
}

/* PORTFOLIO
/––––––––––––––––––––––––*/
function stanlee_section_portfolio() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-portfolio.php');
  return ob_get_flush();
}

/* TESTIMONIALS
/––––––––––––––––––––––––*/
function stanlee_section_testimonials() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-testimonials.php');
  return ob_get_flush();
}

/* PRICE
/––––––––––––––––––––––––*/
function stanlee_section_price() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-price.php');
  return ob_get_flush();
}

/* LOGOS
/––––––––––––––––––––––––*/
function stanlee_section_logos() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-logos.php');
  return ob_get_flush();
}

/* CAROUSEL
/––––––––––––––––––––––––*/
function stanlee_section_carousel() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-carousel.php');
  return ob_get_flush();
}

/* GALLERY
/––––––––––––––––––––––––*/
function stanlee_section_gallery() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-gallery.php');
  return ob_get_flush();
}

/* CONTACT
/––––––––––––––––––––––––*/
function stanlee_section_contact() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-contact.php');
  return ob_get_flush();
}

/* STATS
/––––––––––––––––––––––––*/
function stanlee_section_stats() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-stats.php');
  return ob_get_flush();
}

/* FAQ
/––––––––––––––––––––––––*/
function legaware_section_faq() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/section-faq.php');
  return ob_get_flush();
}

?>
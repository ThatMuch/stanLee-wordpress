<?php
/**
 * functions to output ACFs flexible blocks (called "blocks" in _s)
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
function _s_blocks_backendtitle( $title, $field, $layout, $i ) {
  if (!empty(get_sub_field('title'))) {
  	$title = get_sub_field('title')." ($title)";
  }
  return $title;
}
add_filter('acf/fields/flexible_content/layout_title/name=blocks', '_s_blocks_backendtitle', 10, 4);


/* GATHER BLOCKS
/––––––––––––––––––––––––*/
function _s_blocks() {
  ob_start('sanitize_output');
  if (have_rows('blocks')):
    while (have_rows('blocks')): the_row();
      if (get_row_layout() == 'text') : _s_block_text(); endif;
      if (get_row_layout() == 'text_image') : _s_block_text_img(); endif;
      if (get_row_layout() == 'link') : _s_block_link(); endif;
      if (get_row_layout() == 'services') : _s_block_services(); endif;
      if (get_row_layout() == 'team') : _s_block_team(); endif;
      if (get_row_layout() == 'portfolio') : _s_block_portfolio(); endif;
      if (get_row_layout() == 'testimonials') : _s_block_testimonials(); endif;
      if (get_row_layout() == 'price') : _s_block_price(); endif;
      if (get_row_layout() == 'logos') : _s_block_logos(); endif;
      if (get_row_layout() == 'carousel') : _s_block_carousel(); endif;
      if (get_row_layout() == 'gallery') : _s_block_gallery(); endif;
      if (get_row_layout() == 'contact') : _s_block_contact(); endif;
      if (get_row_layout() == 'stats') : _s_block_stats(); endif;
    endwhile;
  endif;
  return ob_get_flush();
}


/*==================================================================================
  BLOCKS
==================================================================================*/
// add your custom blocks here...

/* TEXT
/––––––––––––––––––––––––*/
function _s_block_text() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-text.php');
  return ob_get_flush();
}
/* TEXT + IMAGE
/––––––––––––––––––––––––*/
function _s_block_text_img() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-text-image.php');
  return ob_get_flush();
}

/* LINK
/––––––––––––––––––––––––*/
function _s_block_link() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-link.php');
  return ob_get_flush();
}

/* SERVICES
/––––––––––––––––––––––––*/
function _s_block_services() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-services.php');
  return ob_get_flush();
}

/* TEAM
/––––––––––––––––––––––––*/
function _s_block_team() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-team.php');
  return ob_get_flush();
}

/* PORTFOLIO
/––––––––––––––––––––––––*/
function _s_block_portfolio() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-portfolio.php');
  return ob_get_flush();
}

/* TESTIMONIALS
/––––––––––––––––––––––––*/
function _s_block_testimonials() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-testimonials.php');
  return ob_get_flush();
}

/* PRICE
/––––––––––––––––––––––––*/
function _s_block_price() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-price.php');
  return ob_get_flush();
}

/* LOGOS
/––––––––––––––––––––––––*/
function _s_block_logos() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-logos.php');
  return ob_get_flush();
}

/* CAROUSEL
/––––––––––––––––––––––––*/
function _s_block_carousel() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-carousel.php');
  return ob_get_flush();
}

/* GALLERY
/––––––––––––––––––––––––*/
function _s_block_gallery() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-gallery.php');
  return ob_get_flush();
}

/* CONTACT
/––––––––––––––––––––––––*/
function _s_block_contact() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-contact.php');
  return ob_get_flush();
}

/* STATS
/––––––––––––––––––––––––*/
function _s_block_stats() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-stats.php');
  return ob_get_flush();
}

?>
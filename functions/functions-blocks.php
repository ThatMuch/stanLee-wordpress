<?php
/**
 * functions to output ACFs flexible blocks (called "blocks" in Stanlee)
 *
 * @author     ThatMuch
 * @version    0.1.0
 * @since      Stanlee 0.1.0
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
function Stanlee_blocks_backendtitle( $title, $field, $layout, $i ) {
  if (!empty(get_sub_field('title'))) {
  	$title = get_sub_field('title')." ($title)";
  }
  return $title;
}
add_filter('acf/fields/flexible_content/layout_title/name=blocks', 'Stanlee_blocks_backendtitle', 10, 4);


/* GATHER BLOCKS
/––––––––––––––––––––––––*/
function Stanlee_blocks() {
  ob_start('sanitize_output');
  if (have_rows('blocks')):
    while (have_rows('blocks')): the_row();
      if (get_row_layout() == 'text') : Stanlee_block_text(); endif;
      if (get_row_layout() == 'text_image') : Stanlee_block_text_img(); endif;
      if (get_row_layout() == 'link') : Stanlee_block_link(); endif;
      if (get_row_layout() == 'services') : Stanlee_block_services(); endif;
      if (get_row_layout() == 'team') : Stanlee_block_team(); endif;
      if (get_row_layout() == 'portfolio') : Stanlee_block_portfolio(); endif;
      if (get_row_layout() == 'testimonials') : Stanlee_block_testimonials(); endif;
      if (get_row_layout() == 'price') : Stanlee_block_price(); endif;
      if (get_row_layout() == 'logos') : Stanlee_block_logos(); endif;
      if (get_row_layout() == 'carousel') : Stanlee_block_carousel(); endif;
      if (get_row_layout() == 'gallery') : Stanlee_block_gallery(); endif;
      if (get_row_layout() == 'contact') : Stanlee_block_contact(); endif;
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
function Stanlee_block_text() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-text.php');
  return ob_get_flush();
}
/* TEXT + IMAGE
/––––––––––––––––––––––––*/
function Stanlee_block_text_img() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-text-image.php');
  return ob_get_flush();
}

/* LINK
/––––––––––––––––––––––––*/
function Stanlee_block_link() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-link.php');
  return ob_get_flush();
}

/* SERVICES
/––––––––––––––––––––––––*/
function Stanlee_block_services() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-services.php');
  return ob_get_flush();
}

/* TEAM
/––––––––––––––––––––––––*/
function Stanlee_block_team() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-team.php');
  return ob_get_flush();
}

/* PORTFOLIO
/––––––––––––––––––––––––*/
function Stanlee_block_portfolio() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-portfolio.php');
  return ob_get_flush();
}

/* TESTIMONIALS
/––––––––––––––––––––––––*/
function Stanlee_block_testimonials() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-testimonials.php');
  return ob_get_flush();
}

/* PRICE
/––––––––––––––––––––––––*/
function Stanlee_block_price() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-price.php');
  return ob_get_flush();
}

/* LOGOS
/––––––––––––––––––––––––*/
function Stanlee_block_logos() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-logos.php');
  return ob_get_flush();
}

/* CAROUSEL
/––––––––––––––––––––––––*/
function Stanlee_block_carousel() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-carousel.php');
  return ob_get_flush();
}

/* GALLERY
/––––––––––––––––––––––––*/
function Stanlee_block_gallery() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-gallery.php');
  return ob_get_flush();
}

/* CONTACT
/––––––––––––––––––––––––*/
function Stanlee_block_contact() {
  ob_start('sanitize_output');
    include (get_template_directory().'/templates/temp-blocks-contact.php');
  return ob_get_flush();
}

?>
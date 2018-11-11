<?php
/**
 * Theme-settings and general functions that normally don't need much editing
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       undefined 0.1.0
 *
 *
 */


/*==================================================================================
 Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 THEME SETTINGS
    1.1 enqueue scripts/styles
    1.2 theme support

  2.0 GENERAL SETTINGS
    2.1 wphead cleanup
    2.2 loag og-tags
    2.3 preload fonts
    2.4 get cache-busted css file
    2.5 allow svg uploads
    2.6 reset inline image dimensions (for css-scaling of images)
    2.7 reset image-processing
    2.8 hide core-updates for non-admins
    2.9 disable backend-theme-editor
    2.10 load textdomain (based on locale)
    2.11 manage excerpt length
==================================================================================*/



/*==================================================================================
  1.0 THEME SETTINGS
==================================================================================*/


/* 1.1 ENQUEUE SCRIPTS/STYLES
/––––––––––––––––---––––––––*/
// enqueues  sctipts and styles (optional typekit embed)
// » https://developer.wordpress.org/reference/functions/wp_enqueue_script/
function stanlee_enqueue() {
  // load bootstrap css
	// wp_enqueue_style( 'wp-bootstrap-starter-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );
  // fontawesome cdn
  wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css' );
  // jQuery (from wp core)
  wp_deregister_script( 'jquery' );
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, '3.3.1');
  wp_enqueue_script( 'jquery' );
  // scripts
  wp_register_script('stanlee/scripts', get_template_directory_uri() . '/script.min.js', false, array( 'jquery' ), true);
  wp_enqueue_script('stanlee/scripts');
  // styles
  wp_enqueue_style('stanlee/styles', get_template_directory_uri() . stanlee_get_cachebusted_css(), false, null);
  // Typekit
  global $typekit_id;
  if ($typekit_id) :
    wp_enqueue_style('typekit/styles', 'https://use.typekit.net/'.$typekit_id.'.css', false, null);
  endif;
    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

  	// load bootstrap js
    wp_enqueue_script('wp-bootstrap-starter-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true );
	  wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true );
    wp_enqueue_script('wp-bootstrap-starter-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true );
	  wp_enqueue_script( 'wp-bootstrap-starter-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );
}
add_action('wp_enqueue_scripts', 'stanlee_enqueue');


/* 1.2 THEME SUPPORT
/––––––––––––––––––––––––*/
function stanlee_theme_support()  {

  // Enable plugins to manage the document title
  // => http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support( 'title-tag');

  // Add Theme Support for Menus
  // => http://codex.wordpress.org/Navigation_Menus
  add_theme_support('menus');

  // Add HTML5 markup for search forms, comment forms, comment lists, gallery, and caption
  // => https://codex.wordpress.org/Theme_Markup
  add_theme_support('html5');

  // Add Theme Support for Post thumbnails
  // => http://codex.wordpress.org/Post_Thumbnails
  // => http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // => http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

}
add_action( 'after_setup_theme', 'stanlee_theme_support');


/*==================================================================================
  2.0 GENERAL SETTINGS
==================================================================================*/


/* 2.1 WPHEAD CLEANUP
/––––––––––––––––––––––––*/
// remove unused stuff from wp_head()

function stanlee_wphead_cleanup () {
  // remove the generator meta tag
  remove_action('wp_head', 'wp_generator');
  // remove wlwmanifest link
  remove_action('wp_head', 'wlwmanifest_link');
  // remove RSD API connection
  remove_action('wp_head', 'rsd_link');
  // remove wp shortlink support
  remove_action('wp_head', 'wp_shortlink_wp_head');
  // remove next/previous links (this is not affecting blog-posts)
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
  // remove generator name from RSS
  add_filter('the_generator', '__return_false');
  add_filter('show_admin_bar','__return_false');
  // disable emoji support
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');
  // disable automatic feeds
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'feed_links', 2);
  // remove rest API link
  remove_action( 'wp_head', 'rest_output_link_wp_head', 10);
  // remove oEmbed link
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);
  remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('after_setup_theme', 'stanlee_wphead_cleanup');


/* 2.2 LOAG OG-TAGS
/––––––––––––––––––––––––*/
// loads open graph tags » http://ogp.me/
// use 'stanlee_load_ogtags(true)' to also display the og:image tag
function stanlee_ogtags() {
  echo '
  <meta property="og:title" content="'.get_bloginfo('name').' - '.get_the_title().'">
  <meta property="og:type" content="website">
  <meta property="og:url" content="'.get_bloginfo('url').'">
  <meta property="og:site_name" content="'.get_bloginfo('name').'">
  <meta property="og:description" content="'.get_bloginfo('description').'">';
  GLOBAL $ogimg;
  if ($ogimg[0][1]) :
    echo '
    <meta property="og:image" content="'.get_bloginfo('template_url').$ogimg[1][1].'">
    <meta property="og:image:secure_url" content="'.get_bloginfo('template_url').$ogimg[1][1].'">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="'.$ogimg[2][1].'">
    <meta property="og:image:height" content="'.$ogimg[3][1].'">
    <meta property="og:image:alt" content='.$ogimg[4][1].'">';
  endif;
}

/* 2.3 PRELOAD FONTS
/––––––––––––––––––––––––*/
// preloads fonts that are hosted locally into the page header
// add your desired fonts and font-types into $font_names and $font_formats
function stanlee_preload_fonts() {
  // font_names and font_formats are defined in 'functions-setup.php'
  global $font_names;
  global $font_formats;
  // define font folder
  $font_folder = '/assets/fonts/';
  // loop through fonts
  foreach($font_names as $font_name) {
    // loop through font-formats
    foreach($font_formats as $font_format) {
      $path = get_bloginfo('template_url').$font_folder.$font_name.'.'.$font_format;
      echo '<link rel="preload" href="'.$path.'" as="font" type="font/'.$font_format.'" crossorigin="anonymous">'."\r\n";
    }
  }
}



/* 2.4 GET CACHE-BUSTED CSS FILE
/––––––––––––––––––––––––––––––*/
// get the url to the busted css-file, or the default css-file if working locally (on the TLD `.vm`)
// the busted css file is generated by `gulp cachebust` and is located through dist/rev-manifest.json
function stanlee_get_cachebusted_css() {
  $current_tld = substr(strrchr(get_bloginfo('url'),"."),1);
  if ($current_tld == 'vm') :
    $css_src = '/style.min.css';
  else :
    $css_manifest_url = get_template_directory_uri() . '/rev-manifest.json';
    $css_manifest_content = json_decode(file_get_contents($css_manifest_url), true);
    $css_src = '/'.$css_manifest_content['style.min.css'];
  endif;
  return $css_src;
}


/* 2.5 ALLOW SVG UPLOADS
/–––––––––––––––––––––––*/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/* 2.6 RESET INLINE IMAGE DIMENSIONS (FOR CSS-SCALING OF IMAGES)
/–––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––*/
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);


/* 2.7 RESET IMAGE-PROCESSING
/––––––––––––––––––––––––*/
add_filter('jpeg_quality', function($arg){return 100;});
add_filter('wp_editor_set_quality', function($arg){return 100;});


/* 2.8 HIDE CORE-UPDATES FOR NON-ADMINS
/––––––––––––––––––––––––––––––––––––*/
function onlyadmin_update() {
  if (!current_user_can('update_core')) { remove_action( 'admin_notices', 'update_nag', 3 ); }
}
add_action( 'admin_head', 'onlyadmin_update', 1 );


/* 2.9 DISABLE BACKEND-THEME-EDITOR
/–––––––––––––––––––––––––––––––––*/
/* function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1); */


/* 2.10 LOAD TEXTDOMAIN (BASED ON LOCALE)
/––––––––––––––––––––––––––––––––––––––*/
load_theme_textdomain('_s', get_template_directory() . '/languages');

/* 2.11 MANAGE EXCERPT LENGTH
/––––––––––––––––––––––––––––––––––––––*/
function wp_trim_all_excerpt($text)
{
    global $post;
    if ('' == $text ) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
    }
    $text = strip_shortcodes($text);
    $text = strip_tags($text);
    $excerpt_length = apply_filters('excerpt_length', 30);
    $excerpt_more = apply_filters('excerpt_more', ' ... ' . '<a class="read-more" href="' . get_permalink($post->ID) . '">' . 'Plus' . '</a>');
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words)> $excerpt_length) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
    return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_trim_all_excerpt');
?>
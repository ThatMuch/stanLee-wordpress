<?php
/**
 * Theme-settings and general functions that normally don't need much editing
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0
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
    2.4 allow svg uploads
    2.5 reset inline image dimensions (for css-scaling of images)
    2.6 reset image-processing
    2.7 hide core-updates for non-admins
    2.8 disable backend-theme-editor
    2.9 load textdomain (based on locale)
    2.10 manage excerpt length
==================================================================================*/



/*==================================================================================
  1.0 THEME SETTINGS
==================================================================================*/


/* 1.1 ENQUEUE SCRIPTS/STYLES
/––––––––––––––––---––––––––*/
// enqueues  sctipts and styles (optional typekit embed)
// » https://developer.wordpress.org/reference/functions/wp_enqueue_script/
function _s_enqueue() {
  // jQuery (from wp core)
  wp_deregister_script( 'jquery' );
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, '3.6.0');
  wp_enqueue_script( 'jquery' );
  // scripts
  wp_register_script('mCC_/scripts', get_template_directory_uri() . '/assets/scripts/custom.min.js', false, array( 'jquery' ), true);
  wp_enqueue_script('mCC_/scripts');
  // Font Awesome
  wp_register_script('mCC_/fontawesome', "https://kit.fontawesome.com/6cb6362892.js");
  wp_enqueue_script('mCC_/fontawesome');

  // styles
  wp_enqueue_style('mCC_/styles', get_template_directory_uri() . '/assets/styles/style.min.css', false, null);
  // Typekit
  global $typekit_id;
  if ($typekit_id) :
    wp_enqueue_style('typekit/styles', 'https://use.typekit.net/'.$typekit_id.'.css', false, null);
  endif;
    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

}

add_action('wp_enqueue_scripts', '_s_enqueue');

// Admin Style
function my_custom_admin_stylesheet() {
    wp_enqueue_style( 'custom-admin', get_stylesheet_directory_uri() . '/admin_style.min.css' );
}

//This loads the function above on the login page
add_action( 'admin_enqueue_scripts', 'my_custom_admin_stylesheet' );

// Login Style
function my_custom_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/login_style.min.css' );
}

//This loads the function above on the login page
add_action( 'login_enqueue_scripts', 'my_custom_login_stylesheet' );

/* 1.2 THEME SUPPORT
/––––––––––––––––––––––––*/
function _s_theme_support()  {

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
add_action( 'after_setup_theme', '_s_theme_support');


/*==================================================================================
  2.0 GENERAL SETTINGS
==================================================================================*/


/* 2.1 WPHEAD CLEANUP
/––––––––––––––––––––––––*/
// remove unused stuff from wp_head()

function _s_wphead_cleanup () {
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
add_action('after_setup_theme', '_s_wphead_cleanup');


/* 2.2 LOAG OG-TAGS
/––––––––––––––––––––––––*/
// loads open graph tags » http://ogp.me/
// use '_s_load_ogtags(true)' to also display the og:image tag
function _s_ogtags() {
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
function _s_preload_fonts() {
 // font_names and font_formats are defined in 'functions-setup.php'
  global $preload_fonts;
  if ($preload_fonts) {
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
}


/* 2.4 ALLOW SVG UPLOADS
/–––––––––––––––––––––––*/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/* 2.5 RESET INLINE IMAGE DIMENSIONS (FOR CSS-SCALING OF IMAGES)
/–––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––*/
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);


/* 2.6 RESET IMAGE-PROCESSING
/––––––––––––––––––––––––*/
add_filter('jpeg_quality', function($arg){return 100;});
add_filter('wp_editor_set_quality', function($arg){return 100;});


/* 2.7 HIDE CORE-UPDATES FOR NON-ADMINS
/––––––––––––––––––––––––––––––––––––*/
function onlyadmin_update() {
  if (!current_user_can('update_core')) { remove_action( 'admin_notices', 'update_nag', 3 ); }
}
add_action( 'admin_head', 'onlyadmin_update', 1 );


/* 2.8 DISABLE BACKEND-THEME-EDITOR
/–––––––––––––––––––––––––––––––––*/
/* function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1); */


/* 2.9 LOAD TEXTDOMAIN (BASED ON LOCALE)
/––––––––––––––––––––––––––––––––––––––*/
load_theme_textdomain('_s', get_template_directory() . '/languages');

/* 2.10 MANAGE EXCERPT LENGTH
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

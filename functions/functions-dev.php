<?php
/**
 * Functions used for development purposes.
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0
 *
 */


/*=======================================================
Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 CODING TOOLKIT
    1.1 debug / dump'n die
    1.2 is ajax/pjax request
    1.3 variables
    1.4 string shortener
    1.5 url check
    1.6 slugify

  2.0 OUTPUT TOOLKIT
    2.1 google tag manager
    2.2 sanitizer
    2.3 blog related

  3.0 ACCESS TOOLKIT
    3.1 ip check
    3.2 login page
    3.3 logged-in-only
=======================================================*/



/*==================================================================================
  1.0 CODING TOOLKIT
==================================================================================*/


/* 1.1 DEBUG / DUMP'N DIE
/––––––––––––––––––––––––*/
function debug($var) {
  echo '<pre>'.var_dump($var).'</pre>';
}
function dd($var) {
  echo '<pre>'.var_dump($var).'</pre>';
  die();
}


/* 1.2 is AJAX/PJAX Request
/––––––––––––––––––––––––*/
function is_ajax_request() {
  return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}
function is_pjax_request() {
  return !empty($_SERVER['X-PJAX']) && $_SERVER['X-PJAX'] === true;
}


/* 1.3 VARIABLES
/––––––––––––––––––––––––*/
$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$loremipsum = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.';


/* 1.4 STRING SHORTENER
/––––––––––––––––––––––––*/
// shorten strings and append ...
function shorten($string,$length,$append="...") {
  $string = trim($string);
  if(strlen($string) > $length) {
    $string  = substr($string, 0, $length);
    $string .= $append;
  }
  return $string;
}


/* 1.5 URL CHECK
/––––––––––––––––––––––––*/
// searche url by string
// note: also consider using basename($url) or basename(dirname($url)) => http://php.net/manual/de/function.basename.php
function urlcontains($string) {
  if (strpos('https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'],$string) == true) {
    return true;
  }
}


/* 1.6 SLUGIFY
/––––––––––––––––––––––––*/
// create slugs
// example: "LORÖM %< 123+ ipsüm!" will be "loroem-123-ipsuem-"
function slugify($text) {
  // trim (remove whitespace before/after string)
  $text = trim($text, '-');
  // replace umlaute
  $text = preg_replace (['/ä/','/ö/','/ü/','/ß/'] , ['ae','oe','ue','ss'], $text);
  // replace special symbols
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  // set lowercase
  $text = strtolower($text);
  return $text;
 }



/*==================================================================================
  2.0 OUTPUT TOOLKIT
==================================================================================*/


/* 2.1 GOOGLE TAG MANAGER
/––––––––––––––––––––––––*/
// outputs one of the two parts of the Google Tag Manager scripts
// Usage: gtm('head', 'GTM-1234567) and gtm('body', 'GTM-1234567)
function _s_gtm($type) {
  global $GTM_id;
  if ($GTM_id) :
    if ($type == 'head') : ?>
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?= $GTM_id ?>');</script>
      <?
    elseif ($type == 'body') : ?>
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= $GTM_id ?>"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <?
    endif;
  endif;
}


/* 2.2 SANITIZER
/––––––––––––––––––––––––*/
function sanitize_output($buffer) {
  $search = ['/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s'];
  $replace = ['>', '<', '\\1'];
  $buffer = preg_replace($search, $replace, $buffer);
  return $buffer;
}


/* 2.3 BLOG RELATED
/––––––––––––––––––––––––*/

// return formatted post-date in german
function get_the_date_stanlee() {
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'stanlee-starter' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'stanlee-starter' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span> | <span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo ' | <span class="comments-link"><i class="fa fa-comments" aria-hidden="true"></i> ';
        /* translators: %s: post title */
        comments_popup_link( sprintf( wp_kses( __( '<span class="screen-reader-text"> %s</span>', 'stanlee-starter' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
        echo '</span>';
    }
}

// edit «read more» button
add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
  return ' <span class="readmore"><a href="' . get_permalink() . '">[mehr...]</a>';
}



/*==================================================================================
  3.0 ACCESS TOOLKIT
==================================================================================*/

/* 3.1 IP CHECK
/––––––––––––––––––––––––*/
// add your own ip here
function is_me() {
  return $_SERVER['REMOTE_ADDR'] === '11.111.111.11';
}


/* 3.2 LOGIN PAGE
/––––––––––––––––––––––––*/
function is_login_page() {
  return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}


/* 3.3 RESTRICT ACCES IF NOT LOGGEDIN
/––––––––––––––––––––––––––––––––––––*/
// redirect all users that are not logged-in to login
// remove `false && ` to activate
if (false && !is_user_logged_in() && is_main_query() && !is_admin() && !is_login_page()){
  wp_redirect('/admin'); die();
}
?>
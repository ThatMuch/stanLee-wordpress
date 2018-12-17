<?
/**
 * @author      _a
 * @version     0.1.0
 * @since       _s 0.1.0
 */
?>
<!DOCTYPE html>
<html <? language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <? stanlee_gtm('head') ?>
    <!--=== OPEN-GRAPH TAGS ===-->
    <? stanlee_ogtags() ?>
    <!--=== PRELOAD FONTS ===-->
    <? stanlee_preload_fonts() ?>
    <!--=== WP HEAD ===-->
    <? wp_head(); ?>
  </head>

  <body>
    <? stanlee_gtm('body') ?>

     <? $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand" href="<?php echo site_url(); ?>">
    <div class="logo" style="background-image: url('<? if($image[0]): echo $image[0]; else: echo get_template_directory_uri()?>/assets/images/stanlee_logo_texte.png<?endif; ?>')"></div>
  </a>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-content">


        <?php
        wp_nav_menu( array(
            'theme_location' => 'mainmenu', // Defined when registering the menu
            'menu_id'        => 'menu-main',
            'container'      => false,
            'depth'          => 2,
            'menu_class'     => 'navbar-nav ml-auto',
            'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
            'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
        ) );
        ?>
    </div>
  </div>
</nav>
<?php if ( is_home()): ?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
<?php endif; ?>
    <div id="content" class="site-content">

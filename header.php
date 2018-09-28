<?
/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 */
?>
<!DOCTYPE html>
<html <? language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <? Stanlee_gtm('head') ?>
    <!--=== OPEN-GRAPH TAGS ===-->
    <? Stanlee_ogtags() ?>
    <!--=== PRELOAD FONTS ===-->
    <? Stanlee_preload_fonts() ?>
    <!--=== WP HEAD ===-->
    <? wp_head(); ?>
  </head>

  <body>
    <? Stanlee_gtm('body') ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand" href="<?php echo site_url(); ?>"> <div class="logo"></div> </a>
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

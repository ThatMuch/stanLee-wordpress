<?
/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       undefined 0.1.0
 */
?>

<? if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-sm-12 col-lg-4" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->

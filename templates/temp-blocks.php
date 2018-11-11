<?
/**
 * Template for ACF flexible elements
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       undefined 0.1.0
 *
 *
 */
?>
<? /* Template Name: Blocks */ ?>

<? get_header(); ?>

<main id="blocks">

  <? if (have_posts()): while (have_posts()): the_post() ?>

    <? stanlee_blocks() ?>
  <? endwhile; endif ?>

</main>

<? get_footer() ?>

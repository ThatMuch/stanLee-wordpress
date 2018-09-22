<?
/**
 * Template for ACF flexible elements
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 *
 *
 */
?>
<? /* Template Name: Blocks */ ?>

<? get_header(); ?>

<main id="blocks">

  <? if (have_posts()): while (have_posts()): the_post() ?>

    <? Stanlee_blocks() ?>
  <? endwhile; endif ?>

</main>

<? get_footer() ?>

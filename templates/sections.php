<?
/**
 * Template for ACF flexible elements
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s 0.1.0
 *
 *
 */
?>
<? /* Template Name: Sections */ ?>

<? get_header(); ?>

<main id="sections">

  <? if (have_posts()): while (have_posts()): the_post() ?>

    <? stanlee_sections() ?>
  <? endwhile; endif ?>

</main>

<? get_footer() ?>

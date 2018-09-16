<?
/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 */
?>

<? get_header(); ?>

<main id="page">

  <? if (has_post_thumbnail()) : ?>
    <section>
      <div class="element teaser">
        <? the_post_thumbnail('large', ['class' => 'modernizr-of']); ?>
      </div>
    </section>
  <? endif?>

  <section>
    <? while (have_posts()) : the_post(); ?>
      <article>
        <h1><? the_title(); ?></h1>
        <? the_content(); ?>
      </article>
    <? endwhile; ?>
  </section>

</main>

<? get_footer(); ?>

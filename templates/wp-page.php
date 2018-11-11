<?
/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       undefined 0.1.0
 */
?>

<? get_header(); ?>
<div class="container">

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
</div>


<? get_footer(); ?>

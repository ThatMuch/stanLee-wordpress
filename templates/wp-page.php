<?
/**
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0
 */
?>

<?php get_header(); ?>
<div class="container">

<main id="page">

  <?php if (has_post_thumbnail()) : ?>
    <section>
      <div class="element teaser">
        <?php the_post_thumbnail('large', ['class' => 'modernizr-of']); ?>
      </div>
    </section>
  <?php endif?>

  <section>
    <?php while (have_posts()) : the_post(); ?>
      <article>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </article>
    <?php endwhile; ?>
  </section>

</main>
</div>


<?php get_footer(); ?>

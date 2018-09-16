<?
/**
 * The template displaying the posts-overview
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 */

?>

<? get_header(); ?>

  <main id="blog" class="content-area col-sm-12 col-lg-8">

    <section>
      <? if (have_posts() ) : while (have_posts()) : the_post(); ?>
        <article>
          <h2 class="entry-title"><a href="<? the_permalink()?>"><? the_title(); ?></a></h2>
          <div class="postinfo"><?= get_the_date_stanlee(); ?></div>
          <? the_post_thumbnail('large', ['class' => 'modernizr-of']); ?>
          <? the_excerpt(); ?>
        </article>
      <? endwhile; endif; ?>
    </section>

  </main>

<? get_sidebar(); ?>
<? get_footer(); ?>

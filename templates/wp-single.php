<?
/**
 * The template for displaying all single posts and attachments
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 */
?>

<? get_header(); ?>

<main id="post" class="content-area col-sm-12 col-lg-8">

  <section>
    <? if (have_posts() ) : while (have_posts()) : the_post(); ?>
      <article>
        <h2><? the_title(); ?></h2>
        <div class="postinfo"><?= get_the_date_stanlee(); ?></div>
        <div class="entry-meta">
		</div><!-- .entry-meta -->
        <? the_post_thumbnail('large', ['class' => 'modernizr-of']); ?>
        <? the_content(); ?>
      </article>
    <? endwhile; endif; ?>
  </section>

</main>
<? get_sidebar();?>
<? get_footer(); ?>

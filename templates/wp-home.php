<?
/**
 * The template displaying the posts-overview
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       undefined 0.1.0
 */

?>

<? get_header(); ?>
<div class="container">
  <div class="row">
  <main id="blog" class="content-area col-sm-12 col-lg-8">

    <section>
      <? if (have_posts() ) : while (have_posts()) : the_post(); ?>
        <article>
          <div class="row">
            <? if (has_post_thumbnail($post->ID)): ?>
              <div class="col-sm-4">
                <? the_post_thumbnail('large', ['class' => 'modernizr-of']); ?>
              </div>
            <? endif; ?>
            <div class="<? if (has_post_thumbnail($post->ID)): ?> col-sm-8 <? else : ?> col-sm-12<?endif; ?>">
              <h2 class="entry-title"><a href="<? the_permalink()?>"><? the_title(); ?></a></h2>
              <? the_excerpt(); ?>
              <hr>
              <div class="postinfo"><?= get_the_date_stanlee(); ?></div>
            </div>
          </div>
        </article>
      <? endwhile; endif; ?>
<? the_posts_pagination( array(
	'mid_size'  => 2,
	'prev_text' => __( '<', 'stanlee' ),
  'next_text' => __( '>', 'stanlee' ),
  'screen_reader_text' => __( '&nbsp;' )
) ); ?>

    </section>

  </main>

<? get_sidebar(); ?>
  </div>
</div>
<? get_footer(); ?>

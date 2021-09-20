<?
/**
 * The template displaying the posts-overview
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0
 */

?>

<?php get_header(); ?>
<div class="container">
  <div class="row">
  <main id="blog" class="content-area col-sm-12 col-lg-8">

    <section>
      <?php if (have_posts() ) : while (have_posts()) : the_post(); ?>
        <article>
          <div class="row">
            <?php if (has_post_thumbnail($post->ID)): ?>
              <div class="col-sm-4">
                <?php the_post_thumbnail('large', ['class' => 'modernizr-of']); ?>
              </div>
            <?php endif; ?>
            <div class="<?php if (has_post_thumbnail($post->ID)): ?> col-sm-8 <?php else : ?> col-sm-12<?endif; ?>">
              <h2 class="entry-title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h2>
              <?php the_excerpt(); ?>
              <hr>
              <div class="postinfo"><?php echo  get_the_date_stanlee(); ?></div>
            </div>
          </div>
        </article>
      <?php endwhile; endif; ?>
<?php the_posts_pagination( array(
	'mid_size'  => 2,
	'prev_text' => __( '<', 'stanlee' ),
  'next_text' => __( '>', 'stanlee' ),
  'screen_reader_text' => __( '&nbsp;' )
) ); ?>

    </section>

  </main>

<?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>

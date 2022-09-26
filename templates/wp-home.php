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
  <main id="blog" class="content-area">
      <?php if (have_posts() ) : while (have_posts()) : the_post(); ?>
          <div class="article__content">
						<div class="thumbnail">
								<?php if (has_post_thumbnail($post->ID)): ?>
                <?php the_post_thumbnail('medium'); ?>
								<?php endif; ?>
              </div>
            <div>
              <h2 class="entry-title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h2>
              <?php the_excerpt(); ?>
              <hr>
              <div class="postinfo">
								<?php echo  get_the_date_stanlee(); ?>
							</div>
            </div>
          </div>

      <?php endwhile; endif; ?>
  </main>
<?php get_sidebar(); ?>
</div>
<div class="pagination">
			<?php the_posts_pagination( array(
				'mid_size'  => 2,
				'prev_text' => __( '<', 'stanlee' ),
				'next_text' => __( '>', 'stanlee' ),
				'screen_reader_text' => __( '&nbsp;' )
			) ); ?>
</div>
<?php get_footer(); ?>

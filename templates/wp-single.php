<?
/**
 * The template for displaying all single posts and attachments
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0
 */
?>

<?php get_header(); ?>
<div class="container content-area">
  <main id="post">
			<?php if (have_posts() ) : while (have_posts()) : the_post(); ?>
				<article>
					<h1><?php the_title(); ?></h1>
					<div class="postinfo"><?php echo  get_the_date_stanlee(); ?></div>
					<div class="entry-meta">
			</div><!-- .entry-meta -->
					<?php the_post_thumbnail('large'); ?>
					<?php the_content(); ?>
				</article>
			<?php endwhile; endif; ?>
</main>
<?php get_sidebar();?>
</div>

<?php get_footer(); ?>

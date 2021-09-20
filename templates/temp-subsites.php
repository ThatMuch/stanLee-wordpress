<?
/**
 * Template for Sites with Sub-Sites.
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s0.2
 *
 */
?>
<?php /* Template Name: Subsites */ ?>

<?php get_header(); ?>

  <main id="subsites">

    <?php if (have_posts() ) : while (have_posts()) : the_post(); ?>
      <section>
        <div class="element overview">
          <h1><?php the_title(); ?></h1>
          <p><?php the_content(); ?><p>
        </div>
      </section>
    <?php endwhile; endif; ?>

    <?php // Child Pages
    $args = [
      'post_type'      => 'page',
      'posts_per_page' => -1,
      'post_parent'    => $post->ID,
      'order'          => 'ASC',
      'orderby'        => 'menu_order'
     ];
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) : ?>
      <section>
        <div class="element sites">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="site">
              <h2><?php the_title(); ?></h2>
              <?php the_post_thumbnail('large', ['class' => 'modernizr-of']); ?>
              <p><?php the_content(); ?></p>
            </div>
          <?php endwhile; ?>
        </div>
      </section>
    <?php endif; wp_reset_query(); ?>

  </main>

<?php get_footer(); ?>

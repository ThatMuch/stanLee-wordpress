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
<? /* Template Name: Subsites */ ?>

<? get_header(); ?>

  <main id="subsites">

    <? if (have_posts() ) : while (have_posts()) : the_post(); ?>
      <section>
        <div class="element overview">
          <h1><? the_title(); ?></h1>
          <p><? the_content(); ?><p>
        </div>
      </section>
    <? endwhile; endif; ?>

    <? // Child Pages
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
          <? while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="site">
              <h2><? the_title(); ?></h2>
              <? the_post_thumbnail('large', ['class' => 'modernizr-of']); ?>
              <p><? the_content(); ?></p>
            </div>
          <? endwhile; ?>
        </div>
      </section>
    <? endif; wp_reset_query(); ?>

  </main>

<? get_footer(); ?>

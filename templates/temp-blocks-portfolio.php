<?
/**
 * Portfolio Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 *
 */
 ?>

  <section id="block-portfolio">
    <!-- Title -->
    <?php if(get_sub_field('title') ) : ?>
        <h2><?php echo get_sub_field('title'); ?></h2>
    <?php endif; ?>
    <!-- Title -->
    <!-- Portfolio -->
    <?php
      $args = array(
      'post_type' => 'portfolio'
      );
       $the_query = new WP_Query($args);
      if ($the_query->have_posts() ): ?>
      <div class="row">
        <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
            <div class="col-sm-3">
                <!-- Image -->
                    <img src="<?php the_post_thumbnail_url( 'medium' )?>" alt="" class="w-100">
                <!-- Image -->
                <!-- Title -->
                    <h5><a href="<?php the_permalink()?>"><?php the_title()?></a></h5>
                <!-- Title -->
            </div>
        <?php $i++; endwhile;?>
      </div>
      <? endif; wp_reset_query();?>
    <!-- Portfolio -->
 </section>
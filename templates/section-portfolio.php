<?
/**
 * Portfolio Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0
 *
 */
 ?>

  <section class="section section-portfolio">
      <div class="container">
          <!-- Title -->
          <?php if(get_sub_field('title') ) : ?>
              <h2 class="section__title"><?php echo get_sub_field('title'); ?></h2>
          <?php endif; ?>
          <!-- Title -->
          <!-- Portfolio -->
          <?php
            $args = array(
            'post_type' => 'portfolio'
            );
             $the_query = new WP_Query($args);
            if ($the_query->have_posts() ): ?>
            <div class="flex-gap">
              <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                  <div class="section-portfolio_item">
                      <!-- Image -->
                      <a href="<?php the_permalink()?>">
                        <img src="<?php the_post_thumbnail_url( 'medium' )?>" alt="">
                    </a>
                      <!-- Image -->
                      <!-- Title -->
                          <h5><a href="<?php the_permalink()?>"><?php the_title()?></a></h5>
                      <!-- Title -->
                  </div>
              <?php $i++; endwhile;?>
            </div>
            <?php endif; wp_reset_query();?>
          <!-- Portfolio -->
      </div>
 </section>

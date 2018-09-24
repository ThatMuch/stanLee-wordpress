<?
/**
 * Testimonials Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 *
 */
 ?>

  <section id="block-testimonials">
      <!-- Title -->
      <?php if(get_sub_field('title') ) : ?>
            <h2><?php echo get_sub_field('title'); ?></h2>
      <?php endif; ?>
      <!-- Title -->

      <?php
      $args = array(
      'post_type' => 'testimonials'
      );
       $the_query = new WP_Query($args);
      if ($the_query->have_posts() ): $i = 0; $y = 0; ?>
            <div id="carouselTestimonials" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                  <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i?>" class="<?php if($i == 0) {echo 'active';
                        } ?>"></li>
                  <?php $i++; endwhile;?>
                  </ol>
                  <div class="carousel-inner">
                        <?php  while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                        <div class="carousel-item <?php if($y == 0) {echo 'active';} ?>">
                              <!-- Image -->
                                    <?php the_post_thumbnail('thumbnail')?>
                              <!-- Image -->
                              <!-- Job -->
                              <?php if (get_field('quote') ) : ?>
                                    <p> <?php echo get_field('quote'); ?></p>
                              <?php endif; ?>
                              <!-- Job -->
                              <!-- Auteur -->
                                    <h5><?php the_title()?></h5>
                              <!-- Auteur -->
                        </div>
                        <? $y++ ; endwhile;?>
                  </div>
                  <a class="carousel-control-prev text-dark" href="#carouselTestimonials" role="button" data-slide="prev">
                        <i class="fas fa-chevron-left fa-2x" aria-hidden="true"></i>
                  </a>
                  <a class="carousel-control-next text-dark" href="#carouselTestimonials" role="button" data-slide="next">
                        <i class="fas fa-chevron-right fa-2x" aria-hidden="true"></i>
                  </a>
            </div>
        <? endif; wp_reset_query(); ?>
 </section>
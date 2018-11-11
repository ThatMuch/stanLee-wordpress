<?
/**
 * Testimonials Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       undefined 0.1.0
 *
 */
 ?>

  <section  class="block-testimonials
  <? if(get_sub_field('fond') == "Couleur"):?> bg-primary
  <? elseif(get_sub_field('fond') == "Gris"):?> bg-light<? endif;?>">
    <!-- Section background: image -->
      <? if(get_sub_field('fond') == "Image"):?>
      <div class="section-background-image"  style="
            <? if(get_sub_field('image')):?>
            background-image:url(<? echo the_sub_field('image') ?>);
            <? endif;?>"></div>
      <? endif;?>
    <!-- Section background: image -->
        <div class="container">
              <?php
              $args = array(
              'post_type' => 'testimonials'
              );
               $the_query = new WP_Query($args);
              if ($the_query->have_posts() ): $i = 0; $y = 0; ?>
                    <div id="carouselTestimonials" class="testimonials-carousel carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators testimonials-carousel-indicators">
                          <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                                <li data-target="#carouselTestimonials" data-slide-to="<?php echo $i?>" class="<?php if($i == 0) {echo 'active';
                                } ?>"></li>
                          <?php $i++; endwhile;?>
                          </ol>
                        <!-- Title -->
                        <?php if(get_sub_field('title') ) : ?>
                              <h2 class="section-title"><?php echo get_sub_field('title'); ?></h2>
                        <?php endif; ?>
                        <!-- Title -->
                          <div class="carousel-inner testimonials-carousel-inner">
                                <?php  while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                                <div class="carousel-item testimonials-carousel-item <?php if($y == 0) {echo 'active';} ?>">
                                    <!-- Image -->
                                    <?php if (get_the_post_thumbnail()) : ?>
                                          <img src="<?php the_post_thumbnail_url('thumbnail')?>" alt="" class="testimonials-carousel-item-image">
                                    <? else : ?>
                                          <div class="testimonials-carousel-item-image"></div>
                                    <? endif;?>
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
                          <a class="carousel-control-prev" href="#carouselTestimonials" role="button" data-slide="prev">
                                <i class="fas fa-chevron-left fa-2x" aria-hidden="true"></i>
                          </a>
                          <a class="carousel-control-next" href="#carouselTestimonials" role="button" data-slide="next">
                                <i class="fas fa-chevron-right fa-2x" aria-hidden="true"></i>
                          </a>
                    </div>
                <? endif; wp_reset_query(); ?>
        </div>
 </section>
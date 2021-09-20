<?
/**
 * Testimonials Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0
 *
 */
 ?>
<?php $background = get_sub_field('background'); ?>
  <section class="section section-testimonials <?php echo  $background == "Couleur" ? "bg-primary" : ($background == "Gris" ? "bg-light" : "bg-white") ?>">
    <!-- Section background: image -->
      <?php if(get_sub_field('background') == "Image"):?>
      <div class="section__background-image"  style="
            <?php if(get_sub_field('image')):?>
            background-image:url(<?php echo the_sub_field('image') ?>);
            <?php endif;?>"></div>
      <?php endif;?>
    <!-- Section background: image -->
        <div class="container">
              <?php
              $args = array(
              'post_type' => 'testimonials'
              );
               $the_query = new WP_Query($args);
              if ($the_query->have_posts() ): $i = 0; $y = 0; ?>
                    <div id="carouselTestimonials" class="section-testimonials__carousel carousel slide" data-ride="carousel">
                        <!-- Title -->
                        <?php if(get_sub_field('title') ) : ?>
                              <h2 class="section__title text-center"><?php echo get_sub_field('title'); ?></h2>
                        <?php endif; ?>
                        <!-- Title -->
                          <div class="carousel-inner">
                                <?php  while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                                <div class="carousel-item section-testimonials__carousel_item <?php if($y == 0) {echo 'active';} ?>">
                                    <!-- Image -->
                                    <?php if (get_the_post_thumbnail()) : ?>
                                          <img src="<?php the_post_thumbnail_url('thumbnail')?>" alt="" class="section-testimonials__carousel_item-image">
                                    <?php else : ?>
                                          <div class="section-testimonials__carousel_item-image"></div>
                                    <?php endif;?>
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
                                <?php $y++ ; endwhile;?>
                              </div>
                                      <ol class="carousel-indicators">
                                <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                                      <li data-bs-target="#carouselTestimonials" data-bs-slide-to="<?php echo $i?>" class="<?php if($i == 0) {echo 'active';
                                      } ?>"></li>
                                <?php $i++; endwhile;?>
                                </ol>
                          <a class="carousel-control-prev" data-bs-target="#carouselTestimonials" role="button" data-bs-slide="prev">
                                <i class="fas fa-chevron-left fa-2x" aria-hidden="true"></i>
                          </a>
                          <a class="carousel-control-next" data-bs-target="#carouselTestimonials" role="button" data-bs-slide="next">
                                <i class="fas fa-chevron-right fa-2x" aria-hidden="true"></i>
                          </a>
                    </div>
                <?php endif; wp_reset_query(); ?>
        </div>
 </section>
<?
/**
 * Carousel Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       undefined 0.1.0
 *
 */
 ?>

  <section class="block-carousel">
      <div class="container">
          <? $images = get_sub_field('images'); ?>
          <? if($images): $i =0; $y =0; ?>
              <!-- Carrousel -->
                  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <!-- Title -->
          <?php if(get_sub_field('title') ) : ?>
              <h2 class="section-title"><?php echo get_sub_field('title'); ?></h2>
          <?php endif; ?>
          <!-- Title -->
                  <ol class="carousel-indicators">
                      <?php foreach( $images as $image ): ?>
                          <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i?>" class="<?php if($i == 0) {echo 'active';} ?>"></li>
                      <?php  $i++; endforeach;?>
                      </ol>
                      <div class="carousel-inner">
                          <?php foreach( $images as $image ): ?>
                              <div class="carousel-item <?php if($y == 0) {echo 'active';} ?>">
                                  <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>"/>
                              </div>
                          <?php  $y++; endforeach;?>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <i class="fas fa-chevron-left fa-2x" aria-hidden="true"></i>
                        </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <i class="fas fa-chevron-right fa-2x" aria-hidden="true"></i>
                      </a>
                  </div>
              <!-- Carrousel -->
          <? endif; ?>
      </div>
 </section>
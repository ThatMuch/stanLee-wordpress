<?
/**
 * Services Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s0.1.0
 *
 */
 ?>
<section class="section-services
<? if(get_sub_field('fond') == "Couleur"):?> bg-primary
  <? elseif(get_sub_field('fond') == "Gris"):?> bg-light<? endif;?>">

        <div class="container">
              <!-- Title -->
              <?php if(get_sub_field('title') ) : ?>
                    <h2 class="section-title"><?php echo get_sub_field('title'); ?></h2>
              <?php endif; ?>
              <!-- Title -->
              <div class="row">
                    <!-- Service -->
                    <?php if (have_rows('service') ) : ?>
                          <?php while( have_rows('service') ) : the_row(); ?>
                          <div class="col-sm-4 service">
                                <!-- Icon -->
                                <?php if (get_sub_field('icon') ) :?>
                                    <span class="service-icon"><? the_sub_field('icon') ?></span>
                                <?php endif; ?>
                                <!-- Icon -->
                                <!-- Icon title -->
                                <?php if(get_sub_field('title') ) : ?>
                                      <h4 class="service-title"><?php echo get_sub_field('title'); ?></h4>
                                <?php endif; ?>
                                <!-- Icon title -->
                                <!-- Texte -->
                                <?php if(get_sub_field('text') ) : ?>
                                      <p class="service-text"> <?php echo get_sub_field('text'); ?></p>
                                <?php endif; ?>
                                <!-- Texte -->
                          </div>
                          <? endwhile; ?>
                    <? endif;?>
                    <!-- Service -->
              </div>
        </div>
 </section>
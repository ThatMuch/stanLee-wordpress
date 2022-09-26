<?
/**
 * Services Block
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
<section class="section section-services <?php echo  $background == "Couleur" ? "bg-primary" : ($background == "Gris" ? "bg-light" : "bg-white") ?>">

        <div class="container">
              <!-- Title -->
              <?php if(get_sub_field('title') ) : ?>
                    <h2 class="section__title"><?php echo get_sub_field('title'); ?></h2>
              <?php endif; ?>
              <!-- Title -->
              <div class="d-flex">
                    <!-- Service -->
                    <?php if (have_rows('service') ) : ?>
                          <?php while( have_rows('service') ) : the_row(); ?>
                          <div class="section-services__item">
                                <!-- Icon -->
                                <?php if (get_sub_field('icon') ) :?>
                                    <span class="section-services__item__icon"><?php the_sub_field('icon') ?></span>
                                <?php endif; ?>
                                <!-- Icon -->
                                <!-- Icon title -->
                                <?php if(get_sub_field('title') ) : ?>
                                      <h4 class="section-services__item__title"><?php echo get_sub_field('title'); ?></h4>
                                <?php endif; ?>
                                <!-- Icon title -->
                                <!-- Texte -->
                                <?php if(get_sub_field('text') ) : ?>
                                      <p class="section-services__item__text"> <?php echo get_sub_field('text'); ?></p>
                                <?php endif; ?>
                                <!-- Texte -->
                          </div>
                          <?php endwhile; ?>
                    <?php endif;?>
                    <!-- Service -->
              </div>
        </div>
 </section>

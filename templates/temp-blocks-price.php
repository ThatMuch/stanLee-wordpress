<?
/**
 * Price Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       undefined 0.1.0
 *
 */
 ?>

  <section class="block-price
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
            <!-- Title -->
            <?php if(get_sub_field('title') ) : ?>
                  <h2 class="section-title"><?php echo get_sub_field('title'); ?></h2>
            <?php endif; ?>
            <!-- Title -->
                  <?php if (have_rows('colonne') ) : ?>
            <div class="row justify-content-center">
                        <? while(have_rows('colonne')) : the_row() ?>
                        <?php if( get_sub_field('title') ) : ?>
                        <div class="col-sm-4 price-column">
                              <div class="price-column-wrapper">
                                    <!-- Title -->
                                    <?php if( get_sub_field('title') ) : ?>
                                        <h3 class="price-column-title">  <?php echo get_sub_field('title'); ?> </h3>
                                    <?php endif; ?>
                                    <!-- Title -->
                                    <!-- Price -->
                                    <?php if( get_sub_field('prix') ) : ?>
                                          <p class="price-column-price">
                                                <!-- Devise -->
                                                <?php if( get_sub_field('devise') ) : ?>
                                                      <span class="price-column-devise"><?php echo get_sub_field('devise'); ?></span>
                                                <?php endif; ?>
                                                <!-- Devise -->
                                                <?php echo get_sub_field('prix'); ?>
                                          </p>
                                    <?php endif; ?>
                                    <!-- Price -->

                                    <?php if ( have_rows('services') ) : ?>
                                          <ul>
                                                <? while (have_rows('services')) : the_row()?>
                                                      <?php if( get_sub_field('text') ) : ?>
                                                            <li class="price-column-service"><?php echo get_sub_field('text'); ?></li>
                                                      <?php endif; ?>
                                                <? endwhile; ?>
                                          </ul>
                                    <?php endif; ?>

        <!-- Button -->
        <?php if (have_rows('button')) : ?>
            <?php while ( have_rows('button') ) : the_row(); ?>
                <?php if (get_sub_field('label') ) : ?>
                    <a href="<?php the_sub_field('link'); ?>" class="btn btn-primary price-column-btn"><?php the_sub_field('label'); ?></a>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <!-- Button -->

                              </div>
                        </div>
                        <?php endif; ?>
                        <? endwhile; ?>
            </div>
                  <?php endif; ?>
        </div>
 </section>
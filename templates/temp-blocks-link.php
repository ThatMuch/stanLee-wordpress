<?
/**
 * Link Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s 0.1.0
 *
 */
 ?>

  <section id="block-link" class="block-link
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
            <h2><?php echo get_sub_field('title'); ?></h2>
        <?php endif; ?>
        <!-- Title -->

        <!-- Text -->
        <?php if(get_sub_field('text') ) : ?>
            <p> <?php echo get_sub_field('text'); ?></p>
        <?php endif; ?>
        <!-- Text -->
        <!-- Button -->
        <?php if (have_rows('button')) : ?>
            <?php while ( have_rows('button') ) : the_row(); ?>
                <?php if (get_sub_field('label') ) : ?>
                    <a href="<?php the_sub_field('link'); ?>" class="btn  btn-primary"><?php the_sub_field('label'); ?></a>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <!-- Button -->
      </div>
 </section>
<?
/**
 * Link Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s 0.1.0
 *
 */
 ?>

  <section class="section-link
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

        <!-- Text -->
        <?php if(get_sub_field('text') ) : ?>
            <p> <?php echo get_sub_field('text'); ?></p>
        <?php endif; ?>
        <!-- Text -->
        <!-- Button -->
        <?php if (have_rows('button')) : ?>
            <?php while ( have_rows('button') ) : the_row(); ?>
                <?php if (get_sub_field('link') == 'Externe' && get_sub_field('label') && get_sub_field('url') ) : ?>
                    <a href="<?php the_sub_field('url'); ?>" class="btn btn-primary"><?php the_sub_field('label'); ?></a>
                <?php endif; ?>
                <?php if (get_sub_field('link') == 'Interne' && get_sub_field('label') && get_sub_field('int_url') ) : ?>
                    <a href="<?php the_sub_field('int_url'); ?>" class="btn <?php echo (get_sub_field('fond') == "Couleur" ? "btn-primary" : "btn-light") ?>">
                        <?php the_sub_field('label'); ?>
                    </a>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <!-- Button -->
      </div>
 </section>
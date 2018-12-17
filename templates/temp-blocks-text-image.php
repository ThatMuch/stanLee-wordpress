<?
/**
 * Texte-Image Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s 0.1.0
 *
 */
 ?>

  <section class="block-text-image">
    <div class="row">
    <div class="col-sm-6 block-text">
        <div>
            <!-- Title -->
            <?php if(get_sub_field('title') ) : ?>
                   <h2 class="section-title"><?php echo get_sub_field('title'); ?></h2>
            <?php endif; ?>
           <!-- Title -->
           <!-- Text -->
            <?php if(get_sub_field('text') ) : ?>
               <div class="text"><?php echo get_sub_field('text'); ?></div>
            <?php endif; ?>
           <!-- Text -->
        </div>
    </div>
    <div class="col-sm-6 block-image">
        <div class="bg" style="background-image: url(<?php if(get_sub_field('image') ) : $img = get_sub_field('image'); echo $img['url']; endif;?>)"></div>
    </div>
    </div>
 </section>
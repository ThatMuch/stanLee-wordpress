<?
/**
 * Texte-Image Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 *
 */
 ?>

  <section id="block-text-image">
    <div class="row">
    <div class="col-sm-6">
        <!-- Title -->
        <?php if(get_sub_field('title') ) : ?>
               <h2><?php echo get_sub_field('title'); ?></h2>
        <?php endif; ?>
       <!-- Title -->
       <!-- Text -->
        <?php if(get_sub_field('text') ) : ?>
            <?php echo get_sub_field('text'); ?>
        <?php endif; ?>
       <!-- Text -->
    </div>
    <div class="col-sm-6">
            <!-- Image -->
            <?php if(get_sub_field('image') ) : $img = get_sub_field('image'); ?>
        <img src="<?php echo $img['url']?>" alt="<?php echo $img['alt']?>" class="w-100">
            <?php endif; ?>
        <!-- Image -->
    </div>
    </div>
 </section>
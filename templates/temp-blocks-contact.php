<?
/**
 * Contact Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 *
 */
 ?>

  <section id="block-contact" class="block-contact
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
<!-- Contact form -->
<?php $form = get_sub_field('contact_form');?>
<?php if($form) : ?>
       <?php echo do_shortcode($form); ?>
<?php endif; ?>
<!-- Contact form -->
    </div>
 </section>
<?
/**
 * Text Block
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
 <section class="section section-text <?php echo  $background == "Couleur" ? "bg-primary" : ($background == "Gris" ? "bg-light" : "bg-white") ?>">
 <div class="container">
        <!-- Title -->
        <?php if(get_sub_field('title') ) : ?>
            <h2 class="section__title"><?php echo get_sub_field('title'); ?></h2>
        <?php endif; ?>
        <!-- Title -->
        <!-- Texte -->
        <?php if(get_sub_field('text') ) : ?>
            <div><?php echo get_sub_field('text'); ?></div>
        <?php endif; ?>
        <!-- Texte -->
    </div>
 </section>
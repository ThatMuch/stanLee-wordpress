<?
/**
 * Testimonials Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 *
 */
 ?>

  <section id="block-testimonials">
                <!-- Title -->
                <?php if(get_sub_field('title') ) : ?>
               <h2><?php echo get_sub_field('title'); ?></h2>
        <?php endif; ?>
       <!-- Title -->
 </section>
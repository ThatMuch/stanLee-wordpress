<?
/**
 * Gallery Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 *
 */
 ?>
  <section id="block-gallery">
            <!-- Title -->
            <?php if(get_sub_field('title') ) : ?>
               <h2><?php echo get_sub_field('title'); ?></h2>
        <?php endif; ?>
       <!-- Title -->
    <?php

$images = get_sub_field('images');
$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)

if( $images ): ?>
    <div class="row">
        <?php foreach( $images as $image ): ?>
            <div class="col-sm-3 justify-content-center">
            <a href="<?php echo $image['url']; ?>">
                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" class="m-auto d-block" />
                </a>
                </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
 </section>
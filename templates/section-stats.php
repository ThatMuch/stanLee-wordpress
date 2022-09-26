<?
/**
 * Stats Block
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
 <section class="section section-stats <?php echo  $background == "Couleur" ? "bg-primary" : ($background == "Gris" ? "bg-light" : "bg-white") ?>">
    <!-- Section background: image -->
      <?php if(get_sub_field('background') == "Image"):?>
      <div class="section__background-image"  style="
            <?php if(get_sub_field('image')):?>
            background-image:url(<?php echo the_sub_field('image') ?>);
            <?php endif;?>"></div>
      <?php endif;?>
    <!-- Section background: image -->
     <div class="container">
         <!-- Title -->
         <?php if(get_sub_field('title') ) : ?>
            <h2 class="section__title"><?php echo get_sub_field('title'); ?></h2>
        <?php endif; ?>
        <!-- Title -->
        <div class="d-flex">
        <?php if (have_rows('radial_chart') ) : $i = 1 ; ?>
            <?php while( have_rows('radial_chart') ) : the_row(); ?>
            <div class="circle-bar circle-<?php echo $i ?>">
                <svg class="radial-progress" data-percentage=" <?php if (get_sub_field('percentage') ) : ?> <?php echo get_sub_field('percentage'); ?><?php endif; ?>" viewBox="0 0 80 80">
                    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                    <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
                    <text class="percentage text-circle-1" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">
                                <?php if (get_sub_field('operateur') ) : ?>
                                    <?php echo get_sub_field('operateur'); ?>
                                <?php endif; ?>
                                <?php if (get_sub_field('percentage') ) : ?>
                                    <?php echo get_sub_field('percentage'); ?>
                                <?php endif; ?>
                    </text>
                </svg>
                <?php if (get_sub_field('label') ) : ?>
                    <h5 class="circle-bar-title"><?php echo get_sub_field('label'); ?></h5>
                <?php endif; ?>
            </div>
            <?php $i++; endwhile ?>
        <?php endif ?>

        </div>
     </div>
 </section>

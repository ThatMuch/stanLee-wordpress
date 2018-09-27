<?
/**
 * Stats Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 *
 */
 ?>

 <section id="block-stats" class="block-stats">
     <div class="container">
         <!-- Title -->
         <?php if(get_sub_field('title') ) : ?>
            <h2 class="section-title"><?php echo get_sub_field('title'); ?></h2>
        <?php endif; ?>
        <!-- Title -->
        <div class="row justify-content-center">
        <?php if (have_rows('radial_chart') ) : $i = 1 ; ?>
            <?php while( have_rows('radial_chart') ) : the_row(); ?>
            <div class="col-xs-6 col-sm-6 col-md-3 circle-bar circle-<?php echo $i ?>">
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
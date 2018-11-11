<?
/**
 * Text Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       undefined 0.1.0
 *
 */
 ?>

 <section class="block-faq
 <? if(get_sub_field('fond') == "Couleur"):?> bg-primary
<? elseif(get_sub_field('fond') == "Gris"):?> bg-light<? endif;?>">

 <div class="container">
        <!-- Title -->
        <?php if(get_sub_field('title') ) : ?>
            <h2 class="section-title"><?php echo get_sub_field('title'); ?></h2>
        <?php endif; ?>
        <!-- Title -->
        <div class="accordion faq-accordion" id="faq-accordion">
            <!-- FAQ -->
            <?php if ( have_rows('faq') ) :  $i =0; ?>

                <?php while( have_rows('faq') ) : the_row();?>
                    <div class="card">
                        <div class="card-header" id="heading-<?php echo $i ?>" data-toggle="collapse" data-target="#collapse-<?php echo $i ?>" aria-expanded="true" aria-controls="collapseOne">
                        <div class="row">
                            <div class="col-2 col-md-1"> <span class="card-header-expand" ><i class="fas fa-plus"></i></span></div>
                            <div class="col-10 col-md-11"><?php the_sub_field('question'); ?></div>
                        </div>


                        </div>

                        <div id="collapse-<?php echo $i ?>" class="collapse" aria-labelledby="heading-<?php echo $i ?>" data-parent="#faq-accordion">
                            <div class="card-body">
                                <p class="answer"><?php the_sub_field('answer'); ?></p>
                            </div>
                        </div>
                    </div>



                <?php $i++; endwhile; ?>

            <?php endif; ?>

            <!-- FAQ -->

        </div>
    </div>
 </section>
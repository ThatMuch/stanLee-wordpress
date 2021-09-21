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
 <section class="section section-faq <?php echo  $background == "Couleur" ? "bg-primary" : ($background == "Gris" ? "bg-light" : "bg-white") ?>">

 <div class="container">
        <!-- Title -->
        <?php if(get_sub_field('title') ) : ?>
            <h2 class="section__title text-center"><?php echo get_sub_field('title'); ?></h2>
        <?php endif; ?>
        <!-- Title -->
        <div class="accordion section-faq__accordion" id="faq-accordion">
            <!-- FAQ -->
            <?php if ( have_rows('faq') ) :  $i =0; ?>

                <?php while( have_rows('faq') ) : the_row();?>
                    <div class="card">
                        <div class="card-header" id="heading-<?php echo $i ?>" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $i ?>" aria-expanded="true" aria-controls="collapseOne">
                        <div class="row">
                            <div class="col-2 col-md-1"> <span class="card-header-expand" ><i class="fas fa-plus"></i></span></div>
                            <div class="col-10 col-md-11"><?php the_sub_field('question'); ?></div>
                        </div>


                        </div>

                        <div id="collapse-<?php echo $i ?>" class="collapse" aria-labelledby="heading-<?php echo $i ?>" data-bs-parent="#faq-accordion">
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
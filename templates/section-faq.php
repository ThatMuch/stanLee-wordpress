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
        <!-- FAQ -->
        	<?php if ( have_rows('faq') ) :  $i =0; ?>
				<div class="accordion">
					<?php while( have_rows('faq') ) : the_row();?>
						<div class="accordion__item">
							<div class="accordion__item__header" aria-expanded="false">
								<?php the_sub_field('question'); ?>
								<span class="accordion__item__header__expand" aria-hidden="true">
									<i class="fas fa-plus"></i>
								</span>
							</div>
							<div class="accordion__item__body">
								<p class="answer"><?php the_sub_field('answer'); ?></p>
							</div>
						</div>
					<?php $i++; endwhile; ?>
				</div>
            <?php endif; ?>
        <!-- FAQ -->
    </div>
 </section>

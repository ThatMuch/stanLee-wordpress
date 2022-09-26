<?
/**
 * Texte-Image Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0
 *
 */
 ?>

  <section class="section section-text-image">

			<div class="section-text-image__text">
					<div class="section-text-image__text__inner">
							<!-- Title -->
							<?php if(get_sub_field('title') ) : ?>
										<h2 class="section__title"><?php echo get_sub_field('title'); ?></h2>
							<?php endif; ?>
						<!-- Title -->
						<!-- Text -->
							<?php if(get_sub_field('text') ) : ?>
								<?php echo get_sub_field('text'); ?>
							<?php endif; ?>
						<!-- Text -->
					</div>
			</div>
			<div class="section-text-image__image">
					<div class="bg" style="background-image: url(<?php if(get_sub_field('image') ) : $img = get_sub_field('image'); echo $img['url']; endif;?>)"></div>
			</div>

 </section>

<?
/**
 * Price Block
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
  <section class="section section-price <?php echo  $background == "Couleur" ? "bg-primary" : ($background == "Gris" ? "bg-light" : "bg-white") ?>">
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
            <!-- Count columns -->
            <?
            $count = 0;
            $colonne = get_sub_field('colonne');
            if (is_array($colonne)){$count = count($colonne);}
            ?>
                  <?php if (have_rows('colonne') ) :
                  ?>
            <div class="d-flex">
			<?php while(have_rows('colonne')) : the_row();  ?>
				<?php if( get_sub_field('title') ) : ?>
                        	<div class="section-price__column">
							<!-- Title -->
							<?php if( get_sub_field('title') ) : ?>
							<h3 class="section-price__column__title text-center">  <?php echo get_sub_field('title'); ?> </h3>
							<?php endif; ?>
							<!-- Title -->
							<!-- Price -->
							<?php if( get_sub_field('prix') ) : ?>
								<p class="section-price__column__price">
									<!-- Devise -->
									<?php if( get_sub_field('devise') ) : ?>
										<span class="section-price__column__devise"><?php echo get_sub_field('devise'); ?></span>
									<?php endif; ?>
									<!-- Devise -->
									<?php echo get_sub_field('prix'); ?>
								</p>
							<?php endif; ?>
							<!-- Price -->
							<?php if ( have_rows('services') ) : ?>
								<ul class="mb-auto">
									<?php while (have_rows('services')) : the_row()?>
										<?php if( get_sub_field('text') ) : ?>
											<li class="section-price__column__service"><?php echo get_sub_field('text'); ?></li>
										<?php endif; ?>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
							<!-- Button -->
							<?php if (have_rows('button')) : ?>
								<?php while ( have_rows('button') ) : the_row(); ?>
								<?php if (get_sub_field('label') ) : ?>
									<a href="<?php the_sub_field('link'); ?>" class="btn btn-primary btn-block mt-2"><?php the_sub_field('label'); ?></a>
								<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
							<!-- Button -->
                        </div>
                        <?php endif; ?>
                        <?php endwhile; ?>
            </div>
                  <?php endif; ?>
        </div>
 </section>

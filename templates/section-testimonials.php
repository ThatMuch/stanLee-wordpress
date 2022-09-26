<?
/**
 * Testimonials Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0
 *
 */
 ?>

  <section class="section section-testimonials <?php echo  $background == "Couleur" ? "bg-primary" : ($background == "Gris" ? "bg-light" : "bg-white") ?>">
        <div class="container">
              <?php
              $args = array(
              'post_type' => 'testimonials'
              );
               $the_query = new WP_Query($args);
              if ($the_query->have_posts() ): $i = 0; $y = 0; ?>

                        <!-- Title -->
                        <?php if(get_sub_field('title') ) : ?>
                              <h2 class="section__title text-center"><?php echo get_sub_field('title'); ?></h2>
                        <?php endif; ?>
                        <!-- Title -->
				<div class="carrousel" id="carrousel">
					<ul>
                              <?php  while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                                <li class="carrousel__item">
                                    <!-- Image -->
                                    <?php if (get_the_post_thumbnail()) : ?>
                                          <img src="<?php the_post_thumbnail_url('thumbnail')?>" alt="" >
                                    <?php endif;?>
                                    <!-- Image -->
						<div>
							<!-- Quote -->
							<?php if (get_field('quote') ) : ?>
								<p> <?php echo get_field('quote'); ?></p>
							<?php endif; ?>
							<!-- Quote -->
							<!-- Auteur -->
								<h5><?php the_title()?></h5>
							<!-- Auteur -->
						</div>
                                </li>
                                <?php $y++ ; endwhile;?>
                              </ul>
					<div class="controls"><i class="prevBtn fas fa-arrow-circle-left"></i><i class="nextBtn fas fa-arrow-circle-right"></i></div>
				</div>

				<ul class="bubbles"></ul>

                <?php endif; wp_reset_query(); ?>
        </div>
 </section>

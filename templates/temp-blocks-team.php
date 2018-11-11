<?
/**
 * Team Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       undefined 0.1.0
 *
 */
 ?>

  <section class="block-team
  <? if(get_sub_field('fond') == "Couleur"):?> bg-primary
  <? elseif(get_sub_field('fond') == "Gris"):?> bg-light<? endif;?>">
    <!-- Section background: image -->
      <? if(get_sub_field('fond') == "Image"):?>
      <div class="section-background-image"  style="
            <? if(get_sub_field('image')):?>
            background-image:url(<? echo the_sub_field('image') ?>);
            <? endif;?>"></div>
      <? endif;?>
    <!-- Section background: image -->
      <div class="container">
          <!-- Title -->
          <?php if(get_sub_field('title') ) : ?>
              <h2 class="section-title"><?php echo get_sub_field('title'); ?></h2>
          <?php endif; ?>
          <!-- Title -->
          <?php
              $args = array(
                  'post_type' => 'team'
                  );
              $the_query = new WP_Query($args);
              if ($the_query->have_posts() ): ?>
                  <div class="row justify-content-center">
                      <?php  while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                          <div class="col-sm-4">
                              <div class="team-member">
                                <!-- Image -->
                                <?php if (get_the_post_thumbnail()) : ?>
                                    <img class="team-member-img" src="<?php the_post_thumbnail_url('thumbnail')?>" alt="<?php the_title()?>">
                                <? else : ?>
                                    <div class="team-member-img"></div>
                                <? endif;?>
                                <!-- Image -->
                                  <!-- Name -->
                                      <h4 class="team-member-name"><?php the_title()?></h4>
                                  <!-- Name -->
                                  <!-- Job -->
                                  <?php if (get_field('job') ) : ?>
                                      <h5 class="team-member-job"> <?php echo get_field('job'); ?></h5>
                                  <?php endif; ?>
                                  <!-- Job -->
                                  <!-- Description -->
                                  <?php if (get_field('description') ) : ?>
                                      <p class="team-member-desc"> <?php echo get_field('description'); ?></p>
                                  <?php endif; ?>
                                  <!-- Description -->
                                  <!-- Social medias -->
                                  <?php if (have_rows('links')) : ?>
                                      <?php while ( have_rows('links') ) : the_row(); ?>
                                          <ul class="team-member-rs">
                                              <!-- Facebook -->
                                              <?php if (get_sub_field('facebook') ) : ?>
                                              <li>
                                                  <a href="<?php the_sub_field('facebook');?>">
                                                      <i class="fab fa-facebook" aria-hidden="true"></i>
                                                  </a>
                                              </li>
                                              <?php endif; ?>
                                              <!-- Facebook -->
                                              <!-- Twitter -->
                                              <?php if (get_sub_field('twitter') ) : ?>
                                              <li>
                                                  <a href="<?php the_sub_field('twitter');?>">
                                                      <i class="fab fa-twitter" aria-hidden="true"></i>
                                                  </a>
                                              </li>
                                              <?php endif; ?>
                                              <!-- Twitter -->
                                              <!-- Linkedin -->
                                              <?php if (get_sub_field('linkedin') ) : ?>
                                              <li>
                                                  <a href="<?php the_sub_field('linkedin');?>">
                                                      <i class="fab fa-linkedin" aria-hidden="true"></i>
                                                  </a>
                                              </li>
                                              <?php endif; ?>
                                              <!-- Linkedin -->
                                              <!-- Instagram -->
                                              <?php if (get_sub_field('instagram') ) : ?>
                                              <li>
                                                  <a href="<?php the_sub_field('instagram');?>">
                                                      <i class="fab fa-instagram" aria-hidden="true"></i>
                                                  </a>
                                              </li>
                                              <?php endif; ?>
                                              <!-- Instagram -->
                                              <!-- Google + -->
                                              <?php if (get_sub_field('google') ) : ?>
                                              <li>
                                                  <a href="<?php the_sub_field('google');?>">
                                                      <i class="fab fa-google-plus-g" aria-hidden="true"></i>
                                                  </a>
                                              </li>
                                              <?php endif; ?>
                                              <!-- Google + -->
                                          </ul>
                                      <?php endwhile; ?>
                                  <?php endif; ?>
                                  <!-- Social media -->
                              </div>
                          </div>
                      <? endwhile; ?>
                  </div>
                  <? endif; wp_reset_query(); ?>
      </div>
 </section>
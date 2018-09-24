<?
/**
 * Team Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-blocks.php' which is triggered by 'temp-blocks.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 *
 */
 ?>

  <section id="block-team">
    <!-- Title -->
    <?php if(get_sub_field('title') ) : ?>
        <h2><?php echo get_sub_field('title'); ?></h2>
    <?php endif; ?>
    <!-- Title -->
    <?php
        $args = array(
            'post_type' => 'team'
            );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts() ): ?>
            <div class="row">
                <?php  while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                    <div class="col-sm-3">
                    <!-- Image -->
                        <?php the_post_thumbnail('thumbnail')?>
                    <!-- Image -->
                    <!-- Name -->
                        <h3><?php the_title()?></h3>
                    <!-- Name -->
                    <!-- Job -->
                    <?php if (get_field('job') ) : ?>
                        <h4> <?php echo get_field('job'); ?></h4>
                    <?php endif; ?>
                    <!-- Job -->
                    <!-- Description -->
                    <?php if (get_field('description') ) : ?>
                        <p> <?php echo get_field('description'); ?></p>
                    <?php endif; ?>
                    <!-- Description -->
                    <!-- Social medias -->
                    <?php if (have_rows('links')) : ?>
                        <?php while ( have_rows('links') ) : the_row(); ?>
                            <ul>
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
                <? endwhile; ?>
            </div>
            <? endif; wp_reset_query(); ?>
 </section>
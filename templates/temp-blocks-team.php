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
                        <?php  while ( $the_query->have_posts() ):
                            $the_query->the_post(); ?>
                            <div class="col-sm-3">
                            <?php the_post_thumbnail('thumbnail')?>
                             <h3> <?php the_title()?></h3>
                             <?php if (get_field('job') ) : ?>
                               <h4> <?php echo get_field('job'); ?></h4>
                              <?php endif; ?>
                             <?php if (get_field('description') ) : ?>
                                <p> <?php echo get_field('description'); ?></p>
                            <?php endif; ?>
                            </div>
                            <? endwhile; ?>
                    </div>
                        <? endif;?>
 </section>
<?
/**
 * Link Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0
 *
 */
 ?>

  <section class="section section-link
  <? if(get_sub_field('fond') == "Couleur"):?> bg-primary
  <? elseif(get_sub_field('fond') == "Gris"):?> bg-light<? endif;?>">

    <!-- Section background: image -->
    <? if(get_sub_field('fond') == "Image"):?>
        <div class="section__background-image"  style="
        <? if(get_sub_field('image')):?>
        background-image:url(<? echo the_sub_field('image') ?>);
        <? endif;?>"></div>
    <? endif;?>
    <!-- Section background: image -->
    <div class="container">
        <!-- Title -->
        <?php if(get_sub_field('title') ) : ?>
            <h2 class="section__title"><?php echo get_sub_field('title'); ?></h2>
        <?php endif; ?>
        <!-- Title -->

        <!-- Text -->
        <?php if(get_sub_field('text') ) : ?>
            <p class="mb-4"> <?php echo get_sub_field('text'); ?></p>
        <?php endif; ?>
        <!-- Text -->
        <!-- Button -->
		<?php if ( get_sub_field('button') ) : $link = get_sub_field('button'); ?>
			<a class="btn btn-primary" href="<?php echo $link['url']; ?>">
				<?php echo $link['title']; ?>
			</a>
		<?php endif; ?>
        <!-- Button -->
      </div>
 </section>
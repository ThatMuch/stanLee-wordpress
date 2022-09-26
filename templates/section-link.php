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
<?php $background = get_sub_field('background');?>
<section class="section section-link <?php echo  $background == "Couleur" ? "bg-primary" : ($background == "Gris" ? "bg-light" : "bg-white") ?>">
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

        <!-- Text -->
        <?php if(get_sub_field('text') ) : ?>
            <p> <?php echo get_sub_field('text'); ?></p>
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

<?
/**
 * Contact Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s0.1.0
 *
 */
 ?>

  <section class="section-contact
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
<div class="row">
<? if (get_sub_field('contact_infos') == "Oui"): ?>
  <div class="col-sm-6">
    <ul class="contact-infos">
      <li class="contact-infos-phone">
        <i class="fas fa-mobile fa-2x mr-2"></i>
        <?php if (get_field('phone', 'option') ) : ?>
          <span><?php echo get_field('phone','option'); ?></span>
        <?php endif; ?>
      </li>
      <li class=" contact-infos-address">
        <i class="fas fa-map-marker-alt fa-2x mr-2"></i>
          <?php if (get_field('adress', 'option') ) : ?>
            <span><?php echo get_field('adress','option'); ?></span>
          <?php endif; ?>
      </li>
      <li class="contact-infos-hours">
        <i class="far fa-clock fa-2x mr-2"></i>
        <?php if (get_field('hours', 'option') ) : ?>
          <span><?php echo get_field('hours','option'); ?></span>
        <?php endif; ?>
      </li>
    </ul>
    <?php if (have_rows('rs', 'options')) : ?>
      <ul class="contact-infos-rs">
        <?php while ( have_rows('rs', 'options') ) : the_row(); ?>
          <?php if (get_sub_field('facebook') ) : ?>
              <li>
                <a href="<?php the_sub_field('facebook');?>">
                  <i class="fab fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
            <?php endif; ?>
          <?php if (get_sub_field('twitter') ) : ?>
              <li>
                <a href="<?php the_sub_field('twitter');?>">
                  <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
            <?php endif; ?>
          <?php if (get_sub_field('instagram') ) : ?>
              <li>
                <a href="<?php the_sub_field('instagram');?>">
                  <i class="fab fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
            <?php endif; ?>
          <?php if (get_sub_field('google') ) : ?>
              <li>
                <a href="<?php the_sub_field('google');?>">
                  <i class="fab fa-google" aria-hidden="true"></i>
                </a>
              </li>
            <?php endif; ?>
          <?php if (get_sub_field('linkedin') ) : ?>
              <li>
                <a href="<?php the_sub_field('linkedin');?>">
                  <i class="fab fa-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            <?php endif; ?>
          <?php if (get_sub_field('youtube') ) : ?>
              <li>
                <a href="<?php the_sub_field('youtube');?>">
                  <i class="fab fa-youtube" aria-hidden="true"></i>
                </a>
              </li>
            <?php endif; ?>
        <? endwhile;?>
      </ul>
    <? endif;?>
  </div>
<? endif;?>
  <div class="contact-form <? if (get_sub_field('contact_infos') == "Oui"): ?> col-sm-6 <? else : ?> col-sm-12 full-width<?endif; ?>">
    <!-- Contact form -->
    <?php $form = get_sub_field('contact_form');?>
    <?php if($form) : ?>

          <?php echo $form; ?>

    <?php endif; ?>
    <!-- Contact form -->
  </div>
</div>
    </div>
 </section>
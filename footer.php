<?
/**
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0
 */
?>
	</div><!-- #content -->
    <footer class="footer">
      <div class="container">
        <div class="row footer__inner">
       <? if(is_active_sidebar('footer-1')){
      dynamic_sidebar('footer-1');
        } ?>
        <?php if (have_rows('rs', 'options')) : ?>
        <div class="col-sm-3">
      <ul class="footer__rs">
        <?php while ( have_rows('rs', 'options') ) : the_row(); ?>
          <?php if (get_sub_field('facebook') ) : ?>
              <li class="footer__rs__item">
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
        </div>
    <? endif;?>
        </div>
      </div>
    <div class="footer__credits">
      <div class="container">
      <div class="footer__inner">
      Un site crée par <a href="https://_a.fr" target="_blank" rel="noopener noreferrer"><strong>_a</strong></a>
      </div>
      </div>
    </div>
    </footer>
    <? wp_footer() ?>
  </body>
</html>

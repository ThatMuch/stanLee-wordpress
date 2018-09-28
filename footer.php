<?
/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       Stanlee 0.1.0
 */
?>
	</div><!-- #content -->
    <footer class="footer">
      <div class="container">
        <div class="row inner">
       <? if(is_active_sidebar('footer-1')){
      dynamic_sidebar('footer-1');
        } ?>
        </div>
      </div>
    <div class="credits">
      <div class="container">
      <div class="inner">
      Un site crée par <a href="https://thatmuch.fr" target="_blank" rel="noopener noreferrer"><strong>ThatMuch</strong></a>
      </div>
      </div>
    </div>

    </footer>

    <? wp_footer() ?>
  </body>
</html>

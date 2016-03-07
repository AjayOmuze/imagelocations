<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>


<!-------------------------------footer-------------------------->
<footer>
  <div class="container">
    <div class="footer_sec">
      <div class="row">
        <div class="col-md-12">
          <a href="<?php echo site_url(); ?>">
            <img width="300" height="116" src="<?php echo get_stylesheet_directory_uri() ?>/images/footer_logo.png" class="img-responsive footer_logo"/>
          </a>
        </div>
      </div>

      <div class="footer_link">
        <ul>

          <?php
          $menu = 'Footer';
          $args = array(
              'order' => 'ASC',
              'orderby' => 'menu_order',
              'post_type' => 'nav_menu_item',
              'post_status' => 'publish',
              'output' => ARRAY_A,
              'output_key' => 'menu_order',
              'nopaging' => true,
              'update_post_term_cache' => false);

          $items = wp_get_nav_menu_items($menu, $args);

          foreach ($items as $item) {
            ?>

            <li><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></li>

          <?php } ?>

        </ul>
      </div>
      <div class="clearfix"></div>
      <div class="copyright_text">© Copyright 2008/2015. IMAGE LOCATIONS, INC. All Rights Reserved. Designed by VHF, Powered by Omuze Inc. </div>
    </div>
  </div>
</footer>

<a id="temp-zip-link" target="_blank" href=""></a>
<div class="overlay"></div>

<a style="display: none;" class="js-textareacopybtn" href="javascript:void(0);">Copy</a>
<input style="border: 0 none;color: transparent;position: fixed;top: -100px;" type="text" class="js-copytextarea" value="<?php echo get_the_permalink(get_the_ID()); ?>" />

<?php wp_footer(); ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js" defer="defer"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap-select.js" defer="defer"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/classie.js" defer="defer"></script> 
<?php /* <!--<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/modalEffects.js" defer="defer"></script>--> */ ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/owl.carousel.min.js" defer="defer"></script>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/waterfall-light.js" defer="defer"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.nicescroll.min.js" defer="defer"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.sticky.js" defer="defer"></script>



<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/faq/js/jquery.mobile.custom.min.js" defer="defer"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/faq/js/main.js" defer="defer"></script>


<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/blazy.min.js" defer="defer"></script>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/css/fancybox/jquery.fancybox.js" defer="defer"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/parsly/parsley.js" defer="defer"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/parsly/jquery.bootstrap-growl.min.js" defer="defer"></script>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/swiper/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jQuery.GI.TheWall.js" defer="defer"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.0/highlight.min.js" defer="defer"></script>

<a class="fancybox" id="comman-link"></a>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/blazy.min.js" defer="defer"></script>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js" defer="defer"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom_2.js" defer="defer"></script>


</body>
</html>
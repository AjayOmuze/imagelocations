<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
?>

<?php
$args = array("post_type" => "homepage",
    "numberposts" => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'home_section',
            'field' => 'slug',
            'terms' => array('main-location-slider')
        )
    )
);

$main_location_slider = get_posts($args);
?>

<!-- ------slider----------- -->
<section>
  <div class="container">
    <div class="silder_main_bg">
      <div class="row" style="margin:0px; padding:0px">

        <div class="col-md-9 col-sm-12 pd_l">
          <div class="slider_sec">

            <?php if (is_array($main_location_slider) && count($main_location_slider) > 0): ?>
              <?php $banners = get_field('banners', $main_location_slider[0]->ID); ?>
              <?php if (is_array($banners) && count($banners) > 0): ?>
                <?php foreach ($banners as $banner): ?>
                  <?php if (isset($banner['section_type']) && ($banner['section_type'] == 'Slideshow') && count($banner['banner_slideshow_']) > 0): ?>
                    <div id="homepage_featured_location_img" class="owl-carousel">
                      <?php foreach ($banner['banner_slideshow_'] as $slider): ?>											
                        <div class="item<?php echo ($i == 1) ? ' active' : ''; ?>">
                          <?php if (is_array($slider['banner_slideshow_image']) && count($slider['banner_slideshow_image']) > 0): ?>
                            <a href="<?php echo $slider['banner_slideshow_link']; ?>">
                              <?php //echo '<pre>'; print_r ($slider['banner_slideshow_image']); echo '</pre>';  ?>
                              <img class="img-responsive owl-lazy" data-src="<?php echo $slider['banner_slideshow_image']['sizes']['home_slide_image']; ?>" width="<?php echo $slider['banner_slideshow_image']['sizes']['home_slide_image-width']; ?>" height="<?php echo $slider['banner_slideshow_image']['sizes']['home_slide_image-height']; ?>" alt="<?php echo $slider['banner_slideshow_title']; ?>" />
                            </a>
                          <?php endif; ?>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>								
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>

        <?php
        $args = array("post_type" => "homepage",
            "numberposts" => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'home_section',
                    'field' => 'slug',
                    'terms' => array('side-tears-slider')
                )
            )
        );
        $tears_slider = get_posts($args);
        ?>

        <?php if (is_array($tears_slider) && count($tears_slider) > 0): ?>
          <?php $banners = get_field('banners', $tears_slider[0]->ID); ?>
          <?php if (is_array($banners) && count($banners) > 0): ?>
            <?php foreach ($banners as $banner): ?>
              <?php if (isset($banner['section_type']) && ($banner['section_type'] == 'Slideshow') && count($banner['banner_slideshow_']) > 0): ?>										
                <div class="col-md-3 col-sm-12 pd_r hidden-sm hidden-xs">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="slider_right">
                        <div id="homepage_featured_right_slider" class="owl-carousel">			
                          <?php $i = 1; ?>
                          <?php foreach ($banner['banner_slideshow_'] as $slider): ?>											
                            <?php if (is_array($slider['banner_slideshow_image']) && count($slider['banner_slideshow_image']) > 0): ?>
                              <div class="item<?php echo ($i == 1) ? ' active' : ''; ?>">
                                <a href="<?php echo $slider['banner_slideshow_link']; ?>">
                                  <?php //echo '<pre>'; print_r ($slider['banner_slideshow_image']); echo '</pre>';  ?>
                                  <img class="img-responsive owl-lazy" data-src="<?php echo $slider['banner_slideshow_image']['sizes']['image_314_454'] ?>" width="<?php echo $slider['banner_slideshow_image']['sizes']['image_314_454-width'] ?>" height="<?php echo $slider['banner_slideshow_image']['sizes']['image_314_454-height'] ?>" />
                                  <?php /* <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $slider['banner_slideshow_image']['url']; ?>&height=327&width=226&cropratio=1:1.45&amp;image=<?php echo $slider['banner_slideshow_image']['url']; ?>" height="327" width="226" alt="<?php echo $slider['banner_slideshow_title']; ?>" /> */ ?>
                                </a>
                                <div class="caption_red">
                                  <h2><?php echo $slider['banner_slideshow_title']; ?></h2>
                                  <a href="<?php echo $slider['banner_slideshow_link']; ?>" class="btn btn-primary">View Location</a>							
                                </div>
                              </div>
                            <?php endif; ?>
                            <?php $i++; ?>
                          <?php endforeach; ?>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                      <div class="red_bg">
                        <h3>Featured Locations</h3>
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/line_grey.png" width="107" height="1" />
                        <div id="homepage_featured_location_info" class="owl-carousel">								

                          <?php if (is_array($main_location_slider) && count($main_location_slider) > 0): ?>
                            <?php $banners = get_field('banners', $main_location_slider[0]->ID); ?>
                            <?php if (is_array($banners) && count($banners) > 0): ?>
                              <?php foreach ($banners as $banner): ?>
                                <?php if (isset($banner['section_type']) && ($banner['section_type'] == 'Slideshow') && count($banner['banner_slideshow_']) > 0): ?>

                                  <?php foreach ($banner['banner_slideshow_'] as $slider): ?>											
                                    <div class="item">  
                                      <?php if (is_array($slider['banner_slideshow_image']) && count($slider['banner_slideshow_image']) > 0): ?>
                                        <h2><?php echo $slider['banner_slideshow_title']; ?></h2>   
                                        <a href="<?php echo $slider['banner_slideshow_link']; ?>" class="btn btn-primary">View Location</a>                                                          
                                      <?php endif; ?>
                                    </div>    
                                  <?php endforeach; ?>

                                <?php endif; ?>
                              <?php endforeach; ?>								
                            <?php endif; ?>
                          <?php endif; ?>




                        </div>
                      </div>
                    </div>
                  </div>						
                </div>

              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>        
</section>


<?php
$args = array("post_type" => "homepage",
    "numberposts" => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'home_section',
            'field' => 'slug',
            'terms' => array('banner')
        )
    )
);
$banners_list = get_posts($args);
?>

<?php if (is_array($banners_list) && count($banners_list)): ?>
  <?php foreach ($banners_list as $banner_post): ?>
    <?php $banners = get_field('banners', $banner_post->ID); ?>
    <?php if (is_array($banners) && count($banners) > 0): ?>
      <?php foreach ($banners as $banner): ?>
        <?php if (isset($banner['section_type']) && $banner['section_type'] == 'Video Embed'): ?>
          <section>
            <div class="container text-center">
              <div class="home_photo">	
                <h4><?php echo $banner['section_title']; ?></h4>
                <?php echo $banner['code_embed']; ?>
                <div class="home_video_banner">
                  <?php if (is_array($banner['code_embed_image']) && count($banner['code_embed']) > 0): ?>
                    <center>
                      <a href="<?php echo $banner['code_embed_image_link_url']; ?>">
                        <img class="img-responsive b-lazy" width="<?php echo $banner['code_embed_image']['sizes']['large-width']; ?>" height="<?php echo $banner['code_embed_image']['sizes']['large-height']; ?>" data-src="<?php echo $banner['code_embed_image']['sizes']['large']; ?>" alt="<?php echo $banner['section_title']; ?>" />
                      </a>
                    </center>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </section>
        <?php endif; ?>

        <?php if (isset($banner['section_type']) && ($banner['section_type'] == 'Slideshow') && count($banner['banner_slideshow_']) > 0): ?>
          <section>
            <div class="container text-center">
              <div class="photo_slider home_photo_slider_img">
                <?php $titles = ''; ?>
                <?php foreach ($banner['banner_slideshow_'] as $slider): ?>
                  <?php $titles .= ' | ' . $slider['banner_slideshow_title']; ?>
                <?php endforeach; ?>
                <h4><?php echo ltrim($titles, '| '); ?></h4>
                <?php $tempCounter = 0; ?>  
                <div class="swiper-container home-location home-location-<?php echo $tempCounter; ?>">
                  <div class="swiper-wrapper">
                    <?php $i = 1; ?>
                    <?php foreach ($banner['banner_slideshow_'] as $slider): ?>
                      <?php if (is_array($slider['banner_slideshow_image']) && count($slider['banner_slideshow_image']) > 0): ?>
                        <div class="swiper-slide">
                          <a href="<?php echo $slider['banner_slideshow_link']; ?>">
                            <img class="img-responsive" width="<?php echo $slider['banner_slideshow_image']['sizes']['large-width']; ?>" height="<?php echo $slider['banner_slideshow_image']['sizes']['large-height']; ?>" src="<?php echo $slider['banner_slideshow_image']['sizes']['large']; ?>" alt="<?php echo $slider['banner_slideshow_title']; ?>" />
                          </a>
                        </div>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                  <!-- Add Pagination -->
                  <div class="swiper-pagination"></div>
                  <!-- If we need navigation buttons -->
                  <div class="swiper-button-prev swiper-button-prev-<?php echo $tempCounter; ?>"></div>
                  <div class="swiper-button-next swiper-button-next-<?php echo $tempCounter; ?>"></div>                    
                </div>
              </div>
            </div>
          </section>
        <?php endif; ?>

        <?php if (isset($banner['section_type']) && ($banner['section_type'] == 'Image')): ?>
          <?php //echo '<pre>'; print_r ($banner['banner_image']); echo '</pre>'; ?>
          <section>
            <div class="container text-center">
              <div class="photo_slider">
                <h4><?php echo $banner['section_title']; ?></h4>
                <?php if (is_array($banner['banner_image']) && count($banner['banner_image']) > 0): ?>
                  <center>
                    <a href="<?php echo $banner['banner_link']; ?>">
                      <img class="img-responsive b-lazy" width="<?php echo $banner['banner_image']['sizes']['medium-width']; ?>" height="<?php echo $banner['banner_image']['sizes']['medium-height']; ?>" data-src="<?php echo $banner['banner_image']['sizes']['medium']; ?>" alt="<?php echo $banner['section_title']; ?>" />
                    </a>
                  </center>
                <?php endif; ?>
              </div>        
            </div>
          </section>

        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>

<?php /* if (have_posts()): ?>

  <?php while (have_posts()): the_post(); ?>

  <?php the_content(); ?>

  <?php endwhile; ?>

  <?php endif; */ ?>

<?php
//get_sidebar();
get_footer();

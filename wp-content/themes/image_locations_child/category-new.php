<?php
/*
  Template Name: New
 */
get_header();
?>

<!--------title------------->
<section>
  <div class="container">
    <div class="title_sec">
      <div class="row">
        <div class="col-md-4 col-sm-4"><h2>New</h2>
          <?php
          if (function_exists('sharing_display')) {
            sharing_display('', true);
          }
          ?>				
        </div>
        <div class="col-md-6 col-sm-4 text-right">            



        </div>
        <div class="col-md-2 col-sm-4">

          <?php if (isset($_GET['city'])): ?>

            <a class="btn btn-primary pull-right" href="<?php
            if (isset($_GET['layout'])) {
              echo '?layout=quickview';
            } else {
              echo '?';
            }
            ?>">View All Cities</a>

          <?php else: ?>

            <select class="form-control" id="city_selection_dropdown">

              <option value="<?php echo site_url(); ?>/category/new/<?php
              if (isset($_GET['layout'])) {
                print ('?layout=quickview');
              }
              ?>">All Cities</option>

              <?php $allcities = array(); ?>

              <?php while (have_posts()) : the_post(); ?>   

                <?php $city1 = get_field('city_address'); ?>

                <?php if ($city1): ?>

                  <?php if (!in_array($city1, $allcities)): ?>

                    <option value="<?php echo site_url(); ?>/category/new/?city=<?php echo urlencode($city1); ?><?php
                    if (isset($_GET['layout'])) {
                      print ('&layout=quickview');
                    }
                    ?>"><?php echo $city1; ?></option>

                    <?php $allcities[] = $city1; ?>

                  <?php endif; ?>

                <?php endif ?>

              <?php endwhile; ?>						

            </select> 

          <?php endif; ?>

        </div>                                
      </div>

    </div>
  </div>
</section>

<?php if (isset($_GET['layout'])): ?>

  <section>
    <div class="container">
      <div class="project_side_sec">		
        <div class="row">

          <?php
          global $query_string;
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          query_posts($query_string . '&paged=' . $paged . '&posts_per_page=40');
          ?>

          <?php
          $i = 1;
          while (have_posts()): the_post();
            ?>

            <div class="col-md-2 col-sm-3 quickview">

              <?php
              $image = get_field('main_image_new');
              $size = 'medium'; // (thumbnail, medium, large, full or custom size)  
              ?>

              <?php if ($image): ?>							

                <a href="<?php the_permalink(); ?>">

                  <img width="<?php echo $image['sizes']['medium-width']; ?>" height="<?php echo $image['sizes']['medium-height']; ?>" src="<?php echo $image['sizes']['medium']; ?>"  class="img-responsive"  alt="<?php echo $image['alt']; ?>"/>

                </a>								

              <?php endif; ?>						
              <a href="<?php the_permalink(); ?>" class="text-decoration-none"><h3><?php the_title(); ?></h3></a>
              <div class="clearfix">&nbsp;</div>
            </div>

            <?php if ($i % 6 == 0): ?>
            </div><div class="row">
            <?php endif ?>

            <?php
            $i++;
          endwhile;
          ?>
        </div>
      </div>
    </div>
  </section>
<?php else: ?>
  <?php $tempCounter = 0; ?>
  <?php while (have_posts()): the_post(); ?>
    <?php $count = 0; ?>
    <section>
      <div class="container">
        <div class="project_side_sec">

          <div class="swiper-container category-new category-new-<?php echo $tempCounter; ?>"  >
            <div class="swiper-wrapper">
              <?php $banner_image_1 = get_any_image_url(get_field('banner_image_1'), 'medium'); ?>
              <?php $banner_image_2 = get_any_image_url(get_field('banner_image_2'), 'medium'); ?>
              <?php $banner_image_3 = get_any_image_url(get_field('banner_image_3'), 'medium'); ?>
              <?php $banner_type = get_field('banner_type'); ?>
              <?php if ($banner_type == '1 Photo' && $banner_image_1 != ""): ?>
                <div class="swiper-slide"> <a href="<?php the_permalink(); ?>"> <img class="img-responsive" src="<?php echo $banner_image_1; ?>"   /> </a> </div>
              <?php elseif ($banner_type == '2 Photos' && $banner_image_1 != "" && $banner_image_2 != ""): ?>
                <div class="swiper-slide"> <a href="<?php the_permalink(); ?>"> <img class="img-responsive" src="<?php echo $banner_image_1; ?>" /> </a> </div>
                <div class="swiper-slide"> <a href="<?php the_permalink(); ?>"> <img class="img-responsive" src="<?php echo $banner_image_2; ?>" /> </a> </div>
              <?php elseif ($banner_type == '3 Photos' && $banner_image_1 != "" && $banner_image_2 != "" && $banner_image_3 != ""): ?>
                <div class="swiper-slide" style="margin-right: 3px; max-width: 436px; overflow: hidden;" > <a href="<?php the_permalink(); ?>"> <img class="img-responsive" src="<?php echo $banner_image_1; ?>"  style=" max-width: none; height: 340px;" /> </a> </div>
                <div class="swiper-slide" style="margin-right: 3px; max-width: 436px; overflow: hidden;"> <a href="<?php the_permalink(); ?>"> <img class="img-responsive" src="<?php echo $banner_image_2; ?>"   style=" max-width: none; height: 340px;" /> </a> </div>
                <div class="swiper-slide" style="margin-right: 3px; max-width: 436px; overflow: hidden;"> <a href="<?php the_permalink(); ?>"> <img class="img-responsive" src="<?php echo $banner_image_3; ?>"   style=" max-width: none; height: 340px;" /> </a> </div>
              <?php endif; ?>


              <?php
              $other_images = get_field('location_photos_new');
              $size = 'medium'; // (thumbnail, medium, large, full or custom size)  
              ?>

              <?php if ($other_images): ?>

                <?php foreach ($other_images as $other_image): ?>

                  <?php if ($count < 3): ?>

                    <div class="swiper-slide">            
                      <a href="<?php the_permalink(); ?>">
                        <img   class="img-responsive" src="<?php echo $other_image['sizes']['medium']; ?>" width="<?php echo $other_image['sizes']['medium-width']; ?>" height="<?php echo $other_image['sizes']['medium-height']; ?>" />
                      </a>            
                    </div>                        

                  <?php else: ?>

                    <?php /* <div class="swiper-slide empty" style="width:<?php echo $other_image['sizes']['medium-width']; ?>px !important;background:url('<?php echo get_stylesheet_directory_uri(); ?>/images/slide-loader.gif') no-repeat;background-position:center;height:auto;"></div>
                      <div  class="lazy-slides" data-lazy_href="<?php the_permalink(); ?>" data-lazy_src="<?php echo $other_image['sizes']['medium']; ?>"></div> */ ?>

                    <div class="lazy-slides" data-lazy_href="<?php the_permalink(); ?>" data-lazy_src="<?php echo $other_image['sizes']['medium']; ?>"></div>

                  <?php endif; ?>

                  <?php
                  $count++;
                endforeach;
                ?>

              <?php endif; ?>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev swiper-button-prev-<?php echo $tempCounter; ?>"></div>
            <div class="swiper-button-next swiper-button-next-<?php echo $tempCounter; ?>"></div>                    

            <div class="swiper-scrollbar swiper-scrollbar-<?php echo $tempCounter; ?>"></div>

          </div>    


          <div class="row">
            <div class="col-md-12 col-sm-12">
				<a class="text-decoration-none" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
				
				<div class="link">

                <?php $city = get_field('city_address'); ?>

                <?php if ($city): ?>

                  <a href="/locations/?city=<?php echo urlencode($city); ?>"><?php echo $city; ?></a>

                <?php endif; ?>

                <span> / </span>

                <?php $permits = get_field('permit'); ?>

                <?php if ($permits): ?>

                  <?php foreach ($permits as $post): // variable must be called $post (IMPORTANT)   ?>

                    <?php setup_postdata($post); ?>

                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>									

                  <?php endforeach; ?>

                  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly    ?>

                <?php endif; ?>

              </div>
				
				
			</div>


          </div>
        </div>
      </div>
    </section>


    <?php //break; ?>

    <?php $tempCounter++; ?>
  <?php endwhile; ?>

<?php endif; ?>


<!--------pagination section------------->
<section>
  <div class="container">
    <div class="buttom_pagi_sec">
      <div class="row">
        <div class="col-md-8 col-sm-12">  

          <?php /* Display navigation to next/previous pages when applicable */ ?>
          <?php if (function_exists('reverie_pagination')) { ?>
            <?php reverie_pagination(); ?>
          <?php } else if (is_paged()) { ?>
            <nav id="post-nav">
              <div class="post-previous">
                <?php next_posts_link(__('&larr; Older posts', 'reverie')); ?>
              </div>
              <div class="post-next">
                <?php previous_posts_link(__('Newer posts &rarr;', 'reverie')); ?>
              </div>
            </nav>
          <?php } ?>  


        </div>
        <div class="col-md-4 col-sm-12">
          <?php if (isset($_GET['layout'])): ?> 
            <a href="?<?php
            if (isset($_GET['city'])) {
              print ('city=' . $_GET['city']);
            }
            ?>" class="btn btn-primary pull-right"> View Full View</a>
             <?php else: ?>
            <a href="
            <?php
            if (isset($_GET['city'])) {
              print ('?city=' . $_GET['city'] . '&');
            } else {
              print ('?');
            }
            ?>layout=quickview" class="btn btn-primary pull-right"> View Quickview</a>
          <?php endif ?>		
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
<?php get_header(); ?>

<!--------title------------->
<section>
  <div class="container">
    <div class="title_sec">
      <div class="row">

        <div class="col-md-12 col-sm-12">

          <?php $query_string_value = ''; ?>

          <?php if (isset($_GET) && count($_GET > 0)): ?>

            <?php foreach ($_GET as $key => $value): ?>

              <?php if ($key != 'city'): ?>

                <?php $query_string_value .= $value . ', '; ?>

              <?php endif; ?>

            <?php endforeach; ?>

            <?php $query_string_value = ltrim($query_string_value, ', '); ?>
            <?php $query_string_value = rtrim($query_string_value, ', '); ?>

            <?php if (isset($_GET['city'])): ?>

              <?php $query_string_value .= implode(",", $_GET['city']); ?>

            <?php endif; ?>

          <?php endif; ?>

          <h2>Locations | <?php echo $query_string_value; ?></h2>

          <?php
          if (function_exists('sharing_display')) {
            sharing_display('', true);
          }
          ?>

        </div>

      </div>

    </div>
  </div>
</section>

<?php if (have_posts()): ?>

  <?php $tempCounter = 0; ?>
  <?php while (have_posts()): the_post(); ?>

    <section>
      <div class="container">
        <div class="project_side_sec">

          <div class="swiper-container advance-search-result advance-search-result-<?php echo $tempCounter; ?>">

            <div class="swiper-wrapper">

              <?php $banner_image_1 = get_any_image_url(get_field('banner_image_1'), 'medium'); ?>
              <?php $banner_image_2 = get_any_image_url(get_field('banner_image_2'), 'medium'); ?>
              <?php $banner_image_3 = get_any_image_url(get_field('banner_image_3'), 'medium'); ?>

              <?php $banner_type = get_field('banner_type'); ?>

              <?php if ($banner_type == '1 Photo' && $banner_image_1 != ""): ?>

                <div class="swiper-slide">            
                  <a href="<?php the_permalink(); ?>">
                    <img class="img-responsive" src="<?php echo $banner_image_1; ?>" />
                  </a>            
                </div>							

              <?php elseif ($banner_type == '2 Photos' && $banner_image_1 != "" && $banner_image_2 != ""): ?>

                <div class="swiper-slide">            
                  <a href="<?php the_permalink(); ?>">
                    <img class="img-responsive" src="<?php echo $banner_image_1; ?>" />
                  </a>            
                </div>							

                <div class="swiper-slide">            
                  <a href="<?php the_permalink(); ?>">
                    <img class="img-responsive" src="<?php echo $banner_image_2; ?>" />
                  </a>            
                </div>							

              <?php elseif ($banner_type == '3 Photos' && $banner_image_1 != "" && $banner_image_2 != "" && $banner_image_3 != ""): ?>

                <div class="swiper-slide">            
                  <a href="<?php the_permalink(); ?>">
                    <img class="img-responsive" src="<?php echo $banner_image_1; ?>" />
                  </a>            
                </div>							

                <div class="swiper-slide">            
                  <a href="<?php the_permalink(); ?>">
                    <img class="img-responsive" src="<?php echo $banner_image_2; ?>" />
                  </a>            
                </div>							

                <div class="swiper-slide">            
                  <a href="<?php the_permalink(); ?>">
                    <img class="img-responsive" src="<?php echo $banner_image_3; ?>" />
                  </a>            
                </div>							

              <?php endif; ?>						

              <?php
              $count = 0;
              $images = get_field('location_photos_new');
              ?>

              <?php if ($images): $count = 0; ?>

                <?php foreach ($images as $image): ?>

                  <?php if ($count < 5): ?>

                    <div class="swiper-slide">
                      <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
                      </a>
                    </div>

                  <?php else: ?>

                    <?php /* <div class="swiper-slide empty" style="width:<?php echo $image['sizes']['medium-width']; ?>px !important;background:url('<?php echo get_stylesheet_directory_uri(); ?>/images/slide-loader.gif') no-repeat;background-position:center;height:auto;"></div>
                      <div class="lazy-slides" data-lazy_href="<?php the_permalink(); ?>" data-lazy_src="<?php echo $image['sizes']['medium']; ?>"></div> */ ?>

                    <div class="lazy-slides" data-lazy_href="<?php the_permalink(); ?>" data-lazy_src="<?php echo $image['sizes']['medium']; ?>"></div>


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

          <?php /*

            <div class="owl-carousel advance-search-result">

            <?php  $image = get_field('extended_new'); ?>

            <?php if ($image): ?>

            <div class="item">
            <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
            </a>
            </div>

            <?php endif; ?>

            <?php $count = 0; $images = get_field('location_photos_new'); ?>

            <?php if ($images): $count = 0; ?>

            <?php foreach ($images as $image): ?>

            <div class="item">
            <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" style="" />
            </a>
            </div>

            <?php
            if ($count ++ == 10)
            break;
            endforeach;
            ?>

            <?php endif; ?>

            </div>

           */ ?>  
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                <h3><?php the_title(); ?></h3>
              </a>
              <div class="link">

                <?php $permits = get_field('permit'); ?>

                <?php if ($permits): ?>

                  <?php foreach ($permits as $post): // variable must be called $post (IMPORTANT)   ?>

                    <?php setup_postdata($post); ?>

                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>									

                  <?php endforeach; ?>

                  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly    ?>

                <?php endif; ?>

                <span> / </span>

                <?php $city = get_field('city_address'); ?>

                <?php if ($city): ?>

                  <a href="/locations/?city=<?php echo urlencode($city); ?>"><?php echo $city; ?></a>

                <?php endif; ?>
              </div>			  
            </div>


            <!--<button class="btn btn-primary append-slide">Add new slide</button> -->
          </div>
        </div>
      </div>
    </section>

    <?php $tempCounter++; ?>
  <?php endwhile; ?>

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

        </div>
      </div>
    </div>
  </section>

<?php else: ?>

  <?php get_template_part('content', 'none'); ?>

<?php endif; ?>

<?php get_footer(); ?>
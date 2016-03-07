<?php
$segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));

$first_page_url = site_url()."/projects/".$segments[1]."/1";
/*
  Template Name: Exclusives
 */
get_header();

?>
<style>
    .liked_locations{display: none !important;}
</style>


 
<!--------title------------->
<section>
	<div class="container">
    	<div class="title_sec">
        	<div class="row">
			
				<div class="col-md-12 col-sm-12 text-center">
					<?php if (has_post_thumbnail()): ?> 
			
						<?php the_post_thumbnail('medium', array('class' => 'img-responsive', 'style' => 'max-height: 200px; margin:0 auto;')); ?>

					<?php endif; ?>
				</div>
				
            	<div class="col-md-8 col-sm-8">
					<h2>
						Project | <?php the_title(); ?>
					</h2>
					
					<?php /* <time datetime="<?php the_time('o-m-d') ?>" class="post-date date updated" style="display:none;" pubdate><?php the_time(apply_filters('themify_loop_date', 'M j, Y')) ?></time>
					<span class="vcard author" style="display:none;">
						<span class="fn">Image Locations, Inc.</span>
					</span> */ ?>
					
				</div>
            	
            	<div class="col-md-4 col-sm-4 text-right">
					
					<div  class="zip-link" id="email" style="display:inline-block; float:right; margin-right: 7px; margin-top: 0px;"><a href="#email_form" class="btn btn-primary" id="email_link" style="color:#777;">Email Us</a></div>

					<div  class="zip-link unhide" id="unhide" style="display:inline-block; float:right; margin-right: 3px; margin-top: 0px;"><a id="unhide_link" class="btn btn-primary" style="color:#777;">Unhide All</a></div>


					<div id="email_form" style="display:none; width:400px;">
						    
					  <section>
					  
						<div class="contact_popup  email_us_popup">
						
						 <h4>Email us about <strong><?php the_title(); ?></strong></h4>
						  
						 <div class="clearfix"></div>
						  
						 <div class="row">

							<div class="col-md-12">								  
								<?php echo do_shortcode('[contact-form-7 id="116483" title="Sharing Email"]') ?>
							</div>  
			
						  </div>
						  
						</div>
						
					  </section>
						
					</div>

				</div>
            	
            </div>
        	
		</div>
    </div>
</section>

<div class="clearfix">&nbsp;</div>
<!-- Main Content Start -->
<?php
// $posts = get_field('project_locations');        

$ids = get_field('project_locations', false, false);
// echo "<pre>";print_r($ids);echo "</pre>";exit;

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;



$paged = isset($segments[2]) && $segments[2] >= 1 ? $segments[2]:1;

$wp_query = new WP_Query(array(
		'posts_per_page'	=> 20,
		'post__in'		=> $ids,
		'orderby'		=> 'post__in',
		'paged' => $paged,
));

if ($wp_query):?>

<?php $tempCounter = 0;?>
<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();?>
		
<section>
	<div class="container">
		<div class="project_side_sec" id="post-<?php the_ID(); ?>" <?php post_class('index-card'); ?>>
			
			<div class="swiper-container single-project single-project-<?php echo $tempCounter;?>">
				<div class="swiper-wrapper">

					<?php $banner_image_1 = get_any_image_url(get_field('banner_image_1'), 'medium'); ?>
					<?php $banner_image_2 = get_any_image_url(get_field('banner_image_2'), 'medium'); ?>
					<?php $banner_image_3 = get_any_image_url(get_field('banner_image_3'), 'medium'); ?>
					
					<?php $banner_type = get_field('banner_type'); ?>
					
					<?php if($banner_type == '1 Photo' && $banner_image_1 != ""): ?>

							<div class="swiper-slide">            
								<a href="<?php the_permalink(); ?>">
									<img class="img-responsive" src="<?php echo $banner_image_1; ?>" />
								</a>            
							</div>							
					
					<?php elseif($banner_type == '2 Photos' && $banner_image_1 != "" && $banner_image_2 != ""): ?>
											
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
					
					<?php elseif($banner_type == '3 Photos' && $banner_image_1 != "" && $banner_image_2 != "" && $banner_image_3 != ""): ?>
									
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
					
					<?php $other_images = get_field('location_photos_new');  $size = 'medium'; // (thumbnail, medium, large, full or custom size) ?>

					<?php if( $other_images ): $count = 0; ?>

						<?php foreach( $other_images as $other_image ): ?>
								
							<?php if($count < 3): ?>
							
								<div class="swiper-slide">            
									<a href="<?php the_permalink(); ?>">
										<img class="img-responsive" src="<?php echo $other_image['sizes']['medium']; ?>" />                
									</a>            
								</div>                        
							
								<?php else: ?>
									
									<?php /*<div class="swiper-slide empty" style="width:<?php echo $other_image['sizes']['medium-width']; ?>px !important;background:url('<?php echo get_stylesheet_directory_uri(); ?>/images/slide-loader.gif') no-repeat;background-position:center;height:auto;"></div>
									<div class="lazy-slides" data-lazy_href="<?php the_permalink(); ?>" data-lazy_src="<?php echo $other_image['sizes']['medium']; ?>"></div>*/ ?>
									<div class="lazy-slides" data-lazy_href="<?php the_permalink(); ?>" data-lazy_src="<?php echo $other_image['sizes']['medium']; ?>"></div>
                  
								<?php endif; ?>
									
							<?php $count++; endforeach; ?>

					<?php endif; ?>
					
				</div>
				<!-- Add Pagination -->
				<div class="swiper-pagination"></div>

				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev swiper-button-prev-<?php echo $tempCounter;?>"></div>
				<div class="swiper-button-next swiper-button-next-<?php echo $tempCounter;?>"></div>                    

				<div class="swiper-scrollbar swiper-scrollbar-<?php echo $tempCounter; ?>"></div>
										  
			</div>    
			
			<div class="row">
				<div class="col-md-10 col-sm-9 ">
					<a class="text-decoration-none" href="<?php the_permalink(); ?>">
						<h3><?php the_title(); ?></h3>
					</a>	
					
					<div class="link">
						
					   <?php $city = get_field('city_address'); ?>
					   
					   <?php if( $city): ?>
					   
							  <a href="/locations/?city=<?php echo urlencode($city); ?>"><?php echo $city; ?></a>
							  
						<?php endif; ?>
  
						<span> / </span>
						
						<?php $permits = get_field('permit'); ?>
						
						<?php if( $permits  ): ?>
						
							<?php foreach( $permits as $post): // variable must be called $post (IMPORTANT) ?>
						
								<?php setup_postdata($post); ?>
								
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>									
								
							<?php endforeach; ?>
							
							<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							
						<?php endif; ?>
						<div class="clearfix"></div>
						
					</div>
					
				</div>
						
				
				<div class="col-md-2 col-sm-3 text-right">
					
					<div class="link">
												
						<div class="hide-div" style="display:inline-block;"><a data-title="<?php the_title(); ?>" data-href="<?php the_permalink(); ?>" class="btn btn-default">Hide</a></div>

						<div style="display:inline-block;"><a data-title="<?php the_title(); ?>" data-href="<?php the_permalink(); ?>" class="like btn btn-default" style="color:#777;">Like</a></div>
						
					</div>
					
				</div>				
				
			</div>
		
		</div>
	</div>
</section>

<?php $tempCounter++; endwhile; ?>
<?php endif; ?>

<!--------pagination section------------->
<section>
  <div class="container">
    <div class="buttom_pagi_sec">
      <div class="row">
        <div class="col-md-8 col-sm-12">  

			<?php  if(function_exists('child_theme_pagination_home')): ?>
    
				<?php child_theme_pagination_home(); ?> 	
				
			<?php elseif(is_paged()): ?>
					
				<nav id="post-nav">
					<div class="post-previous"><?php next_posts_link(__('&larr; Older posts', 'reverie')); ?></div>
					<div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', 'reverie')); ?></div>
				</nav>
		
			<?php endif; ?>

        </div>
	  </div>
    </div>
  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> 
<script>
	jQuery(function ($) {

		$(document).ready(function () {
			
			<?php if(isset($segments[2]) && $segments[2] == 2):?>
				// alert("here");    
				$('.prev.page-numbers').attr('href','<?php echo $first_page_url;?>');                    
			<?php endif;?>
			
			
			$('.page-numbers').each(function(){
				
				// alert($.trim($(this).text()))
				if($.trim($(this).text()) == 1)
				{
					$(this).attr('href','<?php echo $first_page_url;?>');
				}
				
			})
			
			setTimeout(function () {
				updateLikedLocations();
			}, 1000);
			
			/* For selecting by default like location */			
			var action_get = 'getLikeLocations';			
			$.ajax({
			  method: "POST",
			  url: "/wp-content/themes/image_locations_child/like-hide.php",
			  data: { action: action_get}
			}).done(function( data ) {
				
				var location_arr = $.parseJSON(data);
				
				jQuery('a.like').each(function( index ) {
					var href = jQuery(this).data('href');
					
					var obj = location_arr.rows;
					
					for(var key in obj){
						var attrName = key;
						var attrValue = obj[key];						
						if(href == attrValue){
							jQuery(this).addClass('red');
						}
					}					
					
				});
				
			});
  			
			/* For selecting by default like location */			
			var action_get = 'getHideLocations';			
			$.ajax({
			  method: "POST",
			  url: "/wp-content/themes/image_locations_child/like-hide.php",
			  data: { action: action_get}
			}).done(function( data ) {
				
				var location_arr = $.parseJSON(data);
				
				jQuery('.hide-div a').each(function( index ) {
					var href = jQuery(this).data('href');
					
					var obj = location_arr.rows;
					
					for(var key in obj){
						var attrName = key;
						var attrValue = obj[key];						
						if(href == attrValue){
							jQuery(this).closest('section').addClass('hide');
						}
					}					
					
				});
				
			});
  			
			
			
		});
		
		
		
		$(function () {


			$("#email_link").fancybox();

			$(document).on('click', '.like', function () {
				var entry_label = $(this).data('title'),
					href = $(this).data('href'),
					act = $(this).hasClass('red') ? 'unlike' : 'like';
				
				$(this).toggleClass("red");
				
				updateLikedLocations();
				
				//$.post('/wp-content/themes/image_locations_child/like-hide.php?action=' + act, {entry: entry_label, href: href});
				
				$.ajax({
				  method: "POST",
				  url: "/wp-content/themes/image_locations_child/like-hide.php",
				  data: { action: act, entry: entry_label, href: href }
				}).done(function( locations ) {
					//console.log(locations);
				});
  
			});
			
			$(document).on('click', '.hide-div a', function () {
				var act = 'hide';
				var entry_label = $(this).data('title'),
				href = $(this).data('href');
				
				jQuery(this).closest('section').addClass('hide');
				
				//$(this).parent('section').addClass('hide');
				
				//$.post('/wp-content/themes/image_locations_child/likehide.php?act=hide', {entry: entry_label, href: href});
				
				$.ajax({
				  method: "POST",
				  url: "/wp-content/themes/image_locations_child/like-hide.php",
				  data: { action: act, entry: entry_label, href: href }
				}).done(function( locations ) {
					
				});
			});
			
			$(document).on('click', '.unhide', function () {
				var hidden = [];
				var act = 'unhide';
				
				$('section.hide').each(function () {
					$(this).show();
					$(this).removeClass('hide');
					
					hidden.push($(this).find('h3 a').attr('href'));
					
				});

				$.ajax({
				  method: "POST",
				  url: "/wp-content/themes/image_locations_child/like-hide.php",
				  data: { action: act, hidden: hidden }
				}).done(function( locations ) {
					
				});
				
			});
		
		});
	});

	function updateLikedLocations() {
		$text = '';

		jQuery('.like.red').each(function () {
			$text += " " + jQuery(this).data('title') + ",";
		});
		// alert(jQuery('.like.red').size() + $text)

		if ($text == "")
			$text = '-';
		else
			$text = $text.substring(0, $text.length - 1);

		// alert($text)

		jQuery('.liked_locations').val($text);
		console.log(jQuery('.liked_locations').val() + " => " + $text);
	}
	
</script>

    <?php get_footer(); ?>
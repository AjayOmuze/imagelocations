<?php
/*
  Template Name: Contact Page
 */
get_header(); ?>

<?php while(have_posts()): the_post(); ?>

<div class="clearfix">&nbsp;</div>

<section>
	<div class="container">
		<div class="contact_sec">
			
			<div class="row md">
				
				<?php $content_box = get_field('contact_box'); ?>
								
				<?php if(is_array($content_box) && count($content_box) > 0): ?>
				
					<?php foreach($content_box as $box): ?>
					
						<?php if($box['box_type'] == 'Info Box'): ?>						
											
							<div class="col-md-2 col-sm-3 pd col-xs-6">
								
								<div class="green_bg">
									
									<?php echo $box['box_content']; ?>
									
								</div>
								
							</div>
									
						<?php elseif($box['box_type'] == 'Person'): ?>
										
							<div class="col-md-2 col-sm-3 pd col-xs-6">
								<div class="view view-sixth">
									
									<?php if(is_array($box['person_image']) && count($box['person_image']) > 0): ?>
										<img class="img-responsive" src="<?php echo $box['person_image']['sizes']['medium']; ?>" alt="<?php echo $box['person_image']['alt']; ?>" width="100%" />
									<?php endif; ?>
																			
									<div class="mask">						
										
										<?php if(trim($box['person_name']) != ""): ?>
											<h2><?php echo $box['person_name']; ?></h2>
										<?php endif; ?>
										
										<?php if(trim($box['person_designation']) != ""): ?>
											<p><?php echo $box['person_designation']; ?></p>
										<?php endif; ?>
										
										<div class="line"></div>
										
										<?php if(trim($box['person_email']) != ""): ?>
											<p><a href="mailto:<?php echo $box['person_email']; ?>"><?php echo $box['person_email']; ?></a></p>
										<?php endif; ?>
										
									</div>
									
								</div>
								<div class="clearfix"></div>
							</div>
					
						<?php elseif($box['box_type'] == 'Image'): ?>
						
								<div class="col-md-2 col-sm-3 pd col-xs-6">
								
									<?php if(is_array($box['display_image']) && count($box['display_image']) > 0): ?>
										
										<?php if(trim($box['display_image_link']) != ''): ?>
										
											<?php $target = (isset($box['open_link_in_new_tab'][0]))? 'target="_blank"' : ''; ?>
										
											<a href="<?php echo $box['display_image_link']; ?>" <?php echo $target; ?>>
											
												<img class="img-responsive" src="<?php echo $box['display_image']['sizes']['medium']; ?>" alt="<?php echo $box['display_image']['alt']; ?>" width="100%" />
												
											</a>
										
										<?php else: ?>
										
											<img class="img-responsive" src="<?php echo $box['display_image']['sizes']['medium']; ?>" alt="<?php echo $box['display_image']['alt']; ?>" width="100%" />
											
										<?php endif; ?>
										
									<?php endif; ?>
									
								</div>
						
						<?php endif ?>
					
					<?php endforeach; ?>
				
				<?php endif; ?>
				
			</div>
			
		</div>
		
	</div>
	
</section>

<section>
	<div class="container">
		<div class="about_sec">
		
			<div class="row">
				<?php the_content(); ?>
			</div>
			
		</div>
	</div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
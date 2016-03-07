<?php
/*
  Template Name: Props
 */
get_header();
?>

<!--------title------------->
<section>
  <div class="container">
    <div class="title_sec">
      <div class="row">
        
		<div class="col-md-4 col-sm-4"><h2>Props</h2>
			<?php
				if (function_exists('sharing_display')) {
					sharing_display('', true);
				}
			?>				
		</div>
		
		<div class="col-md-6 col-sm-4 text-right"></div>
		
		<div class="col-md-2 col-sm-4">

        </div>                                
      
	  </div>

    </div>
  </div>
</section>

<?php $args = array('post_type' => 'props', 'posts_per_page' => '1'); ?>

<?php query_posts($args); ?>

<?php while(have_posts()): the_post(); ?>

<!-- Prop section -->
<section>
    <div class="props_sec">
        <div class="container">
            <div class="demo">
                <div class="GITheWall">
                  <ul>
					
					<?php $props = get_field('prop'); ?>
					
					<?php if(is_array($props) && count($props) > 0): ?>
					
						<?php $i=1; foreach($props as $prop): ?>
						
							<li data-contenttype="inline" data-href="#inline-template-<?php echo $i; ?>">
								<div class="image">
								
									<?php if(isset($prop['prop_image']['sizes']['thumbnail'])): ?>
									
										<img src="<?php echo $prop['prop_image']['sizes']['thumbnail']; ?>"/>
									
									<?php endif; ?>
									
								<div class="overlay"><div class="txt">
									<div class="red_title"><?php echo $prop['prop_title']; ?></div>
									<div class="detail">Price:<span><?php echo $prop['prop_price']; ?></span></div>
									<div class="detail">Quantity:<span><?php echo $prop['quantity']; ?></span></div>
									<div class="detail">ID:<span><?php echo $prop['id']; ?></span></div>									
								</div></div>
								</div>
							
							
							</li>                    
						
						<?php $i++; endforeach; ?>
					
					<?php endif; ?>
                                                                                                                                                               
                  </ul>
                </div>
              </div>
        </div>
    </div>
</section>


<?php endwhile; ?>

<script>
jQuery(document).ready(function(){
	

  var wall = jQuery('.GITheWall').GITheWall({
      nextButtonClass: 'fa fa-arrow-right',
      prevButtonClass: 'fa fa-arrow-left',
      closeButtonClass: 'fa fa-times'
  });

  jQuery('.add-item').on('click',function(){
    jQuery('.GITheWall ul').append('<li data-contenttype="image" data-href="http://lorempixel.com/570/570?18"><img src="http://lorempixel.com/570/570?' + Math.random() + '" /></li>');
    wall.refresh();
  });

  jQuery('.remove-item').on('click',function(){
    jQuery('.GITheWall ul li:last').remove();
    wall.refresh();
  });

  hljs.initHighlightingOnLoad();

});  
</script>

<?php while(have_posts()): the_post(); ?>

	<?php $props = get_field('prop'); ?>
					
	<?php if(is_array($props) && count($props) > 0): ?>
					
		<?php $i=1; foreach($props as $prop): ?>
		
			<div id="inline-template-<?php echo $i; ?>" style="display:none;">
			<div class="ajax">
				<div class="row props_content">
					<div class="col-md-3 col-sm-4 col-xs-12">
						<h1><?php echo $prop['prop_title']; ?></h1>
						<div class="detail">Price:<span><?php echo $prop['prop_price']; ?></span></div>
						<div class="detail">Quantity:<span><?php echo $prop['quantity']; ?></span></div>
						<div class="detail">ID:<span><?php echo $prop['id']; ?></span></div>
						<button class="btn btn-default prop-contact-fancybox" data-id_val="<?php echo $prop['id']; ?>" data-item_name="<?php echo $prop['prop_title']; ?>" data-id="#prop_contact_popup"><i class="fa fa-phone"></i>Contact Us</button><br>
						<?php
							if (function_exists('sharing_display')) {
								sharing_display('', true);
							}
						?>
						<br>
						
						<?php $from_location = get_field('prop_location'); ?>
						
						<?php if(is_array($from_location) && count($from_location) > 0): ?>
						
							<?php foreach($from_location as $location): ?>
						
								<a href="<?php echo get_the_permalink($location->ID); ?>" class="btn btn-default"><i class="fa fa-check-circle"></i><?php echo $location->post_title; ?></a><br />
							
							<?php endforeach; ?>
						
						<?php endif; ?>
						
					</div>
					<div class="col-md-9 col-sm-8 col-xs-12">
						
						<?php if(isset($prop['prop_image']['sizes']['large'])): ?>
					
							<img src="<?php echo $prop['prop_image']['sizes']['large']; ?>" class="img-responsive" />
																
						<?php endif; ?>
						
					</div>
				</div>        
			</div>
			</div>
	
		<?php $i++; endforeach; ?>
			
	<?php endif; ?>

<?php endwhile; ?>

<div style="display:none" >
    <div id="prop_contact_popup">    
        <section>
            <div class="location_pdf_popup">
                <h4>Get in touch with us.</h4>
                <hr/>
				<?php echo do_shortcode('[contact-form-7 id="146911" title="Prop Item Contact"]') ?>
				
				<div class="clearfix"></div>
            </div>
        </section>
    </div>
</div>

<script>
jQuery(document).ready(function(){
	jQuery(document).on('click', '.prop-contact-fancybox', function(){
		$id = jQuery(this).data('id');
		$prop_item_name = jQuery(this).data('item_name');
		jQuery('#prop_item_name').val($prop_item_name);		
		jQuery('.hidden_item_id').val(jQuery(this).data('id_val'));		
		jQuery('#comman-link').attr('href',$id);
		jQuery('#comman-link').trigger('click');			
	});

	/*
	jQuery(document).on('hover','.ajax .sharing-anchor',function () {
			jQuery('.ajax .sharing-hidden .inner').show();
			jQuery('.ajax .sharing-hidden .inner').css('width', '300px');
			jQuery('.ajax .sharing-hidden .inner').css('display', 'block !important');
			jQuery('.sharing-hidden ul li').css('display', 'inline !important');
			//console.log('hover');
	});
	
	jQuery(document).on('leave','.ajax .sharing-anchor',function () {
			jQuery('.ajax .sharing-hidden .inner').hide();
			jQuery('.ajax .sharing-hidden .inner').css('display', 'none !important');
			jQuery('.sharing-hidden ul li').css('display', 'done !important');
			//console.log('leave');
	});
	*/
	
});
</script>

<?php get_footer(); ?>
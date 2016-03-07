<?php get_header(); ?>

<!-------- title ------------->
<section>
  <div class="container">
    <div class="title_sec">
      <div class="row">
        
		<div class="col-md-12 col-sm-12">
			
			<h2>Search Results for "<?php echo get_search_query(); ?>"</h2>
			
		</div>
		
		<div class="clearfix">&nbsp;</div>		

	  </div>

    </div>
  </div>
</section>

<section>
    <div class="container">
      <div class="search_results_sec">
        <div class="row row_md">
			<div class="search_results_box_view">				
	  
			<?php if (have_posts()) : ?>
			  
			  <?php $i=1; while (have_posts()) : the_post(); ?>
			  
				<div class="col-md-5ths col-sm-5ths col-xs-6 col_pd">
					
					<?php $image = get_field('main_image_new'); ?>
					
					<?php if (!empty($image)): ?>					  
					
						<a href="<?php echo get_the_permalink(); ?>">
						
<!--							<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" width="100%" class="img-responsive" />-->
                                                        <img  src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $image['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $image['sizes']['large']; ?>" class="img-responsive"/>
						</a>
									
					<?php endif; ?>
					  
					  <div class="text_caption">
						<p><?php the_title(); ?></p>
					  </div>
					
				</div>
				  
				<?php /*if ($i % 5 == 0): ?>
				</div></div><div class="row row_md"><div class="search_results_box_view">
				<?php endif*/ ?>

			  <?php $i++; endwhile; ?>
			  
			  <?php wp_reset_query(); ?>
			  
			<?php else : ?>
			
			  <?php get_template_part('content', 'none'); ?>
			  
			<?php endif; ?>
			
		</div>
	  </div>
	</div>
  </div>
</section>

<!--------pagination section------------->
<section>
  <div class="container">
    <div class="buttom_pagi_sec">
      <div class="row">
        <div class="col-md-8 col-sm-12">  

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		
		<?php if ( function_exists('reverie_pagination') ) {  ?>
					
			<?php reverie_pagination(); ?>
			
		<?php } else if ( is_paged() ) { ?>
			
			<nav id="post-nav">
			  <div class="post-previous">
				<?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?>
			  </div>
			  <div class="post-next">
				<?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?>
			  </div>
			</nav>
			
		<?php } ?>  

        </div>

	</div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
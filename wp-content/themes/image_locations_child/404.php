<?php get_header(); ?>

<section class="no-results not-found container">
	
	<div class="title_sec">
		<h2><?php _e('File Not Found', 'reverie'); ?></h2>
	</div>
	
	<div class="clearfix">&nbsp;</div>
	
	<p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
	<p>Please try the following:</p>
	<div class="clearfix">&nbsp;</div>
	
	<p><?php _e('Check your spelling', 'reverie'); ?></p>
	<p><?php printf(__('Return to the <a href="%s" class="text-decoration-none">home page</a>', 'reverie'), home_url()); ?></p>
	<p><?php _e('Click the <a class="text-decoration-none" href="javascript:history.back()">Back</a> button', 'reverie'); ?></p>
	
	<div class="clearfix">&nbsp;</div>
</section><!-- .no-results -->

		
<?php get_footer(); ?>
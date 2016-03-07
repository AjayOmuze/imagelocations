<?php

/**
 * Template Name: Full Width Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
?>

<?php while (have_posts()): the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; ?>
<?php

//get_sidebar();
get_footer();

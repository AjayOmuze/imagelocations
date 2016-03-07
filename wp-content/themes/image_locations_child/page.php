<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
?>
<section>
  <div class="container">
    <?php while (have_posts()): the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>
  </div>
</section>
<?php
get_footer();

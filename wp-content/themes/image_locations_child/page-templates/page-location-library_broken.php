<?php
/*
  Template Name: Location Library
 */
get_header();
?>


<!--------location library------------->
<section>
    <div class="container">
        <div class="location_sec">
            <div class="row">
                <!--------left------------->
                <div class="col-md-3 col-sm-4">
                    <div class="leftside">
                        <a href="javascript:void(0);" data-target="" class="location-hash-link btn btn-primary red_text">Exclusives<i class="fa fa-angle-right"></i></a>
                        <a href="javascript:void(0);" data-target="featured_categories_anchor" class="location-hash-link btn btn-primary">Featured<i class="fa fa-angle-right"></i></a>
                        <a href="javascript:void(0);" data-target="all_ctegories_anchor" class="location-hash-link btn btn-primary">All Categories<i class="fa fa-angle-right"></i></a>
                        <div class="link_left categories_sm_links">
                            <ul>
                                <?php
                                $args = array(
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'exclude' => '11839',
                                );
                                ?>

                                <?php $categories = get_categories($args); ?>

                                <?php foreach ($categories as $category): ?>

                                    <?php
                                    if (is_numeric($category->name[0])):

                                        echo '<li><a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__("View all posts in %s"), $category->name) . '" ' . '><span>›</span>' . $category->name . '</a></li>';

                                    else:

                                        foreach (range('A', 'Z') as $i) {

                                            if (strpos($category->name[0], $i) !== FALSE) {

                                                if ($category->name[0] == $current_letter) {

                                                    echo '<li><a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__("View all posts in %s"), $category->name) . '" ' . '><span>›</span>' . $category->name . '</a></li>';
                                                } else {

                                                    echo '<li><a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__("View all posts in %s"), $category->name) . '" ' . '><span>›</span>' . $category->name . '</a></li>';
                                                }
                                                $current_letter = $category->name[0];
                                            }
                                        }

                                    endif;
                                    ?>

                                <?php endforeach; ?>

                            </ul>
                        </div>
                        <div id="abcd">
                            <ul>
                                <?php 
                                    $azRange = range('A', 'Z');
                                    foreach ($azRange as $letter)
                                    {
                                        ?>
                                        <li><a href="javascript:void(0);" class="location-hash-link" data-target="<?php echo $letter;?>"><?php echo $letter;?></a></li>
                                        <?php 
                                    }    
                                ?>                                                                                                
                            </ul>
                        </div>                        
                        <div class="clearfix"></div>
                    </div>

                </div>
                <!--------right------------->
                <div class="col-md-9 col-sm-8">
                    <div class="right_photo">

                        <?php query_posts('category_name=Exclusives&showposts=20'); ?>

                        <?php if (have_posts()) : ?>

                            <div class="row md">	

                                <?php $i = 1;
                                while (have_posts()) : the_post(); ?>

                                    <div class="col-md-3 col-sm-6 pd">
										<a href="<?php echo get_the_permalink(); ?>">
                                        <?php
                                        $image_main = get_field('main_image_new');
                                        $size_main = 'medium'; // (thumbnail, medium, large, full or custom size)
                                        $image_library = get_field('location_library_image');
                                        $size_library = 'medium'; // (thumbnail, medium, large, full or custom size)
                                        ?>

                                        <?php if ($image_library): ?>

                                            <?php $image_src = wp_get_attachment_image_src($image_library, $size_library, false, array('class' => 'img-responsive')); ?>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $image_src; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $image_src[0]; ?>" class="img-responsive" />

                                        <?php elseif ($image_main): ?>

                                            <?php $image_src = wp_get_attachment_image_src($image_main, $size_main, false, array('class' => 'img-responsive')); ?>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $image_src; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $image_src[0]; ?>" class="img-responsive" />

										<?php endif; ?>

                                        <div class="text_caption">
                                            <p><?php echo the_title(); ?></p>
                                        </div>
									
										</a>
										
                                    </div>

        <?php if ($i % 4 == 0): ?>

                                        <div class="clearfix"></div>

                                    <?php endif; ?>

        <?php $i++;
    endwhile; ?>                                                                                                                  

                                <div class="col-md-3 col-sm-6 pd">
                                    <a href="/zen-garden/">                                        
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo site_url().'/wp-content/uploads/2015/05/Garden-06k-FrontBanner_12-513x340.jpg'; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo site_url().'/wp-content/uploads/2015/05/Garden-06k-FrontBanner_12-513x340.jpg'; ?>" class="img-responsive" />
                                        <div class="text_caption">
                                            <p>Zen Garden</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3 col-sm-6 pd">
                                    <a href="/mansion-31/">                                        
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo site_url().'/wp-content/uploads/2015/09/Mansion-31-FrontBanner_11-513x340.jpg'; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo site_url().'/wp-content/uploads/2015/09/Mansion-31-FrontBanner_11-513x340.jpg'; ?>" class="img-responsive" />
                                        <div class="text_caption">
                                            <p>Palisades Ranch</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3 col-sm-6 pd">
                                    <a href="/exotic-1/">                                        
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo site_url().'/wp-content/uploads/2015/05/Exotic-01c-FrontBanner_13-605x340.jpg'; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo site_url().'/wp-content/uploads/2015/05/Exotic-01c-FrontBanner_13-605x340.jpg'; ?>" class="img-responsive" />
                                        <div class="text_caption">
                                            <p>Exotic 1</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-3 col-sm-6 pd">
                                    <a href="/category/exclusives/">                                        
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo site_url().'/wp-content/uploads/2015/05/Retro-06f-up_013-513x340.jpg'; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo site_url().'/wp-content/uploads/2015/05/Retro-06f-up_013-513x340.jpg'; ?>" class="img-responsive" />
                                        <div class="text_caption">
                                            <p>See More Exclusives</p>
                                        </div>
                                    </a>
                                </div>

                            </div>

    <?php wp_reset_query();
endif; ?>
                        <div class="clearfix" id="featured_categories_anchor">&nbsp;</div>    
                        <h1>Featured Categories </h1>

                        <div class="row md">

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/exclusives/"> 
<?php $category_image1 = get_field('category_image', 'category_28'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>Exclusives</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/new/">
<?php $category_image1 = get_field('category_image', 'category_160'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>New</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/7th-grand-loft/"> 
<?php $category_image1 = get_field('category_image', 'category_321'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>7th & Grand Loft</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/americana/">
<?php $category_image1 = get_field('category_image', 'category_12'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">		
                                        <p>Americana</p>
                                    </div>
                                </a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/backlot/">
<?php $category_image1 = get_field('category_image', 'category_128'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>Backlot</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/beach-house/"> 
<?php $category_image1 = get_field('category_image', 'category_101'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>Beach House</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/concrete-loft/"> 
<?php $category_image1 = get_field('category_image', 'category_306'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>Concrete Loft</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/exotic/"  style="height:120px; overflow:hidden; display:block"> 
<?php $category_image1 = get_field('category_image', 'category_130'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">		
                                        <p>Exotic</p>
                                    </div>
                                </a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/garden/"  style="height:120px; overflow:hidden; display:block"> 
<?php $category_image1 = get_field('category_image', 'category_113'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>Garden</p>			
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/mansion/"  style="height:120px; overflow:hidden; display:block"> 
<?php $category_image1 = get_field('category_image', 'category_132'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>Mansion</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/mediterranean/"  style="height:120px; overflow:hidden; display:block"> 
<?php $category_image1 = get_field('category_image', 'category_112'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>Mediterranean</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/mid-century-modern/"  style="height:120px; overflow:hidden; display:block"> 
<?php $category_image1 = get_field('category_image', 'category_89'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>Mid-century Modern</p>
                                    </div>
                                </a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/modern/"  style="height:120px; overflow:hidden; display:block"> 
<?php $category_image1 = get_field('category_image', 'category_8'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>Modern</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/office/"  style="height:120px; overflow:hidden; display:block"> 
<?php $category_image1 = get_field('category_image', 'category_144'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>Office</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/retro/"  style="height:120px; overflow:hidden; display:block"> 
<?php $category_image1 = get_field('category_image', 'category_47'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>Retro</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 col-sm-6 pd">
                                <a href="/category/rooftop/"  style="height:120px; overflow:hidden; display:block"> 
<?php $category_image1 = get_field('category_image', 'category_148'); ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image1['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image1['sizes']['large']; ?>" class="img-responsive" alt="" />
                                    <div class="text_caption">
                                        <p>Rooftop</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="clearfix" id="all_ctegories_anchor">&nbsp;</div>
                        <h1>All Categories</h1>

                        <div class="row md">

                            <?php $temp_array = array(); ?> 

                            <?php                             
                            $i = 1;
                            $id_attr = '';
                            $old_id = '';
                            $new_id = '';
                            foreach (get_categories('orderby=name&exclude=11839') as $cat) : ?>

                                <?php                               
                                $char = strtoupper(substr(trim($cat->cat_name), 0, 1));
                                $new_id = $char;
                                if (!in_array($char, $temp_array)) 
                                {
                                    array_push($temp_array, $char);
                                    $id_attr = 'id="' . $char . '"';
                                }
                                ?> 

                                <div class="col-md-3 col-sm-6 pd" id="<?php if($new_id != $old_id){$old_id = $new_id;echo $old_id;}?>">					  
                                    <?php $category_image = get_field('category_image', 'category_' . $cat->term_id); ?>
                                    <a href="<?php echo get_category_link($cat->term_id); ?>" class="<?php echo $cat->cat_name; ?>">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/image.php?<?php echo $category_image['sizes']['large']; ?>&height=211&width=141&cropratio=1.70:1&amp;image=<?php echo $category_image['sizes']['large']; ?>" class="img-responsive" alt="" />
                                        <div class="text_caption">
                                            <p><?php echo $cat->cat_name; ?></p>
                                        </div>
                                    </a>																
                                </div>

                                <?php if ($i % 4 == 0): ?>
                                    <div class="clearfix"></div>
    <?php endif; ?>

    <?php $i++;
endforeach; ?>						

                        </div>

                    </div>
                </div>        


            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

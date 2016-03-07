<?php
/*
Template Name: Ajax-Portfolio
*/
?>
<?php
global $post;

  if (isset($_REQUEST) && $_REQUEST['action'] == 'portfolio_ajax_request') {

    $project_category = $_REQUEST['project_category'];
    $age = $_REQUEST['age'];

    $query_variable = '';

    if ($age > 0) {
      $query_variable = '&age=' . $age;
    } else {
      $query_variable = '&project_category=' . $project_category;
    }

    $return_html = '';

    // Let's take the data that was sent and do something with it
    if (isset($_REQUEST['project_category']) || isset($_REQUEST['age'])) {

      query_posts('post_type=portfolio' . $query_variable . '&showposts=100');

      while (have_posts()) : the_post();
        $return_html .= '<div>';
        $href = '';

        $posts = get_field('portfolio_location');

        if ($posts):

          foreach ($posts as $p):
            $href .= get_permalink($p);
          endforeach;
        endif;

        $return_html .= '<a href="' . $href . '">';

        $return_html .= get_the_post_thumbnail(get_the_ID(), 'medium');

        $return_html .= '</a>';

        $return_html .= '</div>';

      endwhile;

      if ($age == 2010) {

        for ($i = $age - 1; $i > 2001; $i--) {

          query_posts('post_type=portfolio&age=' . $i . '&showposts=100');

          while (have_posts()) : the_post();

            $return_html .= '<div>';
            $href = '';

            $posts = get_field('portfolio_location');

            if ($posts):

              foreach ($posts as $p):
                $href .= get_permalink($p);
              endforeach;
            endif;

            $return_html .= '<a href="' . $href . '">';

            $return_html .= get_the_post_thumbnail(get_the_ID(), 'medium');

            $return_html .= '</a>';

            $return_html .= '</div>';

          endwhile;
        }
      }

      echo $return_html;
    }
	
  }else{
	  echo "Non Ajax Request";
  }

  // Always die in functions echoing ajax content
  die();
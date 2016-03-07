<?php

/* add stylesheets and javascript to child theme [start] */

add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

function enqueue_parent_styles() {

  // add all stylesheets to theme  
  wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap.css');
  wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/css/style.css');
  wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/css/custom.css');
  wp_enqueue_style('bootstrap-select-style', get_stylesheet_directory_uri() . '/css/bootstrap-select.css');
  wp_enqueue_style('component-style', get_stylesheet_directory_uri() . '/css/component.css');

  //wp_enqueue_style('component-style', get_stylesheet_directory_uri() . '/css/bootstrap-multiselect.css');

  wp_enqueue_style('font-awesome-style', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
  wp_enqueue_style('owl-carousel-style', get_stylesheet_directory_uri() . '/css/owl.carousel.css');

  wp_enqueue_style('img_hover_style6', get_stylesheet_directory_uri() . '/css/imghover/style6.css');
  wp_enqueue_style('img_hover_style_common', get_stylesheet_directory_uri() . '/css/imghover/style_common.css');

  wp_enqueue_style('build-css', get_stylesheet_directory_uri() . '/css/build.css');

  wp_enqueue_style('jquery.fancybox-css', get_stylesheet_directory_uri() . '/css/fancybox/jquery.fancybox.css');
  wp_enqueue_style('GITheWall-style', get_stylesheet_directory_uri() . '/css/GITheWall.css');

  /* including faq (portfolio) JS */
  wp_enqueue_style('faq-reset-css', get_stylesheet_directory_uri() . '/js/faq/css/reset.css');
  wp_enqueue_style('faq-style-css', get_stylesheet_directory_uri() . '/js/faq/css/style.css');

  wp_enqueue_style('parsley-style-css', get_stylesheet_directory_uri() . '/js/parsly/target-admin2.css');

  wp_enqueue_style('swiper-style-css', get_stylesheet_directory_uri() . '/js/swiper/css/swiper.min.css');



  wp_dequeue_script('twentyfifteen-skip-link-focus-fix');

  // add all javascripts to theme
  //wp_enqueue_script( none, get_stylesheet_directory_uri() . '/js/jquery.min.js', array(), false, true );

  /* wp_enqueue_script('bootstrap-min-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), false, true);
    wp_enqueue_script('bootstrap-select-js', get_stylesheet_directory_uri() . '/js/bootstrap-select.js', array(), false, true);
    wp_enqueue_script('classie-js', get_stylesheet_directory_uri() . '/js/classie.js', array(), false, true);


    wp_enqueue_script('owl-carousel-js', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array(), false, true);

    wp_enqueue_script('waterfall-light-js', get_stylesheet_directory_uri() . '/js/waterfall-light.js', array(), false, true);
    wp_enqueue_script('jquery-nicescroll-min-js', get_stylesheet_directory_uri() . '/js/jquery.nicescroll.min.js', array(), false, true);
    wp_enqueue_script('jquery-sticky-js', get_stylesheet_directory_uri() . '/js/jquery.sticky.js', array(), false, true);

    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array(), false, true);

    wp_enqueue_script('faq-jquery-mobile-js', get_stylesheet_directory_uri() . '/js/faq/js/jquery.mobile.custom.min.js', array(), false, true);
    wp_enqueue_script('faq-jquery-main-js', get_stylesheet_directory_uri() . '/js/faq/js/main.js', array(), false, true);


    wp_enqueue_script('blazy-min-js', get_stylesheet_directory_uri() . '/js/blazy.min.js', array(), false, true);

    wp_enqueue_script('jquery.fancybox-js', get_stylesheet_directory_uri() . '/css/fancybox/jquery.fancybox.js', array(), false, true);
    wp_enqueue_script('jquery.parsley', get_stylesheet_directory_uri() . '/js/parsly/parsley.js', array(), false, true);
    wp_enqueue_script('jquery.message', get_stylesheet_directory_uri() . '/js/parsly/jquery.bootstrap-growl.min.js', array(), false, true);

    wp_enqueue_script('jquery.swiper', get_stylesheet_directory_uri() . '/js/swiper/js/swiper.min.js', array(), false, true);
    wp_enqueue_script('GI.TheWall-js', get_stylesheet_directory_uri() . '/js/jQuery.GI.TheWall.js', array(), false, true);
    wp_enqueue_script('highlight-js', '//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.0/highlight.min.js', array(), false, true); */

//  wp_enqueue_script('bootstrap-multiselect-js', get_stylesheet_directory_uri() . '/js/bootstrap-multiselect.js', array(), false, true);

  wp_register_script('my-script', get_stylesheet_directory_uri() . '/js/myscript.js');
  wp_enqueue_script('my-script');
  $translation_array = array(
      'stylesheet_directory_uri' => get_stylesheet_directory_uri(),
      'stylesheet_directory' => get_stylesheet_directory(),
      'siteurl' => get_bloginfo('siteurl')
  );

  //echo "test" . get_bloginfo('siteurl'); exit; 
//after wp_enqueue_script
  wp_localize_script('my-script', 'object_name', $translation_array);
}

/* add stylesheets and javascript to child theme [end] */

require "custom-post-type.php";

add_action('after_setup_theme', 'setup');

function setup() {
  //add_theme_support('post-thumbnails');

  add_image_size('home_slide_image', 987, 656, true);
  add_image_size('image_314_454', 314, 454, true);
}

add_action( 'init', 'my_deregister_heartbeat', 1 );
function my_deregister_heartbeat() {
	global $pagenow;

	if ( 'post.php' != $pagenow && 'post-new.php' != $pagenow )
		wp_deregister_script('heartbeat');
}

//add_taxanomy('slider-category', 'homepage-slider', array('hierarchical' => true), 'Slider Category');


/*
  3. lib/foundation.php
  - add pagination
 */
require_once('lib/foundation.php'); // load Foundation specific functions



/* * ************** modify global query *************** */

add_action('pre_get_posts', 'my_pre_get_posts');

function my_pre_get_posts($query) {

  if (is_admin()) {
    return;
  }

  $meta_query = $query->get('meta_query'); // get original meta query
  // validate type
  if (empty($_GET['type'])) {
    return;
  }


  // get types as an array
  // - use explode to get an array of values from type=a|b|c
  $types = explode('|', $_GET['type']);


  // set compare for the meta_query
  // - http://codex.wordpress.org/Class_Reference/WP_Query
  $meta_query['relation'] = 'OR';


  foreach ($types as $type) {
    $meta_query[] = array(
        'key' => 'type',
        'value' => '"' . $type . '"',
        'compare' => 'LIKE',
    );
  }


  $query->set('meta_query', $meta_query); // update the meta query args

  return; // always return
}

add_action('pre_get_posts', 'alter_query');

function alter_query($query) {
  //gets the global query var object
  global $wp_query;

  if (!$query->is_main_query())
    return;

  if (isset($_GET['city'])) {


    $query_str = explode('&', $_SERVER['QUERY_STRING']);





    $params = array();

    foreach ($query_str as $param) {
      list($name, $value) = explode('=', $param, 2);
      $params[urldecode($name)][] = urldecode($value);
    }

    $cityParams = isset($_GET['city']) ? $_GET['city'] : array();


    if (isset($cityParams) && is_array($cityParams) && count($cityParams) > 0) {

      $meta_query['relation'] = 'OR';

      foreach ($cityParams as $cityVal) {

        $arrayObj = array(
            'key' => 'city_address',
            'value' => urldecode($cityVal),
            'compare' => 'LIKE',
        );

        array_push($meta_query, $arrayObj);
      }

//      echo "<pre>";print_r($meta_query);
//      exit;
//      foreach ($params['city'] as $cityVal) {
//
//        $arrayObj = array(
//            'key' => 'city_address',
//            'value' => urldecode($cityVal) ,
//            'compare' => 'LIKE',
//        );
//        
//
//        array_push($meta_query, $arrayObj);
//      }
      // echo "<pre>";print_r($meta_query);echo "</pre>";
//    $meta_query['relation'] = 'OR';
//    $arrayObj = array(
//        'key' => 'city_address',
//        'value' => 'Arcadia' ,
//        'compare' => 'LIKE',
//    );
//
//    array_push($meta_query, $arrayObj);
//      echo '<pre>';
//      print_r ($meta_query);
//      echo '</pre>';      
//      exit;

      $query->set('meta_query', $meta_query); // update the meta query args
    } else {
      $query->set('meta_key', 'city_address');
      $query->set('meta_value', urldecode($_GET['city']));
    }
  }
  if (isset($_GET['state'])) {
    $query->set('meta_key', 'state_address');
    $query->set('meta_value', urldecode($_GET['state']));
  }


  if (isset($_GET['location_access'])) {
    $meta_query[] = array(
        'key' => 'location_access',
        'value' => '"' . urldecode($_GET['location_access']) . '"',
        'compare' => 'LIKE',
    );
    $query->set('meta_query', $meta_query); // update the meta query args
  }

  if (isset($_GET['yard'])) {
    $meta_query[] = array(
        'key' => 'yard_descriptions',
        'value' => '"' . urldecode($_GET['yard']) . '"',
        'compare' => 'LIKE',
    );
    $query->set('meta_query', $meta_query); // update the meta query args
  }

  if (isset($_GET['pool'])) {
    $meta_query[] = array(
        'key' => 'pools',
        'value' => '"' . urldecode($_GET['pool']) . '"',
        'compare' => 'LIKE',
    );
    $query->set('meta_query', $meta_query); // update the meta query args
  }

  if (isset($_GET['pool_desc'])) {
    $meta_query[] = array(
        'key' => 'pool_descriptions',
        'value' => '"' . urldecode($_GET['pool_desc']) . '"',
        'compare' => 'LIKE',
    );
    $query->set('meta_query', $meta_query); // update the meta query args
  }

  if (isset($_GET['patio'])) {
    $meta_query[] = array(
        'key' => 'patio_/_balcony',
        'value' => '"' . urldecode($_GET['patio']) . '"',
        'compare' => 'LIKE',
    );
    $query->set('meta_query', $meta_query); // update the meta query args
  }

  if (isset($_GET['views'])) {
    $meta_query[] = array(
        'key' => 'views',
        'value' => '"' . urldecode($_GET['views']) . '"',
        'compare' => 'LIKE',
    );
    $query->set('meta_query', $meta_query); // update the meta query args
  }


  if (isset($_GET['misc'])) {
    $meta_query[] = array(
        'key' => 'miscellaneous_rooms_/_amenities',
        'value' => '"' . urldecode($_GET['misc']) . '"',
        'compare' => 'LIKE',
    );
    $query->set('meta_query', $meta_query); // update the meta query args
  }

  if (isset($_GET['floors'])) {
    $meta_query[] = array(
        'key' => 'floor_description',
        'value' => '"' . urldecode($_GET['floors']) . '"',
        'compare' => 'LIKE',
    );
    $query->set('meta_query', $meta_query); // update the meta query args
  }

  if (isset($_GET['walls'])) {
    $meta_query[] = array(
        'key' => 'wall_description',
        'value' => '"' . urldecode($_GET['walls']) . '"',
        'compare' => 'LIKE',
    );
    $query->set('meta_query', $meta_query); // update the meta query args
  }

  $query->set('showposts', 20);

  // echo "<pre>";print_r($query);exit;
  //we remove the actions hooked on the '__after_loop' (post navigation)

  return; // always return
}

$sidebars = array('Header');
foreach ($sidebars as $sidebar) {
  register_sidebar(array('name' => $sidebar,
      'id' => 'Header',
      'before_widget' => '<div class="right"><div id="%1$s" class=" %2$s">',
      'after_widget' => '</div></div>',
      'before_title' => '<h4>',
      'after_title' => '</h4>'
  ));
}

function check_for_pagination() {
  global $wp_query;
  if ($wp_query->max_num_pages > 1) {
    return true;
  } else {
    return false;
  }
}

function get_any_image_url($location_image, $size = 'medium', $return_size = false) {

  if (is_numeric($location_image)) {
    $location_image = wp_get_attachment_image_src($location_image, $size);
    $location_image_url = isset($location_image[0]) ? $location_image[0] : '';
  } elseif (is_array($location_image)) {
    //echo '<pre>'; print_r ($location_image); echo '</pre>';
    $location_image_url = isset($location_image['sizes'][$size]) ? $location_image['sizes'][$size] : '';
    if ($return_size) {
      $location_image_width = $location_image['sizes'][$size . '-width'];
      $location_image_height = $location_image['sizes'][$size . '-height'];
    }
  } else {

    $location_image_url = $location_image;
  }

  if ($return_size) {
    return array(
        'image_url' => $location_image_url,
        'image_width' => $location_image_width,
        'image_height' => $location_image_height,
    );
  } else {
    return $location_image_url;
  }
}

/* * ******************** Portfolio Ajax loading code [start] *************************** */

function portfolio_ajax_request() {

  if (isset($_REQUEST)) {

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
  }

  // Always die in functions echoing ajax content
  die();
}

add_action('wp_ajax_portfolio_ajax_request', 'portfolio_ajax_request');

add_action('wp_ajax_nopriv_portfolio_ajax_request', 'portfolio_ajax_request');


/* * ******************** Portfolio Ajax loading code [END] *************************** */

function get_loaction_city_code($city_address) {

  $city_code = false;

  if ($city_address) {

    if ($city_address == "Manhattan") {
      $city_code = 24734;
    } elseif ($city_address == "Los Angeles" || $city_address == "Downtown Los Angeles" || $city_address == "Hollywood" || $city_address == "West Hollywood") {
      $city_code = 119800;
    } elseif ($city_address == "Beverly Hills" || $city_address == "Bel Air") {
      $city_code = 119801;
    } elseif ($city_address == "Santa Monica" || $city_address == "Palos Verdes") {
      $city_code = 119803;
    } elseif ($city_address == "Malibu") {
      $city_code = 119802;
    } elseif ($city_address == "Irvine" || $city_address == "Newport Beach" || $city_address == "Long Beach") {
      $city_code = 119804;
    } elseif ($city_address == "Palm Springs") {
      $city_code = 119805;
    } elseif ($city_address == "Santa Barbara") {
      $city_code = 119806;
    } elseif ($city_address == "Pasadena") {
      $city_code = 119807;
    } elseif ($city_address == "South Bay") {
      $city_code = 119808;
    } elseif ($city_address == "Palmdale") {
      $city_code = 119809;
    } elseif ($city_address == "Encino") {
      $city_code = 119810;
    }
  }

  return $city_code;
}

/* code for sales force with contact form 7 [start] */

add_action('wpcf7_mail_sent', 'your_wpcf7_mail_sent_function');

function your_wpcf7_mail_sent_function($contact_form) {
  $title = $contact_form->title;
  $submission = WPCF7_Submission::get_instance();

  if ($submission) {
    $posted_data = $submission->get_posted_data();
  }

  if ('Location Contact New' == $title) {

    $firstname = $posted_data['first-name'];
    $lastname = $posted_data['last-name'];
    $email = $posted_data['your-email'];
    $company = $posted_data['company'];
    $message = $posted_data['your-message'];
    $location = $posted_data['dynamichidden-838'];


    define('USER_NAME', 'paul@imagelocations.com');
    define('PASSWORD', 'Image2404');
    define('CLIENT_ID', '3MVG91ftikjGaMd8sXyNmkOVgdD.3uTz.AsAw7O1c9cTMjoXXxc1BmxstcVQhg1qjsMcigA8jdiOv9FAOzZCo');
    define('CLIENT_SECRET', '4616906797495984385');
    define('TOKEN', 'wQOTpUQThQLg9iiANtpgexkL');

    /*
      define('USER_NAME', 'ajay@omuze.com');
      define('PASSWORD', 'Omuze477');
      define('CLIENT_ID', '3MVG9ZL0ppGP5UrBK7q2z5DMnF1usCB9rmxmxATYHePNg2Z5dRrgq59AcwEd_upx0DCI6e6L_j5omf.acHlxp');
      define('CLIENT_SECRET', '6535753076104196378');
      define('TOKEN', '8H6oNNdgmF629eE03WCJaT3Y');
     */

    $loginurl = "https://login.salesforce.com/services/oauth2/token";
    require_once 'SalesforceAPI.php';

//    echo "U: ".USER_NAME;
//    echo "<br />";
//    echo "P: ".PASSWORD;
//    echo "<br />";
//    echo "T: ".TOKEN;
//    exit;
    // Login to salesforce REST API
    $salesforce = new SalesforceAPI('https://login.salesforce.com', '32.0', CLIENT_ID, CLIENT_SECRET);
    $loginObj = $salesforce->login(USER_NAME, PASSWORD, TOKEN);


    $access_token = $salesforce->access_token;
    $base_url = $salesforce->new_instance_url;


    $request_params = [
        'FirstName' => $firstname,
        'LastName' => $lastname,
        'Email' => $email,
            //'Company' => $company,
            //'Message' => $message,
    ];

    $response = $salesforce->create_contact($request_params);


    //echo "<br />";
    //echo $response;
    //exit("Run");

    /* Put your code here to manipulate the data - simples ;) */
  }
}

/* code for sales force with contact form 7 [end] */

// Adapted from https://gist.github.com/toscho/1584783
/* add_filter( 'clean_url', function( $url )
  {
  if ( FALSE === strpos( $url, '.js' ) || 0 <= strpos( $url, 'jquery.js' )  )
  { // not our file
  return $url;
  }
  // Must be a ', not "!
  return "$url' defer='defer";
  }, 11, 1 ); */

// Defer Javascripts
// Defer jQuery Parsing using the HTML5 defer property


/* if (!(is_admin() )) {

  function defer_parsing_of_js($url) {
  if (FALSE === strpos($url, '.js'))
  return $url;
  if (strpos($url, 'jquery.js'))
  return $url;
  if (strpos($url, 'contact-form-7/includes/js/scripts.js'))
  return $url;
  // return "$url' defer ";
  return "$url' defer onload='";
  }

  add_filter('clean_url', 'defer_parsing_of_js', 11, 1);
  } */

function dequeue_my_css() {
  wp_dequeue_style('twentyfifteen-style-css');
  wp_deregister_style('twentyfifteen-style-css');
}

add_action('wp_enqueue_scripts', 'dequeue_my_css', 100);
// add a priority if you need it
// add_action('wp_enqueue_scripts','dequeue_my_css',100);


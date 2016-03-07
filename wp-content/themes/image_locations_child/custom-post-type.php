<?php

// Add new post type
function add_post_type($name, $args = array(), $post_type_title = '', $add_s = true) {
  add_action('init', function() use($name, $args, $post_type_title, $add_s) {

    if ($post_type_title != ''){
        $upper = ucwords($post_type_title);
    }else{
        $upper = ucwords($name);
    }

    $name = strtolower(str_replace(" ", "", $name));    


	$label_var = $upper;
	if ($add_s == true){
		$label_var .= 's';
	}    

    $args = array_merge(
            array(
        'public' => true,
        'label' => $label_var,
		'taxonomies' => array('post_tag'),
        'labels' => array(
            "add_new_item" => "Add New " . str_replace("_", " ", $upper),
            "menu_name" => "All " . str_replace("_", " ", $label_var),
            "all_items" => "All " . str_replace("_", " ", $label_var),
            "edit_item" => "Edit " . str_replace("_", " ", $upper),
        ),
        'supports' => array('title', 'editor', 'comments', 'tags',)
            ), $args
    );

    register_post_type($name, $args);
  });
}

// Add New Taxanomy
function add_taxanomy($name, $post_type, $args = array(), $taxanomy_title = '') {
  $name = strtolower($name);
  add_action('init', function() use($name, $post_type, $args, $taxanomy_title) {

        if ($taxanomy_title == ''){
            $taxanomy_title = $name;
        }

    $args = array_merge(
            array(
        'label' => ucwords(str_replace("_", " ", $taxanomy_title))
            ), $args
    );

    register_taxonomy($name, $post_type, $args);
  });
}

function add_sidebar($name, $id, $args = array()) {

  add_action('init', function() use($name, $id, $args) {


    $args = array_merge(
            array(
        'name' => __($name, 'theme_text_domain'),
        'id' => $id,
        'description' => '',
        'class' => '',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '')
            , $args
    );

    register_sidebar($args);
  });
}

?>
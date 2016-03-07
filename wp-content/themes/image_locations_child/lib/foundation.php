<?php
// Pagination
if( ! function_exists( 'reverie_pagination' ) ) {
	function reverie_pagination() {
		global $wp_query;
	 
		$big = 999999999; // This needs to be an unlikely integer
                
                // $page_link_url .= "&param1=1&param=2&param3=3";
                        

//                $params = array();
//
//                foreach ($query_str as $param) {
//                  list($name, $value) = explode('=', $param, 2);
//                  $params[urldecode($name)][] = urldecode($value);
//                }
//                if(isset($params['city']))
//                {
//                    foreach($params['city'] as $city){
//                        $page_link_url.="&city=".urldecode($city);
//                    }
//                }
                
	 
		// For more options and info view the docs for paginate_links()
		// http://codex.wordpress.org/Function_Reference/paginate_links
                
		$paginate_links = paginate_links( array(			
                        'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'mid_size' => 5,
			'prev_next' => True,
                        'prev_text' => __('&laquo;'),
                        'next_text' => __('&raquo;'),
			'type' => 'list'
		) );
	 
		// Display the pagination if more than one page is found
		if ( $paginate_links ) {
			echo '<div class="small-8 large-8 columns content-boxes"><div class="older-title">Page</div><div class="pagination">';
			echo $paginate_links;
			echo '</div></div><!--// end .pagination -->';
			
		}
	}
}

// Pagination For Search
if( ! function_exists( 'reverie_pagination_search' ) ) {
	function reverie_pagination_search() {
		global $wp_query;
                
                $currentQueryString = $_SERVER['QUERY_STRING'];
	 
		$big = 999999999; // This needs to be an unlikely integer
                // echo get_pagenum_link($big);
                
                // echo "Url: ".site_url()."/locations/page/%#%?".$currentQueryString;
                // echo "<br />";
                // echo $currentQueryString;
                
		$paginate_links = paginate_links( array(			
                        'base' => site_url()."/locations/page/%#%?".$currentQueryString,
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'mid_size' => 5,
			'prev_next' => True,
                        'prev_text' => __('&laquo;'),
                        'next_text' => __('&raquo;'),
			'type' => 'list'
		) );
	 
		// Display the pagination if more than one page is found
		if ( $paginate_links ) {
			echo '<div class="small-8 large-8 columns content-boxes"><div class="older-title">Page</div><div class="pagination">';
			echo $paginate_links;
			echo '</div></div><!--// end .pagination -->';
			
		}
	}
}


if( ! function_exists( 'child_theme_pagination_home' ) ) {
	function child_theme_pagination_home() {
		global $wp_query;
	 
		$big = 999999999; // This needs to be an unlikely integer
                        

//                $params = array();
//
//                foreach ($query_str as $param) {
//                  list($name, $value) = explode('=', $param, 2);
//                  $params[urldecode($name)][] = urldecode($value);
//                }
//                if(isset($params['city']))
//                {
//                    foreach($params['city'] as $city){
//                        $page_link_url.="&city=".urldecode($city);
//                    }
//                }
                
	 
		// For more options and info view the docs for paginate_links()
		// http://codex.wordpress.org/Function_Reference/paginate_links
                
                $segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
                
                $paged = isset($segments[2]) && $segments[2] >= 1 ? $segments[2]:1;
                
		$paginate_links = paginate_links( array(			                        
                        'base'               => '%_%',
                        'format'             => '?page=%#%',                    
			'current' => $paged,
			'total' => $wp_query->max_num_pages,
			'mid_size' => 5,
			'prev_next' => True,
                        'prev_text' => __('&laquo;'),
                        'next_text' => __('&raquo;'),
			'type' => 'list'
		) );
	 
		// Display the pagination if more than one page is found
		if ( $paginate_links ) {
			echo '<div class="small-8 large-8 columns content-boxes"><div class="older-title">Page</div><div class="pagination">';
			echo $paginate_links;
			echo '</div></div><!--// end .pagination -->';
			
		}
	}
}

/**
 * A fallback when no navigation is selected by default, otherwise it throws some nasty errors in your face.
 * From required+ Foundation http://themes.required.ch
 */
if( ! function_exists( 'reverie_menu_fallback' ) ) {
	function reverie_menu_fallback() {
		echo '<div class="alert-box secondary">';
		// Translators 1: Link to Menus, 2: Link to Customize
	  	printf( __( 'Please assign a menu to the primary menu location under %1$s or %2$s the design.', 'reverie' ),
	  		sprintf(  __( '<a href="%s">Menus</a>', 'reverie' ),
	  			get_admin_url( get_current_blog_id(), 'nav-menus.php' )
	  		),
	  		sprintf(  __( '<a href="%s">Customize</a>', 'reverie' ),
	  			get_admin_url( get_current_blog_id(), 'customize.php' )
	  		)
	  	);
	  	echo '</div>';
	}
}

// Add Foundation 'active' class for the current menu item
if( ! function_exists( 'reverie_active_nav_class' ) ) {
	function reverie_active_nav_class( $classes, $item ) {
	    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
	        $classes[] = 'active';
	    }
	    return $classes;
	}
}
add_filter( 'nav_menu_css_class', 'reverie_active_nav_class', 10, 2 );

/**
 * Use the active class of ZURB Foundation on wp_list_pages output.
 * From required+ Foundation http://themes.required.ch
 */
if( ! function_exists( 'reverie_active_list_pages_class' ) ) {
	function reverie_active_list_pages_class( $input ) {

		$pattern = '/current_page_item/';
	    $replace = 'current_page_item active';

	    $output = preg_replace( $pattern, $replace, $input );

	    return $output;
	}
}
add_filter( 'wp_list_pages', 'reverie_active_list_pages_class', 10, 2 );

?>
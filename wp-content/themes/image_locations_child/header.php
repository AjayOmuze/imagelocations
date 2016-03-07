<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64926991-1', 'auto');
  ga('send', 'pageview');

</script>

  </head>
  <style type="text/css">
    #sharing_email .sharing_send{ background-color: #ff4040 !important; border-color: #ff4040 !important; color: #fff !important; float: left; font-family:"HelveticaNeueLTStd-Th", "Helvetica Neue", HelveticaNeueLTStd-Lt !important; font-size: 13px; letter-spacing: 1px; padding: 8px 12px !important; text-transform: uppercase;border-radius:4px}
    #sharing_email .sharing_cancel{ background-color: #434343 !important; border-color: #434343 !important; color: #fff !important; float: left; font-family:"HelveticaNeueLTStd-Th", "Helvetica Neue", HelveticaNeueLTStd-Lt !important; font-size: 13px; letter-spacing: 1px; padding: 14px !important; text-transform: uppercase; text-decoration:none; margin-top:3px; border-radius:4px}
  </style>
  <body <?php body_class(); ?>>

    <header>
      <div class="top_sec">
        <div class="container">
          <div class="top_text"><?php the_widget('Header'); ?><?php dynamic_sidebar('Header'); ?></div>
        </div>
      </div>
      <div class="clearfix"></div>


      <div class="logo_sec">
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-sm-4 col-xs-12"><a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.jpg" height="40" width="541" class="img-responsive" alt=""></a></div>
            <div class="col-md-5 col-sm-8 col-xs-12">
              <div class="row">
                <div class="col-md-8 col-sm-9 pd_left">

                  <form method="GET" action="<?php echo site_url(); ?>">

                    <div class="custom-search-input">
                      <div class="input-group col-md-12">
                        <input name="s" type="text" class="search-query form-control" placeholder="Search (ie: Modern, Pool, Beverly Hills)" />
                        <span class="input-group-btn">
                          <button class="btn btn-danger" type="submit">
                            <span class=" glyphicon glyphicon-search"></span>
                          </button>
                        </span>
                      </div>
                    </div>

                  </form>

                </div>
                <div class="col-md-4 col-sm-3 pd_right"><div class="advanced_search">
                    <a href="javascript:void(0);" class="open_advance_search_area_sec">advanced search</a></div></div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="clearfix"></div>


      <!-------navi-------------->
      <div class="container">
        <div class="nav_sec">
          <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle navbar_toggle_2 toggle-burger-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="menu menu-text-link" href="#">menu</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

              <?php
              $defaults = array(
                  'theme_location' => 'primary',
                  'container' => false,
                  'menu_class' => 'menu',
                  'menu_id' => 'menu-header',
                  'echo' => true,
                  'fallback_cb' => 'wp_page_menu',
                  'items_wrap' => '<ul class="nav navbar-nav" id="%1$s">%3$s</ul>',
                  'depth' => 2,
              );
              wp_nav_menu($defaults);
              ?>

              <div class="clearfix"></div>
            </div>

            <div class="mobile_nav" id="bs-example-navbar-collapse-2" style="display:none">

              <?php
              $defaults = array(
                  'theme_location' => 'primary',
                  'container' => false,
                  'menu_class' => 'menu',
                  'menu_id' => 'menu-header',
                  'echo' => true,
                  'fallback_cb' => 'wp_page_menu',
                  'items_wrap' => '<ul class="nav navbar-nav" id="%1$s">%3$s</ul>',
                  'depth' => 2,
              );
              wp_nav_menu($defaults);
              ?>

              <div class="clearfix"></div>
            </div>


          </nav>
        </div>
      </div>
    </header>
    <div class="clearfix"></div>

    <!--------Advanced Search box------------>
    <section style="display: none;" id="advance_search_area_sec">
      <div class="advanced_box_sec pull-right">
        <h1>Advanced Search</h1>
        <button class="md-close"> </button>

        <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/locations/">

          <div class="row" style="padding:0 10px">
            <div class="col-md-4 col-sm-6 pd"><input id="myInputBox" type="text" value="<?php //echo wp_specialchars($s, 1); ?>" name="s" class="search-query form-control" placeholder="Enter Keyword" /></div>
            <div class="col-md-4 col-sm-6 pd">
              <select multiple="multiple" name="state" class="form-control select_multiple" title="Region">
                <option value="CA">California</option>
                <option value="NY">New York</option>
                <option value="FL">Florida</option>   
              </select>
            </div>
            <div class="col-md-4 col-sm-6 pd">
              <select name="city[]" multiple="multiple" class="form-control select_multiple" title="City">
                <option value="Adelanto">Adelanto</option>
                <option value="Agoura Hills">Agoura Hills</option>
                <option value="Agua Dulce">Agua Dulce</option>
                <option value="Altadena">Altadena</option>
                <option value="Amagansett">Amagansett</option>
                <option value="Arcadia">Arcadia</option>
                <option value="Azusa">Azusa</option>
                <option value="Baldwin Hills">Baldwin Hills</option>
                <option value="Bel Air">Bel Air</option>
                <option value="Bell Canyon">Bell Canyon</option>
                <option value="Beverly Hills">Beverly Hills</option>
                <option value="Brentwood">Brentwood</option>
                <option value="Bronx">Bronx</option>
                <option value="Brooklyn">Brooklyn</option>
                <option value="Burbank">Burbank</option>
                <option value="Calabasas">Calabasas</option>
                <option value="Camarillo">Camarillo</option>
                <option value="Canyon Country">Canyon Country</option>
                <option value="Carpinteria">Carpinteria</option>
                <option value="Castaic">Castaic</option>
                <option value="Century City">Century City</option>
                <option value="Cerritos">Cerritos</option>
                <option value="Chatsworth">Chatsworth</option>
                <option value="Cheviot Hills">Cheviot Hills</option>
                <option value="Corona del Mar">Corona del Mar</option>
                <option value="Costa Mesa">Costa Mesa</option>
                <option value="Culver City">Culver City</option>
                <option value="Dana Point">Dana Point</option>
                <option value="Desert Hot Springs">Desert Hot Springs</option>
                <option value="Downtown Los Angeles">Downtown Los Angeles</option>
                <option value="Duarte">Duarte</option>
                <option value="Eagle Rock">Eagle Rock</option>
                <option value="East Moriches">East Moriches</option>
                <option value="Echo Park">Echo Park</option>
                <option value="El Segundo">El Segundo</option>
                <option value="Encino">Encino</option>
                <option value="Glasell Park">Glasell Park</option>
                <option value="Glendale">Glendale</option>
                <option value="Glendora">Glendora</option>
                <option value="Goleta">Goleta</option>
                <option value="Granada Hills">Granada Hills</option>
                <option value="Hancock Park">Hancock Park</option>
                <option value="Hermosa Beach">Hermosa Beach</option>
                <option value="Hollywood">Hollywood</option>
                <option value="Hollywood Hills">Hollywood Hills</option>
                <option value="Huntington Beach">Huntington Beach</option>
                <option value="Huntington Park">Huntington Park</option>
                <option value="Inglewood">Inglewood</option>
                <option value="Irvine">Irvine</option>
                <option value="Joshua Tree">Joshua Tree</option>
                <option value="Kings Point">Kings Point</option>
                <option value="Koreatown">Koreatown</option>
                <option value="La Cañada Flintridge">La Cañada Flintridge</option>
                <option value="La Crescenta">La Crescenta</option>
                <option value="La Quinta">La Quinta</option>
                <option value="Laguna Beach">Laguna Beach</option>
                <option value="Lake Arrowhead">Lake Arrowhead</option>
                <option value="Lake View Terrace">Lake View Terrace</option>
                <option value="Lancaster">Lancaster</option>
                <option value="Lattingtown">Lattingtown</option>
                <option value="Locust Valley">Locust Valley</option>
                <option value="Lompoc">Lompoc</option>
                <option value="Long Beach">Long Beach</option>
                <option value="Los Angeles">Los Angeles</option>
                <option value="Los Feliz">Los Feliz</option>
                <option value="Malibu">Malibu</option>
                <option value="Manhattan">Manhattan</option>
                <option value="Manhattan Beach">Manhattan Beach</option>
                <option value="Mar Vista">Mar Vista</option>
                <option value="Marina Del Rey">Marina Del Rey</option>
                <option value="Miami">Miami</option>
                <option value="Miami Beach">Miami Beach</option>
                <option value="Mojave">Mojave</option>
                <option value="Monrovia">Monrovia</option>
                <option value="Montecito">Montecito</option>
                <option value="Monterey Park">Monterey Park</option>
                <option value="Napa Valley">Napa Valley</option>
                <option value="New Castle">New Castle</option>
                <option value="New Rochelle">New Rochelle</option>
                <option value="Newhall">Newhall</option>
                <option value="Newport">Newport</option>
                <option value="Newport Beach">Newport Beach</option>
                <option value="North Hollywood">North Hollywood</option>
                <option value="Northridge">Northridge</option>
                <option value="Ojai">Ojai</option>
                <option value="Old Westbury">Old Westbury</option>
                <option value="Ontario">Ontario</option>
                <option value="Orange">Orange</option>
                <option value="Pacific Palisades">Pacific Palisades</option>
                <option value="Palm Springs">Palm Springs</option>
                <option value="Palmdale">Palmdale</option>
                <option value="Palos Verdes">Palos Verdes</option>
                <option value="Panorama City">Panorama City</option>
                <option value="Pasadena">Pasadena</option>
                <option value="Pioneertown">Pioneertown</option>
                <option value="Playa Del Rey">Playa Del Rey</option>
                <option value="Port Washington">Port Washington</option>
                <option value="Rancho Mirage">Rancho Mirage</option>
                <option value="Rancho Palos Verdes">Rancho Palos Verdes</option>
                <option value="Redondo Beach">Redondo Beach</option>
                <option value="Reseda">Reseda</option>
                <option value="Riverside">Riverside</option>
                <option value="Rolling Hills Estates">Rolling Hills Estates</option>
                <option value="Round Top">Round Top</option>
                <option value="San Clemente">San Clemente</option>
                <option value="San Jose del Cabo">San Jose del Cabo</option>
                <option value="San Pedro">San Pedro</option>
                <option value="Santa Barbara">Santa Barbara</option>
                <option value="Santa Clarita">Santa Clarita</option>
                <option value="Santa Monica">Santa Monica</option>
                <option value="Santa Ynez">Santa Ynez</option>
                <option value="Shadow Hills">Shadow Hills</option>
                <option value="Sherman Oaks">Sherman Oaks</option>
                <option value="Sierra Madre">Sierra Madre</option>
                <option value="Silverlake">Silverlake</option>
                <option value="Simi Valley">Simi Valley</option>
                <option value="Solvang">Solvang</option>
                <option value="South Gate">South Gate</option>
                <option value="South Pasadena">South Pasadena</option>
                <option value="Southhampton">Southhampton</option>
                <option value="Studio City">Studio City</option>
                <option value="Summerland">Summerland</option>
                <option value="Sun Valley">Sun Valley</option>
                <option value="Sylmar">Sylmar</option>
                <option value="Tarzana">Tarzana</option>
                <option value="Thousand Oaks">Thousand Oaks</option>
                <option value="Toluca Lake">Toluca Lake</option>
                <option value="Topanga">Topanga</option>
                <option value="Torrance">Torrance</option>
                <option value="Universal City">Universal City</option>
                <option value="Upper Brookville">Upper Brookville</option>
                <option value="Valencia">Valencia</option>
                <option value="Valley Village">Valley Village</option>
                <option value="Van Nuys">Van Nuys</option>
                <option value="Venice">Venice</option>
                <option value="Ventura">Ventura</option>
                <option value="Village of Larchmont">Village of Larchmont</option>
                <option value="West Adams">West Adams</option>
                <option value="West Covina">West Covina</option>
                <option value="West Hills">West Hills</option>
                <option value="West Hollywood">West Hollywood</option>
                <option value="Westchester">Westchester</option>
                <option value="Westhampton Beach">Westhampton Beach</option>
                <option value="Westlake Village">Westlake Village</option>
                <option value="Westwood">Westwood</option>
                <option value="Woodland Hills">Woodland Hills</option>
                <option value="Yonkers">Yonkers</option>

              </select> 
            </div>
            <div class="col-md-4 col-sm-6 pd">
              <select name="location_access" class="form-control select_multiple" title="Location Access" multiple="multiple">
                <!--option value="">Location Access</option-->
                <option value="Beach Access">Beach Access</option>
                <option value="Rooftop Access">Rooftop Access</option>
                <option value="Exterior Only">Exterior Only</option>                                                                                                                               
                <option value="Large Estate">Large Estate</option>                                                                                                                               
                <option value="Ocean View">Ocean View</option>                                                                                                                               
              </select> 
            </div> 

            <div class="col-md-4 col-sm-6 pd">
              <select name="yard" class="form-control select_multiple" title="Yard" multiple="multiple">
                <!--option value="">Yard</option-->
                <option value="Arbor">Arbor</option>
                <option value="Fountain">Fountain</option>
                <option value="Beach">Beach</option>
                <option value="Green House">Green House</option>
                <option value="Garden">Garden</option>
                <option value="Hedges">Hedges</option>
                <option value="Large Deck">Large Deck</option>
                <option value="Large Lawn">Large Lawn</option>
                <option value="Palm Trees">Palm Trees</option>
                <option value="Pond">Pond</option>
                <option value="Rose Garden">Rose Garden</option>
                <option value="Stones">Stones</option>
                <option value="Tennis Court">Tennis Court</option>
                <option value="Trees">Trees</option>                                                                                                                             
              </select> 
            </div> 
            <div class="col-md-4 col-sm-6 pd">
              <select name="pool" class="form-control select_multiple" title="Pool" multiple="multiple">
                <!--option value="">Pool</option-->
                <option value="Empty">Empty</option>
                <option value="Indoor">Indoor</option>
                <option value="Infinity">Infinity</option>
                <option value="Kidney">Kidney</option>
                <option value="Lagoon">Lagoon</option>
                <option value="Lap">Lap</option>
                <option value="Large">Large</option>
                <option value="Modern">Modern</option>
                <option value="Olympic">Olympic</option>
                <option value="Oval">Oval</option>
                <option value="Reflection">Reflection</option>
                <option value="Rooftop">Rooftop</option>
                <option value="Traditional">Traditional</option>                                                                                                                            
              </select> 
            </div>  
            <div class="col-md-4 col-sm-6 pd">
              <select name="patio" class="form-control select_multiple" title="Patio" multiple="multiple">
                <option value="">Patio / Balcony</option>
                <option value="Furnished">Furnished</option>
                <option value="Large">Large</option>
                <option value="with city view">With city view</option>
                <option value="with Mountain View">With Mountain View</option>
                <option value="with Ocean View">With Ocean View</option>
                <option value="with View">With View</option>                                                                                                                            
              </select> 
            </div>
            <div class="col-md-4 col-sm-6 pd">
              <select name="views" class="form-control select_multiple" title="Views" multiple="multiple">			
                <!--option value="">Views</option-->
                <option value="Canal">Canal</option>
                <option value="City">City</option>
                <option value="Lake">Lake</option>
                <option value="Mountain">Mountain</option>
                <option value="Ocean">Ocean</option>
                <option value="River">River</option>
                <option value="View">View</option>                                                                                                                            
              </select> 
            </div>
            <div class="col-md-4 col-sm-6 pd">
              <select name="misc" class="form-control select_multiple" title="Miscellaneous Rooms / Amenities" multiple="multiple">						
                <!--option value="">Miscellaneous Rooms / Amenities</option-->
                <option value="Bar">Bar</option>
                <option value="Bathroom">Bathroom</option>
                <option value="Chef's Kitchen">Chef's Kitchen</option>
                <option value="Circular Staircase">Circular Staircase</option>
                <option value="Gym">Gym</option>
                <option value="Home Office">Home Office</option>
                <option value="Home Theater">Home Theater</option>
                <option value="Library">Library</option>
                <option value="Music Room">Music Room</option>
                <option value="Pool Room">Pool Room</option>
                <option value="Tennis Court">Tennis Court</option>
                <option value="Wine Cellar">Wine Cellar</option>                                                                                                                 
              </select> 
            </div> 
            <div class="col-md-4 col-sm-6 pd">
              <select name="floors" class="form-control select_multiple" title="Floors" multiple="multiple">						
                <option value="Concrete">Concrete</option>
                <option value="Black">Black</option>
                <option value="Brick">Brick</option>
                <option value="Carpet">Carpet</option>
                <option value="Checkered">Checkered</option>
                <option value="Cobblestone">Cobblestone</option>
                <option value="Dark Wood">Dark Wood</option>
                <option value="Granite">Granite</option>
                <option value="Light Wood">Light Wood</option>
                <option value="Linoleum">Linoleum</option>
                <option value="Marble">Marble</option>
                <option value="Slate">Slate</option>
                <option value="Tile">Tile</option>
                <option value="White">White</option>
                <option value="Wood">Wood</option>                                                                                                                          
              </select> 
            </div>  
            <div class="col-md-4 col-sm-6 pd">
              <select name="walls" class="form-control select_multiple" title="Walls" multiple="multiple">						
                <option value="">Walls</option>
                <option value="White">White</option>
                <option value="Black">Black</option>
                <option value="Brick">Brick</option>
                <option value="Cold">Cold</option>
                <option value="Colorful">Colorful</option>
                <option value="Concrete">Concrete</option>
                <option value="Neutral">Neutral</option>
                <option value="Stone">Stone</option>
                <option value="Texture">Texture</option>
                <option value="Wallpaper">Wallpaper</option>
                <option value="Warm">Warm</option>
                <option value="Wood Panel">Wood Panel</option>                                                                                                                           
              </select>
            </div>                                                                                              
            <div class="col-md-4 col-sm-6 pd"><button id="searchsubmit" type="submit" class="btn btn-primary">Search</button></div>
          </div>

        </form>
      </div>
    </section>
    
      <div class="clearfix"></div>
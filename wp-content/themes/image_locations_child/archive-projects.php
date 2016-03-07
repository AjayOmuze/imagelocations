<?php
/*
  Template Name: Exclusives
 */
$projectsArray = array();

function display_project_links($key) {
    $key = strtoupper($key);
    global $projectsArray;

    $html = '<ul>';

    if (isset($projectsArray[$key])) {
        foreach ($projectsArray[$key] as $row) {
            $html .=
                    '
                       <li>
                            <a href="' . $row['link'] . '">' . $row['title'] . '</a>
                       </li>
                   ';
        }
    }

    $html .= '</ul>';
    return $html;
}

get_header();
?>
<style>
    .liked_locations{display: none;}
</style>
<?php
global $wp_query;

query_posts(array_merge($wp_query->query, array(
    'paged' => get_query_var('paged'),
    'posts_per_page' => 1000,
    'orderby' => 'title',
    'order' => 'ASC'
)));

if (have_posts()) {
    while (have_posts()) {
        the_post();
        $link = get_the_permalink();
        $title = trim(get_the_title());
        $char = strtoupper(substr($title, 0, 1));
        if (ctype_alpha($char)) {
            $projectsArray[$char][] = array(
                'title' => $title,
                'link' => $link,
            );
        } else {
            $projectsArray['#'][] = array(
                'title' => $title,
                'link' => $link,
            );
        }
    }
}
?>

<section>
    <div class="container">
        <div class="project_lists">
<?php if (isset($_POST['client_access_code']) && $_POST['client_access_code'] == "7thandGrand!"): ?>
            <div class="row">
                <div class="col-md-12">
                    
                <div class="name_abcd">
                    <ul>
                        <li><a href="javascript:void(0);" data-target="number">#</a></li>
    <?php foreach (range('A', 'Z') as $char): ?>
                            <li><a href="javascript:void(0);" data-target="<?php echo strtolower($char) ?>"><?php echo $char ?></a></li>
    <?php endforeach; ?>
                    </ul>
                </div>  
                    
                    
                </div>
            </div>            
            
                <div class="clearfix"></div>
    <?php if (have_posts()) : ?> 
                    <div class="row projects-alphabets">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <?php if (isset($projectsArray['#'])): ?>
                                <!------------number------------->
                                <div class="green_bg"><a id="number">#</a></div>
                                <div class="list">
                        <?php echo display_project_links('#'); ?>
                                </div>
        <?php endif; ?>
                            <?php if (isset($projectsArray['A'])): ?>
                                <!------------a------------->
                                <div class="blue_bg"><a id="a">A</a></div>
                                <div class="list">
                                    <?php echo display_project_links('A'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($projectsArray['B'])): ?>
                                <!------------b------------->
                                <div class="red_bg"><a id="b">B</a></div>
                                <div class="list">
                                    <?php echo display_project_links('B'); ?>
                                </div> 
                            <?php endif; ?>
                            <?php if (isset($projectsArray['C'])): ?>
                                <!------------c------------->
                                <div class="yellow_bg"><a id="c">C</a></div>
                                <div class="list">
                                    <?php echo display_project_links('C'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($projectsArray['D'])): ?>
                                <!------------D------------->
                                <div class="green_bg"><a id="d">D</a></div>
                                <div class="list">
                                    <?php echo display_project_links('D'); ?>
                                </div> 
                            <?php endif; ?>
                            <?php if (isset($projectsArray['E'])): ?>
                                <!------------E------------->
                                <div class="blue_bg"><a id="e">E</a></div>
                                <div class="list">
                                    <?php echo display_project_links('E'); ?>
                                </div> 
                            <?php endif; ?>
                            <?php if (isset($projectsArray['F'])): ?>
                                <!------------f------------->
                                <div class="red_bg"><a id="f">F</a></div>
                                <div class="list">
                                    <?php echo display_project_links('F'); ?>
                                </div>                                                                
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
        <?php if (isset($projectsArray['G'])): ?>
                                <!------------g------------->
                                <div class="green_bg"><a id="g">G</a></div>
                                <div class="list">
                                <?php echo display_project_links('G'); ?>
                                </div>
        <?php endif; ?>
                            <?php if (isset($projectsArray['H'])): ?>
                                <!------------h------------->
                                <div class="blue_bg"><a id="h">H</a></div>
                                <div class="list">
                                    <?php echo display_project_links('H'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($projectsArray['I'])): ?>
                                <!------------i------------->
                                <div class="red_bg"><a id="i">I</a></div>
                                <div class="list">
                                    <?php echo display_project_links('I'); ?>
                                </div> 
                            <?php endif; ?>
                            <?php if (isset($projectsArray['J'])): ?>
                                <!------------j------------->
                                <div class="yellow_bg"><a id="j">J</a></div>
                                <div class="list">
                                    <?php echo display_project_links('J'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($projectsArray['K'])): ?>
                                <!------------k------------->
                                <div class="green_bg"><a id="k">K</a></div>
                                <div class="list">
                                    <?php echo display_project_links('K'); ?>
                                </div> 
                            <?php endif; ?>
                            <?php if (isset($projectsArray['L'])): ?>
                                <!------------l------------->
                                <div class="blue_bg"><a id="l">L</a></div>
                                <div class="list">
                                    <?php echo display_project_links('L'); ?>
                                </div> 
                            <?php endif; ?>
                            <?php if (isset($projectsArray['M'])): ?>
                                <!------------m------------->
                                <div class="red_bg"><a id="m">M</a></div>
                                <div class="list">
                                    <?php echo display_project_links('M'); ?>
                                </div>             
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
        <?php if (isset($projectsArray['N'])): ?>
                                <!------------n------------->
                                <div class="green_bg"><a id="n">N</a></div>
                                <div class="list">
                                <?php echo display_project_links('N'); ?>
                                </div>
        <?php endif; ?>
                            <?php if (isset($projectsArray['O'])): ?>
                                <!------------o------------->
                                <div class="blue_bg"><a id="o">O</a></div>
                                <div class="list">
                                    <?php echo display_project_links('O'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($projectsArray['P'])): ?>
                                <!------------p------------->
                                <div class="red_bg"><a id="p">P</a></div>
                                <div class="list">
                                    <?php echo display_project_links('P'); ?>
                                </div> 
                            <?php endif; ?>
                            <?php if (isset($projectsArray['Q'])): ?>
                                <!------------q------------->
                                <div class="yellow_bg"><a id="q">Q</a></div>
                                <div class="list">
                                    <?php echo display_project_links('Q'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($projectsArray['R'])): ?>
                                <!------------r------------->
                                <div class="green_bg"><a id="r">R</a></div>
                                <div class="list">
                                    <?php echo display_project_links('R'); ?>
                                </div> 
                            <?php endif; ?>
                            <?php if (isset($projectsArray['S'])): ?>
                                <!------------s------------->
                                <div class="blue_bg"><a id="s">S</a></div>
                                <div class="list">
                                    <?php echo display_project_links('S'); ?>
                                </div> 
                            <?php endif; ?>
                            <?php if (isset($projectsArray['T'])): ?>
                                <!------------t------------->
                                <div class="red_bg"><a id="t">T</a></div>
                                <div class="list">
                                    <?php echo display_project_links('T'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
        <?php if (isset($projectsArray['U'])): ?>
                                <!------------u------------->
                                <div class="green_bg"><a id="u">U</a></div>
                                <div class="list">
                                <?php echo display_project_links('U'); ?>
                                </div>
        <?php endif; ?>
                            <?php if (isset($projectsArray['V'])): ?>
                                <!------------v------------->
                                <div class="blue_bg"><a id="v">V</a></div>
                                <div class="list">
                                    <?php echo display_project_links('V'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($projectsArray['W'])): ?>
                                <!------------w------------->
                                <div class="red_bg"><a id="w">W</a></div>
                                <div class="list">
                                    <?php echo display_project_links('W'); ?>
                                </div> 
                            <?php endif; ?>
                            <?php if (isset($projectsArray['X'])): ?>
                                <!------------x------------->
                                <div class="yellow_bg"><a id="x">X</a></div>
                                <div class="list">
                                    <?php echo display_project_links('X'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($projectsArray['Y'])): ?>
                                <!------------y------------->
                                <div class="green_bg"><a id="y">Y</a></div>
                                <div class="list">
                                    <?php echo display_project_links('Y'); ?>
                                </div> 
                            <?php endif; ?>
                            <?php if (isset($projectsArray['Z'])): ?>
                                <!------------z------------->
                                <div class="blue_bg"><a id="z">Z</a></div>
                                <div class="list">
                                    <?php echo display_project_links('Z'); ?>
                                </div> 
                            <?php endif; ?>
                        </div>                                    
                    </div>                                
    <?php else: ?>
        <?php get_template_part('content', 'none'); ?>
                            <?php endif; ?>
                        <?php else: ?>
                <center>
                    <h4>
                        The login is incorrect. »&nbsp;<a href="/client-login/"><strong>Back to Client Login</strong></a>
                    </h4>                        
                </center>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>
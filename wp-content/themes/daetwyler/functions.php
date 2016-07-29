<?php

/*
** Note: This file (functions.php from root theme directory) is used
**       for the front-end most of the time. For back-end customization
**       please use functions.php file from /admin/ folder.
*/

define( 'DS',       DIRECTORY_SEPARATOR );
define( 'CSSURI',   get_stylesheet_directory_uri() . '/lib/css' );
define( 'IMGURI',   get_stylesheet_directory_uri() . '/lib/img' );
define( 'JSURI',    get_stylesheet_directory_uri() . '/lib/js' );
define( 'BASE_URL', get_bloginfo( 'wpurl' ) );


//////////////////////
// Remove WP generator
//////////////////////
remove_action( 'wp_head', 'wp_generator' );
// END


////////////////////////////////////
// Add thumbnails for all post types
////////////////////////////////////
function daetwyler_theme_support() {
    add_theme_support( 'automatic_feed_links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5' );
    add_theme_support( 'title-tag' );

    add_image_size( 'blog', 540, 360, true );
}
add_action( 'after_setup_theme', 'daetwyler_theme_support' );
// END


///////////////////////////////////////
// Backwards compatibility for wp_title
///////////////////////////////////////
if ( ! function_exists( '_wp_render_title_tag' ) ) :
    function theme_slug_render_title() {
        echo '<title>' . wp_title( '|', false, 'right' ) . "</title>\n";
    }
    add_action( 'wp_head', 'theme_slug_render_title' );
endif;


//////////////
// Add Favicon
//////////////
add_action( 'wp_head', 'daetwyler_favicon', 9 );
function daetwyler_favicon() {
	$fav_dir = IMGURI . "/favicons";
	$favicons = <<<FAV
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="{$fav_dir}/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{$fav_dir}/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{$fav_dir}/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{$fav_dir}/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="{$fav_dir}/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="{$fav_dir}/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="{$fav_dir}/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="{$fav_dir}/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="{$fav_dir}/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="{$fav_dir}/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="{$fav_dir}/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="{$fav_dir}/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="{$fav_dir}/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="Daetwyler Industries"/>
<meta name="msapplication-TileColor" content="#" />
<meta name="msapplication-TileImage" content="{$fav_dir}/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="{$fav_dir}/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="{$fav_dir}/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="{$fav_dir}/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="{$fav_dir}/mstile-310x310.png" />
FAV;

	echo $favicons;
}

/////////////////////
// Register the menus
/////////////////////
register_nav_menus(array(
	'menu_top'    => 'Top Menu',
	'menu_main'   => 'Main Menu',
	'menu_footer' => 'Footer Menu'
));
// END



////////////////////
// Register sidebars
////////////////////
register_sidebar(array(
	'name' => 'Sidebar',
	'id' => 'sidebar',
	'before_widget' => '<div class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h5 class="title">',
	'after_title' => '</h5>'
));
// END


////////////////
// Load JS files
////////////////
add_action('wp_enqueue_scripts', 'daetwyler_load_js', 100);
function daetwyler_load_js() {
    if (!is_admin()) {
    global $wp_scripts;      
        
		wp_enqueue_script( 'jquery' );
             
        wp_enqueue_script('match-height', JSURI . '/jquery.matchHeight-min.js', array('jquery'), null, true);
        wp_enqueue_script('sidr', JSURI . '/jquery.sidr.min.js', array('jquery'), null, true);
        wp_enqueue_script('hoverIntent', JSURI . '/hoverIntent.js', array('jquery'), null, true);
        wp_enqueue_script('superfish', JSURI . '/superfish.min.js', array('jquery'), null, true);
        wp_enqueue_script('supersubs', JSURI . '/supersubs.js', array('jquery'), null, true);
        wp_enqueue_script('scripts', JSURI . '/scripts.js', array('jquery'), null, true);
    }
}
// END



/////////////////
// Load CSS files
/////////////////
add_action('wp_enqueue_scripts', 'daetwyler_load_css', 100);
function daetwyler_load_css() {

    if (!is_admin()) {

	    if ( ! wp_style_is( 'open-sans', 'enqueued' ) )
            wp_enqueue_style( 'opens-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700', null, null);

        wp_enqueue_style( 'style', get_stylesheet_uri(), null, null);
        wp_enqueue_style( 'normalize', CSSURI . '/normalize.css', null, null);
        wp_enqueue_style( 'custom', CSSURI . '/custom.css', null, null);
    }
}
// END



///////////////
// Get the slug
// @ http://www.wprecipes.com/wordpress-function-to-get-postpage-slug
///////////////
function the_slug() {
	global $post;
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug; 
}
// END



/////////////////////
// Adjust the content
/////////////////////
function daetwyler_content_formatted ($excerpt_length = 150, $ending = 'more...', $superending = null, $stripteaser = 0, $more_file = '') {
    $content = get_the_content($ending, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]>', $content);

    $text = $content;


    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $ending;
        return $text.$superending;
    } else {
        $text = implode(' ', $words);
        return $text;
    }

}
// END



/////////////////
// Custom excerpt
/////////////////
function daetwyler_custom_excerpt($excerpt_length = 55, $ending = '', $superending = null) {
    $text = get_the_content('');
    $text = strip_shortcodes( $text );

    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);

    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $ending;
        return '<p>'.$text.'</p>'.$superending;
    } else {
        $text = implode(' ', $words);
        return '<p>'.$text.'</p>';
    }
}
// END



/////////////////////
// Get meta for posts
/////////////////////
function daetwyler_post_info( $echo = false, $wrapper = 'section' ) {
    $content = '';

    $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

    if ( comments_open() ) {
        if ( $num_comments == 0 ) {
            $comments = __('No Comments');
        } elseif ( $num_comments > 1 ) {
            $comments = $num_comments . __(' Comments');
        } else {
            $comments = __('1 Comment');
        }
        $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
    } else {
        $write_comments =  __('Comments are off for this post.');
    }

    $date = get_post_time('F jS, Y', true);
    $message = __("This article was posted on: ", "daetwyler");
    $categories = get_the_category_list(', ');
    $content = '<%1$s class="article--meta">%2$s | %3$s | %4$s</%1$s>';


    $content = sprintf($content, $wrapper, $date, $categories, $write_comments);

    if ( $echo ) {
        print $content;
    } else {
        return $content;
    }
}
add_action( 'post_info', 'daetwyler_post_info', 10, 2 );
// END


///////////////////////
// Pagination for posts
///////////////////////
function daetwyler_pagination() {
    global $wp_query;
    $content = '';
    $big = 99999999999;
    $pagination = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages
    ) );
    if ( $wp_query->max_num_pages > 1 )
        $content = "<div class=\"pagination\">{$pagination}</div>";

    print $content;
}
add_action( 'pagination', 'daetwyler_pagination' );
// END

/*
 * Create Custom Post Type -- Portfolio
 */
add_action( 'init', 'daetwyler_cpt_portfolio' );
function daetwyler_cpt_portfolio() {
    $labels = array(
        'name' => _x( 'Case Studies', 'post type general name', 'daetwyler' ),
        'singular_name' => _x( 'Case Study', 'post type singular name', 'daetwyler' ),
        'menu_name' => _x( 'Case Studies', 'admin menu', 'daetwyler' ),
        'name_admin_bar' => _x( 'Case Study', 'add new on admin bar', 'daetwyler' ),
        'add_new' => _x( 'Add New', 'portfolio', 'daetwyler' ),
        'add_new_item' => _x( 'Add Case Study', 'daetwyler' ),
        'new_item' => _x( 'New Case Study', 'daetwyler' ),
        'edit_item' => _x( 'Edit Case Study', 'daetwyler' ),
        'view_item' => _x( 'View Case Study', 'daetwyler' ),
        'all_items' => _x( 'All Case Studies', 'daetwyler')
    );
    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 26,
        'supports'      => array( 'title', 'editor', 'thumbnail' )
    );
    register_post_type( 'daetwyler-portfolio', $args );
}

function gform_column_splits($content, $field, $value, $lead_id, $form_id) {
    if(!IS_ADMIN) { // only perform on the front end

        // target section breaks
        if($field['type'] == 'section') {
            $form = RGFormsModel::get_form_meta($form_id, true);

            // check for the presence of multi-column form classes
            $form_class = explode(' ', $form['cssClass']);
            $form_class_matches = array_intersect($form_class, array('two-column', 'three-column'));

            // check for the presence of section break column classes
            $field_class = explode(' ', $field['cssClass']);
            $field_class_matches = array_intersect($field_class, array('gform_column'));

            // if field is a column break in a multi-column form, perform the list split
            if(!empty($form_class_matches) && !empty($field_class_matches)) { // make sure to target only multi-column forms

                // retrieve the form's field list classes for consistency
                $form = RGFormsModel::add_default_properties($form);
                $description_class = rgar($form, 'descriptionPlacement') == 'above' ? 'description_above' : 'description_below';

                // close current field's li and ul and begin a new list with the same form field list classes
                return '</li></ul><ul class="gform_fields '.$form['labelPlacement'].' '.$description_class.' '.$field['cssClass'].'"><li class="gfield gsection empty">';

            }
        }
    }

    return $content;
}
add_filter('gform_field_content', 'gform_column_splits', 10, 5);


/*
 ** Add a new sylesheet for the royal slider
 */
add_filter('new_royalslider_skins','daetwyler_royalslider_skin', 10, 2);
function daetwyler_royalslider_skin( $skins ) {
    $skins['Daetwyler'] = array(
        'label' => 'Daetwyler Skin',
        'path'  => CSSURI . '/daetwyler-royalslider-skin.css'
    );
    return $skins;
}

add_action( 'vc_after_init', 'add_flipbox_custom_height' );
function add_flipbox_custom_height() {
    $param = WPBMap::getParam( 'icon_counter', 'height_type' );
    $param['value'][__('Super size', 'daetwyler')] = 'btn-super-size';
    vc_update_shortcode_param( 'icon_counter', $param );
}

// Filter the excerpt to add a link
add_filter( 'excerpt_more', 'daetwyler_excerpt' );
function daetwyler_excerpt( $more ) {
    return '&hellip; <a href="' . get_permalink( get_the_ID() ) . '">' . __( 'Continue reading', 'daetwyler') . ' &raquo;</a>';
}

function _remove_script_version( $src ){
    $parts = explode( '?', $src );
    return $parts[0];
}

/*
** Add shortcode for portfolio
*
add_shortcode('portfolio', 'daetwyler_portfolio_list_items');
function daetwyler_portfolio_list_items($atts) {
    extract(shortcode_atts(array(
        'recent' => false,
        'category' => ''
    ), $atts));

    // Convert category to array
    $category = explode(',', $category);
    // remove start and end whitespace
    $category = array_filter(array_map('trim', $category));


    STATIC $sid = 0;
    $sid++;

    $result = '';
    $querystring = array(
        'post_type' => 'portfolio',
        'posts_per_page' => -1
    );

    if ( isset($category) && !empty($category) ) {

        $addquery = array(
                    'tax_query' => array(array(
                        'taxonomy' => 'type',
                        'field' => 'slug',
                        'terms' => $category
                    ))
                    );
        $querystring = array_merge( $addquery, $querystring );
    }

    $query = new WP_Query( $querystring );
    if ( $query->have_posts() ) :

        $total_posts = $query->post_count;
        $columns = '';

        switch ( $total_posts ) {
            case 1:
                $columns = 'twelve';
                break;

            case 2:
                $columns = 'six';
                break;

            default:
                $columns = 'four';
        }


        if ( $recent == true ) :

        else :

        endif;

        $result .= '<ul id="portfolio'.$sid.'" class="row portfolio-list">';

        // The Loop
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
            $i++;

            $terms = get_the_terms( $post->ID, 'type' );

            if ( $terms && ! is_wp_error( $terms ) ) {

                $termlist = array();

                foreach ( $terms as $term ) {
                    $termlist[] = $term->slug;
                }

                $terms = join( " ", $termlist );
            }

            if ( $i == $total_posts ) { $endclass = ' end'; }
            $result .= "<li class='element $columns columns$endclass'>";
            $result .= '<h3 class="proj-title"><a href="'.get_permalink().'">'. get_the_title($post->ID) .'</a></h3>';
            $result .= '<a href="'.get_permalink().'">'. get_the_post_thumbnail($post->ID, 'portfolio-recent') .'</a>';
            $result .= '<a href="'.get_permalink().'">'. daetwyler_custom_excerpt(15) .'</a>';
            $result .= '</li>';
        endwhile;

        $result .= '</ul>';

    endif;
    // Reset Post Data
    wp_reset_postdata();
 
    //return the result
    return $result;
} */
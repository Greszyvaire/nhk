<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 */

if ( ! isset( $content_width ) ) 
$content_width = 960;

if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'flex2',  960, 450, false );
	add_image_size( 'full-size',  615, 9999, false );
	add_image_size( 'full-flex',  960, 9999, false );
	add_image_size( 'flex',  570, 300, false );
	add_image_size( 'index-blog',  189, 189, false );
	add_image_size( 'index-portfolio',  260, 200, false );
	add_image_size( 'fullsize', '', '', true ); // Fullsize
	}
	
add_theme_support( 'custom-background');
add_editor_style( '' ); 
	
/* ================================================
 
SCRIPTS

================================================ */

function siiimple_scripts_function() {
	
	global $data;
	
	//enqueue jQuery
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('jquery-ui-tabs');
	
	
	//SCRIPTS
	wp_enqueue_script('scripts', get_template_directory_uri() . '/framework/js/scripts.js', array('jquery'), '', false);
	
	//SHADOWBOX
	wp_enqueue_script('shadow', get_template_directory_uri() . '/framework/js/shadowbox.js', array('jquery'), '', true);
	
	//360
	if(is_page_template('template-360.php') ) {
		
		wp_enqueue_script('fancybox', get_template_directory_uri() . '/framework/js/jquery.fancybox.pack.js');
		wp_enqueue_script('scrollpane', get_template_directory_uri() . '/framework/js/jquery.jscrollpane.min.js');
		wp_enqueue_script('360', get_template_directory_uri() . '/framework/js/init-360.js');
		wp_enqueue_script('init-toggle', get_template_directory_uri() . '/framework/js/init-toggle.js');
		
		wp_enqueue_script('pf', get_template_directory_uri() . '/framework/js/picturefill.js');
		wp_enqueue_script('mm', get_template_directory_uri() . '/framework/js/matchmedia.js');

		wp_deregister_script('jquery-ui'); 
		wp_register_script('jquery-ui', ("https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"), false, '1.8.16'); 
		wp_enqueue_script('jquery-ui');
	}
	
	if(is_page_template('template-360.php') && ($data['disable_auto'] !='enable')) { 
		wp_enqueue_script('panorama', get_template_directory_uri() . '/framework/js/jquery.panorama360-auto.js');
		} else { 
		wp_enqueue_script('panorama', get_template_directory_uri() . '/framework/js/jquery.panorama360.js');
	}

	
	//HOME SLIDER
	if(is_page_template('template-home-gallery.php') ) {
		wp_enqueue_script('home-slide', get_template_directory_uri() . '/framework/js/init-homeSlide.js', array('jquery'), '', false);
		
	}
	
	//PORTFOLIO FILTER
	if(is_page_template('template-portfolio-filter.php') ) {
		wp_enqueue_script('custom-quick', get_template_directory_uri() . '/framework/js/portfolio.js', array('jquery'), '', true);
		wp_enqueue_script('quicksand', get_template_directory_uri() . '/framework/js/jquery.quicksand.js', array('jquery'), '', true);
		
	}
	
	//IMAGE VIEWER
	if(is_page_template('template-viewer.php') ) {
		wp_enqueue_script('init-viewer', get_template_directory_uri() . '/framework/js/init-viewer.js', array('jquery'), '', true);
	}
	
	//IMAGE VIEWER 2
	if(is_page_template('template-viewer2.php') ) {
		wp_enqueue_script('init-viewer2', get_template_directory_uri() . '/framework/js/init-viewer2.js', array('jquery'), '', true);
	}
	
	//PORTFOLIO MASONRY
	if(is_page_template('template-portfolio-masonry.php') ) {
	
		wp_enqueue_script('init-masonry', get_template_directory_uri() . '/framework/js/init-masonry.js', array('jquery'), '', true);
		wp_enqueue_script('m2', get_template_directory_uri() . '/framework/js/modernizr-transitions.js', array('jquery'), '', true);
		wp_enqueue_script('m-min', get_template_directory_uri() . '/framework/js/jquery.masonry.min.js', array('jquery'), '', true);
	}
	
	//503
	if(is_page_template('503.php') ) {
		wp_enqueue_script('countdown', get_template_directory_uri() . '/framework/js/jquery.countdown.js', array('jquery'), '', true);
		wp_enqueue_script('countdown2', get_template_directory_uri() . '/framework/js/init-503.js', array('jquery'), '', true);
	}
	
	//DRAGGABLE
	if(is_page_template('template-draggable.php') ) {
		wp_enqueue_script('init-draggable', get_template_directory_uri() . '/framework/js/init-draggable.js', array('jquery'), '', true);
		wp_enqueue_script('kinetic', get_template_directory_uri() . '/framework/js/full-portfolio/jquery.kinetic.js', array('jquery'), '', true);
		wp_enqueue_script('kineticScrollbar', get_template_directory_uri() . '/framework/js/full-portfolio/jquery.kineticScrollbar.js', array('jquery'), '', true);
		wp_enqueue_script('tmpl', get_template_directory_uri() . '/framework/js/full-portfolio/jquery.tmpl.min.js', array('jquery'), '', true);
	}
	
	//LOAD COMMENTS
	if(is_single() || is_page()) {
		wp_enqueue_script('comment-reply');
	}
	
	wp_enqueue_script('custom', get_template_directory_uri() . '/framework/js/custom.js', array('jquery'), '', true);
	
	}

/* ================================================
 
AJAX SCRIPTS

================================================ */
 
function add_modernizr() {
	wp_register_script( 'modernizr', get_template_directory_uri() . '/framework/js/modernizr.custom.js', false, '2.0.8' );
    wp_enqueue_script( 'modernizr' );
}  

function add_IE9() {
	if ( stristr( $_SERVER['HTTP_USER_AGENT'], "msie 8" ) ) {
		wp_register_script( 'IE9_js', get_template_directory_uri() . '/framework/js/IE9.js', array('jquery'), '', true );
    	wp_enqueue_script( 'IE9_js' );
 	}
}  

function add_slides() {
	if ( is_page_template( 'template-portfolio2.php' ) || is_page_template( 'template-portfolio3.php' ) || is_page_template( 'template-portfolio4.php' ) || is_singular( 'portfolio' ) ) 	{
	    wp_enqueue_script( 'slides', get_template_directory_uri() . '/framework/js/slides.min.jquery.js', array('jquery'), '', true );
	}
}

function add_scroll_to() {
	wp_register_script( 'scroll_to', get_template_directory_uri() . '/framework/js/jquery.scrollTo-1.4.2-min.js', array( 'jquery' ), '1.4.2', true );
    wp_enqueue_script( 'scroll_to' );
} 

function add_folio_js() {
	wp_enqueue_script( 'folio-js', get_template_directory_uri() . '/framework/js/jquery.folio.js', array( 'jquery' ) );
	wp_localize_script( 'folio-js', 'headJS', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'templateurl' => get_template_directory_uri(), 'themePath' => get_template_directory_uri() ) );	
} 

add_action( 'wp_enqueue_scripts', 'add_modernizr', 5 ); 
add_action( 'wp_enqueue_scripts', 'add_IE9', 10 );
add_action( 'wp_enqueue_scripts', 'add_folio_js', 20 );
add_action( 'wp_enqueue_scripts', 'add_slides', 25 );
add_action( 'wp_enqueue_scripts', 'add_scroll_to', 60 );
add_action('wp_enqueue_scripts','siiimple_scripts_function');

/* ================================================
 
CSS

================================================ */
add_action('wp_enqueue_scripts', 'siiimple_enqueue_css');
function siiimple_enqueue_css() {
	
	//THEMEOPTIONS
	global $data;
	
	wp_enqueue_style('master', get_template_directory_uri() . '/framework/css/master.css', 'style');

	//TEMPLATE 360
	if( is_page_template('template-360.php') ) {
		wp_enqueue_style('panorama', get_template_directory_uri() . '/framework/css/panorama360.css', 'style');
		wp_enqueue_style('scrollpane', get_template_directory_uri() . '/framework/css/jquery.jscrollpane.css', 'style');
	}
	
	//TEMPLATE DRAGGABLE
	if( is_page_template('template-draggable.php') ) {
		wp_enqueue_style('full-portfolio', get_template_directory_uri() . '/framework/css/full-portfolio.css', 'style');
	}
	
	//TEMPLATE VIEWER
	if( is_page_template('template-viewer.php') ) {
		wp_enqueue_style('image-viewer', get_template_directory_uri() . '/framework/css/image-viewer.css', 'style');
	}
	
	//TEMPLATE VIEWER 2
	if( is_page_template('template-viewer2.php') ) {
		wp_enqueue_style('image-viewer2', get_template_directory_uri() . '/framework/css/image-viewer2.css', 'style');
	}

	
	//HOME SLIDER (2)
	if( is_page_template('template-home-gallery.php') ) {
		wp_enqueue_style('homeSlideCSS', get_template_directory_uri() . '/framework/css/homeSlide.css', 'style');
	}
	
	//ISOTOPE
	if( is_page_template('template-portfolio-masonry.php') ) {
		wp_enqueue_style('isotope', get_template_directory_uri() . '/framework/css/isotope.css', 'style');
	}
	
	//RESPONSIVE
	if($data['disable_responsive'] !='disable') {
		wp_enqueue_style('responsive', get_template_directory_uri() . '/framework/css/responsive.css', 'style');
		wp_enqueue_style('skeleton', get_template_directory_uri() . '/framework/css/grid.css', 'style');
	}
	
}

/* ================================================
 
REGISTER NAV MENU & POST FORMATS

================================================ */

register_nav_menus(array('main_menu' => __('Main','siiimple')));
add_theme_support( 'post-formats', array( 'aside', 'link', 'video','gallery', 'status', 'quote', 'audio', 'image' ) );

/* ================================================
 
CUSTOM POST TYPE SINGLE PAGE

================================================ */

add_action( 'pre_get_posts', 'rw_add_custom_post_types' );
 
function rw_add_custom_post_types( $query ) {
    if ( $query->is_search || $query->is_tag ) 
       $query->set('post_type', array( 'post', 'portfolio' ) );
}

load_theme_textdomain( 'siiimple', get_template_directory_uri() .'/lang' );
add_theme_support( 'automatic-feed-links' );

/* ================================================
 
GOOGLE FONTS

================================================ */

function snix_google_fonts(){

	global $data;
	
	if (($data['google_fonts_paragraph'] == 'PT Sans') || ($data['google_fonts_header'] == 'PT Sans'))  {
    wp_enqueue_style( 'google-fonts-1', 'http://fonts.googleapis.com/css?family=PT+Sans:400,700' );
    }
    
    if (($data['google_fonts_paragraph'] == 'PT Sans Narrow') || ($data['google_fonts_header'] == 'PT Sans Narrow')){
    wp_enqueue_style( 'google-fonts-2', 'http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Oswald') || ($data['google_fonts_header'] == 'Oswald')){
    wp_enqueue_style( 'google-fonts-3', 'http://fonts.googleapis.com/css?family=Oswald:400,700' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Open Sans Condensed') || ($data['google_fonts_header'] == 'Open Sans Condensed')){
    wp_enqueue_style( 'google-fonts-4', 'http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Passion One') || ($data['google_fonts_header'] == 'Passion One')){
    wp_enqueue_style( 'google-fonts-5', 'http://fonts.googleapis.com/css?family=Passion+One' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Droid Sans') || ($data['google_fonts_header'] == 'Droid Sans')){
     wp_enqueue_style( 'google-fonts-6', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Josefin Sans') || ($data['google_fonts_header'] == 'Josefin Sans')){
    wp_enqueue_style( 'google-fonts-7', 'http://fonts.googleapis.com/css?family=Josefin+Sans:400,700' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Rokkitt') || ($data['google_fonts_header'] == 'Rokkitt')){
      wp_enqueue_style( 'google-fonts-8', 'http://fonts.googleapis.com/css?family=Rokkitt:400,700' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Dosis') || ($data['google_fonts_header'] == 'Dosis')){
    wp_enqueue_style( 'google-fonts-9', 'http://fonts.googleapis.com/css?family=Dosis:400,700' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Raleway') || ($data['google_fonts_header'] == 'Raleway')){
    wp_enqueue_style( 'google-fonts-10', 'http://fonts.googleapis.com/css?family=Raleway:400,700' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Squada One') || ($data['google_fonts_header'] == 'Squada One')){
    wp_enqueue_style( 'google-fonts-11', 'http://fonts.googleapis.com/css?family=Squada+One' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Balthazar') || ($data['google_fonts_header'] == 'Balthazar')){
    wp_enqueue_style( 'google-fonts-12', 'http://fonts.googleapis.com/css?family=Balthazar' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Pontano Sans') || ($data['google_fonts_header'] == 'Pontano Sans')){
    wp_enqueue_style( 'google-fonts-13', 'http://fonts.googleapis.com/css?family=Pontano+Sans' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Advent Pro') || ($data['google_fonts_header'] == 'Advent Pro')){
    wp_enqueue_style( 'google-fonts-14', 'http://fonts.googleapis.com/css?family=Advent+Pro:400,300,700' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Homenaje') || ($data['google_fonts_header'] == 'Homenaje')){
    wp_enqueue_style( 'google-fonts-15', 'http://fonts.googleapis.com/css?family=Homenaje' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Droid Serif') || ($data['google_fonts_header'] == 'Droid Serif')){
    wp_enqueue_style( 'google-fonts-16', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,700' );
    }
    
    if (($data['google_fonts_paragraph'] == 'Cabin') || ($data['google_fonts_header'] == 'Cabin')){
  	wp_enqueue_style( 'google-fonts-17', 'http://fonts.googleapis.com/css?family=Cabin:400,700' );
    }

}

add_action('wp_enqueue_scripts', 'snix_google_fonts');

/* ================================================
 
CUSTOM POST TYPES

================================================ */

add_action( 'init', 'create_post_types' );
function create_post_types() {

global $data;

/* ================================================
 
TESTIMONIAL

================================================ */

//TESTIMONIALS SLUG
	$testimonials_slug = 'testimonials';
	if($data['testimonials_post_type_slug']) {
		$testimonials_slug = $data['testimonials_post_type_slug'];
	}
	
//TESTIMONIALS POST TYPE NAME
	$testimonials_post_type_name = 'Testimonials';
	if($data['testimonials_post_type_name']) {
		$testimonials_post_type_name = $data['testimonials_post_type_name'];
	}
	
//TESTIMONIALS NAME
	$testimonials_labels = array(
			'name' => $testimonials_post_type_name
	);

//TESTIMONIALS POST TYPE
	register_post_type( 'testimonials',
		array(
		  'labels' => apply_filters('siiimple_testimonials_labels', $testimonials_labels),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail', 'revisions'),
		  'menu_icon' => get_template_directory_uri() . '/admin/assets/css/images/icon-testimonials.png',
		  'query_var' => true,
		  'rewrite' => array( 'slug' => $testimonials_slug ),
		)
	  );

/* ================================================
 
GALLERY

================================================ */
	  
//GALLERY SLUG
	$gallery_slug = 'gallery';
	if($data['gallery_post_type_slug']) {
		$gallery_slug = $data['gallery_post_type_slug'];
	}
	
//GALLERY NAME
	$gallery_post_type_name = 'Gallery';
	if($data['gallery_post_type_name']) {
		$gallery_post_type_name = $data['gallery_post_type_name'];
	}
	
//GALLERY NAME
	$gallery_labels = array(
			'name' => $gallery_post_type_name
	);

//GALLERY POST TYPE
	register_post_type( 'gallery',
		array(
		  'labels' => apply_filters('siiimple_gallery_labels', $gallery_labels),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail', 'revisions'),
		  'menu_icon' => get_template_directory_uri() . '/admin/assets/css/images/icon-gallery.png',
		  'query_var' => true,
		  'rewrite' => array( 'slug' => $gallery_slug ),
		)
	  );
	  
/* ================================================
 
PORTFOLIO

================================================ */
	  
//PORTFOLIO SLUG
	$portfolio_slug = 'portfolio';
	if($data['portfolio_post_type_slug']) {
		$portfolio_slug = $data['portfolio_post_type_slug'];
	}
	
//PORTFOLIO NAME
	$portfolio_post_type_name = 'Portfolio';
	if($data['portfolio_post_type_name']) {
		$portfolio_post_type_name = $data['portfolio_post_type_name'];
	}
	
//PORTFOLIO NAME
	$portfolio_labels = array(
			'name' => $portfolio_post_type_name
	);

//PORTFOLIO POST TYPE
	register_post_type( 'portfolio',
		array(
		  'labels' => apply_filters('siiimple_portfolio_labels', $portfolio_labels),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail', 'revisions'),
		  'menu_icon' => get_template_directory_uri() . '/admin/assets/css/images/icon-gallery2.png',
		  'query_var' => true,
		  'rewrite' => array( 'slug' => $portfolio_slug ),
		)
	  );
	  
	  
/* ================================================
 
PANORAMA

================================================ */
	  
//PANORAMA SLUG
	$panorama_slug = 'panorama';
	if($data['panorama_post_type_slug']) {
		$panorama_slug = $data['panorama_post_type_slug'];
	}
	
//PANORAMA NAME
	$panorama_post_type_name = 'Panorama';
	if($data['panorama_post_type_name']) {
		$panorama_post_type_name = $data['panorama_post_type_name'];
	}
	
//PANORAMA NAME
	$panorama_labels = array(
			'name' => $panorama_post_type_name
	);

//PANORAMA
	register_post_type( 'panorama',
		array(
		  'labels' => apply_filters('siiimple_panorama_labels', $panorama_labels),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail', 'revisions'),
		  'menu_icon' => get_template_directory_uri() . '/admin/assets/css/images/icon-parallax.png',
		  'query_var' => true,
		  'rewrite' => array( 'slug' => $panorama_slug ),
		)
	  );
	  
}

/* ================================================
 
SIDEBARS

================================================ */

//LEFT SIDEBAR

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Left Sidebar 01',
		'id' => 'left-sidebar-one',
		'description' => 'Widgets in this area will be shown first section of single pages & blog.',
		 'before_widget' => '<div id="%1$s" class="widget">',
           'after_widget' => '</div>',
           'before_title' => '<h3 class="widgettitle">',
           'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Left Sidebar 02',
		'id' => 'left-sidebar-two',
		'description' => 'Widgets in this area will be shown first section of single pages & blog.',
		 'before_widget' => '<div id="%1$s" class="widget">',
           'after_widget' => '</div>',
           'before_title' => '<h3 class="widgettitle">',
           'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Left Sidebar 03',
		'id' => 'left-sidebar-three',
		'description' => 'Widgets in this area will be shown first section of single pages & blog.',
		 'before_widget' => '<div id="%1$s" class="widget">',
           'after_widget' => '</div>',
           'before_title' => '<h3 class="widgettitle">',
           'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Left Sidebar 04',
		'id' => 'left-sidebar-four',
		'description' => 'Widgets in this area will be shown first section of single pages & blog.',
		 'before_widget' => '<div id="%1$s" class="widget">',
           'after_widget' => '</div>',
           'before_title' => '<h3 class="widgettitle">',
           'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Left Sidebar 05',
		'id' => 'left-sidebar-five',
		'description' => 'Widgets in this area will be shown first section of single pages & blog.',
		 'before_widget' => '<div id="%1$s" class="widget">',
           'after_widget' => '</div>',
           'before_title' => '<h3 class="widgettitle">',
           'after_title' => '</h3>',
)); 


//RIGHT SIDEBAR

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Right Sidebar 01',
		'id' => 'right-sidebar-one',
		'description' => 'Widgets in this area will be shown first section of single pages & blog.',
		 'before_widget' => '<div id="%1$s" class="widget">',
           'after_widget' => '</div>',
           'before_title' => '<h3 class="widgettitle">',
           'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Right Sidebar 02',
		'id' => 'right-sidebar-two',
		'description' => 'Widgets in this area will be shown first section of single pages & blog.',
		 'before_widget' => '<div id="%1$s" class="widget">',
           'after_widget' => '</div>',
           'before_title' => '<h3 class="widgettitle">',
           'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Right Sidebar 03',
		'id' => 'right-sidebar-three',
		'description' => 'Widgets in this area will be shown first section of single pages & blog.',
		 'before_widget' => '<div id="%1$s" class="widget">',
           'after_widget' => '</div>',
           'before_title' => '<h3 class="widgettitle">',
           'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Right Sidebar 04',
		'id' => 'right-sidebar-four',
		'description' => 'Widgets in this area will be shown first section of single pages & blog.',
		 'before_widget' => '<div id="%1$s" class="widget">',
           'after_widget' => '</div>',
           'before_title' => '<h3 class="widgettitle">',
           'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Right Sidebar 05',
		'id' => 'right-sidebar-five',
		'description' => 'Widgets in this area will be shown first section of single pages & blog.',
		 'before_widget' => '<div id="%1$s" class="widget">',
           'after_widget' => '<div class="clear"></div></div>',
           'before_title' => '<h3 class="widgettitle">',
           'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer 01',
		'id' => 'footer-one',
		'description' => 'Widgets in this area will be shown first section of single pages & blog.',
		'before_widget' => '<div class="grid4 col first">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span class="footer-title">',
		'after_title' => '</span></h4>',
));
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer 02',
		'id' => 'footer-two',
		'description' => 'Widgets in this area will be shown second section of single pages & blog.',
		'before_widget' => '<div class="grid4 col">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span class="footer-title">',
		'after_title' => '</span></h4>',
));
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer 03',
		'id' => 'footer-three',
		'description' => 'Widgets in this area will be shown third section of single pages & blog.',
		'before_widget' => '<div class="grid4 col">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span class="footer-title">',
		'after_title' => '</span></h4>',
));
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer 04',
		'id' => 'footer-four',
		'description' => 'Widgets in this area will be shown fourth section of single pages & blog.',
		'before_widget' => '<div class="grid4 col last">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span class="footer-title">',
		'after_title' => '</span></h4>',
));



/* ================================================
 
AUDIO FILES

================================================ */

function siiimple_audio($postid) {
	
	global $data;
	
	$mp3 = get_post_meta($postid, 'siiimple_audio_mp3', TRUE);
	$ogg = get_post_meta($postid, 'siiimple_audio_ogg', TRUE);
	
	
	 ?>
		<script type="text/javascript">
		
			jQuery(document).ready(function(){
	
				if(jQuery().jPlayer) {
					jQuery("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
						ready: function () {
							jQuery(this).jPlayer("setMedia", {
								<?php if($mp3 != '') : ?>
								mp3: "<?php echo $mp3; ?>",
								<?php endif; ?>
								<?php if($ogg != '') : ?>
								oga: "<?php echo $ogg; ?>",
								<?php endif; ?>
								end: ""
							});
						},
						swfPath: "<?php echo get_template_directory_uri(); ?>/framework/js",
						cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
						supplied: "<?php if($ogg != '') : ?>oga,<?php endif; ?><?php if($mp3 != '') : ?>mp3, <?php endif; ?> all"
					});
					
				}
			});
		</script>
	<?php 
}

/* ================================================
 
CUSTOM CSS

================================================ */

function siiimple_custom_css() {
	
		global $data;
		
		$custom_css ='';
		
		
		//CUSTOM FIELD CSS
		if(!empty($data['custom_css'])) {
			$custom_css .= $data['custom_css'];
		}
		
		//GENERAL HEADER FONTS
		if(!empty($data['google_fonts_header'])) {
			
			$custom_css .= 'h1, h2, h3, h4, h5, h6, h5.main-title-blog a,.sf-menu a,.paginate,h1.main-header,.tip-twitter .tip-inner  { font-family: '.$data['google_fonts_header'].' !important; }';
		}
		
		//GENERAL HEADER FONTS WEIGHT
		if(!empty($data['google_fonts_header_weight'])) {
			
			$custom_css .= 'h1, h2, h3, h4, h5, h6, h5.main-title-blog a,.sf-menu a,.paginate,h1.main-header,.tip-twitter .tip-inner { font-weight: '.$data['google_fonts_header_weight'].' !important; }';
		}
		
		//GENERAL HEADER PARAGRAPH
		if(!empty($data['google_fonts_paragraph'])) {
			
			$custom_css .= 'body, p, .left-excerpt ul li, .sidebar-inner a, input#s, .grid4.col ul li a,p.main-desc{ font-family: '.$data['google_fonts_paragraph'].' !important; }';
		}
		
		//GENERAL HEADER PARAGRAPH WEIGHT
		if(!empty($data['google_fonts_paragraph_weight'])) {
			
			$custom_css .= 'body, p, .left-excerpt ul li, .sidebar-inner a, input#s, .grid4.col ul li a,p.main-desc{ font-weight: '.$data['google_fonts_paragraph_weight'].' !important; }';
		}

		
		//GENERAL ACCENT COLOR
		if(!empty($data['accent_color'])) {
			
			$custom_css .= '#footer a,.grid4.col .tweet li a,#page-bottom a.author-link,.grid4.col .menu li.current-menu-item a,label small,.left-excerpt ul li a,.link p,a:hover,#nav a:hover,[class^="icon-"]:hover:before,.info-area h4 a,#intro-wrap p a,#inline a, #inlineOne a  { color: '.$data['accent_color'].' !important; }';
			
			$custom_css .= '  .jspHorizontalBar .jspDrag,li.thumbers:hover,#nav #uniform-undefined.selector:hover { background: '.$data['accent_color'].' !important; }';
			$custom_css .= '  .panorama .controls a.prev:hover,.panorama .controls a.next:hover,.panorama .controls a.stop:hover,.panorama_prev:hover,.panorama_next:hover,.open-panels:hover,.close-panels:hover,.panorama-view .area:hover,#prev:hover, #next:hover { background-color: '.$data['accent_color'].' !important; }';
		}
		
		//HEADER TEXT COLOR
		if(!empty($data['header_text_color'])) {
			
			$custom_css .= '.sf-menu a  { color: '.$data['header_text_color'].' !important; }';
		}
		
		//HEADER BACKGROUND COLOR
		if(!empty($data['header_color'])) {
			
			$custom_css .= '#header-left.grid16.col  { background: '.$data['header_color'].' !important; }';
			$custom_css .= '.sf-menu ul{background:'.$data['header_color'].' !important;}';
		}
		
		//MENU BORDER
		if(!empty($data['menu_border'])) {
			
			$custom_css .= 'ul#menu-menu.sf-menu a.sf-with-ul  { border-left: 1px solid '.$data['menu_border'].' !important; }';
			$custom_css .= 'ul.sub-menu a   { border-bottom: 1px solid '.$data['menu_border'].' !important; }';
			$custom_css .= '.sf-menu ul  { border-left: 1px solid '.$data['menu_border'].' !important; border-right:1px solid '.$data['menu_border'].' !important; border-bottom: 1px solid '.$data['menu_border'].' !important;}';
			
		}
		
		//HOME BLOG HEADER
		
		if(!empty($data['blog_home_color'])) {
			
			$custom_css .= '.second-home #page-bottom.container.home2 h1  { color: '.$data['blog_home_color'].' !important; }';
		}
		
		//BLOG HEADER
		if(!empty($data['blog_header_color'])) {
			
			$custom_css .= '.top-header h1.main-header-title.blog-page  { color: '.$data['blog_header_color'].' !important; }';
		}
		
		if(!empty($data['header_border'])) {
			
			$custom_css .= '#header-left.grid16.col  { border-left:1px solid '.$data['header_border'].' !important; border-right:1px solid '.$data['header_border'].' !important; border-bottom:1px solid '.$data['header_border'].' !important }';
		}
		
		if(!empty($data['blog_sub_header_color'])) {
			
			$custom_css .= 'p.sub-port  { color: '.$data['blog_sub_header_color'].' !important; }';
		}
		
		if(!empty($data['blog_sub_header_border_color'])) {
			
			$custom_css .= 'p.sub-port.blog-sub-port  { border-top: 1px solid '.$data['blog_sub_header_border_color'].' !important; border-bottom: 1px solid '.$data['blog_sub_header_border_color'].' !important; }';
		}
		
		//VIEWER HEADER
		if(!empty($data['viewer_header_color'])) {
			
			$custom_css .= '#top-wrapper h1  { color: '.$data['viewer_header_color'].' !important; }';
		}
		
		if(!empty($data['viewer_sub_header_color'])) {
			
			$custom_css .= 'p.viewer  { color: '.$data['viewer_sub_header_color'].' !important; }';
		}
		
		if(!empty($data['viewer_sub_header_border_color'])) {
			
			$custom_css .= 'p.viewer  { border-top: 1px solid '.$data['viewer_sub_header_border_color'].' !important; border-bottom: 1px solid '.$data['viewer_sub_header_border_color'].' !important; }';
		}
		
		//TESTIMONIAL HEADER
		if(!empty($data['testimonial_header_color'])) {
			
			$custom_css .= 'h1.testimonial-title  { color: '.$data['testimonial_header_color'].' !important; }';
		}
		
		if(!empty($data['testimonial_sub_header_color'])) {
			
			$custom_css .= 'p.testimonial  { color: '.$data['testimonial_sub_header_color'].' !important; }';
		}
		
		if(!empty($data['testimonial_sub_header_border_color'])) {
			
			$custom_css .= 'p.testimonial  { border-top: 1px solid '.$data['testimonial_sub_header_border_color'].' !important; border-bottom: 1px solid '.$data['testimonial_sub_header_border_color'].' !important; }';
		}
		
		//PORTFOLIO HEADER
		if(!empty($data['portfolio_header_color'])) {
			
			$custom_css .= '.top-header h1.main-header-title  { color: '.$data['portfolio_header_color'].' !important; }';
		}
		
		if(!empty($data['portfolio_sub_header_color'])) {
			
			$custom_css .= 'p.portfolio  { color: '.$data['portfolio_sub_header_color'].' !important; }';
		}
		
		if(!empty($data['portfolio_sub_header_border_color'])) {
			
			$custom_css .= 'p.portfolio  { border-top: 1px solid '.$data['portfolio_sub_header_border_color'].' !important; border-bottom: 1px solid '.$data['portfolio_sub_header_border_color'].' !important; }';
		}
		
		//MENU ICONS
		
		if(!empty($data['menu_icons_color'])) {
			
			$custom_css .= '[class^="icon-"]:before,[class*=" icon-"]:before  { color: '.$data['menu_icons_color'].' !important; }';
		}
		
		//PAGE ICONS
		
		if(!empty($data['page_icons_color'])) {
			
			$custom_css .= '#page-bottom [class^="icon-"]:before, #page-bottom [class*=" icon-"]:before  { color: '.$data['page_icons_color'].' !important; }';
		}
		
		//PAGE ICONS SIZE
		
		if(!empty($data['page_icons_size'])) {
			
			$custom_css .= '#page-bottom [class^="icon-"],  #page-bottom [class*=" icon-"]  { font-size: '.$data['page_icons_size'].' !important; }';
		}

		
		//LINE BACKGROUND
		if(!empty($data['custom_line'])) {
			if($data['custom_line'] !=''.get_template_directory_uri().'/framework/images/01.png') {
				$custom_css .= '.line{background: url('.$data['custom_line'].');}';
			} else {
				$custom_css .= '.line{background: none;}';
			}
		}

		
		//ECHO CSS
		$css_output = "<!-- Custom CSS -->\n<style type=\"text/css\">\n" . $custom_css . "\n</style>";
		
		if(!empty($custom_css)) {
			echo $css_output;
		}
}

add_action('wp_head', 'siiimple_custom_css');


/* ================================================
 
NAVIGATION

================================================ */

function wp_corenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;
 
  $total = 1; //1 - display the text "Page N of N", 0 - not display
  $a['mid_size'] = 5; //how many links to show on the left and right of the current
  $a['end_size'] = 1; //how many links to show in the beginning and end
  $a['prev_text'] = '&laquo; Previous'; //text of the "Previous page" link
  $a['next_text'] = 'Next &raquo;'; //text of the "Next page" link
 
  if ($max > 1) echo '<div class="paginate">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
}

/* ================================================
 
EXCERPT

================================================ */
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }
    
function embed_tweets() {
    if (is_page() || is_single()) {
        wp_register_script( 'twitter_widgets', 'http://platform.twitter.com/widgets.js', '', '', '');
        wp_enqueue_script('twitter_widgets');
    }
}
add_action('wp_enqueue_scripts', 'embed_tweets');

// functions run on activation --> important flush to clear rewrites
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	$wp_rewrite->flush_rules();
}

/* ================================================
 
ODD/EVEN FOR PORTFOLIO

================================================ */

function my_post_class() {
	global $post_num;

	if ( ++$post_num % 2 )
		$class = 'even';
	else
		$class = 'odd';

	echo $class;
}

/* ================================================
 
FUNCTIONS

================================================ */

//COMMON FUNCTIONS
require_once( get_template_directory() . '/framework/functions/shortcodes.php');
require_once( get_template_directory() . '/framework/functions/aq_resizer.php');
require_once( get_template_directory() . '/framework/functions/twitter-widget.php');
require_once( get_template_directory() . '/framework/functions/twitter-func.php');
require_once( get_template_directory() . '/framework/functions/flickr-widget.php');

//AJAX FOR PORTFOLIO
require_once( get_template_directory() . '/framework/includes/ajax.php' );
require_once( get_template_directory() . '/framework/includes/metaboxes.php' );
require_once( get_template_directory() . '/framework/functions/portfolio-post-type.php' );
require_once( get_template_directory() . '/admin/index.php');

// ADMIN ONLY
if ( defined( 'WP_ADMIN' ) && WP_ADMIN ) {
	// Re-define meta box path and URL
	define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/framework/meta-box' ) );
	define( 'RWMB_DIR', trailingslashit( get_stylesheet_directory() . '/framework/meta-box' ) );

	// Include the meta box script
	require_once RWMB_DIR . 'meta-box.php';

	// Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
	include 'framework/functions/meta.php';
}

//END
?>
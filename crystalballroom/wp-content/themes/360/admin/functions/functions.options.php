<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
$of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Select a page:");       

//RESPONSIVE ENABLE/DISABLE
$enable_disable = array('enable','disable'); 
$disable_enable = array('disable','enable');

//GOOGLE FONTS
$google_fonts = array ('HelveticaNeue-Light','PT Sans Narrow','PT Sans','Passion One','Droid Sans','Open Sans Condensed', 'Josefin Sans','Rokkitt','Dosis','Raleway','Oswald','Squada One','Balthazar','Pontano Sans','Advent Pro','Homenaje','Droid Serif','Cabin');

$google_fonts_weight = array ('300','400','700');

$port_columns = array ('One','Two','Three','Four','Five'); 

$blog_home = array ('Portfolio','Gallery','Featured Image','None');
$gallery_home = array ('Portfolio','Gallery','Panorama'); 

//HOMEPAGE BLOCKS
$of_options_homepage_blocks = array(
	"enabled" => array (
		"placebo" => "placebo", //REQUIRED!
		"home_tagline" => "Tagline",
		
		
	),
	"disabled" => array (
		"placebo" => "placebo", //REQUIRED!
				
	),
);

//STYLESHEET 
$alt_stylesheet_path = LAYOUT_PATH;
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//Background Images Reader
$bg_images_path = get_stylesheet_directory() . '/framework/images/bg/'; // change this to where you store your bg images
$bg_images_url = get_template_directory_uri().'/framework/images/bg/'; // change this to where you store your bg images
$bg_images = array();

if ( is_dir($bg_images_path) ) {
    if ($bg_images_dir = opendir($bg_images_path) ) { 
        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
                $bg_images[] = $bg_images_url . $bg_images_file;
            }
        }    
    }
}


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

///////////////////////////////////////////////////////////////////////////////GENERAL	

$of_options[] = array( "name" => __('General', 'siiimple'),
					"type" => "heading");
				
$of_options[] = array( "name" => __('Main Logo Upload', 'siiimple'),
					"desc" => __('Upload your custom logo using the native media uploader, or define the URL directly', 'siiimple'),
					"id" => "custom_logo",
					"std" => "",
					"type" => "media");
					
					
$of_options[] = array( "name" => __('Enable or Disable Responsive Layout', 'siiimple'),
					"desc" => __('Select to enable or disable the responsive layout', 'siiimple'),
					"id" => "disable_responsive",
					"std" => "enable",
					"type" => "select",
					"options" => $enable_disable);
					
$of_options[] = array( "name" => __('Custom Favicon', 'siiimple'),
					"desc" => __('Upload or past the URL for your custom favicon.', 'siiimple'),
					"id" => "custom_favicon",
					"std" => "",
					"type" => "upload");
					
$of_options[] = array( "name" => __('Welcome Page (Index)', 'siiimple'),
					"desc" => __('This is the page you see on installation.  You can use it for any message you prefer.  When you choose Settings > Reading > A static page > Front page - you can set your template to become the home page, whether it is the blog, a page, or a template.  The demo is showing template-360.php as the home page.', 'siiimple'),
					"id" => "welcome",
					"std" => "This is a welcome page.  It is left intentionally blank.  But you probably do not want to use this as your site.  To set up the homepage like you see in the demo, create a new page > choose the page template of your choice (the demo is Template 360) > navigate to Settings > Reading > Set your homepage to static and choose the page template you created.  Also, be sure to read the documentation :)  Change this text in Theme Options > Welcome Page (Index).",
					"type" => "textarea");
					
$of_options[] = array( "name" => __('Contact Text', 'siiimple'),
					"desc" => __('Add text to your contact template.', 'siiimple'),
					"id" => "tagline_contact",
					"std" => "",
					"type" => "textarea");
					
$of_options[] = array( "name" => __('Tracking Code (Header)', 'siiimple'),
					"desc" => __('Paste your Google Analytics (or other) tracking code here. This will be added into the header template of your theme.', 'siiimple'),
					"id" => "tracking_header",
					"std" => "",
					"type" => "textarea");
					
					
$of_options[] = array( "name" => __('Tracking Code (Footer)', 'siiimple'),
					"desc" => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'siiimple'),
					"id" => "tracking_footer",
					"std" => "",
					"type" => "textarea");
					
$of_options[] = array( "name" => __('Email Address for Contact Form', 'siiimple'),
					"desc" => __('Paste your email address here.', 'siiimple'),
					"id" => "email",
					"std" => "",
					"type" => "text");
										
					
///////////////////////////////////////////////////////////////////////////////STYLING					

$of_options[] = array( "name" => __('Styling', 'siiimple'),
					"type" => "heading");
				
$of_options[] = array( "name" => __("Overlay Image",'siiimple'),
					"desc" => __('Select a background pattern. <span style="color:#de5e2d">You can add your own overlay images into your framework/images/bg in the theme folder.</span>  This image is a small dot or line that overlays atop the general background images on pages.  If you do not want any overlay, there is an option (which is almost invisible), as the first option in the 4th row - just hover over that area and you can select it.'),
					"id" => "custom_line",
					"std" => $bg_images_url."bg0.png",
					"type" => "tiles",
					"options" => $bg_images, );

$of_options[] = array( "name" => __('General Accent Color', 'siiimple'),
					"desc" => __('You can set a general accent colors, hover, links, etc.', 'siiimple'),
					"id" => "accent_color",
					"std" => "#dc5d5d",
					"type" => "color");

					
$of_options[] = array( "name" => __('Page Icons Color', 'siiimple'),
					"desc" => __('You can set the color for your icons that are used within the pages.  This does not apply to the icons in the menu area.', 'siiimple'),
					"id" => "page_icons_color",
					"std" => "#444444",
					"type" => "color"); 
					
	$of_options[] = array( "name" => __('Page Icons Size', 'siiimple'),
					"desc" => __('You can change the size of the actual icons here that are located within the pages.  This does not apply for the icons in the menu.  Example: 14px', 'siiimple'),
					"id" => "page_icons_size",
					"std" => "",
					"type" => "text");	

$of_options[] = array( "name" => __('Custom CSS', 'siiimple'),
                    "desc" => __('Quickly add some CSS to your theme by adding it to this block.', 'siiimple'),
                    "id" => "custom_css",
                    "std" => "",
                    "type" => "textarea"); 


///////////////////////////////////////////////////////////////////////////////FONT STYLING

$of_options[] = array( "name" => __('Typography', 'siiimple'),
					"type" => "heading");
					
$of_options[] = array( "name" => __('Google Fonts (Header)', 'siiimple'),
					"desc" => __('Choose your main header font.  This will change for h1,h2,h3,h4,h5,h6 styles.  The default version is PT Sans Narrow.', 'siiimple'),
					"id" => "google_fonts_header",
					"std" => "PT Sans Narrow",
					"type" => "select",
					"options" => $google_fonts );
					
$of_options[] = array( "name" => __('Google Fonts Weight (Header)', 'siiimple'),
					"desc" => __('Choose your main header font weight.  300= Light.  400 = Normal.  700 = Bold.  Make sure whatever weight you choose that it is available for that font.  The best way to do that is to check the documentation under Typography section.', 'siiimple'),
					"id" => "google_fonts_header_weight",
					"std" => "",
					"type" => "select",
					"options" => $google_fonts_weight );
					
$of_options[] = array( "name" => __('Google Fonts (Paragraph)', 'siiimple'),
					"desc" => __('Choose your main header font.  This will change for "p", "body", or paragraph styles.  The default version is HelveticaNeue-Light.', 'siiimple'),
					"id" => "google_fonts_paragraph",
					"std" => "HelveticaNeue-Light",
					"type" => "select",
					"options" => $google_fonts );
					
$of_options[] = array( "name" => __('Google Fonts Weight (Paragraph)', 'siiimple'),
					"desc" => __('Choose your main header font weight.  300= Light.  400 = Normal.  700 = Bold.  Make sure whatever weight you choose that it is available for that font.  The best way to do that is to check the documentation under Typography section.', 'siiimple'),
					"id" => "google_fonts_paragraph_weight",
					"std" => "",
					"type" => "select",
					"options" => $google_fonts_weight );
                    
                    
///////////////////////////////////////////////////////////////////////////////STYLING					

$of_options[] = array( "name" => __('Menu Styling', 'siiimple'),
					"type" => "heading");
					
$of_options[] = array( "name" => "Menu Styling",
						"desc" => "",
						"id" => "menu-options",
						"std" => "<h3 style=\"margin: 0 0 10px;\">".__('Menu Styling','siiimple')."</h3>
						".__('', 'siiimple')."In this section, you can change the appearance of your menu.  Every style option is available to change your menu to suit your needs.",
						"icon" => true,
						"type" => "info");
                    
                   			
$of_options[] = array( "name" => __('Menu Text Color', 'siiimple'),
					"desc" => __('Change the color of the header text.', 'siiimple'),
					"id" => "header_text_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __('Menu Background Color', 'siiimple'),
					"desc" => __('Change the color of the header.', 'siiimple'),
					"id" => "header_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __('Menu General Border Color', 'siiimple'),
					"desc" => __('Change the color of the border around the entire menu.', 'siiimple'),
					"id" => "header_border",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __('Menu Item Border Color', 'siiimple'),
					"desc" => __('Change the color of the border between menu items.', 'siiimple'),
					"id" => "menu_border",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __('Menu Icons Color', 'siiimple'),
					"desc" => __('You can set the color for your icons that are used for the menu.', 'siiimple'),
					"id" => "menu_icons_color",
					"std" => "#ffffff",
					"type" => "color");								
					
					
///////////////////////////////////////////////////////////////////////////////BLOG
					
$of_options[] = array( "name" => __('Blog Options', 'siiimple'),
					"type" => "heading");
					
$of_options[] = array( "name" => "Blog Options",
						"desc" => "",
						"id" => "blog-options",
						"std" => "<h3 style=\"margin: 0 0 10px;\">".__('Blog Options','siiimple')."</h3>
						".__('', 'siiimple')."In this section, you can change the text under the title of your blog page (the title is the actual title of the page when you created it), the number of blog items you wish to show by going to Settings > Reading > Blog pages show at most.  Change the number to your preferred amount.",
						"icon" => true,
						"type" => "info");
					
$of_options[] = array( "name" => __('Blog Intro Text', 'siiimple'),
                    "desc" => __('Add text to introduce this section.', 'siiimple'),
                    "id" => "tagline_blog",
                    "std" => "",
                    "type" => "textarea");
                    
$of_options[] = array( "name" => __('Blog Header Color', 'siiimple'),
					"desc" => __('Change color of top header text.  For example, on a light background, use a darker text color.  For a darker background, use a lighter text color.  To revert back to the original, simply leave blank.', 'siiimple'),
					"id" => "blog_header_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __('Header Sub Text Color', 'siiimple'),
					"desc" => __('Change the color of the sub-text.  To revert back to the original, simply leave blank.', 'siiimple'),
					"id" => "blog_sub_header_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __('Header Sub Border Color', 'siiimple'),
					"desc" => __('Change color of 1px border at top and bottom of the sub text.  This allows better control of your presentation, depending on the specific background image you wish to display.  To revert back to the original, simply leave blank.', 'siiimple'),
					"id" => "blog_sub_header_border_color",
					"std" => "",
					"type" => "color");
					
///////////////////////////////////////////////////////////////////////////////PORTFOLIO

$of_options[] = array( "name" => __('Portfolio', 'siiimple'),
					"type" => "heading");  
					
$of_options[] = array( "name" => "Portfolio Options",
						"desc" => "",
						"id" => "portfolio-options",
						"std" => "<h3 style=\"margin: 0 0 10px;\">".__('Portfolio Options','siiimple')."</h3>
						".__('', 'siiimple')."In this section, you can change the text under the title of your portfolio page (the title is the actual title of the page when you created it), the number of portfolio items you wish to show, the color of the header, text, and border that is above and below the text.",
						"icon" => true,
						"type" => "info");
					
$of_options[] = array( "name" => __('Portfolio Text', 'siiimple'),
                    "desc" => __('Add text to introduce this section.  Leave blank if you do not want to show.', 'siiimple'),
                    "id" => "tagline_portfolio",
                    "std" => "",
                    "type" => "textarea");
                    
                    
$of_options[] = array( "name" => __('Portfolio Number', 'siiimple'),
                    "desc" => __('How many portfolio posts do you wish to show?', 'siiimple'),
                    "id" => "portfolio_num",
                    "std" => "6",
                    "type" => "text");
                    
$of_options[] = array( "name" => __('Header Color', 'siiimple'),
					"desc" => __('Change color of top header text.  For example, on a light background, use a darker text color.  For a darker background, use a lighter text color.  To revert back to the original, simply leave blank.', 'siiimple'),
					"id" => "portfolio_header_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __('Header Sub Text Color', 'siiimple'),
					"desc" => __('Change the color of the sub-text.  To revert back to the original, simply leave blank.', 'siiimple'),
					"id" => "portfolio_sub_header_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __('Header Sub Border Color', 'siiimple'),
					"desc" => __('Change color of 1px border at top and bottom of the sub text.  This allows better control of your presentation, depending on the specific background image you wish to display.  To revert back to the original, simply leave blank.', 'siiimple'),
					"id" => "portfolio_sub_header_border_color",
					"std" => "",
					"type" => "color");
					
///////////////////////////////////////////////////////////////////////// CUSTOM POSTS 

  
                    
$of_options[] = array( "name" => __('Custom Posts', 'siiimple'),
					"type" => "heading");
					
$of_options[] = array( "name" => "Custom Post Types",
						"desc" => "",
						"id" => "custom_post_types",
						"std" => "<h3 style=\"margin: 0 0 10px;\">".__('Custom Post Types','siiimple')."</h3>
						".__('', 'simple')."Here you can change the name and slug of the custom post types - Testimonials, Gallery, Portfolio, Panorama.  This can be helpful if you prefer to customize these items.  After you change the name or slug, be sure to refresh you permalinks by going to Settings > Permalinks > and Save Changes.",
						"icon" => true,
						"type" => "info");
						
$of_options[] = array( "name" => __('Portfolio Post Type Name', 'siiimple'),
                    "desc" => __('This will change the name of your Portfolio post type in the admin area.', 'siiimple'),
                    "id" => "portfolio_post_type_name",
                    "std" => "",
                    "type" => "text");
					
$of_options[] = array( "name" => __('Portfolio Post Type Slug', 'siiimple'),
                    "desc" => __('When you change the slug of a post type, be sure to refresh the permalink settings.  Go to Settings > Permalinks and simply hit Save Changes.  That will refresh your slug.', 'siiimple'),
                    "id" => "portfolio_post_type_slug",
                    "std" => "",
                    "type" => "text");
                    
$of_options[] = array( "name" => __('Gallery Post Type Name', 'siiimple'),
                    "desc" => __('This will change the name of your Testimonials post type in the admin area.', 'siiimple'),
                    "id" => "gallery_post_type_name",
                    "std" => "",
                    "type" => "text");
					

$of_options[] = array( "name" => __('Gallery Post Type Slug', 'siiimple'),
                    "desc" => __('When you change the slug of a post type, be sure to refresh the permalink settings.  Go to Settings > Permalinks and simply hit Save Changes.  That will refresh your slug. ', 'siiimple'),
                    "id" => "gallery_post_type_slug",
                    "std" => "",
                   
                    "type" => "text");
					
$of_options[] = array( "name" => __('Panorama Post Type Name', 'siiimple'),
                    "desc" => __('This will change the name of your Panorama post type in the admin area.', 'siiimple'),
                    "id" => "panorama_post_type_name",
                    "std" => "",
                    "type" => "text");
					
$of_options[] = array( "name" => __('Panorama Post Type Slug', 'siiimple'),
                    "desc" => __('When you change the slug of a post type, be sure to refresh the permalink settings.  Go to Settings > Permalinks and simply hit Save Changes.  That will refresh your slug.', 'siiimple'),
                    "id" => "panorama_post_type_slug",
                    "std" => "",
                    "type" => "text");
                    
$of_options[] = array( "name" => __('Testimonials Post Type Name', 'siiimple'),
                    "desc" => __('This will change the name of your Testimonials post type in the admin area.', 'siiimple'),
                    "id" => "testimonials_post_type_name",
                    "std" => "",
                    "type" => "text");
					
$of_options[] = array( "name" => __('Testimonials Post Type Slug', 'siiimple'),
                    "desc" => __('When you change the slug of a post type, be sure to refresh the permalink settings.  Go to Settings > Permalinks and simply hit Save Changes.  That will refresh your slug.', 'siiimple'),
                    "id" => "testimonials_post_type_slug",
                    "std" => "",
                    "type" => "text");
                    
					
///////////////////////////////////////////////////////////////////////// 360 TEMPLATE   
                    
$of_options[] = array( "name" => __('Template 360', 'siiimple'),
					"type" => "heading");
					
					
$of_options[] = array( "name" => __('Enable or Disable Thumbnails', 'siiimple'),
					"desc" => __('Enable/Disable thumbnails.  If you only have one panoramic image and have no need for the gallery of images, then simply disable the thumbnails.', 'siiimple'),
					"id" => "disable_thumbnails",
					"std" => "enable",
					"type" => "select",
					"options" => $enable_disable);
					
                    
					
$of_options[] = array( "name" => __('Enable or Disable Social Media Icons', 'siiimple'),
					"desc" => __('Enable/Disable social media on bottom of template.', 'siiimple'),
					"id" => "disable_icons",
					"std" => "enable",
					"type" => "select",
					"options" => $enable_disable);	
					
$of_options[] = array( "name" => __('Enable or Disable auto play', 'siiimple'),
					"desc" => __('Enable/Disable controls', 'siiimple'),
					"id" => "disable_auto",
					"std" => "enable",
					"type" => "select",
					"options" => $enable_disable);				


///////////////////////////////////////////////////////////////////////// HOME BLOG TEMPLATE   
                    
$of_options[] = array( "name" => __('Template Home Blog', 'siiimple'),
					"type" => "heading");
					
$of_options[] = array( "name" => __('Home Blog Tagline', 'siiimple'),
                    "desc" => __('Introduce your home page with some text.', 'siiimple'),
                    "id" => "home_tagline_blog",
                    "std" => "",
                    "type" => "textarea");
                    
$of_options[] = array( "name" => __('Home Blog Slider', 'siiimple'),
					"desc" => __('Here you can choose which area you wish to pull your main slider from.', 'siiimple'),
					"id" => "home_slider",
					"std" => "blank",
					"type" => "select",
					"options" => $blog_home);
					
$of_options[] = array( "name" => __('Blog Header Color', 'siiimple'),
					"desc" => __('Change color of top header text.  For example, on a light background, use a darker text color.  For a darker background, use a lighter text color.  To revert back to the original, simply leave blank.', 'siiimple'),
					"id" => "blog_home_color",
					"std" => "",
					"type" => "color");
					
///////////////////////////////////////////////////////////////////////// HOME GALLERY   
                    
$of_options[] = array( "name" => __('Static Gallery', 'siiimple'),
					"type" => "heading");
					
$of_options[] = array( "name" => __('Static Gallery', 'siiimple'),
					"desc" => __('Here you can choose which area you wish to pull your images from with this template.', 'siiimple'),
					"id" => "home_gallery",
					"std" => "blank",
					"type" => "select",
					"options" => $gallery_home);
                    
///////////////////////////////////////////////////////////////////////////////VIEWER

$of_options[] = array( "name" => __('Image Viewer', 'siiimple'),
					"type" => "heading");  
					
$of_options[] = array( "name" => __('Image Viewer Text', 'siiimple'),
                    "desc" => __('Add text to introduce this section.  Leave blank if you do not want to show.', 'siiimple'),
                    "id" => "tagline_viewer",
                    "std" => "",
                    "type" => "textarea");
                    

$of_options[] = array( "name" => __('Images Source?', 'siiimple'),
                    "desc" => __('Choose where you want to pull the images from.', 'siiimple'),
                    "id" => "viewer-cpt",
                    "std" => "",
                    "type" => "select",
					"options" => $gallery_home);
                    
   
$of_options[] = array( "name" => __('Header Color', 'siiimple'),
					"desc" => __('Change color of top header text.  For example, on a light background, use a darker text color.  For a darker background, use a lighter text color.  To revert back to the original, simply leave blank.', 'siiimple'),
					"id" => "viewer_header_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __('Header Sub Text Color', 'siiimple'),
					"desc" => __('Change the color of the sub-text.  To revert back to the original, simply leave blank.', 'siiimple'),
					"id" => "viewer_sub_header_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __('Header Sub Border Color', 'siiimple'),
					"desc" => __('Change color of 1px border at top and bottom of the sub text.  This allows better control of your presentation, depending on the specific background image you wish to display.  To revert back to the original, simply leave blank.', 'siiimple'),
					"id" => "viewer_sub_header_border_color",
					"std" => "",
					"type" => "color");
					                    
                    
///////////////////////////////////////////////////////////////////////// TESTIMONIALS

$of_options[] = array( "name" => __('Testimonials', 'siiimple'),
					"type" => "heading");
					
$of_options[] = array( "name" => __('Testimonial Text', 'siiimple'),
                    "desc" => __('Add text to introduce this section.  Leave blank if you do not want to show.', 'siiimple'),
                    "id" => "tagline_testimonial",
                    "std" => "",
                    "type" => "textarea");
					
					
$of_options[] = array( "name" => __('Testimonial Number', 'siiimple'),
                    "desc" => __('How many portfolio posts do you wish to show?', 'siiimple'),
                    "id" => "testimonial_num",
                    "std" => "6",
                    "type" => "text");
                    

$of_options[] = array( "name" => __('Header Color', 'siiimple'),
					"desc" => __('Change color of top header text.  For example, on a light background, use a darker text color.  For a darker background, use a lighter text color.  To revert back to the original, simply leave blank.', 'siiimple'),
					"id" => "testimonial_header_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __('Header Sub Text Color', 'siiimple'),
					"desc" => __('Change the color of the sub-text.  To revert back to the original, simply leave blank.', 'siiimple'),
					"id" => "testimonial_sub_header_color",
					"std" => "",
					"type" => "color");
					
$of_options[] = array( "name" => __('Header Sub Border Color', 'siiimple'),
					"desc" => __('Change color of 1px border at top and bottom of the sub text.  This allows better control of your presentation, depending on the specific background image you wish to display.  To revert back to the original, simply leave blank.', 'siiimple'),
					"id" => "testimonial_sub_header_border_color",
					"std" => "",
					"type" => "color");
                    
                    
///////////////////////////////////////////////////////////////////////////////COMMENTS

$of_options[] = array( "name" => __('Comments', 'siiimple'),
					"type" => "heading"); 
					
					
$of_options[] = array( "name" => __('Facebook App ID', 'siiimple'),
                    "desc" => __('Add your Facebook App ID here in order to properly show Facebook Comments on posts.', 'siiimple'),
                    "id" => "comments_facebook",
                    "std" => "331292046960040",
                    "type" => "text");		

/////////////////////////////////////////////////////////////////////////ARCHIVES
                    
$of_options[] = array( "name" => __('Archives', 'siiimple'),
					"type" => "heading");
				
$of_options[] = array( "name" => __('Archives Background', 'siiimple'),
					"desc" => __('Upload a custom background to your archives page.', 'siiimple'),
					"id" => "archives_bg",
					"std" => "",
					"type" => "media");
                              			                  			
                    
/////////////////////////////////////////////////////////////////////////SOCIAL

$of_options[] = array( "name" => __('Social', 'siiimple'),
					"type" => "heading");
					
$of_options[] = array( "name" => __('Twitter', 'siiimple'),
                    "desc" => __('Add your twitter url.', 'siiimple'),
                    "id" => "twitter",
                    "std" => "http://twitter.com/#!/siiimple",
                    "type" => "text");
					
$of_options[] = array( "name" => __('Dribbble', 'siiimple'),
                    "desc" => __('Add your dribbble url.', 'siiimple'),
                    "id" => "dribbble",
                    "std" => "http://dribbble.com/siiimple",
                    "type" => "text");

$of_options[] = array( "name" => __('Forrst', 'siiimple'),
                    "desc" => __('Add your forrst url.', 'siiimple'),
                    "id" => "forrst",
                    "std" => "https://forrst.com/people/justinmyoung",
                    "type" => "text");

$of_options[] = array( "name" => __('Flickr', 'siiimple'),
                    "desc" => __('Add your flickr url.', 'siiimple'),
                    "id" => "flickr",
                    "std" => "http://www.flickr.com/photos/44952670@N02/",
                    "type" => "text");

$of_options[] = array( "name" => __('Facebook', 'siiimple'),
                    "desc" => __('Add your facebook url.', 'siiimple'),
                    "id" => "facebook",
                    "std" => "https://www.facebook.com/pages/Siiimple/174221319304233",
                    "type" => "text");
					
$of_options[] = array( "name" => __('LinkedIn', 'siiimple'),
                    "desc" => __('Add your LinkedIn url.', 'siiimple'),
                    "id" => "linkedin",
                    "std" => "http://www.linkedin.com/profile/view?id=50194115&trk=tab_pro",
                    "type" => "text");
					
$of_options[] = array( "name" => __('Google Plus', 'siiimple'),
                    "desc" => __('Add your Google Plus url.', 'siiimple'),
                    "id" => "googleplus",
                    "std" => "https://plus.google.com/u/0/114809642194441829471/posts",
                    "type" => "text");
					
$of_options[] = array( "name" => __('Google', 'siiimple'),
                    "desc" => __('Add your Google url.', 'siiimple'),
                    "id" => "google",
                    "std" => "#",
                    "type" => "text");
					
$of_options[] = array( "name" => __('Youtube', 'siiimple'),
                    "desc" => __('Add your youtube url.', 'siiimple'),
                    "id" => "youtube",
                    "std" => "#",
                    "type" => "text");

$of_options[] = array( "name" => __('Vimeo', 'siiimple'),
                    "desc" => __('Add your vimeo url.', 'siiimple'),
                    "id" => "vimeo",
                    "std" => "http://vimeo.com/user7001558",
                    "type" => "text");

$of_options[] = array( "name" => __('RSS', 'siiimple'),
                    "desc" => __('Add your rss url.', 'siiimple'),
                    "id" => "rss",
                    "std" => "#",
                    "type" => "text");	
                    
$of_options[] = array( "name" => __('Rdio', 'siiimple'),
                    "desc" => __('Add your Rdio url.', 'siiimple'),
                    "id" => "rdio",
                    "std" => "http://www.rdio.com/#/people/siiimple/",
                    "type" => "text");
                    
$of_options[] = array( "name" => __('Skype', 'siiimple'),
                    "desc" => __('Add your Skype url.', 'siiimple'),
                    "id" => "skype",
                    "std" => "#",
                    "type" => "text");
                    
$of_options[] = array( "name" => __('Stumbleupon', 'siiimple'),
                    "desc" => __('Add your Stumbleupon url.', 'siiimple'),
                    "id" => "stumbleupon",
                    "std" => "#",
                    "type" => "text");
                    
$of_options[] = array( "name" => __('WordPress', 'siiimple'),
                    "desc" => __('Add your WordPress url.', 'siiimple'),
                    "id" => "wordpress",
                    "std" => "#",
                    "type" => "text");
				
					
$of_options[] = array( "name" => __('Mail', 'siiimple'),
                    "desc" => __('Add your mail/contact url.', 'siiimple'),
                    "id" => "mail",
                    "std" => "#",
                    "type" => "text");
                    
/////////////////////////////////////////////////////////////////////////SEO
                   
$of_options[] = array( "name" => __('SEO', 'siiimple'),
					"type" => "heading");
					
$of_options[] = array( "name" => __('Apple Touch Icon 57x57', 'siiimple'),
					"desc" => __('Upload or past the URL for your Apple Touch Icon.  There are three sizes to upload.  This size should be 57x57 of your logo.  This will help SEO value.  <span style="color:red">*Important:  The name of this image should be "apple-touch-icon.png"</span>', 'siiimple'),
					"id" => "custom_apple_touch_icon_1",
					"std" => "",
					"type" => "upload");
					
$of_options[] = array( "name" => __('Apple Touch Icon 72x72', 'siiimple'),
					"desc" => __('Upload or past the URL for your Apple Touch Icon.  There are three sizes to upload.  This size should be 72x72 of your logo.  This will help SEO value.  <span style="color:red">*Important:  The name of this image should be "apple-touch-icon-72x72.png"</span>', 'siiimple'),
					"id" => "custom_apple_touch_icon_2",
					"std" => "",
					"type" => "upload");
					 
$of_options[] = array( "name" => __('Apple Touch Icon 114x114', 'siiimple'),
					"desc" => __('Upload or past the URL for your Apple Touch Icon.  There are three sizes to upload.  This size should be 114x114 of your logo.  This will help SEO value.  <span style="color:red">*Important:  The name of this image should be "apple-touch-icon-114x114.png"</span>', 'siiimple'),
					"id" => "custom_apple_touch_icon_3",
					"std" => "",
					"type" => "upload");
					
$of_options[] = array( "name" => __('Meta Description', 'siiimple'),
                    "desc" => __('Add a meta description.  This will appear in your header for better SEO value.  Be carefully descriptive.', 'siiimple'),
                    "id" => "meta-desc",
                    "std" => "",
                    "type" => "textarea");
                    
$of_options[] = array( "name" => __('Meta Keywords', 'siiimple'),
                    "desc" => __('Add a meta keywords.  This will appear in your header for better SEO value.  Provide a list of keywords that will allow your site to attract better SEO value.', 'siiimple'),
                    "id" => "meta-key",
                    "std" => "Business, Theme, ThemeForest, Minimalist, Minimal, Premium Business, Corporate, Clean",
                    "type" => "textarea");
                    
/////////////////////////////////////////////////////////////////////////404
					
$of_options[] = array( "name" => __('Error Page', 'siiimple'),
					"type" => "heading");
                    
$of_options[] = array( "name" => __('Add an Image', 'siiimple'),
					"desc" => __('Upload your image.', 'siiimple'),
					"id" => "error_bg",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => __('404 Header', 'siiimple'),
                    "desc" => __('Add some custom 404 header.', 'siiimple'),
                    "id" => "404_header",
                    "std" => "Looking for something?",
                    "type" => "text");
					
$of_options[] = array( "name" => __('404 Text', 'siiimple'),
                    "desc" => __('Add some custom 404 text.', 'siiimple'),
                    "id" => "404_text",
                    "std" => "Unfortunately, what you are looking for doesn't seem to exist any more.",
                    "type" => "textarea");

/////////////////////////////////////////////////////////////////////////COUNTDOWN
					
$of_options[] = array( "name" => __('Under Construction', 'siiimple'),
					"type" => "heading");                    
					
$of_options[] = array( "name" => __('503 Header', 'siiimple'),
                    "desc" => __('Add some custom 503 header.', 'siiimple'),
                    "id" => "503_header",
                    "std" => "",
                    "type" => "text");
					
$of_options[] = array( "name" => __('503 Text', 'siiimple'),
                    "desc" => __('Add some custom 503 text.', 'siiimple'),
                    "id" => "503_text",
                    "std" => "",
                    "type" => "textarea");
                    
$of_options[] = array( "name" => __('503 Year', 'siiimple'),
                    "desc" => __('Add the year of the timer. Use numbers.  Example: 2012', 'siiimple'),
                    "id" => "503_year",
                    "std" => "",
                    "type" => "text");
                    
$of_options[] = array( "name" => __('503 Month', 'siiimple'),
                    "desc" => __('Add the month of the timer. Use numbers.  Example: July = 7', 'siiimple'),
                    "id" => "503_month",
                    "std" => "",
                    "type" => "text");
                    
$of_options[] = array( "name" => __('503 Day', 'siiimple'),
                    "desc" => __('Add the day of the timer.  Use numbers.  Example: 4', 'siiimple'),
                    "id" => "503_day",
                    "std" => "",
                    "type" => "text");
                   
					
/////////////////////////////////////////////////////////////////////////FOOTER
					
$of_options[] = array( "name" => __('Footer', 'siiimple'),
					"type" => "heading");
					

$of_options[] = array( "name" => __('Enable or Disable Footer Slider', 'siiimple'),
					"desc" => __('Select to enable/disable the slider atop the Footer area.', 'siiimple'),
					"id" => "disable_footer_slider",
					"std" => "enable",
					"type" => "select",
					"options" => $enable_disable);
					
$of_options[] = array( "name" => __('Footer Slider Source?', 'siiimple'),
					"desc" => __('Here you can choose which area you wish to pull your footer slider from.', 'siiimple'),
					"id" => "slide_source",
					"std" => "portfolio",
					"type" => "select",
					"options" => $gallery_home);
					

					
					
$of_options[] = array( "name" => __('Footer Text', 'siiimple'),
                    "desc" => __('Add your own custom text/html for footer text (bottom left)', 'siiimple'),
                    "id" => "footer_text",
                    "std" => "Some Text Here. &copy; Theme 360",
                    "type" => "textarea");
                    
                    
/////////////////////////////////////////////////////////////////////////BACKUP OPTIONS

$of_options[] = array( "name" => "Backup Options",
					"type" => "heading");
					
$of_options[] = array( "name" => __("Backup and Restore Options", 'siiimple'),
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.', 'siiimple'),
					);
					
$of_options[] = array( "name" => __("Transfer Theme Options Data", 'siiimple'),
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => __('You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".', 'siiimple'),
					);
					
	}
}
?>
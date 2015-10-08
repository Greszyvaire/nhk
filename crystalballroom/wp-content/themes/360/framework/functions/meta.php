<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'siiimple_';

global $meta_boxes;

$meta_boxes = array();

// COLOR WHEEL PAGE
$meta_boxes[] = array(
	'id'		=> 'page-color',
	'title'		=> 'Background Color For Page',
	'pages'		=> array( 'page' ),

	'fields'	=> array(
		// COLOR
		array(
			'name'		=> __('Your favorite color','siiimple'),
			'desc' 		=> __('If you would prefer to select a custom background that is NOT an image, NOT the default background (which is the dark wood you see in the demo), or a Parallax option, then you can choose a specific color here.','siiimple'),
			'id'		=> $prefix.'page_color',
			'std' => '',
			'type'		=> 'color'
		)
	)
);

// SINGLE LAYOUT
$meta_boxes[] = array(
	'id' => 'singlebg',
	'title' => __('Background for Post','siiimple'),
	'pages' => array('post'),

	'fields' => array(
	array(
            'name' => __('Background for Post','siiimple'),
            'desc' => __('','siiimple'),
            'id' => $prefix.'post_bg',
			'type' => 'radio',
			'options' => array(
				'p0' => 'Default',
				'p1' => 'Parallax Stars',
				'p2' => 'Parallax Circles',
				'p3' => 'Featured Image',
				'p4' => 'Color from Color Wheel (Be sure to select your color from color wheel after choosing this option)',
				
			),
			'multiple' => false,
			'std' => 'None'
        ),
	)
);

// SINGLE COLOR WHEEL PAGE
$meta_boxes[] = array(
	'id'		=> 'single-post-color',
	'title'		=> 'Background Color For Single Post',
	'pages'		=> array( 'post' ),

	'fields'	=> array(
		// COLOR
		array(
			'name'		=> __('Your favorite background color for this post.','siiimple'),
			'desc' 		=> __('If you would prefer to select a custom background that is NOT the Featured Image, NOT the default background (which is the dark wood you see in the demo), or a Parallax option, then you can choose a specific color here.  <span style="color:red">IMPORTANT:  Be sure to remove the "#" when choosing a different background option, such as Parallax background.  If you use the Featured Image, no need to remove "#".</span>','siiimple'),
			'id'		=> $prefix . 'single_post_color',
			'std' => '',
			'type'		=> 'color'
		)
	)
);

// SINGLE LAYOUT
$meta_boxes[] = array(
	'id' => 'para',
	'title' => __('Parallax','siiimple'),
	'pages' => array('page'),
	
	'fields' => array(
	array(
            'name' => __('Parallax','siiimple'),
            'desc' => __('Be sure to remove the "#" in the background color option or the parallax will not show.  Parallax will also not work if you are using a Featured Image as your background.','siiimple'),
            'id' => $prefix . 'parallax',
			'type' => 'radio',
			'options' => array(
				'p0' => 'None',
				'p1' => 'Stars',
				'p2' => 'Circles',
				
				
			),
			'multiple' => false,
			'std' => 'None'
        ),
	)
);

// SINGLE LAYOUT
$meta_boxes[] = array(
	'id' => 'single_meta',
	'title' => __('Sidebar Options','siiimple'),
	'pages' => array('page','post','portfolio'),

	'fields' => array(
	array(
            'name' => __('Sidebar Options','siiimple'),
            'desc' => __('Select to show a sidebar.  Be aware that Portfolio Templates do not have sidebars.  Sidebars can be added to Pages & Template Blog.  You can choose what to place within each sidebar by going to Appearance > Widgets > and then dragging and dropping the widgets into the sidebar areas. ','siiimple'),
            'id' => $prefix . 'single_meta',
			'type' => 'radio',
			'options' => array(
				'right-sidebar' => 'Right Sidebar',
				'left-sidebar' => 'Left Sidebar',
				'left-right-sidebar' => 'Left & Right Sidebars',
				'full-width' => 'Full Width / No Sidebar',
				
			),
			'multiple' => false,
			'std' => 'right-sidebar'
        ),
	)
);

// POST COMMENTS
$meta_boxes[] = array(
	'id' => 'comments',
	'title' => __('Comment System','siiimple'),
	'pages' => array('post'),

	'fields' => array(
	array(
            'name' => __('Comment System','siiimple'),
            'desc' => __('You can choose between WordPress or Facebook comment system.  For Facebook, be sure to fill out your App ID, which is found once you create your Facebook Comment App.  See more instructions in the Theme Options area, under Comment System','siiimple'),
            'id' => $prefix . 'comments',
			'type' => 'radio',
			'options' => array(
				'wordpress' => 'WordPress',
				'facebook' => 'Facebook',
				
				
			),
			'multiple' => false,
			'std' => 'wordpress'
        ),
	)
);

//PAGE OPTIONS
$meta_boxes[] = array(
	'id' => 'page_options',
	'title' => __('Page Options','siiimple'),
	'pages' => array('page'),

	'fields' => array(
	array(
            'name' => __('Page Options','siiimple'),
            'desc' => __('Here you can add particular features to each page, like you would for posts (post formats).  Once you select this option, be sure to fill out the details in the corresponding meta box below.  For Video, simply fill in a video embed source url; for audio, fill in the path to where your audio file is stored.  For gallery, use the Featured Image uploader on the right and drag and drop all your images into that box - all the images will be stored in your gallery and appear atop this page.','siiimple'),
            'id' => $prefix . 'page_options',
			'type' => 'radio',
			'options' => array(
				'none' => 'Normal Page',
				'audio' => 'Audio',
				'video' => 'Video',
				'gallery' => 'Gallery',
				
			),
			'multiple' => false,
			'std' => 'none'
        ),
	)
);

// AUDIO
$meta_boxes[] = array(
	'id' => 'meta-box-audio',
	'title' =>  __('Audio URL', 'siiimple'),
	'pages' => array('post','portfolio','page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('MP3 File URL','siiimple'),
				"desc" => __('The URL to the .mp3 audio file.  <br/><br/>Example:  http://www.themes.siiimple.com/blues.mp3','siiimple'),
				"id" => $prefix."audio_mp3",
				"type" => "text"
			),
		array( "name" => __('OGA File URL','siiimple'),
				"desc" => __('The URL to the .oga, .ogg audio file.  <br/><br/>Example:  http://www.themes.siiimple.com/blues.ogg','siiimple'),
				"id" => $prefix."audio_ogg",
				"type" => "text"
			)
	),
	
);

// LINK TO PAGE
$meta_boxes[] = array(
	'id' => 'link-to-page',
	'title' =>  __('Link to Page', 'siiimple'),
	'pages' => array('portfolio','gallery'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Link to Page','siiimple'),
				"desc" => __('Add a link to your post entry.','siiimple'),
				"id" => $prefix."link_page",
				"type" => "text"
			)
	),
	
);


//SOCIAL MEDIA OPTION
$meta_boxes[] = array(
	'id' => 'social-media',
	'title' => __('Social Media Bar','siiimple'),
	'pages' => array('page','post'),

	'fields' => array(
	array(
            'name' => __('Social Media Options','siiimple'),
            'desc' => __('Be sure to fill out the social icon details/url/etc. in the Theme Options area.  Leaving information empty will exclude that icon in the media bar.','siiimple'),
            'id' => $prefix . 'social_media',
			'type' => 'radio',
			'options' => array(
				'light' => 'Light',
				'dark' => 'Dark',
				'none' => 'No Social Media',
			),
			'multiple' => false,
			'std' => 'none'
        ),
	)
);

//VIDEO
$meta_boxes[] = array(
	'id' => 'video',
	'title' => __('Show Video','siiimple'),
	'pages' => array('page','portfolio','post'),

	'fields' => array(
		
		array(
            'name' => __('Video','siiimple'),
            'desc' => __('For Blog Posts, make sure Video post format is chosen; for Pages make sure Video is selected in the Page Options above.  Be sure to use the url of the EMBED SRC URL - not the url to the video itself. <br/><br/> Example:  http://player.vimeo.com/video/41462515?title=0&amp;portrait=0&amp;color=bd0000','siiimple'),
            'id' => $prefix . 'video',
            'type' => 'text',
            'std' => ''
        ),
	)
);

//TEMPLATE 360
$meta_boxes[] = array(
	'id' => 'template-360',
	'title' => __('Text for Main Image in Panorama Gallery (Template-360.php)','siiimple'),
	'pages' => array('page'),
	'fields' => array(
		
		array(
            'name' => __('Intro Text for 1st Image','siiimple'),
            'desc' => __('This is the intro text.  It is the description beneath the title for the first image.  All other images will use the title/content for new posts in the Panorama custom post type.','siiimple'),
            'id' => $prefix . '360',
            'type' => 'textarea',
            'std' => ''
        ),
     
	)
);

// PAGE LINK OPTION
$meta_boxes[] = array(
	'id' => 'page_link',
	'title' => __('<span style="font-size:12px; font-family:Helvetica Neue; font-weight:bold">Link to Page</span>','siiimple'),
	'pages' => array('slider','marketing'),

	'fields' => array(
		
		array(
            'name' => __('Link to Page','siiimple'),
            'desc' => __('Instead of linking to the post, you can add a link to a specific page.','siiimple'),
            'id' => $prefix . 'page_link',
            'type' => 'text',
            'std' => ''
        ),
	)
);

// PORTFOLIO EXCERPT
$meta_boxes[] = array(
	'id' => 'port_excerpt',
	'title' => __('Portfolio Item Excerpt','siiimple'),
	'pages' => array('portfolio'),

	'fields' => array(
		
		array(
            'name' => __('Portfolio Excerpt','siiimple'),
            'desc' => __('Add a brief excerpt to your portfolio item.  This will appear under the portfolio title.','siiimple'),
            'id' => $prefix . 'port_excerpt',
            'type' => 'text',
            'std' => ''
        ),
	)
);

// HOTSPOTS1
$meta_boxes[] = array(
	'id' => 'hotspots1',
	'title' =>  __('Hotspot #1 (Template 360 Only)', 'framework'),
	'pages' => array('panorama','page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array( "name" => __('Hotspot 1 (Template 360 Only)','siiimple'),
				"desc" => __('Image Coordinates:<br/>Add a hotspot to your image.  To do so, simply paste the coordinates where you want the hotspot to show.  Example:  200, 200.  (1st number is horizontal, second number is vertical.  0,0 = top left corner of the image.','siiimple'),
				"id" => $prefix."hotspot1",
				"type" => "text"
			),
		array( "name" => __('Hotspot 1 Image URL','siiimple'),
				"desc" => __('Image Url:<br/>This is where you add your image url.  If you upload the image to your media gallery, simply copy and paste the url to your image and paste it in here.','siiimple'),
				"id" => $prefix."hotspot_img1",
				"type" => "text"
			),
		array( "name" => __('Hotspot 1 Title','siiimple'),
				"desc" => __('Image Title:<br/>Add a title to your hotspot.  This will appear beneath the image that displays in the fancybox.','siiimple'),
				"id" => $prefix."hotspot_title1",
				"type" => "text"
			)
	),
	
);

// HOTSPOTS2
$meta_boxes[] = array(
	'id' => 'hotspots2',
	'title' =>  __('Hotspots #2 (Template 360 Only)', 'framework'),
	'pages' => array('panorama','page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array( "name" => __('Hotspot #2 (Template 360 Only)','siiimple'),
				"desc" => __('Image Coordinates:<br/>Add a hotspot to your image.  To do so, simply paste the coordinates where you want the hotspot to show.  Example:  200, 200.  (1st number is horizontal, second number is vertical.  0,0 = top left corner of the image.','siiimple'),
				"id" => $prefix."hotspot2",
				"type" => "text"
			),
		array( "name" => __('Hotspot 2 Image URL','siiimple'),
				"desc" => __('Image Url:<br/>This is where you add your image url.  If you upload the image to your media gallery, simply copy and paste the url to your image and paste it in here.','siiimple'),
				"id" => $prefix."hotspot_img2",
				"type" => "text"
			),
		array( "name" => __('Hotspot 2 Title','siiimple'),
				"desc" => __('Image Title:<br/>Add a title to your hotspot.  This will appear beneath the image that displays in the fancybox.','siiimple'),
				"id" => $prefix."hotspot_title2",
				"type" => "text"
			)
	),
);

// HOTSPOTS3
$meta_boxes[] = array(
	'id' => 'hotspots3',
	'title' =>  __('Hotspots #3 (Template 360 Only)', 'framework'),
	'pages' => array('panorama','page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array( "name" => __('Hotspot 3 (Template 360 Only)','siiimple'),
				"desc" => __('Image Coordinates:<br/>Add a hotspot to your image.  To do so, simply paste the coordinates where you want the hotspot to show.  Example:  200, 200.  (1st number is horizontal, second number is vertical.  0,0 = top left corner of the image.','siiimple'),
				"id" => $prefix."hotspot3",
				"type" => "text"
			),
		array( "name" => __('Hotspot 3 Image URL','siiimple'),
				"desc" => __('Image Url:<br/>This is where you add your image url.  If you upload the image to your media gallery, simply copy and paste the url to your image and paste it in here.','siiimple'),
				"id" => $prefix."hotspot_img3",
				"type" => "text"
			),
		array( "name" => __('Hotspot 3 Title','siiimple'),
				"desc" => __('Image Title:<br/>Add a title to your hotspot.  This will appear beneath the image that displays in the fancybox.','siiimple'),
				"id" => $prefix."hotspot_title3",
				"type" => "text"
			)
	),
	
);

// HOTSPOTS4
$meta_boxes[] = array(
	'id' => 'hotspots4',
	'title' =>  __('Hotspots #4 (Template 360 Only)', 'framework'),
	'pages' => array('panorama','page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array( "name" => __('Hotspot 4 (Template 360 Only)','siiimple'),
				"desc" => __('Image Coordinates:<br/>Add a hotspot to your image.  To do so, simply paste the coordinates where you want the hotspot to show.  Example:  200, 200.  (1st number is horizontal, second number is vertical.  0,0 = top left corner of the image.','siiimple'),
				"id" => $prefix."hotspot4",
				"type" => "text"
			),
		array( "name" => __('Hotspot 4 Image URL','siiimple'),
				"desc" => __('Image Url:<br/>This is where you add your image url.  If you upload the image to your media gallery, simply copy and paste the url to your image and paste it in here.','siiimple'),
				"id" => $prefix."hotspot_img4",
				"type" => "text"
			),
		array( "name" => __('Hotspot 4 Title','siiimple'),
				"desc" => __('Image Title:<br/>Add a title to your hotspot.  This will appear beneath the image that displays in the fancybox.','siiimple'),
				"id" => $prefix."hotspot_title4",
				"type" => "text"
			)
	),
	
);

// HOTSPOTS5
$meta_boxes[] = array(
	'id' => 'hotspots5',
	'title' =>  __('Hotspots #5 (Template 360 Only)', 'framework'),
	'pages' => array('panorama','page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array( "name" => __('Hotspot 5 (Template 360 Only)','siiimple'),
				"desc" => __('Image Coordinates:<br/>Add a hotspot to your image.  To do so, simply paste the coordinates where you want the hotspot to show.  Example:  200, 200.  (1st number is horizontal, second number is vertical.  0,0 = top left corner of the image.','siiimple'),
				"id" => $prefix."hotspot5",
				"type" => "text"
			),
		array( "name" => __('Hotspot 5 Image URL','siiimple'),
				"desc" => __('Image Url:<br/>This is where you add your image url.  If you upload the image to your media gallery, simply copy and paste the url to your image and paste it in here.','siiimple'),
				"id" => $prefix."hotspot_img5",
				"type" => "text"
			),
		array( "name" => __('Hotspot 5 Title','siiimple'),
				"desc" => __('Image Title:<br/>Add a title to your hotspot.  This will appear beneath the image that displays in the fancybox.','siiimple'),
				"id" => $prefix."hotspot_title5",
				"type" => "text"
			)
	),
	
);

// HOTSPOT INLINE
$meta_boxes[] = array(
	'id' => 'hotspots6',
	'title' =>  __('Inline Content', 'siiimple'),
	'pages' => array('panorama','page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		array( "name" => __('Hotspot 6','siiimple'),
				"desc" => __('','siiimple'),
				"id" => $prefix."hotspot6",
				"type" => "text"
			),
		

		
		array( "name" => __('Inline Content','siiimple'),
				"desc" => __('','siiimple'),
				"id" => $prefix."hotspot_inline",
				"type" => "textarea"
			)
	),
	
);

// HOTSPOTS5
$meta_boxes[] = array(
	'id' => 'hotspots7',
	'title' =>  __('Hotspots #7 (Template 360 Only)', 'framework'),
	'pages' => array('panorama','page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array( "name" => __('Hotspot 7 (Template 360 Only)','siiimple'),
				"desc" => __('Image Coordinates:<br/>Add a hotspot to your image.  To do so, simply paste the coordinates where you want the hotspot to show.  Example:  200, 200.  (1st number is horizontal, second number is vertical.  0,0 = top left corner of the image.','siiimple'),
				"id" => $prefix."hotspot7",
				"type" => "text"
			),
		array( "name" => __('Hotspot 7 Image URL','siiimple'),
				"desc" => __('Image Url:<br/>This is where you add your image url.  If you upload the image to your media gallery, simply copy and paste the url to your image and paste it in here.','siiimple'),
				"id" => $prefix."hotspot_img7",
				"type" => "text"
			),
		array( "name" => __('Hotspot 7 Title','siiimple'),
				"desc" => __('Image Title:<br/>Add a title to your hotspot.  This will appear beneath the image that displays in the fancybox.','siiimple'),
				"id" => $prefix."hotspot_title7",
				"type" => "text"
			)
	),
	
);

// HOTSPOTS5
$meta_boxes[] = array(
	'id' => 'hotspots8',
	'title' =>  __('Hotspots #8 (Template 360 Only)', 'framework'),
	'pages' => array('panorama','page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array( "name" => __('Hotspot 8 (Template 360 Only)','siiimple'),
				"desc" => __('Image Coordinates:<br/>Add a hotspot to your image.  To do so, simply paste the coordinates where you want the hotspot to show.  Example:  200, 200.  (1st number is horizontal, second number is vertical.  0,0 = top left corner of the image.','siiimple'),
				"id" => $prefix."hotspot8",
				"type" => "text"
			),
		array( "name" => __('Hotspot 8 Image URL','siiimple'),
				"desc" => __('Image Url:<br/>This is where you add your image url.  If you upload the image to your media gallery, simply copy and paste the url to your image and paste it in here.','siiimple'),
				"id" => $prefix."hotspot_img8",
				"type" => "text"
			),
		array( "name" => __('Hotspot 8 Title','siiimple'),
				"desc" => __('Image Title:<br/>Add a title to your hotspot.  This will appear beneath the image that displays in the fancybox.','siiimple'),
				"id" => $prefix."hotspot_title8",
				"type" => "text"
			)
	),
	
);

// HOTSPOTS5
$meta_boxes[] = array(
	'id' => 'hotspots9',
	'title' =>  __('Hotspots #9 (Template 360 Only)', 'framework'),
	'pages' => array('panorama','page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
		array( "name" => __('Hotspot 9 (Template 360 Only)','siiimple'),
				"desc" => __('Image Coordinates:<br/>Add a hotspot to your image.  To do so, simply paste the coordinates where you want the hotspot to show.  Example:  200, 200.  (1st number is horizontal, second number is vertical.  0,0 = top left corner of the image.','siiimple'),
				"id" => $prefix."hotspot9",
				"type" => "text"
			),
		array( "name" => __('Hotspot 9 Image URL','siiimple'),
				"desc" => __('Image Url:<br/>This is where you add your image url.  If you upload the image to your media gallery, simply copy and paste the url to your image and paste it in here.','siiimple'),
				"id" => $prefix."hotspot_img9",
				"type" => "text"
			),
		array( "name" => __('Hotspot 9 Title','siiimple'),
				"desc" => __('Image Title:<br/>Add a title to your hotspot.  This will appear beneath the image that displays in the fancybox.','siiimple'),
				"id" => $prefix."hotspot_title9",
				"type" => "text"
			)
	),
	
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );
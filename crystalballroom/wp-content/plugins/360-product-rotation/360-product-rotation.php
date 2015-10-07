<?php
/**
 * @package 360 Product Rotation
 * @version 1.0.3
 */
/*
Plugin Name: 360&deg; Product Rotation
Plugin URI: http://www.yofla.com/3d-rotate/wordpress-plugin-360-product-rotation/
Description: Plugin for easier integration of the 360 product rotation created by the 3D Rotate Tool Setup Utility.
Author: YoFLA.com
Version: 1.0.5
Last Modified: 05/2014
Author URI: http://www.yofla.com/
License: GPLv2
*/



//define constants
if (!defined('YOFLA_PLAYER_URL')) define('YOFLA_PLAYER_URL', 'http://www.yofla.com/3d-rotate/app/cdn/get/rotatetool.js');
if (!defined('YOFLA_LICENSE_ID_CHECK_URL')) define('YOFLA_LICENSE_ID_CHECK_URL', 'http://www.yofla.com/3d-rotate/app/check/licenseid/');
if (!defined('YOFLA_360_VERSION_KEY')) define('YOFLA_360_VERSION_KEY', 'yofla_360_version');
if (!defined('YOFLA_360_VERSION_NUM')) define('YOFLA_360_VERSION_NUM', '1.0.5');
if (!defined('YOFLA_360_PATH'))  define('YOFLA_360_PATH', plugin_dir_path(__FILE__));
if (!defined('YOFLA_360_URL'))  define('YOFLA_360_URL', plugin_dir_url(__FILE__));

//store plugin version to db
add_option(YOFLA_360_VERSION_KEY, YOFLA_360_VERSION_NUM);

//check if upgrading...
if (get_option(YOFLA_360_VERSION_KEY) != YOFLA_360_VERSION_NUM) {
    // Execute your upgrade logic here
    // Then update the version value
    update_option(YOFLA_360_VERSION_KEY, YOFLA_360_VERSION_NUM);
}

//settings page
if( is_admin() ){
    require YOFLA_360_PATH.'includes/plugin-settings.php';
    new Yofla_360_product_rotation_settings();
}

//define shortcode and callback
add_shortcode('360', 'yofla_360_embed_shortcode');


//for tracking div embeds (iframes run in separate html)
$yofla_360_embed_map = array();

//var to store plugin settings
$yofla_360_settings;

/**
 * Function that processes the shortcode and outputs html code based on
 * shortcode parameters. See yofla_360_process_attributes for default
 * parameeeeters
 *
 * @param $attributes
 * @param null $content
 * @return string
 */
function yofla_360_embed_shortcode($attributes, $content = null) {

    global $yofla_360_embed_map;

    //process attributes
    $attributes = yofla_360_process_attributes($attributes);

    $output_legacy_version = false;

    //exit on error
    if(isset($attributes['error'])) return $attributes['error'];


    //get uploads folder
    $wp_uploads = wp_upload_dir();
    if($wp_uploads['error']) {
        $html = yofla_360_format_error('uploads directory not accessible!');
        return $html;
    }

    // check duplicate embeds for divs
    if($attributes['iframe'] === 'false' && in_array($attributes['src'],$yofla_360_embed_map)){
        $html = yofla_360_format_error('Please use iframe="true" if you want to embed one object twice in one page.');
        return $html;
    }
    $yofla_360_embed_map[] = $attributes['src'];


    //init path variables
    $uploads_url       = $wp_uploads["baseurl"];
    $product_url       = $uploads_url.$attributes['src'];
    $product_path      = $wp_uploads['basedir'].$attributes['src'];
    $file_path_config  = $product_path.'config.js';
    $file_path_config_xml  = $product_path.'config.xml';
    $rotatetool_js_url = $uploads_url.$attributes['src'].'rotatetool.js';

    //if detected output of older, flash based 3DRT setup utility, set flag for legacy output
    if(file_exists($file_path_config_xml)){
       $output_legacy_version = true;
    }

    //check paths
    if(!file_exists($file_path_config) && $output_legacy_version == false){
        $html = yofla_360_format_error('Config file not readable, are paths set correctly? Path: '.$file_path_config);
        return $html;
    }

    //if legacy version, return old html code
    if($output_legacy_version){
        $code = yofla_360_output_legacy($attributes,$product_url,$product_path);
        return yofla_360_get_output_html($code);
    }

    //generate output html code based on shortcode parameters
    switch($attributes['show']){
        //user wants to show the rotation in a popup
        case 'popup':
            //get popup link/thumb code
            $code = yofla_360_get_popup_code($attributes,$file_path_config,$product_url,$product_path);
            break;
        //user is embedding the rotation right-away
        default:
            //embedding using an iframe
            if($attributes['iframe'] === 'true'){
                $code = yofla_360_get_iframe_code($attributes,$product_url,$product_path);
            }
            //embedding using div
            else{
                $code = yofla_360_get_embed_code($attributes,$file_path_config,$product_url,$rotatetool_js_url);
            }
    }//end switch


    // send html to browser
    return yofla_360_get_output_html($code);
}

/**
 * Adds html comments / plugin info to the html code which is sent to "browser"
 *
 * @param $html_code
 * @return string
 */
function yofla_360_get_output_html($html_code){
    //start html output
    $html_code_start = "\n".'<!-- 360 Product Rotation Plugin v.'.YOFLA_360_VERSION_NUM.' by www.yofla.com  Begin -->'."\n";
    $html_code_end = "\n".'<!-- 360 Product Rotation Plugin v.'.YOFLA_360_VERSION_NUM.' by www.yofla.com  End -->'."\n";
    $html_code = $html_code_start.$html_code.$html_code_end;
    return $html_code;
}



/**
 * Outputs the code as html element and not iframe
 *
 * @param $attributes
 * @param $file_path_config
 * @param $product_url
 * @param $rotatetool_js_url
 * @return string
 */
function yofla_360_get_embed_code($attributes,$file_path_config,$product_url,$rotatetool_js_url){

    global $yofla_360_settings;

    $html = '';

    //get unique productid
    $product_id = yofla_360_get_product_id($file_path_config);

    // set unique div id
    $div_id = "productRotation_".$product_id;

    // get width, height,...
    $width  = $attributes['width'];
    $height = $attributes['height'];
    $styles = $attributes['styles'];

    $html .= "<div id='".$div_id."' style='width: ".$width."; height: ".$height."; ".$styles."'";
    $html .= " data-rotate-tool='{\"path\":\"".$product_url."\",\"id\":\"$product_id\"}' > </div>";

    //cloud based player url
    $yofla_360_settings = ($yofla_360_settings)?$yofla_360_settings:get_option( 'yofla_360_options' );
    if ( isset($yofla_360_settings['license_id']) ){
        if(strlen($yofla_360_settings['license_id']) > 0){
            $rotatetool_js_url = YOFLA_PLAYER_URL.'?id='.$yofla_360_settings['license_id'];
        }
    }

    wp_enqueue_script( 'yofla_360_player', $rotatetool_js_url);

    return $html;
}


/**
 * Outputs html code (thumb or link) that launches lightbox when clicked on
 *
 * @param $attributes
 * @param $file_path_config
 * @param $product_url
 * @param $product_path
 * @return string
 */
function yofla_360_get_popup_code($attributes,$file_path_config,$product_url,$product_path){
    wp_enqueue_style( 'nivo-lightbox-css', YOFLA_360_URL.'vendor/nivo-lightbox/nivo-lightbox.css' );
    wp_enqueue_style( 'nivo-lightbox-theme-css', YOFLA_360_URL.'vendor/nivo-lightbox/themes/default/default.css' );
    wp_enqueue_script( 'nivo-lightbox', YOFLA_360_URL.'vendor/nivo-lightbox/nivo-lightbox.js' );
    wp_enqueue_script( 'nivo-lightbox-innit', YOFLA_360_URL.'js/init-nivo-lightbox.js' );

    switch($attributes['using']){
        case 'thumb':
            $link_body = yofla_360_get_thumb_image($attributes,$file_path_config,$product_url,$product_path);
            break;
        case 'link':
            $link_body = $attributes['name'];
        default:
    }
    $html = '<a class="yofla_360_popup" title="'.$attributes['name'].'" href="'.$product_url.'iframe.html">'.$link_body.'</a>';
    return $html;
}

/**
 * Returns the html code for displaying a thumb image of the 360 rotation
 *
 * @param $attributes
 * @param $file_path_config
 * @param $product_url
 * @param $product_path
 * @return string
 */
function yofla_360_get_thumb_image($attributes,$file_path_config,$product_url,$product_path){


    $images_dir_path = $product_path.'images/';

    //get list of images
    $images_in_folder = @yofla_360_get_list_of_images($images_dir_path);

    if(sizeof($images_in_folder) >= 1){
        $img_path = $images_in_folder[0];
        $image_name = basename($img_path);
        $image_url = $product_url.'images/'.$image_name;
        $out = '<img src="'.$image_url.'" width="120"  />';
    }
    else{
        $out =  $attributes['name'];
    }

    return $out;

}

/**
 * Utility function, returns an array with images in given folder
 *
 * @param $path
 * @return array
 */
function yofla_360_get_list_of_images($path){
    $folder = opendir($path);
    $pic_types = array("jpg", "jpeg", "gif", "png");
    $index = array();
    while ($file = readdir ($folder)) {
        if(in_array(substr(strtolower($file), strrpos($file,".") + 1),$pic_types))
        {
            array_push($index,$file);
        }
    }
    closedir($folder);
    sort($index);
    return $index;
}




/**
 * Outputs the Product Rotation code as iframe
 *
 * @param $attributes
 * @param $product_url
 * @param $product_path
 * @return string
 */
function yofla_360_output_legacy($attributes,$product_url,$product_path){

    //
    $html = '';

    // get width, height
    $width  = $attributes['width_original'];
    $height = $attributes['height_original'];

    $iframe_name = 'iframe'.$width.'x'.$height.'.html';

    $iframe_path = $product_path.$iframe_name;
    $iframe_url = $product_url.$iframe_name;

    if(file_exists($iframe_path)){
        //no action, iframe already generated
    }
    else{
        //load template
        $template_file_path = YOFLA_360_PATH.'includes/template-iframe-legacy.tpl';
        $template_string = file_get_contents($template_file_path);

        //modify template
        $search = array('{width}','{height}');
        $replace = array($width,$height);
        $new_html = str_replace($search,$replace,$template_string);

        //save file
        file_put_contents($iframe_path,$new_html);
    }

    //output iframe
    $html .= '<iframe
            width="'.$width.'"
            height="'.$height.'"
            src="'.$iframe_url.'"
            marginheight="0"
            marginwidth="0"
            scrolling="no"
            style="border:1px solid silver;" >';
    $html .= '</iframe>';


    return $html;
}


/**
 * Returns iframe ebed code
 *
 * @param $attributes
 * @param $product_url
 * @param $product_path
 * @return string
 */
function yofla_360_get_iframe_code($attributes,$product_url,$product_path){

    //globals
    global $yofla_360_embed_map;
    global $yofla_360_settings;

    //get database settings
    $yofla_360_settings = ($yofla_360_settings)?$yofla_360_settings:get_option( 'yofla_360_options' );

    $html = '';

    // get width, height
    $width  = $attributes['width_original'];
    $height = $attributes['height_original'];

    $iframe_url = $product_url.'/iframe.html';

    if($yofla_360_settings && isset($yofla_360_settings['license_id'])){
        $iframe_url = YOFLA_360_URL.'iframe.php?license_id='.$yofla_360_settings['license_id'].'&product_url='.urlencode($product_url);
    }

    //output iframe
    $html .= '<iframe
            name="3drt-'.sizeof($yofla_360_embed_map).'"
            width="'.$width.'"
            height="'.$height.'"
            src="'.$iframe_url.'"
            marginheight="0"
            marginwidth="0"
            scrolling="no"
            class="yofla_360_iframe"
            allowfullscreen
            style="'.$attributes['iframe_styles'].'"

            >';
    $html .= '</iframe>';


    return $html;
}


/**
 * Ads default values to attributes
 *
 * @param $attributes
 * @return mixed
 */
function yofla_360_process_attributes($attributes) {

    //globals
    global $yofla_360_settings;

    //get database settings
    $yofla_360_settings = ($yofla_360_settings)?$yofla_360_settings:get_option( 'yofla_360_options' );

    //defaults
    $defaults = array(
        'width' => '500',
        'height' => '375',
        'show' => 'embed',
        'name' => '360&deg; product rotation',
        'iframe' => 'true',
        'iframe_styles' => 'max-width: 100%; border: 1px solid silver;',
        'styles' => 'border: 1px solid silver;',
        'using' => false
    );

    //enhance provided attributes with  defaults
    foreach ($defaults as $default => $value) {
        if (!array_key_exists($default, $attributes)) {
            $attributes[$default] = $value;
        }
    }

    //fix iframe switch
    $attributes['iframe'] = strtolower($attributes['iframe']);
    
    //check src parameter
    if (!isset($attributes['src'])){
        $html = yofla_360_format_error('[src] parameter is not set!');
        $attributes['error'] = $html;
    }
    else{
        $attributes['src'] = yofla_360_format_provided_src_attribute($attributes['src']);
    }

    //store original width,height values
    $attributes['width_original'] = yofla_360_remove_px($attributes['width']);
    $attributes['height_original'] = yofla_360_remove_px($attributes['height']);


    //enhance width/height with px or %
    if(substr($attributes['width'],-1) != 'x' && substr($attributes['width'],-1) != '%'){
        $attributes['width'] = $attributes['width']."px";
    }
    if(substr($attributes['height'],-1) != 'x' && substr($attributes['height'],-1) != '%'){
        $attributes['height'] = $attributes['height']."px";
    }

    //override iframe styles based on user settings
    if($yofla_360_settings['iframe_styles']) $attributes['iframe_styles'] = $yofla_360_settings['iframe_styles'];


    return $attributes;
}


/**
 * Adds trailing and leading slash to string
 * 
 * @param $src
 * @return string
 */
function yofla_360_format_provided_src_attribute($src) {
    if (substr($src,-1) != '/') $src .= '/';
    if (substr($src,0,1) != '/') $src = '/'.$src;
    return $src;
}


/**
 * Adds html code to error message that is returned to page
 *
 * @param $msg
 * @return string
 */
function yofla_360_format_error($msg){
    $str = '<div><span style="color: red">360 Plugin Error: '.$msg.'</span></div>';
    return $str;
}

/**
 * If string is ending with px, remove px and return just number
 *
 * @param $string
 * @return mixed
 */
function yofla_360_remove_px($string){
    //no change if ending with %
    if(substr($string, -1) == '%') return $string;

    //remove all non number chars
    $string = preg_replace('#[^0-9]#','',strip_tags($string));
    return $string;
}


/**
 * Extract unique product_id from config.js file.
 *
 * @param $file_path_config
 * @return mixed
 */
function yofla_360_get_product_id($file_path_config){
    $config_file = file_get_contents($file_path_config);
    $first_line =  strtok($config_file,"\n");
    preg_match('/_(\d*)/',$first_line,$matches);
    $product_id = $matches[1];
    return $product_id;
}

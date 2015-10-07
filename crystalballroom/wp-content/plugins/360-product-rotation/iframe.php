<?php
/**
 * Generate iframe.html file when cloud option rotoatetool.js is set
 *
 */

if (!defined('YOFLA_PLAYER_URL')) define('YOFLA_PLAYER_URL', 'http://www.yofla.com/3d-rotate/app/cdn/get/rotatetool.js');

//construct $path variable
$path = '';

if(isset($_GET['product_url'])){
    $path = urldecode($_GET['product_url']);
}

//construct rotatetool.js path
$rotatetool_js_src = YOFLA_PLAYER_URL;

if(isset($_GET['license_id'])) $rotatetool_js_src = $rotatetool_js_src.'?id='.$_GET['license_id'];

//load template
$template_file_path = 'includes/template-iframe.tpl';
$template_string = file_get_contents($template_file_path);

//modify template
$search = array('{rotatetool_js_src}','{path}');
$replace = array($rotatetool_js_src,$path);
$new_html = str_replace($search,$replace,$template_string);


echo $new_html;

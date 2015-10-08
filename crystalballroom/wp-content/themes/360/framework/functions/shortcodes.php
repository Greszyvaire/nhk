<?php
// Allow shortcodes in widgets
add_filter('widget_text', 'do_shortcode');


// Box
function box($atts, $content = null) {
	return '<div class="box">'.$content.'</div>';
}

add_shortcode('box', 'box');


// Blockquotes
function blockleft($atts, $content = null) {
	return '<p class="blockquote-left">'.$content.'</p>';
}

add_shortcode('blockleft','blockleft');

// Blockquotes
function blockbox($atts, $content = null) {
	return '<p class="blockquote-box">'.$content.'</p>';
}
add_shortcode('blockbox','blockbox');

// Blockquotes
function list_shortcode( $atts, $content = null ){
    extract(
    shortcode_atts( array(
      'type' => '',
      'url' => ''
      ),
      $atts ) );
        return '<ol class="' . $type . '">' . $content . '</ol>';
}
add_shortcode('list', 'list_shortcode');


//TOGGLE
function toggle_shortcode( $atts, $content = null )
{
	extract( shortcode_atts(
	array(
      'title' => 'Click To Open'
      ),
	  $atts ) );
		return '<div class="toggle-wrap"><h3 class="trigger"><a href="#">'. $title .'</a></h3><div class="toggle_container">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('toggle', 'toggle_shortcode');



// Google Maps
function do_googleMaps($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '640',
      "height" => '480',
      "src" => ''
   ), $atts));
   return '<iframe width="'.$width.'" height="'.$height.'" src="'.$src.'&amp;output=embed" ></iframe>';
}
add_shortcode("googlemap", "do_googleMaps");

// TweetMeme
function tweetmeme(){
	return '<div class="tweetmeme"><script type="text/javascript" src="http://tweetmeme.com/i/scripts/button.js"></script></div>';
}
add_shortcode('tweet', 'tweetmeme');


// Small Blue Button
function small_blue_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return '<a class="nice small radius blue button2" href="'.$url.'">'.$content.'</a>';
}
add_shortcode('small_blue_button', 'small_blue_button');

// Medium Blue Button
function medium_blue_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return '<a class="blue nice button2 radius" href="'.$url.'">'.$content.'</a>';
}
add_shortcode('medium_blue_button', 'medium_blue_button');

// Large Blue Button
function large_blue_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return '<a class="large blue nice button2 radius" href="'.$url.'">'.$content.'</a>';
}
add_shortcode('large_blue_button', 'large_blue_button');


// Small Blue Button
function small_red_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return '<a class="nice small radius red button2" href="'.$url.'">'.$content.'</a>';
}
add_shortcode('small_red_button', 'small_red_button');

// Medium Blue Button
function medium_red_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return '<a class="red nice button2 radius" href="'.$url.'">'.$content.'</a>';
}
add_shortcode('medium_red_button', 'medium_red_button');

// Large Blue Button
function large_red_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return '<a class="large red nice button2 radius" href="'.$url.'">'.$content.'</a>';
}
add_shortcode('large_red_button', 'large_red_button');


// Small White Button
function small_white_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return '<a class="nice small radius white button2" href="'.$url.'">'.$content.'</a>';
}
add_shortcode('small_white_button', 'small_white_button');

// Medium White Button
function medium_white_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return '<a class="white nice button2 radius" href="'.$url.'">'.$content.'</a>';
}
add_shortcode('medium_white_button', 'medium_white_button');

// Large White Button
function large_white_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return '<a class="large white nice button2 radius" href="'.$url.'">'.$content.'</a>';
}
add_shortcode('large_white_button', 'large_white_button');


// Small Black Button
function small_black_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return '<a class="nice small radius black button2" href="'.$url.'">'.$content.'</a>';
}
add_shortcode('small_black_button', 'small_black_button');

// Medium White Button
function medium_black_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return '<a class="black nice button2 radius" href="'.$url.'">'.$content.'</a>';
}
add_shortcode('medium_black_button', 'medium_black_button');

// Large White Button
function large_black_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => ''
	), $atts));
	return '<a class="large black nice button2 radius" href="'.$url.'">'.$content.'</a>';
}
add_shortcode('large_black_button', 'large_black_button');



function siiimple_one_full( $atts, $content = null ) {
   return '<div class="one_full">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_full', 'siiimple_one_full');

function siiimple_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_third', 'siiimple_one_third');

function siiimple_one_third_last( $atts, $content = null ) {
   return '<div class="one_third column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('one_third_last', 'siiimple_one_third_last');

function siiimple_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}

add_shortcode('two_third', 'siiimple_two_third');

function siiimple_two_third_last( $atts, $content = null ) {
   return '<div class="two_third column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('two_third_last', 'siiimple_two_third_last');

function siiimple_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_half', 'siiimple_one_half');

function siiimple_one_half_last( $atts, $content = null ) {
   return '<div class="one_half column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('one_half_last', 'siiimple_one_half_last');

function siiimple_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_fourth', 'siiimple_one_fourth');

function siiimple_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('one_fourth_last', 'siiimple_one_fourth_last');

function siiimple_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}

add_shortcode('three_fourth', 'siiimple_three_fourth');

function siiimple_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('three_fourth_last', 'siiimple_three_fourth_last');

function siiimple_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_fifth', 'siiimple_one_fifth');

function siiimple_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('one_fifth_last', 'siiimple_one_fifth_last');

function siiimple_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}

add_shortcode('two_fifth', 'siiimple_two_fifth');

function siiimple_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_fifth_last', 'siiimple_two_fifth_last');

function siiimple_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}

add_shortcode('three_fifth', 'siiimple_three_fifth');

function siiimple_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('three_fifth_last', 'siiimple_three_fifth_last');

function siiimple_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}

add_shortcode('four_fifth', 'siiimple_four_fifth');

function siiimple_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('four_fifth_last', 'siiimple_four_fifth_last');

function siiimple_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_sixth', 'siiimple_one_sixth');

function siiimple_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('one_sixth_last', 'siiimple_one_sixth_last');

function siiimple_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}

add_shortcode('five_sixth', 'siiimple_five_sixth');

function siiimple_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('five_sixth_last', 'siiimple_five_sixth_last');


// Tooltips
add_shortcode('tooltip', 'siiimple_tooltip');
	function siiimple_tooltip($atts, $content = null) {
		extract(shortcode_atts(array(
			'text' => 'Make sure to include text.',
			'color' => 'light'
		), $atts));
		
		switch($color) {
			
			case 'blue':
				$class = 'tooltip-blue';
				break;
			
			case 'orange':
				$class = 'tooltip-orange';
				break;
			
			case 'green':
				$class = 'tooltip-green';
				break;
			
			case 'purple':
				$class = 'tooltip-purple';
				break;
			
			case 'pink':
				$class = 'tooltip-pink';
				break;
			
			case 'red':
				$class = 'tooltip-red';
				break;
			
			case 'grey':
				$class = 'tooltip-grey';
				break;
			
			case 'light':
				$class = 'tooltip-light';
				break;
			
			case 'black':
				$class = 'tooltip-black';
				break;
			
		}
		return '<span class="tip_trigger">'.do_shortcode($content).'<span class="tip '.$class.'">'.$text.'</span></span>';
		
	}
?>
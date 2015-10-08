<?php
/*
* http://denzeldesigns.com/wordpress-plugins/video-sidebar-widgets/
*/ 


//action to initiate widgets
add_action('widgets_init', 'load_video_sidebar_widgets');


//function to register Video Sidebar Widget and Random Video Sidebar Widget
function load_video_sidebar_widgets() {
register_widget('VideoSidebarWidget');
register_widget('RandomVideoSidebarWidget');
}


//Video Sidebar Widget Class to extend WP_Widget class
class VideoSidebarWidget extends WP_Widget {

		//function to set up widget in admin
		function VideoSidebarWidget() {
		
				$widget_ops = array( 'classname' => 'videosidebar', 
				'description' => __('A Video Widget to display video in sidebar from various video sharing networks', 'siiimple') );
				
				$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'siiimple' );
				$this->WP_Widget( 'videosidebar', __('360&deg; - Video Widget', 'siiimple'), $widget_ops, $control_ops );
		
		}


		//function to echo out widget on sidebar
		function widget( $args, $instance ) {
		extract( $args );
		
				$title2 = apply_filters('widget_title2', $instance['title2'] );
		        $cap2 = $instance['v_cap2'];
				
				echo $before_widget;
		
				// if user written title echo out
				if ( $title2 ){
				echo $before_title . $title2 . $after_title;
				}
			
				//get settings from Widget Admin Form to assign to function VSWShowVideo
				$autoplaysetting = $instance['v_autoplay2'];
				$videoid = $instance['v_id2'];
				$videosource = $instance['v_source']; 
				$videowidth = $instance['v_width2'];
				$videoheight = $instance['v_height2'];
				
				//function to show video in blog sidebar, please look for it below
				VSWShowVideo($videosource,$videoid,$autoplaysetting,$videowidth,$videoheight,'false','false');
				
				if($cap2){
				echo "<p class=\"VideoCaption\">$cap2</p>";
				}	
		
				echo $after_widget;
		
		}//end of function widget



		//function to update widget setting
		function update( $new_instance, $old_instance ) {
		
				$instance = $old_instance;
				$instance['title2'] = strip_tags( $new_instance['title2'] );
				$instance['v_width2'] = strip_tags( $new_instance['v_width2'] );
				$instance['v_height2'] = strip_tags( $new_instance['v_height2'] );
				$instance['v_autoplay2'] = strip_tags( $new_instance['v_autoplay2'] );
				$instance['v_id2'] = strip_tags( $new_instance['v_id2'] );
				$instance['v_source'] = strip_tags( $new_instance['v_source'] );
				$instance['v_cap2'] = $new_instance['v_cap2'];
				return $instance;
		
		}//end of function update


		//function to create Widget Admin form
		function form($instance) {
		
				$instance = wp_parse_args( (array) $instance, array( 'title2' => '', 'v_width2' => '', 'v_height2' => '', 
				'v_autoplay2' => '','v_id2' => '','v_source' => '','v_cap2' => '') );
				
				$instance['title2'] = strip_tags( $instance['title2'] );
				$instance['v_width2'] = strip_tags( $instance['v_width2'] );
				$instance['v_height2'] = strip_tags( $instance['v_height2'] );
				$instance['v_autoplay2'] = strip_tags( $instance['v_autoplay2'] );
				$instance['v_id2'] = strip_tags( $instance['v_id2'] );
				$instance['v_source'] = strip_tags( $instance['v_source'] );
				$instance['v_cap2'] = $instance['v_cap2'];	
				
				//function to show video in widget admin form fixed width and height, please look for it below
				$autoplaysetting = '0';
				$videoid = $instance['v_id2'];
				$videosource = $instance['v_source']; 
				$videowidth = null;
				$videoheight = null;
				//$admin = true // to show video in admin
				
				VSWShowVideo($videosource,$videoid,$autoplaysetting,$videowidth,$videoheight,'true','false');
						
				?>
				
						
				<p>
				<label for="<?php echo $this->get_field_id('title2'); ?>">Widget Title:</label> 
				<input class="widefat" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>"
				 type="text" value="<?php echo $instance['title2']; ?>" />
				</p>
				
				<p>
				<label for="<?php echo $this->get_field_id( 'v_source' ); ?>">Select Video Source:</label> 
				<select id="<?php echo $this->get_field_id( 'v_source' );?>" name="<?php echo $this->get_field_name( 'v_source' );?>" 
				class="widefat" style="width:100%;">
				<option value='YouTube' <?php  if($instance['v_source'] == 'YouTube'){echo 'selected="selected"';}?> >YouTube Video</option>
				<option value='Vimeo' <?php  if($instance['v_source'] == 'Vimeo'){echo 'selected="selected"';}?> >Vimeo Video</option>
				<option value='MySpace' <?php  if($instance['v_source'] == 'MySpace'){echo 'selected="selected"';}?> >MySpace Video</option>
				<option value='Veoh' <?php  if($instance['v_source'] == 'Veoh'){echo 'selected="selected"';}?> >Veoh Video</option>
				<option value='Blip' <?php  if($instance['v_source'] == 'Blip'){echo 'selected="selected"';}?> >blip.tv Video</option>
				<option value='WordPress' <?php  if($instance['v_source'] == 'WordPress'){echo 'selected="selected"';}?> >WordPress Video
                </option>
				<option value='Viddler' <?php  if($instance['v_source'] == 'Viddler'){echo 'selected="selected"';}?> >Viddler Video</option>
				<option value='DailyMotion' <?php  if($instance['v_source'] == 'DailyMotion'){echo 'selected="selected"';}?> >DailyMotion Video</option>
				<option value='Revver' <?php  if($instance['v_source'] == 'Revver'){echo 'selected="selected"';}?> >Revver Video</option>
				<option value='Metacafe' <?php  if($instance['v_source'] == 'Metacafe'){echo 'selected="selected"';}?> >Metacafe Video</option>
				<option value='Tudou' <?php  if($instance['v_source'] == 'Tudou'){echo 'selected="selected"';}?> >Tudou Video</option>
				<option value='Youku' <?php  if($instance['v_source'] == 'Youku'){echo 'selected="selected"';}?> >Youku Video</option>
				<option value='cn6' <?php  if($instance['v_source'] == 'cn6'){echo 'selected="selected"';}?> >6.cn Video</option>
				<option value='Google' <?php  if($instance['v_source'] == 'Google'){echo 'selected="selected"';}?> >Google Video</option>
                <option value='Tangle' <?php  if($instance['v_source'] == 'Tangle'){echo 'selected="selected"';}?> >Tangle Video</option>
				</select>
				</p>
				
				<p>
				<label for="<?php echo $this->get_field_id('v_id2'); ?>">Video ID: </label>
				<input class="widefat" id="<?php echo $this->get_field_id('v_id2'); ?>" 
                name="<?php echo $this->get_field_name('v_id2'); ?>" type="text" value="<?php echo $instance['v_id2']; ?>" /></p>
				
				<p>
				<label for="<?php echo $this->get_field_id('v_width2'); ?>">Video Width: </label>
				<input class="widefat" id="<?php echo $this->get_field_id('v_width2'); ?>" 
                name="<?php echo $this->get_field_name('v_width2'); ?>" type="text" value="<?php echo $instance['v_width2']; ?>" />
				</p>
				
				<p>
				<label for="<?php echo $this->get_field_id('v_height2'); ?>">Video Height: </label>
				<input class="widefat" id="<?php echo $this->get_field_id('v_height2'); ?>" 
                name="<?php echo $this->get_field_name('v_height2'); ?>" type="text" value="<?php echo $instance['v_height2']; ?>" />
				</p>
				
                <p>
				<label for="<?php echo $this->get_field_id('v_cap2'); ?>">Video Caption: </label>
				<input class="widefat" id="<?php echo $this->get_field_id('v_cap2'); ?>" 
                name="<?php echo $this->get_field_name('v_cap2'); ?>" type="text" value="<?php echo $instance['v_cap2']; ?>" />
				</p>
                
                
				<p>
				
				<?php
				
				// check whether autoplay feature supported by video network
				$source = $instance['v_source']; 
				$msg = "<p>Sorry, auto play option not supported by ".$source."</p>";
				switch ($source) {
						
						case WordPress:
						echo $msg;
						break;
						
						case Tudou:
						echo $msg;
						break;
						
						case Youku:
						echo $msg;
						break;
						
						case Blip:
						echo "<p>Sorry, auto play option removed as it is causing error in Internet Explorer</p>";
						break;
						
						case cn6:
						echo "<p>Sorry, auto play option not supported by 6.cn</p>";
						break;
					}	
				
				?>
				
				<label for="<?php echo $this->get_field_id( 'v_autoplay2' ); ?>">Auto Play:</label> 
				<select id="<?php echo $this->get_field_id( 'v_autoplay2' );?>" 
                name="<?php echo $this->get_field_name( 'v_autoplay2' );?>" class="widefat" style="width:100%;">';
				<option value='1' <?php  if($instance['v_autoplay2'] == '1'){echo 'selected="selected"';}?>>Yes</option>
				<option value='0' <?php  if($instance['v_autoplay2'] == '0'){echo 'selected="selected"';}?>>No</option>
				</select>
				</p>
				
				<?php
		
	      }//end of function form($instance)

}//end of Video Sidebar Widget Class



function VSWShowVideo($videosource,$videoid,$autoplaysetting,$videowidth,$videoheight,$admin,$shortcode){

//admin = true to show in widget admin
//admin = false to show in blog sidebar

        $v_autoplay2 = $autoplaysetting;
        $v_id2 = $videoid;
		$v_source = $videosource;		
        $v_width2 = $videowidth;
        $v_height2 = $videoheight;
  
      	$source = $v_source;
        
		//test for source and assign codes accordingly	
		switch ($source) {
		
		case null:
		$value = null;
		$flashvar = null;
		$flashvar2 = null;
		break;		
		
        case YouTube:
        $value = "http://www.youtube.com/v/$v_id2&autoplay=$v_autoplay2&loop=0&rel=0";
		$flashvar = null;
		$flashvar2 = null;
        break;
		
		case Vimeo:
		$value =  "http://vimeo.com/moogaloop.swf?clip_id=$v_id2&amp;server=vimeo.com&amp;loop=0&amp;fullscreen=1&amp;autoplay=$v_autoplay2";
		$flashvar = null;
		$flashvar2 = null;
        break;
		
		case MySpace:
		$value =  "http://mediaservices.myspace.com/services/media/embed.aspx/m=$v_id2,t=1,mt=video,ap=$v_autoplay2";
		$flashvar = null;
		$flashvar2 = null;
        break;
		
		case Veoh:
		$value = "http://www.veoh.com/static/swf/webplayer/WebPlayer.swf?version=AFrontend.5.4.2.20.1002&";
		$value.= "permalinkId=$v_id2&player=videodetailsembedded&id=anonymous&videoAutoPlay=$v_autoplay2";
		$flashvar = null;
		$flashvar2 = null;
        break;
		
	    case Blip:
		$value =  "http://blip.tv/play/$v_id2";
		$flashvar = null;
		$flashvar2 = null;
        break;
		
	    case WordPress:
		$value =  "http://v.wordpress.com/$v_id2";
		$flashvar = null;
		$flashvar2 = null;
        break;
		
		case Viddler:
		$value =  "http://www.viddler.com/player/$v_id2";
		if($v_autoplay2=='1'){
		$flashvar = "<param name=\"flashvars\" value=\"autoplay=t\" />\n";
		$flashvar2 = 'flashvars="autoplay=t" ';
		}
        break;
		
		case DailyMotion:
		$value =  "http://www.dailymotion.com/swf/$v_id2&autoStart=$v_autoplay2&related=0";
		$flashvar = null;
		$flashvar2 = null;
        break;
				
		
		case Revver:
		$value = "http://flash.revver.com/player/1.0/player.swf?mediaId=$v_id2&autoStart=$v_autoplay2";
		$flashvar = null;
		$flashvar2 = null;
		break;
		
		case Metacafe:
		$id = split('/',$v_id2);
		$value = "http://www.metacafe.com/fplayer/$id[0]/$id[1].swf";
		if($v_autoplay2=='1'){
		$flashvar = null;
		$flashvar2 = 'flashVars="playerVars=showStats=no|autoPlay=yes|"';
		}
		break;
		
		case Tudou:
		$value = "$v_id2";
		$flashvar = null;
		$flashvar2 = null;
		break;
		
		case Youku:
		$value = "$v_id2";
		$flashvar = null;
		$flashvar2 = null;
		break;
		
		case cn6:
		$value = "$v_id2";
		$flashvar = null;
		$flashvar2 = null;
		break;
		
		case Google:
		$value = "http://video.google.com/googleplayer.swf?docid=$v_id2&hl=en&fs=true";
		if($v_autoplay2=='1'){
		$flashvar = null;
		$flashvar2 = 'FlashVars="autoPlay=true&playerMode=embedded"';
		}
		break;
		
		case Tangle:
		$value = "http://www.tangle.com/flash/swf/flvplayer.swf";
		if($v_autoplay2=='1'){
		$flashvar = null;
		$flashvar2 = "FlashVars=\"viewkey=$v_id2&autoplay=$v_autoplay2\"";
		}else{
		$flashvar = null;
		$flashvar2 = "FlashVars=\"viewkey=$v_id2\"";
		}
		break;
	
		}
		
		if($shortcode=="true"){
		//added in version 2.3
		//return instead of echo video on blog using shortcode
		$vsw_code = "\n<object width=\"$v_width2\" height=\"$v_height2\">\n";
		$vsw_code .= $flashvar;
		$vsw_code .= "<param name=\"allowfullscreen\" value=\"true\" />\n";
		$vsw_code .= "<param name=\"allowscriptaccess\" value=\"always\" />\n";
		$vsw_code .= "<param name=\"movie\" value=\"$value\" />\n";
		$vsw_code .= "<param name=\"wmode\" value=\"transparent\">\n";
		$vsw_code .= "<embed src=\"$value\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" ";
		$vsw_code .= "allowfullscreen=\"true\" allowscriptaccess=\"always\" ";
		$vsw_code .= $flashvar2;
		$vsw_code .= "width=\"$v_width2\" height=\"$v_height2\">\n";
		$vsw_code .= "</embed>\n";
		$vsw_code .= "</object>\n\n";
		return $vsw_code;
		}
		elseif($admin=="true"){
		// echo video in admin
        echo "\n<object width=\"212\" height=\"172\">\n";
		echo $flashvar;
		echo "<param name=\"allowfullscreen\" value=\"true\" />\n";
		echo "<param name=\"allowscriptaccess\" value=\"always\" />\n";
		echo "<param name=\"movie\" value=\"$value\" />\n";
		echo "<param name=\"wmode\" value=\"transparent\">\n";
		echo "<embed src=\"$value\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" ";
		echo "allowfullscreen=\"true\" allowscriptaccess=\"always\" ";
		echo $flashvar2;
		echo "width=\"212\" height=\"172\">\n";
		echo "</embed>\n";
		echo "</object>\n\n";

        }else{
		
		// echo video on blog
		echo "\n<div class=\"video-widget-wrap\">\n";
		echo "\n<object width=\"$v_width2\" height=\"$v_height2\">\n";
		echo $flashvar;
		echo "<param name=\"allowfullscreen\" value=\"true\" />\n";
		echo "<param name=\"allowscriptaccess\" value=\"always\" />\n";
		echo "<param name=\"movie\" value=\"$value\" />\n";
		echo "<param name=\"wmode\" value=\"transparent\">\n";
		echo "<embed src=\"$value\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" ";
		echo "allowfullscreen=\"true\" allowscriptaccess=\"always\" ";
		echo $flashvar2;
		echo "width=\"$v_width2\" height=\"$v_height2\">\n";
		echo "</embed>\n";
		echo "</object>\n\n";
		echo "\n</div>\n";
		}


}//end of function VSWShowVideo

//Random video widget starts here


class RandomVideoSidebarWidget extends WP_Widget {

function RandomVideoSidebarWidget() {
$widget_ops = array( 'classname' => 'randomvideosidebar', 'description' => __('A Random Video Widget. Randomly selects 1 of the 5 preset videos for display', 'siiimple') );
$control_ops = array( 'width' => 705, 'height' => 600, 'id_base' => 'siiimple' );
$this->WP_Widget( 'randomvideosidebar', __('360&deg; - Random Video Widget', 'siiimple'), $widget_ops, $control_ops );
}


function widget( $args, $instance ) {
extract( $args );

        $RV_title = apply_filters('widget_title', $instance['RV_title'] );
        $RV_width = $instance['RV_width'];
        $RV_height = $instance['RV_height'];
        $RV_autoplay = $instance['RV_autoplay'];
        $RV_id1 = $instance['RV_id1'];
		$RV_source1 = $instance['RV_source1'];
		$RV_cap1 = $instance['RV_cap1'];
		$RV_id2 = $instance['RV_id2'];
		$RV_source2 = $instance['RV_source2'];
		$RV_cap2 = $instance['RV_cap2'];
		$RV_id3 = $instance['RV_id3'];
		$RV_source3 = $instance['RV_source3'];
		$RV_cap3 = $instance['RV_cap3'];
		$RV_id4 = $instance['RV_id4'];
		$RV_source4 = $instance['RV_source4'];
		$RV_cap4 = $instance['RV_cap4'];
		$RV_id5 = $instance['RV_id5'];
		$RV_source5 = $instance['RV_source5'];
		$RV_cap5 = $instance['RV_cap5'];
					
        echo $before_widget;

        if ( $RV_title )
        echo $before_title . $RV_title . $after_title;
		
		//using rand() to select which video to show 
		
		$selection = rand(1,5); 

        switch($selection){
	
		case 1:
		$Embed_id = $RV_id1;
		$Embed_source = $RV_source1;
		$Embed_cap = $RV_cap1;
		break;
		
		case 2:
		$Embed_id = $RV_id2;
		$Embed_source = $RV_source2;
		$Embed_cap = $RV_cap2;
		break;
		 
		case 3:
		$Embed_id = $RV_id3;
		$Embed_source = $RV_source3;
		$Embed_cap = $RV_cap3;
		break;
		
		case 4:
		$Embed_id = $RV_id4;
		$Embed_source = $RV_source4;
		$Embed_cap = $RV_cap4;
		break;
		
		case 5:
		$Embed_id = $RV_id5;
		$Embed_source = $RV_source5;
		$Embed_cap = $RV_cap5;
		break;
		
		}	
		
		//test for empty $Embed_id and empty $Embed_source. if empty, 
		//assign to same as first video id and source
		
		If(empty($Embed_id)){
		$Embed_id = $RV_id1;
		$Embed_source = $RV_source1;
		$Embed_cap = $RV_cap1;		
		}
				
		$select_source = $Embed_source;
	
		switch ($select_source) {
		
		case null:
		$rv_value = null;
		$rv_flashvar = null;
		$rv_flashvar2 = null;
		$rv_cap = null;
		break;		
		
        case YouTube:
		$rv_value = "http://www.youtube.com/v/$Embed_id&autoplay=$RV_autoplay&loop=0&rel=0";
		$rv_flashvar = null;
		$rv_flashvar2 = null;
		$rv_cap = $Embed_cap;
        break;
		
		case Vimeo:
		$rv_value =  "http://vimeo.com/moogaloop.swf?clip_id=$Embed_id&amp;server=vimeo.com&amp;loop=0&amp;fullscreen=1&amp;autoplay=$RV_autoplay";
		$rv_flashvar = null;
		$rv_flashvar2 = null;
		$rv_cap = $Embed_cap;
        break;
		
		case MySpace:
		$rv_value =  "http://mediaservices.myspace.com/services/media/embed.aspx/m=$Embed_id,t=1,mt=video,ap=$RV_autoplay";
		$rv_flashvar = null;
		$rv_flashvar2 = null;
		$rv_cap = $Embed_cap;
        break;
		
		case Veoh:
		$rv_value = "http://www.veoh.com/static/swf/webplayer/WebPlayer.swf?version=AFrontend.5.4.2.20.1002&permalinkId=$Embed_id";
		$rv_value.= "&player=videodetailsembedded&id=anonymous&videoAutoPlay=$RV_autoplay";
		$rv_flashvar = null;
		$rv_flashvar2 = null;
		$rv_cap = $Embed_cap;
        break;
		
	    case Blip:
		$rv_value =  "http://blip.tv/play/$Embed_id";
		$rv_flashvar = null;
		$rv_flashvar2 = null;
		$rv_cap = $Embed_cap;
        break;
		
	    case WordPress:
		$rv_value =  "http://v.wordpress.com/$Embed_id";
		$rv_flashvar = null;
		$rv_flashvar2 = null;
		$rv_cap = $Embed_cap;
        break;
		
		case Viddler:
		$rv_value =  "http://www.viddler.com/player/$Embed_id";
		if($RV_autoplay=='1'){
		$rv_flashvar = "<param name=\"flashvars\" value=\"autoplay=t\" />\n";
		$rv_flashvar2 = 'flashvars="autoplay=t" ';
		}
		$rv_cap = $Embed_cap;
        break;
		
		case DailyMotion:
		$rv_value =  "http://www.dailymotion.com/swf/$Embed_id&autoStart=$RV_autoplay&related=0";
		$rv_flashvar = null;
		$rv_flashvar2 = null;
		$rv_cap = $Embed_cap;
        break;
				
		
		case Revver:
		$rv_value = "http://flash.revver.com/player/1.0/player.swf?mediaId=$Embed_id&autoStart=$RV_autoplay";
		$rv_flashvar = null;
		$rv_flashvar2 = null;
		$rv_cap = $Embed_cap;
		break;
		
		case Metacafe:
		$rid = split('/',$Embed_id);
		$rv_value = "http://www.metacafe.com/fplayer/$rid[0]/$rid[1].swf";
		if($RV_autoplay=='1'){
		$rv_flashvar = null;
		$rv_flashvar2 = 'flashVars="playerVars=showStats=no|autoPlay=yes|"';
		}
		$rv_cap = $Embed_cap;
		break;
		
		case Tudou:
		$rv_value = "$Embed_id";
		$rv_flashvar = null;
		$rv_flashvar2 = null;
		$rv_cap = $Embed_cap;
		break;
		
		case Youku:
		$rv_value = "$Embed_id";
		$rv_flashvar = null;
		$rv_flashvar2 = null;
		$rv_cap = $Embed_cap;
		break;
		
		case cn6:
		$rv_value = "$Embed_id";
		$rv_flashvar = null;
		$rv_flashvar2 = null;
		$rv_cap = $Embed_cap;
		break;
		
		case Google:
		$rv_value = "http://video.google.com/googleplayer.swf?docid=$Embed_id&hl=en&fs=true";
		if($RV_autoplay=='1'){
		$rv_flashvar = null;
		$rv_flashvar2 = 'FlashVars="autoPlay=true&playerMode=embedded"';
		}
		$rv_cap = $Embed_cap;
		break;
		
		case Tangle:
		$rv_value = "http://www.tangle.com/flash/swf/flvplayer.swf";
		if($RV_autoplay=='1'){
		$rv_flashvar = null;
		$rv_flashvar2 = "FlashVars=\"viewkey=$Embed_id&autoplay=$RV_autoplay\"";
		}else{
		$rv_flashvar = null;
		$rv_flashvar2 = "FlashVars=\"viewkey=$Embed_id\"";
		}
		$rv_cap = $Embed_cap;
		break;
		
		
	
		}
		
		
		
        echo "\n<object width=\"$RV_width\" height=\"$RV_height\">\n";
		echo $rv_flashvar;
		echo "<param name=\"allowfullscreen\" value=\"true\" />\n";
		echo "<param name=\"allowscriptaccess\" value=\"always\" />\n";
		echo "<param name=\"movie\" value=\"$rv_value\" />\n";
		echo "<param name=\"wmode\" value=\"transparent\">\n";
		echo "<embed src=\"$rv_value\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" ";
		echo "allowfullscreen=\"true\" allowscriptaccess=\"always\" ";
		echo $rv_flashvar2;
		echo "width=\"$RV_width\" height=\"$RV_height\">\n";
		echo "</embed>\n";
		echo "</object>\n\n";
		echo "<p class=\"VideoCaption\">$rv_cap</p>";
		
		
        echo $after_widget;
    }


function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['RV_title'] = strip_tags( $new_instance['RV_title'] );
        $instance['RV_width'] = strip_tags( $new_instance['RV_width'] );
        $instance['RV_height'] = strip_tags( $new_instance['RV_height'] );
        $instance['RV_autoplay'] = strip_tags( $new_instance['RV_autoplay'] );
        $instance['RV_id1'] = strip_tags( $new_instance['RV_id1'] );
		$instance['RV_source1'] = strip_tags( $new_instance['RV_source1'] );
		$instance['RV_cap1'] = $new_instance['RV_cap1'];
		$instance['RV_id2'] = strip_tags( $new_instance['RV_id2'] );
		$instance['RV_source2'] = strip_tags( $new_instance['RV_source2'] );
		$instance['RV_cap2'] = $new_instance['RV_cap2'];
		$instance['RV_id3'] = strip_tags( $new_instance['RV_id3'] );
		$instance['RV_source3'] = strip_tags( $new_instance['RV_source3'] );
		$instance['RV_cap3'] = $new_instance['RV_cap3'];
		$instance['RV_id4'] = strip_tags( $new_instance['RV_id4'] );
		$instance['RV_source4'] = strip_tags( $new_instance['RV_source4'] );
		$instance['RV_cap4'] = $new_instance['RV_cap4'];
		$instance['RV_id5'] = strip_tags( $new_instance['RV_id5'] );
		$instance['RV_source5'] = strip_tags( $new_instance['RV_source5'] );
		$instance['RV_cap5'] = $new_instance['RV_cap5'];			
        return $instance;
}


function form($instance) {
$instance = wp_parse_args( (array) $instance, array( 'RV_title' => '', 'RV_width' => '', 'RV_height' => '', 'RV_autoplay' => '','RV_id1' => '','RV_source1' => '','RV_cap1' => '', 'RV_id2' => '','RV_source2' => '','RV_cap2' => '', 'RV_id3' => '','RV_source3' => '','RV_cap3' => '', 'RV_id4' => '','RV_source4' => '','RV_cap4' => '', 'RV_id5' => '','RV_source5' => '','RV_cap5' => '') );

        $instance['RV_title'] = strip_tags( $instance['RV_title'] );
        $instance['RV_width'] = strip_tags( $instance['RV_width'] );
        $instance['RV_height'] = strip_tags( $instance['RV_height'] );
        $instance['RV_autoplay'] = strip_tags( $instance['RV_autoplay'] );
        $instance['RV_id1'] = strip_tags( $instance['RV_id1'] );
		$instance['RV_source1'] = strip_tags( $instance['RV_source1'] );
		$instance['RV_cap1'] = $instance['RV_cap1'];
		$instance['RV_id2'] = strip_tags( $instance['RV_id2'] );
		$instance['RV_source2'] = strip_tags( $instance['RV_source2'] );
		$instance['RV_cap2'] = $instance['RV_cap2'];
		$instance['RV_id3'] = strip_tags( $instance['RV_id3'] );
		$instance['RV_source3'] = strip_tags( $instance['RV_source3'] );
		$instance['RV_cap3'] = $instance['RV_cap3'];
		$instance['RV_id4'] = strip_tags( $instance['RV_id4'] );
		$instance['RV_source4'] = strip_tags( $instance['RV_source4'] );
		$instance['RV_cap4'] = $instance['RV_cap4'];
		$instance['RV_id5'] = strip_tags( $instance['RV_id5'] );
		$instance['RV_source5'] = strip_tags( $instance['RV_source5'] );
		$instance['RV_cap5'] = $instance['RV_cap5'];			


?>
<div style="width:220px;height:350px;float:left;margin:0px 15px 20px 5px">
<h2>General Settings</h2>
<!--Title -->        
<p>
<label for="<?php echo $this->get_field_id('RV_title'); ?>">Widget Title:</label> 
<input class="widefat" id="<?php echo $this->get_field_id('RV_title'); ?>" name="<?php echo $this->get_field_name('RV_title'); ?>" type="text" value="<?php echo $instance['RV_title']; ?>" />
</p>

<!--Width -->
<p>
<label for="<?php echo $this->get_field_id('RV_width'); ?>">Video Width: </label>
<input class="widefat" id="<?php echo $this->get_field_id('RV_width'); ?>" name="<?php echo $this->get_field_name('RV_width'); ?>" type="text" value="<?php echo $instance['RV_width']; ?>" />
</p>

<!--Height -->
<p>
<label for="<?php echo $this->get_field_id('RV_height'); ?>">Video Height: </label>
<input class="widefat" id="<?php echo $this->get_field_id('RV_height'); ?>" name="<?php echo $this->get_field_name('RV_height'); ?>" type="text" value="<?php echo $instance['RV_height']; ?>" />
</p>

<!--auto play -->
<p>
<label for="<?php echo $this->get_field_id( 'RV_autoplay' ); ?>">Auto Play:</label> 
<select id="<?php echo $this->get_field_id( 'RV_autoplay' );?>" name="<?php echo $this->get_field_name( 'RV_autoplay' );?>" class="widefat" style="width:100%;">';
<option value='1' <?php  if($instance['RV_autoplay'] == '1'){echo 'selected="selected"';}?>>Yes</option>
<option value='0' <?php  if($instance['RV_autoplay'] == '0'){echo 'selected="selected"';}?>>No</option>
</select>
</p>
<p>Please fill up settings before clicking on save to display video.</p>
</div>

<div style="width:220px;height:350px;float:left;margin:0px 15px 20px 0px">
<!--first video setting -->
<h2>Video 1</h2>
<?php
//show video in Random Video Widget Admin
				$autoplaysetting = '0';
				$videoid = $instance['RV_id1'];
				$videosource = $instance['RV_source1']; 
				$videowidth = null;
				$videoheight = null;
				//$admin = true // to show video in admin
				
				VSWShowVideo($videosource,$videoid,$autoplaysetting,$videowidth,$videoheight,'true','false');
?>
<p>
<label for="<?php echo $this->get_field_id( 'RV_source1' ); ?>">Select Video 1 Source:</label> 
<select id="<?php echo $this->get_field_id( 'RV_source1' );?>" name="<?php echo $this->get_field_name( 'RV_source1' );?>" class="widefat" style="width:100%;">
<option value='YouTube' <?php  if($instance['RV_source1'] == 'YouTube'){echo 'selected="selected"';}?> >YouTube Video</option>
<option value='Vimeo' <?php  if($instance['RV_source1'] == 'Vimeo'){echo 'selected="selected"';}?> >Vimeo Video</option>
<option value='MySpace' <?php  if($instance['RV_source1'] == 'MySpace'){echo 'selected="selected"';}?> >MySpace Video</option>
<option value='Veoh' <?php  if($instance['RV_source1'] == 'Veoh'){echo 'selected="selected"';}?> >Veoh Video</option>
<option value='Blip' <?php  if($instance['RV_source1'] == 'Blip'){echo 'selected="selected"';}?> >blip.tv Video</option>
<option value='WordPress' <?php  if($instance['RV_source1'] == 'WordPress'){echo 'selected="selected"';}?> >WordPress Video</option>
<option value='Viddler' <?php  if($instance['RV_source1'] == 'Viddler'){echo 'selected="selected"';}?> >Viddler Video</option>
<option value='DailyMotion' <?php  if($instance['RV_source1'] == 'DailyMotion'){echo 'selected="selected"';}?> >DailyMotion Video</option>
<option value='Revver' <?php  if($instance['RV_source1'] == 'Revver'){echo 'selected="selected"';}?> >Revver Video</option>
<option value='Metacafe' <?php  if($instance['RV_source1'] == 'Metacafe'){echo 'selected="selected"';}?> >Metacafe Video</option>
<option value='Tudou' <?php  if($instance['RV_source1'] == 'Tudou'){echo 'selected="selected"';}?> >Tudou Video</option>
<option value='Youku' <?php  if($instance['RV_source1'] == 'Youku'){echo 'selected="selected"';}?> >Youku Video</option>
<option value='cn6' <?php  if($instance['RV_source1'] == 'cn6'){echo 'selected="selected"';}?> >6.cn Video</option>
<option value='Google' <?php  if($instance['RV_source1'] == 'Google'){echo 'selected="selected"';}?> >Google Video</option>
<option value='Tangle' <?php  if($instance['RV_source1'] == 'Tangle'){echo 'selected="selected"';}?> >Tangle Video</option>
</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('RV_id1'); ?>">Video 1 ID: </label>
<input class="widefat" id="<?php echo $this->get_field_id('RV_id1'); ?>" name="<?php echo $this->get_field_name('RV_id1'); ?>" type="text" value="<?php echo $instance['RV_id1']; ?>" /></p>

<p>
<label for="<?php echo $this->get_field_id('RV_cap1'); ?>">Video Caption: </label>
<input class="widefat" id="<?php echo $this->get_field_id('RV_cap1'); ?>" name="<?php echo $this->get_field_name('RV_cap1'); ?>" type="text" value="<?php echo $instance['RV_cap1']; ?>" /></p>

</div>
<div style="width:220px;height:350px;float:left;margin:0px 15px 20px 0px">

<!--second video setting -->
<h2>Video 2</h2>
<?php
//show video in Random Video Widget Admin
				$autoplaysetting = '0';
				$videoid = $instance['RV_id2'];
				$videosource = $instance['RV_source2']; 
				$videowidth = null;
				$videoheight = null;
				//$admin = true // to show video in admin
				
				VSWShowVideo($videosource,$videoid,$autoplaysetting,$videowidth,$videoheight,'true','false');
?>
<p>
<label for="<?php echo $this->get_field_id( 'RV_source2' ); ?>">Select Video 2 Source:</label> 
<select id="<?php echo $this->get_field_id( 'RV_source2' );?>" name="<?php echo $this->get_field_name( 'RV_source2' );?>" class="widefat" style="width:100%;">
<option value='YouTube' <?php  if($instance['RV_source2'] == 'YouTube'){echo 'selected="selected"';}?> >YouTube Video</option>
<option value='Vimeo' <?php  if($instance['RV_source2'] == 'Vimeo'){echo 'selected="selected"';}?> >Vimeo Video</option>
<option value='MySpace' <?php  if($instance['RV_source2'] == 'MySpace'){echo 'selected="selected"';}?> >MySpace Video</option>
<option value='Veoh' <?php  if($instance['RV_source2'] == 'Veoh'){echo 'selected="selected"';}?> >Veoh Video</option>
<option value='Blip' <?php  if($instance['RV_source2'] == 'Blip'){echo 'selected="selected"';}?> >blip.tv Video</option>
<option value='WordPress' <?php  if($instance['RV_source2'] == 'WordPress'){echo 'selected="selected"';}?> >WordPress Video</option>
<option value='Viddler' <?php  if($instance['RV_source2'] == 'Viddler'){echo 'selected="selected"';}?> >Viddler Video</option>
<option value='DailyMotion' <?php  if($instance['RV_source2'] == 'DailyMotion'){echo 'selected="selected"';}?> >DailyMotion Video</option>
<option value='Revver' <?php  if($instance['RV_source2'] == 'Revver'){echo 'selected="selected"';}?> >Revver Video</option>
<option value='Metacafe' <?php  if($instance['RV_source2'] == 'Metacafe'){echo 'selected="selected"';}?> >Metacafe Video</option>
<option value='Tudou' <?php  if($instance['RV_source2'] == 'Tudou'){echo 'selected="selected"';}?> >Tudou Video</option>
<option value='Youku' <?php  if($instance['RV_source2'] == 'Youku'){echo 'selected="selected"';}?> >Youku Video</option>
<option value='cn6' <?php  if($instance['RV_source2'] == 'cn6'){echo 'selected="selected"';}?> >6.cn Video</option>
<option value='Google' <?php  if($instance['RV_source2'] == 'Google'){echo 'selected="selected"';}?> >Google Video</option>
<option value='Tangle' <?php  if($instance['RV_source2'] == 'Tangle'){echo 'selected="selected"';}?> >Tangle Video</option>
</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('RV_id2'); ?>">Video 2 ID: </label>
<input class="widefat" id="<?php echo $this->get_field_id('RV_id2'); ?>" name="<?php echo $this->get_field_name('RV_id2'); ?>" type="text" value="<?php echo $instance['RV_id2']; ?>" /></p>

<p>
<label for="<?php echo $this->get_field_id('RV_cap2'); ?>">Video Caption: </label>
<input class="widefat" id="<?php echo $this->get_field_id('RV_cap2'); ?>" name="<?php echo $this->get_field_name('RV_cap2'); ?>" type="text" value="<?php echo $instance['RV_cap2']; ?>" /></p>

</div>
<div style="width:220px;height:350px;float:left;margin:0px 15px 20px 0px">

<!--third video setting -->
<h2>Video 3</h2>
<?php
//show video in Random Video Widget Admin
				$autoplaysetting = '0';
				$videoid = $instance['RV_id3'];
				$videosource = $instance['RV_source3']; 
				$videowidth = null;
				$videoheight = null;
				//$admin = true // to show video in admin
				
				VSWShowVideo($videosource,$videoid,$autoplaysetting,$videowidth,$videoheight,'true','false');
?>
<p>
<label for="<?php echo $this->get_field_id( 'RV_source3' ); ?>">Select Video 3 Source:</label> 
<select id="<?php echo $this->get_field_id( 'RV_source3' );?>" name="<?php echo $this->get_field_name( 'RV_source3' );?>" class="widefat" style="width:100%;">
<option value='YouTube' <?php  if($instance['RV_source3'] == 'YouTube'){echo 'selected="selected"';}?> >YouTube Video</option>
<option value='Vimeo' <?php  if($instance['RV_source3'] == 'Vimeo'){echo 'selected="selected"';}?> >Vimeo Video</option>
<option value='MySpace' <?php  if($instance['RV_source3'] == 'MySpace'){echo 'selected="selected"';}?> >MySpace Video</option>
<option value='Veoh' <?php  if($instance['RV_source3'] == 'Veoh'){echo 'selected="selected"';}?> >Veoh Video</option>
<option value='Blip' <?php  if($instance['RV_source3'] == 'Blip'){echo 'selected="selected"';}?> >blip.tv Video</option>
<option value='WordPress' <?php  if($instance['RV_source3'] == 'WordPress'){echo 'selected="selected"';}?> >WordPress Video</option>
<option value='Viddler' <?php  if($instance['RV_source3'] == 'Viddler'){echo 'selected="selected"';}?> >Viddler Video</option>
<option value='DailyMotion' <?php  if($instance['RV_source3'] == 'DailyMotion'){echo 'selected="selected"';}?> >DailyMotion Video</option>
<option value='Revver' <?php  if($instance['RV_source3'] == 'Revver'){echo 'selected="selected"';}?> >Revver Video</option>
<option value='Metacafe' <?php  if($instance['RV_source3'] == 'Metacafe'){echo 'selected="selected"';}?> >Metacafe Video</option>
<option value='Tudou' <?php  if($instance['RV_source3'] == 'Tudou'){echo 'selected="selected"';}?> >Tudou Video</option>
<option value='Youku' <?php  if($instance['RV_source3'] == 'Youku'){echo 'selected="selected"';}?> >Youku Video</option>
<option value='cn6' <?php  if($instance['RV_source3'] == 'cn6'){echo 'selected="selected"';}?> >6.cn Video</option>
<option value='Google' <?php  if($instance['RV_source3'] == 'Google'){echo 'selected="selected"';}?> >Google Video</option>
<option value='Tangle' <?php  if($instance['RV_source3'] == 'Tangle'){echo 'selected="selected"';}?> >Tangle Video</option>
</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('RV_id3'); ?>">Video 3 ID: </label>
<input class="widefat" id="<?php echo $this->get_field_id('RV_id3'); ?>" name="<?php echo $this->get_field_name('RV_id3'); ?>" type="text" value="<?php echo $instance['RV_id3']; ?>" /></p>

<p>
<label for="<?php echo $this->get_field_id('RV_cap3'); ?>">Video Caption: </label>
<input class="widefat" id="<?php echo $this->get_field_id('RV_cap3'); ?>" name="<?php echo $this->get_field_name('RV_cap3'); ?>" type="text" value="<?php echo $instance['RV_cap3']; ?>" /></p>


</div>
<div style="width:220px;height:350px;float:left;margin:0px 15px 20px 5px">

<!--fourth video setting -->
<h2>Video 4</h2>
<?php
//show video in Random Video Widget Admin
				$autoplaysetting = '0';
				$videoid = $instance['RV_id4'];
				$videosource = $instance['RV_source4']; 
				$videowidth = null;
				$videoheight = null;
				//$admin = true // to show video in admin
				
				VSWShowVideo($videosource,$videoid,$autoplaysetting,$videowidth,$videoheight,'true','false');
?>
<p>
<label for="<?php echo $this->get_field_id( 'RV_source4' ); ?>">Select Video 4 Source:</label> 
<select id="<?php echo $this->get_field_id( 'RV_source4' );?>" name="<?php echo $this->get_field_name( 'RV_source4' );?>" class="widefat" style="width:100%;">
<option value='YouTube' <?php  if($instance['RV_source4'] == 'YouTube'){echo 'selected="selected"';}?> >YouTube Video</option>
<option value='Vimeo' <?php  if($instance['RV_source4'] == 'Vimeo'){echo 'selected="selected"';}?> >Vimeo Video</option>
<option value='MySpace' <?php  if($instance['RV_source4'] == 'MySpace'){echo 'selected="selected"';}?> >MySpace Video</option>
<option value='Veoh' <?php  if($instance['RV_source4'] == 'Veoh'){echo 'selected="selected"';}?> >Veoh Video</option>
<option value='Blip' <?php  if($instance['RV_source4'] == 'Blip'){echo 'selected="selected"';}?> >blip.tv Video</option>
<option value='WordPress' <?php  if($instance['RV_source4'] == 'WordPress'){echo 'selected="selected"';}?> >WordPress Video</option>
<option value='Viddler' <?php  if($instance['RV_source4'] == 'Viddler'){echo 'selected="selected"';}?> >Viddler Video</option>
<option value='DailyMotion' <?php  if($instance['RV_source4'] == 'DailyMotion'){echo 'selected="selected"';}?> >DailyMotion Video</option>
<option value='Revver' <?php  if($instance['RV_source4'] == 'Revver'){echo 'selected="selected"';}?> >Revver Video</option>
<option value='Metacafe' <?php  if($instance['RV_source4'] == 'Metacafe'){echo 'selected="selected"';}?> >Metacafe Video</option>
<option value='Tudou' <?php  if($instance['RV_source4'] == 'Tudou'){echo 'selected="selected"';}?> >Tudou Video</option>
<option value='Youku' <?php  if($instance['RV_source4'] == 'Youku'){echo 'selected="selected"';}?> >Youku Video</option>
<option value='cn6' <?php  if($instance['RV_source4'] == 'cn6'){echo 'selected="selected"';}?> >6.cn Video</option>
<option value='Google' <?php  if($instance['RV_source4'] == 'Google'){echo 'selected="selected"';}?> >Google Video</option>
<option value='Tangle' <?php  if($instance['RV_source4'] == 'Tangle'){echo 'selected="selected"';}?> >Tangle Video</option>
</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('RV_id4'); ?>">Video 4 ID: </label>
<input class="widefat" id="<?php echo $this->get_field_id('RV_id4'); ?>" name="<?php echo $this->get_field_name('RV_id4'); ?>" type="text" value="<?php echo $instance['RV_id4']; ?>" /></p>

<p>
<label for="<?php echo $this->get_field_id('RV_cap4'); ?>">Video Caption: </label>
<input class="widefat" id="<?php echo $this->get_field_id('RV_cap4'); ?>" name="<?php echo $this->get_field_name('RV_cap4'); ?>" type="text" value="<?php echo $instance['RV_cap4']; ?>" /></p>

</div>
<div style="width:220px;height:350px;float:left;margin:0px 15px 20px 0px">

<!--fifth video setting -->
<h2>Video 5</h2>
<?php
//show video in Random Video Widget Admin
				$autoplaysetting = '0';
				$videoid = $instance['RV_id5'];
				$videosource = $instance['RV_source5']; 
				$videowidth = null;
				$videoheight = null;
				//$admin = true // to show video in admin
				
				VSWShowVideo($videosource,$videoid,$autoplaysetting,$videowidth,$videoheight,'true','false');
?>
<p>
<label for="<?php echo $this->get_field_id( 'RV_source5' ); ?>">Select Video 5 Source:</label> 
<select id="<?php echo $this->get_field_id( 'RV_source5' );?>" name="<?php echo $this->get_field_name( 'RV_source5' );?>" class="widefat" style="width:100%;">
<option value='YouTube' <?php  if($instance['RV_source5'] == 'YouTube'){echo 'selected="selected"';}?> >YouTube Video</option>
<option value='Vimeo' <?php  if($instance['RV_source5'] == 'Vimeo'){echo 'selected="selected"';}?> >Vimeo Video</option>
<option value='MySpace' <?php  if($instance['RV_source5'] == 'MySpace'){echo 'selected="selected"';}?> >MySpace Video</option>
<option value='Veoh' <?php  if($instance['RV_source5'] == 'Veoh'){echo 'selected="selected"';}?> >Veoh Video</option>
<option value='Blip' <?php  if($instance['RV_source5'] == 'Blip'){echo 'selected="selected"';}?> >blip.tv Video</option>
<option value='WordPress' <?php  if($instance['RV_source5'] == 'WordPress'){echo 'selected="selected"';}?> >WordPress Video</option>
<option value='Viddler' <?php  if($instance['RV_source5'] == 'Viddler'){echo 'selected="selected"';}?> >Viddler Video</option>
<option value='DailyMotion' <?php  if($instance['RV_source5'] == 'DailyMotion'){echo 'selected="selected"';}?> >DailyMotion Video</option>
<option value='Revver' <?php  if($instance['RV_source5'] == 'Revver'){echo 'selected="selected"';}?> >Revver Video</option>
<option value='Metacafe' <?php  if($instance['RV_source5'] == 'Metacafe'){echo 'selected="selected"';}?> >Metacafe Video</option>
<option value='Tudou' <?php  if($instance['RV_source5'] == 'Tudou'){echo 'selected="selected"';}?> >Tudou Video</option>
<option value='Youku' <?php  if($instance['RV_source5'] == 'Youku'){echo 'selected="selected"';}?> >Youku Video</option>
<option value='cn6' <?php  if($instance['RV_source5'] == 'cn6'){echo 'selected="selected"';}?> >6.cn Video</option>
<option value='Google' <?php  if($instance['RV_source5'] == 'Google'){echo 'selected="selected"';}?> >Google Video</option>
<option value='Tangle' <?php  if($instance['RV_source5'] == 'Tangle'){echo 'selected="selected"';}?> >Tangle Video</option>
</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('RV_id5'); ?>">Video 5 ID: </label>
<input class="widefat" id="<?php echo $this->get_field_id('RV_id5'); ?>" name="<?php echo $this->get_field_name('RV_id5'); ?>" type="text" value="<?php echo $instance['RV_id5']; ?>" /></p>

<p>
<label for="<?php echo $this->get_field_id('RV_cap5'); ?>">Video Caption: </label>
<input class="widefat" id="<?php echo $this->get_field_id('RV_cap5'); ?>" name="<?php echo $this->get_field_name('RV_cap5'); ?>" type="text" value="<?php echo $instance['RV_cap5']; ?>" /></p>

</div>
<p style="clear:both"></p>


        <?php

    }

}
//sdded in version 2.3
//create shortcode to use WP_WIDGET class to echo out video 
//[vsw id="123456" source="vimeo" width="400" height="300" autoplay="no"]
function vsw_show_video($atts, $content = null) {
	extract(shortcode_atts(array(
	    "id" => ' ',
		"source" => ' ',
		"width" => ' ',
		"height" => ' ',
		"autoplay" => ' ',
	), $atts));
	
return vsw_show_video_class($id,$source,$width,$height,$autoplay);
}

add_shortcode("vsw", "vsw_show_video");

//function to be used in shortcode or directly in theme
//uses the_widget WordPress Function found in widgets.php
function vsw_show_video_class($id,$source,$width,$height,$autoplay){

        $vsw_id = $id;
		$vsw_width = $width;
		$vsw_height = $height;
        
		//convert string of source to lowercase
        $source = strtolower($source);

        //should have used all lowercase in previous functions
		//now have to switch it.
		switch ($source) {
		
		case null:
		$vsw_source = null;
		break;
		
		case youtube:
		$vsw_source = YouTube;
		break;
		
		case vimeo:
		$vsw_source = Vimeo;
        break;
		
		case myspace:
		$vsw_source = MySpace;
        break;
		
		case veoh:
		$vsw_source = Veoh;
        break;
		
	    case bliptv:
		$vsw_source = Blip;
        break;
		
	    case wordpress:
		$vsw_source = WordPress;
        break;
		
		case viddler:
		$vsw_source = Viddler;
        break;
		
		case dailymotion:
		$vsw_source = DailyMotion;
        break;
				
		
		case revver:
		$vsw_source = Revver;
		break;
		
		case metacafe:
		$vsw_source = Metacafe;
		break;
		
		case tudou:
		$vsw_source = Tudou;
		break;
		
		case youku:
		$vsw_source = Youku;
		break;
		
		case cn6:
		$vsw_source = cn6;
		break;
		
		case google:
		$vsw_source = Google;
		break;
		
		case tangle:
		$vsw_source = Tangle;
		break; 
		
		}
		
		//string to lowercase
		$autoplay = strtolower($autoplay);
		
		//switch autoplay yes or no to 1 or 0
		switch ($autoplay) {
		
		case null:
		$vsw_autoplay = 0;
		break;
		
		case no:
		$vsw_autoplay = 0;
		break;
		
		case yes:
		$vsw_autoplay = 1;
		break;
		
		}
			
	
$vsw_code = VSWShowVideo($vsw_source,$vsw_id,$vsw_autoplay,$vsw_width,$vsw_height,'false','true');

return $vsw_code;

}

//add tinymce button to editor
function dd_vsw_addbuttons() {
   // Don't bother doing this stuff if the current user lacks permissions
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;
 
   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
     add_filter("mce_external_plugins", "dd_vsw_tinymce_plugin");
     add_filter('mce_buttons', 'dd_vsw_button');
   }
}
 
function dd_vsw_button($tiny_buttons) {
   array_push($tiny_buttons, "vsw");
   return $tiny_buttons;
}

function dd_vsw_tinymce_plugin($plugin_array) {
   $plugin_array['vsw'] = get_template_directory_uri().'/functions/widgets/video-sidebar-widgets/editor_plugin.js';
   return $plugin_array;
}
 
// init process for button control
add_action('init', 'dd_vsw_addbuttons');



?>
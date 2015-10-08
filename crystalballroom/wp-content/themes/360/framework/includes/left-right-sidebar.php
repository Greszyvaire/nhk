<?php global $data; ?>

<div class="page-content single">

	<div class="container" id="page-bottom">
	
		<div class="grid4 col left-both" id="left-sidebar">
        	
        	<div class="sidebar-inner">
		
        		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar 01') ) : ?><?php endif; ?>
		
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar 02') ) : ?><?php endif; ?>
					
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar 03') ) : ?><?php endif; ?>
					
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar 04') ) : ?><?php endif; ?>
					
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar 05') ) : ?><?php endif; ?>
				
			</div><!-- END SIDEBAR INNER -->

		</div><!-- END RIGHT SIDEBAR -->
	
		<div class="grid10 col both-sidebars" id="content-wrapper">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
							
				<h1 class="main-title"><?php the_title(); ?></a></h1>
				
				<?php $page_options = get_post_meta($post->ID, 'siiimple_page_options', TRUE); ?>
				
				<?php if(!empty($page_options) && $page_options == 'audio') { ?>
				
					<?php siiimple_audio(get_the_ID()); ?>
				
					<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer left-right"></div>
		
                    <div class="jp-audio-container">
                        <div class="jp-audio">
                            <div class="jp-type-single">
                                <div id="jp_interface_<?php the_ID(); ?>" class="jp-interface">
                                    <ul class="jp-controls">
                                    	<li><div class="seperator-first"></div></li>
                                        <li><div class="seperator-second"></div></li>
                                        <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                                        <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                                        <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                                        <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                                    </ul>
                                    <div class="jp-progress-container">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div class="jp-play-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jp-volume-bar-container">
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				
				<?php } ?>
				
				<?php if(!empty($page_options) && $page_options == 'video') { ?>
				
				<?php $video = get_post_meta($post->ID, 'siiimple_video', TRUE); ?>
				
					<iframe src="<?php echo $video; ?>" width="400" height="220" frameborder="0" class="vid" style="margin-bottom:20px"></iframe>
			
				<?php } ?>
				
				<?php if(!empty($page_options) && $page_options == 'gallery') { ?>
				
				<div class="flexslider loading">
  	    
  	    			<ul class="slides">
  	    	
  	    				<?php 
	  	    			$args = array(
	  	    			'orderby' => 'menu_order',
	  	    			'post_type' => 'attachment',
	  	    			'post_parent'    => get_the_ID(),
	  	    			'post_mime_type' => 'image',
	  	    			'post_status'    => null,
	  	    			'numberposts'    => -1,
	  	    			);
	  	    			$attachments = get_posts($args);
	  	    			?>
	  	    	
	  	   				<?php if ($attachments) : ?>
					 
	  	    			<?php foreach ($attachments as $attachment) : ?>
                        	
	  	    			<?php $attachment_url = wp_get_attachment_url($attachment->ID , 'full');  ?>
						<?php $image = aq_resize($attachment_url, 400,220, true); //resize & retain image proportions (soft crop) ?>
				
						<li><img src="<?php echo $image ?>"/></li>
					
		  	    		<?php endforeach; ?>
                        
		  	    		<?php endif; ?>
		  	    	
		  	    	</ul>
  	    	
  	    		</div><!--FLEXSLIDER LOADING-->
  	    
  	    	<?php } ?>
			
			<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
		
			</div><!-- END POST -->
		
		<?php endwhile; endif; ?>
		
		</div><!-- END GRID10 -->
		
		<div class="grid4 col right-both" id="right-sidebar">
        	
        	<div class="sidebar-inner">
		
        		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar 01') ) : ?><?php endif; ?>
		
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar 02') ) : ?><?php endif; ?>
					
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar 03') ) : ?><?php endif; ?>
					
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar 04') ) : ?><?php endif; ?>
					
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar 05') ) : ?><?php endif; ?>
				
			</div><!-- END SIDEBAR INNER -->

		</div><!-- END RIGHT SIDEBAR -->

	</div><!-- END CONTAINER PAGE BOTTOM -->
	
</div><!-- END PAGE CONTENT -->
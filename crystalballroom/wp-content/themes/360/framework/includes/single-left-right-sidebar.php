<?php global $data; ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
<?php 
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'index-blog' );
$image = aq_resize( $img_url, 1600, 350, true );
?>

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

			<div class="post" id="post-<?php the_ID(); ?>">
			
				<?php if ( has_post_format( 'video' )) { ?>
				
				<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-video">&nbsp;</span></h5>
				
				<?php $video = get_post_meta($post->ID, 'siiimple_video', TRUE); ?>
				
				<iframe src="<?php echo $video; ?>" width="570" height="321" frameborder="0" class="vid"></iframe>
                    
        		<div class="clear" style="height:30px;"></div>
				
				<?php } elseif ( has_post_format( 'gallery' )) { ?>
				
				<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-gallery">&nbsp;</span></h5>
				
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
							<?php $image = aq_resize($attachment_url, 570,300, true); //resize & retain image proportions (soft crop) ?>
				
								<li><img src="<?php echo $image ?>"/></li>
					
		  	    			<?php endforeach; ?>
                        	<?php endif; ?>
		  	    
		  	  			</ul>
  	    	
  	    			</div><!--FLEXSLIDER LOADING-->
  	    			
  	    		<?php } elseif (has_post_format('audio')) { ?>
  	    		
  	    		<?php siiimple_audio(get_the_ID()); ?>
  	    		
  	    		<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-audio">&nbsp;</span></h5>
  	    		
  	    		<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer"></div>
		
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
  	    
  	    		<?php } elseif (has_post_format('quote')) { ?>
  	    		
  	    		<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-quote">&nbsp;</span></h5>
  	    		
  	    		<?php } elseif (has_post_format('link')) { ?>
  	    		
  	    		<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-link">&nbsp;</span></h5>
  	    		
  	    		<?php } elseif (has_post_format('aside')) { ?>
  	    		
  	    		<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-aside">&nbsp;</span></h5>
  	    		
  	    		<?php } elseif (has_post_format('image')) { ?>
  	    		
  	    		<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-image">&nbsp;</span></h5>
  	    		
  	    		 <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
  	    		 
  	    		 	<?php 
						$thumbblog = get_post_thumbnail_id();
						$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
						$imageblog = aq_resize( $img_url_blog, 570, 300, true );
					?>
    
    				<div class="image-wrap">
    
    					<img src="<?php echo $imageblog ?>" class="page-img"/>		
       
    				</div>					
      
   	 			<?php endif; ?>
  	    		
  	    		<?php } else { ?>
  	    		
  	    		
  	    		<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
  	    		 
  	    		 	<?php 
						$thumbblog = get_post_thumbnail_id();
						$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
						$imageblog = aq_resize( $img_url_blog, 570, 300, true );
					?>
    
    				<div class="image-wrap">
    
    					<img src="<?php echo $imageblog ?>" class="page-img"/>		
       
    				</div>					
      
   	 			<?php endif; ?>
  	    		
  	    		<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-normal">&nbsp;</span></h5>
  	    		
  	    		<?php } ?>
				
				<div class="left-excerpt">
        	
    				<ul>
        		
        			<li class="written"><?php _e('Written by','siiimple') ?> <?php the_author_meta('display_name'); ?></li>
        		
        			<li class="posted"><?php _e('Posted','siiimple') ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'siiimple'); ?></li>
        			
        			<li class="comments"><?php comments_popup_link(__('No comments yet', 'siiimple'), __('1 comment', 'siiimple'), __('% comments', 'siiimple')); ?></li>
        			
        				<li class="category">
					
							<?php $category_links = array();
							$categories = get_terms( 'category' );
							if( !is_wp_error( $categories ) ) {
							foreach( $categories as $order => $category ) {
							$url = esc_url( get_category_link( $category->term_id ) );
							$title = esc_attr( $category->name );
							$text = esc_html( $category->name );
							$category_links[] = "\n" . '<a href="' . $url . '" title="' . $title . '" >' . $text . '</a>';
							}
								}
							$category_links_count = count( $category_links );
							if( $category_links_count > 1 )
							print '' . implode( ', ', $category_links );
							else if( $category_links_count === 1 )
							print '' . $category_links_count[0]; ?>
						
						</li>
				
						<?php the_tags( '<li class="tags">', ', ', '</li>'); ?>
        	
       				</ul>
       				
       			</div>
        			
    			<div class="right-excerpt">
        	
     				<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
     				
     				<div class="clear"></div>
        
        			<?php wp_link_pages(' '); ?>
       
    			</div>       
       
			</div><!-- END POST -->
			
			<div class="info-area">  
	
				<div class="bottom-center">
			
					<?php if (function_exists('get_avatar')) { echo get_avatar(get_the_author_meta('user_email'), '80'); }?>   
      
					<h4><?php _e('About','siiimple'); ?> <a href="<?php the_author_meta('user_url'); ?>"><?php the_author_meta('display_name'); ?></a></h4>  
      
					<p><?php the_author_meta('description'); ?></p>
			
				</div>
      	
     		</div>

			<!-- BEGIN COMMENTS SECTION -->
			
			<?php $comments = get_post_meta($post->ID, 'siiimple_comments', TRUE); ?>
			
			<?php if(!empty($comments) && $comments == 'wordpress') { ?>
			<?php comments_template(); ?>
			<?php } ?>
			
			<?php if(!empty($comments) && $comments == 'facebook') { ?>
			
			<iframe src="http://www.facebook.com/plugins/comments.php?href=<?php the_permalink(); ?>&permalink=1" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:130px; height:16px;" allowTransparency="true"></iframe>

			<div id="fb-comment-form">
			<?php if ( comments_open() ) : ?>
			<div id="fbcomments" class="fb-comments"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="<?php the_permalink(); ?>"></fb:comments></div>
			<?php endif; ?>
			<?php if ( ! comments_open() ) : ?>
			<p><?php _e( 'Comments are closed.', 'siiimple' ); ?></p>
			<?php endif; ?>
			</div>
			<div class="clear" style="height:100px;"></div>
			<?php } ?>
			
			<!-- END COMMENTS SECTION -->

			<?php endwhile; else: ?>
	
			<p><?php _e('Sorry, no posts matched your criteria.','siiimple') ?></p>
			<?php endif; ?>
	
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
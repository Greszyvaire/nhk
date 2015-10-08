<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 */
global $data;
get_header();
?>

<?php $social = get_post_meta($post->ID, 'siiimple_social_media', TRUE); ?>
<?php if(!empty($social) && $social == 'light') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar-light.php'); ?>
<?php } else if (!empty($social) && $social == 'dark') { ?> 
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar.php'); ?>
<?php } else if (!empty($social) && $social == 'none') { ?> 
<?php } ?>

<?php $enable_single = get_post_meta($post->ID, 'siiimple_single_meta', TRUE); ?>

<?php if(!empty($enable_single) && $enable_single == 'right-sidebar') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/single-right-sidebar.php'); ?>

<?php } else if (!empty($enable_single) && $enable_single == 'left-sidebar') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/single-left-sidebar.php'); ?>

<?php } else if (!empty($enable_single) && $enable_single == 'left-right-sidebar') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/single-left-right-sidebar.php'); ?>

<?php } else if (!empty($enable_single) && $enable_single == 'full-width') { ?>

	<?php include (TEMPLATEPATH . '/framework/includes/single-full-width.php'); ?>

<?php } else { ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
<?php 
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'index-blog' );
$image = aq_resize( $img_url, 1600, 350, true );
?>

<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
	
	<div class="line"></div>
	
	<div id="bg-bg">
		<?php echo get_the_post_thumbnail($page->ID, 'full'); ?>
	</div>

<?php } else { ?> 

	<div class="line"></div>

	<div id="bg-bg">
		<img src="<?php echo get_template_directory_uri(); ?>/framework/images/no-image.png">
	</div>

<?php } ?>

<div class="page-content single">

<?php $social = get_post_meta($post->ID, 'siiimple_social_media', TRUE); ?>
<?php if(!empty($social) && $social == 'light') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar-light.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'dark') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'none') { ?>
<?php } ?>

	<div class="container" id="page-bottom">
	
		<div class="grid10 col full-width" id="content-wrapper">

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
				
				<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
       
    		</div><!-- END POST -->

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
	
				<p><?php _e( 'Sorry, nothing matches your criteria.', 'siiimple' ); ?></p>

			<?php endif; ?>
	
		</div><!-- END GRID10 -->
	
	</div><!-- END CONTAINER PAGE BOTTOM -->
	
</div><!-- END PAGE CONTENT -->

<?php get_footer(); ?>

<?php } ?>
<div class="blog-content-wrap">
	
			<div class="grid10 col full-width" id="content-wrapper">
		
				<?php query_posts( array('post_type'=> 'post','paged'=>$paged )); ?>
				<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?> 
        	
        			<?php if ( has_post_format( 'gallery' )) { ?>
        			
        				<div class="post" id="post-<?php the_ID(); ?>">
        		
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
				<?php $image = aq_resize($attachment_url, 960,400, true); //resize & retain image proportions (soft crop) ?>
				
								
				<li><img src="<?php echo $image ?>"/></li>
					
		  	    <?php endforeach; ?>
                        
		  	    <?php endif; ?>
		  	    
		  	</ul>
  	    	
  	    </div><!--FLEXSLIDER LOADING-->
  	    
  	    <div class="sidewrapper">
  	    
  		<div class="left-excerpt">
        	
    	<ul>
        		
        	<li class="written"><?php _e('Written by','siiimple') ?> <?php the_author_meta('display_name'); ?></li>
        		
        			<li class="posted"><?php _e('Posted','siiimple') ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'siiimple'); ?></li>
        			<li class="comments"><?php comments_popup_link(__('No comments yet', 'siiimple'), __('1 comment', 'siiimple'), __('% comments', 'siiimple')); ?></li>
        		
        	<?php if ($category) { ?>
        	<li class="category">
					
					<?php
					$output = '';
					foreach((get_the_category()) as $category) {
					if($category->name==$homecat) continue;
					$category_id = get_cat_ID( $category->cat_name );
					$category_link = get_category_link( $category_id );
					if(!empty($output))
					$output .= ', ';
					$output .= '<span class="cat"><a href="'.$category_link.'">'.$category->cat_name.'</a></span>';
					} echo $output;
					?>
					
			</li>
			<?php } ?>
				
			<?php the_tags( '<li class="tags">', ', ', '</li>'); ?>
        	
       </ul>
        			
    </div>
        			
    <div class="right-excerpt">
        	
        <?php the_excerpt(); ?>
       
    </div>
    
    <div class="clear"></div>
    
    </div>

</div><!-- END POST -->
        			
        			<?php } ?>
        			
        			<?php if ( has_post_format( 'audio' )) { ?>
        			
        			<?php siiimple_audio(get_the_ID()); ?>

<?php 
$thumbblog = get_post_thumbnail_id();
$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
$imageblog = aq_resize( $img_url_blog, 960, 400, true );
?>

<div class="post" id="post-<?php the_ID(); ?>">
        		
	<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-audio">&nbsp;</span></h5>
	
	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
    
    	<div class="image-wrap">
    
    		<img src="<?php echo $imageblog ?>" class="page-img" style="margin-bottom:0"/>		
       
    	</div>					
      
    <?php endif; ?>
	
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
                    
        <div class="clear"></div>
        
        <div class="sidewrapper">
  	    
  			<div class="left-excerpt">
        	
    			<ul>
        		
        			<li class="written"><?php _e('Written by','siiimple') ?> <?php the_author_meta('display_name'); ?></li>
        		
        			<li class="posted"><?php _e('Posted','siiimple') ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'framework'); ?></li>
        			<li class="comments"><?php comments_popup_link(__('No comments yet', 'siiimple'), __('1 comment', 'siiimple'), __('% comments', 'siiimple')); ?></li>
        		
        			<li class="category">
					
					<?php
					$output = '';
					foreach((get_the_category()) as $category) {
					if($category->name==$homecat) continue;
					$category_id = get_cat_ID( $category->cat_name );
					$category_link = get_category_link( $category_id );
					if(!empty($output))
					$output .= ', ';
					$output .= '<span class="cat"><a href="'.$category_link.'">'.$category->cat_name.'</a></span>';
					} echo $output;
					?>
					
					</li>
				
					<?php the_tags( '<li class="tags">', ', ', '</li>'); ?>
        	
       			</ul>
        			
    		</div>
        			
    <div class="right-excerpt">
        	
        <?php the_excerpt(); ?>
       
    </div>
    
    <div class="clear"></div>
    
    </div>

</div><!-- END POST -->
        			
        			<?php } ?>
        			
        			<?php if ( has_post_format( 'image' )) { ?>
        			
        			<?php 
$thumbblog = get_post_thumbnail_id();
$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
$imageblog = aq_resize( $img_url_blog, 960, 400, true );
?>

<div class="post" id="post-<?php the_ID(); ?>">
        		
	<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-image">&nbsp;</span></h5>
        		
    	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
    
    	<div class="image-wrap">
    
    		<img src="<?php echo $imageblog ?>" class="page-img"/>		
       
    	</div>					
      
    <?php endif; ?>
    
     <div class="sidewrapper">
        				
    <div class="left-excerpt">
        	
    	<ul>
        		
        	<li class="written"><?php _e('Written by','siiimple') ?> <?php the_author_meta('display_name'); ?></li>
        		
        			<li class="posted"><?php _e('Posted','siiimple') ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'framework'); ?></li>
        			<li class="comments"><?php comments_popup_link(__('No comments yet', 'siiimple'), __('1 comment', 'siiimple'), __('% comments', 'siiimple')); ?></li>
        		
        	<li class="category">
					
					<?php
					$output = '';
					foreach((get_the_category()) as $category) {
					if($category->name==$homecat) continue;
					$category_id = get_cat_ID( $category->cat_name );
					$category_link = get_category_link( $category_id );
					if(!empty($output))
					$output .= ', ';
					$output .= '<span class="cat"><a href="'.$category_link.'">'.$category->cat_name.'</a></span>';
					} echo $output;
					?>
					
			</li>
				
			<?php the_tags( '<li class="tags">', ', ', '</li>'); ?>
        	
       </ul>
        			
    </div>
        			
    <div class="right-excerpt">
        	
        <?php the_excerpt(); ?>
       
    </div>
    
    <div class="clear"></div>
      </div>

</div><!-- END POST -->
        			
        			<?php } ?>
        			
        			<?php if ( has_post_format( 'link' )) { ?>
        			
        			<div class="post link" id="post-<?php the_ID(); ?>">

	<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-link">&nbsp;</span></h5>

	<a href="#"><?php the_content(); ?></a>
	
		<p class="link-date">Posted <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'framework'); ?></p>
   
</div><!-- END POST -->
        			
        			<?php } ?>
        			
        			<?php if ( has_post_format( 'quote' )) { ?>
        			
        			<div class="post quote" id="post-<?php the_ID(); ?>">

	<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-quote-small">&nbsp;</span></h5>

	<?php the_content(); ?>
   
</div><!-- END POST -->
        			
        			<?php } ?>
        			
        			<?php if ( has_post_format( 'aside' )) { ?>
        			
        			<div class="post aside" id="post-<?php the_ID(); ?>">

<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-aside">&nbsp;</span></h5>
 

<div class="left-excerpt">
        	
    	<ul>
        		
        	<li class="written"><?php _e('Written by','siiimple') ?> <?php the_author_meta('display_name'); ?></li>
        		
        			<li class="posted"><?php _e('Posted','siiimple') ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'framework'); ?></li>
        			<li class="comments"><?php comments_popup_link(__('No comments yet', 'siiimple'), __('1 comment', 'siiimple'), __('% comments', 'siiimple')); ?></li>
        		
        	<li class="category">
					
					<?php
					$output = '';
					foreach((get_the_category()) as $category) {
					if($category->name==$homecat) continue;
					$category_id = get_cat_ID( $category->cat_name );
					$category_link = get_category_link( $category_id );
					if(!empty($output))
					$output .= ', ';
					$output .= '<span class="cat"><a href="'.$category_link.'">'.$category->cat_name.'</a></span>';
					} echo $output;
					?>
					
			</li>
				
			<?php the_tags( '<li class="tags">', ', ', '</li>'); ?>
        	
       </ul>
        			
    </div>
        			
    <div class="right-excerpt">
    
    	<?php if ( ! has_excerpt() ) { ?>
            
            <?php the_content(); ?>
          
            <?php } else {
            the_excerpt();
            }?>
    
    </div>

</div><!-- END POST -->
        			
        			<?php } ?>

        		<?php endwhile; ?><?php endif; ?>
    	
        	</div><!--END GRID 10-->  
			
		</div><!-- END BLOG CONTENT WRAP -->
		
		<div class="clear"></div>

		<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
		
	</div><!-- END CONTAINER -->
			
</div><!-- END PAGE CONTENT -->
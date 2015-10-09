<div class="post" id="post-<?php the_ID(); ?>">
        		
	<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><a href="<?php echo get_post_format_link('gallery'); ?>"><span class="post-type-gallery">&nbsp;</span></a></h5>
	
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
  	    
  	    <div class="sidewrapper">
  	    
  		<div class="left-excerpt">
        	
    	<ul>
        		
        	<li class="written"><?php _e('Written by','siiimple') ?> <?php the_author_meta('display_name'); ?></li>
        		
        	<li class="posted"><?php _e('Posted','siiimple') ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'siiimple'); ?></li>
        	
        	<li class="comments"><?php comments_popup_link(__('No comments yet', 'siiimple'), __('1 comment', 'siiimple'), __('% comments', 'siiimple')); ?></li>        		
        	
        	<li class="category"><?php echo get_the_category_list( __( ', ', 'siiimple' ) ); ?></li>
				
			<?php the_tags( '<li class="tags">', ', ', '</li>'); ?>
        	
       </ul>
        			
    </div>
        			
    <div class="right-excerpt">
        	
        <?php the_excerpt(); ?>
       
    </div>
    
    <div class="clear"></div>
    
    </div>

</div><!-- END POST -->
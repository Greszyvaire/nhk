<div class="sidewrapper">
  	    
	<div class="left-excerpt">
        	
    	<ul>
        		
        	<li class="written"><?php _e('Written by','siiimple') ?> <?php the_author_meta('display_name'); ?></li>
        	<li class="posted"><?php _e('Posted','siiimple') ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'siiimple'); ?></li>
        	<li class="comments"><?php comments_popup_link(__('No comments yet', 'siiimple'), __('1 comment', 'siiimple'), __('% comments', 'siiimple')); ?></li>
        	<li class="category"><?php echo get_the_category_list( __( ', ', 'siiimple' ) ); ?></li>			
				
			<?php the_tags( '<li class="tags">', ', ', '</li>'); ?>
        	
       </ul><!-- END UL -->
        			
    </div><!-- END LEFT EXCERPT -->
        			
    <div class="right-excerpt">
        	
        <?php the_excerpt(); ?>
       
    </div><!-- END RIGHT EXCERPT -->
    
    <div class="clear"></div>
    
</div><!-- END SIDEWRAPPER -->
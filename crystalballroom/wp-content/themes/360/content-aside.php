<div class="post aside" id="post-<?php the_ID(); ?>">

<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><a href="<?php echo get_post_format_link('aside'); ?>"><span class="post-type-aside">&nbsp;</span></a></h5>
 
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
    
    	<?php if ( ! has_excerpt() ) { ?>
            
            <?php the_content(); ?>
          
            <?php } else {
            the_excerpt();
            }?>
    
    </div>

</div><!-- END POST -->
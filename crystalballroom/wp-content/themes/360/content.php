<?php 
$thumbblog = get_post_thumbnail_id();
$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
$imageblog = aq_resize( $img_url_blog, 570, 300, true );
?>

<div class="post normal" id="post-<?php the_ID(); ?>">
        		
		<h5 class="main-title-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="post-type-normal">&nbsp;</span></h5>

    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
    
    	<div class="image-wrap">
    
    		<div class="post-type-image">&nbsp;</div>
        
    		<img src="<?php echo $imageblog ?>" class="page-img"/>		
       
    	</div>					
      
    <?php endif; ?>
        				
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
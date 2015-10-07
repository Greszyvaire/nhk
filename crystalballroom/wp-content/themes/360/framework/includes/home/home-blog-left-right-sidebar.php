<div class="blog-content-wrap">
		
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
		
				<?php query_posts( array('post_type'=> 'post','paged'=>$paged )); ?>
				<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?> 
        	
        			<?php get_template_part( 'content', get_post_format() ); ?>

        		<?php endwhile; ?><?php endif; ?>
        		
        		<div class="clear"></div>

				<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
    	
        	</div><!--END GRID 10--> 
        	
        	<div class="grid4 col right-both" id="right-sidebar">
        	
        		<div class="sidebar-inner">
		
        			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar 01') ) : ?><?php endif; ?>
		
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar 02') ) : ?><?php endif; ?>
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar 03') ) : ?><?php endif; ?>
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar 04') ) : ?><?php endif; ?>
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar 05') ) : ?><?php endif; ?>
				
			</div><!-- END SIDEBAR INNER -->

			</div><!-- END RIGHT SIDEBAR --> 
			
		</div><!-- END BLOG CONTENT WRAP -->
		
	</div><!-- END CONTAINER -->
			
</div><!-- END PAGE CONTENT -->
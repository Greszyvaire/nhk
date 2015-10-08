<div class="blog-content-wrap">
		
			<div class="grid4 col" id="left-sidebar">
        	
        		<div class="sidebar-inner">
		
        			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar 01') ) : ?><?php endif; ?>
		
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar 02') ) : ?><?php endif; ?>
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar 03') ) : ?><?php endif; ?>
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar 04') ) : ?><?php endif; ?>
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar 05') ) : ?><?php endif; ?>
				
			</div><!-- END SIDEBAR INNER -->

			</div><!-- END RIGHT SIDEBAR -->
	
			<div class="grid10 col" id="content-wrapper">
		
				<?php query_posts( array('post_type'=> 'post','paged'=>$paged )); ?>
				<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?> 
        	
        			<?php get_template_part( 'content', get_post_format() ); ?>

        		<?php endwhile; ?><?php endif; ?>
    	
        	</div><!--END GRID 10-->
        	
        </div><!-- END BLOG CONTENT WRAP -->
		
		<div class="clear"></div>
		
		<div class="lsidebar-paginate">

		<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
		
		</div>
		
	</div><!-- END CONTAINER -->
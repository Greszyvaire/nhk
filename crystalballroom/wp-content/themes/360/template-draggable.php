<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 * Template Name: Template Draggable
 */
global $data;
get_header(); ?>

	<script id="previewTmpl" type="text/x-jquery-tmpl">
			<div id="ib-img-preview" class="ib-preview">
               <img src="${src}" alt="" class="ib-preview-img"/>
                <span class="ib-preview-descr" style="display:none;">${description}</span>
                <div class="ib-nav" style="display:none;">
                    <span class="ib-nav-prev">Previous</span>
                    <span class="ib-nav-next">Next</span>
                </div>
                <span class="ib-close" style="display:none;">Close Preview</span>
                <div class="ib-loading-large" style="display:none;">Loading...</div>
            </div>		
		</script>
		<script id="contentTmpl" type="text/x-jquery-tmpl">	
			<div id="ib-content-preview" class="ib-content-preview">
                <div class="ib-teaser" style="display:none;">{{html teaser}}</div>
                <div class="ib-content-full" style="display:none;">{{html content}}</div>
                <span class="ib-close" style="display:none;">Close Preview</span>
            </div>
		</script>	

		<div id="ib-main-wrapper" class="ib-main-wrapper">
                
                <div class="ib-main">
                
                	<?php 
						// Set the page to be pagination
						$paged = get_query_var('paged') ? get_query_var('paged') : 1;
						
						// Query Out Database
						$wpbp = new WP_Query(array( 'post_type' => 'gallery', 'posts_per_page' =>'-1', 'paged' => $paged ) ); 
					?>
					
					<?php
						// Begin The Loop
						if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 
					?>
					
					<?php 
						$thumbblog = get_post_thumbnail_id();
						$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
						$imageblog = aq_resize( $img_url_blog, 333, 333, true );
						
						$thumbblogfull = get_post_thumbnail_id();
						$img_url_blogfull = wp_get_attachment_url( $thumbblogfull,'index-blog' );
						$imageblogfull = aq_resize( $img_url_blogfull, 1024, 680, true );
					?>
                    
                    <a href="#"><img src="<?php echo $imageblog ?>" data-largesrc="<?php echo $imageblogfull ?>" alt=""/><span><?php the_title(); ?></span></a>
					
					<?php $count++; // Increase the count by 1 ?>		
					<?php endwhile; endif; // END the Wordpress Loop ?>
					<?php wp_reset_query(); // Reset the Query Loop?>
					
					<div class="clr"></div>
				</div><!-- ib-main -->
            </div><!-- ib-main-wrapper -->

		<?php wp_footer(); ?>
		
	</body>

</html>
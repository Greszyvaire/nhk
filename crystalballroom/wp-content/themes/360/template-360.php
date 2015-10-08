<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 * Template Name: Template 360
 */
global $data;
get_header(); ?>

<?php 
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'index-blog' );
$image = aq_resize( $img_url, 5000, 1024, true );

$thumb_mobile = get_post_thumbnail_id();
$img_url_mobile = wp_get_attachment_url( $thumb_mobile,'index-blog' );
$image_mobile = aq_resize( $img_url_mobile, 600, 500, true );

$thumb_800 = get_post_thumbnail_id();
$img_url_800 = wp_get_attachment_url( $thumb_800,'index-blog' );
$image_800 = aq_resize( $img_url_800, 800, 800, true );

$template_360 = get_post_meta($post->ID, 'siiimple_template_360', TRUE);

$cord1 = get_post_meta($post->ID, 'siiimple_hotspot1', TRUE);
$cord_img1 = get_post_meta($post->ID, 'siiimple_hotspot_img1', TRUE);
$cord_title1 = get_post_meta($post->ID, 'siiimple_hotspot_title1', TRUE);

$cord2 = get_post_meta($post->ID, 'siiimple_hotspot2', TRUE);
$cord_img2 = get_post_meta($post->ID, 'siiimple_hotspot_img2', TRUE);
$cord_title2 = get_post_meta($post->ID, 'siiimple_hotspot_title2', TRUE);

$cord3 = get_post_meta($post->ID, 'siiimple_hotspot3', TRUE);
$cord_img3 = get_post_meta($post->ID, 'siiimple_hotspot_img3', TRUE);
$cord_title3 = get_post_meta($post->ID, 'siiimple_hotspot_title3', TRUE);

$cord4 = get_post_meta($post->ID, 'siiimple_hotspot4', TRUE);
$cord_img4 = get_post_meta($post->ID, 'siiimple_hotspot_img4', TRUE);
$cord_title4 = get_post_meta($post->ID, 'siiimple_hotspot_title4', TRUE);

$cord5 = get_post_meta($post->ID, 'siiimple_hotspot5', TRUE);
$cord_img5 = get_post_meta($post->ID, 'siiimple_hotspot_img5', TRUE);
$cord_title5 = get_post_meta($post->ID, 'siiimple_hotspot_title5', TRUE);

$cord6 = get_post_meta($post->ID, 'siiimple_hotspot6', TRUE);
$cord_inline = get_post_meta($post->ID, 'siiimple_hotspot_inline', TRUE);
$cord_title6 = get_post_meta($post->ID, 'siiimple_hotspot_title6', TRUE);

$cord7 = get_post_meta($post->ID, 'siiimple_hotspot7', TRUE);
$cord_img7 = get_post_meta($post->ID, 'siiimple_hotspot_img7', TRUE);
$cord_title7 = get_post_meta($post->ID, 'siiimple_hotspot_title7', TRUE);

$cord8 = get_post_meta($post->ID, 'siiimple_hotspot8', TRUE);
$cord_img8 = get_post_meta($post->ID, 'siiimple_hotspot_img8', TRUE);
$cord_title8 = get_post_meta($post->ID, 'siiimple_hotspot_title8', TRUE);

$cord9 = get_post_meta($post->ID, 'siiimple_hotspot9', TRUE);
$cord_img9 = get_post_meta($post->ID, 'siiimple_hotspot_img9', TRUE);
$cord_title9 = get_post_meta($post->ID, 'siiimple_hotspot_title9', TRUE);
?>


<div class="panorama">

<div class="preloader"></div>
	
	<div class="panorama-view">
		
		<div class="panorama-container">
		
			<img src="<?php echo $image ?>" usemap="hotspots_current" data-width="5000" data-height="1024" alt="<?php echo $text; ?>" />
			
			<div data-picture data-alt="<?php echo $text; ?>">
				<div data-src="<?php echo $image_mobile ?>" usemap="hotspots_current" data-width="600" data-height="500" alt="<?php echo $text; ?>"></div>
				<div data-src="<?php echo $image_mobile ?>" usemap="hotspots_current" data-width="600" data-height="500" alt="<?php echo $text; ?>" data-media="(min-width: 320px)"></div>
				<div data-src="<?php echo $image_mobile ?>" usemap="hotspots_current" data-width="600" data-height="500" alt="<?php echo $text; ?>" data-media="(min-width: 420px)"></div>
				<div data-src="<?php echo $image_800 ?>" usemap="hotspots_current" data-width="800" data-height="800" alt="<?php echo $text; ?>" data-media="(min-width: 800px)"></div>
				<div data-src="<?php echo $image ?>" usemap="hotspots_current" data-width="5000" data-height="1024" alt="<?php echo $text; ?>" data-media="(min-width: 1000px)"></div>

				<!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
				<noscript><img src="<?php echo $image ?>" usemap="hotspots_current" data-width="5000" data-height="1024" alt="<?php echo $text; ?>"></noscript>
			</div>
				
				<map id="hotspots_current" name="hotspots_current"> 
					
					<?php if ( $cord1 ) {?> 
					<area class="hotspot" shape="rect" coords="<?php echo $cord1; ?>" href="<?php echo $cord_img1; ?>" alt="<?php echo $cord_title1; ?>" />
					<?php } ?>
					
					<?php if ( $cord2 ) {?> 
					<area class="hotspot" shape="rect" coords="<?php echo $cord2; ?>" href="<?php echo $cord_img2; ?>" alt="<?php echo $cord_title2; ?>" />
					<?php } ?>
					
					<?php if ( $cord3 ) {?> 
					<area class="hotspot" shape="rect" coords="<?php echo $cord3; ?>" href="<?php echo $cord_img3; ?>" alt="<?php echo $cord_title3; ?>" />
					<?php } ?>
					
					<?php if ( $cord4 ) {?> 
					<area class="hotspot" shape="rect" coords="<?php echo $cord4; ?>" href="<?php echo $cord_img4; ?>" alt="<?php echo $cord_title4; ?>" />
					<?php } ?>
					
					<?php if ( $cord5 ) {?> 
					<area class="hotspot" shape="rect" coords="<?php echo $cord5; ?>" href="<?php echo $cord_img5; ?>" alt="<?php echo $cord_title5; ?>" />
					<?php } ?>
					
					<?php if ( $cord6 ) {?> 
					<area class="hotspot" shape="rect" coords="<?php echo $cord6; ?>" href="#inlineOne" alt="<?php echo $cord_title6; ?>" />
					<?php } ?>
					
					<?php if ( $cord7 ) {?> 
					<area class="hotspot" shape="rect" coords="<?php echo $cord7; ?>" href="<?php echo $cord_img7; ?>" alt="<?php echo $cord_title7; ?>" />
					<?php } ?>
					
					<?php if ( $cord8 ) {?> 
					<area class="hotspot" shape="rect" coords="<?php echo $cord8; ?>" href="<?php echo $cord_img8; ?>" alt="<?php echo $cord_title8; ?>" />
					<?php } ?>
					
					<?php if ( $cord9 ) {?> 
					<area class="hotspot" shape="rect" coords="<?php echo $cord9; ?>" href="<?php echo $cord_img9; ?>" alt="<?php echo $cord_title9; ?>" />
					<?php } ?>
				
				</map>
			
		</div><!-- END PC -->
	
	</div><!-- END PV-->

	
	<?php if($data['disable_thumbnails'] !='disable') { ?>

	<div id="thumbnails" class="hide">
        
        <ul>
        	<?php 
				// Set the page to be pagination
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
						
				// Query Out Database
				$wpbp = new WP_Query(array( 'post_type' => 'panorama', 'posts_per_page' =>'-1', 'paged' => $paged ) ); 
				
			?>
					
			<?php
				// Begin The Loop
				if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 
			?>
			
			<?php 
				$thumbblog = get_post_thumbnail_id();
				$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
				$imageblog = aq_resize( $img_url_blog, 155, 125, true );
				$thumbblogfull = get_post_thumbnail_id();
				$img_url_blogfull = wp_get_attachment_url( $thumbblogfull,'index-blog' );
				$imageblogfull = aq_resize( $img_url_blogfull, 5000, 1024, true );
				$large_image = get_post_thumbnail_id(get_the_ID(), 'fullsize', false, '' );
				
				$cord1 = get_post_meta($post->ID, 'siiimple_hotspot1', TRUE);
				$cord_img1 = get_post_meta($post->ID, 'siiimple_hotspot_img1', TRUE);
				$cord_title1 = get_post_meta($post->ID, 'siiimple_hotspot_title1', TRUE);
				
				$cord2 = get_post_meta($post->ID, 'siiimple_hotspot2', TRUE);
				$cord_img2 = get_post_meta($post->ID, 'siiimple_hotspot_img2', TRUE);
				$cord_title2 = get_post_meta($post->ID, 'siiimple_hotspot_title2', TRUE);
				
				$cord3 = get_post_meta($post->ID, 'siiimple_hotspot3', TRUE);
				$cord_img3 = get_post_meta($post->ID, 'siiimple_hotspot_img3', TRUE);
				$cord_title3 = get_post_meta($post->ID, 'siiimple_hotspot_title3', TRUE);
				
				$cord4 = get_post_meta($post->ID, 'siiimple_hotspot4', TRUE);
				$cord_img4 = get_post_meta($post->ID, 'siiimple_hotspot_img4', TRUE);
				$cord_title4 = get_post_meta($post->ID, 'siiimple_hotspot_title4', TRUE);

				$cord5 = get_post_meta($post->ID, 'siiimple_hotspot5', TRUE);
				$cord_img5 = get_post_meta($post->ID, 'siiimple_hotspot_img5', TRUE);
				$cord_title5 = get_post_meta($post->ID, 'siiimple_hotspot_title5', TRUE);
				
				$cord6 = get_post_meta($post->ID, 'siiimple_hotspot6', TRUE);
				$cord_inline = get_post_meta($post->ID, 'siiimple_hotspot_inline', TRUE);
				$cord_title6 = get_post_meta($post->ID, 'siiimple_hotspot_title6', TRUE);
				
				$cord7 = get_post_meta($post->ID, 'siiimple_hotspot7', TRUE);
				$cord_img7 = get_post_meta($post->ID, 'siiimple_hotspot_img7', TRUE);
				$cord_title7 = get_post_meta($post->ID, 'siiimple_hotspot_title7', TRUE);
				
				$cord8 = get_post_meta($post->ID, 'siiimple_hotspot8', TRUE);
				$cord_img8 = get_post_meta($post->ID, 'siiimple_hotspot_img8', TRUE);
				$cord_title8 = get_post_meta($post->ID, 'siiimple_hotspot_title8', TRUE);
				
				$cord9 = get_post_meta($post->ID, 'siiimple_hotspot9', TRUE);
				$cord_img9 = get_post_meta($post->ID, 'siiimple_hotspot_img9', TRUE);
				$cord_title9 = get_post_meta($post->ID, 'siiimple_hotspot_title9', TRUE);
				
			
			?>
			
			<li class="thumbers">
			
				<a href="<?php echo $imageblogfull; ?>" data-title="<?php the_title(); ?>" data-description="<?php remove_filter ('the_content', 'wpautop'); echo htmlentities(get_the_content()); ?>"><img src="<?php echo $imageblog ?>" alt="" /></a>
				
				
				<div style="display:none">
					
					<img src="<?php echo $imageblogfull ?>" usemap="hotspots<?php the_ID(); ?>" data-width="5000" data-height="1024" alt="" />
					
					
					<?php if ( $cord1 ) {?> 
					<map id="hotspots<?php the_ID(); ?>" name="hotspots<?php the_ID(); ?>">
							
							<area class="hotspot" shape="rect" coords="<?php echo $cord1; ?>" href="<?php echo $cord_img1; ?>" alt="<?php echo $cord_title1; ?>" />
					</map>
					<?php } ?>
					
					
					<?php if ( $cord2 ) {?> 
					<map id="hotspots<?php the_ID(); ?>" name="hotspots<?php the_ID(); ?>">
							
							<area class="hotspot" shape="rect" coords="<?php echo $cord2; ?>" href="<?php echo $cord_img2; ?>" alt="<?php echo $cord_title2; ?>" />
					</map>
					<?php } ?>
					
					
					<?php if ( $cord3 ) {?> 
					
					<map id="hotspots<?php the_ID(); ?>" name="hotspots<?php the_ID(); ?>">
							
							<area class="hotspot" shape="rect" coords="<?php echo $cord3; ?>" href="<?php echo $cord_img3; ?>" alt="<?php echo $cord_title3; ?>" />
					
					</map>
					<?php } ?>
					
					
					<?php if ( $cord4 ) {?> 
					<map id="hotspots<?php the_ID(); ?>" name="hotspots<?php the_ID(); ?>">
							
							<area class="hotspot" shape="rect" coords="<?php echo $cord4; ?>" href="<?php echo $cord_img4; ?>" alt="<?php echo $cord_title4; ?>" />
					
					</map>
					<?php } ?>
					
					
					<?php if ( $cord5 ) {?> 
					<map id="hotspots<?php the_ID(); ?>" name="hotspots<?php the_ID(); ?>">
							
							<area class="hotspot" shape="rect" coords="<?php echo $cord5; ?>" href="<?php echo $cord_img5; ?>" alt="<?php echo $cord_title5; ?>" />
					
					</map>
					<?php } ?>
					
					
					<?php if ( $cord6 ) {?> 
					<map id="hotspots<?php the_ID(); ?>" name="hotspots<?php the_ID(); ?>">
							
							<area class="hotspot" shape="rect" coords="<?php echo $cord6; ?>" href="#inline" alt="" />
					</map>
					<?php } ?>
					
					<?php if ( $cord7 ) {?> 
					<map id="hotspots<?php the_ID(); ?>" name="hotspots<?php the_ID(); ?>">
							
							<area class="hotspot" shape="rect" coords="<?php echo $cord7; ?>" href="<?php echo $cord_img7; ?>" alt="" />
					</map>
					<?php } ?>
					
					<?php if ( $cord8 ) {?> 
					<map id="hotspots<?php the_ID(); ?>" name="hotspots<?php the_ID(); ?>">
							
							<area class="hotspot" shape="rect" coords="<?php echo $cord8; ?>" href="<?php echo $cord_img8; ?>" alt="" />
					</map>
					<?php } ?>
					
					<?php if ( $cord9 ) {?> 
					<map id="hotspots<?php the_ID(); ?>" name="hotspots<?php the_ID(); ?>">
							
							<area class="hotspot" shape="rect" coords="<?php echo $cord9; ?>" href="<?php echo $cord_img9; ?>" alt="" />
					</map>
					<?php } ?>
				
				</div>
			
			</li>
			
			<?php endwhile; endif; // END the Wordpress Loop ?>
			<?php wp_reset_query(); // Reset the Query Loop?>
			
		</ul>
	
	</div>
	
	<?php } ?>
	
</div>	

<div class="bottom-360 main-template">

	<div class="container">

		<?php if(!empty($data['footer_text'])) { ?>
			<p class="footer-text"><?php echo $data['footer_text']; ?> </p>
		<?php } ?>
				
		<?php if($data['disable_icons'] !='disable') { ?>

			<?php $social_links = array('twitter','dribbble','forrst','flickr','google','googleplus','facebook','linkedin','youtube','vimeo','rss','support','mail'); ?>
			
			<ul class="footer-social">
			
				<?php
           
            	foreach($social_links as $social_link) {
                if(!empty($data[$social_link])) {
                    	echo '<li><a href="'. $data[$social_link] .'" title="'. $social_link .'" target="_blank" class="demo-tip-twitter"><img src="'. get_template_directory_uri() .'/framework/images/social/'.$social_link.'.png" alt="" /></a></li>';
					}
            	}
           
            	?>
            
            </ul>
            
          <?php } ?>
          
          <?php if($data['disable_thumbnails'] !='disable') { ?>
           
			<div class="bottom-toggle">

				<div class="close-panels thumbnail-panels" title="Close Thumbnails">Close</div>
				<div class="open-panels thumbnail-panels" title="Open Thumbnails">Open</div>

			</div>
			
		<?php } ?>
		
	</div><!-- END CONTAINER -->

</div><!-- END BOTTOM360 -->

<?php get_footer(); ?>
<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 * Template Name: Template Image Viewer 2
 */
global $data;
get_header(); ?>

<?php include (TEMPLATEPATH . '/framework/includes/bg.php'); ?>

<?php $social = get_post_meta($post->ID, 'siiimple_social_media', TRUE); ?>
<?php if(!empty($social) && $social == 'light') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar-light.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'dark') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'none') { ?>
<?php } ?>

<div class="container template-viewer">
	
<div id="top-wrapper">

	<h1 class="main-header-title"><?php the_title(); ?></h1>
		
	<?php if(!empty($data['tagline_viewer'])) { ?>
		<p class="viewer"><?php echo $data['tagline_viewer']; ?></p>
	<?php } ?>
	
</div>

<div class="clear" style="height:30px;"></div>

<div id="wrapper-viewer2">
		
			<div id="carousel-viewer2">
				
				<div class="empty"></div>
				
				<?php		
				query_posts(array(
                'post_type'=> $data['viewer-cpt'],
				'posts_per_page' => -1,
                'paged'=>$paged
            ));
            ?>
        
            <?php
			$count=0;
            while (have_posts()) : the_post();
			$count++;
			
           		$thumbblog = get_post_thumbnail_id();
				$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
				$imageblog = aq_resize( $img_url_blog, 554, 313, true );
				$thumbblogfull = get_post_thumbnail_id();
				$img_url_blogfull = wp_get_attachment_url( $thumbblogfull,'index-blog' );
				$imageblogfull = aq_resize( $img_url_blogfull, 1024, 680, true );
				$video = get_post_meta($post->ID, 'siiimple_video', TRUE);
            ?>

					
				<div>
					<?php if ($video) { ?>
					<iframe src="<?php echo $video; ?>" width="554" height="313" frameborder="0" class="vid" style="margin-bottom:20px"></iframe>
					<?php } else { ?>
					<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
					<img src="<?php echo $imageblog ?>" alt="<?php the_title(); ?>" />
					<?php endif; ?>
					<?php } ?>
					
					<?php if ( has_post_format( 'link' )) { ?>
					
					<div class="clear" style="height:70px"></div>

				<a href="<?php the_permalink(); ?>" class="view-quote"><?php the_content(); ?></a>
	
				<p class="link-date"><?php _e('Posted','siiimple') ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) .' '. __('ago', 'framework'); ?></p>
		
		<?php } ?>
					
					<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
				</div>
				
				<?php endwhile; ?>
				
				<div class="empty"></div>
			
			</div>
			
			<a id="prev" href="#"></a>
			<a id="next" href="#"></a>
		
		</div>
		
</div>

<div class="clear"></div>

<div id="bottom-viewer-wrap">

	<div class="container">

		<div class="grid4 col">
		
			<?php if(!empty($data['footer_text'])) { ?>
				<p><?php echo $data['footer_text']; ?> </p>
			<?php } ?>
				
		</div>

		<div class="grid11 col">
		
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

		</div><!-- END GRID11 -->
		
	</div><!-- END CONTAINER -->

</div><!-- END BOTTOM360 -->

<?php get_footer(); ?>	

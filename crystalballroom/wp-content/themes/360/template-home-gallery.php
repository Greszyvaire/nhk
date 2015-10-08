<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 * Template Name: Template Static Gallery
 */
global $data;
get_header(); ?>

<?php 
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'index-blog' );
$image = aq_resize( $img_url, 1680, 1050, true );
?>

<div id="bg">

	<a href="#" class="nextImageBtn" title="next"></a>
	<a href="#" class="prevImageBtn" title="previous"></a>

	<img src="<?php echo $image ?>" width="1680" height="1050" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" id="bgimg" />

</div><!-- END BG -->

<div id="preloader">

	<img src="<?php echo get_template_directory_uri(); ?>/framework/images/ajax-loader.gif" width="32" height="32" />
	
</div><!-- END PRELOADER -->

<div id="img_title"></div>

<div id="toolbar"></div>

<div id="thumbnails_wrapper">
	
	<div id="outer_container">
		
		<div class="thumbScroller">
			
			<div class="container">
			
				<?php if($data['home_gallery'] == 'Panorama') { ?>
			
				<?php 
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$wpbp = new WP_Query(array( 'post_type' => 'panorama', 'posts_per_page' =>'-1', 'paged' => $paged ) ); 
				if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 
				$thumbblog = get_post_thumbnail_id();
				$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
				$imageblog = aq_resize( $img_url_blog, 220, 140, true );
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'index-blog' );
				$image = aq_resize( $img_url, 1680, 1050, true );
				?>
				
				<div class="content">
        			
        			<div>
        			
        			<a href="<?php echo $image ?>">
        				
        			<img src="<?php echo $imageblog ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="thumb" />
        				
        			</a>
        				
        			</div>
        			
        		</div>
        				
				<?php endwhile; endif; // END the Wordpress Loop ?>
				<?php wp_reset_query(); // Reset the Query Loop?>
				
				<?php } else if ($data['home_gallery'] == 'Portfolio') { ?>
				
				<?php 
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$wpbp = new WP_Query(array( 'post_type' => 'portfolio', 'posts_per_page' =>'-1', 'paged' => $paged ) ); 
				if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 
				$thumbblog = get_post_thumbnail_id();
				$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
				$imageblog = aq_resize( $img_url_blog, 220, 140, true );
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'index-blog' );
				$image = aq_resize( $img_url, 1680, 1050, true );
				?>
				
				<div class="content">
        			
        			<div>
        			
        			<a href="<?php echo $image ?>">
        				
        			<img src="<?php echo $imageblog ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="thumb" />
        				
        			</a>
        				
        			</div>
        			
        		</div>
        		
        		<?php $count++; // Increase the count by 1 ?>		
				<?php endwhile; endif; // END the Wordpress Loop ?>
				<?php wp_reset_query(); // Reset the Query Loop?>
				
				<?php } else if ($data['home_gallery'] == 'Gallery') { ?>
				
				<?php 
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$wpbp = new WP_Query(array( 'post_type' => 'gallery', 'posts_per_page' =>'-1', 'paged' => $paged ) ); 
				if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 
				$thumbblog = get_post_thumbnail_id();
				$img_url_blog = wp_get_attachment_url( $thumbblog,'index-blog' );
				$imageblog = aq_resize( $img_url_blog, 220, 140, true );
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'index-blog' );
				$image = aq_resize( $img_url, 1680, 1050, true );
				?>
				
				<div class="content">
        			
        			<div>
        			
        			<a href="<?php echo $image ?>">
        				
        			<img src="<?php echo $imageblog ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="thumb" />
        				
        			</a>
        				
        			</div>
        			
        		</div>
        		
        		<?php $count++; // Increase the count by 1 ?>		
				<?php endwhile; endif; // END the Wordpress Loop ?>
				<?php wp_reset_query(); // Reset the Query Loop?>
				
				<?php } ?>
					

      		
      		</div>
		
		</div>
	
	</div>

</div>

<?php wp_footer(); ?>
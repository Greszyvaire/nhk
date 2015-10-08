<?php
/**
 * @package WordPress
 * @subpackage Siiimple
 * Template Name: Template Testimonials
 */
global $data;
get_header();
?>

<?php $social = get_post_meta($post->ID, 'siiimple_social_media', TRUE); ?>
<?php if(!empty($social) && $social == 'light') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar-light.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'dark') { ?>
<?php include (TEMPLATEPATH . '/framework/includes/social-sidebar.php'); ?>
<?php } ?> 
<?php if(!empty($social) && $social == 'none') { ?>
<?php } ?>

<?php include (TEMPLATEPATH . '/framework/includes/bg.php'); ?>

<div class="page-content" id="blog-content">

	<div class="container" id="page-bottom">
	
	<div class="grid16 col top-header">
	
		<h1 class="main-header-title"><?php the_title(); ?></h1>
		
		<?php if(!empty($data['tagline_testimonial'])) { ?>
		<p class="testimonial"><?php echo $data['tagline_testimonial']; ?></p>
		<?php } ?>
	
	</div>
	
		<div class="blog-content-wrap">
	
			<div class="grid10 col full-width" id="content-wrapper">
			
			<?php		
			query_posts(array(
                'post_type'=>'testimonials',
				'posts_per_page' => $data['testimonial_num'],
                'paged'=>$paged
            ));
            ?>
        
            <?php
			$count=0;
            while (have_posts()) : the_post();
			$count++;
			
           	$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'index-portfolio' ); //get full URL to image (use "large" or "medium" if the images too big)
				$image = aq_resize( $img_url, 200, 200, true ); //resize & crop the image
				$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full-thumb', false, '' ); 
				$large_image = $large_image[0];
            ?>
		
				<div class="test-wrap">
				
				<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
				<a rel="prettyPhoto[gallery]" href="<?php echo $large_image ?>">
	
					<span class="rollover"></span>
					<img src="<?php echo $image ?>" class="staff-img"/>
	
				</a>							
				<?php endif; ?>
				
				<div class="quote-img"></div>
				
				<p class="test-excerpt"><?php the_excerpt(); ?></p>
				
				<h5 class="test-title">/&nbsp;&nbsp;<?php the_title(); ?></h5>
				
				</div>
				
				<?php endwhile; ?>
				
			</div><!--END GRID 10-->  
			
		</div><!-- END BLOG CONTENT WRAP -->
		
		<div class="clear"></div>
	
	<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
		
	</div><!-- END CONTAINER -->
			
</div><!-- END PAGE CONTENT -->

<?php include (TEMPLATEPATH . '/pre-footer.php'); ?>

<?php get_footer(); ?>